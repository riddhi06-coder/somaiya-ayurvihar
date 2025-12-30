<?php

namespace App\Http\Controllers\Backend\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompassionDetails;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;


class CompassionDetailsController extends Controller
{

    // ✅ Display list of records
    public function index()
    {
        $records = CompassionDetails::whereNull('deleted_at')
            // ->orderBy('id', 'desc')
            ->get();

        return view('backend.home.compassion-details.index', compact('records'));
    }

    // ✅ Show create form
    public function create()
    {
        return view('backend.home.compassion-details.create');
    }


    // ✅ Store new record
    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'nullable|string',
            'items.*.title' => 'required|string|max:255',
            'items.*.value' => 'required|string|max:255',
            'items.*.icon'  => 'nullable|file|mimes:jpg,jpeg,png,svg|max:2048'
        ]);

        $uploadPath = public_path('home/compassion');
        if(!file_exists($uploadPath)) mkdir($uploadPath, 0777, true);

        $items = [];
        if($request->has('items')) {
            foreach($request->items as $key => $item) {
                $iconName = null;
                if(isset($item['icon'])) {
                    $icon = $item['icon'];
                    if($icon) {
                        $iconName = time().'_icon_'.uniqid().'.'.$icon->getClientOriginalExtension();
                        $icon->move($uploadPath, $iconName);
                    }
                }
                $items[] = [
                    'title' => $item['title'],
                    'value' => $item['value'],
                    'icon'  => $iconName
                ];
            }
        }

        CompassionDetails::create([
            'heading' => $request->heading,
            'description' => $request->description,
            'items' => $items,
            'created_by' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.compassion-details.index')
                        ->with('message','Compassion Details added successfully.');
    }


    // ✅ Edit form
    public function edit($id)
    {
        $record = CompassionDetails::findOrFail($id);
        return view('backend.home.compassion-details.edit', compact('record'));
    }


    public function update(Request $request, $id)
    {
        $record = CompassionDetails::findOrFail($id);

        $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'nullable|string',
            'items.*.title' => 'required|string|max:255',
            'items.*.value' => 'required|string|max:255',
            'items.*.icon'  => 'nullable|file|mimes:jpg,jpeg,png,svg|max:2048'
        ]);

        $uploadPath = public_path('home/compassion');
        if(!file_exists($uploadPath)) mkdir($uploadPath, 0777, true);

        $items = [];
        if($request->has('items')) {
            foreach($request->items as $item) {
                // Use new uploaded icon or old icon
                $iconName = $item['old_icon'] ?? null;
                if(isset($item['icon'])) {
                    $icon = $item['icon'];
                    if($icon) {
                        $iconName = time().'_icon_'.uniqid().'.'.$icon->getClientOriginalExtension();
                        $icon->move($uploadPath, $iconName);
                    }
                }

                $items[] = [
                    'title' => $item['title'],
                    'value' => $item['value'],
                    'icon'  => $iconName
                ];
            }
        }

        $record->update([
            'heading' => $request->heading,
            'description' => $request->description,
            'items' => $items,
            'updated_by' => Auth::id(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.compassion-details.index')
                        ->with('message','Compassion Details updated successfully.');
    }


    // ✅ Soft delete
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = CompassionDetails::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.compassion-details.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }

    
}
