<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\InpatientService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Exception;

class InpatientServiceController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Index
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $inpatient_services = InpatientService::whereNull('deleted_at')
            ->orderBy('id', 'desc')
            ->get();

        return view('backend.inpatient_service.index', compact('inpatient_services'));
    }

    /*
    |--------------------------------------------------------------------------
    | Create
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('backend.inpatient_service.create');
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
            // Intro (image + description)
            'intro_image'               => $imageRule,
            'intro_desc'                => 'required',

            // Admission Process
            'admission_heading'         => 'required|string|max:255',
            'admission_desc'            => 'required',

            // Documents Required for Admission
            'documents_heading'         => 'required|string|max:255',
            'documents_image'           => $imageRule,
            'documents_desc'            => 'required',

            // Discharge Process
            'discharge_heading'         => 'required|string|max:255',
            'discharge_image'           => $imageRule,
            'discharge_desc'            => 'required',

            // Rooms & Tariff (heading + single title + repeater)
            'room_tariff_heading'       => 'required|string|max:255',
            'room_tariff_title'         => 'required|string|max:255',
            'room_tariff'               => 'nullable|array|min:1',
            'room_tariff.*.title'       => 'required|string|max:255',
            'room_tariff.*.description' => 'required',

            // ICU
            'icu_heading'               => 'required|string|max:255',
            'icu_desc'                  => 'required',

            // Tariff Notes
            'tariff_notes_heading'      => 'required|string|max:255',
            'tariff_notes_desc'         => 'required',

            // Super-Specialty Hospital (repeater)
            'super_specialty_heading'       => 'required|string|max:255',
            'super_specialty'               => 'required|array|min:1',
            'super_specialty.*.title'       => 'required|string|max:255',
            'super_specialty.*.description' => 'required',

            // Day Care Facility
            'day_care_heading'          => 'required|string|max:255',
            'day_care_desc'             => 'required',

            // FAQ
            'faq_heading'               => 'required|string|max:255',
            'faq_image'                 => $imageRule,
            'faq'                       => 'required|array|min:1',
            'faq.*.question'            => 'required',
            'faq.*.answer'              => 'required',
        ];
    }

    private function messages(): array
    {
        return [
            'intro_image.required'               => 'Intro image is required.',
            'intro_image.mimes'                  => 'Only jpg, jpeg, png, webp and svg files are allowed.',
            'intro_image.max'                    => 'Image size should be less than 2MB.',
            'intro_desc.required'                => 'Intro description is required.',

            'admission_heading.required'         => 'Admission process heading is required.',
            'admission_desc.required'            => 'Admission process description is required.',

            'documents_heading.required'         => 'Documents heading is required.',
            'documents_image.required'           => 'Documents image is required.',
            'documents_image.mimes'              => 'Only jpg, jpeg, png, webp and svg files are allowed.',
            'documents_image.max'                => 'Image size should be less than 2MB.',
            'documents_desc.required'            => 'Documents description is required.',

            'discharge_heading.required'         => 'Discharge process heading is required.',
            'discharge_image.required'           => 'Discharge image is required.',
            'discharge_image.mimes'              => 'Only jpg, jpeg, png, webp and svg files are allowed.',
            'discharge_image.max'                => 'Image size should be less than 2MB.',
            'discharge_desc.required'            => 'Discharge description is required.',

            'room_tariff_heading.required'       => 'Rooms & tariff heading is required.',
            'room_tariff_title.required'         => 'Rooms & tariff title is required.',
            'room_tariff.required'               => 'At least one rooms & tariff entry is required.',
            'room_tariff.*.title.required'       => 'Rooms & tariff row title is required.',
            'room_tariff.*.description.required' => 'Rooms & tariff row description is required.',

            'icu_heading.required'               => 'ICU heading is required.',
            'icu_desc.required'                  => 'ICU description is required.',

            'tariff_notes_heading.required'      => 'Tariff notes heading is required.',
            'tariff_notes_desc.required'         => 'Tariff notes description is required.',

            'super_specialty_heading.required'       => 'Super-specialty heading is required.',
            'super_specialty.required'               => 'At least one super-specialty entry is required.',
            'super_specialty.*.title.required'       => 'Super-specialty title is required.',
            'super_specialty.*.description.required' => 'Super-specialty description is required.',

            'day_care_heading.required'          => 'Day care heading is required.',
            'day_care_desc.required'             => 'Day care description is required.',

            'faq_heading.required'               => 'FAQ heading is required.',
            'faq_image.required'                 => 'FAQ image is required.',
            'faq_image.mimes'                    => 'Only jpg, jpeg, png, webp and svg files are allowed.',
            'faq_image.max'                      => 'Image size should be less than 2MB.',
            'faq.required'                       => 'At least one FAQ is required.',
            'faq.*.question.required'            => 'FAQ question is required.',
            'faq.*.answer.required'              => 'FAQ answer is required.',
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
            public_path('uploads/inpatient_service'),
            $fileName
        );

        return $fileName;
    }



    private function processSuperSpecialty(Request $request): array
    {
        $rows   = $request->input('super_specialty', []);
        $result = [];
    
        foreach ($rows as $index => $row) {
            $images = [];
    
            $files = $request->file("super_specialty.{$index}.images");
            if ($files) {
                foreach ($files as $file) {
                    if ($file && $file->isValid()) {
                        $fileName = time() . '_' . uniqid() . '.' . $file->extension();
                        $file->move(public_path('uploads/super_specialty'), $fileName);
                        $images[] = 'uploads/super_specialty/' . $fileName;
                    }
                }
            }
    
            $result[] = [
                'title'       => $row['title'] ?? null,
                'description' => $row['description'] ?? null,
                'images'      => $images,
            ];
        }
    
        return array_values($result);
    }
    


    private function processSuperSpecialtyUpdate(Request $request): array
    {
        $rows   = $request->input('super_specialty', []);
        $result = [];
    
        foreach ($rows as $index => $row) {
            // images the user kept (hidden inputs)
            $images = $request->input("super_specialty.{$index}.existing_images", []);
            $images = is_array($images) ? array_values($images) : [];
    
            // newly uploaded files for this row
            $files = $request->file("super_specialty.{$index}.images");
            if ($files) {
                foreach ($files as $file) {
                    if ($file && $file->isValid()) {
                        $fileName = time() . '_' . uniqid() . '.' . $file->extension();
                        $file->move(public_path('uploads/super_specialty'), $fileName);
                        // store relative path so it's easy to display + delete
                        $images[] = 'uploads/super_specialty/' . $fileName;
                    }
                }
            }
    
            $result[] = [
                'title'       => $row['title'] ?? null,
                'description' => $row['description'] ?? null,
                'images'      => array_values($images),
            ];
        }
    
        return array_values($result);
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
            InpatientService::create([
                'intro_image'              => $this->uploadImage($request, 'intro_image', 'intro'),
                'intro_desc'               => $request->intro_desc,

                'admission_heading'        => $request->admission_heading,
                'admission_desc'           => $request->admission_desc,

                'documents_heading'        => $request->documents_heading,
                'documents_image'          => $this->uploadImage($request, 'documents_image', 'documents'),
                'documents_desc'           => $request->documents_desc,

                'discharge_heading'        => $request->discharge_heading,
                'discharge_image'          => $this->uploadImage($request, 'discharge_image', 'discharge'),
                'discharge_desc'           => $request->discharge_desc,

                'room_tariff_heading'      => $request->room_tariff_heading,
                'room_tariff_title'        => $request->room_tariff_title,
                'room_tariff_details'      => json_encode(array_values($request->input('room_tariff', []))),

                'icu_heading'              => $request->icu_heading,
                'icu_desc'                 => $request->icu_desc,

                'tariff_notes_heading'     => $request->tariff_notes_heading,
                'tariff_notes_desc'        => $request->tariff_notes_desc,

                'super_specialty_heading'  => $request->super_specialty_heading,
                'super_specialty_details'  => json_encode($this->processSuperSpecialty($request)),

                'day_care_heading'         => $request->day_care_heading,
                'day_care_desc'            => $request->day_care_desc,

                'faq_heading'              => $request->faq_heading,
                'faq_image'                => $this->uploadImage($request, 'faq_image', 'faq'),
                'faq'                      => json_encode(array_values($request->input('faq', []))),

                'created_by'               => Auth::id(),
                'created_at'               => Carbon::now(),
            ]);

            return redirect()
                ->route('admin.manage-inpatient-service.index')
                ->with('message', 'Inpatient service added successfully.');
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
        $inpatient_service = InpatientService::whereNull('deleted_at')->findOrFail($id);

        $roomTariffData     = json_decode($inpatient_service->room_tariff_details, true) ?? [];
        $superSpecialtyData = json_decode($inpatient_service->super_specialty_details, true) ?? [];
        $faqData            = json_decode($inpatient_service->faq, true) ?? [];

        return view('backend.inpatient_service.edit', compact(
            'inpatient_service',
            'roomTariffData',
            'superSpecialtyData',
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
        $inpatient_service = InpatientService::whereNull('deleted_at')->findOrFail($id);

        $request->validate($this->rules(true), $this->messages());

        try {
            $introImage = $this->uploadImage($request, 'intro_image', 'intro')
                ?? $inpatient_service->intro_image;

            $documentsImage = $this->uploadImage($request, 'documents_image', 'documents')
                ?? $inpatient_service->documents_image;

            $dischargeImage = $this->uploadImage($request, 'discharge_image', 'discharge')
                ?? $inpatient_service->discharge_image;

            $faqImage = $this->uploadImage($request, 'faq_image', 'faq')
                ?? $inpatient_service->faq_image;

            $inpatient_service->update([
                'intro_image'              => $introImage,
                'intro_desc'               => $request->intro_desc,

                'admission_heading'        => $request->admission_heading,
                'admission_desc'           => $request->admission_desc,

                'documents_heading'        => $request->documents_heading,
                'documents_image'          => $documentsImage,
                'documents_desc'           => $request->documents_desc,

                'discharge_heading'        => $request->discharge_heading,
                'discharge_image'          => $dischargeImage,
                'discharge_desc'           => $request->discharge_desc,

                'room_tariff_heading'      => $request->room_tariff_heading,
                'room_tariff_title'        => $request->room_tariff_title,
                'room_tariff_details'      => json_encode(array_values($request->input('room_tariff', []))),

                'icu_heading'              => $request->icu_heading,
                'icu_desc'                 => $request->icu_desc,

                'tariff_notes_heading'     => $request->tariff_notes_heading,
                'tariff_notes_desc'        => $request->tariff_notes_desc,

                'super_specialty_heading'  => $request->super_specialty_heading,
                'super_specialty_details' => json_encode($this->processSuperSpecialtyUpdate($request)),

                'day_care_heading'         => $request->day_care_heading,
                'day_care_desc'            => $request->day_care_desc,

                'faq_heading'              => $request->faq_heading,
                'faq_image'                => $faqImage,
                'faq'                      => json_encode(array_values($request->input('faq', []))),

                'modified_by'              => Auth::id(),
                'modified_at'              => Carbon::now(),
            ]);

            return redirect()
                ->route('admin.manage-inpatient-service.index')
                ->with('message', 'Inpatient service updated successfully.');
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
            $inpatient_service = InpatientService::findOrFail($id);

            $inpatient_service->update([
                'deleted_by' => Auth::id(),
                'deleted_at' => Carbon::now(),
            ]);

            return redirect()
                ->route('admin.manage-inpatient-service.index')
                ->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}