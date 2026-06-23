<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Governmentschemes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Exception;

class GovernmentschemesController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Index
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $government_schemes = Governmentschemes::whereNull('deleted_at')
            ->orderBy('id', 'desc')
            ->get();

        return view('backend.government_schemes.index', compact('government_schemes'));
    }

    /*
    |--------------------------------------------------------------------------
    | Create
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('backend.government_schemes.create');
    }

    /*
    |--------------------------------------------------------------------------
    | Validation rules (shared by store & update)
    |--------------------------------------------------------------------------
    */
    private function rules(bool $isUpdate = false): array
    {
        $imageRule = ($isUpdate ? 'nullable' : 'required') . '|mimes:jpg,jpeg,png,webp,svg|max:2048';

        return [
            // Intro
            'intro_desc'                 => 'required',
            'cghs_beneficiaries'         => 'required',
            'assistance_cghs'            => 'required',

            // Eligibility Criteria (description + multiple titles as textarea)
            'eligibility_desc'           => 'required',
            'eligibility_titles'         => 'required|array|min:1',
            'eligibility_titles.*'       => 'required|string',

            // Research Centre
            'research_desc'              => 'required',

            // Medical Social Worker / Aarogyamitra Support
            'social_worker_desc'         => 'required',
            'social_worker_image'        => $imageRule,

            // MJPJAY Process (heading + repeater)
            'short_heading'              => 'required|string|max:255',
            'mjpjay'                     => 'required|array|min:1',
            'mjpjay.*.title'             => 'required|string|max:255',
            'mjpjay.*.description'       => 'required',

            // Contact Information
            'contact_heading'            => 'required|string|max:255',
            'contact_title'              => 'required|string|max:255',
            'contact_desc'               => 'required',

            // FAQ
            'faq_heading'                => 'required|string|max:255',
            'faq_image'                  => $imageRule,
            'faq'                        => 'required|array|min:1',
            'faq.*.question'             => 'required',
            'faq.*.answer'               => 'required',
        ];
    }

    private function messages(): array
    {
        return [
            'intro_desc.required'            => 'Description is required.',
            'cghs_beneficiaries.required'    => 'CGHS Benenificiary Details is required.',
            'assistance_cghs.required'       => 'Description is required.',

            'eligibility_desc.required'      => 'Eligibility description is required.',
            'eligibility_titles.required'    => 'At least one eligibility title is required.',
            'eligibility_titles.*.required'  => 'Eligibility title is required.',

            'research_desc.required'         => 'Research centre description is required.',

            'social_worker_desc.required'    => 'Medical social worker description is required.',
            'social_worker_image.required'   => 'Medical social worker image is required.',
            'social_worker_image.mimes'      => 'Only jpg, jpeg, png, webp and svg files are allowed.',
            'social_worker_image.max'        => 'Image size should be less than 2MB.',

            'short_heading.required'         => 'Heading is required.',
            'mjpjay.required'                => 'At least one MJPJAY step is required.',
            'mjpjay.*.title.required'        => 'MJPJAY step title is required.',
            'mjpjay.*.description.required'  => 'MJPJAY step description is required.',

            'contact_heading.required'       => 'Contact heading is required.',
            'contact_title.required'         => 'Contact title is required.',
            'contact_desc.required'          => 'Contact description is required.',

            'faq_heading.required'           => 'FAQ heading is required.',
            'faq_image.required'             => 'FAQ image is required.',
            'faq_image.mimes'                => 'Only jpg, jpeg, png, webp and svg files are allowed.',
            'faq_image.max'                  => 'Image size should be less than 2MB.',
            'faq.required'                   => 'At least one FAQ is required.',
            'faq.*.question.required'        => 'FAQ question is required.',
            'faq.*.answer.required'          => 'FAQ answer is required.',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Image upload helper
    |--------------------------------------------------------------------------
    */
    private function uploadImage(Request $request, string $field, string $prefix): ?string
    {
        if (!$request->hasFile($field)) {
            return null;
        }

        $fileName = time() . '_' . $prefix . '.' . $request->file($field)->extension();

        $request->file($field)->move(
            public_path('uploads/government_schemes'),
            $fileName
        );

        return $fileName;
    }

    /*
    |--------------------------------------------------------------------------
    | Store
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate($this->rules(), $this->messages());

        try {
            Governmentschemes::create([
                'intro_desc'           => $request->intro_desc,
                
                'cghs_beneficiaries'    => $request->cghs_beneficiaries,
                'assistance_cghs'       => $request->assistance_cghs,

                'eligibility_desc'     => $request->eligibility_desc,
                'eligibility_titles'   => json_encode(array_values($request->eligibility_titles)),

                'research_desc'        => $request->research_desc,

                'social_worker_desc'   => $request->social_worker_desc,
                'social_worker_image'  => $this->uploadImage($request, 'social_worker_image', 'social_worker'),

                'short_heading'        => $request->short_heading,
                'mjpjay_steps'         => json_encode(array_values($request->mjpjay)),

                'contact_heading'      => $request->contact_heading,
                'contact_title'        => $request->contact_title,
                'contact_desc'         => $request->contact_desc,

                'faq_heading'          => $request->faq_heading,
                'faq_image'            => $this->uploadImage($request, 'faq_image', 'faq'),
                'faq'                  => json_encode(array_values($request->faq)),

                'created_by'           => Auth::id(),
                'created_at'           => Carbon::now(),
            ]);

            return redirect()
                ->route('admin.manage-government-schemes.index')
                ->with('message', 'Government scheme added successfully.');
        } catch (Exception $ex) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Edit
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $government_scheme = Governmentschemes::whereNull('deleted_at')->findOrFail($id);

        $eligibilityTitles = json_decode($government_scheme->eligibility_titles, true) ?? [];
        $mjpjaySteps       = json_decode($government_scheme->mjpjay_steps, true) ?? [];
        $faqData           = json_decode($government_scheme->faq, true) ?? [];

        return view('backend.government_schemes.edit', compact(
            'government_scheme',
            'eligibilityTitles',
            'mjpjaySteps',
            'faqData'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        $government_scheme = Governmentschemes::whereNull('deleted_at')->findOrFail($id);

        $request->validate($this->rules(true), $this->messages());

        try {
            $socialWorkerImage = $this->uploadImage($request, 'social_worker_image', 'social_worker')
                ?? $government_scheme->social_worker_image;

            $faqImage = $this->uploadImage($request, 'faq_image', 'faq')
                ?? $government_scheme->faq_image;

            $government_scheme->update([
                'intro_desc'           => $request->intro_desc,
                
                'cghs_beneficiaries'    => $request->cghs_beneficiaries,
                'assistance_cghs'       => $request->assistance_cghs,
                

                'eligibility_desc'     => $request->eligibility_desc,
                'eligibility_titles'   => json_encode(array_values($request->eligibility_titles)),

                'research_desc'        => $request->research_desc,

                'social_worker_desc'   => $request->social_worker_desc,
                'social_worker_image'  => $socialWorkerImage,

                'short_heading'        => $request->short_heading,
                'mjpjay_steps'         => json_encode(array_values($request->mjpjay)),

                'contact_heading'      => $request->contact_heading,
                'contact_title'        => $request->contact_title,
                'contact_desc'         => $request->contact_desc,

                'faq_heading'          => $request->faq_heading,
                'faq_image'            => $faqImage,
                'faq'                  => json_encode(array_values($request->faq)),

                'modified_by'          => Auth::id(),
                'modified_at'          => Carbon::now(),
            ]);

            return redirect()
                ->route('admin.manage-government-schemes.index')
                ->with('message', 'Government scheme updated successfully.');
        } catch (Exception $ex) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Destroy (soft delete via audit columns)
    |--------------------------------------------------------------------------
    */
    public function destroy(string $id)
    {
        try {
            $government_scheme = Governmentschemes::findOrFail($id);

            $government_scheme->update([
                'deleted_by' => Auth::id(),
                'deleted_at' => Carbon::now(),
            ]);

            return redirect()
                ->route('admin.manage-government-schemes.index')
                ->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}