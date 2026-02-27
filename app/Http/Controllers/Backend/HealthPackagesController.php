<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\ManageHealthPackages;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HealthPackagesController extends Controller
{

    public function index()
    {
        $packages = ManageHealthPackages::whereNull('deleted_at')
                        ->orderBy('id', 'desc')
                        ->get();

        return view('backend.wellness.health_packages.index', compact('packages'));
    }

    public function create()
    {
        return view('backend.wellness.health_packages.create');
    }

    public function store(Request $request)
    {
        // ✅ Validation
        $request->validate([
            'package_name'      => 'required|string|max:255',
            'actual_price' => 'nullable|numeric|min:0',

            'discounted_price' => [
                'nullable',
                'numeric',
                'min:0',
                'required_with:actual_price',
                'lte:actual_price'
            ],
            'age_range'         => 'required|string|max:100',
            'gender' => 'required|array|min:1',
            'gender.*' => 'in:Male,Female,Other',
        ], [
            'package_name.required'     => 'Package Name is required.',
            'actual_price.required'     => 'Actual Price is required.',
            'actual_price.numeric'      => 'Actual Price must be a number.',
            'discounted_price.required' => 'Discounted Price is required.',
            'discounted_price.lte'      => 'Discounted Price must be less than or equal to Actual Price.',
            'age_range.required'        => 'Age Range is required.',
            'gender.required'           => 'Please select Gender.',
        ]);


        // ✅ Generate Slug (no numbers allowed)
        $slug = Str::slug($request->package_name);

        // Check if slug already exists
        $slugExists = ManageHealthPackages::where('slug', $slug)->exists();

        if ($slugExists) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['package_name' => 'This package name already exists. Please use a different name.']);
        }

        // ✅ Store Data
        ManageHealthPackages::create([
            'package_name'     => $request->package_name,
            'slug'             => $slug,
            'actual_price'     => $request->actual_price,
            'discounted_price' => $request->discounted_price,
            'age_range'        => $request->age_range,
            'gender' => json_encode($request->gender),
            'created_by'       => Auth::id(),
            'created_at'       => Carbon::now(),
        ]);

        return redirect()->route('admin.manage-health-packages.index')->with('message', 'Health Package added successfully.');
    }

    public function edit($id)
    {
        $health_packages = ManageHealthPackages::findOrFail($id);
        return view('backend.wellness.health_packages.edit', compact('health_packages'));
    }

    public function update(Request $request, $id)
    {
        $healthPackage = ManageHealthPackages::findOrFail($id);

        // ✅ Validation
        $request->validate([
            'package_name'      => 'required|string|max:255',
            'actual_price'      => 'nullable|numeric|min:0',

            'discounted_price' => [
                'nullable',
                'numeric',
                'min:0',
                'required_with:actual_price',
                'lte:actual_price'
            ],

            'age_range'         => 'required|string|max:100',
            'gender'            => 'required|array|min:1',
            'gender.*'          => 'in:Male,Female,Other',
        ], [
            'package_name.required'     => 'Package Name is required.',
            'discounted_price.lte'      => 'Discounted Price must be less than or equal to Actual Price.',
            'age_range.required'        => 'Age Range is required.',
            'gender.required'           => 'Please select Gender.',
        ]);

        // ✅ Generate Slug
        $slug = Str::slug($request->package_name);

        // Check if slug exists for another record
        $slugExists = ManageHealthPackages::where('slug', $slug)
            ->where('id', '!=', $id)
            ->exists();

        if ($slugExists) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['package_name' => 'This package name already exists. Please use a different name.']);
        }

        // ✅ Update Data
        $healthPackage->update([
            'package_name'     => $request->package_name,
            'slug'             => $slug,
            'actual_price'     => $request->actual_price,
            'discounted_price' => $request->discounted_price,
            'age_range'        => $request->age_range,
            'gender'           => json_encode($request->gender),
            'updated_by'       => Auth::id(),
            'updated_at'       => Carbon::now(),
        ]);

        return redirect()->route('admin.manage-health-packages.index')->with('message', 'Health Package updated successfully.');
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = ManageHealthPackages::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-health-packages.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}