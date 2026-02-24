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
                        ->orderBy('id', 'asc')
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

}