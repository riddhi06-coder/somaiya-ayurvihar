<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\CsrSustainability;


class CSRSustainabilityController extends Controller
{

    public function index()
    {
        $csr = CsrSustainability::whereNull('deleted_by')
                ->wherenull('deleted_by')
                ->get();
                
        return view('backend.about.sustainability.index', compact('csr'));
    }

    public function create()
    {
        return view('backend.about.sustainability.create');
    }
    
    public function store(Request $request)
    {
        // ✅ Validation
        $request->validate([
            'desc' => 'required|string',
    
            'uhtc_heading' => 'required|string|max:255',
            'uhtc_desc' => 'required|string',
            'uhtc_image' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
    
            'support_heading' => 'required|string|max:255',
            'support_desc' => 'required|string',
            'support_image' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
    
            'community_heading' => 'required|string|max:255',
            'community_desc' => 'required|string',
            'community_image' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
    
            'donation_desc' => 'required|string',
            'inclusive_desc' => 'required|string',
    
            'gallery_images.*' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ], [
            'desc.required' => 'Introduction is required.',
    
            'uhtc_heading.required' => 'UHTC heading is required.',
            'uhtc_desc.required' => 'UHTC description is required.',
    
            'support_heading.required' => 'Support heading is required.',
            'support_desc.required' => 'Support description is required.',
    
            'community_heading.required' => 'Community heading is required.',
            'community_desc.required' => 'Community description is required.',
    
            'donation_desc.required' => 'Blood donation description is required.',
            'inclusive_desc.required' => 'Inclusive care description is required.',
    
            'gallery_images.*.mimes' => 'Only JPG, JPEG, PNG, WEBP, SVG allowed.',
            'gallery_images.*.max' => 'Each image must be less than 2MB.',
        ]);
    
        try {
    
            // ✅ Upload Section Images
            $uhtcImage = null;
            if ($request->hasFile('uhtc_image')) {
                $file = $request->file('uhtc_image');
                $uhtcImage = time().'_uhtc.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads/csr'), $uhtcImage);
            }
    
            $supportImage = null;
            if ($request->hasFile('support_image')) {
                $file = $request->file('support_image');
                $supportImage = time().'_support.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads/csr'), $supportImage);
            }
    
            $communityImage = null;
            if ($request->hasFile('community_image')) {
                $file = $request->file('community_image');
                $communityImage = time().'_community.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads/csr'), $communityImage);
            }
    
            // ✅ Gallery Images (ARRAY → JSON)
            $galleryImages = [];
    
            if ($request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $img) {
                    if ($img) {
                        $name = time().'_'.$img->getClientOriginalName();
                        $img->move(public_path('uploads/csr'), $name);
                        $galleryImages[] = $name;
                    }
                }
            }
    
            // ✅ Store Data
            CsrSustainability::create([
                'desc' => $request->desc,
    
                'uhtc_heading' => $request->uhtc_heading,
                'uhtc_desc' => $request->uhtc_desc,
                'uhtc_image' => $uhtcImage,
    
                'support_heading' => $request->support_heading,
                'support_desc' => $request->support_desc,
                'support_image' => $supportImage,
    
                'community_heading' => $request->community_heading,
                'community_desc' => $request->community_desc,
                'community_image' => $communityImage,
    
                'donation_desc' => $request->donation_desc,
                'inclusive_desc' => $request->inclusive_desc,
    
                // ✅ JSON Encode
                'gallery_images' => json_encode($galleryImages),
    
                'created_by' => auth()->id(),
                'created_at' => now(),
            ]);
    
            return redirect()->route('admin.manage-csr-sustainability.index')
                ->with('message', 'Data added successfully.');
    
        } catch (\Exception $e) {
    
            \Log::error('CSR Store Error: '.$e->getMessage());
    
            return redirect()->back()
                ->with('error', 'Something went wrong!')
                ->withInput();
        }
    }

    public function edit($id)
    {
        $sustainability = CsrSustainability::findOrFail($id);
        $gallery = json_decode($sustainability->gallery_images, true);
        return view('backend.about.sustainability.edit', compact('sustainability','gallery'));
    }
    
    public function update(Request $request, $id)
    {
        $csr = CsrSustainability::findOrFail($id);
    
        // ✅ Validation
        $request->validate([
            'desc' => 'required|string',
    
            'uhtc_heading' => 'required|string|max:255',
            'uhtc_desc' => 'required|string',
            'uhtc_image' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
    
            'support_heading' => 'required|string|max:255',
            'support_desc' => 'required|string',
            'support_image' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
    
            'community_heading' => 'required|string|max:255',
            'community_desc' => 'required|string',
            'community_image' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
    
            'donation_desc' => 'required|string',
            'inclusive_desc' => 'required|string',
    
            'gallery_images.*' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ]);
    
        try {
    
            // ✅ Upload Images (replace if new)
            if ($request->hasFile('uhtc_image')) {
                if ($csr->uhtc_image && file_exists(public_path('uploads/csr/'.$csr->uhtc_image))) {
                    unlink(public_path('uploads/csr/'.$csr->uhtc_image));
                }
    
                $file = $request->file('uhtc_image');
                $csr->uhtc_image = time().'_uhtc.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads/csr'), $csr->uhtc_image);
            }
    
            if ($request->hasFile('support_image')) {
                if ($csr->support_image && file_exists(public_path('uploads/csr/'.$csr->support_image))) {
                    unlink(public_path('uploads/csr/'.$csr->support_image));
                }
    
                $file = $request->file('support_image');
                $csr->support_image = time().'_support.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads/csr'), $csr->support_image);
            }
    
            if ($request->hasFile('community_image')) {
                if ($csr->community_image && file_exists(public_path('uploads/csr/'.$csr->community_image))) {
                    unlink(public_path('uploads/csr/'.$csr->community_image));
                }
    
                $file = $request->file('community_image');
                $csr->community_image = time().'_community.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads/csr'), $csr->community_image);
            }
    
            // ✅ Get remaining existing images from form
            $existingImages = $request->existing_images ?? [];
            
            // Convert to array (safe)
            $existingImages = array_values($existingImages);
            
            // ✅ Delete removed images from folder
            $oldImages = json_decode($csr->gallery_images, true) ?? [];
            
            foreach ($oldImages as $old) {
                if (!in_array($old, $existingImages)) {
                    if (file_exists(public_path('uploads/csr/'.$old))) {
                        unlink(public_path('uploads/csr/'.$old));
                    }
                }
            }
            
            // ✅ Upload new images
            if ($request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $img) {
                    if ($img) {
                        $name = time().'_'.$img->getClientOriginalName();
                        $img->move(public_path('uploads/csr'), $name);
                        $existingImages[] = $name;
                    }
                }
            }
    
            // ✅ Update Data
            $csr->update([
                'desc' => $request->desc,
    
                'uhtc_heading' => $request->uhtc_heading,
                'uhtc_desc' => $request->uhtc_desc,
    
                'support_heading' => $request->support_heading,
                'support_desc' => $request->support_desc,
    
                'community_heading' => $request->community_heading,
                'community_desc' => $request->community_desc,
    
                'donation_desc' => $request->donation_desc,
                'inclusive_desc' => $request->inclusive_desc,
    
                // JSON updated
                'gallery_images' => json_encode($existingImages),
    
                'updated_by' => auth()->id(),
                'updated_at' => now(),
            ]);
    
            return redirect()->route('admin.manage-csr-sustainability.index')
                ->with('message', 'Data updated successfully.');
    
        } catch (\Exception $e) {
    
            \Log::error('CSR Update Error: '.$e->getMessage());
    
            return redirect()->back()
                ->with('error', 'Something went wrong!')
                ->withInput();
        }
    }
    
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = CsrSustainability::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-csr-sustainability.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }

}