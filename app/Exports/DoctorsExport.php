<?php

namespace App\Exports;

use App\Models\Doctor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DoctorsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    // Same tables as DoctorsImport
    private string $categoryTable    = 'medical_service_master_categories';
    private string $subcategoryTable = 'medical_service_sub_categories';
    private string $serviceTable     = 'medical_service_categorie';

    // Reverse of the import platform map
    private array $platformMap = [
        '1' => 'facebook',
        '2' => 'twitter',
        '3' => 'instagram',
        '4' => 'linkedin',
        '5' => 'youtube',
    ];

    public function headings(): array
    {
        return [
            'ID',                  // ← DO NOT EDIT — used to match existing doctors
            'Master Category',
            'Sub Category',
            'Service',
            'Doctor Name',
            'Designation',
            'Qualification 1',
            'Qualification 2',
            'Qualification 3',
            'Qualification 4',
            'Profile Description',
            'Schedule 1 Days',
            'Schedule 1 From',
            'Schedule 1 To',
            'Schedule 2 Days',
            'Schedule 2 From',
            'Schedule 2 To',
            'Schedule 3 Days',
            'Schedule 3 From',
            'Schedule 3 To',
            'Image Filename',
            'Facebook',
            'Twitter',
            'Instagram',
            'LinkedIn',
            'YouTube',
            'Delete',              // ← write YES here to delete this doctor on import
        ];
    }

    public function collection()
    {
        $doctors = Doctor::query()
            ->leftJoin("{$this->categoryTable} as mc", 'mc.id', '=', 'doctors.category_id')
            ->leftJoin("{$this->subcategoryTable} as sc", 'sc.id', '=', 'doctors.subcategory_id')
            ->leftJoin("{$this->serviceTable} as sv", 'sv.id', '=', 'doctors.service_id')
            ->whereNull('doctors.deleted_by')          // exclude soft-deleted doctors
            ->select(
                'doctors.*',
                'mc.category_name',
                'sc.subcategory_name',
                'sv.service_name'
            )
            ->orderBy('doctors.category_id')           // same ordering as index()
            ->orderBy('doctors.subcategory_id')
            ->orderBy('doctors.service_id')
            ->orderBy('doctors.priority')
            ->get();

        return $doctors->map(function ($doc) {

            // ---------- Qualifications: split back into max 4 columns ----------
            $quals = array_map('trim', explode(',', (string) $doc->qualification));
            $quals = array_values(array_filter($quals));
            if (count($quals) > 4) {
                $quals = array_merge(
                    array_slice($quals, 0, 3),
                    [implode(', ', array_slice($quals, 3))]
                );
            }
            $quals = array_pad($quals, 4, '');

            // ---------- Schedule JSON -> 3 shift groups ----------
            $shifts   = [];
            $schedule = json_decode((string) $doc->doctor_time_slot, true) ?: [];
            for ($i = 0; $i < 3; $i++) {
                $shift = $schedule[$i] ?? null;
                $shifts[] = $shift ? implode(',', (array) ($shift['days'] ?? [])) : '';
                $shifts[] = $shift ? (string) ($shift['from'] ?? '') : '';
                $shifts[] = $shift ? (string) ($shift['to'] ?? '') : '';
            }

            // ---------- Social media JSON -> platform columns ----------
            $social = ['facebook' => '', 'twitter' => '', 'instagram' => '', 'linkedin' => '', 'youtube' => ''];
            $links  = json_decode((string) $doc->social_media_links, true) ?: [];
            foreach ($links as $entry) {
                $platformId = (string) ($entry['platform'] ?? '');
                $link       = trim((string) ($entry['link'] ?? ''));
                if ($link !== '' && isset($this->platformMap[$platformId])) {
                    $social[$this->platformMap[$platformId]] = $link;
                }
            }

            return [
                $doc->id,
                $doc->category_name ?? '',
                $doc->subcategory_name ?? '',
                $doc->service_name ?? '',
                $doc->doctor_name,
                $doc->designation,
                $quals[0],
                $quals[1],
                $quals[2],
                $quals[3],
                $doc->profile_desc,
                ...$shifts,
                $doc->doctor_image,
                $social['facebook'],
                $social['twitter'],
                $social['instagram'],
                $social['linkedin'],
                $social['youtube'],
                '',   // Delete column — blank by default
            ];
        });
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:AA1')->applyFromArray([
            'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
            'fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '1F4E78']],
        ]);
        // Highlight ID and Delete headers differently as a warning
        $sheet->getStyle('A1')->applyFromArray([
            'fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '7F1D1D']],
        ]);
        $sheet->getStyle('AA1')->applyFromArray([
            'fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '7F1D1D']],
        ]);
        $sheet->freezePane('A2');

        return [];
    }
}