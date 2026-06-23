<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Announcements;
use App\Models\AnnouncementDetails;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AnnouncementsDetailsController extends Controller
{

    public function index()
    {
        $details = AnnouncementDetails::with('announcement') 
            ->whereNull('deleted_at') 
            ->get();
    
        return view('backend.announcement.details.index', compact('details'));
    }


    public function create()
    {
        $announcements = Announcements::whereNull('deleted_at')
            ->orderBy('id', 'desc')
            ->get();
    
        return view('backend.announcement.details.create', compact('announcements'));
    }
    
    
    public function store(Request $request)
    {
        // ✅ Validation
        $request->validate([
            'announcement_id' => 'required|exists:anouncements_listing,id|unique:announcements_details,announcement_id',
            'announce_image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'description' => 'required|string',
        ], [
            'announcement_id.required' => 'Please select announcement.',
            'announcement_id.exists' => 'Invalid announcement selected.',
    
            'announce_image.required' => 'Announcement image is required.',
            'announce_image.image' => 'File must be an image.',
            'announce_image.mimes' => 'Only jpg, jpeg, png, webp, svg allowed.',
            'announce_image.max' => 'Image size must be less than 2MB.',
    
            'description.required' => 'Description is required.',
        ]);
    
        // ✅ Image Upload
        $imageName = null;
    
        if ($request->hasFile('announce_image')) {
    
            $uploadPath = public_path('uploads/announcement-details/');
    
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
    
            $img = $request->file('announce_image');
    
            // ✅ FIXED (with dot)
            $imageName = time().'_'.rand(1000,9999).'.'.$img->extension();
    
            $img->move($uploadPath, $imageName);
        }
    
        // ✅ Store in DB
        AnnouncementDetails::create([
            'announcement_id' => $request->announcement_id,
            'image' => $imageName,
            'description' => $request->description,
            'created_by' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);
    
        // ✅ Redirect
        return redirect()->route('admin.manage-announce-details.index')
            ->with('message', 'Announcement details added successfully!');
    }
    
    
    public function edit($id)
    {
        $announcements = Announcements::whereNull('deleted_at')
            ->orderBy('id', 'desc')
            ->get();
            
        $announcements_details = AnnouncementDetails::findOrFail($id);
        return view('backend.announcement.details.edit', compact('announcements', 'announcements_details'));
    }
    

    public function update(Request $request, $id)
    {
        $announcement = AnnouncementDetails::findOrFail($id);
    
        // ✅ Validation
        $request->validate([
            'announcement_id' => 'required|exists:anouncements_listing,id|unique:announcements_details,announcement_id,' . $id,
            'announce_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'description' => 'required|string',
        ], [
            'announcement_id.required' => 'Please select announcement.',
            'announcement_id.exists' => 'Invalid announcement selected.',
            'announcement_id.unique' => 'Details already added for this announcement.',
    
            'announce_image.image' => 'File must be an image.',
            'announce_image.mimes' => 'Only jpg, jpeg, png, webp, svg allowed.',
            'announce_image.max' => 'Image size must be less than 2MB.',
    
            'description.required' => 'Description is required.',
        ]);
    
        // ✅ Image Upload + Old Delete
        $imageName = $announcement->image;
    
        if ($request->hasFile('announce_image')) {
    
            $uploadPath = public_path('uploads/announcement-details/');
    
            // delete old image
            if ($announcement->image && file_exists($uploadPath.$announcement->image)) {
                unlink($uploadPath.$announcement->image);
            }
    
            $img = $request->file('announce_image');
    
            $imageName = time().'_'.rand(1000,9999).'.'.$img->extension();
    
            $img->move($uploadPath, $imageName);
        }
    
        // ✅ Update DB
        $announcement->update([
            'announcement_id' => $request->announcement_id,
            'image' => $imageName,
            'description' => $request->description,
            'updated_by' => Auth::id(),
            'updated_at' => Carbon::now(),
        ]);
    
        // ✅ Redirect
        return redirect()->route('admin.manage-announce-details.index')
            ->with('message', 'Announcement details updated successfully!');
    }
    
    
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = AnnouncementDetails::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-announce-details.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }


}