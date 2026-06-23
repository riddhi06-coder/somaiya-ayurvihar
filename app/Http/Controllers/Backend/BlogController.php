<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use Illuminate\Http\Request;
use Carbon\Carbon;


class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')->wherenull('deleted_by')->get();
        return view('backend.blog.listing.index', compact('blogs'));
    }
    
    public function create()
    {
        return view('backend.blog.listing.create');
    }
    
    public function toggleStatus($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->is_active = !$blog->is_active;
        $blog->save();
    
        return response()->json([
            'success' => true,
            'status'  => $blog->is_active,
        ]);
    }
    
    public function store(Request $request)
    {
        // ✅ Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'date' => 'required|date',
            'blog_details' => 'required|string',
            'blog_image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ], [
            'title.required' => 'Title is required.',
            'author.required' => 'Author is required.',
            'date.required' => 'Date is required.',
            'date.date' => 'Invalid date format.',
            'blog_details.required' => 'Blog description is required.',
            'blog_image.required' => 'Blog image is required.',
            'blog_image.image' => 'File must be an image.',
            'blog_image.mimes' => 'Only jpg, jpeg, png, webp, svg allowed.',
            'blog_image.max' => 'Image size must be less than 2MB.',
        ]);
    
        // ✅ Slug Generate
        $slug = Str::slug($request->title);
    
        // Ensure unique slug
        $count = Blog::where('slug', 'LIKE', "$slug%")->count();
        $slug = $count ? $slug . '-' . ($count + 1) : $slug;
    
        // ✅ Image Upload (your method)
        $blogImageName = null;
    
        if ($request->hasFile('blog_image')) {
    
            $uploadPath = public_path('uploads/blogs/');
    
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
    
            $img = $request->file('blog_image');
    
            $blogImageName = time().'_'.rand(1000,9999).'.'.$img->getClientOriginalExtension();
    
            $img->move($uploadPath, $blogImageName);
        }
    
        // ✅ Store Data
        Blog::create([
            'title' => $request->title,
            'slug' => $slug,
            'author' => $request->author,
            'date' => $request->date,
            'blog_image' => $blogImageName,
            'blog_details' => $request->blog_details,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);
    
        // ✅ Redirect
        return redirect()->route('admin.manage-blogs.index')->with('message', 'Blog added successfully!');
    }
    
    public function updatePriority(Request $request)
    {
        $blog = Blog::find($request->id);
    
        if ($blog) {
            $blog->priority = $request->priority;
            $blog->save();
    
            return response()->json(['message' => 'Priority updated']);
        }
    
        return response()->json(['message' => 'Record not found'], 404);
    }
    
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('backend.blog.listing.edit', compact('blog'));
    }
    
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
    
        // ✅ Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'date' => 'required|date',
            'blog_details' => 'required|string',
            'blog_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ]);
    
        // ✅ Slug update
        $slug = Str::slug($request->title);
    
        $count = Blog::where('slug', 'LIKE', "$slug%")
                    ->where('id', '!=', $id)
                    ->count();
    
        $slug = $count ? $slug . '-' . ($count + 1) : $slug;
    
        // ✅ Image Upload (optional)
        if ($request->hasFile('blog_image')) {
    
            $uploadPath = public_path('uploads/blogs/');
    
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
    
            // delete old image
            if ($blog->blog_image && file_exists($uploadPath.$blog->blog_image)) {
                unlink($uploadPath.$blog->blog_image);
            }
    
            $img = $request->file('blog_image');
    
            $imageName = time().'_'.rand(1000,9999).'.'.$img->getClientOriginalExtension();
    
            $img->move($uploadPath, $imageName);
    
            $blog->blog_image = $imageName;
        }
    
        // ✅ Update Data
        $blog->update([
            'title' => $request->title,
            'slug' => $slug,
            'author' => $request->author,
            'date' => $request->date,
            'blog_details' => $request->blog_details,
            'updated_by' => auth()->id(),
            'updated_at' => now(),
        ]);
    
        return redirect()->route('admin.manage-blogs.index')->with('message', 'Blog updated successfully!');
    }
    
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = Blog::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-blogs.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
    
}