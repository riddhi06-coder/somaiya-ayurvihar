<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\ManageHealthPackages;
use App\Models\ManageHealthPackagesDetails;
use App\Models\MedicalServiceSubCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HealthPackagesDetailsController extends Controller
{

    public function index()
    {
        $packagesDetails = ManageHealthPackagesDetails::with(['package', 'subcategory'])
                            ->orderBy('id', 'desc')
                            ->get();

        return view('backend.wellness.health_packages_details.index', compact('packagesDetails'));
    }

    public function create()
    {
        $categories = ManageHealthPackages::whereNull('deleted_by')
                    ->with('subcategory')
                    ->orderBy('id', 'asc')
                    ->get();

        return view('backend.wellness.health_packages_details.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request);
        // ✅ Validation
        $request->validate([
            'package_id'        => 'required|exists:health_packages,id',
            'sub_category_id'   => 'required|exists:medical_service_sub_categories,id',
            'location'          => 'required|string|max:255',
            'location_url'      => 'required|url|max:500',
            'description'       => 'required|string',
        ], [

            // Package
            'package_id.required' => 'Please select a Health Package.',
            'package_id.exists'   => 'Selected Health Package is invalid.',

            // Sub Category
            'sub_category_id.required' => 'Category not found for selected package.',
            'sub_category_id.exists'   => 'Selected Category is invalid.',

            // Location
            'location.required' => 'Location field is required.',
            'location.max'      => 'Location may not be greater than 255 characters.',

            // Location URL
            'location_url.required' => 'Location URL is required.',
            'location_url.url'      => 'Please enter a valid URL (https://example.com).',

            // Description
            'description.required' => 'Description field is required.',
        ]);

        try {

            ManageHealthPackagesDetails::create([
                'package_id'      => $request->package_id,
                'sub_category_id' => $request->sub_category_id,
                'location'        => $request->location,
                'location_url'    => $request->location_url,
                'description'     => $request->description,
                'created_by'      => Auth::id(),
                'created_at'      => Carbon::now(),
            ]);

            return redirect()->route('admin.manage-packages-details.index')->with('message', 'Package Details added successfully.');
        } catch (\Exception $e) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->with('message', 'Something went wrong. Please try again.');

        }
    }

    public function edit($id)
    {
        $health_package_detail = ManageHealthPackagesDetails::findOrFail($id);

        $categories = ManageHealthPackages::with('subcategory')
                        ->whereNull('deleted_by')
                        ->orderBy('id', 'asc')
                        ->get();

        return view(
            'backend.wellness.health_packages_details.edit',
            compact('health_package_detail', 'categories')
        );
    }

    public function update(Request $request, $id)
    {
        // ✅ Validation
        $request->validate([
            'package_id' => [
                'required',
                'exists:health_packages,id',
                'unique:health_packages_details,package_id'
            ],
            'sub_category_id'   => 'required|exists:medical_service_sub_categories,id',
            'location'          => 'required|string|max:255',
            'location_url'      => 'required|url|max:500',
            'description'       => 'required|string',
        ], [

            // Package
            'package_id.required' => 'Please select a Health Package.',
            'package_id.exists'   => 'Selected Health Package is invalid.',
            'package_id.unique'   => 'Details for this package already exist.',

            // Sub Category
            'sub_category_id.required' => 'Category not found for selected package.',
            'sub_category_id.exists'   => 'Selected Category is invalid.',

            // Location
            'location.required' => 'Location field is required.',
            'location.max'      => 'Location may not be greater than 255 characters.',

            // Location URL
            'location_url.required' => 'Location URL is required.',
            'location_url.url'      => 'Please enter a valid URL (https://example.com).',

            // Description
            'description.required' => 'Description field is required.',
        ]);

        try {

            $packageDetail = ManageHealthPackagesDetails::findOrFail($id);

            $packageDetail->update([
                'package_id'      => $request->package_id,
                'sub_category_id' => $request->sub_category_id,
                'location'        => $request->location,
                'location_url'    => $request->location_url,
                'description'     => $request->description,
                'updated_by'      => Auth::id(),
                'updated_at'      => Carbon::now(),
            ]);

            return redirect()
                    ->route('admin.manage-packages-details.index')
                    ->with('message', 'Package Details updated successfully.');

        } catch (\Exception $e) {

            return redirect()
                    ->back()
                    ->withInput()
                    ->with('message', 'Something went wrong. Please try again.');
        }
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = ManageHealthPackagesDetails::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-packages-details.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}