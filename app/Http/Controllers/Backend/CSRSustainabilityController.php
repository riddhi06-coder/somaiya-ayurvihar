<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\ManageSuatainability;


class CSRSustainabilityController extends Controller
{

    public function index()
    {
        return view('backend.about.sustainability.index');
    }

    public function create()
    {
        return view('backend.about.sustainability.create');
    }
}