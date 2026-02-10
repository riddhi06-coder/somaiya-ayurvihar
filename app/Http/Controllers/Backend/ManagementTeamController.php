<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\ManageManagementTeam;


class ManagementTeamController extends Controller
{

    public function index()
    {
        $teams = ManageManagementTeam::whereNull('deleted_by')->orderBy('id','asc')->get();
        return view('backend.about.team.index', compact('teams'));
    }

    public function create()
    {
        return view('backend.about.team.create');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name'        => 'required|string|max:255',
            'designation'=> 'required|string|max:255',
            'description'=> 'required',
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ],[
            'name.required'         => 'Please enter Name.',
            'designation.required' => 'Please enter Designation.',
            'description.required' => 'Please enter Description.',
            'image.required'       => 'Please upload Image.',
            'image.image'          => 'Uploaded file must be an image.',
            'image.mimes'          => 'Allowed formats: jpg, jpeg, png, webp, svg.',
            'image.max'            => 'Image size must be less than 2MB.',
        ]);

        try {

            $uploadPath = public_path('uploads/management_team');

            // Create folder if not exists
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $imageName = null;

            // YOUR IMAGE UPLOAD METHOD
            if ($request->hasFile('image')) {
                $img = $request->file('image');
                $imageName = time() . '_' . rand(1000, 9999) . '_prayer.' . $img->getClientOriginalExtension();
                $img->move($uploadPath, $imageName);
            }

            // Save Data
            ManageManagementTeam::create([
                'name'        => $request->name,
                'designation' => $request->designation,
                'description' => $request->description,
                'image'       => $imageName,
                'created_by'  => Auth::id(),
                'created_at'  => Carbon::now(),
            ]);

            return redirect()->route('admin.manage-management-team.index')->with('message','Management Team Member added successfully.');

        } catch (\Exception $e) {
            return back()->with('error','Something went wrong.');
        }
    }

    public function edit($id)
    {
        $team = ManageManagementTeam::findOrFail($id);
        return view('backend.about.team.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'name'        => 'required|string|max:255',
            'designation'=> 'required|string|max:255',
            'description'=> 'required',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ],[
            'name.required'         => 'Please enter Name.',
            'designation.required' => 'Please enter Designation.',
            'description.required' => 'Please enter Description.',
            'image.image'          => 'Uploaded file must be an image.',
            'image.mimes'          => 'Allowed formats: jpg, jpeg, png, webp, svg.',
            'image.max'            => 'Image size must be less than 2MB.',
        ]);

        try {

            $team = ManageManagementTeam::findOrFail($id);

            $uploadPath = public_path('uploads/management_team');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $imageName = $team->image;

            // SAME IMAGE UPLOAD METHOD
            if ($request->hasFile('image')) {

                // Delete old image
                if ($team->image && file_exists($uploadPath.'/'.$team->image)) {
                    unlink($uploadPath.'/'.$team->image);
                }

                $img = $request->file('image');
                $imageName = time() . '_' . rand(1000, 9999) . '_prayer.' . $img->getClientOriginalExtension();
                $img->move($uploadPath, $imageName);
            }

            // Update Data
            $team->update([
                'name'        => $request->name,
                'designation' => $request->designation,
                'description' => $request->description,
                'image'       => $imageName,
                'updated_by'  => Auth::id(),
                'updated_at'  => Carbon::now(),
            ]);

            return redirect()
                ->route('admin.manage-management-team.index')
                ->with('message','Management Team Member updated successfully.');

        } catch (\Exception $e) {

            return back()->with('error','Something went wrong.');
        }
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = ManageManagementTeam::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-management-team.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }



}