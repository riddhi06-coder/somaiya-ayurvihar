<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ContactEnquiry;


class ContactEnquiriesController extends Controller
{

    public function index()
    {
        // fetch all enquiries, newest first
        $enquiries = ContactEnquiry::orderByDesc('id')->get();
        return view('backend.enquiries.contact.index', compact('enquiries'));
    }

    public function show($id)
    {
        $enquiry = ContactEnquiry::findOrFail($id);
        return view('backend.enquiries.contact.show', compact('enquiry'));
    }

}