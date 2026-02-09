<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\ManageAssociation;


class AssociationController extends Controller
{

    public function index()
    {
        $associations = ManageAssociation::wherenull('deleted_by')->get();
        return view('backend.about.association.index', compact('associations'));
    }

    public function create()
    {
        return view('backend.about.association.create');
    }

    public function store(Request $request)
    {
        // ================= VALIDATION =================

        $request->validate([

            'asso_name'     => 'required|string|max:255',
            'assoc_contact'=> 'required|string|max:50',
            'assoc_url'  => 'required|max:255',
            'assoc_desc'   => 'required',

        ], [

            'asso_name.required'      => 'Association name is required.',
            'assoc_contact.required' => 'Association contact is required.',
            'assoc_url.required'   => 'Association email is required.',
            'assoc_url.email'      => 'Please enter a valid email address.',
            'assoc_desc.required'    => 'Association description is required.',

        ]);

        // ================= SAVE DATA =================

        ManageAssociation::create([

            'asso_name'      => $request->asso_name,
            'assoc_contact' => $request->assoc_contact,
            'assoc_url'   => $request->assoc_url,
            'assoc_desc'    => $request->assoc_desc,

            'created_by'    => Auth::id(),
            'created_at'    => Carbon::now(),

        ]);

        // ================= REDIRECT =================

        return redirect()
            ->route('admin.manage-associations.index')
            ->with('message', 'Association added successfully.');
    }

    public function edit($id)
    {
        $association = ManageAssociation::findOrFail($id);
        return view('backend.about.association.edit', compact('association'));
    }

    public function update(Request $request, $id)
    {
        // ================= VALIDATION =================

        $request->validate([

            'asso_name'      => 'required|string|max:255',
            'assoc_contact' => 'required|string|max:50',
            'assoc_url'     => 'required|max:255',
            'assoc_desc'    => 'required',

        ], [

            'asso_name.required'      => 'Association name is required.',
            'assoc_contact.required' => 'Association contact is required.',
            'assoc_url.required'     => 'Association URL is required.',
            'assoc_desc.required'    => 'Association description is required.',

        ]);

        // ================= FIND RECORD =================

        $association = ManageAssociation::findOrFail($id);

        // ================= UPDATE DATA =================

        $association->update([

            'asso_name'      => $request->asso_name,
            'assoc_contact' => $request->assoc_contact,
            'assoc_url'     => $request->assoc_url,
            'assoc_desc'    => $request->assoc_desc,

            'updated_by'    => Auth::id(),
            'updated_at'    => Carbon::now(),

        ]);

        // ================= REDIRECT =================

        return redirect()
            ->route('admin.manage-associations.index')
            ->with('message', 'Association updated successfully.');
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = ManageAssociation::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-associations.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}