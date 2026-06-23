<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Requests\DoctorFormRequest;
use App\Models\Disclaimer;

use DB;
use Carbon\Carbon;

class DisclaimerController extends Controller
{
    
    public function index()
    {
        $disclaimers = Disclaimer::orderBy('created_at','asc')
                        ->whereNull('deleted_by')
                        ->get();
                        
        // dd($disclaimers);

        return view('backend.policies.disclaimer.index', compact('disclaimers'));
    }

    public function create()
    {
        return view('backend.policies.disclaimer.create');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'disclaimer' => 'required|string'
        ], [
            'disclaimer.required' => 'Disclaimer field is required.'
        ]);

        // Save Data
        $disclaimer = new Disclaimer();
        $disclaimer->disclaimer = $request->disclaimer;
        $disclaimer->created_at = Carbon::now();
        $disclaimer->created_by = Auth::id();
        $disclaimer->save();

        // Redirect
        return redirect()->route('admin.manage-disclaimer.index')->with('message', 'Disclaimer added successfully!');
    }

    public function edit($id)
    {
        $disclaimer = Disclaimer::findOrFail($id);
        return view('backend.policies.disclaimer.edit',compact('disclaimer'));
    }

    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'disclaimer' => 'required|string'
        ], [
            'disclaimer.required' => 'Disclaimer field is required.'
        ]);

        // Find Record
        $disclaimer = Disclaimer::findOrFail($id);

        // Update Data
        $disclaimer->disclaimer = $request->disclaimer;
        $disclaimer->modified_at = Carbon::now();
        $disclaimer->modified_by = Auth::id();

        $disclaimer->save();

        // Redirect
        return redirect()->route('admin.manage-disclaimer.index')->with('message', 'Disclaimer updated successfully!');
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = Disclaimer::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-disclaimer.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
    
}