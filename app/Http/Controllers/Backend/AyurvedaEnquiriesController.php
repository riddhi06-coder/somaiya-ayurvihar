<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\AyurvedaEnquiry;


class AyurvedaEnquiriesController extends Controller
{

    public function index()
    {
        // fetch all enquiries, newest first
        $enquiries = AyurvedaEnquiry::orderByDesc('id')->get();
        return view('backend.enquiries.ayurveda.index', compact('enquiries'));
    }

    public function show($id)
    {
        $enquiry = AyurvedaEnquiry::findOrFail($id);
        return view('backend.enquiries.ayurveda.show', compact('enquiry'));
    }

}