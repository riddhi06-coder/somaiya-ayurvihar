<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Gallery;
use App\Models\GalleryDetail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class GalleryDetailsController extends Controller
{

    public function index()
    {
        $galleryDetails = GalleryDetail::with('gallery') // relation
            ->whereNull('deleted_by') // if you have this column
            ->orderBy('id', 'desc')
            ->get();

        return view('backend.gallery_details.index', compact('galleryDetails'));
    }

    public function create()
    {
        $galleries = Gallery::whereNull('deleted_by')
            ->orderBy('id', 'desc')
            ->get();

        return view('backend.gallery_details.create', compact('galleries'));
    }

    public function store(Request $request)
    {
        // ✅ Validation
        $request->validate([
            'gallery_id'   => 'required|exists:gallery_list,id|unique:gallery_details,gallery_id',
            'description'  => 'nullable|string',
            'images'       => 'required|array|min:1',
            'images.*'     => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'gallery_id.required' => 'Please select an event.',
            'gallery_id.exists'   => 'Selected event is invalid.',
            'gallery_id.unique'   => 'This event is already added.', // 👈 important

            'images.required'     => 'Please upload at least one image.',
            'images.*.mimes'      => 'Only JPG, JPEG, PNG, WEBP allowed.',
            'images.*.max'        => 'Each image must be less than 2MB.',
        ]);

        $imageNames = [];

        // ✅ Upload Images & Store ONLY file names
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {

                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('uploads/gallery_details'), $filename);

                $imageNames[] = $filename; // 👈 ONLY NAME
            }
        }

        // ✅ Store JSON
        GalleryDetail::create([
            'gallery_id'  => $request->gallery_id,
            'description' => $request->description,
            'images'      => json_encode($imageNames),
            'created_by'  => Auth::id(),
            'created_at'  => Carbon::now(),
        ]);

        return redirect()->route('admin.manage-details-gallery.index')
            ->with('message', 'Gallery Details added successfully');
    }

    public function edit($id)
    {
        $gallery = GalleryDetail::findOrFail($id);

        $galleries = Gallery::whereNull('deleted_by')
            ->orderBy('id', 'desc')
            ->get();

        return view('backend.gallery_details.edit', compact('gallery','galleries'));
    }

    public function update(Request $request, $id)
    {
        $gallery = GalleryDetail::findOrFail($id);

        // ✅ VALIDATION
        $request->validate([
            'gallery_id' => [
                'required',
                'exists:gallery_list,id',
                // prevent duplicate event (except current record)
                Rule::unique('gallery_details', 'gallery_id')->ignore($id)->whereNull('deleted_by')
            ],
            'description' => 'nullable|string',
            'images.*'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'gallery_id.required' => 'Please select an event.',
            'gallery_id.unique'   => 'This event is already added.',
            'images.*.mimes'      => 'Only JPG, JPEG, PNG, WEBP allowed.',
            'images.*.max'        => 'Each image must be less than 2MB.',
        ]);

        // ✅ GET OLD IMAGES (from hidden inputs)
        $oldImages = $request->old_images ?? [];

        $newImages = [];

        // ✅ UPLOAD NEW IMAGES
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {

                if (!empty($file)) {
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                    $file->move(public_path('uploads/gallery_details'), $filename);

                    $newImages[] = $filename;
                }
            }
        }

        // ✅ MERGE OLD + NEW
        $finalImages = array_merge($oldImages, $newImages);

        // ❗ OPTIONAL: Prevent empty images (since required in UI)
        if (empty($finalImages)) {
            return back()->withErrors(['images' => 'At least one image is required.'])->withInput();
        }

        // ✅ UPDATE DATA
        $gallery->update([
            'gallery_id'  => $request->gallery_id,
            'description' => $request->description,
            'images'      => json_encode(array_values($finalImages)),
            'updated_by'  => Auth::id(),
            'updated_at'  => Carbon::now(),
        ]);

        return redirect()->route('admin.manage-details-gallery.index')
            ->with('message', 'Gallery updated successfully');
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = GalleryDetail::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-details-gallery.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }

}