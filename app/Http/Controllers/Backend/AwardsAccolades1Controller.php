<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\AccoladesAwards;


class AwardsAccolades1Controller extends Controller
{

    public function index()
    {
        $awards = AccoladesAwards::wherenull('deleted_by')->orderBy('id', 'asc')->get();
        return view('backend.awards.accolades.index', compact('awards'));
    }

    public function create()
    {
        $recordCount = AccoladesAwards::count();
        return view('backend.awards.accolades.create', compact('recordCount'));
    }
    
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'heading'       => 'nullable|string|max:255',
            'short_desc'    => 'nullable|string',
            'banner_image'  => 'required|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'date'          => 'required|date',
            'desc'          => 'required|string',
        ], [
            'heading.required'        => 'Heading is required.',
            'short_desc.required'     => 'Short description is required.',
            'banner_image.required'   => 'Banner image is required.',
            'banner_image.image'      => 'File must be an image.',
            'banner_image.mimes'      => 'Only JPG, JPEG, PNG, WEBP, SVG formats are allowed.',
            'banner_image.max'        => 'Image size must be less than 2MB.',
            'date.required'           => 'Date is required.',
            'date.date'               => 'Please enter a valid date.',
            'desc.required'           => 'Description is required.',
        ]);
    
        try {
            // Upload Image
            $imageName = null;
            if ($request->hasFile('banner_image')) {
                $image = $request->file('banner_image');
                $imageName = time() . '_banner.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/accolades_awards'), $imageName);
            }
    
            // Store Data
            AccoladesAwards::create([
                'heading'       => $request->heading,
                'short_desc'    => $request->short_desc,
                'banner_image'  => $imageName,
                'date'          => $request->date,
                'desc'          => $request->desc,
                'created_by'         => auth()->id(),
                'created_at'         => now(),
            ]);
    
            return redirect()->route('admin.manage-accolades-awards.index')
                ->with('message', 'Award added successfully.');
    
        } catch (\Exception $e) {
    
            \Log::error('Accolades Store Error: ' . $e->getMessage());
    
            return redirect()->back()
                ->with('error', 'Something went wrong. Please try again.')
                ->withInput();
        }
    }
    
    public function edit($id)
    {
        $awards = AccoladesAwards::findOrFail($id);
        return view('backend.awards.accolades.edit', compact('awards'));
    }
    
    public function update(Request $request, $id)
    {
        $award = AccoladesAwards::findOrFail($id);
    
        $request->validate([
            'date' => 'required|date',
            'desc' => 'required|string',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ]);
    
        // Only validate these if id != 1
        if ($id == 1) {
            $request->validate([
                'heading' => 'required|string|max:255',
                'short_desc' => 'required|string',
            ]);
        }
    
        // Image Upload
        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $imageName = time().'_banner.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/accolades_awards'), $imageName);
    
            $award->banner_image = $imageName;
        }
    
        // Assign values
        if ($id == 1) {
            $award->heading = $request->heading;
            $award->short_desc = $request->short_desc;
        }
    
        $award->date = $request->date;
        $award->desc = $request->desc;
        $award->updated_by  = Auth::id();
        $award->updated_at  = Carbon::now();
    
        $award->save();
    
        return redirect()->route('admin.manage-accolades-awards.index')
            ->with('message', 'Updated successfully.');
    }
    
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = AccoladesAwards::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-accolades-awards.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}