<?php

namespace App\Http\Controllers\Backend\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\TestimonialDetail;

class TestimonialsDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
    {
        $records = TestimonialDetail::whereNull('deleted_at')
            ->orderBy('id', 'desc')
            ->get();

        return view('backend.home.testimonial-details.index', compact('records'));
    }


    public function create()
    {
        return view('backend.home.testimonial-details.create');
       
    }

  public function store(Request $request)
{
    // ✅ Validation
    $request->validate([
        'heading' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'items.*.title' => 'required|string|max:255',
        'items.*.video' => 'required|file|mimes:mp4,webm,ogg|max:10240',
        'items.*.image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $uploadPath = public_path('home/testimonials');
    if (!file_exists($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    $items = [];

    foreach ($request->items as $item) {

        // 🎥 Video upload
        $videoName = null;
        if (!empty($item['video'])) {
            $video = $item['video'];
            $videoName = time().'_video_'.uniqid().'.'.$video->getClientOriginalExtension();
            $video->move($uploadPath, $videoName);
        }

        // 🖼️ Profile Image upload
        $imageName = null;
        if (!empty($item['image'])) {
            $image = $item['image'];
            $imageName = time().'_image_'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move($uploadPath, $imageName);
        }

        $items[] = [
            'title' => $item['title'],
            'video' => $videoName,
            'image' => $imageName,
        ];
    }

    TestimonialDetail::create([
        'heading' => $request->heading,
        'title'   => $request->title,
        'items'   => $items,   // ✅ STORE ARRAY (NO json_encode)
        'created_by' => auth()->id(),
    ]);

    return redirect()
        ->route('admin.testimonial-details.index')
        ->with('message', 'Testimonial added successfully.');
}


// ✅ Edit
public function edit($id)
{
    $record = TestimonialDetail::findOrFail($id);

    // No need to json_decode; cast already converts JSON to array
    // $record->items = json_decode($record->items, true); // ❌ remove this line

    return view('backend.home.testimonial-details.edit', compact('record'));
}

public function update(Request $request, $id)
{
    $record = TestimonialDetail::findOrFail($id);

    $request->validate([
        'heading' => 'required|string|max:255',
        'title'   => 'required|string|max:255',
        'items.*.title' => 'required|string|max:255',
        'items.*.video' => 'nullable|file|mimes:mp4,webm,ogg|max:10240',
        'items.*.image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg',
    ]);

    $uploadPath = public_path('home/testimonials');
    if (!file_exists($uploadPath)) mkdir($uploadPath, 0777, true);

    $items = [];

    foreach ($request->items ?? [] as $item) {

        // video
        $videoName = $item['old_video'] ?? null;
        if (!empty($item['video'])) {
            $videoName = time().'_video_'.uniqid().'.'.$item['video']->getClientOriginalExtension();
            $item['video']->move($uploadPath, $videoName);
        }

        // profile image
        $imageName = $item['old_image'] ?? null;
        if (!empty($item['image'])) {
            $imageName = time().'_img_'.uniqid().'.'.$item['image']->getClientOriginalExtension();
            $item['image']->move($uploadPath, $imageName);
        }

        $items[] = [
            'title' => $item['title'],
            'video' => $videoName,
            'image' => $imageName,
        ];
    }

    $record->update([
        'heading' => $request->heading,
        'title'   => $request->title,
        'items'   => $items,   // ✅ NO json_encode
        'updated_by' => auth()->id(),
    ]);

    return redirect()->route('admin.testimonial-details.index')
        ->with('success', 'Testimonial updated successfully');
}


public function destroy($id)
{
    $record = TestimonialDetail::findOrFail($id);

    $record->update([
        'deleted_by' => auth()->id(),
    ]);

    $record->delete(); // Must call this for soft delete

    return redirect()->route('admin.testimonial-details.index')
        ->with('message', 'Testimonial deleted successfully!');
}
}