<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\DoctorAppointmentEnquiries;


class AppointmentEnquiriesController extends Controller
{

    public function index()
    {
        $appointments = DoctorAppointmentEnquiries::latest()->get();
     
        // Options for the filter dropdowns (distinct values that exist in the data)
        $doctors = DoctorAppointmentEnquiries::whereNotNull('doctor_name')
            ->distinct()->orderBy('doctor_name')->pluck('doctor_name');
     
        $specialities = DoctorAppointmentEnquiries::whereNotNull('speciality')
            ->distinct()->orderBy('speciality')->pluck('speciality');
     
        return view('backend.enquiries.appointment.index',
            compact('appointments', 'doctors', 'specialities'));
    }
 
    public function show($id)
    {
        $appointment = DoctorAppointmentEnquiries::findOrFail($id);
        return view('backend.enquiries.appointment.show', compact('appointment'));
    }


}