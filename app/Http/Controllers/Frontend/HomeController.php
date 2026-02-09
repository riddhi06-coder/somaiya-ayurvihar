<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Carbon\Carbon;


use App\Models\HomeSlider;
use App\Models\AnnouncementsDetail;
use App\Models\AwardsDetails;
use App\Models\CompassionDetails;
use App\Models\TestimonialDetail;
use App\Models\FooterDetail;
use App\Models\MedicalServiceSubCategory;
use App\Models\MedicalServiceCategory;
use App\Models\MedicalServiceMasterCategory;
use App\Models\ManageServiceDetail;
use App\Models\Doctor;
use App\Models\AboutIntro;
use App\Models\VisionMission;
use App\Models\ManageDiagnosticDetail;
use App\Models\ManageChairmanMessage;
use App\Models\ManageAssociation;
use App\Models\ManagePrayer;




class HomeController extends Controller
{

    // Home Page
    public function index()
    {
        $videoSlider = HomeSlider::where('media_type', 'video')->latest()->first();
        $announcements = AnnouncementsDetail::orderBy('created_at', 'desc')->get();
        $awardDetails = AwardsDetails::latest()->first(); // latest award record
        $compassion = CompassionDetails::latest()->first();
        $testimonial = TestimonialDetail::latest()->first();
       

        return view('frontend.home', compact('videoSlider', 'announcements', 'awardDetails', 'compassion', 'testimonial'));
    }

    // Service Page
    public function service_details($slug)
    {
        // 1️⃣ Fetch the subcategory by slug
        $subcategory = MedicalServiceSubCategory::where('slug', $slug)
            ->whereNull('deleted_by') // optional: only active
            ->firstOrFail();

       

        $service = ManageServiceDetail::with(['category', 'subcategory', 'service'])
            ->where('subcategory_id', $subcategory->id)
            ->whereNull('deleted_by')
            ->firstOrFail(); // better than first()

        //  dd($service);


        // Decode JSON fields
        $service->features = json_decode($service->features, true) ?? [];
        $service->faq      = json_decode($service->faq, true) ?? [];
        $service->page_headers = array_values(json_decode($service->page_headers, true) ?? []);
        $service->section_image = json_decode($service->section_image, true) ?? [];

         // 4️⃣ Fetch doctors linked to this subcategory
        $doctors = Doctor::where('subcategory_id', $subcategory->id)
            ->whereNull('deleted_by')
            ->get();

        // dd($doctors);


        // 4️⃣ Pass subcategory & services to view
        return view('frontend.service_details', [
            'subcategory' => $subcategory,
            'service'    => $service,
            'doctors'    => $doctors,
        ]);
    }

    // Diagnostic Service Page
    public function diagnostic_details($slug)
    {
        // Step 1: Fetch service mapping using slug
        $mapping = MedicalServiceCategory::where('slug', $slug)
            ->whereNull('deleted_by')
            ->firstOrFail();

        // Step 2: Fetch diagnostic detail using service_id
        $service = ManageDiagnosticDetail::with(['category', 'subcategory', 'service'])
            ->where('service_id', $mapping->id)
            ->whereNull('deleted_by')
            ->firstOrFail();

            // dd($service);
        // Decode JSON fields
        $service->faq = json_decode($service->faq, true) ?? [];

        $service->page_headers = json_decode($service->page_headers, true);
        $service->page_headers = is_array($service->page_headers) ? array_values($service->page_headers) : [];

        $service->section_image = json_decode($service->section_image, true);
        $service->section_image = is_array($service->section_image) ? $service->section_image : [];

        $service->service_image = json_decode($service->service_image, true);
        $service->service_image = is_array($service->service_image) ? $service->service_image : [];

        return view('frontend.diagnostic_details', compact('service'));
    }

    // Doctor Details Page
    public function doctor_details($doctoreslug)
    {
        // 1️⃣ Fetch the doctor by slug
        $doctor = Doctor::with(['category', 'subcategory', 'service'])
            ->where('slug', $doctoreslug)
            ->whereNull('deleted_by') // optional: only active
            ->firstOrFail();

        // dd($doctor);

        // 2️⃣ Decode JSON fields
        $doctor->doctor_time_slot   = json_decode($doctor->doctor_time_slot, true);

        $doctor->social_media_links  = json_decode($doctor->social_media_links, true);

        // dd($doctor->social_media_links);

        // 3️⃣ Pass doctor to view
        return view('frontend.doctor_details', [
            'doctor' => $doctor
        ]);
    }

    // About Intro
    public function introduction()
    {
        $sections  = AboutIntro::orderBy('created_at', 'asc')->wherenull('deleted_by')->get();
        return view('frontend.introduction', compact('sections'));
    }

    // About Vision & Mission
    public function vision_and_mision()
    {
        $vision_and_mision  = VisionMission::orderBy('created_at', 'asc')->wherenull('deleted_by')->first();
        return view('frontend.vision_and_mision', compact('vision_and_mision'));
    }

    // About Chairman's Message
    public function chairmans_message()
    {
        $chairmans_message  = ManageChairmanMessage::orderBy('created_at', 'asc')->wherenull('deleted_by')->first();
        return view('frontend.chairmans_message', compact('chairmans_message'));
    }

    // About Assosciations
    public function associations()
    {
        $associations  = ManageAssociation::orderBy('created_at', 'asc')->wherenull('deleted_by')->get();
        return view('frontend.associations', compact('associations'));
    }

    // About somaiya_prayer
    public function somaiya_prayer()
    {
        $somaiya_prayer  = ManagePrayer::orderBy('created_at', 'asc')->wherenull('deleted_by')->first();
        return view('frontend.somaiya_prayer', compact('somaiya_prayer'));
    }

}