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

            'image'              => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

            'doctor_name'        => 'required|string|max:255',
            'doctor_image'       => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'doctor_exp'         => 'required|string|max:255',

            'doctor_availability'=> 'required|array|min:1',
            'doctor_availability.*' => 'string',

            'time_slot.from'     => 'required|array',
            'time_slot.to'       => 'required|array',
            'time_slot.from.*'   => 'required',
            'time_slot.to.*'     => 'required',

            'languages_known'    => 'required|array|min:1',

            'qualification'      => 'required|string',

            'overview_heading'   => 'required|string|max:255',
            'overview_desc'      => 'required|string',

            'exp_heading'        => 'required|string|max:255',
            'exp_desc'           => 'required|string',

            'treatment_heading'  => 'required|string|max:255',
            'treatment'          => 'required|array',
            'treatment.*.name'   => 'required|string',

            'faq_heading'        => 'required|string|max:255',
            'faq'                => 'required|array',
            'faq.*.question'     => 'required|string',
            'faq.*.answer'       => 'required|string',


            'social_media.*.platform' => 'required|string',
            'social_media.*.link'     => 'required|url',

        ], [
            'category_id.required'        => 'Master category is required.',
            'subcategory_id.required'     => 'Sub category is required.',
            'image.required'              => 'Banner image is required.',
            'doctor_name.required'        => 'Doctor name is required.',
            'doctor_image.required'       => 'Doctor image is required.',
            'doctor_exp.required'         => 'Doctor experience is required.',
            'doctor_availability.required'=> 'Please select doctor availability.',
            'languages_known.required'    => 'Please select at least one language.',
            'qualification.required'      => 'Qualification is required.',
            'overview_heading.required'   => 'Overview heading is required.',
            'overview_desc.required'      => 'Overview description is required.',
            'treatment_heading.required'  => 'Treatment heading is required.',
            'faq_heading.required'        => 'FAQ heading is required.',
            'social_media.*.platform.required' => 'Social Media Platform is required.',
            'social_media.*.link.required'     => 'Social Media Link is required.',
            'social_media.*.link.url'          => 'Please enter a valid URL for Social Media Link.',
        ]);

        // ================= IMAGE UPLOADS =================
        $uploadPath = public_path('uploads/doctors');

        // Banner Image
        $bannerImage = null;
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $bannerImage = time().'_banner.'.$img->getClientOriginalExtension();
            $img->move($uploadPath, $bannerImage);
        }

        // Doctor Image
        $doctorImage = null;
        if ($request->hasFile('doctor_image')) {
            $img = $request->file('doctor_image');
            $doctorImage = time().'_doctor.'.$img->getClientOriginalExtension();
            $img->move($uploadPath, $doctorImage);
        }

        // ================= JSON ENCODE DATA =================
        $availabilityJson = json_encode($request->doctor_availability);
        $languagesJson    = json_encode($request->languages_known);
        $treatmentJson    = json_encode($request->treatment);
        $faqJson          = json_encode($request->faq);

        // Time Slot JSON (FROM + TO)
        $timeSlots = [];
        foreach ($request->time_slot['from'] as $key => $from) {
            $timeSlots[] = [
                'from' => $from,
                'to'   => $request->time_slot['to'][$key] ?? null,
            ];
        }
        $timeSlotJson = json_encode($timeSlots);



         // ================= SLUG GENERATION =================
        $slug = Str::slug($request->doctor_name);

        // Ensure uniqueness
        $count = Doctor::where('slug', 'LIKE', "$slug%")->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        // ================= STORE DATA =================
        Doctor::create([
            'category_id'        => $request->category_id,
            'subcategory_id'     => $request->subcategory_id,
            'service_id'         => $request->service_id,

            'banner_image'       => $bannerImage,

            'doctor_name'        => $request->doctor_name,
            'slug'               => $slug,
            'doctor_image'       => $doctorImage,
            'doctor_exp'         => $request->doctor_exp,

            'doctor_availability'=> $availabilityJson,
            'doctor_time_slot'   => $timeSlotJson,
            'languages_known'    => $languagesJson,

            'qualification'      => $request->qualification,

            'overview_heading'   => $request->overview_heading,
            'overview_desc'      => $request->overview_desc,

            'exp_heading'        => $request->exp_heading,
            'exp_desc'           => $request->exp_desc,

            'treatment_heading'  => $request->treatment_heading,
            'treatments'         => $treatmentJson,

            'faq_heading'        => $request->faq_heading,
            'faq'                => $faqJson,
            'social_media_links' => json_encode($request->social_media),

            'status'            => 0,

            'created_at'         => Carbon::now(),
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

        $service_details->doctor_availability = json_decode($service_details->doctor_availability, true);
        $service_details->doctor_time_slot = json_decode($service_details->doctor_time_slot, true);
        $service_details->languages_known = json_decode($service_details->languages_known, true);

        $service_details->treatments = json_decode($service_details->treatments, true);
        $service_details->faq = json_decode($service_details->faq, true);

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

            'image'              => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'doctor_image'       => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

            'doctor_name'        => 'required|string|max:255',
            'doctor_exp'         => 'required|string|max:255',

            'doctor_availability'=> 'required|array|min:1',
            'doctor_availability.*' => 'string',

            'time_slot.from'     => 'required|array',
            'time_slot.to'       => 'required|array',
            'time_slot.from.*'   => 'required',
            'time_slot.to.*'     => 'required',

            'languages_known'    => 'required|array|min:1',

            'qualification'      => 'required|string',

            'overview_heading'   => 'required|string|max:255',
            'overview_desc'      => 'required|string',

            'exp_heading'        => 'required|string|max:255',
            'exp_desc'           => 'required|string',

            'treatment_heading'  => 'required|string|max:255',
            'treatment'          => 'required|array',
            'treatment.*.name'   => 'required|string',

            'faq_heading'        => 'required|string|max:255',
            'faq'                => 'required|array',
            'faq.*.question'     => 'required|string',
            'faq.*.answer'       => 'required|string',

            'social_media.*.platform' => 'required|string',
            'social_media.*.link'     => 'required|url',


        ], [
            'category_id.required'        => 'Master category is required.',
            'subcategory_id.required'     => 'Sub category is required.',
            'doctor_name.required'        => 'Doctor name is required.',
            'doctor_exp.required'         => 'Doctor experience is required.',
            'doctor_availability.required'=> 'Please select doctor availability.',
            'languages_known.required'    => 'Please select at least one language.',
            'qualification.required'      => 'Qualification is required.',
            'overview_heading.required'   => 'Overview heading is required.',
            'overview_desc.required'      => 'Overview description is required.',
            'treatment_heading.required'  => 'Treatment heading is required.',
            'faq_heading.required'        => 'FAQ heading is required.',

            'social_media.*.platform.required' => 'Social Media Platform is required.',
            'social_media.*.link.required'     => 'Social Media Link is required.',
            'social_media.*.link.url'          => 'Please enter a valid URL for Social Media Link.',

        ]);

        $uploadPath = public_path('uploads/doctors');

        // ================= IMAGE UPLOADS =================
        // Banner Image
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($doctor->banner_image && file_exists($uploadPath.'/'.$doctor->banner_image)) {
                unlink($uploadPath.'/'.$doctor->banner_image);
            }
            $img = $request->file('image');
            $bannerImage = time().'_banner.'.$img->getClientOriginalExtension();
            $img->move($uploadPath, $bannerImage);
            $doctor->banner_image = $bannerImage;
        }

        // Doctor Image
        if ($request->hasFile('doctor_image')) {
            // Delete old image if exists
            if ($doctor->doctor_image && file_exists($uploadPath.'/'.$doctor->doctor_image)) {
                unlink($uploadPath.'/'.$doctor->doctor_image);
            }
            $img = $request->file('doctor_image');
            $doctorImage = time().'_doctor.'.$img->getClientOriginalExtension();
            $img->move($uploadPath, $doctorImage);
            $doctor->doctor_image = $doctorImage;
        }

        // ================= JSON ENCODE DATA =================
        $doctor->category_id        = $request->category_id;
        $doctor->subcategory_id     = $request->subcategory_id;
        $doctor->service_id         = $request->service_id;

        $doctor->doctor_name        = $request->doctor_name;
        $doctor->doctor_exp         = $request->doctor_exp;

        $doctor->doctor_availability = json_encode($request->doctor_availability);
        $doctor->languages_known    = json_encode($request->languages_known);
        $doctor->qualification      = $request->qualification;

        $doctor->overview_heading   = $request->overview_heading;
        $doctor->overview_desc      = $request->overview_desc;

        $doctor->exp_heading        = $request->exp_heading;
        $doctor->exp_desc           = $request->exp_desc;

        $doctor->treatment_heading  = $request->treatment_heading;
        $doctor->treatments         = json_encode($request->treatment);

        $doctor->faq_heading        = $request->faq_heading;
        $doctor->faq                = json_encode($request->faq);
        $doctor->social_media_links  = json_encode($request->social_media);

        // Time Slots
        $timeSlots = [];
        foreach ($request->time_slot['from'] as $key => $from) {
            $timeSlots[] = [
                'from' => $from,
                'to'   => $request->time_slot['to'][$key] ?? null,
            ];
        }
        $doctor->doctor_time_slot = json_encode($timeSlots);



        $doctor->doctor_name = $request->doctor_name;

        // Always regenerate slug based on current name
        $slug = Str::slug($request->doctor_name);

        // Ensure uniqueness
        $count = Doctor::where('slug', 'LIKE', "$slug%")
                        ->where('id', '!=', $doctor->id)
                        ->count();

        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        $doctor->slug = $slug;



        $doctor->modified_at = Carbon::now();
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