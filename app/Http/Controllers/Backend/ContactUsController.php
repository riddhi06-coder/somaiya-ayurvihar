<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Requests\DoctorFormRequest;
use DB;
use Carbon\Carbon;

use App\Models\MedicalServiceSubCategory;
use App\Models\MedicalServiceCategory;
use App\Models\MedicalServiceMasterCategory;
use App\Models\Doctor;


class ContactUsController extends Controller
{
    
    public function index()
    {
        return view('backend.contact.index');
    }


    public function create()
    {
        return view('backend.contact.create');
    }
}
