<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\ManageAlternateTherapy;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AlternativeTherapyController extends Controller
{

    public function index()
    {
        return view('backend.wellness.alternate_therapy.index');
    }

    public function create()
    {
        return view('backend.wellness.alternate_therapy.create');
    }
}