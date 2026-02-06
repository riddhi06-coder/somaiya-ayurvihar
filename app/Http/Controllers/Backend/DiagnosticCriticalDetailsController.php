<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\MedicalServiceSubCategory;
use App\Models\MedicalServiceCategory;
use App\Models\MedicalServiceMasterCategory;
use App\Models\ManageDiagnosticDetail;


class DiagnosticCriticalDetailsController extends Controller
{

    public function index()
    {
        return view('backend.diagnostic.index');
    }

    public function create()
    {

        $masterCategories = MedicalServiceMasterCategory::orderBy('created_at', 'asc')->first();
        $subCategories = MedicalServiceSubCategory::all();
        $facility = MedicalServiceCategory::all();
        
        return view('backend.diagnostic.create' ,compact('masterCategories', 'subCategories','facility'));
    }
}