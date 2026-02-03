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
        ->get()
        ->groupBy([
            'category.category_name',          
            'subcategory.subcategory_name',
            function ($item) {
                return optional($item->service)->service_name ?? 'No Service';
            }
        ]);

        // dd($doctors);

        return view('backend.doctors.index', compact('doctors'));
    }


    public function create()
    {

        $masterCategories = MedicalServiceMasterCategory::all();
        $subCategories = MedicalServiceSubCategory::all();
        $facility = MedicalServiceCategory::all();
        
        return view('backend.doctors.create' ,compact('masterCategories', 'subCategories','facility'));
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
            'doctor_designation' => 'required|string|max:255',
            'qualification'      => 'required|string',
            'profile_desc'       => 'required|string',

            'time_slot.from'     => 'required|array',
            'time_slot.to'       => 'required|array',
            'time_slot.from.*'   => 'required',
            'time_slot.to.*'     => 'required',

            'social_media.*.platform' => 'required|string',
            'social_media.*.link'     => 'required|url',
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

        // ================= JSON DATA =================
        $timeSlots = [];
        foreach ($request->time_slot['from'] as $key => $from) {
            $timeSlots[] = [
                'from' => $from,
                'to'   => $request->time_slot['to'][$key] ?? null,
            ];
        }

        $timeSlotJson = json_encode($timeSlots);

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
            'designation' => $request->doctor_designation,
            'doctor_image'       => $doctorImage,
            'qualification'      => $request->qualification,
            'profile_desc'       => $request->profile_desc,

            'doctor_time_slot'   => $timeSlotJson,
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
            'doctor_designation' => 'required|string|max:255',
            'qualification'      => 'required|string',
            'profile_desc'       => 'required|string',

            'time_slot.from'     => 'required|array',
            'time_slot.to'       => 'required|array',
            'time_slot.from.*'   => 'required',
            'time_slot.to.*'     => 'required',

           'social_media' => 'nullable|array',
            'social_media.*.platform' => 'sometimes|required|string',
            'social_media.*.link' => 'sometimes|required|url',

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
        if ($request->hasFile('doctor_image')) {
            if ($doctor->doctor_image && file_exists($uploadPath.'/'.$doctor->doctor_image)) {
                unlink($uploadPath.'/'.$doctor->doctor_image);
            }
            $img = $request->file('doctor_image');
            $doctorImage = time().'_doctor.'.$img->getClientOriginalExtension();
            $img->move($uploadPath, $doctorImage);
            $doctor->doctor_image = $doctorImage;
        }

        // ================= JSON DATA =================
        $timeSlots = [];
        foreach ($request->time_slot['from'] as $key => $from) {
            $timeSlots[] = [
                'from' => $from,
                'to'   => $request->time_slot['to'][$key] ?? null,
            ];
        }

        $doctor->doctor_time_slot = json_encode($timeSlots);
        $doctor->social_media_links = json_encode($request->social_media);

        $doctor->category_id        = $request->category_id;
        $doctor->subcategory_id     = $request->subcategory_id;
        $doctor->service_id         = $request->service_id;
        $doctor->doctor_name        = $request->doctor_name;
        $doctor->designation = $request->doctor_designation;
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




}