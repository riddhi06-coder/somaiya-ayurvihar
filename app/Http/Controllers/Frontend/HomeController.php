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
use App\Models\Gallery;
use App\Models\GalleryDetail;
use App\Models\Announcements;
use App\Models\AnnouncementDetails;
use App\Models\CareerPage;
use App\Models\CareerListing;
use App\Models\CareerDetails;
use App\Models\Blog;
use App\Models\BlogDetails;
use App\Models\Specialities;
use App\Models\BillingProcess;
use App\Models\Insurance;
use App\Models\InsuranceCompany;
use App\Models\BiomedicalWaste;
use App\Models\AwardsQuality;
use App\Models\AccoladesAwards;
use App\Models\AwardsImages;
use App\Models\CsrSustainability;
use App\Models\RightsResponsibility;
use App\Models\InpatientService;
use App\Models\VisitorGuide;
use App\Models\ConvenienceFacility;
use App\Models\Governmentschemes;
use App\Models\CommunityOutreach;
use App\Models\Testimonial;
use App\Models\VirtualTour;


class HomeController extends Controller
{

    // Home Page
    public function index()
    {
        $videoSlider = HomeSlider::where('media_type', 'video')->latest()->first();
        $announcements = Announcements::whereNull('deleted_at')
                ->where('is_featured', 1)
                ->orderBy('id', 'desc')
                ->get();
        // dd($announcements);
        $awardDetails = AwardsDetails::latest()->first(); // latest award record
        $compassion = CompassionDetails::latest()->first();
        // dd($compassion);
        $testimonial = TestimonialDetail::latest()->first();
        $specialities = MedicalServiceSubCategory::wherenull('deleted_by')->where('status', 1 )->get();
        // dd($specialities);
        
        
        $textTestimonials = Testimonial::wherenull('deleted_by')
            ->where('type', 'text')
            ->where('is_active', 1)
            ->orderByRaw('priority IS NULL, priority ASC')
            ->get();
        
        $videoTestimonials = Testimonial::wherenull('deleted_by')
            ->where('type', 'video')
            ->where('is_active', 1)
            ->orderByRaw('priority IS NULL, priority ASC')
            ->get();
            
        $virtualTour = VirtualTour::wherenull('deleted_by')->latest()->first();

        return view('frontend.home', compact('videoSlider', 'announcements', 'awardDetails', 'compassion', 'testimonial','specialities','textTestimonials', 'videoTestimonials','virtualTour'));
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
            // ->whereNotNull('priority')
            ->orderBy('id', 'asc')
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
        $management_team  = ManageManagementTeam::whereNotNull('priority')->orderBy('priority', 'asc')->wherenull('deleted_by')->get();
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

        $media_coverage = $query->orderBy('created_at', 'desc')->get();

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
            ->whereNotNull('media_publication')
            ->where('media_publication', '!=', '')
            ->distinct()
            ->pluck('media_publication');
        
        $types = ManageMediaCoverage::whereNull('deleted_by')
            ->whereNotNull('media_type')
            ->where('media_type', '!=', '')
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
        
        // ✅ Type Filter
        if ($request->type != null) {
            $type = strtolower($request->type);
        
            $query->whereRaw('LOWER(package_name) LIKE ?', ["{$type} %"]);
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
        
        
        // ✅ Types (Extract from package_name)
        $types = $allPackages
                ->pluck('package_name')
                ->filter()
                ->map(function ($name) {
                    return preg_split('/\s+/', trim($name))[0];
                })
                ->unique()
                ->values();
                
                
        // dd($allPackages, $types);
            
    
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
            'ageRanges', 'types'
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
        $specialities = Specialities::with('subcategory')->wherenull('deleted_by')->get();
        return view('frontend.specialties', compact('specialities'));
    }

    // Billing Process
    public function billing_process()
    {
        $billing = BillingProcess::whereNull('deleted_by')->first();
    
        if ($billing) {
            $billing->visitor_details = json_decode($billing->visitor_details, true);
            $billing->room_types = json_decode($billing->room_types, true);
            $billing->document_timelines = json_decode($billing->document_timelines, true);
        }
    
        return view('frontend.billing_process', compact('billing'));
    }

    // Insurance and Tpa
    public function insurance_and_tpa()
    {
        $insurance = Insurance::wherenull('deleted_by')->first();
    
        $cashlessDetails = !empty($insurance->cashless_details) 
            ? json_decode($insurance->cashless_details, true) 
            : [];
    
        $faqData = !empty($insurance->faq) 
            ? json_decode($insurance->faq, true) 
            : [];
            
        $panels = InsuranceCompany::whereNull('deleted_by')->get();

        $panelData = [];
        
        foreach ($panels as $panel) {
            $panelData[$panel->insurance_type] = json_decode($panel->company_data, true);
        }
    
        return view('frontend.insurance_and_tpa', compact(
            'insurance',
            'cashlessDetails',
            'faqData','panelData'
        ));
    }

    // Biomedical Waste
    public function biomedical_waste()
    {
        $biomedical_wastes = BiomedicalWaste::orderBy('created_at', 'desc')->wherenull('deleted_by')->get();
        return view('frontend.biomedical_waste', compact('biomedical_wastes'));
    }

    // Awards Accolades
    public function awards_accolades()
    {
        $awards = AwardsQuality::wherenull('deleted_by')->orderBy('id', 'asc')->get();
        
        $main_award = AccoladesAwards::whereNull('deleted_by')
                    ->where('id', 1)
                    ->first();
        
        $awards_accolades = AccoladesAwards::wherenull('deleted_by')->orderBy('id', 'asc')->get();
        $awards_images = AwardsImages::wherenull('deleted_by')->orderBy('id', 'asc')->get();
        return view('frontend.awards_accolades', compact('awards','awards_accolades','awards_images','main_award'));
    }

    // Blogs
    public function blogs()
    {
        $blogs = Blog::whereNull('deleted_at')
                    ->where('is_active', 1)
                    ->orderBy('date', 'desc')
                    ->get();
    
        return view('frontend.blogs', compact('blogs'));
    }
    
        
    // Blogs Details
    public function blogDetail($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
    
        // ✅ Fetch Blog Details (based on blog_id)
        $blogDetails = BlogDetails::where('blog_id', $blog->id)->first();
    
        // ✅ Recent Blogs
        $recentBlogs = Blog::where('id', '!=', $blog->id)
                        ->whereNull('deleted_at')
                        ->orderBy('date', 'desc')
                        ->take(3)
                        ->get();
                        
        // dd($recentBlogs);
    
        return view('frontend.blog_details', compact('blog', 'blogDetails', 'recentBlogs'));
    }

    // Inpatient Services
    public function inpatient_services()
    {
        $details = InpatientService::whereNull('deleted_at')->first();
    
        $roomTariffData     = [];
        $superSpecialtyData = [];
        $faqData            = [];
    
        if ($details) {
            $roomTariffData     = json_decode($details->room_tariff_details, true) ?? [];
            $superSpecialtyData = json_decode($details->super_specialty_details, true) ?? [];
            $faqData            = json_decode($details->faq, true) ?? [];
        }

        return view('frontend.inpatient_services', compact(
            'details', 'roomTariffData', 'superSpecialtyData', 'faqData'
        ));
    }

    // Visitor Guide
    public function visitor_guide()
    {
        $details = VisitorGuide::whereNull('deleted_at')->first();
     
        // Avoid errors if the table is empty
        $visitingHours = [];
        $faqData       = [];
     
        if ($details) {
            $visitingHours = json_decode($details->visiting_hour_details, true) ?? [];
            $faqData       = json_decode($details->faq, true) ?? [];
        }
     
        return view('frontend.visitor_guide', compact(
            'details',
            'visitingHours',
            'faqData'
        ));
    }

    // Rights And Responsibilities
    public function rights_and_responsibilities()
    {
        $details = RightsResponsibility::wherenull('deleted_by')->first();
        $details->faq = json_decode($details->faq, true);
        return view('frontend.rights_and_responsibilities', compact('details'));
    }

    // Convenience & Facilities
    public function convenience_and_facilities()
    {
        $details = ConvenienceFacility::whereNull('deleted_at')->first();
     
        // Avoid errors if the table is empty
        $cafeteriaDetails = [];
        $atmDetails       = [];
        $pharmacyDetails  = [];
        $faqData          = [];
     
        if ($details) {
            $cafeteriaDetails = json_decode($details->cafeteria_details, true) ?? [];
            $atmDetails       = json_decode($details->atm_details, true) ?? [];
            $pharmacyDetails  = json_decode($details->pharmacy_details, true) ?? [];
            $faqData          = json_decode($details->faq, true) ?? [];
        }
     
        return view('frontend.convenience_and_facilities', compact(
            'details',
            'cafeteriaDetails',
            'atmDetails',
            'pharmacyDetails',
            'faqData'
        ));
    }

  
    // Government Schemes
    public function government_schemes()
    {
        $details = Governmentschemes::whereNull('deleted_at')->first();
    
        // Avoid errors if the table is empty
        $eligibilityTitles = [];
        $mjpjaySteps       = [];
        $faqData           = [];
    
        if ($details) {
            $eligibilityTitles = json_decode($details->eligibility_titles, true) ?? [];
            $mjpjaySteps       = json_decode($details->mjpjay_steps, true) ?? [];
            $faqData           = json_decode($details->faq, true) ?? [];
        }
    
        return view('frontend.government_schemes', compact(
            'details',
            'eligibilityTitles',
            'mjpjaySteps',
            'faqData'
        ));
    }

    // Gallery
    public function gallery_listing(Request $request)
    {
        
        // dd($request);
        $query = Gallery::whereNull('deleted_by'); // ✅ no get()

       if ($request->filled('search')) {
            $query->where('event_name', 'like', '%' . $request->search . '%');
        }
        
        if ($request->filled('year')) {
            $query->whereYear('date', $request->year);
        }


        // ✅ Apply order + get at the end
        $galleries = $query->orderBy('date', 'desc')->get();
        // dd($galleries);
        
        
        // ✅ Get unique years from DB
       $years = Gallery::whereNull('deleted_by')
            ->whereNotNull('date') // ✅ IMPORTANT FIX
            ->selectRaw('YEAR(date) as year')
            ->groupByRaw('YEAR(date)')
            ->orderByRaw('YEAR(date) DESC')
            ->pluck('year');
                
        // dd($years);

        return view('frontend.gallery_listing', compact('galleries','years'));
    }

    // gallery_details
    public function gallery_details($slug)
    {
        // ✅ Fetch event using slug
        $gallery = Gallery::where('slug', $slug)->firstOrFail();

        // ✅ Fetch details using gallery_id
        $details = GalleryDetail::where('gallery_id', $gallery->id)->first();

        // ✅ Decode images
        $images = [];

        if ($details && $details->images) {
            $images = json_decode($details->images, true);
        }

        return view('frontend.gallery_details', compact('gallery', 'details', 'images'));
    }

    // Csr Sustainability
    public function csr_sustainability()
    {
        $csr = CsrSustainability::wherenull('deleted_by')->firstOrFail();
        $gallery = !empty($csr->gallery_images) 
                ? json_decode($csr->gallery_images, true) 
                : [];

        return view('frontend.csr_sustainability', compact('csr','gallery'));
    }

   
    // Community Outreach
    public function community_outreach()
    {
        $details = CommunityOutreach::whereNull('deleted_at')->first();
    
        $programmes = [];
    
        if ($details) {
            $programmes = json_decode($details->programmes, true) ?? [];
        }
    
        return view('frontend.community_outreach', compact(
            'details',
            'programmes'
        ));
    }


    // Find a Dcotor
    public function find_a_doctor()
    {

        // 4️⃣ Fetch doctors linked to this subcategory
        $doctors = Doctor::whereNull('deleted_by')
            // ->whereNotNull('priority')
            ->orderBy('id', 'asc')
            ->get();


        // Fetch all subcategories for the speciality filter
        $subcategories = MedicalServiceSubCategory::whereNull('deleted_by')->get();
        
        // dd($subcategories,$doctors);

        return view('frontend.find_a_doctor', compact('doctors','subcategories') );
    }


    
    // Announcements
    public function announcements(Request $request)
    {
        $query = Announcements::query();
    
        $query->whereNull('deleted_at'); // OR deleted_by
     
        // ✅ Filter by Year
        if ($request->filled('year')) {
            $query->whereYear('date', $request->year);
        }
    
        // ✅ Filter by Month
        if ($request->filled('month')) {
            $query->whereMonth('date', $request->month);
        }

        
        $months = Announcements::whereNull('deleted_at')
            ->whereNotNull('date')
            ->selectRaw('MONTH(date) as month')
            ->distinct()
            ->orderBy('month')
            ->pluck('month');
        
        // dd($months);
    
        $announcements = $query->orderBy('date', 'desc')->get();
    
        // ✅ Get Years dynamically
        $years = Announcements::whereNull('deleted_at') // same condition
                ->whereNotNull('date') // important
                ->selectRaw('YEAR(date) as year')
                ->distinct()
                ->orderBy('year', 'desc')
                ->pluck('year');
    
        return view('frontend.announcements', compact('announcements', 'years', 'months'));
    }
    
    
    // Announcements Details
    public function announcements_details($slug)
    {
        $announcement = AnnouncementDetails::whereHas('announcement', function ($q) use ($slug) {
            $q->where('slug', $slug);
        })
        ->with('announcement')
        ->firstOrFail();
    
        // latest sidebar
        $latest = AnnouncementDetails::with('announcement')
            ->whereNull('deleted_at')
            ->latest()
            ->take(5)
            ->get();
    
        return view('frontend.announcements_details', compact('announcement', 'latest'));
    }
    
    
    // careers
    public function careers()
    {
        $career = CareerPage::whereNull('deleted_at')->first();
        $benefits = !empty($career->benefits) ? json_decode($career->benefits, true) : [];
        
        $job_list = CareerListing::whereNull('deleted_at')->get();
    
        return view('frontend.careers', compact('career', 'benefits','job_list'));
    }
    
    // careers details
    public function careerDetails($slug)
    {
        $job = CareerListing::where('slug', $slug)->firstOrFail();
    
        // fetch details using job_id
        $details = CareerDetails::where('job_id', $job->id)->first();
    
        return view('frontend.career_details', compact('job', 'details'));
    }
    
    // Thankyou
    public function thank_you()
    {
        return view('frontend.thank_you');
    }
    
    // Search
    public function search()
    {
        return view('frontend.search');
    }
    
    // Search Results
    public function searchLive(Request $request)
    {
        $query = trim($request->search);
    
        // ✅ ONLY Sub Categories → Specialities
        $specialities = DB::table('medical_service_sub_categories')
            ->whereNull('deleted_by')
            ->where('subcategory_name', 'LIKE', "%{$query}%")
            ->select('subcategory_name as name', 'slug')
            
            ->get();
    
        // ✅ Services grouped by Master Category
        $services = DB::table('medical_service_categorie as s')
            ->join('medical_service_master_categories as m', 's.category_id', '=', 'm.id')
            ->whereNull('s.deleted_by')
            ->whereNull('m.deleted_by')
            ->where('s.service_name', 'LIKE', "%{$query}%")
            ->select(
                's.service_name as name',
                's.slug',
                'm.category_name'
            )
            ->get();
    
        $servicesGrouped = $services->groupBy('category_name');
    
        // Packages
        $packages = DB::table('health_packages')
            ->whereNull('deleted_by')

            ->where('package_name', 'LIKE', "%{$query}%")
            ->get();
    
        // Doctors
        $doctors = DB::table('doctors')
            ->whereNull('deleted_by')

            ->where('doctor_name', 'LIKE', "%{$query}%")
            ->get();
            
            
        // Gallery
        $gallery = DB::table('gallery_list')
            ->whereNull('deleted_by')

            ->where('event_name', 'LIKE', "%{$query}%") // change column if needed
            ->select('event_name as name', 'slug')
            ->get();
        
        // Media Coverage
        $media = DB::table('media_coverages')
                ->whereNull('deleted_by')
                ->where(function ($q) use ($query) {
                    $q->where('media_heading', 'LIKE', "%{$query}%")
                      ->orWhere('description', 'LIKE', "%{$query}%")
                      ->orWhere('media_publication', 'LIKE', "%{$query}%");
                })
                ->select(
                    'media_heading as name',
                    'description',
                    'media_publication',
                    'url'
                )
                ->get();
                
            
        // ✅ Alternate Therapy
        $alternateTherapy = DB::table('alternate_therapy')
            ->whereNull('deleted_by')
            ->where('heading', 'LIKE', "%{$query}%")
            ->select('heading as name')
            ->get();
            
            
        // ✅ Ayurveda
        $ayurveda = DB::table('ayurveda')
            ->whereNull('deleted_by')
            ->where('heading', 'LIKE', "%{$query}%")
            ->select('heading as name')
            ->get();
            
            
        return response()->json([
            'specialities' => $specialities,   
            'servicesGrouped' => $servicesGrouped,
            'packages' => $packages,
            'doctors' => $doctors,
            'gallery' => $gallery,        
            'media' => $media,
            'alternateTherapy' => $alternateTherapy,
            'ayurveda' => $ayurveda
        ]);
    }
    
    

}