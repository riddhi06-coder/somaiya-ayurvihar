<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\BillingProcess;
use Illuminate\Http\Request;
use Carbon\Carbon;



class BillingProcessController extends Controller
{

    public function index()
    {
        $billing = BillingProcess::whereNull('deleted_by')->get();
        return view('backend.billing.index', compact('billing'));
    }
    
    public function create()
    {
        return view('backend.billing.create');
    }
    
    public function store(Request $request)
    {
        // ✅ VALIDATION
        $request->validate([
            // Visitors
            'visitor_heading' => 'required|string',
    
            'visitor_details' => 'required|array',
            'visitor_details.*.image' => 'required|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'visitor_details.*.heading' => 'required|string',
            'visitor_details.*.time' => 'required|string',
    
            // Room Types
            'room_heading' => 'required|string',
            'room_types' => 'required|array',
            'room_types.*.image' => 'required|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'room_types.*.heading' => 'required|string',
    
            // Room Rent
            'room_rent_heading' => 'required|string',
            'room_rent_desc' => 'required|string',
    
            // General Info
            'general_info_heading' => 'required|string',
            'general_info_desc' => 'required|string',
    
            // Document Timelines
            'doc_sub_heading' => 'required|string',
            'document_timelines' => 'required|array',
            'document_timelines.*.image' => 'required|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'document_timelines.*.heading' => 'required|string',
            'document_timelines.*.time' => 'required|string',
    
            // Documents Submitted
            'doc_submitted_heading' => 'required|string',
            'doc_image' => 'required|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'doc_submitted_desc' => 'required|string',
    
            // Details
            'sd_desc' => 'required|string',
            'declaration_desc' => 'required|string',
    
        ], [
            '*.required' => 'This field is required.',
            '*.mimes' => 'Only JPG, JPEG, PNG, WEBP, SVG formats are allowed.',
            '*.max' => 'File size must be less than 2MB.',
        ]);
    
        // ============================
        // ✅ VISITOR DETAILS (JSON)
        // ============================
        $visitorData = [];
        foreach ($request->visitor_details as $key => $item) {
            $imageName = null;
    
            if (isset($item['image'])) {
                $image = $item['image'];
                $imageName = time().'_visitor_'.$key.'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads/visitors'), $imageName);
            }
    
            $visitorData[] = [
                'image' => $imageName,
                'heading' => $item['heading'],
                'time' => $item['time'],
            ];
        }
    
        // ============================
        // ✅ ROOM TYPES (JSON)
        // ============================
        $roomData = [];
        foreach ($request->room_types as $key => $item) {
            $imageName = null;
    
            if (isset($item['image'])) {
                $image = $item['image'];
                $imageName = time().'_room_'.$key.'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads/rooms'), $imageName);
            }
    
            $roomData[] = [
                'image' => $imageName,
                'heading' => $item['heading'],
            ];
        }
    
        // ============================
        // ✅ DOCUMENT TIMELINES (JSON)
        // ============================
        $docTimelineData = [];
        foreach ($request->document_timelines as $key => $item) {
            $imageName = null;
    
            if (isset($item['image'])) {
                $image = $item['image'];
                $imageName = time().'_doc_'.$key.'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads/document_timelines'), $imageName);
            }
    
            $docTimelineData[] = [
                'image' => $imageName,
                'heading' => $item['heading'],
                'time' => $item['time'],
            ];
        }
    
        // ============================
        // ✅ SINGLE IMAGE UPLOAD
        // ============================
        $docImageName = null;
        if ($request->hasFile('doc_image')) {
            $image = $request->file('doc_image');
            $docImageName = time().'_docmain.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/documents'), $docImageName);
        }
    
        // ============================
        // ✅ INSERT DATA
        // ============================
        BillingProcess::create([
            'visitor_heading' => $request->visitor_heading,
            'visitor_details' => json_encode($visitorData),
    
            'room_heading' => $request->room_heading,
            'room_types' => json_encode($roomData),
    
            'room_rent_heading' => $request->room_rent_heading,
            'room_rent_desc' => $request->room_rent_desc,
    
            'general_info_heading' => $request->general_info_heading,
            'general_info_desc' => $request->general_info_desc,
    
            'doc_sub_heading' => $request->doc_sub_heading,
            'document_timelines' => json_encode($docTimelineData),
    
            'doc_submitted_heading' => $request->doc_submitted_heading,
            'doc_image' => $docImageName,
            'doc_submitted_desc' => $request->doc_submitted_desc,
    
            'sd_desc' => $request->sd_desc,
            'declaration_desc' => $request->declaration_desc,
    
            'created_by' => Auth::id(),
            'created_at' => now(),
        ]);
    
        // ============================
        // ✅ REDIRECT
        // ============================
        return redirect()->route('admin.manage-billing-process.index')
            ->with('message', 'Billing process added successfully.');
    }
    
    public function edit($id)
    {
        $billing = BillingProcess::findOrFail($id);
        return view('backend.billing.edit',compact('billing') );
    }

    public function update(Request $request, $id)
    {
        $billing = BillingProcess::findOrFail($id);
    
        // ============================
        // ✅ VALIDATION
        // ============================
        $request->validate([
            'visitor_heading' => 'required|string',
    
            'visitor_details' => 'required|array',
            'visitor_details.*.image' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'visitor_details.*.heading' => 'required|string',
            'visitor_details.*.time' => 'required|string',
    
            'room_heading' => 'required|string',
            'room_types' => 'required|array',
            'room_types.*.image' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'room_types.*.heading' => 'required|string',
    
            'room_rent_heading' => 'required|string',
            'room_rent_desc' => 'required|string',
    
            'general_info_heading' => 'required|string',
            'general_info_desc' => 'required|string',
    
            'doc_sub_heading' => 'required|string',
            'document_timelines' => 'required|array',
            'document_timelines.*.image' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'document_timelines.*.heading' => 'required|string',
            'document_timelines.*.time' => 'required|string',
    
            'doc_submitted_heading' => 'required|string',
            'doc_image' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'doc_submitted_desc' => 'required|string',
    
            'sd_desc' => 'required|string',
            'declaration_desc' => 'required|string',
    
        ], [
            '*.required' => 'This field is required.',
            '*.mimes' => 'Only JPG, JPEG, PNG, WEBP, SVG formats are allowed.',
            '*.max' => 'File size must be less than 2MB.',
        ]);
    
        // Decode old JSON
        $oldVisitors = json_decode($billing->visitor_details, true) ?? [];
        $oldRooms = json_decode($billing->room_types, true) ?? [];
        $oldDocs = json_decode($billing->document_timelines, true) ?? [];
    
        // ============================
        // ✅ VISITOR DETAILS
        // ============================
        $oldVisitors = array_values(json_decode($billing->visitor_details, true) ?? []);

        $visitorData = [];
        
        foreach ($request->visitor_details as $key => $item) {
        
            $imageName = $oldVisitors[$key]['image'] ?? null;
        
            if (!empty($item['image']) && $item['image'] instanceof \Illuminate\Http\UploadedFile) {
                $image = $item['image'];
                $imageName = time().'_visitor_'.$key.'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads/visitors'), $imageName);
            }
        
            $visitorData[] = [
                'image' => $imageName,
                'heading' => $item['heading'] ?? '',
                'time' => $item['time'] ?? '',
            ];
        }
    
        // ============================
        // ✅ ROOM TYPES
        // ============================
        // ============================
        // ✅ ROOM TYPES (FIXED)
        // ============================
        $oldRooms = array_values(json_decode($billing->room_types, true) ?? []);
        
        $roomData = [];
        
        foreach ($request->room_types as $key => $item) {
        
            // Get old image safely
            $imageName = $item['old_image'] 
                ?? ($oldRooms[$key]['image'] ?? null);
        
            // If new image uploaded
            if (!empty($item['image']) && $item['image'] instanceof \Illuminate\Http\UploadedFile) {
                $image = $item['image'];
                $imageName = time().'_room_'.$key.'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads/rooms'), $imageName);
            }
        
            // Skip empty rows (important)
            if (
                empty($item['heading']) &&
                !$imageName
            ) {
                continue;
            }
        
            $roomData[] = [
                'image' => $imageName,
                'heading' => $item['heading'] ?? '',
            ];
        }
    
        // ============================
        // ✅ DOCUMENT TIMELINES
        // ============================
       // ============================
        // ✅ DOCUMENT TIMELINES (FIXED)
        // ============================
        $oldDocs = array_values(json_decode($billing->document_timelines, true) ?? []);
        
        $docTimelineData = [];
        
        foreach ($request->document_timelines as $key => $item) {
        
            // Get old image safely
            $imageName = $item['old_image'] 
                ?? ($oldDocs[$key]['image'] ?? null);
        
            // If new image uploaded
            if (!empty($item['image']) && $item['image'] instanceof \Illuminate\Http\UploadedFile) {
                $image = $item['image'];
                $imageName = time().'_doc_'.$key.'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads/document_timelines'), $imageName);
            }
        
            // Skip empty rows
            if (
                empty($item['heading']) &&
                empty($item['time']) &&
                !$imageName
            ) {
                continue;
            }
        
            $docTimelineData[] = [
                'image' => $imageName,
                'heading' => $item['heading'] ?? '',
                'time' => $item['time'] ?? '',
            ];
        }
        // ============================
        // ✅ SINGLE IMAGE
        // ============================
        $docImageName = $billing->doc_image;
    
        if ($request->hasFile('doc_image')) {
            $image = $request->file('doc_image');
            $docImageName = time().'_docmain.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/documents'), $docImageName);
        }
    
        // ============================
        // ✅ UPDATE
        // ============================
        $billing->update([
            'visitor_heading' => $request->visitor_heading,
            'visitor_details' => json_encode($visitorData),
    
            'room_heading' => $request->room_heading,
            'room_types' => json_encode($roomData),
    
            'room_rent_heading' => $request->room_rent_heading,
            'room_rent_desc' => $request->room_rent_desc,
    
            'general_info_heading' => $request->general_info_heading,
            'general_info_desc' => $request->general_info_desc,
    
            'doc_sub_heading' => $request->doc_sub_heading,
            'document_timelines' => json_encode($docTimelineData),
    
            'doc_submitted_heading' => $request->doc_submitted_heading,
            'doc_image' => $docImageName,
            'doc_submitted_desc' => $request->doc_submitted_desc,
    
            'sd_desc' => $request->sd_desc,
            'declaration_desc' => $request->declaration_desc,
    
            'modified_by' => Auth::id(),
            'modified_at' => now(),
        ]);
    
        return redirect()->route('admin.manage-billing-process.index')
            ->with('message', 'Billing process updated successfully.');
    }
    
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = BillingProcess::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-billing-process.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}