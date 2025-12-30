<?php

namespace App\Http\Controllers\Backend\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterDetail;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;


class FooterDetailsController extends Controller
{
    // ✅ Display list of records
    public function index()
    {
        $footers = FooterDetail::wherenull('deleted_by')->get(); 
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
        
        $data['social_links'] = json_encode($request->social_media);
        $data['created_at'] = Carbon::now();
        $data['created_by'] = Auth::id();

        FooterDetail::create($data);

        return redirect()->route('admin.footer-details.index')
                        ->with('message', 'Footer Details added successfully!');
    }


    // Edit form
    public function edit($id)
    {
        $footer = FooterDetail::findOrFail($id);
        $contact_details = $footer->social_links ? json_decode($footer->social_links, true) : [];
        return view('backend.home.footer-details.edit', compact('footer','contact_details'));
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
    
        $data['social_links'] = json_encode($request->social_media);
        $data['updated_at'] = Carbon::now();
        $data['updated_by'] = Auth::id();


        $footer->update($data);

        return redirect()->route('admin.footer-details.index')
                        ->with('message', 'Footer Details updated successfully!');
    }


    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = FooterDetail::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.footer-details.index')->with('message', 'Data deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }

}