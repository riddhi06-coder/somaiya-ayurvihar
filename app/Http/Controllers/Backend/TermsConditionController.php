<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Requests\DoctorFormRequest;
use App\Models\TermsCondition;

use DB;
use Carbon\Carbon;

class TermsConditionController extends Controller
{
    
    public function index()
    {
        return view('backend.policies.terms.index');
    }

    public function create()
    {
        return view('backend.policies.terms.create');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'terms' => 'required|string'
        ], [
            'terms.required' => 'Terms field is required.'
        ]);

        // Save Data
        $terms = new TermsCondition();
        $terms->terms = $request->terms;
        $terms->created_at = Carbon::now();
        $terms->created_by = Auth::id();
        $terms->save();

        // Redirect
        return redirect()->route('admin.manage-terms-condition.index')->with('message', 'Terms added successfully!');
    }
}