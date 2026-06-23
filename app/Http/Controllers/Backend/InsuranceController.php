<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Insurance;
use Illuminate\Http\Request;
use Carbon\Carbon;



class InsuranceController extends Controller
{

    public function index()
    {
        $insurances = Insurance::wherenull('deleted_by')->get(); 
    
        return view('backend.insurance.index', compact('insurances'));
    }
    
    public function create()
    {
        return view('backend.insurance.create');
    }
    
    public function store(Request $request)
    {
        // ✅ VALIDATION
        $request->validate([
            // Insurance
            'insurance_heading' => 'required|string|max:255',
            'room_rent_desc' => 'required',
    
            // Essential
            'essential_heading' => 'required|string|max:255',
            'essential_desc' => 'required',
            'essential_image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
    
            // Cashless
            'cashless_heading' => 'required|string|max:255',
            'cash_desc' => 'required',
            'short_cash_desc' => 'required',
    
            // TPA
            'tpa_desc' => 'required',
    
            // Reimbursement
            'reimburse_desc' => 'required',
            'reimburse_image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
    
            // Disclaimer
            'disclaimer_desc' => 'required',
    
            // FAQ
            'faq_heading' => 'required|string|max:255',
            'faq_image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
    
            // Dynamic Tables
            'cashless_details' => 'required|array',
            'cashless_details.*.heading' => 'required',
            'cashless_details.*.time' => 'required',
    
            'faq' => 'required|array',
            'faq.*.question' => 'required',
            'faq.*.answer' => 'required',
        ], [
            // ✅ CUSTOM MESSAGES
    
            'insurance_heading.required' => 'Insurance heading is required.',
            'room_rent_desc.required' => 'Insurance description is required.',
    
            'essential_heading.required' => 'Essential heading is required.',
            'essential_desc.required' => 'Essential description is required.',
            'essential_image.required' => 'Essential image is required.',
            'essential_image.image' => 'Upload a valid image file.',
            'essential_image.max' => 'Image must be less than 2MB.',
    
            'cashless_heading.required' => 'Cashless heading is required.',
            'cash_desc.required' => 'Cashless description is required.',
            'short_cash_desc.required' => 'Short description is required.',
    
            'tpa_desc.required' => 'TPA description is required.',
    
            'reimburse_desc.required' => 'Reimbursement description is required.',
            'reimburse_image.required' => 'Reimbursement image is required.',
    
            'disclaimer_desc.required' => 'Disclaimer is required.',
    
            'faq_heading.required' => 'FAQ heading is required.',
            'faq_image.required' => 'FAQ image is required.',
    
            'cashless_details.required' => 'Cashless process details are required.',
            'cashless_details.*.heading.required' => 'Cashless step heading is required.',
            'cashless_details.*.time.required' => 'Cashless step description is required.',
    
            'faq.required' => 'FAQ section is required.',
            'faq.*.question.required' => 'FAQ question is required.',
            'faq.*.answer.required' => 'FAQ answer is required.',
        ]);
    
        // ✅ IMAGE UPLOADS
        $essentialImage = null;
        if ($request->hasFile('essential_image')) {
            $essentialImage = time().'_essential.'.$request->essential_image->extension();
            $request->essential_image->move(public_path('uploads/insurance'), $essentialImage);
        }
    
        $reimburseImage = null;
        if ($request->hasFile('reimburse_image')) {
            $reimburseImage = time().'_reimburse.'.$request->reimburse_image->extension();
            $request->reimburse_image->move(public_path('uploads/insurance'), $reimburseImage);
        }
    
        $faqImage = null;
        if ($request->hasFile('faq_image')) {
            $faqImage = time().'_faq.'.$request->faq_image->extension();
            $request->faq_image->move(public_path('uploads/insurance'), $faqImage);
        }
    
        // ✅ JSON ENCODE TABLE DATA
        $cashlessDetails = json_encode($request->cashless_details);
        $faqData = json_encode($request->faq);
    
        // ✅ STORE DATA
        Insurance::create([
            'insurance_heading' => $request->insurance_heading,
            'room_rent_desc' => $request->room_rent_desc,
    
            'essential_heading' => $request->essential_heading,
            'essential_desc' => $request->essential_desc,
            'essential_image' => $essentialImage,
    
            'cashless_heading' => $request->cashless_heading,
            'cash_desc' => $request->cash_desc,
            'short_cash_desc' => $request->short_cash_desc,
            'cashless_details' => $cashlessDetails,
    
            'tpa_desc' => $request->tpa_desc,
    
            'reimburse_desc' => $request->reimburse_desc,
            'reimburse_image' => $reimburseImage,
    
            'disclaimer_desc' => $request->disclaimer_desc,
    
            'faq_heading' => $request->faq_heading,
            'faq_image' => $faqImage,
            'faq' => $faqData,
            
             'created_by' => Auth::id(),
            'created_at' => now(),
        ]);
    
        return redirect()->route('admin.manage-insurance.index')->with('message', 'Insurance data added successfully.');
    }
    
    public function edit($id)
    {
        $insurance = Insurance::findOrFail($id);
        $cashlessDetails = json_decode($insurance->cashless_details, true);
        $faqs = json_decode($insurance->faq, true);
        
        return view('backend.insurance.edit',compact('insurance','cashlessDetails','faqs') );
    }
    
    public function update(Request $request, $id)
    {
    $insurance = Insurance::findOrFail($id);

    // ✅ VALIDATION
    $request->validate([
        // Insurance
        'insurance_heading' => 'required|string|max:255',
        'room_rent_desc' => 'required',

        // Essential
        'essential_heading' => 'required|string|max:255',
        'essential_desc' => 'required',
        'essential_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

        // Cashless
        'cashless_heading' => 'required|string|max:255',
        'cash_desc' => 'required',
        'short_cash_desc' => 'required',

        // TPA
        'tpa_desc' => 'required',

        // Reimbursement
        'reimburse_desc' => 'required',
        'reimburse_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

        // Disclaimer
        'disclaimer_desc' => 'required',

        // FAQ
        'faq_heading' => 'required|string|max:255',
        'faq_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

        // Dynamic Tables
        'cashless_details' => 'required|array',
        'cashless_details.*.heading' => 'required',
        'cashless_details.*.time' => 'required',

        'faq' => 'required|array',
        'faq.*.question' => 'required',
        'faq.*.answer' => 'required',
    ]);

    // ✅ IMAGE UPDATES

    // Essential Image
    if ($request->hasFile('essential_image')) {
        if ($insurance->essential_image && file_exists(public_path('uploads/insurance/'.$insurance->essential_image))) {
            unlink(public_path('uploads/insurance/'.$insurance->essential_image));
        }

        $essentialImage = time().'_essential.'.$request->essential_image->extension();
        $request->essential_image->move(public_path('uploads/insurance'), $essentialImage);
    } else {
        $essentialImage = $insurance->essential_image;
    }

    // Reimburse Image
    if ($request->hasFile('reimburse_image')) {
        if ($insurance->reimburse_image && file_exists(public_path('uploads/insurance/'.$insurance->reimburse_image))) {
            unlink(public_path('uploads/insurance/'.$insurance->reimburse_image));
        }

        $reimburseImage = time().'_reimburse.'.$request->reimburse_image->extension();
        $request->reimburse_image->move(public_path('uploads/insurance'), $reimburseImage);
    } else {
        $reimburseImage = $insurance->reimburse_image;
    }

    // FAQ Image
    if ($request->hasFile('faq_image')) {
        if ($insurance->faq_image && file_exists(public_path('uploads/insurance/'.$insurance->faq_image))) {
            unlink(public_path('uploads/insurance/'.$insurance->faq_image));
        }

        $faqImage = time().'_faq.'.$request->faq_image->extension();
        $request->faq_image->move(public_path('uploads/insurance'), $faqImage);
    } else {
        $faqImage = $insurance->faq_image;
    }

    // ✅ JSON DATA
    $cashlessDetails = json_encode($request->cashless_details);
    $faqJson           = json_encode($request->faq, JSON_UNESCAPED_UNICODE);

    // ✅ UPDATE DATA
    $insurance->update([
        'insurance_heading' => $request->insurance_heading,
        'room_rent_desc' => $request->room_rent_desc,

        'essential_heading' => $request->essential_heading,
        'essential_desc' => $request->essential_desc,
        'essential_image' => $essentialImage,

        'cashless_heading' => $request->cashless_heading,
        'cash_desc' => $request->cash_desc,
        'short_cash_desc' => $request->short_cash_desc,
        'cashless_details' => $cashlessDetails,

        'tpa_desc' => $request->tpa_desc,

        'reimburse_desc' => $request->reimburse_desc,
        'reimburse_image' => $reimburseImage,

        'disclaimer_desc' => $request->disclaimer_desc,

        'faq_heading' => $request->faq_heading,
        'faq_image' => $faqImage,
        'faq' => $faqJson,

        'updated_by' => Auth::id(),
        'updated_at' => now(),
    ]);

    return redirect()->route('admin.manage-insurance.index')
        ->with('message', 'Insurance data updated successfully.');
}

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = Insurance::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-insurance.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}