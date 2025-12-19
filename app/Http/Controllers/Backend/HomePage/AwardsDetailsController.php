<?php

namespace App\Http\Controllers\Backend\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AwardsDetails;
use Illuminate\Support\Facades\Auth;

class AwardsDetailsController extends Controller
{
    // ✅ Display list of records
    public function index()
    {
        $records = AwardsDetails::whereNull('deleted_at')
            ->orderBy('id', 'desc')
            ->get();

        return view('backend.home.awards-details.index', compact('records'));
    }

    // ✅ Show create form
    public function create()
    {
        return view('backend.home.awards-details.create');
    }

    // ✅ Store new record
    public function store(Request $request)
    {
        $request->validate([
            'accreditation_heading' => 'required|string|max:255',
            'accreditation_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            'award_heading' => 'required|string|max:255',
            'award_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $uploadPath = public_path('home/awards');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $accreditationImages = [];
        if ($request->hasFile('accreditation_images')) {
            foreach ($request->file('accreditation_images') as $image) {
                $name = time() . '_acc_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move($uploadPath, $name);
                $accreditationImages[] = $name;
            }
        }

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
            'accreditation_images'  => $accreditationImages,
            'award_heading'         => $request->award_heading,
            'award_images'          => $awardImages,
            'created_by'            => auth()->id(),
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
    public function update(Request $request, $id)
    {
        $record = AwardsDetails::findOrFail($id);

        $request->validate([
            'accreditation_heading' => 'required|string|max:255',
            'accreditation_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            'award_heading' => 'required|string|max:255',
            'award_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $uploadPath = public_path('home/awards');
        if (!file_exists($uploadPath)) mkdir($uploadPath, 0777, true);

        // Existing images (after removing any)
        $accreditationImages = $request->old_accreditation_images ?? [];
        $awardImages = $request->old_award_images ?? [];

        if (!is_array($accreditationImages)) $accreditationImages = [];
        if (!is_array($awardImages)) $awardImages = [];

        // Upload new images
        if ($request->hasFile('accreditation_images')) {
            foreach ($request->file('accreditation_images') as $image) {
                $name = time() . '_acc_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move($uploadPath, $name);
                $accreditationImages[] = $name;
            }
        }

        if ($request->hasFile('award_images')) {
            foreach ($request->file('award_images') as $image) {
                $name = time() . '_awd_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move($uploadPath, $name);
                $awardImages[] = $name;
            }
        }

        $record->update([
            'accreditation_heading' => $request->accreditation_heading,
            'accreditation_images'  => $accreditationImages,
            'award_heading'         => $request->award_heading,
            'award_images'          => $awardImages,
            'updated_by'            => auth()->id(),
        ]);

        return redirect()->route('admin.awards-details.index')
                         ->with('message', 'Awards & Accreditations updated successfully.');
    }

    // ✅ Soft delete
    public function destroy($id)
    {
        $record = AwardsDetails::findOrFail($id);
        $record->update(['deleted_by' => auth()->id()]);
        $record->delete();

        return redirect()->route('admin.awards-details.index')
                         ->with('message', 'Record deleted successfully.');
    }
}
