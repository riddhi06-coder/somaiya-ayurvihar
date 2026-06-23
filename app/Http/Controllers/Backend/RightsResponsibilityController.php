<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\RightsResponsibility;
use Illuminate\Http\Request;
use Carbon\Carbon;


class RightsResponsibilityController extends Controller
{

    public function index()
    {
        $rights = RightsResponsibility::wherenull('deleted_by')->get(); 
        return view('backend.patient_services.rights.index', compact('rights'));
    }

    public function create()
    {
        return view('backend.patient_services.rights.create');
    }
    
    public function store(Request $request)
    {
        // ✅ Validation
        $request->validate([
            'introduction' => 'required',
            'patient_desc' => 'required',
            'patient_rights_desc' => 'required',
            'faq_heading' => 'required|string|max:255',
            'faq_image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
    
            // FAQ validation
            'faq' => 'required|array|min:1',
            'faq.*.question' => 'required|string',
            'faq.*.answer' => 'required|string',
    
        ], [
            // Custom Messages
            'introduction.required' => 'Introduction is required.',
            'patient_desc.required' => 'Patient description is required.',
            'patient_rights_desc.required' => 'Patient rights are required.',
            'faq_heading.required' => 'FAQ heading is required.',
            'faq_image.required' => 'FAQ image is required.',
            'faq_image.image' => 'File must be an image.',
            'faq_image.mimes' => 'Only jpg, jpeg, png, webp, svg allowed.',
            'faq_image.max' => 'Image must be less than 2MB.',
            
            'faq.required' => 'At least one FAQ is required.',
            'faq.*.question.required' => 'FAQ question is required.',
            'faq.*.answer.required' => 'FAQ answer is required.',
        ]);
    
        try {
            // ✅ Upload FAQ Image
            $faqImageName = null;
            if ($request->hasFile('faq_image')) {
                $faqImageName = time().'_'.$request->file('faq_image')->getClientOriginalName();
                $request->file('faq_image')->move(public_path('uploads/faq'), $faqImageName);
            }
    
            // ✅ Prepare FAQ JSON
            $faqData = [];
    
            if (!empty($request->faq)) {
                foreach ($request->faq as $faq) {
                    $faqData[] = [
                        'question' => $faq['question'] ?? '',
                        'answer' => $faq['answer'] ?? '',
                    ];
                }
            }
    
            // ✅ Store Data
            RightsResponsibility::create([
                'introduction' => $request->introduction,
                'patient_desc' => $request->patient_desc,
                'patient_rights_desc' => $request->patient_rights_desc,
                'faq_heading' => $request->faq_heading,
                'faq_image' => $faqImageName,
                'faq' => json_encode($faqData),
                'created_by' => Auth::id(),
                'created_at' => Carbon::now(),
                
            ]);
    
            return redirect()->route('admin.manage-rights-responsibility.index')->with('message', 'Data added successfully.');
            
        } catch (\Exception $e) {
    
            \Log::error('Error storing Rights Responsibility: ' . $e->getMessage());
    
            return redirect()->back()
                ->with('error', 'Something went wrong.')
                ->withInput();
        }
    }
    
    public function edit($id)
    {
        $patient_services = RightsResponsibility::findOrFail($id);
        $patient_services->faq = json_decode($patient_services->faq, true);

        return view('backend.patient_services.rights.edit',compact('patient_services'));
    }
    
    public function update(Request $request, $id)
    {
        $rights = RightsResponsibility::findOrFail($id);
    
        // ✅ Validation
        $request->validate([
            'introduction' => 'required',
            'patient_desc' => 'required',
            'patient_rights_desc' => 'required',
            'faq_heading' => 'required|string|max:255',
    
            // ❗ image optional in update
            'faq_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
    
            // FAQ validation
            'faq' => 'required|array|min:1',
            'faq.*.question' => 'required|string',
            'faq.*.answer' => 'required|string',
    
        ], [
            'introduction.required' => 'Introduction is required.',
            'patient_desc.required' => 'Patient description is required.',
            'patient_rights_desc.required' => 'Patient rights are required.',
            'faq_heading.required' => 'FAQ heading is required.',
    
            'faq_image.image' => 'File must be an image.',
            'faq_image.mimes' => 'Only jpg, jpeg, png, webp, svg allowed.',
            'faq_image.max' => 'Image must be less than 2MB.',
    
            'faq.required' => 'At least one FAQ is required.',
            'faq.*.question.required' => 'FAQ question is required.',
            'faq.*.answer.required' => 'FAQ answer is required.',
        ]);
    
        try {
    
            // ✅ Image Update
            if ($request->hasFile('faq_image')) {
    
                // delete old image
                if (!empty($rights->faq_image) && file_exists(public_path('uploads/faq/' . $rights->faq_image))) {
                    unlink(public_path('uploads/faq/' . $rights->faq_image));
                }
    
                $faqImageName = time().'_'.$request->file('faq_image')->getClientOriginalName();
                $request->file('faq_image')->move(public_path('uploads/faq'), $faqImageName);
    
                $rights->faq_image = $faqImageName;
            }
    
            // ✅ Prepare FAQ JSON
            $faqData = [];
    
            if (!empty($request->faq)) {
                foreach ($request->faq as $faq) {
                    $faqData[] = [
                        'question' => $faq['question'] ?? '',
                        'answer' => $faq['answer'] ?? '',
                    ];
                }
            }
            
            
             $faqJson = json_encode($request->faq, JSON_UNESCAPED_UNICODE);
    
            // ✅ Update Data
            $rights->update([
                'introduction' => $request->introduction,
                'patient_desc' => $request->patient_desc,
                'patient_rights_desc' => $request->patient_rights_desc,
                'faq_heading' => $request->faq_heading,
                'faq' => $faqJson,
                'updated_by' => Auth::id(),
                'updated_at' => Carbon::now(),
            ]);
    
            return redirect()
                ->route('admin.manage-rights-responsibility.index')
                ->with('message', 'Data updated successfully.');
    
        } catch (\Exception $e) {
    
            \Log::error('Error updating Rights Responsibility: ' . $e->getMessage());
    
            return redirect()->back()
                ->with('error', 'Something went wrong.')
                ->withInput();
        }
    }
    
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = RightsResponsibility::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-rights-responsibility.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}