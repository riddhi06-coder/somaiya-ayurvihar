<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Requests\DoctorFormRequest;
use DB;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

use App\Models\MedicalServiceSubCategory;
use App\Models\Specialities;



class SpecialitiesController extends Controller
{
    
    public function index()
    {
        $specialities= Specialities::with('subcategory')->wherenull('deleted_by')->get();
        return view('backend.specialities.index', compact('specialities'));
    }

    public function create()
    {
        $subCategories = MedicalServiceSubCategory::wherenull('deleted_by')->where('category_id','1')->get();
        return view('backend.specialities.create' ,compact('subCategories'));
    }
    
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'subcategory_id' => [
                'required',
                'exists:medical_service_sub_categories,id',
                Rule::unique('specialities', 'subcategory_id')->where(function ($query) {
                    return $query->whereNull('deleted_by');
                }),
            ],
            'specialities_image'  => 'required|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'desc'                => 'required|string',
        ], [
            'subcategory_id.required'     => 'Please select a sub category.',
            'subcategory_id.exists'       => 'Selected sub category is invalid.',
    
            'specialities_image.required' => 'Please upload a specialities image.',
            'specialities_image.image'    => 'The file must be an image.',
            'specialities_image.mimes'    => 'Only JPG, JPEG, PNG, WEBP, SVG formats are allowed.',
            'specialities_image.max'      => 'Image size must be less than 2MB.',
    
            'desc.required'               => 'Please enter a short description.',
        ]);
    
        // Image Upload
        $imageName = null;
        if ($request->hasFile('specialities_image')) {
            $image = $request->file('specialities_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/specialities'), $imageName);
        }
    
        // Insert Data
        Specialities::create([
            'subcategory_id'     => $request->subcategory_id,
            'specialities_image' => $imageName,
            'desc'               => $request->desc,
            'created_at'         => now(),
            'created_by'         => Auth::id(),
        ]);
    
        // Redirect
        return redirect()->route('admin.manage-specialities.index')->with('message', 'Speciality added successfully.');
    }
    
    public function edit($id)
    {
        $service_details = Specialities::findOrFail($id);
        $subCategories = MedicalServiceSubCategory::whereNull('deleted_by')
                            ->where('category_id', '1')
                            ->get();
    
        return view('backend.specialities.edit', compact('service_details','subCategories'));
    }
    
    public function update(Request $request, $id)
    {
        $data = Specialities::findOrFail($id);
    
        // Validation
        $request->validate([
            'subcategory_id' => [
                'required',
                'exists:medical_service_sub_categories,id',
                Rule::unique('specialities', 'subcategory_id')->where(function ($query) {
                    return $query->whereNull('deleted_by');
                }),
            ],
            'specialities_image'  => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'desc'                => 'required|string',
        ], [
            'subcategory_id.required'     => 'Please select a sub category.',
            'subcategory_id.exists'       => 'Selected sub category is invalid.',
    
            'specialities_image.mimes'    => 'Only JPG, JPEG, PNG, WEBP, SVG formats are allowed.',
            'specialities_image.max'      => 'Image size must be less than 2MB.',
    
            'desc.required'               => 'Please enter a short description.',
        ]);
    
        // Image Upload (only if new image selected)
        if ($request->hasFile('specialities_image')) {
    
            // Delete old image
            if ($data->specialities_image && file_exists(public_path('uploads/specialities/' . $data->specialities_image))) {
                unlink(public_path('uploads/specialities/' . $data->specialities_image));
            }
    
            // Upload new image
            $image = $request->file('specialities_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/specialities'), $imageName);
    
            $data->specialities_image = $imageName;
        }
    
        // Update Data
        $data->subcategory_id = $request->subcategory_id;
        $data->desc = $request->desc;
        $data->updated_at = now();
        $data->updated_by = Auth::id();
    
        $data->save();
    
        // Redirect
        return redirect()->route('admin.manage-specialities.index')->with('message', 'Speciality updated successfully.');
    }
    
    
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = Specialities::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-specialities.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }

}
    