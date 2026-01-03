<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MedicalServiceMasterCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\MedicalServiceSubCategory;
use App\Models\MedicalServiceCategory;

class MedicalServiceCategoriesController extends Controller
{
   public function index()
{
    $services = MedicalServiceCategory::with(['category', 'subcategory'])->get();

    return view(
        'backend.medicalserviceallcategories.index',
        compact('services')
    );
}

      
    public function create()
    {
        $masterCategories = MedicalServiceMasterCategory::all();
        $subCategories = MedicalServiceSubCategory::all();

        return view(
            'backend.medicalserviceallcategories.create',
            compact('masterCategories', 'subCategories')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id'    => 'required|exists:medical_service_master_categories,id',
            'subcategory_id' => 'required|exists:medical_service_sub_categories,id',
            'service_name'   => 'required|string|max:255',
        ]);

        MedicalServiceCategory::create([
            'category_id'    => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'service_name'   => $request->service_name,
            'created_by'     => Auth::id(),
            'created_at'     => Carbon::now(), 
        ]);

        return redirect()
            ->route('admin.medicalserviceallcategories.index')
            ->with('message', 'Category saved messagefully');
    }

 

public function edit($id)
{
    $service = MedicalServiceCategory::findOrFail($id);

    $masterCategories = MedicalServiceMasterCategory::all();
    $subCategories = MedicalServiceSubCategory::all();

    return view(
        'backend.medicalserviceallcategories.edit',
        compact('service', 'masterCategories', 'subCategories')
    );
}

public function update(Request $request, $id)
{
    $request->validate([
        'category_id'    => 'required|exists:medical_service_master_categories,id',
        'subcategory_id' => 'required|exists:medical_service_sub_categories,id',
        'service_name'   => 'required|string|max:255',
    ]);

    $service = MedicalServiceCategory::findOrFail($id);

    $service->update([
        'category_id'    => $request->category_id,
        'subcategory_id' => $request->subcategory_id,
        'service_name'   => $request->service_name,
        'slug'           => Str::slug($request->service_name),
        'updated_by'     => Auth::id(),
    ]);

    return redirect()
        ->route('admin.medicalserviceallcategories.index')
        ->with('message', 'Category updated messagefully');
}
public function destroy($id)
{
    $service = MedicalServiceCategory::findOrFail($id);

    // Store who deleted it
    $service->update([
        'deleted_by' => Auth::id(),
    ]);

    // Soft delete
    $service->delete();

    return redirect()
        ->route('admin.medicalserviceallcategories.index')
        ->with('message', 'Category deleted messagefully');
}
}