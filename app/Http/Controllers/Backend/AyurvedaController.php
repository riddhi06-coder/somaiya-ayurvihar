<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\ManageAyurveda;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AyurvedaController extends Controller
{

    public function index()
    {
        $ayurveda = ManageAyurveda::whereNull('deleted_at')
                        ->orderBy('id', 'asc')
                        ->get();

        return view('backend.wellness.ayurveda.index', compact('ayurveda'));
    }

    public function create()
    {
        return view('backend.wellness.ayurveda.create');
    }

    public function store(Request $request)
    {
        // ✅ Validation
        $request->validate([
            'heading'     => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048', // 2MB
        ], [
            'heading.required'     => 'Heading is required.',
            'description.required' => 'Description is required.',
            'image.required'       => 'Image is required.',
            'image.image'          => 'File must be an image.',
            'image.mimes'          => 'Allowed formats: jpg, jpeg, png, webp, svg.',
            'image.max'            => 'Image size must be less than 2MB.',
        ]);

        // ✅ Define Upload Path
        $uploadPath = public_path('uploads/ayurveda/');

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $bannerImageName = null;

        // ✅ Upload Image (Your Method)
        if ($request->hasFile('image')) {

            $img = $request->file('image');

            $bannerImageName = time().'_'.rand(1000,9999).'_banner.'.$img->getClientOriginalExtension();

            $img->move($uploadPath, $bannerImageName);
        }

        // ✅ Insert Into Database
        ManageAyurveda::create([
            'heading'     => $request->heading,
            'description' => $request->description,
            'image'       => $bannerImageName,
            'created_by'  => Auth::id(),
            'created_at'  => Carbon::now(),
        ]);

        return redirect()->route('admin.manage-ayurveda.index')->with('message', 'Ayurveda record added successfully.');
    }

    public function edit($id)
    {
        $ayurveda = ManageAyurveda::findOrFail($id);
        return view('backend.wellness.ayurveda.edit', compact('ayurveda'));
    }

    public function update(Request $request, $id)
    {
        $ayurveda = ManageAyurveda::findOrFail($id);

        // ✅ Validation
        $request->validate([
            'heading'     => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ], [
            'heading.required'     => 'Heading is required.',
            'description.required' => 'Description is required.',
            'image.image'          => 'File must be an image.',
            'image.mimes'          => 'Allowed formats: jpg, jpeg, png, webp, svg.',
            'image.max'            => 'Image size must be less than 2MB.',
        ]);

        // ✅ Define Upload Path
        $uploadPath = public_path('uploads/ayurveda/');

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $bannerImageName = $ayurveda->image; // keep old image by default

        // ✅ If new image uploaded
        if ($request->hasFile('image')) {

            // Delete old image
            if (!empty($ayurveda->image) && file_exists($uploadPath.$ayurveda->image)) {
                unlink($uploadPath.$ayurveda->image);
            }

            $img = $request->file('image');

            $bannerImageName = time().'_'.rand(1000,9999).'_banner.'.$img->getClientOriginalExtension();

            $img->move($uploadPath, $bannerImageName);
        }

        // ✅ Update Record
        $ayurveda->update([
            'heading'      => $request->heading,
            'description'  => $request->description,
            'image'        => $bannerImageName,
            'modified_by'  => Auth::id(),
            'modified_at'   => Carbon::now(),
        ]);

        return redirect()->route('admin.manage-ayurveda.index')->with('message', 'Ayurveda record updated successfully.');
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = ManageAyurveda::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-ayurveda.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }


}