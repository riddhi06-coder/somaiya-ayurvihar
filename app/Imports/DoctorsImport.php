<?php

namespace App\Imports;

use App\Models\Doctor;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Illuminate\Support\Facades\Log;

class DoctorsImport implements ToCollection, WithHeadingRow, WithMultipleSheets
{
    public array $errors   = [];
    public int   $imported = 0;   // new doctors created
    public int   $updated  = 0;   // existing doctors updated
    public int   $deleted  = 0;   // doctors deleted via the Delete column
    public int   $skipped  = 0;   // rows with errors

    private string $categoryTable    = 'medical_service_master_categories';
    private string $subcategoryTable = 'medical_service_sub_categories';
    private string $serviceTable     = 'medical_service_categorie';

    private array $dayMap = [
        'MON' => 'Monday',  'MONDAY' => 'Monday',
        'TUE' => 'Tuesday', 'TUES' => 'Tuesday', 'TUESDAY' => 'Tuesday',
        'WED' => 'Wednesday', 'WEDNESDAY' => 'Wednesday',
        'THU' => 'Thursday', 'THUR' => 'Thursday', 'THURS' => 'Thursday', 'THURSDAY' => 'Thursday',
        'FRI' => 'Friday',  'FRIDAY' => 'Friday',
        'SAT' => 'Saturday','SATURDAY' => 'Saturday',
        'SUN' => 'Sunday',  'SUNDAY' => 'Sunday',
    ];

    public function sheets(): array
    {
        return [0 => $this];   // first sheet only — works for both xlsx and csv
    }

    public function collection(Collection $rows)
    {
        // Not the Doctors sheet (e.g. Instructions tab) → ignore silently.
        $first = $rows->first();
        if (!$first || !collect($first)->has('doctor_name')) {
            return;
        }

        foreach ($rows as $index => $row) {
            $rowNo = $index + 2; // +2 => heading row + 1-based index

            // Skip completely empty rows
            if (collect($row)->filter(fn ($v) => trim((string) $v) !== '')->isEmpty()) {
                continue;
            }

            try {
                $this->importRow($row, $rowNo);
            } catch (\Throwable $e) {
                $this->skipped++;
                $this->errors[] = "Row {$rowNo}: " . $e->getMessage();
                Log::warning("IMPORT row {$rowNo} FAILED", [
                    'error' => $e->getMessage(),
                    'name'  => $row['doctor_name'] ?? null,
                    'sub'   => $row['sub_category'] ?? null,
                ]);
            }
        }
    }

    private function importRow($row, int $rowNo): void
    {
        $rowId      = trim((string) ($row['id'] ?? ''));
        $deleteFlag = in_array(
            strtolower(trim((string) ($row['delete'] ?? ''))),
            ['yes', 'y', '1', 'true', 'delete'],
            true
        );

        // =====================================================
        // DELETE MODE: "YES" in the Delete column
        // =====================================================
        if ($deleteFlag) {
            $this->deleteDoctor($row, $rowId);
            return;
        }

        // ---------- Required text fields ----------
        $doctorName  = trim((string) ($row['doctor_name'] ?? ''));
        $designation = trim((string) ($row['designation'] ?? ''));
        $profileDesc = trim((string) ($row['profile_description'] ?? ''));
        $catName     = trim((string) ($row['master_category'] ?? ''));
        $subName     = trim((string) ($row['sub_category'] ?? ''));

        foreach ([
            'Doctor Name'         => $doctorName,
            'Designation'         => $designation,
            'Profile Description' => $profileDesc,
            'Master Category'     => $catName,
            'Sub Category'        => $subName,
        ] as $label => $value) {
            if ($value === '') {
                throw new \Exception("{$label} is required.");
            }
        }

        // ---------- Category lookup ----------
        $category = DB::table($this->categoryTable)
            ->whereRaw('LOWER(TRIM(category_name)) = ?', [mb_strtolower($catName)])
            ->first();

        if (!$category) {
            throw new \Exception("Master Category '{$catName}' not found. Create it first or fix the spelling.");
        }

        $subcategory = DB::table($this->subcategoryTable)
            ->where('category_id', $category->id)
            ->whereRaw('LOWER(TRIM(subcategory_name)) = ?', [mb_strtolower($subName)])
            ->first();

        if (!$subcategory) {
            // log what IS in the DB for this master category, to compare
            $available = DB::table($this->subcategoryTable)
                ->where('category_id', $category->id)
                ->pluck('subcategory_name');
            Log::warning("IMPORT subcat lookup failed", [
                'searched'  => $subName,
                'category'  => $category->id,
                'available' => $available,
            ]);
            throw new \Exception("Sub Category '{$subName}' not found under '{$catName}'.");
        }

        $serviceId   = null;
        $serviceName = trim((string) ($row['service'] ?? ''));
        if ($serviceName !== '') {
            $service = DB::table($this->serviceTable)
                ->where('subcategory_id', $subcategory->id)
                ->whereRaw('LOWER(TRIM(service_name)) = ?', [mb_strtolower($serviceName)])
                ->first();

            if (!$service) {
                throw new \Exception("Service '{$serviceName}' not found under '{$subName}'.");
            }
            $serviceId = $service->id;
        }

        // =====================================================
        // Find existing doctor:
        //   1) By ID (from exported sheet) — survives name and
        //      category changes, so edits never create duplicates.
        //   2) Fallback (no ID, e.g. new rows): name + sub category.
        // =====================================================
        $existing = null;
        if ($rowId !== '') {
            $existing = Doctor::find((int) $rowId);
            if (!$existing) {
                throw new \Exception("Doctor with ID {$rowId} not found. Do not type IDs manually — leave ID blank for new doctors.");
            }
        } else {
            $existing = Doctor::whereNull('deleted_by')
                ->where('subcategory_id', $subcategory->id)
                ->whereRaw('LOWER(TRIM(doctor_name)) = ?', [mb_strtolower($doctorName)])
                ->first();
        }

        // ---------- Qualifications (merge 4 columns) ----------
        $qualification = collect([
                $row['qualification_1'] ?? null,
                $row['qualification_2'] ?? null,
                $row['qualification_3'] ?? null,
                $row['qualification_4'] ?? null,
            ])
            ->map(fn ($q) => trim((string) $q))
            ->filter()
            ->implode(', ');

        // ---------- Schedule JSON (same shape as store()) ----------
        $schedule = [];
        for ($i = 1; $i <= 3; $i++) {
            $days = trim((string) ($row["schedule_{$i}_days"] ?? ''));
            $from = $this->parseTime($row["schedule_{$i}_from"] ?? null);
            $to   = $this->parseTime($row["schedule_{$i}_to"] ?? null);

            if ($days === '' && !$from && !$to) {
                continue; // shift not used (e.g. On Appointment doctors)
            }
            if ($days === '' || !$from || !$to) {
                throw new \Exception("Schedule {$i} is incomplete. Days, From and To are all required for a shift.");
            }

            $schedule[] = [
                'days' => $this->parseDays($days, $i),
                'from' => $from,
                'to'   => $to,
            ];
        }

        // ---------- Social media (same shape as form: platform id + link) ----------
        $platformMap = ['facebook' => '1', 'twitter' => '2', 'instagram' => '3', 'linkedin' => '4', 'youtube' => '5'];
        $socialMedia = [];
        foreach ($platformMap as $col => $platformId) {
            $link = trim((string) ($row[$col] ?? ''));
            if ($link === '') {
                continue;
            }
            if (!filter_var($link, FILTER_VALIDATE_URL)) {
                throw new \Exception(ucfirst($col) . " link is not a valid URL.");
            }
            $socialMedia[] = ['platform' => $platformId, 'link' => $link];
        }

        // ---------- Image ----------
        // ---------- Image ----------
        // blank  = keep existing photo (on update) / default photo (on create)
        // REMOVE = reset to default photo
        $imageFile   = trim((string) ($row['image_filename'] ?? ''));
        $removeImage = in_array(strtolower($imageFile), ['remove', 'reset', 'default'], true);
        
        if ($removeImage) {
            $imageFile = '';
        } elseif ($imageFile !== '') {
            if (!preg_match('/\.(jpg|jpeg|png|webp|svg)$/i', $imageFile)) {
                throw new \Exception("Image Filename must end with .jpg, .jpeg, .png, .webp or .svg (or write REMOVE to reset the photo).");
            }
            if (!file_exists(public_path('uploads/doctors/' . $imageFile))) {
                throw new \Exception("Image '{$imageFile}' not found in uploads/doctors. Upload the photos first.");
            }
        }

        // ---------- Common data for create and update ----------
        $data = [
            'category_id'        => $category->id,
            'subcategory_id'     => $subcategory->id,
            'service_id'         => $serviceId,
            'doctor_name'        => $doctorName,
            'designation'        => $designation,
            'qualification'      => $qualification,
            'profile_desc'       => $profileDesc,
            'doctor_time_slot'   => json_encode($schedule),
            'social_media_links' => json_encode($socialMedia ?: null),
        ];

        if ($existing) {
            // ---------- UPDATE existing doctor ----------
            // Slug is kept (so existing page URLs don't break).
            // Image only changes if a new Image Filename was provided.
            if ($removeImage) {
                // delete old physical file (same as your update() method does)
                $old = public_path('uploads/doctors/' . $existing->doctor_image);
                if ($existing->doctor_image
                    && $existing->doctor_image !== 'default-doctor.png'
                    && file_exists($old)) {
                    unlink($old);
                }
                $data['doctor_image'] = 'default-doctor.png';
            } elseif ($imageFile !== '') {
                $data['doctor_image'] = $imageFile;
            }
            
            $existing->fill($data);
            $existing->modified_at = now();          // table uses modified_at, not updated_at
            $existing->modified_by = Auth::id();

            // If this ID was soft-deleted earlier, importing it again restores it
            if ($existing->deleted_by !== null) {
                $existing->deleted_by = null;
                $existing->deleted_at = null;
            }

            $existing->save();
            $this->updated++;
        } else {
            // ---------- CREATE new doctor ----------
            $slug  = Str::slug($doctorName);
            $count = Doctor::where('slug', 'LIKE', "{$slug}%")->count();
            if ($count > 0) {
                $slug .= '-' . ($count + 1);
            }

            $data['slug']         = $slug;
            $data['doctor_image'] = $imageFile !== '' ? $imageFile : 'default-doctor.png';
            $data['status']       = 1;
            $data['created_at']   = now();
            $data['created_by']   = Auth::id();

            Doctor::create($data);
            $this->imported++;
        }
    }

    /**
     * Soft-deletes a doctor (same as the admin Delete button:
     * sets deleted_by + deleted_at). Matched by ID when present,
     * otherwise by name + sub category.
     */
    private function deleteDoctor($row, string $rowId): void
    {
        $doctor = null;

        if ($rowId !== '') {
            $doctor = Doctor::find((int) $rowId);
            if (!$doctor) {
                throw new \Exception("Cannot delete: doctor with ID {$rowId} not found.");
            }
        } else {
            $doctorName = trim((string) ($row['doctor_name'] ?? ''));
            $subName    = trim((string) ($row['sub_category'] ?? ''));

            if ($doctorName === '' || $subName === '') {
                throw new \Exception('Cannot delete: need either the ID, or Doctor Name + Sub Category.');
            }

            $subcategory = DB::table($this->subcategoryTable)
                ->whereRaw('LOWER(TRIM(subcategory_name)) = ?', [mb_strtolower($subName)])
                ->first();

            if (!$subcategory) {
                throw new \Exception("Cannot delete: Sub Category '{$subName}' not found.");
            }

            $doctor = Doctor::whereNull('deleted_by')
                ->where('subcategory_id', $subcategory->id)
                ->whereRaw('LOWER(TRIM(doctor_name)) = ?', [mb_strtolower($doctorName)])
                ->first();

            if (!$doctor) {
                throw new \Exception("Cannot delete: doctor '{$doctorName}' not found in '{$subName}'.");
            }
        }

        if ($doctor->deleted_by !== null) {
            return; // already deleted — nothing to do
        }

        $doctor->deleted_by = Auth::id();
        $doctor->deleted_at = now();
        $doctor->save();

        $this->deleted++;
    }

    /**
     * Accepts "Monday,Wednesday,Friday" or "MON-WED-FRI" or "Mon | Wed | Fri".
     */
    private function parseDays(string $raw, int $shiftNo): array
    {
        $tokens = preg_split('/[,\-\|\/]+/', $raw);
        $days   = [];

        foreach ($tokens as $t) {
            $t = strtoupper(trim($t));
            if ($t === '') {
                continue;
            }
            if (!isset($this->dayMap[$t])) {
                throw new \Exception("Schedule {$shiftNo}: '{$t}' is not a valid day. Use Monday-Sunday or MON/TUE/WED/THU/FRI/SAT/SUN.");
            }
            $days[] = $this->dayMap[$t];
        }

        if (empty($days)) {
            throw new \Exception("Schedule {$shiftNo}: no valid days found.");
        }

        return array_values(array_unique($days));
    }

    /**
     * Normalises Excel time values to "h:i A" (same as store()).
     * Handles: "09:00 AM", "9:00", Excel time-cells (floats), DateTime objects.
     */
    /**
     * Normalises Excel time values to "h:i A" (same as store()).
     * Handles: "09:00 AM", "9:00", "1: 00 PM", "11:AM", "9.30 pm",
     * Excel time-cells (floats), DateTime objects.
     */
    private function parseTime($value): ?string
    {
        if ($value === null) {
            return null;
        }
    
        if ($value instanceof \DateTimeInterface) {
            return $value->format('h:i A');
        }
    
        if (is_numeric($value)) {
            // Excel stores times as a fraction of a day when the cell is time-formatted
            $seconds = round(((float) $value) * 86400);
            return date('h:i A', mktime(0, 0, (int) $seconds));
        }
    
        $str = trim((string) $value);
        if ($str === '') {
            return null;
        }
    
        // Tolerant parse: "1: 00 PM", "11:AM", "9.30pm", "09 : 15 am", "14:30"
        if (preg_match('/^(\d{1,2})\s*[:.]?\s*(\d{1,2})?\s*(a\.?m\.?|p\.?m\.?)?$/i', $str, $m)) {
            $h   = (int) $m[1];
            $i   = isset($m[2]) && $m[2] !== '' ? (int) $m[2] : 0;
            $mer = isset($m[3]) && $m[3] !== ''
                ? strtoupper(str_replace('.', '', $m[3]))
                : null;
    
            if ($h > 23 || $i > 59 || ($mer !== null && ($h < 1 || $h > 12))) {
                throw new \Exception("Invalid time value '{$value}'. Use format like 09:00 AM.");
            }
    
            if ($mer === 'PM' && $h < 12) {
                $h += 12;
            }
            if ($mer === 'AM' && $h === 12) {
                $h = 0;
            }
    
            return date('h:i A', mktime($h, $i, 0));
        }
    
        // Fallback for anything else PHP can understand natively
        $ts = strtotime($str);
        if ($ts === false) {
            throw new \Exception("Invalid time value '{$value}'. Use format like 09:00 AM.");
        }
    
        return date('h:i A', $ts);
    }
}