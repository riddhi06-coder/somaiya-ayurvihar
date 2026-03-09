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
        $terms = TermsCondition::orderBy('created_at','asc')
                        ->whereNull('deleted_by')
                        ->get();

        return view('backend.policies.terms.index', compact('terms'));
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

    public function edit($id)
    {
        $terms = TermsCondition::findOrFail($id);
        return view('backend.policies.terms.edit',compact('terms'));
    }

    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'terms' => 'required|string'
        ], [
            'terms.required' => 'Terms field is required.'
        ]);

        // Find existing record
        $terms = TermsCondition::findOrFail($id);

        // Update Data
        $terms->terms = $request->terms;
        $terms->modified_at = Carbon::now();
        $terms->modified_by = Auth::id();
        $terms->save();

        // Redirect
        return redirect()->route('admin.manage-terms-condition.index')
            ->with('message', 'Terms updated successfully!');
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = TermsCondition::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-terms-condition.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}