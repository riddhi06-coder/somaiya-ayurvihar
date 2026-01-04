<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
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


use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

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

        // Decode JSON fields
        $service->features = json_decode($service->features, true) ?? [];
        $service->faq      = json_decode($service->faq, true) ?? [];
        $service->page_headers = array_values(json_decode($service->page_headers, true) ?? []);


        // 4️⃣ Pass subcategory & services to view
        return view('frontend.service_details', [
            'subcategory' => $subcategory,
            'service'    => $service,
        ]);
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
        $doctor->doctor_availability = json_decode($doctor->doctor_availability, true);
        $doctor->doctor_time_slot   = json_decode($doctor->doctor_time_slot, true);
        $doctor->languages_known    = json_decode($doctor->languages_known, true);

        $doctor->treatments = json_decode($doctor->treatments, true);
        $doctor->faq        = json_decode($doctor->faq, true);

        // 3️⃣ Pass doctor to view
        return view('frontend.doctor_details', [
            'doctor' => $doctor
        ]);
    }


}