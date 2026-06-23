<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Requests\DoctorFormRequest;
use DB;
use Carbon\Carbon;
use App\Imports\DoctorsImport;
use App\Exports\DoctorsExport;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;
use ZipArchive;

use App\Models\MedicalServiceSubCategory;
use App\Models\MedicalServiceCategory;
use App\Models\MedicalServiceMasterCategory;
use App\Models\Doctor;



class DoctorController extends Controller
{

    public function index()
    {
        $doctors = Doctor::with([
            'category:id,category_name',
            'subcategory:id,subcategory_name',
            'service:id,service_name'
        ])
        ->whereNull('deleted_by')
        ->orderBy('category_id')
        ->orderBy('subcategory_id')
        ->orderBy('service_id')
        ->orderBy('priority')          
        ->get()
        ->groupBy([
            'category.category_name',
            'subcategory.subcategory_name',
            function ($item) {
                return optional($item->service)->service_name ?? 'No Service';
            }
        ]);
    
        return view('backend.doctors.index', compact('doctors'));
    }


    public function create()
    {

        $masterCategories = MedicalServiceMasterCategory::all();
        $subCategories = MedicalServiceSubCategory::all();
        $facility = MedicalServiceCategory::all();
        
        return view('backend.doctors.create' ,compact('masterCategories', 'subCategories','facility'));
    }
    
    public function updatePriority(Request $request)
    {
        $doctor = Doctor::find($request->id);
    
        if (!$doctor) {
            return response()->json(['status' => false]);
        }
    
        // Check if priority already exists (excluding current record)
        $exists = Doctor::where('priority', $request->priority)
                    ->where('id', '!=', $request->id)
                    ->exists();
    
        if ($exists) {
            return response()->json([
                'status' => false,
                'message' => 'Priority already assigned'
            ]);
        }
    
        $doctor->priority = $request->priority;
        $doctor->save();
    
        return response()->json(['status' => true]);
    }
    
    public function store(Request $request)
    {
        // ================= VALIDATION =================
        $request->validate([
            'category_id'        => 'required',
            'subcategory_id'     => 'required',
            'service_id'         => 'nullable',

            'doctor_image'       => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'doctor_name'        => 'required|string|max:255',
            'doctor_designation' => 'nullable|string|max:255',
            'qualification'      => 'required|string',
            'profile_desc'       => 'required|string',

            'time_slot.from'     => 'nullable|array',
            'time_slot.to'       => 'nullable|array',
            'time_slot.from.*'   => 'nullable',
            'time_slot.to.*'     => 'nullable',

            'social_media.*.platform' => 'nullable|string',
            'social_media.*.link'     => 'nullable|url',
        ], [
            'category_id.required' => 'Master category is required.',
            'subcategory_id.required' => 'Sub category is required.',
            'doctor_image.required' => 'Doctor image is required.',
            'doctor_name.required' => 'Doctor name is required.',
            'doctor_designation.required' => 'Doctor designation is required.',
            'qualification.required' => 'Qualification is required.',
            'profile_desc.required' => 'Profile description is required.',
            'time_slot.from.required' => 'Please select doctor availability from time.',
            'time_slot.to.required' => 'Please select doctor availability to time.',
            'social_media.*.platform.required' => 'Social Media Platform is required.',
            'social_media.*.link.required' => 'Social Media Link is required.',
            'social_media.*.link.url' => 'Please enter a valid URL for Social Media Link.',
        ]);

        // ================= IMAGE UPLOAD =================
        $uploadPath = public_path('uploads/doctors');

        $doctorImage = null;
        if ($request->hasFile('doctor_image')) {
            $img = $request->file('doctor_image');
            $doctorImage = time() . '_doctor.' . $img->getClientOriginalExtension();
            $img->move($uploadPath, $doctorImage);
        }

         // ================= SCHEDULE JSON =================
        $schedule = [];
        foreach ($request->input('schedule', []) as $shift) {
            if (!empty($shift['days']) && !empty($shift['from']) && !empty($shift['to'])) {
                $schedule[] = [
                    'days' => $shift['days'], // ['Monday','Wednesday','Friday']
                    'from' => date('h:i A', strtotime($shift['from'])),
                    'to'   => date('h:i A', strtotime($shift['to'])),
                ];
            }
        }
        $scheduleJson = json_encode($schedule);


        $socialMediaJson = json_encode($request->social_media);

        // ================= SLUG =================
        $slug = Str::slug($request->doctor_name);
        $count = Doctor::where('slug', 'LIKE', "$slug%")->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        // ================= STORE =================
        Doctor::create([
            'category_id'        => $request->category_id,
            'subcategory_id'     => $request->subcategory_id,
            'service_id'         => $request->service_id,

            'doctor_name'        => $request->doctor_name,
            'slug'               => $slug,
            'designation'        => $request->doctor_designation,
            'doctor_image'       => $doctorImage,
            'qualification'      => $request->qualification,
            'profile_desc'       => $request->profile_desc,

            'doctor_time_slot'   => $scheduleJson,
            'social_media_links' => $socialMediaJson,

            'status'             => 1,
            'created_at'         => now(),
            'created_by'         => Auth::id(),
        ]);

        return redirect()
            ->route('admin.manage-doctors.index')
            ->with('message', 'Doctor added successfully.');
    }

    public function edit($id)
    {
        $service_details = Doctor::findOrFail($id);

        $service = MedicalServiceCategory::all();
        $masterCategories = MedicalServiceMasterCategory::all();
        $subCategories = MedicalServiceSubCategory::all();

        $service_details->doctor_time_slot = json_decode($service_details->doctor_time_slot, true);

        $contact_details = $service_details->social_media_links ? json_decode($service_details->social_media_links, true) : [];

        return view(
            'backend.doctors.edit',
            compact('service_details','service', 'masterCategories', 'subCategories','contact_details')
        );
    }

    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        // ================= VALIDATION =================
        $request->validate([
            'category_id'        => 'required',
            'subcategory_id'     => 'required',
            'service_id'         => 'nullable',

            'doctor_image'       => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

            'doctor_name'        => 'required|string|max:255',
            'doctor_designation' => 'nullable|string|max:255',
            'qualification'      => 'required|string',
            'profile_desc'       => 'required|string',

            'time_slot.from'     => 'nullable|array',
            'time_slot.to'       => 'nullable|array',
            'time_slot.from.*'   => 'nullable',
            'time_slot.to.*'     => 'nullable',

           'social_media' => 'nullable|array',
            'social_media.*.platform' => 'nullable|string',
            'social_media.*.link' => 'nullable|url',

        ], [
            'category_id.required' => 'Master category is required.',
            'subcategory_id.required' => 'Sub category is required.',
            'doctor_name.required' => 'Doctor name is required.',
            'doctor_designation.required' => 'Doctor designation is required.',
            'qualification.required' => 'Qualification is required.',
            'profile_desc.required' => 'Profile description is required.',
            'time_slot.from.required' => 'Please select doctor availability from time.',
            'time_slot.to.required' => 'Please select doctor availability to time.',
            'social_media.*.platform.required' => 'Social Media Platform is required.',
            'social_media.*.link.required' => 'Social Media Link is required.',
            'social_media.*.link.url' => 'Please enter a valid URL for Social Media Link.',
        ]);

        $uploadPath = public_path('uploads/doctors');

        // ================= IMAGE UPLOAD =================
        // ================= IMAGE UPLOAD =================
        if ($request->hasFile('doctor_image')) {
            // delete old image if present
            if ($doctor->doctor_image && file_exists($uploadPath.'/'.$doctor->doctor_image)) {
                unlink($uploadPath.'/'.$doctor->doctor_image);
            }
        
            $img = $request->file('doctor_image');
        
            // Keep original filename, only replace spaces with hyphens
            $originalName = pathinfo($img->getClientOriginalName(), PATHINFO_FILENAME);
            $extension    = $img->getClientOriginalExtension();
        
            $cleanName = preg_replace('/\s+/', '-', trim($originalName));   // spaces -> hyphen
            $cleanName = preg_replace('/[^A-Za-z0-9\-_.]/', '', $cleanName); // strip unsafe chars
        
            $doctorImage = $cleanName . '.' . $extension;
        
            $img->move($uploadPath, $doctorImage);
            $doctor->doctor_image = $doctorImage;
        }

         // ================= SCHEDULE =================
        $schedule = [];
        foreach ($request->input('schedule', []) as $shift) {
            if (!empty($shift['days']) && !empty($shift['from']) && !empty($shift['to'])) {
                $schedule[] = [
                    'days' => $shift['days'],
                    'from' => date('h:i A', strtotime($shift['from'])),
                    'to'   => date('h:i A', strtotime($shift['to'])),
                ];
            }
        }

        $doctor->doctor_time_slot   = $schedule;    
        $doctor->social_media_links = json_encode($request->social_media);

        $doctor->category_id        = $request->category_id;
        $doctor->subcategory_id     = $request->subcategory_id;
        $doctor->service_id         = $request->service_id;
        $doctor->doctor_name        = $request->doctor_name;
        $doctor->designation        = $request->doctor_designation;
        $doctor->qualification      = $request->qualification;
        $doctor->profile_desc       = $request->profile_desc;

        // ================= SLUG =================
        $slug = Str::slug($request->doctor_name);
        $count = Doctor::where('slug', 'LIKE', "$slug%")
                        ->where('id', '!=', $doctor->id)
                        ->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }
        $doctor->slug = $slug;

        $doctor->modified_at = now();
        $doctor->modified_by = Auth::id();

        $doctor->save();

        return redirect()
            ->route('admin.manage-doctors.index')
            ->with('message', 'Doctor updated successfully.');
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = Doctor::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-doctors.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }

    public function toggleStatus($id)
    {
        $doctor = Doctor::findOrFail($id);

        $doctor->status = $doctor->status ? 0 : 1;

        $doctor->save();

        return redirect()
            ->route('admin.manage-doctors.index')
            ->with('message', 'Doctor status updated successfully.');
    }
    
    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required|file|mimes:xlsx,xls,csv|max:5120',
        ], [
            'import_file.required' => 'Please choose an Excel file to upload.',
            'import_file.mimes'    => 'Only .xlsx, .xls or .csv files are allowed.',
        ]);
    
        $import = new DoctorsImport();
    
        try {
            Excel::import($import, $request->file('import_file'));
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            return back()->with('import_errors', collect($e->failures())
                ->map(fn ($f) => 'Row ' . $f->row() . ': ' . implode(' ', $f->errors()))
                ->toArray());
        }
    
        $message = "{$import->imported} doctor(s) imported successfully.";
        if ($import->skipped > 0) {
            $message .= " {$import->skipped} row(s) skipped.";
        }
    
        return redirect()
            ->route('admin.manage-doctors.index')
            ->with('message', $message)
            ->with('import_errors', $import->errors);
    }
    
    public function downloadTemplate()
    {
        return Excel::download(
            new DoctorsExport(),
            'doctors_' . date('Y-m-d') . '.xlsx'
        );
    }
    
    
    public function uploadImages(Request $request)
    {
        $request->validate([
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'zip_file' => 'nullable|file|mimes:zip|max:51200', // 50MB
        ]);
    
        if (!$request->hasFile('images') && !$request->hasFile('zip_file')) {
            return back()->with('import_errors', ['Please choose image files or a zip file.']);
        }
    
        $dest = public_path('uploads/doctors');
        File::ensureDirectoryExists($dest);
    
        $saved = 0;
        $errors = [];
        $allowed = ['jpg', 'jpeg', 'png', 'webp', 'svg'];
    
        // ---- Multiple individual images ----
        foreach ((array) $request->file('images', []) as $img) {
            // Keep ORIGINAL filename so it matches the Excel "Image Filename" column
            $name = preg_replace('/[^A-Za-z0-9._-]/', '_', $img->getClientOriginalName());
            $img->move($dest, $name);
            $saved++;
        }
    
        // ---- Zip file ----
        if ($request->hasFile('zip_file')) {
            $zip = new ZipArchive();
            if ($zip->open($request->file('zip_file')->getRealPath()) === true) {
                for ($i = 0; $i < $zip->numFiles; $i++) {
                    $entry = $zip->getNameIndex($i);
    
                    // skip folders and junk files
                    if (substr($entry, -1) === '/' || str_contains($entry, '__MACOSX')) {
                        continue;
                    }
    
                    $name = basename($entry); // strips folder paths (prevents zip-slip too)
                    $ext  = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    
                    if (!in_array($ext, $allowed)) {
                        $errors[] = "Skipped '{$name}' (only jpg, jpeg, png, webp, svg allowed).";
                        continue;
                    }
    
                    $name = preg_replace('/[^A-Za-z0-9._-]/', '_', $name);
                    file_put_contents($dest . '/' . $name, $zip->getFromIndex($i));
                    $saved++;
                }
                $zip->close();
            } else {
                $errors[] = 'Could not open the zip file.';
            }
        }
    
        return back()
            ->with('message', "{$saved} image(s) uploaded to uploads/doctors.")
            ->with('import_errors', $errors);
    }




}