<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MedicalServiceMasterCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\MedicalServiceSubCategory;
use App\Models\MedicalServiceCategory;
use Carbon\Carbon;

class MedicalServiceCategoriesController extends Controller
{
    public function index()
    {
        $services = MedicalServiceCategory::with(['category', 'subcategory'])->orderBy('service_name', 'asc')->get();
    
        return view(
            'backend.medicalserviceallcategories.index',
            compact('services')
        );
    }
    
    
    public function toggleStatus(Request $request)
    {
        $service = MedicalServiceCategory::findOrFail($request->id);
        $service->is_active = $request->has('is_active') ? 1 : 0;
        $service->save();
    
        return redirect()->back()->with('success', 'Service status updated successfully.');
    }


    public function updatePriority(Request $request)
    {
        $doctor = MedicalServiceCategory::find($request->id);
    
        if (!$doctor) {
            return response()->json(['status' => false]);
        }
    
        // 👉 If priority is removed (empty)
        if ($request->priority === null || $request->priority === '') {
            $doctor->priority = null; // recommended
            $doctor->save();
    
            return response()->json([
                'status' => true,
                'message' => 'Priority removed'
            ]);
        }
    
        // 👉 Check duplicate (only when assigning)
        $exists = MedicalServiceCategory::where('priority', $request->priority)
                    ->where('id', '!=', $request->id)
                    ->exists();
    
        if ($exists) {
            return response()->json([
                'status' => false,
                'message' => 'Priority already assigned to category'
            ]);
        }
    
        $doctor->priority = $request->priority;
        $doctor->save();
    
        return response()->json(['status' => true]);
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
            'slug'           => Str::slug($request->service_name),
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
        'updated_at'     => Carbon::now(),
    ]);

    return redirect()
        ->route('admin.medicalserviceallcategories.index')
        ->with('message', 'Category updated messagefully');
    }


    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = MedicalServiceCategory::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.medicalserviceallcategories.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }

}