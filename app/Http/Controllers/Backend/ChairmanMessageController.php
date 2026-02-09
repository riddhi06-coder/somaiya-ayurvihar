<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\ManageChairmanMessage;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ChairmanMessageController extends Controller
{

    public function index()
    {
        $chairmanMessages = ManageChairmanMessage::whereNull('deleted_by')
            ->orderBy('id', 'asc')
            ->wherenull('deleted_by')
            ->get();

        return view('backend.about.chairman.index', compact('chairmanMessages'));
    }

    public function create()
    {
        return view('backend.about.chairman.create');
    }

    public function store(Request $request)
    {
        // ================= VALIDATION =================

        $request->validate([
            'chairman_name'        => 'required|string|max:255',
            'chairman_designation'=> 'required|string|max:255',
            'image'               => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'chairman_description'=> 'required',
            'desc_image'          => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'about_description'   => 'required',
            'motto'               => 'required',
            'message'             => 'required',
        ],[
            'chairman_name.required' => 'Chairman name is required.',
            'chairman_designation.required' => 'Designation is required.',
            'image.required' => 'Chairman image is required.',
            'desc_image.required' => 'About image is required.',
            'chairman_description.required' => 'Chairman description is required.',
            'about_description.required' => 'About description is required.',
            'motto.required' => 'Motto is required.',
            'message.required' => 'Message is required.',
        ]);

        // ================= IMAGE UPLOAD PATH =================

        $uploadPath = public_path('uploads/chairman');

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // ================= CHAIRMAN IMAGE =================

        $bannerImageName = null;

        if ($request->hasFile('image')) {

            $img = $request->file('image');

            $bannerImageName = time().'_'.rand(1000,9999).'_banner.'.$img->getClientOriginalExtension();

            $img->move($uploadPath, $bannerImageName);
        }

        // ================= ABOUT IMAGE =================

        $descImageName = null;

        if ($request->hasFile('desc_image')) {

            $img = $request->file('desc_image');

            $descImageName = time().'_'.rand(1000,9999).'_about.'.$img->getClientOriginalExtension();

            $img->move($uploadPath, $descImageName);
        }

        // ================= SAVE DATA =================

        ManageChairmanMessage::create([

            'chairman_name'        => $request->chairman_name,
            'chairman_designation'=> $request->chairman_designation,
            'image'               => $bannerImageName,
            'chairman_description'=> $request->chairman_description,

            'desc_image'          => $descImageName,
            'about_description'   => $request->about_description,

            'motto'               => $request->motto,
            'message'             => $request->message,

            'created_by'          => Auth::id(),
            'created_at'          => Carbon::now(),

        ]);

        // ================= REDIRECT =================
        return redirect()->route('admin.manage-chairman-message.index')->with('message', 'Chairman message added successfully.');
    }

    public function edit($id)
    {
        $about = ManageChairmanMessage::findOrFail($id);
        return view('backend.about.chairman.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $about = ManageChairmanMessage::findOrFail($id);

        // ================= VALIDATION =================

        $request->validate([

            'chairman_name'         => 'required|string|max:255',
            'chairman_designation' => 'required|string|max:255',

            // Images optional in edit
            'image'                => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'desc_image'           => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

            'chairman_description' => 'required',
            'about_description'    => 'required',
            'motto'                => 'required',
            'message'              => 'required',

        ],[
            'chairman_name.required' => 'Chairman name is required.',
            'chairman_designation.required' => 'Designation is required.',
            'chairman_description.required' => 'Chairman description is required.',
            'about_description.required' => 'About description is required.',
            'motto.required' => 'Motto is required.',
            'message.required' => 'Message is required.',
        ]);

        // ================= IMAGE PATH =================

        $uploadPath = public_path('uploads/chairman');

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // ================= CHAIRMAN IMAGE =================

        $bannerImageName = $about->image;

        if ($request->hasFile('image')) {

            // Delete old image
            if ($about->image && file_exists($uploadPath.'/'.$about->image)) {
                unlink($uploadPath.'/'.$about->image);
            }

            $img = $request->file('image');

            $bannerImageName = time().'_'.rand(1000,9999).'_banner.'.$img->getClientOriginalExtension();

            $img->move($uploadPath, $bannerImageName);
        }

        // ================= ABOUT IMAGE =================

        $descImageName = $about->desc_image;

        if ($request->hasFile('desc_image')) {

            if ($about->desc_image && file_exists($uploadPath.'/'.$about->desc_image)) {
                unlink($uploadPath.'/'.$about->desc_image);
            }

            $img = $request->file('desc_image');

            $descImageName = time().'_'.rand(1000,9999).'_about.'.$img->getClientOriginalExtension();

            $img->move($uploadPath, $descImageName);
        }

        // ================= UPDATE DATA =================

        $about->update([

            'chairman_name'         => $request->chairman_name,
            'chairman_designation' => $request->chairman_designation,

            'image'                => $bannerImageName,
            'chairman_description' => $request->chairman_description,

            'desc_image'           => $descImageName,
            'about_description'    => $request->about_description,

            'motto'                => $request->motto,
            'message'              => $request->message,

            'updated_by'           => Auth::id(),
            'updated_at'           => Carbon::now(),

        ]);

        // ================= REDIRECT =================

        return redirect()
            ->route('admin.manage-chairman-message.index')
            ->with('message', 'Chairman message updated successfully.');
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = ManageChairmanMessage::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-chairman-message.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }

}