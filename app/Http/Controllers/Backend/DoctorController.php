<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\MedicalServiceSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Requests\DoctorFormRequest;
use DB;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('subcategory')->get();
        return view('backend.doctors.index', compact('doctors'));
    }

    public function create()
    {
        $subcategories = MedicalServiceSubCategory::pluck('subcategory_name', 'id');
        $degrees = DB::table('degrees')->get();
        return view('backend.doctors.create', compact('subcategories','degrees'));
    }

    public function store(DoctorFormRequest $request)
    {
        $data = $request->validated();

        // Handle profile image
        if ($request->hasFile('profile_image')) {
            $data['profile_image'] = $request->file('profile_image')->store('doctors/profile', 'public');
        }

        // Handle short video
        if ($request->hasFile('short_video')) {
            $data['short_video'] = $request->file('short_video')->store('doctors/video', 'public');
        }

        // Save degrees as JSON
        $data['degrees'] = json_encode($request->degree_id);

        // consultation_timings comes directly from slots[] – already perfect array!
        $data['consultation_timings'] = $request->slots;

        // Optional: created_by
        $data['created_by'] = auth()->id();

        Doctor::create($data);

        return redirect()->route('admin.doctors.index')
            ->with('success', 'Doctor created successfully!');
    }

    public function edit(Doctor $doctor)
    {
        $subcategories = MedicalServiceSubCategory::pluck('subcategory_name', 'id');
        $degrees = DB::table('degrees')->get();
        return view('backend.doctors.edit', compact('doctor', 'subcategories','degrees'));
    }

    public function update(DoctorFormRequest $request, Doctor $doctor)
    {
        $data = $request->validated();

        // === PROFILE IMAGE ===
        if ($request->hasFile('profile_image')) {
            // Delete old image
            if ($doctor->profile_image) {
                Storage::disk('public')->delete($doctor->profile_image);
            }
            $data['profile_image'] = $request->file('profile_image')->store('doctors/profile', 'public');
        }

        // === SHORT VIDEO ===
        if ($request->hasFile('short_video')) {
            if ($doctor->short_video) {
                Storage::disk('public')->delete($doctor->short_video);
            }
            $data['short_video'] = $request->file('short_video')->store('doctors/video', 'public');
        }

        // === DEGREES ===
        $data['degrees'] = json_encode($request->degree_id);

        // === TIME SLOTS – THIS IS THE KEY CHANGE! ===
        // We now use $request->slots (from dynamic slots[index][start/end])
        $data['consultation_timings'] = $request->slots;

        // === AUDIT ===
        $data['updated_by'] = auth()->id();

        $doctor->update($data);

        return redirect()->route('admin.doctors.index')
            ->with('success', 'Doctor updated successfully!');
    }

    public function destroy(Doctor $doctor)
    {
        collect([$doctor->profile_image, $doctor->short_video])->filter() 
            ->each(fn($file) => Storage::disk('public')->delete($file));

        $doctor->update(['deleted_by' => Auth::id()]);
        $doctor->delete();

        return redirect()->route('admin.doctors.index')->with('success', 'Doctor deleted!');
    }

    public function toggleFeatured(Doctor $doctor)
    {
        $doctor->update(['is_featured' => !$doctor->is_featured]);
        return back();
    }

    public function toggleActive(Doctor $doctor)
    {
        $doctor->update(['is_active' => !$doctor->is_active]);
        return back();
    }
}