<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use App\Models\BlogDetails;
use Illuminate\Http\Request;
use Carbon\Carbon;


class BlogDetailsController extends Controller
{

    public function index()
    {
        $details = BlogDetails::with('blog') 
                    ->wherenull('deleted_by')
                    ->orderBy('id', 'desc')
                    ->get();
    
        return view('backend.blog.details.index', compact('details'));
    }
    
    public function create()
    {
        $blog = Blog::whereNull('deleted_at')
            ->where('is_active', 1)
            ->orderBy('id', 'desc')
            ->get();
        return view('backend.blog.details.create', compact('blog'));
    }
    
    public function store(Request $request)
    {
        // ✅ Validation
        $request->validate([
            'blog_id' => 'required|exists:blogs,id|unique:blog_details,blog_id',
            'announce_image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'description' => 'required|string',
            'tags' => 'nullable|string'
        ], [
            'blog_id.required' => 'Please select a blog.',
            'blog_id.exists' => 'Selected blog is invalid.',
            'blog_id.unique' => 'Details already added for this blog.',
            'announce_image.required' => 'Announcement image is required.',
            'announce_image.image' => 'File must be an image.',
            'announce_image.mimes' => 'Only jpg, jpeg, png, webp, svg allowed.',
            'announce_image.max' => 'Image must be less than 2MB.',
            'description.required' => 'Description is required.',
        ]);
    
        // ✅ Handle Tags
        $tags = [];
    
        if (!empty($request->tags)) {
    
            if (str_starts_with($request->tags, '[')) {
                $decoded = json_decode($request->tags, true);
                $tags = array_column($decoded, 'value');
            } else {
                $tags = array_map('trim', explode(',', $request->tags));
            }
        }
    
        $tagsJson = !empty($tags) ? json_encode($tags) : null;
    
        // ✅ Image Upload (YOUR METHOD)
        $imageName = null;
    
        if ($request->hasFile('announce_image')) {
    
            $uploadPath = public_path('uploads/blog-details/');
    
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
    
            $img = $request->file('announce_image');
    
            $imageName = time().'_'.rand(1000,9999).'.'.$img->getClientOriginalExtension();
    
            $img->move($uploadPath, $imageName);
        }
    
        // ✅ Store
        BlogDetails::create([
            'blog_id' => $request->blog_id,
            'announce_image' => $imageName,
            'description' => $request->description,
            'tags' => $tagsJson,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);
    
        // ✅ Redirect
        return redirect()->route('admin.manage-b-details.index')->with('message', 'Blog details added successfully!');
    }
    
    public function edit($id)
    {
        $blog = Blog::whereNull('deleted_at')
            ->orderBy('id', 'desc')
            ->get();
            
        $blog_details = BlogDetails::findOrFail($id);
        return view('backend.blog.details.edit', compact('blog', 'blog_details'));
    }
    
    public function update(Request $request, $id)
    {
        $blogDetails = BlogDetails::findOrFail($id);
    
        // ✅ Validation (ignore current record for unique)
        $request->validate([
            'blog_id' => 'required|exists:blog_listing,id|unique:blog_details,blog_id,' . $id,
            'announce_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'description' => 'required|string',
            'tags' => 'nullable|string'
        ], [
            'blog_id.required' => 'Please select a blog.',
            'blog_id.exists' => 'Selected blog is invalid.',
            'blog_id.unique' => 'Details already added for this blog.',
            'announce_image.image' => 'File must be an image.',
            'announce_image.mimes' => 'Only jpg, jpeg, png, webp, svg allowed.',
            'announce_image.max' => 'Image must be less than 2MB.',
            'description.required' => 'Description is required.',
        ]);
    
        // ✅ Handle Tags (same as store)
        $tags = [];
    
        if (!empty($request->tags)) {
    
            if (str_starts_with($request->tags, '[')) {
                $decoded = json_decode($request->tags, true);
                $tags = array_column($decoded, 'value');
            } else {
                $tags = array_map('trim', explode(',', $request->tags));
            }
        }
    
        $tagsJson = !empty($tags) ? json_encode($tags) : null;
    
        // ✅ Image Upload (Replace old image if new uploaded)
        if ($request->hasFile('announce_image')) {
    
            $uploadPath = public_path('uploads/blog-details/');
    
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
    
            // 🔥 Delete old image
            if ($blogDetails->announce_image && file_exists($uploadPath . $blogDetails->announce_image)) {
                unlink($uploadPath . $blogDetails->announce_image);
            }
    
            $img = $request->file('announce_image');
    
            $imageName = time().'_'.rand(1000,9999).'.'.$img->getClientOriginalExtension();
    
            $img->move($uploadPath, $imageName);
    
            $blogDetails->announce_image = $imageName;
        }
    
        // ✅ Update Data
        $blogDetails->update([
            'blog_id' => $request->blog_id,
            'description' => $request->description,
            'tags' => $tagsJson,
            'updated_by' => Auth::id(),
            'updated_at' => Carbon::now(),
        ]);
    
        // ✅ Redirect
        return redirect()->route('admin.manage-b-details.index')->with('message', 'Blog details updated successfully!');
    }
    
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = BlogDetails::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-b-details.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
    
}