<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Announcements;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AnnouncementsController extends Controller
{

    public function index()
    {
        $announcements = Announcements::whereNull('deleted_at')
            ->orderBy('priority', 'asc')
            ->get();
    
        return view('backend.announcement.listing.index', compact('announcements'));
    }

    public function create()
    {
        return view('backend.announcement.listing.create');
    }
    

    public function store(Request $request)
    {
        // ✅ Validation Rules
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'announce_image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
    
            'social_media' => 'required|array|min:1',
            'social_media.*.platform' => 'required',
            'social_media.*.link' => 'required|url',
        ], [
            'title.required' => 'Title is required.',
            'date.required' => 'Date is required.',
            'date.date' => 'Please enter a valid date.',
    
            'announce_image.required' => 'Announcement image is required.',
            'announce_image.image' => 'File must be an image.',
            'announce_image.mimes' => 'Only jpg, jpeg, png, webp, svg allowed.',
            'announce_image.max' => 'Image size must be less than 2MB.',
    
            'social_media.required' => 'At least one social media link is required.',
            'social_media.*.platform.required' => 'Please select platform.',
            'social_media.*.link.required' => 'Please enter link.',
            'social_media.*.link.url' => 'Please enter valid URL.',
        ]);
    
        // ✅ Generate Slug
        $slug = Str::slug($request->title);
    
        // Ensure unique slug
        $originalSlug = $slug;
        $count = 1;
    
        while (\App\Models\Announcements::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }
    
        // ✅ Image Upload
        $bannerImageName = null;
    
        if ($request->hasFile('announce_image')) {
    
            $uploadPath = public_path('uploads/announcements/');
    
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
    
            $img = $request->file('announce_image');
    
            $bannerImageName = time().'_'.rand(1000,9999).'.'.$img->getClientOriginalExtension();
    
            $img->move($uploadPath, $bannerImageName);
        }
    
        // ✅ Social Media JSON Encode
        $socialMedia = [];
    
        if ($request->social_media) {
            foreach ($request->social_media as $item) {
                if (!empty($item['platform']) && !empty($item['link'])) {
                    $socialMedia[] = [
                        'platform' => $item['platform'],
                        'link' => $item['link'],
                    ];
                }
            }
        }
    
        // ✅ Store in DB
        Announcements::create([
            'title' => $request->title,
            'slug' => $slug,
            'date' => $request->date,
            'image' => $bannerImageName,
            'social_media' => json_encode($socialMedia),
            'created_by' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);
    
        // ✅ Redirect
        return redirect()->route('admin.manage-announcements.index')->with('message', 'Announcement added successfully!');
    }
    
    
    public function toggleFeatured(Request $request)
    {
        $announcement = \App\Models\Announcements::find($request->id);
    
        if ($announcement) {
            $announcement->is_featured = $request->is_featured;
            $announcement->save();
    
            return response()->json(['message' => 'Featured updated on Home Page']);
        }
    
        return response()->json(['message' => 'Record not found'], 404);
    }


    public function updatePriority(Request $request)
    {
        $announcement = \App\Models\Announcements::find($request->id);
    
        if ($announcement) {
            $announcement->priority = $request->priority;
            $announcement->save();
    
            return response()->json(['message' => 'Priority updated']);
        }
    
        return response()->json(['message' => 'Record not found'], 404);
    }
    
    
    public function edit($id)
    {
        $announcements = Announcements::findOrFail($id);
    
        // Decode social media JSON
        $contact_details = json_decode($announcements->social_media, true);
    
        return view('backend.announcement.listing.edit', compact('announcements', 'contact_details'));
    }
    
    
    
    public function update(Request $request, $id)
    {
        $announcement = Announcements::findOrFail($id);
    
        // ✅ Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'announce_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
    
            'social_media' => 'required|array|min:1',
            'social_media.*.platform' => 'required',
            'social_media.*.link' => 'required|url',
        ]);
    
        // ✅ Slug Update (if title changed)
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;
    
        while (
            Announcements::where('slug', $slug)
            ->where('id', '!=', $id)
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $count++;
        }
    
        // ✅ Image Upload + Old Image Delete
        $bannerImageName = $announcement->image;
    
        if ($request->hasFile('announce_image')) {
    
            $uploadPath = public_path('uploads/announcements/');
    
            // Delete old image
            if ($announcement->image && file_exists($uploadPath.$announcement->image)) {
                unlink($uploadPath.$announcement->image);
            }
    
            $img = $request->file('announce_image');
    
            $bannerImageName = time().'_'.rand(1000,9999).'.'.$img->extension();
    
            $img->move($uploadPath, $bannerImageName);
        }
    
        // ✅ Social Media JSON
        $socialMedia = [];
    
        if ($request->social_media) {
            foreach ($request->social_media as $item) {
                if (!empty($item['platform']) && !empty($item['link'])) {
                    $socialMedia[] = [
                        'platform' => $item['platform'],
                        'link' => $item['link'],
                    ];
                }
            }
        }
    
        // ✅ Update DB
        $announcement->update([
            'title' => $request->title,
            'slug' => $slug,
            'date' => $request->date,
            'image' => $bannerImageName,
            'social_media' => json_encode($socialMedia),
            'updated_at' => Carbon::now(),
        ]);
    
        return redirect()->route('admin.manage-announcements.index')
            ->with('message', 'Announcement updated successfully!');
    }
    
    
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = Announcements::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-announcements.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }

    
    
}