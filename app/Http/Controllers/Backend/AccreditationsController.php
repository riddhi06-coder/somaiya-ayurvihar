<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\ManageAccreditations;


class AccreditationsController extends Controller
{

    public function index()
    {
        $accreditations = ManageAccreditations::whereNull('deleted_by')->orderBy('id','asc')->get();
        return view('backend.about.accreditations.index', compact('accreditations'));
    }

    public function create()
    {
        return view('backend.about.accreditations.create');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ],[
            'image.required' => 'Please upload Image.',
            'image.image'    => 'Uploaded file must be an image.',
            'image.mimes'    => 'Allowed formats: jpg, jpeg, png, webp, svg.',
            'image.max'      => 'Image size must be less than 2MB.',
        ]);

        try {

            $uploadPath = public_path('uploads/accreditations');

            // Create folder if not exists
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $imageName = null;

            // SAME IMAGE UPLOAD METHOD
            if ($request->hasFile('image')) {
                $img = $request->file('image');
                $imageName = time() . '_' . rand(1000, 9999) . '_accreditation.' . $img->getClientOriginalExtension();
                $img->move($uploadPath, $imageName);
            }

            // Save Data
            ManageAccreditations::create([
                'image'      => $imageName,
                'created_by' => Auth::id(),
                'created_at' => Carbon::now(),
            ]);

            return redirect()
                ->route('admin.manage-accreditations.index')
                ->with('message','Accreditation added successfully.');

        } catch (\Exception $e) {

            return back()->with('error','Something went wrong.');
        }
    }

    public function edit($id)
    {
        $accreditations = ManageAccreditations::findOrFail($id);
        return view('backend.about.accreditations.edit', compact('accreditations'));
    }

    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ],[
            'image.image' => 'Uploaded file must be an image.',
            'image.mimes' => 'Allowed formats: jpg, jpeg, png, webp, svg.',
            'image.max'   => 'Image size must be less than 2MB.',
        ]);

        try {

            $accreditation = ManageAccreditations::findOrFail($id);

            $uploadPath = public_path('uploads/accreditations');

            // Create folder if not exists
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $imageName = $accreditation->image;

            // SAME IMAGE UPLOAD METHOD
            if ($request->hasFile('image')) {

                // Delete old image
                if ($accreditation->image && file_exists($uploadPath.'/'.$accreditation->image)) {
                    unlink($uploadPath.'/'.$accreditation->image);
                }

                $img = $request->file('image');
                $imageName = time() . '_' . rand(1000, 9999) . '_accreditation.' . $img->getClientOriginalExtension();
                $img->move($uploadPath, $imageName);
            }

            // Update Data
            $accreditation->update([
                'image'      => $imageName,
                'updated_by' => Auth::id(),
                'updated_at' => Carbon::now(),
            ]);

            return redirect()
                ->route('admin.manage-accreditations.index')
                ->with('message','Accreditation updated successfully.');

        } catch (\Exception $e) {

            return back()->with('error','Something went wrong.');
        }
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = ManageAccreditations::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-accreditations.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}