<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\InsuranceCompany;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InsuranceCompanyController extends Controller
{

    public function index()
    {
        $companies = InsuranceCompany::wherenull('deleted_by')->get();
        return view('backend.insurance.company_panel.index', compact('companies'));
    }

    public function create()
    {
        return view('backend.insurance.company_panel.create');
    }
    
    public function store(Request $request)
    {
        // ✅ Validation
        $request->validate([
            'insurance_type'   => 'required|string|max:255',
            'company_name'     => 'required|array|min:1',
            'company_name.*'   => 'required|string|max:255',
            'company_logo'     => 'required|array|min:1',
            'company_logo.*'   => 'required|file|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ], [
            'insurance_type.required' => 'Insurance type is required.',
            'company_name.*.required' => 'Company name is required.',
            'company_logo.*.required' => 'Company logo is required.',
        ]);
    
        try {
    
            $companies = [];
    
            foreach ($request->company_name as $key => $name) {
    
                $logoName = null;
    
                // ✅ Upload Logo
                if ($request->hasFile('company_logo') && isset($request->company_logo[$key])) {
                    $file = $request->company_logo[$key];
                    $logoName = uniqid().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads/company'), $logoName);
                }
    
                // ✅ Prepare Array
                $companies[] = [
                    'company_name' => $name,
                    'company_logo' => $logoName,
                ];
            }
    
            // ✅ Store JSON
            InsuranceCompany::create([
                'insurance_type' => $request->insurance_type,
                'company_data'   => json_encode($companies),
                'created_by'       => Auth::id(),
                'created_at'       => Carbon::now(),
            ]);
    
            return redirect()->route('admin.manage-company-panel.index')->with('message', 'Data stored successfully.');
    
        } catch (\Exception $e) {
    
            return redirect()->back()
                ->withInput()
                ->with('message', $e->getMessage()); // 👈 this shows real error

        }
    }
    
    public function edit($id)
    {
        $insurance = InsuranceCompany::findOrFail($id);
        $companies = json_decode($insurance->company_data, true);

        return view('backend.insurance.company_panel.edit', compact('insurance','companies'));
    }
    
    public function update(Request $request, $id)
    {
        // ✅ Validation (logo optional in update)
        $request->validate([
            'insurance_type'   => 'required|string|max:255',
            'company_name'     => 'required|array|min:1',
            'company_name.*'   => 'required|string|max:255',
            'company_logo.*'   => 'nullable|file|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ], [
            'insurance_type.required' => 'Insurance type is required.',
            'company_name.*.required' => 'Company name is required.',
            'company_logo.*.mimes'    => 'Only jpg, jpeg, png, webp, svg allowed.',
            'company_logo.*.max'      => 'Max file size is 2MB.',
        ]);
    
        try {
    
            $insurance = InsuranceCompany::findOrFail($id);
    
            $companies = [];
    
            foreach ($request->company_name as $key => $name) {
    
                // ✅ Keep old logo by default
                $logoName = $request->old_logo[$key] ?? null;
    
                // ✅ If new file uploaded → replace
                if (isset($request->company_logo[$key]) && $request->company_logo[$key]->isValid()) {
    
                    $file = $request->company_logo[$key];
                    $logoName = uniqid().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads/company'), $logoName);
    
                    // 🔥 Optional: delete old image
                    if (!empty($request->old_logo[$key]) && file_exists(public_path('uploads/company/'.$request->old_logo[$key]))) {
                        unlink(public_path('uploads/company/'.$request->old_logo[$key]));
                    }
                }
    
                $companies[] = [
                    'company_name' => $name,
                    'company_logo' => $logoName,
                ];
            }
    
            // ✅ Update Record
            $insurance->update([
                'insurance_type' => $request->insurance_type,
                'company_data'   => json_encode($companies),
                'updated_by'     => Auth::id(),
                'updated_at'     => Carbon::now(),
            ]);
    
            return redirect()->route('admin.manage-company-panel.index')
                ->with('message', 'Data updated successfully.');
    
        } catch (\Exception $e) {
    
            return redirect()->back()
                ->withInput()
                ->with('message', $e->getMessage()); // 👈 real error
        }
    }
    
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = InsuranceCompany::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-company-panel.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }

}