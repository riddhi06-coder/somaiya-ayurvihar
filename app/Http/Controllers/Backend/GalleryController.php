<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GalleryController extends Controller
{

    public function index()
    {
        $galleries = Gallery::whereNull('deleted_by')
            ->orderBy('id', 'desc')
            ->get();

        return view('backend.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('backend.gallery.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        // ✅ Validation
        $request->validate([
            'event_name' => 'required|string|max:255',
            'date'       => 'nullable|date', // ✅ fixed (you changed input name)
            'image'      => 'required|file|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ]);

        // ✅ Generate Unique Slug
        $slug = Str::slug($request->event_name);
        $originalSlug = $slug;
        $count = 1;

        while (Gallery::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        // ✅ Store Image
        $imagePath = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/gallery'), $filename);

            $imagePath = 'uploads/gallery/' . $filename;
        }

        // ✅ Store Data
        Gallery::create([
            'event_name' => $request->event_name,
            'slug'       => $slug,
            'date'       => $request->date,
            'image'      => $imagePath, 
            'created_by' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.manage-gallery.index')
            ->with('message', 'Gallery created successfully');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('backend.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        // ✅ Validation
        $request->validate([
            'event_name' => 'required|string|max:255',
            'date'       => 'nullable|date',
            'image'      => 'nullable|file|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ]);

        // ✅ Generate Unique Slug (exclude current ID)
        $slug = Str::slug($request->event_name);
        $originalSlug = $slug;
        $count = 1;

        while (Gallery::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        // ✅ Image Update
        if ($request->hasFile('image')) {

            // delete old image
            if ($gallery->image && file_exists(public_path($gallery->image))) {
                unlink(public_path($gallery->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/gallery'), $filename);

            $gallery->image = 'uploads/gallery/' . $filename;
        }

        // ✅ Update Data
        $gallery->update([
            'event_name' => $request->event_name,
            'slug'       => $slug,
            'date'       => $request->date,
            'updated_by' => Auth::id(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.manage-gallery.index')
            ->with('message', 'Gallery updated successfully');
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = Gallery::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-gallery.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }


}