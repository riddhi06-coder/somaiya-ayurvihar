<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\AwardsQuality;


class AwardsAccoladesController extends Controller
{

    public function index()
    {
        $awards = AwardsQuality::wherenull('deleted_by')->orderBy('id', 'asc')->get();
        return view('backend.awards.index', compact('awards'));
    }

    public function create()
    {
        $recordCount = AwardsQuality::count();
        return view('backend.awards.create', compact('recordCount'));
    }
    
    public function store(Request $request)
    {
        try {
    
            // ✅ Validation
            $request->validate([
                'heading'             => 'nullable|string|max:255',
                'certification_name'  => 'required|string|max:255',
                'desc'                => 'required|string',
                'banner_image'        => 'required|mimes:jpg,jpeg,png,webp,svg|max:2048',
            ], [
                'certification_name.required' => 'Certification Name is required.',
                'desc.required'               => 'Description is required.',
                'banner_image.required'       => 'Please upload an image.',
                'banner_image.image'          => 'File must be an image.',
                'banner_image.mimes'          => 'Only jpg, jpeg, png, webp, svg files are allowed.',
                'banner_image.max'            => 'Image size must be less than 2MB.',
            ]);
    
            // ✅ Upload Image
            $fileName = null;
    
            if ($request->hasFile('banner_image')) {
                $file = $request->file('banner_image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/awards'), $fileName);
            }
    
            // ✅ Save Data
            AwardsQuality::create([
                'heading'            => $request->heading,
                'certification_name' => $request->certification_name,
                'desc'               => $request->desc,
                'banner_image'       => $fileName,
                'created_by'         => auth()->id(),
                'created_at'         => now(),
            ]);
    
            return redirect()
                ->route('admin.manage-quality-awards.index')
                ->with('message', 'Award/Accolade added successfully.');
    
        } catch (\Exception $e) {
    
            \Log::error('❌ Awards Store Error: ' . $e->getMessage());
    
            return back()
                ->withInput()
                ->with('message', 'Something went wrong. Please try again.');
        }
    }
    
    public function edit($id)
    {
        $awards = AwardsQuality::findOrFail($id);
        return view('backend.awards.edit', compact('awards'));
    }
    
    public function update(Request $request, $id)
    {
        try {
    
            $award = AwardsQuality::findOrFail($id);
    
            // ✅ Validation
            $request->validate([
                'heading'             => 'nullable|string|max:255',
                'certification_name'  => 'required|string|max:255',
                'desc'                => 'required|string',
                'banner_image'        => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
            ], [
                'certification_name.required' => 'Certification Name is required.',
                'desc.required'               => 'Description is required.',
                'banner_image.mimes'          => 'Only jpg, jpeg, png, webp, svg files are allowed.',
                'banner_image.max'            => 'Image size must be less than 2MB.',
            ]);
    
            // ✅ Image Upload (if new file exists)
            $fileName = $award->banner_image;
    
            if ($request->hasFile('banner_image')) {
    
                // delete old image
                if (!empty($award->banner_image) && file_exists(public_path('uploads/awards/' . $award->banner_image))) {
                    unlink(public_path('uploads/awards/' . $award->banner_image));
                }
    
                $file = $request->file('banner_image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/awards'), $fileName);
            }
    
            // ✅ Update Data
            $award->update([
                'heading'            => $request->heading,
                'certification_name' => $request->certification_name,
                'desc'               => $request->desc,
                'banner_image'       => $fileName,
                'updated_by'    => Auth::id(),
                'updated_at'    => Carbon::now(),
            ]);
    
            return redirect()
                ->route('admin.manage-quality-awards.index')
                ->with('message', 'Award/Accolade updated successfully.');
    
        } catch (\Exception $e) {
    
            \Log::error('❌ Awards Update Error: ' . $e->getMessage());
    
            return back()
                ->withInput()
                ->with('message', 'Something went wrong. Please try again.');
        }
    }
    
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = AwardsQuality::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-quality-awards.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}