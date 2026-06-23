<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\CareerApplication;

class CareerEnquiriesController extends Controller
{

    public function index()
    {
        $applications = CareerApplication::latest()->get();
     
        $jobTitles = CareerApplication::whereNotNull('job_title')
            ->distinct()->orderBy('job_title')->pluck('job_title');
     
        return view('backend.enquiries.career.index', compact('applications', 'jobTitles'));
    }
     
    public function show($id)
    {
        $application = CareerApplication::findOrFail($id);
     
        return view('backend.enquiries.career.show', compact('application'));
    }
     


}