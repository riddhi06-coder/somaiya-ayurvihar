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
        Route::resource('medicalserviceallcategories', MedicalServiceCategoriesController::class);

        // Doctors 
        Route::resource('doctors', DoctorController::class);
        Route::post('doctors/{doctor}/toggle-featured', [DoctorController::class, 'toggleFeatured'])->name('doctors.toggleFeatured');
        Route::post('doctors/{doctor}/toggle-active', [DoctorController::class, 'toggleActive'])->name('doctors.toggleActive');
      
        // Home slider
        Route::resource('homeslider', HomeSliderController::class);
        Route::resource('announcements-details', AnnouncementsDetailsController::class);
        Route::resource('awards-details', AwardsDetailsController::class);
        Route::resource('compassion-details', CompassionDetailsController::class);
        Route::resource('testimonial-details', TestimonialsDetailsController::class);
        Route::resource('footer-details', FooterDetailsController::class);

    
    
    
    });

// ----------------------
// 🔹 Frontend Routes
// ----------------------

Route::get('/', [HomeController::class, 'index'])->name('frontend.index');
