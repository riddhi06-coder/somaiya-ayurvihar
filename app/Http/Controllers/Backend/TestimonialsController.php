<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Carbon\Carbon;


class TestimonialsController extends Controller
{

    public function index()
    {
        $testimonials = Testimonial::wherenull('deleted_by')
            ->orderByRaw('priority IS NULL, priority ASC')
            ->get();

        return view('backend.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('backend.testimonials.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type'  => 'required|in:text,video',
    
            // Title — required only for video
            'title' => 'required_if:type,video|nullable|string|max:255',
            'thumbnail' => 'required_if:type,video|nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    
            // Text testimonial fields — required only for text
            'testimonial' => 'required_if:type,text|nullable|string',
            'rating'      => 'required_if:type,text|nullable|integer|min:1|max:5',
            'person_name' => 'required_if:type,text|nullable|string|max:255',
            'person_role' => 'required_if:type,text|nullable|in:Patient,Doctor,Admin',
    
            // Video — required only for video, max 5MB (5120 KB)
            'video' => 'required_if:type,video|nullable|file|mimes:mp4,mov,avi,webm|max:5120',
        ], [
            'type.required'  => 'Please select a testimonial type.',
            'type.in'        => 'Invalid testimonial type selected.',
    
            'title.required_if' => 'Please enter a title for the video testimonial.',
            'title.max'         => 'Title cannot exceed 255 characters.',
    
            'testimonial.required_if' => 'Please enter the testimonial.',
            
            'thumbnail.required_if' => 'Please upload a thumbnail image.',
            'thumbnail.image'       => 'Thumbnail must be an image.',
            'thumbnail.mimes'       => 'Thumbnail must be a file of type: jpg, jpeg, png, webp.',
            'thumbnail.max'         => 'Thumbnail size must be less than 2MB.',

    
            'rating.required_if' => 'Please select a rating.',
            'rating.integer'     => 'Rating must be a number.',
            'rating.min'         => 'Rating must be at least 1.',
            'rating.max'         => 'Rating cannot be more than 5.',
    
            'person_name.required_if' => "Please enter the person's name.",
            'person_name.max'         => 'Name cannot exceed 255 characters.',
    
            'person_role.required_if' => 'Please select a role.',
            'person_role.in'          => 'Invalid role selected.',
    
            'video.required_if' => 'Please upload a video.',
            'video.file'        => 'The uploaded video is not valid.',
            'video.mimes'       => 'Video must be a file of type: mp4, mov, avi, webm.',
            'video.max'         => 'Video size must be less than 5MB.',
        ]);
    
        $testimonial = new Testimonial();
        $testimonial->type = $request->type;
    
        if ($request->type === 'video') {
            // Handle video upload
            if ($request->hasFile('video')) {
                $file = $request->file('video');
                $fileName = time() . '_' . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/testimonials'), $fileName);
                $testimonial->video = $fileName;
            }
            
            
            // thumbnail upload
            if ($request->hasFile('thumbnail')) {
                $thumb = $request->file('thumbnail');
                $thumbName = time() . '_thumb_' . rand(1000, 9999) . '.' . $thumb->getClientOriginalExtension();
                $thumb->move(public_path('uploads/testimonials/thumbnails'), $thumbName);
                $testimonial->thumbnail = $thumbName;
            }
    
    
            $testimonial->title = $request->title;
    
            // text-only fields stay null for video
            $testimonial->testimonial = null;
            $testimonial->rating = null;
            $testimonial->person_name = null;
            $testimonial->person_role = null;
    
        } else { // text
            $testimonial->testimonial = $request->testimonial;
            $testimonial->rating = $request->rating;
            $testimonial->person_name = $request->person_name;
            $testimonial->person_role = $request->person_role;
    
            // video-only fields stay null for text
            $testimonial->title = null;
            $testimonial->video = null;
        }
    
        $testimonial->created_by = auth()->id();
        $testimonial->save();
    
        return redirect()->route('admin.manage-testimonials.index')->with('message', 'Testimonial added successfully.');
    }
    
    // EDIT FORM
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('backend.testimonials.edit', compact('testimonial'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $item = Testimonial::findOrFail($id);

        $request->validate([
            'type'  => 'required|in:text,video',
            'title' => 'required_if:type,video|nullable|string|max:255',
            'testimonial' => 'required_if:type,text|nullable|string',
            'rating'      => 'required_if:type,text|nullable|integer|min:1|max:5',
            'person_name' => 'required_if:type,text|nullable|string|max:255',
            'person_role' => 'required_if:type,text|nullable|in:Patient,Doctor,Admin',
            // files optional on update — keep existing if not re-uploaded
            'video'     => 'nullable|file|mimes:mp4,mov,avi,webm|max:5120',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $item->type = $request->type;

        if ($request->type === 'video') {
            if ($request->hasFile('video')) {
                $file = $request->file('video');
                $name = time() . '_' . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/testimonials'), $name);
                $item->video = $name;
            }
            if ($request->hasFile('thumbnail')) {
                $thumb = $request->file('thumbnail');
                $thumbName = time() . '_thumb_' . rand(1000, 9999) . '.' . $thumb->getClientOriginalExtension();
                $thumb->move(public_path('uploads/testimonials/thumbnails'), $thumbName);
                $item->thumbnail = $thumbName;
            }
            $item->title = $request->title;
            // clear text fields when switching to video
            $item->testimonial = null;
            $item->rating = null;
            $item->person_name = null;
            $item->person_role = null;
        } else {
            $item->testimonial = $request->testimonial;
            $item->rating      = $request->rating;
            $item->person_name = $request->person_name;
            $item->person_role = $request->person_role;
            // clear video fields when switching to text
            $item->title = null;
            $item->video = null;
            $item->thumbnail = null;
        }

        $item->modified_by = auth()->id();
        $item->save();

        return redirect()->route('admin.manage-testimonials.index')
            ->with('message', 'Testimonial updated successfully.');
    }
    
    // STATUS TOGGLE (for the active switch)
    public function updatePriority(Request $request)
    {
        $item = Testimonial::findOrFail($request->id);
        $item->priority = $request->priority;
        $item->save();
    
        return response()->json(['success' => true]);
    }
    
    public function toggleStatus($id)
    {
        $item = Testimonial::findOrFail($id);
        $item->is_active = !$item->is_active;
        $item->save();
    
        return response()->json(['success' => true, 'is_active' => $item->is_active]);
    }
}