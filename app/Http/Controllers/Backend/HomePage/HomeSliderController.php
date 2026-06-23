<?php

namespace App\Http\Controllers\Backend\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\HomeSlider;



class HomeSliderController extends Controller
{
 
    public function index()
    {
        $sliders = HomeSlider::wherenull('deleted_by')->get();

        return view('backend.home.bannerslider.index', compact('sliders'));
    }

    public function create()
    {
        return view('backend.home.bannerslider.create');
       
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'banner_media'   => 'required|file|mimes:jpg,jpeg,png,webp,mp4,webm',
            'banner_heading' => 'nullable|string|max:255',
        ]);

        $validator->after(function ($validator) use ($request) {
            if ($request->hasFile('banner_media')) {
                $mime = $request->file('banner_media')->getMimeType();

                // If IMAGE → heading REQUIRED
                if (str_starts_with($mime, 'image/')
                    && !$request->filled('banner_heading')) {

                    $validator->errors()->add(
                        'banner_heading',
                        'The banner heading field is required when image uploaded.'
                    );
                }
            }
        });

        $validator->validate(); 

        $fileName = null;
        $mediaType = null;

        if ($request->hasFile('banner_media')) {
            $file = $request->file('banner_media');

            // Detect media type
            $mediaType = str_starts_with($file->getMimeType(), 'video')
                ? 'video'
                : 'image';

            // Destination folder
            $folder = public_path('home/bannerimagevideo');

            // Create folder if not exists
            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }

            // Generate unique file name
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // Move file
            $file->move($folder, $fileName);
        }

        HomeSlider::create([
            'banner_heading' => $request->banner_heading,
            'banner_media'   => $fileName, 
            'media_type'     => $mediaType,
            'created_by'     => Auth::id(),
            'created_at'     => Carbon::now(),
        ]);

        return redirect()
            ->route('admin.banner-details.index')
            ->with('message', 'Banner added successfully');
    }

    public function edit($id)
    {
        $slider = HomeSlider::findOrFail($id);

        return view('backend.home.bannerslider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = HomeSlider::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'banner_media'   => 'nullable|file|mimes:jpg,jpeg,png,webp,mp4,webm',
            'banner_heading' => 'nullable|string|max:255',
        ]);

        $validator->after(function ($validator) use ($request, $slider) {

            // CASE 1: New media uploaded
            if ($request->hasFile('banner_media')) {
                $mime = $request->file('banner_media')->getMimeType();

                if (str_starts_with($mime, 'image/')
                    && !$request->filled('banner_heading')) {

                    $validator->errors()->add(
                        'banner_heading',
                        'The banner heading field is required when image is uploaded.'
                    );
                }
            }
            // CASE 2: No new media → check existing media type
            else {
                if ($slider->media_type === 'image'
                    && !$request->filled('banner_heading')) {

                    $validator->errors()->add(
                        'banner_heading',
                        'The banner heading field is required for image banners.'
                    );
                }
            }
        });

        $validator->validate(); // IMPORTANT

        $fileName = $slider->banner_media;
        $mediaType = $slider->media_type;

        if ($request->hasFile('banner_media')) {

            // Delete old file
            $oldPath = public_path('home/bannerimagevideo/' . $slider->banner_media);
            if ($slider->banner_media && file_exists($oldPath)) {
                unlink($oldPath);
            }

            $file = $request->file('banner_media');

            $mediaType = str_starts_with($file->getMimeType(), 'video')
                ? 'video'
                : 'image';

            $folder = public_path('home/bannerimagevideo');
            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }

            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($folder, $fileName);
        }

        $slider->update([
            'banner_heading' => $request->banner_heading,
            'banner_media'   => $fileName,
            'media_type'     => $mediaType,
            'updated_by'     => Auth::id(),
            'updated_at'     => Carbon::now(),
        ]);

        return redirect()
            ->route('admin.banner-details.index')
            ->with('message', 'Banner updated successfully');
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = HomeSlider::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.banner-details.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
    
}