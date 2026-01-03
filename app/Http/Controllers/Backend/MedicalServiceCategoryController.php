<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MedicalServiceMasterCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;


class MedicalServiceCategoryController extends Controller
{
    public function index()
    {
        $categories = MedicalServiceMasterCategory::wherenull('deleted_by')->get();
        return view('backend.medicalservicecategory.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.medicalservicecategory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:medical_service_master_categories,category_name',
        ]);

        MedicalServiceMasterCategory::create([
            'category_name' => $request->category_name,
            'slug'          => Str::slug($request->category_name),
            'created_by'    => Auth::id(),
            'created_at'    => Carbon::now(),
        ]);

        return redirect()->route('admin.medicalservicecategory.index')
            ->with('message', 'Medical Service Category added!');
    }

    public function edit(MedicalServiceMasterCategory $medicalservicecategory)
    {
        return view('backend.medicalservicecategory.edit', compact('medicalservicecategory'));
    }

    public function update(Request $request, MedicalServiceMasterCategory $medicalservicecategory)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:medical_service_master_categories,category_name,' . $medicalservicecategory->id,
        ]);

        $medicalservicecategory->update([
            'category_name' => $request->category_name,
            'slug'          => Str::slug($request->category_name),
            'updated_by'    => Auth::id(),
            'updated_at'    => Carbon::now(),
        ]);

        return redirect()->route('admin.medicalservicecategory.index')
            ->with('message', 'Medical Service Category updated!');
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = MedicalServiceMasterCategory::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.medicalservicecategory.index')->with('message', 'Data deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }

}
