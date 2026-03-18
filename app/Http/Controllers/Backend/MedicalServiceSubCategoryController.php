<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MedicalServiceMasterCategory;
use App\Models\MedicalServiceSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class MedicalServiceSubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = MedicalServiceSubCategory::with('category')->wherenull('deleted_by')->get();

        return view('backend.medicalservicesubcategory.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = MedicalServiceMasterCategory::pluck('category_name', 'id');
        return view('backend.medicalservicesubcategory.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'category_id'      => 'required|exists:medical_service_master_categories,id',
            'subcategory_name' => 'required|string|max:255',
            'desc'             => 'nullable|string|max:255',
            'home_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);


        if ($request->hasFile('home_image')) {

            $file = $request->file('home_image');

            // Generate random name
            $imageName = uniqid() . '.' . $file->getClientOriginalExtension();

            // Move file
            $file->move(public_path('uploads/specialities'), $imageName);

        } else {
            $imageName = null;
        }

        // Base slug
        $baseSlug = Str::slug($request->subcategory_name);

        // Check if slug already exists
        $slugExists = MedicalServiceSubCategory::where('slug', $baseSlug)->exists();

        if ($slugExists) {

            // Get category name
            $categoryName = MedicalServiceMasterCategory::where('id', $request->category_id)
                                ->value('category_name');

            // Category + Subcategory slug
            $slug = Str::slug($categoryName . '-' . $request->subcategory_name);

        } else {
            $slug = $baseSlug;
        }

        MedicalServiceSubCategory::create([
            'category_id'      => $request->category_id,
            'subcategory_name'=> $request->subcategory_name,
            'home_image' => $imageName,
            'desc'             => $request->desc,
            'slug'             => $slug,
            'created_by'       => Auth::id(),
            'created_at'       => Carbon::now(),
        ]);

        return redirect()
            ->route('admin.medicalservicesubcategory.index')
            ->with('message', 'Medical Service Subcategory added!');
    }

    public function edit(MedicalServiceSubCategory $medicalservicesubcategory)
    {
        $categories = MedicalServiceMasterCategory::pluck('category_name', 'id');
        return view(
            'backend.medicalservicesubcategory.edit',
            compact('medicalservicesubcategory', 'categories')
        );
    }

    public function update(Request $request, MedicalServiceSubCategory $medicalservicesubcategory)
    {
        $request->validate([
            'category_id' => 'required|exists:medical_service_master_categories,id',
            'subcategory_name' => 'required|string|max:255',
            'desc' => 'nullable|string|max:255',
            'home_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);



        // ✅ Image Upload Logic
        if ($request->hasFile('home_image')) {

            // Delete old image
            if (!empty($medicalservicesubcategory->home_image) &&
                file_exists(public_path('uploads/specialities/'.$medicalservicesubcategory->home_image))) {

                unlink(public_path('uploads/specialities/'.$medicalservicesubcategory->home_image));
            }

            // Upload new image (random name)
            $file = $request->file('home_image');
            $imageName = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/specialities'), $imageName);

        } else {
            // Keep old image
            $imageName = $medicalservicesubcategory->home_image;
        }


        // Base slug
        $baseSlug = Str::slug($request->subcategory_name);

        // Check if slug already exists (excluding current record)
        $slugExists = MedicalServiceSubCategory::where('slug', $baseSlug)
                        ->where('id', '!=', $medicalservicesubcategory->id)
                        ->exists();

        if ($slugExists) {

            // Get category name
            $categoryName = MedicalServiceMasterCategory::where('id', $request->category_id)
                                ->value('category_name');

            // Create category-subcategory slug
            $slug = Str::slug($categoryName . '-' . $request->subcategory_name);

        } else {
            $slug = $baseSlug;
        }

        $medicalservicesubcategory->update([
            'category_id'      => $request->category_id,
            'subcategory_name'=> $request->subcategory_name,
            'slug'             => $slug,
            'desc'             => $request->desc,
            'home_image'        => $imageName,
            'updated_by'       => Auth::id(),
        ]);

        return redirect()
            ->route('admin.medicalservicesubcategory.index')
            ->with('message', 'Medical Service Subcategory updated!');
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = MedicalServiceSubCategory::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.medicalservicesubcategory.index')->with('message', 'Data deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }

    public function toggleHighlight(Request $request)
    {
        $subcategory = MedicalServiceSubCategory::findOrFail($request->id);

        $subcategory->status = $request->has('status') ? 1 : 0;
        $subcategory->save();

        return redirect()->route('admin.medicalservicesubcategory.index')->with('message', 'Status updated!');
    }

}
