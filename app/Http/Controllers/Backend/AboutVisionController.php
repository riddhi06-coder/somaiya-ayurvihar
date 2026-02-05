<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\VisionMission;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AboutVisionController extends Controller
{

    public function index()
    {
        $visions = VisionMission::wherenull('deleted_by')->get(); 
        return view('backend.about.vision.index', compact('visions'));
    }

    public function create()
    {
        return view('backend.about.vision.create');
    }

    public function store(Request $request)
    {
        // Validation rules
        $rules = [
            'banner_heading' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'heading.*' => 'required|string|max:255',
            'description.*' => 'required|string',
            'section_heading' => 'required|string|max:255',
            'icon.*' => 'required|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'heading_icon.*' => 'required|string|max:255',
            'description_icon.*' => 'required|string',
        ];

        $messages = [
            'banner_heading.required' => 'Please enter a Banner Heading.',
            'image.required' => 'Please upload a Banner Image.',
            'image.image' => 'File must be an image.',
            'image.mimes' => 'Allowed image types: jpg, jpeg, png, webp, svg.',
            'image.max' => 'Image must be less than 2MB.',
            'heading.*.required' => 'Please enter a heading.',
            'description.*.required' => 'Please enter a description.',
            'section_heading.required' => 'Please enter a Section Heading.',
            'icon.*.required' => 'Please upload an icon.',
            'icon.*.image' => 'Icon must be an image.',
            'icon.*.mimes' => 'Allowed icon types: jpg, jpeg, png, webp, svg.',
            'icon.*.max' => 'Icon must be less than 2MB.',
            'heading_icon.*.required' => 'Please enter a heading for icon.',
            'description_icon.*.required' => 'Please enter a description for icon.',
        ];

        $request->validate($rules, $messages);

        // Upload paths
        $uploadPath = public_path('uploads/vision_mission/');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        // Handle Banner Image
        $bannerImageName = null;
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $bannerImageName = time() . '_' . rand(1000, 9999) . '_banner.' . $img->getClientOriginalExtension();
            $img->move($uploadPath, $bannerImageName);
        }

        // Handle Vision & Mission Table Data
        $visionMissionData = [];
        if ($request->heading && $request->description) {
            foreach ($request->heading as $index => $heading) {
                $visionMissionData[] = [
                    'heading' => $heading,
                    'description' => $request->description[$index] ?? '',
                ];
            }
        }

        // Handle Our Values Table Data with Icons
        $valuesData = [];
        if ($request->heading_icon && $request->description_icon) {
            foreach ($request->heading_icon as $index => $headingIcon) {

                $iconName = null;
                if (isset($request->icon[$index])) {
                    $iconFile = $request->icon[$index];
                    $iconName = time() . '_' . rand(1000, 9999) . '_icon.' . $iconFile->getClientOriginalExtension();
                    $iconFile->move($uploadPath, $iconName);
                }

                $valuesData[] = [
                    'icon' => $iconName,
                    'heading' => $headingIcon,
                    'description' => $request->description_icon[$index] ?? '',
                ];
            }
        }

        // Save to DB
        $visionMission = new VisionMission(); 
        $visionMission->banner_heading = $request->banner_heading;
        $visionMission->image = $bannerImageName;
        $visionMission->vision_mission_details = json_encode($visionMissionData);
        $visionMission->section_heading = $request->section_heading;
        $visionMission->values = json_encode($valuesData);

        $visionMission->created_at = Carbon::now();
        $visionMission->created_by = Auth::id();

        $visionMission->save();

        return redirect()->route('admin.manage-vision-mission.index')->with('message', 'Vision & Mission saved successfully!');
    }

    public function edit($id)
    {
        $about = VisionMission::findOrFail($id);
        return view('backend.about.vision.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $visionMission = VisionMission::findOrFail($id);

        // Validation rules
        $rules = [
            'banner_heading' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'heading.*' => 'required|string|max:255',
            'description.*' => 'required|string',
            'section_heading' => 'required|string|max:255',
            'icon.*' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'heading_icon.*' => 'required|string|max:255',
            'description_icon.*' => 'required|string',
        ];

        $messages = [
            'banner_heading.required' => 'Please enter a Banner Heading.',
            'image.image' => 'File must be an image.',
            'image.mimes' => 'Allowed image types: jpg, jpeg, png, webp, svg.',
            'image.max' => 'Image must be less than 2MB.',
            'heading.*.required' => 'Please enter a heading.',
            'description.*.required' => 'Please enter a description.',
            'section_heading.required' => 'Please enter a Section Heading.',
            'icon.*.image' => 'Icon must be an image.',
            'icon.*.mimes' => 'Allowed icon types: jpg, jpeg, png, webp, svg.',
            'icon.*.max' => 'Icon must be less than 2MB.',
            'heading_icon.*.required' => 'Please enter a heading for icon.',
            'description_icon.*.required' => 'Please enter a description for icon.',
        ];

        $request->validate($rules, $messages);

        // Upload paths
        $uploadPath = public_path('uploads/vision_mission/');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        // Handle Banner Image (replace if new file uploaded)
        if ($request->hasFile('image')) {
            // Delete old banner if exists
            if ($visionMission->image && file_exists($uploadPath . $visionMission->image)) {
                unlink($uploadPath . $visionMission->image);
            }

            $img = $request->file('image');
            $bannerImageName = time() . '_' . rand(1000, 9999) . '_banner.' . $img->getClientOriginalExtension();
            $img->move($uploadPath, $bannerImageName);
            $visionMission->image = $bannerImageName;
        }

        // Handle Vision & Mission Table Data
        $visionMissionData = [];
        if ($request->heading && $request->description) {
            foreach ($request->heading as $index => $heading) {
                $visionMissionData[] = [
                    'heading' => $heading,
                    'description' => $request->description[$index] ?? '',
                ];
            }
        }

        // Handle Our Values Table Data with Icons
        $valuesData = [];
        if ($request->heading_icon && $request->description_icon) {
            foreach ($request->heading_icon as $index => $headingIcon) {

                $iconName = null;

                // Check if new icon uploaded
                if (isset($request->icon[$index])) {
                    $iconFile = $request->icon[$index];

                    // Delete old icon if exists
                    $existingValues = json_decode($visionMission->values, true) ?? [];
                    if (isset($existingValues[$index]['icon']) && $existingValues[$index]['icon'] && file_exists($uploadPath . $existingValues[$index]['icon'])) {
                        unlink($uploadPath . $existingValues[$index]['icon']);
                    }

                    $iconName = time() . '_' . rand(1000, 9999) . '_icon.' . $iconFile->getClientOriginalExtension();
                    $iconFile->move($uploadPath, $iconName);
                } else {
                    // Keep old icon if new not uploaded
                    $existingValues = json_decode($visionMission->values, true) ?? [];
                    $iconName = $existingValues[$index]['icon'] ?? null;
                }

                $valuesData[] = [
                    'icon' => $iconName,
                    'heading' => $headingIcon,
                    'description' => $request->description_icon[$index] ?? '',
                ];
            }
        }

        // Update DB
        $visionMission->banner_heading = $request->banner_heading;
        $visionMission->vision_mission_details = json_encode($visionMissionData);
        $visionMission->section_heading = $request->section_heading;
        $visionMission->values = json_encode($valuesData);
        $visionMission->updated_at = Carbon::now();
        $visionMission->updated_by = Auth::id();

        $visionMission->save();

        return redirect()->route('admin.manage-vision-mission.index')->with('message', 'Vision & Mission updated successfully!');
    }


    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = VisionMission::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-vision-mission.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}