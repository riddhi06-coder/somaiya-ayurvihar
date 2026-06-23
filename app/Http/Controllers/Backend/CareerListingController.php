<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\CareerListing;
use Illuminate\Http\Request;
use Carbon\Carbon;


class CareerListingController extends Controller
{

    public function index()
    {
        $careers = CareerListing::whereNull('deleted_at')
                        ->orderBy('id', 'desc')
                        ->get();
    
        return view('backend.career.listing.index', compact('careers'));
    }


    public function create()
    {
        return view('backend.career.listing.create');
    }
    
    
    public function store(Request $request)
    {
        // ✅ Validation
        $request->validate([
            'job_role' => 'required|string|max:255',
            'job_location' => 'required|string|max:255',
            'desc' => 'required|string',
        ], [
            'job_role.required' => 'Job role is required.',
            'job_location.required' => 'Job location is required.',
            'desc.required' => 'Job description is required.',
        ]);
    
        // ✅ Generate Slug
        $slug = Str::slug($request->job_role);
    
        // Ensure unique slug
        $count = CareerListing::where('slug', 'LIKE', "$slug%")->count();
        $slug = $count ? $slug . '-' . ($count + 1) : $slug;
    
        // ✅ Store Data
        CareerListing::create([
            'job_heading' => $request->job_role, 
            'desc' => $request->desc,
            'created_by' => Auth::id(),
            'created_at' => Carbon::now(),
            'slug' => $slug, 
            'job_location' => $request->job_location,
        ]);
    
        // ✅ Redirect
        return redirect()->route('admin.manage-career.index')->with('message', 'Job added successfully!');
    }
    
    
    public function edit($id)
    {
        $career_listing = CareerListing::findOrFail($id);
        return view('backend.career.listing.edit', compact('career_listing'));
    }
    
    
    public function update(Request $request, $id)
    {
        $career = CareerListing::findOrFail($id);
    
        // ✅ Validation
        $request->validate([
            'job_role' => 'required|string|max:255',
            'job_location' => 'required|string|max:255',
            'desc' => 'required|string',
        ], [
            'job_role.required' => 'Job role is required.',
            'job_location.required' => 'Job location is required.',
            'desc.required' => 'Job description is required.',
        ]);
    
        // ✅ Slug update
        $slug = Str::slug($request->job_role);
    
        $count = CareerListing::where('slug', 'LIKE', "$slug%")
                    ->where('id', '!=', $id)
                    ->count();
    
        $slug = $count ? $slug . '-' . ($count + 1) : $slug;
    
        // ✅ Update
        $career->update([
            'job_heading' => $request->job_role,
            'job_location' => $request->job_location,
            'desc' => $request->desc,
            'slug' => $slug,
            'modified_by' => auth()->id(),
            'modified_at' => now(),
        ]);
    
        return redirect()->route('admin.manage-career.index')
            ->with('message', 'Career updated successfully!');
    }
    
    
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = CareerListing::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-career.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}
