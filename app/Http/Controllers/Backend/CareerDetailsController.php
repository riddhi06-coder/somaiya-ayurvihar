<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\CareerListing;
use App\Models\CareerDetails;
use Illuminate\Http\Request;
use Carbon\Carbon;


class CareerDetailsController extends Controller
{

    public function index()
    {
        $details = CareerDetails::with('job') // relationship
                    ->wherenull('deleted_by')
                    ->orderBy('id', 'desc')
                    ->get();
    
        return view('backend.career.details.index', compact('details'));
    }

    public function create()
    {
        $jobs = CareerListing::whereNull('deleted_at')
                    ->orderBy('job_heading', 'asc')
                    ->get();
    
        return view('backend.career.details.create', compact('jobs'));
    }
    
    public function store(Request $request)
    {
        // ✅ Validation
        $request->validate([
            'job_id' => 'required|exists:career_listing,id',
            'department' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'job_type' => 'required|string|max:255',
            'job_details' => 'required|string',
            'desc' => 'required|string',
        ], [
            'job_id.required' => 'Please select a Job Role.',
            'job_id.exists' => 'Selected Job Role is invalid.',
    
            'department.required' => 'Department is required.',
            'experience.required' => 'Experience is required.',
            'job_type.required' => 'Job type is required.',
    
            'job_details.required' => 'Job details are required.',
            'desc.required' => 'Job description is required.',
        ]);
    
        // ✅ Store Data
        CareerDetails::create([
            'job_id' => $request->job_id,
            'department' => $request->department,
            'experience' => $request->experience,
            'job_type' => $request->job_type,
            'job_details' => $request->job_details,
            'desc' => $request->desc,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);
    
        // ✅ Redirect
        return redirect()->route('admin.manage-details.index')->with('message', 'Job details added successfully!');
    }
    
    public function edit($id)
    {
        $job_details = CareerDetails::findOrFail($id);
        $jobs = CareerListing::whereNull('deleted_at')
                    ->orderBy('job_heading', 'asc')
                    ->get();
    
    
        return view('backend.career.details.edit', compact('job_details','jobs'));
    }
    
    public function update(Request $request, $id)
    {
        $job = CareerDetails::findOrFail($id);
    
        // ✅ Validation
        $request->validate([
            'job_id' => 'required|exists:career_listing,id',
            'department' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'job_type' => 'required|string|max:255',
            'job_details' => 'required|string',
            'desc' => 'required|string',
        ], [
            'job_id.required' => 'Please select a Job Role.',
            'department.required' => 'Department is required.',
            'experience.required' => 'Experience is required.',
            'job_type.required' => 'Job type is required.',
            'job_details.required' => 'Job details are required.',
            'desc.required' => 'Job description is required.',
        ]);
    
        // ✅ Update
        $job->update([
            'job_id' => $request->job_id,
            'department' => $request->department,
            'experience' => $request->experience,
            'job_type' => $request->job_type,
            'job_details' => $request->job_details,
            'desc' => $request->desc,
            'modified_by' => auth()->id(),
            'modified_at' => now(),
        ]);
    
        return redirect()->route('admin.manage-details.index')->with('message', 'Job details updated successfully!');
    }
    
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = CareerDetails::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-details.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
    
}