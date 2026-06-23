<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\PreventBackHistoryMiddleware;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\KjshSubCategoryController;
use App\Http\Controllers\Backend\MedicalServiceCategoryController;
use App\Http\Controllers\Backend\MedicalServiceSubCategoryController;
use App\Http\Controllers\Backend\DoctorController;
use App\Http\Controllers\Backend\MedicalServiceCategoriesController;
use App\Http\Controllers\Backend\HomePage\HomeSliderController;
// use App\Http\Controllers\Backend\HomePage\AnnouncementsDetailsController;
use App\Http\Controllers\Backend\HomePage\AwardsDetailsController;
use App\Http\Controllers\Backend\HomePage\CompassionDetailsController;
use App\Http\Controllers\Backend\HomePage\TestimonialsDetailsController;
use App\Http\Controllers\Backend\HomePage\FooterDetailsController;
use App\Http\Controllers\Backend\ServiceDetailsController;
use App\Http\Controllers\Backend\AboutIntroController;
use App\Http\Controllers\Backend\AboutVisionController;
use App\Http\Controllers\Backend\DiagnosticCriticalDetailsController;
use App\Http\Controllers\Backend\ChairmanMessageController;
use App\Http\Controllers\Backend\AssociationController;
use App\Http\Controllers\Backend\PrayerController;
use App\Http\Controllers\Backend\ManagementTeamController;
use App\Http\Controllers\Backend\AccreditationsController;
use App\Http\Controllers\Backend\CSRSustainabilityController;
use App\Http\Controllers\Backend\MediaCoveragesController;
use App\Http\Controllers\Backend\AyurvedaController;
use App\Http\Controllers\Backend\AlternativeTherapyController;
use App\Http\Controllers\Backend\HealthPackagesController;
use App\Http\Controllers\Backend\HealthPackagesDetailsController;
use App\Http\Controllers\Backend\ContactUsController;
use App\Http\Controllers\Backend\DisclaimerController;
use App\Http\Controllers\Backend\TermsConditionController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\GalleryDetailsController;
use App\Http\Controllers\Backend\AnnouncementsController;
use App\Http\Controllers\Backend\AnnouncementsDetailsController;
use App\Http\Controllers\Backend\CareerListingController;
use App\Http\Controllers\Backend\CareerPageController;
use App\Http\Controllers\Backend\CareerDetailsController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BlogDetailsController;
use App\Http\Controllers\Backend\SpecialitiesController;
use App\Http\Controllers\Backend\BillingProcessController;
use App\Http\Controllers\Backend\InsuranceController;
use App\Http\Controllers\Backend\InsuranceCompanyController;
use App\Http\Controllers\Backend\BioMedicalWasteController;
use App\Http\Controllers\Backend\AwardsAccoladesController;
use App\Http\Controllers\Backend\AwardsAccolades1Controller;
use App\Http\Controllers\Backend\AwardsImagesController;
use App\Http\Controllers\Backend\CommunityOutreachController;
use App\Http\Controllers\Backend\RightsResponsibilityController;
use App\Http\Controllers\Backend\ConvenienceFacilitiesController;
use App\Http\Controllers\Backend\VisitorGuideController;
use App\Http\Controllers\Backend\InpatientServiceController;
use App\Http\Controllers\Backend\GovernmentSchemesController;
use App\Http\Controllers\Backend\TestimonialsController;
use App\Http\Controllers\Backend\VirtualTourController;
use App\Http\Controllers\Backend\AppointmentEnquiriesController;
use App\Http\Controllers\Backend\HealthPkgEnquiriesController;
use App\Http\Controllers\Backend\CareerEnquiriesController;
use App\Http\Controllers\Backend\ContactEnquiriesController;
use App\Http\Controllers\Backend\AyurvedaEnquiriesController;


//frontend controller
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\FormController;


// ----------------------
// 🔹 Backend Authentication Routes
// ----------------------
Route::get('/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('admin.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::get('/change-password', [LoginController::class, 'change_password'])->name('admin.changepassword');
Route::post('/update-password', [LoginController::class, 'updatePassword'])->name('admin.updatepassword');

Route::get('/register', [LoginController::class, 'register'])->name('admin.register');
Route::post('/register', [LoginController::class, 'authenticate_register'])->name('admin.register.authenticate');

// ----------------------
// 🔹 Backend (Admin Panel) Routes
// ----------------------
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth:web', PreventBackHistoryMiddleware::class])
    ->group(function () {
        
        // Dashboard
        Route::get('/dashboard', function () {
            return view('backend.dashboard');
        })->name('dashboard');

        // KJSH Menus
        Route::resource('category', CategoryController::class);
        Route::resource('kjshsubcategory', KjshSubCategoryController::class);

        // Medical Services Menus
        Route::resource('medicalservicecategory', MedicalServiceCategoryController::class);
        
        Route::post('medicalservicecategory/{id}/toggle-status', [MedicalServiceCategoryController::class, 'toggleStatus'])->name('medicalservicecategory.toggleStatus');        
        Route::resource('medicalservicesubcategory', MedicalServiceSubCategoryController::class);
        Route::post('medicalservicesubcategory/toggle-status', [MedicalServiceSubCategoryController::class, 'toggleStatus'])->name('medicalservicesubcategory.toggleStatus');
        
        Route::post('/admin/medicalsubcategory-toggle-highlight',[MedicalServiceSubCategoryController::class,'toggleHighlight'])->name('medicalsubcategory.toggle.highlight');
        Route::post('manage-medicalsubcategory/update-priority', [MedicalServiceSubCategoryController::class, 'updatePriority'])->name('manage-medicalsubcategory.updatePriority');
        
        Route::resource('medicalserviceallcategories', MedicalServiceCategoriesController::class);
        Route::post('manage-medicalservicecategory/update-priority', [MedicalServiceCategoriesController::class, 'updatePriority'])->name('manage-medicalservicecategory.updatePriority');
        Route::post('medicalserviceallcategories/toggle-status', [MedicalServiceCategoriesController::class, 'toggleStatus'])->name('medicalserviceallcategories.toggleStatus');
        
        
        // Doctors 
        Route::patch('manage-doctors/{id}/toggle-status', [DoctorController::class, 'toggleStatus'])->name('manage-doctors.toggleStatus'); 
        Route::post('manage-doctors/update-priority', [DoctorController::class, 'updatePriority'])->name('manage-doctors.updatePriority');
        Route::post('manage-doctors/import', [DoctorController::class, 'import'])->name('manage-doctors.import');
        Route::get('manage-doctors/import-template', [DoctorController::class, 'downloadTemplate'])->name('manage-doctors.template');
        Route::post('manage-doctors/upload-images', [DoctorController::class, 'uploadImages'])->name('manage-doctors.upload-images');
        Route::resource('manage-doctors', DoctorController::class);
    
    
        // Home slider
        Route::resource('banner-details', HomeSliderController::class);
        // Route::resource('announcements-details', AnnouncementsDetailsController::class);
        Route::resource('awards-details', AwardsDetailsController::class);
        Route::resource('compassion-details', CompassionDetailsController::class);
        Route::resource('testimonial-details', TestimonialsDetailsController::class);
        Route::resource('footer-details', FooterDetailsController::class);
        Route::resource('manage-virtual-tour', VirtualTourController::class);


        // About Us
        Route::resource('manage-about-intro', AboutIntroController::class);
        Route::resource('manage-vision-mission', AboutVisionController::class);
        Route::resource('manage-chairman-message', ChairmanMessageController::class);
        Route::resource('manage-associations', AssociationController::class);
        Route::resource('manage-prayer', PrayerController::class);
        Route::resource('manage-management-team', ManagementTeamController::class);
        Route::post('update-priority', [ManagementTeamController::class, 'updatePriority'])->name('manage-management-team.updatePriority');
        Route::resource('manage-csr-sustainability', CSRSustainabilityController::class);
        Route::resource('manage-accreditations', AccreditationsController::class);
        Route::resource('manage-community-outreach', CommunityOutreachController::class);


        // Wellness Center
        Route::resource('manage-ayurveda', AyurvedaController::class);
        Route::resource('manage-alternative-therapy', AlternativeTherapyController::class);  
        Route::resource('manage-health-packages', HealthPackagesController::class);  
        Route::resource('manage-packages-details', HealthPackagesDetailsController::class);  


        // Media & Events
        Route::resource('manage-gallery', GalleryController::class);
        Route::resource('manage-details-gallery', GalleryDetailsController::class);

        // Sevice Page Details
        Route::resource('manage-service-details', ServiceDetailsController::class);
        Route::resource('manage-diagnostic-critical', DiagnosticCriticalDetailsController::class);

        // Media Coverages
        Route::resource('manage-media-coverages', MediaCoveragesController::class);

        // Contact Us
        Route::resource('manage-contact-us', ContactUsController::class);

        // Policy Pages
        Route::resource('manage-disclaimer', DisclaimerController::class);
        Route::resource('manage-terms-condition', TermsConditionController::class);
        
        
        // Announcements
        Route::resource('manage-announcements', AnnouncementsController::class);
        Route::post('/announcement/toggle-featured', [AnnouncementsController::class, 'toggleFeatured'])->name('announcement.toggle-featured');
        Route::post('/announcement/update-priority', [AnnouncementsController::class, 'updatePriority'])->name('announcement.update-priority');
        Route::resource('manage-announce-details', AnnouncementsDetailsController::class);
    
    
        // Testimonials
        Route::resource('manage-testimonials', TestimonialsController::class);
        Route::post('manage-testimonials/update-priority', [TestimonialsController::class, 'updatePriority'])->name('manage-testimonials.updatePriority');
        Route::post('manage-testimonials/{id}/toggle-status', [TestimonialsController::class, 'toggleStatus'])->name('manage-testimonials.toggleStatus');
        
        
        // Career
        Route::resource('manage-career-page', CareerPageController::class);
        Route::resource('manage-career', CareerListingController::class);
        Route::resource('manage-details', CareerDetailsController::class);
        
        
        // Blogs
        Route::resource('manage-blogs', BlogController::class);
        Route::post('/blogs/update-priority', [BlogController::class, 'updatePriority'])->name('blogs.update-priority');
        Route::post('manage-blogs/{id}/toggle-status', [BlogController::class, 'toggleStatus'])->name('manage-blogs.toggle-status');
        Route::resource('manage-b-details', BlogDetailsController::class);
        
        
        
        // Footer Pages
        Route::resource('manage-specialities', SpecialitiesController::class);
        Route::resource('manage-billing-process', BillingProcessController::class);
        Route::resource('manage-insurance', InsuranceController::class);
        Route::resource('manage-company-panel', InsuranceCompanyController::class);
        Route::resource('manage-biomedical-waste', BioMedicalWasteController::class);
        Route::resource('manage-quality-awards', AwardsAccoladesController::class);
        Route::resource('manage-accolades-awards', AwardsAccolades1Controller::class);
        Route::resource('manage-images-awards', AwardsImagesController::class);
        
        
        // Patient Services 
        Route::resource('manage-rights-responsibility', RightsResponsibilityController::class);
        Route::resource('manage-convenience-facilities', ConvenienceFacilitiesController::class);
        Route::resource('manage-visitor-guide', VisitorGuideController::class);
        Route::resource('manage-inpatient-service', InpatientServiceController::class);
        Route::resource('manage-government-schemes', GovernmentSchemesController::class);
        
        
        // Form Enquiries 
        Route::resource('manage-appointment-enquiries', AppointmentEnquiriesController::class);
        Route::resource('health-pkg-enquiries', HealthPkgEnquiriesController::class);
        Route::resource('career-enquiries', CareerEnquiriesController::class);
        Route::resource('contact-enquiries', ContactEnquiriesController::class);
        Route::resource('ayurveda-enquiries', AyurvedaEnquiriesController::class);
        
        
    });

// ----------------------
// 🔹 Frontend Routes
// ----------------------


Route::get('/', [HomeController::class, 'index'])->name('frontend.index');


//======About Us Pages
Route::get('/introduction', [HomeController::class, 'introduction'])->name('frontend.introduction');
Route::get('/vision-and-mision', [HomeController::class, 'vision_and_mision'])->name('frontend.vision_and_mision');
Route::get('/chairmans-message', [HomeController::class, 'chairmans_message'])->name('frontend.chairmans_message');
Route::get('/associations', [HomeController::class, 'associations'])->name('frontend.associations');
Route::get('/somaiya-prayer', [HomeController::class, 'somaiya_prayer'])->name('frontend.somaiya_prayer');
Route::get('/management-team', [HomeController::class, 'management_team'])->name('frontend.management_team');
Route::get('/csr-sustainability', [HomeController::class, 'csr_sustainability'])->name('frontend.csr_sustainability');
Route::get('/accreditations', [HomeController::class, 'accreditations'])->name('frontend.accreditations');
Route::get('/media-coverage', [HomeController::class, 'media_coverage'])->name('frontend.media_coverage');
Route::get('/community-outreach', [HomeController::class, 'community_outreach'])->name('frontend.community_outreach');
Route::get('/find-a-doctor', [HomeController::class, 'find_a_doctor'])->name('frontend.find_a_doctor');


//=========Wellness Pages
Route::get('health-packages', [HomeController::class, 'health_packages'])->name('frontend.health_packages');
Route::get('/details/{slug}', [HomeController::class, 'health_packages_details'])->name('frontend.health_packages_details');
Route::get('ayurveda', [HomeController::class, 'ayurveda'])->name('frontend.ayurveda');
Route::get('alternative-therapies', [HomeController::class, 'alternative_therapies'])->name('frontend.alternative_therapies');


//=========Contact
Route::get('contact-us', [HomeController::class, 'contact_us'])->name('frontend.contact_us');
Route::get('thank-you', [HomeController::class, 'thank_you'])->name('frontend.thank_you');


//=========Gallery
Route::get('gallery', [HomeController::class, 'gallery_listing'])->name('frontend.gallery_listing');
Route::get('/gallery-details/{slug}', [HomeController::class, 'gallery_details'])->name('frontend.gallery_details');
Route::get('announcements', [HomeController::class, 'announcements'])->name('frontend.announcements');
Route::get('/announcements/{slug}', [HomeController::class, 'announcements_details'])->name('frontend.announcements_details');

Route::get('careers', [HomeController::class, 'careers'])->name('frontend.careers');
Route::get('search', [HomeController::class, 'search'])->name('frontend.search');
Route::get('/search-live', [HomeController::class, 'searchLive'])->name('search.live');
Route::get('/career-details/{slug}', [HomeController::class, 'careerDetails'])->name('career.details');

//=========Policy Pages
Route::get('disclaimers', [HomeController::class, 'disclaimer'])->name('frontend.disclaimer');
Route::get('terms-and-conditions', [HomeController::class, 'terms_conditions'])->name('frontend.terms_conditions');
Route::get('privacy', [HomeController::class, 'privacy'])->name('frontend.privacy');


//========= Footer Pages
Route::get('specialties', [HomeController::class, 'specialties'])->name('frontend.specialties');
Route::get('billing-process', [HomeController::class, 'billing_process'])->name('frontend.billing_process');
Route::get('insurance-and-tpa', [HomeController::class, 'insurance_and_tpa'])->name('frontend.insurance_and_tpa');
Route::get('biomedical-waste', [HomeController::class, 'biomedical_waste'])->name('frontend.biomedical_waste');
Route::get('awards-accolades', [HomeController::class, 'awards_accolades'])->name('frontend.awards_accolades');
Route::get('blogs', [HomeController::class, 'blogs'])->name('frontend.blogs');
Route::get('blog-details/{slug}', [HomeController::class, 'blogDetail'])->name('frontend.blog.detail');


//========= Patient Services Pages
Route::get('inpatient-services', [HomeController::class, 'inpatient_services'])->name('frontend.inpatient_services');
Route::get('visitor-guide', [HomeController::class, 'visitor_guide'])->name('frontend.visitor_guide');
Route::get('rights-and-responsibilities', [HomeController::class, 'rights_and_responsibilities'])->name('frontend.rights_and_responsibilities');
Route::get('convenience-and-facilities', [HomeController::class, 'convenience_and_facilities'])->name('frontend.convenience_and_facilities');
Route::get('government-schemes', [HomeController::class, 'government_schemes'])->name('frontend.government_schemes');



//===========Form Mail Submission Routes
Route::post('/health-checkup-submit', [FormController::class, 'healthCheckupSubmit'])->name('health.checkup.submit');
Route::get('/get-location-by-pincode', [FormController::class, 'getLocation'])->name('get.location');
Route::get('/get-doctors-by-speciality', [FormController::class, 'getDoctors'])->name('get.doctors');
Route::post('/doctor-appointment-submit', [FormController::class, 'doctorAppointmentSubmit'])->name('doctor.appointment.submit');
Route::get('get-doctor-slots', [FormController::class, 'getDoctorSlots'])->name('get.doctor.slots');
Route::post('/application/submit', [FormController::class, 'applicationSubmit'])->name('application.submit');
Route::post('/ayurveda-submit', [FormController::class, 'ayurveda_submit'])->name('ayurveda.submit');
Route::post('/contact-submit', [FormController::class, 'contactSubmit'])->name('contact.submit');


//======Service Page
Route::get('service/{slug}', [HomeController::class, 'diagnostic_details'])->name('frontend.diagnostic_details');
Route::get('/{slug}', [HomeController::class, 'service_details'])->name('frontend.service_details');


//=========Doctor Detailed Page
Route::get('doctor/{doctoreslug}', [HomeController::class, 'doctor_details'])->name('frontend.doctor_details');

