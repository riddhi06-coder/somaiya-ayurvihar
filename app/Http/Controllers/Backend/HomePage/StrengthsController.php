<?php

namespace App\Http\Controllers\Backend\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeStrength;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;


class StrengthsController extends Controller
{

    // ✅ Display list of records
    public function index()
    {
        $records = HomeStrength::whereNull('deleted_at')->get();

        return view('backend.home.strengths-details.index', compact('records'));
    }

    // ✅ Show create form
    public function create()
    {
        return view('backend.home.strengths-details.create');
    }


    // ✅ Store new record
    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'items.*.title' => 'required|string|max:255',
            'items.*.description' => 'nullable|string',
        ]);

        $uploadPath = public_path('home/strengths');
        if(!file_exists($uploadPath)) mkdir($uploadPath, 0777, true);

        // Section image
        $imageName = null;
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_strength_'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move($uploadPath, $imageName);
        }

        $items = [];
        if($request->has('items')) {
            foreach($request->items as $item) {
                if(empty($item['title'])) continue;
                $items[] = [
                    'title' => $item['title'],
                    'description' => $item['description'] ?? null,
                ];
            }
        }

        HomeStrength::create([
            'heading' => $request->heading,
            'image' => $imageName,
            'items' => $items,
            'created_by' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.strengths-details.index')
                        ->with('message','Strengths added successfully.');
    }


    // ✅ Edit form
    public function edit($id)
    {
        $record = HomeStrength::findOrFail($id);
        return view('backend.home.strengths-details.edit', compact('record'));
    }


    public function update(Request $request, $id)
    {
        $record = HomeStrength::findOrFail($id);

        $request->validate([
            'heading' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'items.*.title' => 'required|string|max:255',
            'items.*.description' => 'nullable|string',
        ]);

        $uploadPath = public_path('home/strengths');
        if(!file_exists($uploadPath)) mkdir($uploadPath, 0777, true);

        // Section image: keep old unless a new one is uploaded
        $imageName = $record->image;
        if($request->hasFile('image')) {
            if($imageName && file_exists($uploadPath.'/'.$imageName)) {
                @unlink($uploadPath.'/'.$imageName);
            }
            $image = $request->file('image');
            $imageName = time().'_strength_'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move($uploadPath, $imageName);
        }

        $items = [];
        if($request->has('items')) {
            foreach($request->items as $item) {
                if(empty($item['title'])) continue;
                $items[] = [
                    'title' => $item['title'],
                    'description' => $item['description'] ?? null,
                ];
            }
        }

        $record->update([
            'heading' => $request->heading,
            'image' => $imageName,
            'items' => $items,
            'updated_by' => Auth::id(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.strengths-details.index')
                        ->with('message','Strengths updated successfully.');
    }


    // ✅ Soft delete
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $record = HomeStrength::findOrFail($id);
            $record->update($data);

            return redirect()->route('admin.strengths-details.index')->with('message', 'Details deleted successfully!');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }


}
