<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\AboutIntro;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AboutIntroController extends Controller
{

    public function index()
    {
        $intros = AboutIntro::wherenull('deleted_by')->get();
        return view('backend.about.intro.index', compact('intros'));
    }

    public function create()
    {
        return view('backend.about.intro.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'heading' => 'nullable|string|max:255',
                'desc'    => 'required',
                'note'    => 'nullable',
                'image'   => 'nullable',
                'image.*' => 'image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            ],
            [
                'heading.max'      => 'Heading must not exceed 255 characters.',
                'desc.required'   => 'Description is required.',
                'image.required'  => 'Please upload at least one image.',
                'image.*.image'   => 'Each file must be a valid image.',
                'image.*.mimes'   => 'Only jpg, jpeg, png, webp, svg files are allowed.',
                'image.*.max'     => 'Each image must be less than 2MB.',
            ]
        );

        $sectionImages = [];

        $uploadPath = public_path('uploads/about');

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        if ($request->hasFile('image')) {

            foreach ($request->file('image') as $img) {
                $name = time().'_'.rand(1000,9999).'_section.'.$img->getClientOriginalExtension();
                $img->move($uploadPath, $name);
                $sectionImages[] = $name;
            }
        }

        AboutIntro::create([
            'heading' => $request->heading,
            'desc'    => $request->desc,
            'note'    => $request->note,
            'image'   => json_encode($sectionImages),
            'created_by' => Auth::id(),
            'created_at' => Carbon::now(), 
        ]);

        return redirect()->route('admin.manage-about-intro.index')->with('message', 'Data saved successfully.');
    }

    public function edit($id)
    {
        $about = AboutIntro::findOrFail($id);
        return view('backend.about.intro.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $about = AboutIntro::findOrFail($id);

        // existing images from DB
        $existingImages = json_decode($about->image, true) ?? [];

        // removed images
        $removedImages = json_decode($request->removed_images[0] ?? '[]', true);

        // delete removed images physically
        foreach($removedImages as $img){
            $path = public_path('uploads/about/'.$img);

            if(file_exists($path)){
                unlink($path);
            }

            $existingImages = array_diff($existingImages, [$img]);
        }

        // upload new images
        if($request->hasFile('image')){
            foreach($request->file('image') as $file){

                $name = time().'_'.rand(1000,9999).'.'.$file->getClientOriginalExtension();

                $file->move(public_path('uploads/about'), $name);

                $existingImages[] = $name;
            }
        }

        // update record
        $about->update([
            'heading' => $request->heading,
            'desc'    => $request->desc,
            'note'    => $request->note,
            'image'   => json_encode(array_values($existingImages)),
            'updated_by' => Auth::id(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.manage-about-intro.index')->with('message','Updated successfully');
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = AboutIntro::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-about-intro.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }


}