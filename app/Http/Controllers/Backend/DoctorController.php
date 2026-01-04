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

        // ================= STORE DATA =================
        Doctor::create([
            'category_id'        => $request->category_id,
            'subcategory_id'     => $request->subcategory_id,
            'service_id'         => $request->service_id,

            'banner_image'       => $bannerImage,

            'doctor_name'        => $request->doctor_name,
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

            'created_at'         => Carbon::now(),
            'created_by'         => Auth::id(),
        ]);

        return redirect()
            ->route('admin.manage-doctors.index')
            ->with('message', 'Doctor added successfully.');
    }


}