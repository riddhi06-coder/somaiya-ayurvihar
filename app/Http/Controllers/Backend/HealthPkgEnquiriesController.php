<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\HealthCheckupEnquiries;


class HealthPkgEnquiriesController extends Controller
{

    public function index()
    {
        $enquiries = HealthCheckupEnquiries::latest()->get();
     
        // Distinct package names for the filter dropdown
        $packages = HealthCheckupEnquiries::whereNotNull('package')
            ->distinct()->orderBy('package')->pluck('package');
     
        return view('backend.enquiries.healthpkg.index', compact('enquiries', 'packages'));
    }
     
    public function show($id)
    {
        $enquiry = HealthCheckupEnquiries::findOrFail($id);
     
        return view('backend.enquiries.healthpkg.show', compact('enquiry'));
    }
     


}