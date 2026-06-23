<?php

namespace App\Http\Controllers\Backend\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AwardsDetails;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;


class AwardsDetailsController extends Controller
{

    // ✅ Display list of records
    public function index()
    {
        $records = AwardsDetails::whereNull('deleted_at')->get();

        return view('backend.home.awards-details.index', compact('records'));
    }

    // ✅ Show create form
    public function create()
    {
        return view('backend.home.awards-details.create');
    }

    // ✅ Store new record
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'accreditation_heading' => 'required|string|max:255',
    //         'accreditation_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
    //         'award_heading' => 'required|string|max:255',
    //         'award_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
    //     ]);

    //     $uploadPath = public_path('home/awards');
    //     if (!file_exists($uploadPath)) {
    //         mkdir($uploadPath, 0777, true);
    //     }

    //     $accreditationImages = [];
    //     if ($request->hasFile('accreditation_images')) {
    //         foreach ($request->file('accreditation_images') as $image) {
    //             $name = time() . '_acc_' . uniqid() . '.' . $image->getClientOriginalExtension();
    //             $image->move($uploadPath, $name);
    //             $accreditationImages[] = $name;
    //         }
    //     }

    //     $awardImages = [];
    //     if ($request->hasFile('award_images')) {
    //         foreach ($request->file('award_images') as $image) {
    //             $name = time() . '_awd_' . uniqid() . '.' . $image->getClientOriginalExtension();
    //             $image->move($uploadPath, $name);
    //             $awardImages[] = $name;
    //         }
    //     }

    //     AwardsDetails::create([
    //         'accreditation_heading' => $request->accreditation_heading,
    //         'accreditation_images'  => $accreditationImages,
    //         'award_heading'      => $request->award_heading,
    //         'award_images'       => $awardImages,
    //         'created_by'        =>Auth::id(),
    //         'created_at'        => Carbon::now(),
    //     ]);

    //     return redirect()->route('admin.awards-details.index')->with('message', 'Awards & Accreditations added successfully.');
    // }
    
    
    public function store(Request $request)
    {
        $request->validate([
            'accreditation_heading'   => 'required|string|max:255',
            'rows'                    => 'nullable|array',
            'rows.*.image'            => 'image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'rows.*.desc'             => 'nullable|string|max:255',
            'rows.*.editor'           => 'nullable|string',
            'award_heading'           => 'required|string|max:255',
            'award_images.*'          => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
    
        $uploadPath = public_path('home/awards');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }
    
        // ---- Accreditation rows (image + desc + editor) ----
        $accreditations = [];
        foreach ($request->input('rows', []) as $i => $row) {
            $imageName = null;
    
            if ($request->hasFile("rows.$i.image")) {
                $image = $request->file("rows.$i.image");
                $imageName = time() . '_acc_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move($uploadPath, $imageName);
            }
    
            // skip completely empty rows
            if (!$imageName && empty($row['desc']) && empty($row['editor'])) {
                continue;
            }
    
            $accreditations[] = [
                'image'  => $imageName,
                'desc'   => $row['desc']   ?? null,
                'editor' => $row['editor'] ?? null,
            ];
        }
    
        // ---- Award images (unchanged) ----
        $awardImages = [];
        if ($request->hasFile('award_images')) {
            foreach ($request->file('award_images') as $image) {
                $name = time() . '_awd_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move($uploadPath, $name);
                $awardImages[] = $name;
            }
        }
    
        AwardsDetails::create([
            'accreditation_heading' => $request->accreditation_heading,
            'accreditation_images'  => $accreditations,   // now array of objects
            'award_heading'         => $request->award_heading,
            'award_images'          => $awardImages,
            'created_by'            => Auth::id(),
            'created_at'            => Carbon::now(),
        ]);
    
        return redirect()->route('admin.awards-details.index')
                         ->with('message', 'Awards & Accreditations added successfully.');
    }

    // ✅ Edit form
    public function edit($id)
    {
        $record = AwardsDetails::findOrFail($id);
        return view('backend.home.awards-details.edit', compact('record'));
    }

    // ✅ Update record
    // public function update(Request $request, $id)
    // {
    //     $record = AwardsDetails::findOrFail($id);

    //     $request->validate([
    //         'accreditation_heading' => 'required|string|max:255',
    //         'accreditation_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
    //         'award_heading' => 'required|string|max:255',
    //         'award_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
    //     ]);

    //     $uploadPath = public_path('home/awards');
    //     if (!file_exists($uploadPath)) mkdir($uploadPath, 0777, true);

    //     // Existing images (after removing any)
    //     $accreditationImages = $request->old_accreditation_images ?? [];
    //     $awardImages = $request->old_award_images ?? [];

    //     if (!is_array($accreditationImages)) $accreditationImages = [];
    //     if (!is_array($awardImages)) $awardImages = [];

    //     // Upload new images
    //     if ($request->hasFile('accreditation_images')) {
    //         foreach ($request->file('accreditation_images') as $image) {
    //             $name = time() . '_acc_' . uniqid() . '.' . $image->getClientOriginalExtension();
    //             $image->move($uploadPath, $name);
    //             $accreditationImages[] = $name;
    //         }
    //     }

    //     if ($request->hasFile('award_images')) {
    //         foreach ($request->file('award_images') as $image) {
    //             $name = time() . '_awd_' . uniqid() . '.' . $image->getClientOriginalExtension();
    //             $image->move($uploadPath, $name);
    //             $awardImages[] = $name;
    //         }
    //     }

    //     $record->update([
    //         'accreditation_heading' => $request->accreditation_heading,
    //         'accreditation_images'  => $accreditationImages,
    //         'award_heading'         => $request->award_heading,
    //         'award_images'          => $awardImages,
    //         'updated_by'            => Auth::id(),
    //         'updated_at'            => Carbon::now(),
    //     ]);

    //     return redirect()->route('admin.awards-details.index')->with('message', 'Awards & Accreditations updated successfully.');
    // }
    
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'accreditation_heading' => 'required|string|max:255',
            'rows'                  => 'nullable|array',
            'rows.*.image'          => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'rows.*.desc'           => 'nullable|string|max:255',
            'rows.*.editor'         => 'nullable|string',
            'award_heading'         => 'required|string|max:255',
            'award_images.*'        => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
    
        $record = AwardsDetails::findOrFail($id);
    
        $uploadPath = public_path('home/awards');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }
    
        // ---- Rebuild accreditation rows ----
        $accreditations = [];
        $keptImages = [];   // track which old images survive
    
        foreach ($request->input('rows', []) as $i => $row) {
            $imageName = $row['old_image'] ?? null;   // keep existing by default
    
            if ($request->hasFile("rows.$i.image")) {
                // new file replaces old → delete old file if present
                if ($imageName && file_exists($uploadPath . '/' . $imageName)) {
                    @unlink($uploadPath . '/' . $imageName);
                }
                $image = $request->file("rows.$i.image");
                $imageName = time() . '_acc_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move($uploadPath, $imageName);
            }
    
            // skip rows with nothing in them
            if (!$imageName && empty($row['desc']) && empty($row['editor'])) {
                continue;
            }
    
            if ($imageName) $keptImages[] = $imageName;
    
            $accreditations[] = [
                'image'  => $imageName,
                'desc'   => $row['desc']   ?? null,
                'editor' => $row['editor'] ?? null,
            ];
        }
    
        // delete any old accreditation image files that were removed entirely
        foreach (($record->accreditation_images ?? []) as $oldAcc) {
            $oldName = $oldAcc['image'] ?? null;
            if ($oldName && !in_array($oldName, $keptImages) && file_exists($uploadPath . '/' . $oldName)) {
                @unlink($uploadPath . '/' . $oldName);
            }
        }
    
        // ---- Award images: keep old (minus removed) + add new ----
        $awardImages = $request->input('old_award_images', []);
        if ($request->hasFile('award_images')) {
            foreach ($request->file('award_images') as $image) {
                $name = time() . '_awd_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move($uploadPath, $name);
                $awardImages[] = $name;
            }
        }
        // delete award files removed in the UI
        foreach (($record->award_images ?? []) as $oldImg) {
            if (!in_array($oldImg, $awardImages) && file_exists($uploadPath . '/' . $oldImg)) {
                @unlink($uploadPath . '/' . $oldImg);
            }
        }
    
        $record->update([
            'accreditation_heading' => $request->accreditation_heading,
            'accreditation_images'  => $accreditations,
            'award_heading'         => $request->award_heading,
            'award_images'          => $awardImages,
            'updated_by'            => Auth::id(),
            'updated_at'            => Carbon::now(),
        ]);
    
        return redirect()->route('admin.awards-details.index')
                         ->with('message', 'Awards & Accreditations updated successfully.');
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = AwardsDetails::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.awards-details.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}
