<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\BiomedicalWaste;
use Illuminate\Http\Request;
use Carbon\Carbon;


class BioMedicalWasteController extends Controller
{

    public function index()
    {
        $data = BiomedicalWaste::wherenull('deleted_by')->get();
        return view('backend.biomedical_waste.index', compact('data'));
    }
    
    public function create()
    {
        return view('backend.biomedical_waste.create');
    }
    
    public function store(Request $request)
    {
        try {
    
            // ✅ Validation
            $request->validate([
                'title'      => 'required|string|max:255',
                'doc_name'   => 'required|string|max:255',
                'document'   => 'required|file|mimes:pdf,doc,docx|max:5120', // 5MB
            ], [
                'title.required'      => 'Title is required.',
                'doc_name.required'   => 'Document Name is required.',
                'document.required'   => 'Please upload a document.',
                'document.mimes'      => 'Only PDF, DOC, and DOCX files are allowed.',
                'document.max'        => 'File size must be less than 5MB.',
            ]);
    
            // ✅ File Upload
            $fileName = null;
    
            if ($request->hasFile('document')) {
                $file = $request->file('document');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/biomedical'), $fileName);
            }
    
            // ✅ Save to DB
            BiomedicalWaste::create([
                'title'     => $request->title,
                'doc_name'  => $request->doc_name,
                'document'  => $fileName,
                'created_by' => auth()->id(),
                'created_at' => now(),
            ]);
    
            // ✅ Success Message
            return redirect()->route('admin.manage-biomedical-waste.index')->with('message', 'Document uploaded successfully.');
    
        } catch (\Exception $e) {
    
            \Log::error('❌ Biomedical Store Error: '.$e->getMessage());
    
            return back()
                ->withInput()
                ->with('message', 'Something went wrong. Please try again.');
        }
    }
    
    public function edit($id)
    {
        $biomedical_waste = BiomedicalWaste::findOrFail($id);
        return view('backend.biomedical_waste.edit', compact('biomedical_waste'));
    }
    
    public function update(Request $request, $id)
    {
        try {
            $data = BiomedicalWaste::findOrFail($id);
    
            // ✅ Validation
            $request->validate([
                'title'    => 'required|string|max:255',
                'doc_name' => 'required|string|max:255',
                'document' => 'nullable|file|mimes:pdf,doc,docx|max:5120', // optional
            ], [
                'title.required'    => 'Title is required.',
                'doc_name.required' => 'Document Name is required.',
                'document.mimes'    => 'Only PDF, DOC, and DOCX files are allowed.',
                'document.max'      => 'File size must be less than 5MB.',
            ]);
    
            // ✅ File Upload (if new file)
            if ($request->hasFile('document')) {
    
                // 🔥 Delete old file
                if (!empty($data->document) && file_exists(public_path('uploads/biomedical/' . $data->document))) {
                    unlink(public_path('uploads/biomedical/' . $data->document));
                }
    
                // Upload new file
                $file = $request->file('document');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/biomedical'), $fileName);
    
                $data->document = $fileName;
            }
    
            // ✅ Update Data
            $data->title = $request->title;
            $data->doc_name = $request->doc_name;
            $data->updated_by = auth()->id(); 
            $data->updated_at = now();
            $data->save();
    
            // ✅ Success
            return redirect()
                ->route('admin.manage-biomedical-waste.index')
                ->with('message', 'Document updated successfully.');
    
        } catch (\Exception $e) {
    
            \Log::error('❌ Biomedical Update Error: ' . $e->getMessage());
    
            return back()
                ->withInput()
                ->with('error', 'Something went wrong. Please try again.');
        }
    }
    
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = BiomedicalWaste::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-biomedical-waste.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
    
    
}