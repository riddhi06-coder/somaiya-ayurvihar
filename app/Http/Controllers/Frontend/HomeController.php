<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


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
use App\Models\ManageManagementTeam;
use App\Models\ManageAccreditations;
use App\Models\ManageMediaCoverage;
use App\Models\ManageAyurveda;
use App\Models\ManageAlternateTherapy;
use App\Models\ManageHealthPackages;
use App\Models\ManageHealthPackagesDetails;
use App\Models\Contact;
use App\Models\Disclaimer;
use App\Models\TermsCondition;



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


        // 4️⃣ Fetch Health Packages (NEW 🔥)
        $healthPackages = ManageHealthPackages::where('sub_category_id', $subcategory->id)
                    ->whereNull('deleted_at')
                    ->orderBy('id', 'desc')
                    ->get();


        // 4️⃣ Pass subcategory & services to view
        return view('frontend.service_details', [
            'subcategory' => $subcategory,
            'service'    => $service,
            'doctors'    => $doctors,
            'healthPackages'  => $healthPackages,
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

    // About Management Team
    public function management_team()
    {
        $management_team  = ManageManagementTeam::orderBy('created_at', 'asc')->wherenull('deleted_by')->get();
        return view('frontend.management_team', compact('management_team'));
    }

    // About Accreditations
    public function accreditations()
    {
        $accreditations  = ManageAccreditations::orderBy('created_at', 'asc')->wherenull('deleted_by')->get();
        return view('frontend.accreditations', compact('accreditations'));
    }

    // Media Coverage
    public function media_coverage(Request $request)
    {
        $query = ManageMediaCoverage::whereNull('deleted_by');

        // 🔎 Search
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('media_heading', 'like', '%' . $request->search . '%')
                ->orWhere('media_publication', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        // 📅 Year Filter (FIXED)
        if ($request->filled('year')) {
            $query->whereYear('media_publication_date', $request->year);
        }

        // 📆 Month Filter (FIXED)
        if ($request->filled('month')) {
            $query->whereMonth('media_publication_date', $request->month);
        }

        // 📰 Source Filter
        // Source Filter
        if ($request->filled('source')) {
            $query->whereRaw('LOWER(TRIM(media_publication)) = ?', [
                strtolower(trim($request->source))
            ]);
        }

        // Type Filter
        if ($request->filled('type')) {
            $query->whereRaw('LOWER(TRIM(media_type)) = ?', [
                strtolower(trim($request->type))
            ]);
        }


        // dd($query->toSql(), $query->getBindings());

        $media_coverage = $query->orderBy('created_at', 'asc')->get();

        $years = ManageMediaCoverage::selectRaw('YEAR(media_publication_date) as year')
            ->whereNull('deleted_by')
            ->whereNotNull('media_publication_date')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        $months = ManageMediaCoverage::selectRaw('MONTH(media_publication_date) as month')
            ->whereNull('deleted_by')
            ->whereNotNull('media_publication_date')
            ->distinct()
            ->orderBy('month')
            ->pluck('month');

        $sources = ManageMediaCoverage::whereNull('deleted_by')
            ->distinct()
            ->pluck('media_publication');

        $types = ManageMediaCoverage::whereNull('deleted_by')
            ->distinct()
            ->pluck('media_type');

        return view('frontend.media_coverage', compact(
            'media_coverage',
            'years',
            'months',
            'sources',
            'types'
        ));
    }

    // Wellness Ayurveda
    public function ayurveda()
    {
        $ayurveda  = ManageAyurveda::orderBy('created_at', 'asc')->wherenull('deleted_by')->first();
        return view('frontend.ayurveda', compact('ayurveda'));
    }

    // Alternative Therapies
    public function alternative_therapies()
    {
        $alternative_therapies  = ManageAlternateTherapy::orderBy('created_at', 'asc')->wherenull('deleted_by')->get();
        return view('frontend.alternative_therapies', compact('alternative_therapies'));
    }

    // Health Packages
    public function health_packages(Request $request)
    {
        $query = ManageHealthPackages::whereNull('deleted_by');

        // ✅ Category Filter
        if ($request->category_id != null) {
            $query->where('sub_category_id', $request->category_id);
            // ⚠️ If your DB column name is different, change here
            // example: ->where('medical_service_subcategory_id', $request->category_id);
        }

        // ✅ Gender Filter
        if ($request->has('gender') && count($request->gender) > 0) {
            $query->where(function ($q) use ($request) {
                foreach ($request->gender as $gender) {
                    $q->orWhere('gender', 'LIKE', '%'.$gender.'%');
                }
            });
        }

        // ✅ Age Range Filter
        if ($request->has('age_range') && count($request->age_range) > 0) {
            $query->whereIn('age_range', $request->age_range);
        }

        // ✅ Get Filtered Packages
        $health_packages = $query->orderBy('created_at', 'asc')->paginate(6)->appends($request->query());


        // =========================
        // FILTER PANEL DATA
        // =========================

        // Categories
        $categories = MedicalServiceSubCategory::whereNull('deleted_by')
                            ->orderBy('subcategory_name', 'ASC')
                            ->get();

        // Genders (from ALL packages for filter display)
        $allPackages = ManageHealthPackages::whereNull('deleted_by')->get();

        $genders = $allPackages
                    ->pluck('gender')
                    ->filter()
                    ->map(fn($gender) => json_decode($gender, true))
                    ->filter()
                    ->flatten()
                    ->filter(fn($value) => !empty($value))
                    ->unique()
                    ->values();

        // Age Ranges
        $ageRanges = $allPackages
                        ->pluck('age_range')
                        ->filter()
                        ->unique()
                        ->values();

        return view('frontend.health_packages', compact(
            'health_packages',
            'categories',
            'genders',
            'ageRanges'
        ));
    }

    public function health_packages_details($slug)
    {
        // Fetch package basic info
        $package = ManageHealthPackages::where('slug', $slug)->firstOrFail();

        // Fetch package detailed info
        $details = ManageHealthPackagesDetails::where('package_id', $package->id)->first();

        // Decode genders if stored as JSON
        // Decode genders if stored as JSON, handle single string as well
        if (!empty($package->gender)) {
            $decoded = json_decode($package->gender, true);
            $genders = is_array($decoded) ? $decoded : [$package->gender];
        } else {
            $genders = [];
        }

        // dd($package,$details,$genders);

        return view('frontend.health_package_detail', compact('package', 'details', 'genders'));
    }

    // Contact Us
    public function contact_us()
    {
        $contact_us  = Contact::orderBy('created_at', 'asc')->wherenull('deleted_by')->first();
        return view('frontend.contact_us', compact('contact_us'));
    }

    // Disclaimer
    public function disclaimer()
    {
        $disclaimer  = Disclaimer::orderBy('created_at', 'asc')->wherenull('deleted_by')->first();
        return view('frontend.disclaimer', compact('disclaimer'));
    }

    // Terms & Condition
    public function terms_conditions()
    {
        $terms_conditions  = TermsCondition::orderBy('created_at', 'asc')->wherenull('deleted_by')->first();
        return view('frontend.terms_conditions', compact('terms_conditions'));
    }
    

    // Privacy
    public function privacy()
    {
        return view('frontend.privacy');
    }
    
    // Specialties
    public function specialties()
    {
        return view('frontend.specialties');
    }

    // Billing Process
    public function billing_process()
    {
        return view('frontend.billing_process');
    }

    // Insurance and Tpa
    public function insurance_and_tpa()
    {
        return view('frontend.insurance_and_tpa');
    }

    // Biomedical Waste
    public function biomedical_waste()
    {
        return view('frontend.biomedical_waste');
    }

    // Awards Accolades
    public function awards_accolades()
    {
        return view('frontend.awards_accolades');
    }

    // Blogs
    public function blogs()
    {
        return view('frontend.blogs');
    }

    // Inpatient Services
    public function inpatient_services()
    {
        return view('frontend.inpatient_services');
    }

    // Visitor Guide
    public function visitor_guide()
    {
        return view('frontend.visitor_guide');
    }

    // Rights And Responsibilities
    public function rights_and_responsibilities()
    {
        return view('frontend.rights_and_responsibilities');
    }


}