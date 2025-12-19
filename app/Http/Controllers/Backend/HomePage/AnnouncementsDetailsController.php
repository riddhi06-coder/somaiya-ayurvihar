<?php
namespace App\Http\Controllers\Backend\HomePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\AnnouncementsDetail;

class AnnouncementsDetailsController extends Controller
{
    public function index()
    {
        $records = AnnouncementsDetail::whereNull('deleted_at')->get();
        return view('backend.home.announcements-details.index', compact('records'));
    }

    public function create()
    {
        return view('backend.home.announcements-details.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'text.*' => 'nullable|string',
            'description.*' => 'nullable|string',
            'image.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $data = [
            'title' => $request->title,
            'heading' => $request->heading,
            'created_by' => auth()->id(),
        ];

        $data['text'] = implode(',', $request->text ?? []);
        $data['description'] = implode(',', $request->description ?? []);

        $images = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                if ($file && $file->isValid()) {
                    $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('home/announcements'), $filename);
                    $images[] = $filename;
                }
            }
        }

        $data['images'] = implode(',', $images);

        AnnouncementsDetail::create($data);

        return redirect()->route('admin.announcements-details.index')->with('message', 'Announcements Details added successfully!');
    }


   public function edit($id)
{
    $brandEthosDetails = AnnouncementsDetail::findOrFail($id);

    // Convert comma-separated values to arrays
    $texts = explode('|', $brandEthosDetails->text ?? '');
    $descriptions = explode('|', $brandEthosDetails->description ?? '');
    $images = explode('|', $brandEthosDetails->images ?? '');

    $counterItems = [];
    $count = max(count($texts), count($descriptions), count($images));

    for ($i = 0; $i < $count; $i++) {
        $counterItems[] = [
            'text' => $texts[$i] ?? '',
            'description' => $descriptions[$i] ?? '',
            'image' => $images[$i] ?? '',
        ];
    }

    return view('backend.home.announcements-details.edit', compact('brandEthosDetails', 'counterItems'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'heading' => 'required|string|max:255',
        'counter_text.*' => 'nullable|string',
        'counter_description.*' => 'nullable|string',
        'image.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $material = AnnouncementsDetail::findOrFail($id);

    $texts = $request->counter_text ?? [];
    $descriptions = $request->counter_description ?? [];
    $existingImages = $request->existing_images ?? [];
    $newImages = $request->file('image') ?? [];

    $finalImages = [];

    foreach ($texts as $index => $text) {
        if (isset($newImages[$index]) && $newImages[$index]->isValid()) {
            $file = $newImages[$index];
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('home/announcements'), $filename);
            $finalImages[] = $filename;
        } else {
            $finalImages[] = $existingImages[$index] ?? '';
        }
    }

    $material->update([
        'title' => $request->title,
        'heading' => $request->heading,
        'text' => implode('|', $texts),
        'description' => implode('|', $descriptions),
        'images' => implode('|', $finalImages),
        'updated_by' => auth()->id(),
    ]);

    return redirect()->route('admin.announcements-details.index')->with('message', 'Announcements Details updated successfully!');
}

public function destroy($id)
{
    $record = AnnouncementsDetail::findOrFail($id);

    $record->update([
        'deleted_by' => auth()->id(),
    ]);

    $record->delete(); // Must call this for soft delete

    return redirect()->route('admin.announcements-details.index')
        ->with('message', 'Announcements deleted successfully!');
}
}
