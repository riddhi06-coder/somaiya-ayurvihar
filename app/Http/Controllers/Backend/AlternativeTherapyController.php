<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\ManageAlternateTherapy;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AlternativeTherapyController extends Controller
{

    public function index()
    {
        $therapies = ManageAlternateTherapy::whereNull('deleted_at')
                        ->orderBy('id', 'asc')
                        ->get();
        return view('backend.wellness.alternate_therapy.index', compact('therapies'));
    }

    public function create()
    {
        return view('backend.wellness.alternate_therapy.create');
    }

    public function store(Request $request)
    {
        // ==============================
        // Validation Rules
        // ==============================
        $request->validate([
            'heading'     => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048', // 2MB
        ], [
            'heading.required'     => 'Heading is required.',
            'heading.max'          => 'Heading should not exceed 255 characters.',
            'description.required' => 'Description is required.',
            'image.mimes'          => 'Only jpg, jpeg, png, webp, svg files are allowed.',
            'image.max'            => 'Image size must be less than 2MB.',
        ]);


        // ==============================
        // Image Upload
        // ==============================
        $bannerImageName = null;

        if ($request->hasFile('image')) {

            $uploadPath = public_path('uploads/alternative-therapy/');

            // Create folder if not exists
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $img = $request->file('image');

            $bannerImageName = time().'_'.rand(1000,9999).'_banner.'.$img->getClientOriginalExtension();

            $img->move($uploadPath, $bannerImageName);
        }


        // ==============================
        // Store in Database
        // ==============================
        ManageAlternateTherapy::create([
            'heading'     => $request->heading,
            'description' => $request->description,
            'image'       => $bannerImageName,
            'created_by'  => Auth::id(),
            'created_at'  => Carbon::now(),
        ]);


        // ==============================
        // Redirect
        // ==============================
        return redirect()->route('admin.manage-alternative-therapy.index')->with('message', 'Alternative Therapy added successfully.');
    }

    public function edit($id)
    {
        $alternate_therapy = ManageAlternateTherapy::findOrFail($id);
        return view('backend.wellness.alternate_therapy.edit', compact('alternate_therapy'));
    }

    public function update(Request $request, $id)
    {
        $therapy = ManageAlternateTherapy::findOrFail($id);

        $request->validate([
            'heading'     => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ]);

        $bannerImageName = $therapy->image;

        if ($request->hasFile('image')) {

            $uploadPath = public_path('uploads/alternative-therapy/');

            // Delete old image
            if ($therapy->image && file_exists($uploadPath.$therapy->image)) {
                unlink($uploadPath.$therapy->image);
            }

            $img = $request->file('image');

            $bannerImageName = time().'_'.rand(1000,9999).'_banner.'.$img->getClientOriginalExtension();

            $img->move($uploadPath, $bannerImageName);
        }

        $therapy->update([
            'heading'     => $request->heading,
            'description' => $request->description,
            'image'       => $bannerImageName,
            'updated_by'  => Auth::id(),
            'updated_at'   => Carbon::now(),
        ]);

        return redirect()->route('admin.manage-alternative-therapy.index')->with('message', 'Alternative Therapy updated successfully.');
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = ManageAlternateTherapy::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-alternative-therapy.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}