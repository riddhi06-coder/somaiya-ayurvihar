<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\ManagePrayer;


class PrayerController extends Controller
{

    public function index()
    {
        return view('backend.about.prayer.index');
    }

    public function create()
    {
        return view('backend.about.prayer.create');
    }

    public function store(Request $request)
    {
        // ================= VALIDATION =================

        $request->validate([

            'image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

        ], [

            'image.required' => 'Prayer image is required.',
            'image.image'    => 'Uploaded file must be an image.',
            'image.mimes'    => 'Allowed formats: jpg, jpeg, png, webp, svg.',
            'image.max'      => 'Image size must be less than 2MB.',

        ]);

        // ================= IMAGE UPLOAD PATH =================

        $uploadPath = public_path('uploads/prayer');

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // ================= IMAGE UPLOAD =================

        $imageName = null;

        if ($request->hasFile('image')) {

            $img = $request->file('image');

            $imageName = time().'_'.rand(1000,9999).'_prayer.'.$img->getClientOriginalExtension();

            $img->move($uploadPath, $imageName);
        }

        // ================= SAVE DATA =================

        ManagePrayer::create([

            'image'      => $imageName,
            'created_by'=> Auth::id(),
            'created_at'=> Carbon::now(),

        ]);

        // ================= REDIRECT =================
        return redirect()->route('admin.manage-prayer.index')->with('message', 'Prayer image added successfully.');
    }

}