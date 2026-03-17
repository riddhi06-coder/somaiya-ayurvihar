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
use App\Http\Controllers\Backend\HomePage\AnnouncementsDetailsController;
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


//frontend controller
use App\Http\Controllers\Frontend\HomeController;

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
        Route::resource('medicalservicesubcategory', MedicalServiceSubCategoryController::class);
        Route::post('/admin/medicalsubcategory-toggle-highlight',[MedicalServiceSubCategoryController::class,'toggleHighlight'])->name('medicalsubcategory.toggle.highlight');

        Route::resource('medicalserviceallcategories', MedicalServiceCategoriesController::class);

        // Doctors 
        Route::resource('manage-doctors', DoctorController::class);
        Route::patch('manage-doctors/{id}/toggle-status', [DoctorController::class, 'toggleStatus'])->name('manage-doctors.toggleStatus'); 
    
    
        // Home slider
        Route::resource('banner-details', HomeSliderController::class);
        Route::resource('announcements-details', AnnouncementsDetailsController::class);
        Route::resource('awards-details', AwardsDetailsController::class);
        Route::resource('compassion-details', CompassionDetailsController::class);
        Route::resource('testimonial-details', TestimonialsDetailsController::class);
        Route::resource('footer-details', FooterDetailsController::class);


        // About Us
        Route::resource('manage-about-intro', AboutIntroController::class);
        Route::resource('manage-vision-mission', AboutVisionController::class);
        Route::resource('manage-chairman-message', ChairmanMessageController::class);
        Route::resource('manage-associations', AssociationController::class);
        Route::resource('manage-prayer', PrayerController::class);
        Route::resource('manage-management-team', ManagementTeamController::class);
        Route::resource('manage-csr-sustainability', CSRSustainabilityController::class);
        Route::resource('manage-accreditations', AccreditationsController::class);


        // Wellness Center
        Route::resource('manage-ayurveda', AyurvedaController::class);
        Route::resource('manage-alternative-therapy', AlternativeTherapyController::class);  
        Route::resource('manage-health-packages', HealthPackagesController::class);  
        Route::resource('manage-packages-details', HealthPackagesDetailsController::class);  



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


//=========Wellness Pages
Route::get('health-packages', [HomeController::class, 'health_packages'])->name('frontend.health_packages');
Route::get('/details/{slug}', [HomeController::class, 'health_packages_details'])->name('frontend.health_packages_details');
Route::get('ayurveda', [HomeController::class, 'ayurveda'])->name('frontend.ayurveda');
Route::get('alternative-therapies', [HomeController::class, 'alternative_therapies'])->name('frontend.alternative_therapies');


//=========Contact
Route::get('contact-us', [HomeController::class, 'contact_us'])->name('frontend.contact_us');

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


//========= Patient Services Pages
Route::get('inpatient-services', [HomeController::class, 'inpatient_services'])->name('frontend.inpatient_services');
Route::get('visitor-guide', [HomeController::class, 'visitor_guide'])->name('frontend.visitor_guide');
Route::get('rights-and-responsibilities', [HomeController::class, 'rights_and_responsibilities'])->name('frontend.rights_and_responsibilities');


//======Service Page
Route::get('service/{slug}', [HomeController::class, 'diagnostic_details'])->name('frontend.diagnostic_details');
Route::get('/{slug}', [HomeController::class, 'service_details'])->name('frontend.service_details');


//=========Doctor Detailed Page
Route::get('doctor/{doctoreslug}', [HomeController::class, 'doctor_details'])->name('frontend.doctor_details');

