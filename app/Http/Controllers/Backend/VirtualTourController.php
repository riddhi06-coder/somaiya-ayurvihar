<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\VirtualTour;
use Illuminate\Http\Request;
use Carbon\Carbon;


class VirtualTourController extends Controller
{

    public function index()
    {
        $tours = VirtualTour::wherenull('deleted_by')
            ->get();

        return view('backend.home.virtual_tour.index', compact('tours'));
    }

    public function create()
    {
        return view('backend.home.virtual_tour.create');
    }
    
    
    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'testimonial' => 'required|string',
            'thumbnail'   => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'video'       => 'required|file|mimes:mp4,mov,avi,webm|max:10240',
        ], [
            'title.required'       => 'Please enter a title.',
            'testimonial.required' => 'Please enter the description.',
            'thumbnail.required'   => 'Please upload a thumbnail image.',
            'thumbnail.image'      => 'Thumbnail must be an image.',
            'thumbnail.mimes'      => 'Thumbnail must be jpg, jpeg, png, or webp.',
            'thumbnail.max'        => 'Thumbnail size must be less than 2MB.',
            'video.required'       => 'Please upload a video.',
            'video.mimes'          => 'Video must be mp4, mov, avi, or webm.',
            'video.max'            => 'Video size must be less than 10MB.',
        ]);

        $tour = new VirtualTour();
        $tour->title       = $request->title;
        $tour->testimonial = $request->testimonial;

        if ($request->hasFile('thumbnail')) {
            $thumb = $request->file('thumbnail');
            $thumbName = time() . '_thumb_' . rand(1000, 9999) . '.' . $thumb->getClientOriginalExtension();
            $thumb->move(public_path('uploads/virtual-tour/thumbnails'), $thumbName);
            $tour->thumbnail = $thumbName;
        }

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $fileName = time() . '_' . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/virtual-tour'), $fileName);
            $tour->video = $fileName;
        }

        $tour->created_by = auth()->id();
        $tour->save();

        return redirect()->route('admin.manage-virtual-tour.index')
            ->with('message', 'Virtual tour added successfully.');
    }

    // EDIT FORM
    public function edit($id)
    {
        $tour = VirtualTour::findOrFail($id);
        return view('backend.home.virtual_tour.edit', compact('tour'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $tour = VirtualTour::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'testimonial' => 'required|string',
            // files optional on update — keep existing if not re-uploaded
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'video'       => 'nullable|file|mimes:mp4,mov,avi,webm|max:10240',
        ]);

        $tour->title       = $request->title;
        $tour->testimonial = $request->testimonial;

        if ($request->hasFile('thumbnail')) {
            $thumb = $request->file('thumbnail');
            $thumbName = time() . '_thumb_' . rand(1000, 9999) . '.' . $thumb->getClientOriginalExtension();
            $thumb->move(public_path('uploads/virtual-tour/thumbnails'), $thumbName);
            $tour->thumbnail = $thumbName;
        }

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $fileName = time() . '_' . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/virtual-tour'), $fileName);
            $tour->video = $fileName;
        }

        $tour->modified_by = auth()->id();
        $tour->save();

        return redirect()->route('admin.manage-virtual-tour.index')
            ->with('message', 'Virtual tour updated successfully.');
    }

    // DELETE (soft delete via deleted_by)
    public function destroy($id)
    {
        $tour = VirtualTour::findOrFail($id);
        $tour->deleted_by = auth()->id();
        $tour->save();

        return redirect()->route('admin.manage-virtual-tour.index')
            ->with('message', 'Virtual tour deleted successfully.');
    }


    
}