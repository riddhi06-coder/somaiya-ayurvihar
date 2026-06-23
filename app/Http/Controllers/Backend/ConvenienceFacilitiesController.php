<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\ConvenienceFacility;
use Illuminate\Http\Request;
use Carbon\Carbon;



class ConvenienceFacilitiesController extends Controller
{

    public function index()
    {
        $convenience = ConvenienceFacility::wherenull('deleted_by')->get(); 
        return view('backend.convenience_facility.index', compact('convenience'));
    }
    
    public function create()
    {
        return view('backend.convenience_facility.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            // Intro
            'cafeteria_intro_desc' => 'required',
    
            // Cafeteria
            'cafeteria_heading' => 'required|string|max:255',
            'cafeteria_desc' => 'required',
    
            'icon' => 'required|array',
            'icon.*' => 'required|mimes:jpg,jpeg,png,webp,svg|max:2048',
    
            'title' => 'required|array',
            'title.*' => 'required|string|max:255',
    
            'details' => 'required|array',
            'details.*' => 'required',
    
            // ATM
            'atm_heading' => 'required|string|max:255',
            'atm_desc' => 'required',
            'short_atm_desc' => 'required',
    
            'atm_details' => 'required|array',
            'atm_details.*.icon' => 'required|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'atm_details.*.title' => 'required',
            'atm_details.*.details' => 'required',
    
            // Pharmacy
            'pharmacy_heading' => 'required|string|max:255',
            'pharmacy_desc' => 'required',
    
            'pharmacy_details' => 'required|array',
            'pharmacy_details.*.icon' => 'required|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'pharmacy_details.*.title' => 'required',
            'pharmacy_details.*.details' => 'required',
    
            // Internet
            'internet_heading' => 'required|string|max:255',
            'internet_desc' => 'required',
    
            // FAQ
            'faq_heading' => 'required|string|max:255',
            'faq_image' => 'required|mimes:jpg,jpeg,png,webp,svg|max:2048',
    
            'faq' => 'required|array',
            'faq.*.question' => 'required',
            'faq.*.answer' => 'required',
        ], [
    
            'cafeteria_intro_desc.required' => 'Description is required.',
    
            'cafeteria_heading.required' => 'Cafeteria heading is required.',
            'cafeteria_desc.required' => 'Cafeteria description is required.',
    
            'icon.required' => 'At least one cafeteria icon is required.',
            'icon.*.required' => 'Cafeteria icon is required.',
            'icon.*.mimes' => 'Only jpg, jpeg, png, webp and svg files are allowed.',
            'icon.*.max' => 'File size should be less than 2MB.',
    
            'title.*.required' => 'Cafeteria title is required.',
            'details.*.required' => 'Cafeteria details are required.',
    
            'atm_heading.required' => 'ATM heading is required.',
            'atm_desc.required' => 'ATM description is required.',
            'short_atm_desc.required' => 'Short ATM description is required.',
    
            'atm_details.*.icon.required' => 'ATM icon is required.',
            'atm_details.*.title.required' => 'ATM title is required.',
            'atm_details.*.details.required' => 'ATM details are required.',
    
            'pharmacy_heading.required' => 'Pharmacy heading is required.',
            'pharmacy_desc.required' => 'Pharmacy description is required.',
    
            'pharmacy_details.*.icon.required' => 'Pharmacy icon is required.',
            'pharmacy_details.*.title.required' => 'Pharmacy title is required.',
            'pharmacy_details.*.details.required' => 'Pharmacy details are required.',
    
            'internet_heading.required' => 'Internet heading is required.',
            'internet_desc.required' => 'Internet description is required.',
    
            'faq_heading.required' => 'FAQ heading is required.',
            'faq_image.required' => 'FAQ image is required.',
    
            'faq.*.question.required' => 'FAQ question is required.',
            'faq.*.answer.required' => 'FAQ answer is required.',
        ]);
    
        /*
        |--------------------------------------------------------------------------
        | FAQ Image Upload
        |--------------------------------------------------------------------------
        */
        $faqImage = null;
    
        if ($request->hasFile('faq_image')) {
    
            $faqImage = time().'_faq.'.$request->faq_image->extension();
    
            $request->faq_image->move(
                public_path('uploads/convenience_facilities'),
                $faqImage
            );
        }
    
        /*
        |--------------------------------------------------------------------------
        | Cafeteria Details
        |--------------------------------------------------------------------------
        */
        $cafeteriaDetails = [];
    
        if ($request->hasFile('icon')) {
    
            foreach ($request->icon as $key => $file) {
    
                $fileName = time().'_cafeteria_'.$key.'.'.$file->extension();
    
                $file->move(
                    public_path('uploads/convenience_facilities'),
                    $fileName
                );
    
                $cafeteriaDetails[] = [
                    'icon' => $fileName,
                    'title' => $request->title[$key] ?? '',
                    'details' => $request->details[$key] ?? '',
                ];
            }
        }
    
        /*
        |--------------------------------------------------------------------------
        | ATM Details
        |--------------------------------------------------------------------------
        */
        $atmDetails = [];
    
        if ($request->has('atm_details')) {
    
            foreach ($request->atm_details as $key => $row) {
    
                $icon = '';
    
                if (isset($row['icon'])) {
    
                    $file = $row['icon'];
    
                    $fileName = time().'_atm_'.$key.'.'.$file->extension();
    
                    $file->move(
                        public_path('uploads/convenience_facilities'),
                        $fileName
                    );
    
                    $icon = $fileName;
                }
    
                $atmDetails[] = [
                    'icon' => $icon,
                    'title' => $row['title'],
                    'details' => $row['details'],
                ];
            }
        }
    
        /*
        |--------------------------------------------------------------------------
        | Pharmacy Details
        |--------------------------------------------------------------------------
        */
        $pharmacyDetails = [];
    
        if ($request->has('pharmacy_details')) {
    
            foreach ($request->pharmacy_details as $key => $row) {
    
                $icon = '';
    
                if (isset($row['icon'])) {
    
                    $file = $row['icon'];
    
                    $fileName = time().'_pharmacy_'.$key.'.'.$file->extension();
    
                    $file->move(
                        public_path('uploads/convenience_facilities'),
                        $fileName
                    );
    
                    $icon = $fileName;
                }
    
                $pharmacyDetails[] = [
                    'icon' => $icon,
                    'title' => $row['title'],
                    'details' => $row['details'],
                ];
            }
        }
    
        /*
        |--------------------------------------------------------------------------
        | FAQ Data
        |--------------------------------------------------------------------------
        */
        $faqData = json_encode($request->faq);
    
        /*
        |--------------------------------------------------------------------------
        | Store
        |--------------------------------------------------------------------------
        */
        ConvenienceFacility::create([
    
            'cafeteria_intro_desc' => $request->cafeteria_intro_desc,
    
            'cafeteria_heading' => $request->cafeteria_heading,
            'cafeteria_desc' => $request->cafeteria_desc,
            'cafeteria_details' => json_encode($cafeteriaDetails),
    
            'atm_heading' => $request->atm_heading,
            'atm_desc' => $request->atm_desc,
            'short_atm_desc' => $request->short_atm_desc,
            'atm_details' => json_encode($atmDetails),
    
            'pharmacy_heading' => $request->pharmacy_heading,
            'pharmacy_desc' => $request->pharmacy_desc,
            'pharmacy_details' => json_encode($pharmacyDetails),
    
            'internet_heading' => $request->internet_heading,
            'internet_desc' => $request->internet_desc,
    
            'faq_heading' => $request->faq_heading,
            'faq_image' => $faqImage,
            'faq' => $faqData,
    
            'created_by' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);
    
        return redirect()->route('admin.manage-convenience-facilities.index')->with('message', 'Convenience facilities added successfully.');
    }
    
    public function edit($id)
    {
        $convenience_facility = ConvenienceFacility::findOrFail($id);
    
        $cafeteriaDetails = json_decode($convenience_facility->cafeteria_details, true) ?? [];
        $atmDetails = json_decode($convenience_facility->atm_details, true) ?? [];
        $pharmacyDetails = json_decode($convenience_facility->pharmacy_details, true) ?? [];
        $faqData = json_decode($convenience_facility->faq, true) ?? [];
    
        return view('backend.convenience_facility.edit', compact(
            'convenience_facility',
            'cafeteriaDetails',
            'atmDetails',
            'pharmacyDetails',
            'faqData'
        ));
    }
    
    public function update(Request $request, $id)
    {
        //  dd($request->all());
        $convenienceFacility = ConvenienceFacility::findOrFail($id);
    
        $request->validate([
            'cafeteria_intro_desc' => 'required',
    
            'cafeteria_heading' => 'required|string|max:255',
            'cafeteria_desc' => 'required',
    
            'title' => 'required|array',
            'title.*' => 'required|string|max:255',
    
            'details' => 'required|array',
            'details.*' => 'required',
    
            'atm_heading' => 'required|string|max:255',
            'atm_desc' => 'required',
            'short_atm_desc' => 'required',
    
            'atm_details' => 'required|array',
            'atm_details.*.title' => 'required',
            'atm_details.*.details' => 'required',
    
            'pharmacy_heading' => 'required|string|max:255',
            'pharmacy_desc' => 'required',
    
            'pharmacy_details' => 'required|array',
            'pharmacy_details.*.title' => 'required',
            'pharmacy_details.*.details' => 'required',
    
            'internet_heading' => 'required|string|max:255',
            'internet_desc' => 'required',
    
            'faq_heading' => 'required|string|max:255',
    
            'faq' => 'required|array',
            'faq.*.question' => 'required',
            'faq.*.answer' => 'required',
        ]);
    
        /*
        |--------------------------------------------------------------------------
        | FAQ Image Upload
        |--------------------------------------------------------------------------
        */
        $faqImage = $convenienceFacility->faq_image;
    
        if ($request->hasFile('faq_image')) {
    
            $faqImage = time().'_faq.'.$request->faq_image->extension();
    
            $request->faq_image->move(
                public_path('uploads/convenience_facilities'),
                $faqImage
            );
        }
    
        /*
        |--------------------------------------------------------------------------
        | Cafeteria Details
        |--------------------------------------------------------------------------
        */
        $cafeteriaDetails = [];

        foreach ($request->title as $key => $title) {
        
            $icon = $request->existing_icon[$key] ?? '';
        
            if ($request->hasFile("icon.$key")) {
        
                $file = $request->file("icon.$key");
        
                $fileName = time().'_cafeteria_'.$key.'.'.$file->extension();
        
                $file->move(
                    public_path('uploads/convenience_facilities'),
                    $fileName
                );
        
                $icon = $fileName;
            }
        
            $cafeteriaDetails[] = [
                'icon' => $icon,
                'title' => $title,
                'details' => $request->details[$key] ?? '',
            ];
        }
    
        /*
        |--------------------------------------------------------------------------
        | ATM Details
        |--------------------------------------------------------------------------
        */
        $atmDetails = [];
    
        foreach ($request->atm_details as $key => $row) {
    
            $icon = $row['existing_icon'] ?? '';
    
            if (isset($row['icon']) && $row['icon'] instanceof \Illuminate\Http\UploadedFile) {
    
                $file = $row['icon'];
    
                $fileName = time().'_atm_'.$key.'.'.$file->extension();
    
                $file->move(
                    public_path('uploads/convenience_facilities'),
                    $fileName
                );
    
                $icon = $fileName;
            }
    
            $atmDetails[] = [
                'icon' => $icon,
                'title' => $row['title'],
                'details' => $row['details'],
            ];
        }
    
        /*
        |--------------------------------------------------------------------------
        | Pharmacy Details
        |--------------------------------------------------------------------------
        */
        $pharmacyDetails = [];
    
        foreach ($request->pharmacy_details as $key => $row) {
    
            $icon = $row['existing_icon'] ?? '';
    
            if (isset($row['icon']) && $row['icon'] instanceof \Illuminate\Http\UploadedFile) {
    
                $file = $row['icon'];
    
                $fileName = time().'_pharmacy_'.$key.'.'.$file->extension();
    
                $file->move(
                    public_path('uploads/convenience_facilities'),
                    $fileName
                );
    
                $icon = $fileName;
            }
    
            $pharmacyDetails[] = [
                'icon' => $icon,
                'title' => $row['title'],
                'details' => $row['details'],
            ];
        }
    
        /*
        |--------------------------------------------------------------------------
        | FAQ JSON
        |--------------------------------------------------------------------------
        */
        $faqData = json_encode($request->faq);
    
        /*
        |--------------------------------------------------------------------------
        | Update Record
        |--------------------------------------------------------------------------
        */
        $convenienceFacility->update([
    
            'cafeteria_intro_desc' => $request->cafeteria_intro_desc,
    
            'cafeteria_heading' => $request->cafeteria_heading,
            'cafeteria_desc' => $request->cafeteria_desc,
            'cafeteria_details' => json_encode($cafeteriaDetails),
    
            'atm_heading' => $request->atm_heading,
            'atm_desc' => $request->atm_desc,
            'short_atm_desc' => $request->short_atm_desc,
            'atm_details' => json_encode($atmDetails),
    
            'pharmacy_heading' => $request->pharmacy_heading,
            'pharmacy_desc' => $request->pharmacy_desc,
            'pharmacy_details' => json_encode($pharmacyDetails),
    
            'internet_heading' => $request->internet_heading,
            'internet_desc' => $request->internet_desc,
    
            'faq_heading' => $request->faq_heading,
            'faq_image' => $faqImage,
            'faq' => $faqData,
    
            'modified_by' => Auth::id(),
            'modified_at' => Carbon::now(),
        ]);
    
        return redirect()
            ->route('admin.manage-convenience-facilities.index')
            ->with('message', 'Convenience facilities updated successfully.');
    }
    
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = ConvenienceFacility::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-convenience-facilities.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}