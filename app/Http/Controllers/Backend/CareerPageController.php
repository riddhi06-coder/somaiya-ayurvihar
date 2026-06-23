<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\CareerPage;
use Illuminate\Http\Request;
use Carbon\Carbon;


class CareerPageController extends Controller
{

    public function index()
    {
        $services = CareerPage::wherenull('deleted_by')->get();
        return view('backend.career.page.index', compact('services'));
    }

    public function create()
    {
        return view('backend.career.page.create');
    }
    
    public function store(Request $request)
    {
        // =============================
        // ✅ VALIDATION
        // =============================
        $request->validate([
            'heading' => 'required|string|max:255',
            'banner_image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'desc' => 'required|string',
    
            'benefits_heading' => 'required|string|max:255',
    
            'benefits.*.question' => 'required|string|max:255',
            'benefits.*.answer' => 'required|string',
            'benefits.*.image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
    
            'job_heading' => 'required|string|max:255',
    
        ], [
            'heading.required' => 'Main heading is required.',
            'banner_image.required' => 'Banner image is required.',
            'banner_image.image' => 'Banner must be an image.',
            'banner_image.max' => 'Banner image must be less than 2MB.',
    
            'desc.required' => 'Description is required.',
    
            'benefits_heading.required' => 'Benefits heading is required.',
    
            'benefits.*.question.required' => 'Benefits heading is required.',
            'benefits.*.answer.required' => 'Benefits description is required.',
            'benefits.*.image.image' => 'Benefits image must be an image.',
            'benefits.*.image.max' => 'Benefits image must be less than 2MB.',
    
            'job_heading.required' => 'Job heading is required.',
        ]);
    
        // =============================
        // ✅ UPLOAD PATH
        // =============================
        $uploadPath = public_path('uploads/service-details/');
    
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }
    
        // =============================
        // ✅ BANNER IMAGE UPLOAD
        // =============================
        $bannerImage = null;
    
        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $bannerImage = time() . '_banner.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $bannerImage);
        }
    
        // =============================
        // ✅ BENEFITS DATA (WITH IMAGES)
        // =============================
        $benefitsData = [];
    
        if ($request->has('benefits')) {
            foreach ($request->benefits as $index => $benefit) {
    
                $imageName = null;
    
                // IMAGE UPLOAD (LIKE YOUR LOGIC)
                if (isset($benefit['image'])) {
                    $img = $benefit['image'];
    
                    $imageName = time().'_'.rand(1000,9999).'_benefit.'.$img->getClientOriginalExtension();
                    $img->move($uploadPath, $imageName);
                }
    
                $benefitsData[] = [
                    'question' => $benefit['question'],
                    'answer' => $benefit['answer'],
                    'image' => $imageName
                ];
            }
        }
    
        // =============================
        // ✅ SAVE TO DATABASE
        // =============================
        CareerPage::create([
            'heading' => $request->heading,
            'banner_image' => $bannerImage,
            'desc' => $request->desc,
    
            'benefits_heading' => $request->benefits_heading,
            'benefits' => json_encode($benefitsData),
    
            'job_heading' => $request->job_heading,
            'created_by' => Auth::id(),
            'created_at' => Carbon::now(),
            
        ]);
    
        // =============================
        // ✅ REDIRECT
        // =============================
        return redirect()->route('admin.manage-career-page.index')->with('message', 'Details added successfully.');
    }
    
    public function edit($id)
    {
        $service_details = CareerPage::findOrFail($id);
        $service_details->benefits = json_decode($service_details->benefits, true);
    
        return view('backend.career.page.edit', compact('service_details'));
    }
    
    public function update(Request $request, $id)
    {
        $data = CareerPage::findOrFail($id);
    
        // =============================
        // ✅ VALIDATION
        // =============================
        $request->validate([
            'heading' => 'required|string|max:255',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'desc' => 'required|string',
    
            'benefits_heading' => 'required|string|max:255',
    
            'benefits.*.question' => 'required|string|max:255',
            'benefits.*.answer' => 'required|string',
            'benefits.*.image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
    
            'job_heading' => 'required|string|max:255',
    
        ]);
    
        // =============================
        // ✅ UPLOAD PATH
        // =============================
        $uploadPath = public_path('uploads/service-details/');
    
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }
    
        // =============================
        // ✅ BANNER IMAGE UPDATE
        // =============================
        $bannerImage = $data->banner_image;
    
        if ($request->hasFile('banner_image')) {
    
            // Delete old image
            if (!empty($data->banner_image) && file_exists($uploadPath . $data->banner_image)) {
                unlink($uploadPath . $data->banner_image);
            }
    
            $file = $request->file('banner_image');
            $bannerImage = time() . '_banner.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $bannerImage);
        }
    
        // =============================
        // ✅ BENEFITS UPDATE
        // =============================
        $oldBenefits = json_decode($data->benefits, true) ?? [];
        $benefitsData = [];
    
        if ($request->has('benefits')) {
            foreach ($request->benefits as $index => $benefit) {
    
                $imageName = $oldBenefits[$index]['image'] ?? null;
    
                // If new image uploaded
                if ($request->hasFile("benefits.$index.image")) {
    
                    // delete old image
                    if (!empty($imageName) && file_exists($uploadPath . $imageName)) {
                        unlink($uploadPath . $imageName);
                    }
    
                    $img = $request->file("benefits.$index.image");
                    $imageName = time().'_'.rand(1000,9999).'_benefit.'.$img->getClientOriginalExtension();
                    $img->move($uploadPath, $imageName);
                }
    
                $benefitsData[] = [
                    'question' => $benefit['question'],
                    'answer' => $benefit['answer'],
                    'image' => $imageName
                ];
            }
        }
    
        // =============================
        // ✅ UPDATE DATABASE
        // =============================
        $data->update([
            'heading' => $request->heading,
            'banner_image' => $bannerImage,
            'desc' => $request->desc,
    
            'benefits_heading' => $request->benefits_heading,
            'benefits' => json_encode($benefitsData),
    
            'job_heading' => $request->job_heading,
            'updated_by' => Auth::id(),
            'updated_at' => Carbon::now(),
        ]);
    
        // =============================
        // ✅ REDIRECT
        // =============================
        return redirect()->route('admin.manage-career-page.index')
            ->with('message', 'Details updated successfully.');
    }
    
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = CareerPage::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-career-page.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
    
}