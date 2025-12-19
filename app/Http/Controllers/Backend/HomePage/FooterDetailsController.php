<?php

namespace App\Http\Controllers\Backend\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterDetail;
use Illuminate\Support\Facades\Auth;

class FooterDetailsController extends Controller
{
    // ✅ Display list of records
    public function index()
{
    $footers = FooterDetail::all(); // Get all footer records
    return view('backend.home.footer-details.index', compact('footers'));
}
    public function create()
    {
        return view('backend.home.footer-details.create');
    }

public function store(Request $request)
{
    $data = $request->all();

    // Handle logo upload
    if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        $filename = time() . '.' . $file->getClientOriginalExtension();

        // Set the upload path in public/home/footer
        $uploadPath = public_path('home/footer');

        // Create folder if not exists
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        // Move the uploaded file
        $file->move($uploadPath, $filename);

        // Save only filename in DB
        $data['logo'] = $filename;
    }

    // Handle dynamic social icons
    $socialLinks = [];
    if ($request->filled('social_icon')) {
        foreach ($request->social_icon as $icon) {
            if (!empty($icon['icon']) && !empty($icon['url'])) {
                $socialLinks[] = [
                    'icon' => $icon['icon'],
                    'url'  => $icon['url'],
                ];
            }
        }
    }
    $data['social_links'] = $socialLinks;

    FooterDetail::create($data);

    return redirect()->route('admin.footer-details.index')
                     ->with('message', 'Footer Details added successfully!');
}


// Edit form
      public function edit($id)
    {
        $footer = FooterDetail::findOrFail($id);
        return view('backend.home.footer-details.edit', compact('footer'));
    }

   public function update(Request $request, $id)
{
    $footer = FooterDetail::findOrFail($id);
    $data = $request->all();

    // Handle logo upload
    if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        $filename = time() . '.' . $file->getClientOriginalExtension();

        $uploadPath = public_path('home/footer');

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        $file->move($uploadPath, $filename);

        $data['logo'] = $filename;
    }

    // Handle dynamic social icons
    $socialLinks = [];
    if ($request->filled('social_icon')) {
        foreach ($request->social_icon as $icon) {
            if (!empty($icon['icon']) && !empty($icon['url'])) {
                $socialLinks[] = [
                    'icon' => $icon['icon'],
                    'url'  => $icon['url'],
                ];
            }
        }
    }
    $data['social_links'] = $socialLinks;

    $footer->update($data);

    return redirect()->route('admin.footer-details.index')
                     ->with('message', 'Footer Details updated successfully!');
}


// ✅ Soft delete
    public function destroy($id)
    {
        $record = FooterDetail::findOrFail($id);
        $record->update(['deleted_by' => auth()->id()]);
        $record->delete();

        return redirect()->route('admin.footer-details.index')
                         ->with('message', 'Record deleted successfully.');
    }

}