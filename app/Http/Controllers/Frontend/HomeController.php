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


use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videoSlider = HomeSlider::where('media_type', 'video')->latest()->first();
        $announcements = AnnouncementsDetail::orderBy('created_at', 'desc')->get();
        $awardDetails = AwardsDetails::latest()->first(); // latest award record
        $compassion = CompassionDetails::latest()->first();
        $testimonial = TestimonialDetail::latest()->first();
       

        return view('frontend.home', compact('videoSlider', 'announcements', 'awardDetails', 'compassion', 'testimonial'));
    }


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
    // dd($service);

    // Decode JSON fields
    $service->features = json_decode($service->features, true) ?? [];
    $service->faq      = json_decode($service->faq, true) ?? [];

    // 4️⃣ Pass subcategory & services to view
    return view('frontend.service_details', [
        'subcategory' => $subcategory,
        'service'    => $service,
    ]);
}


}