<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\ManagePrayer;


class PrayerController extends Controller
{

    public function index()
    {
        $prayers = ManagePrayer::all();
        return view('backend.about.prayer.index', compact('prayers'));
    }

    public function create()
    {
        return view('backend.about.prayer.create');
    }

    public function store(Request $request)
    {
        // ================= VALIDATION =================
        $request->validate([
            'heading'     => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ], [
            'heading.required'     => 'Heading is required.',
            'description.required' => 'Description is required.',
            'image.required'       => 'Prayer image is required.',
            'image.image'          => 'Uploaded file must be an image.',
            'image.mimes'          => 'Allowed formats: jpg, jpeg, png, webp, svg.',
            'image.max'            => 'Image size must be less than 2MB.',
        ]);

        // ================= IMAGE UPLOAD PATH =================
        $uploadPath = public_path('uploads/prayer');

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // ================= IMAGE UPLOAD =================
        $imageName = null;

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imageName = time() . '_' . rand(1000, 9999) . '_prayer.' . $img->getClientOriginalExtension();
            $img->move($uploadPath, $imageName);
        }

        // ================= SAVE DATA =================
        ManagePrayer::create([
            'heading'     => $request->heading,
            'description' => $request->description,
            'image'       => $imageName,
            'created_by'  => Auth::id(),
            'created_at'  => Carbon::now(),
        ]);

        // ================= REDIRECT =================
        return redirect()->route('admin.manage-prayer.index')->with('message', 'Prayer added successfully.');
    }

    public function edit($id)
    {
        $prayer = ManagePrayer::findOrFail($id);
        return view('backend.about.prayer.edit', compact('prayer'));
    }

    public function update(Request $request, $id)
    {
        // Fetch existing prayer
        $prayer = ManagePrayer::findOrFail($id);

        // ================= VALIDATION =================
        $request->validate([
            'heading'     => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ], [
            'heading.required'     => 'Heading is required.',
            'description.required' => 'Description is required.',
            'image.image'          => 'Uploaded file must be an image.',
            'image.mimes'          => 'Allowed formats: jpg, jpeg, png, webp, svg.',
            'image.max'            => 'Image size must be less than 2MB.',
        ]);

        // ================= IMAGE UPLOAD PATH =================
        $uploadPath = public_path('uploads/prayer');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // ================= IMAGE UPLOAD =================
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($prayer->image && file_exists($uploadPath . '/' . $prayer->image)) {
                unlink($uploadPath . '/' . $prayer->image);
            }

            // Upload new image
            $img = $request->file('image');
            $imageName = time() . '_' . rand(1000, 9999) . '_prayer.' . $img->getClientOriginalExtension();
            $img->move($uploadPath, $imageName);

            $prayer->image = $imageName;
        }

        // ================= UPDATE DATA =================
        $prayer->heading     = $request->heading;
        $prayer->description = $request->description;
        $prayer->updated_by  = Auth::id();
        $prayer->updated_at  = Carbon::now();
        $prayer->save();

        // ================= REDIRECT =================
        return redirect()->route('admin.manage-prayer.index')->with('message', 'Prayer updated successfully.');
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = ManagePrayer::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-prayer.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }

}