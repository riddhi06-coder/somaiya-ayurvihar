<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CommunityOutreach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Exception;

class CommunityOutreachController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Index
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $community_outreaches = CommunityOutreach::whereNull('deleted_at')
            ->orderBy('id', 'desc')
            ->get();

        return view('backend.about.community.index', compact('community_outreaches'));
    }

    /*
    |--------------------------------------------------------------------------
    | Create
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('backend.about.community.create');
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
            'intro_desc'                => 'required',

            // UHTC
            'uhtc_desc'                 => 'required',
            'uhtc_image'                => $imageRule,

            // Core services include
            'core_services_desc'        => 'required',

            // Public health & follow-up initiatives
            'public_health_desc'        => 'required',
            'public_health_short_desc'  => 'required',

            // SAHAS
            'sahas_image'               => $imageRule,
            'sahas_desc'                => 'required',

            // Impact and scope
            'impact_desc'               => 'required',
            
            // Impact and scope
            'keyarea_desc'               => 'required',
            
            // RHTC Lodhivali
            'rhtc_image'                => $imageRule,
            'rhtc_desc'                 => 'required',

            // Preventive & School-Based Outreach Programmes
            'preventive_desc'           => 'required',
            'programmes'                => 'required|array|min:1',
            'programmes.*.image'        => $imageRule,
            'programmes.*.title'        => 'required|string|max:255',
            'programmes.*.description'  => 'required',

            // A Commitment Beyond the Hospital
            'commitment_desc'           => 'required',
        ];
    }

    private function messages(): array
    {
        return [
            'intro_desc.required'               => 'Description is required.',

            'uhtc_desc.required'                => 'UHTC description is required.',
            'uhtc_image.required'               => 'UHTC image is required.',
            'uhtc_image.mimes'                  => 'Only jpg, jpeg, png, webp and svg files are allowed.',
            'uhtc_image.max'                    => 'Image size should be less than 2MB.',

            'core_services_desc.required'       => 'Core services description is required.',

            'public_health_desc.required'       => 'Public health description is required.',
            'public_health_short_desc.required' => 'Public health short description is required.',

            'sahas_image.required'              => 'SAHAS image is required.',
            'sahas_image.mimes'                 => 'Only jpg, jpeg, png, webp and svg files are allowed.',
            'sahas_image.max'                   => 'Image size should be less than 2MB.',
            'sahas_desc.required'               => 'SAHAS description is required.',

            'impact_desc.required'              => 'Impact and scope description is required.',
            'keyarea_desc.required'              => 'Key areas of support include is required.',

            'rhtc_image.required'               => 'RHTC image is required.',
            'rhtc_image.mimes'                  => 'Only jpg, jpeg, png, webp and svg files are allowed.',
            'rhtc_image.max'                    => 'Image size should be less than 2MB.',
            'rhtc_desc.required'                => 'RHTC description is required.',

            'preventive_desc.required'          => 'Preventive programmes description is required.',
            'programmes.required'               => 'At least one programme is required.',
            'programmes.*.image.required'       => 'Programme image is required.',
            'programmes.*.image.mimes'          => 'Only jpg, jpeg, png, webp and svg files are allowed.',
            'programmes.*.image.max'            => 'Image size should be less than 2MB.',
            'programmes.*.title.required'       => 'Programme title is required.',
            'programmes.*.description.required' => 'Programme description is required.',

            'commitment_desc.required'          => 'Commitment description is required.',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Single image upload helper
    |--------------------------------------------------------------------------
    */
    private function uploadImage(Request $request, string $field, string $prefix): ?string
    {
        if (!$request->hasFile($field)) {
            return null;
        }

        $fileName = time() . '_' . $prefix . '.' . $request->file($field)->extension();

        $request->file($field)->move(
            public_path('uploads/community_outreach'),
            $fileName
        );

        return $fileName;
    }

    /*
    |--------------------------------------------------------------------------
    | Programmes repeater builder (image + title + description per row)
    |--------------------------------------------------------------------------
    */
    private function buildProgrammes(Request $request): array
    {
        $programmes = [];

        foreach ($request->programmes as $key => $row) {

            // keep existing image (edit mode) unless a new file is uploaded
            $image = $row['existing_image'] ?? '';

            if ($request->hasFile("programmes.$key.image")) {

                $file = $request->file("programmes.$key.image");

                $fileName = time() . '_programme_' . $key . '.' . $file->extension();

                $file->move(
                    public_path('uploads/community_outreach'),
                    $fileName
                );

                $image = $fileName;
            }

            $programmes[] = [
                'image'       => $image,
                'title'       => $row['title'] ?? '',
                'description' => $row['description'] ?? '',
            ];
        }

        return array_values($programmes);
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
            CommunityOutreach::create([
                'intro_desc'               => $request->intro_desc,

                'uhtc_desc'                => $request->uhtc_desc,
                'uhtc_image'               => $this->uploadImage($request, 'uhtc_image', 'uhtc'),

                'core_services_desc'       => $request->core_services_desc,

                'public_health_desc'       => $request->public_health_desc,
                'public_health_short_desc' => $request->public_health_short_desc,

                'sahas_image'              => $this->uploadImage($request, 'sahas_image', 'sahas'),
                'sahas_desc'               => $request->sahas_desc,

                'impact_desc'              => $request->impact_desc,
                 'keyarea_desc'              => $request->keyarea_desc,


                'rhtc_image'               => $this->uploadImage($request, 'rhtc_image', 'rhtc'),
                'rhtc_desc'                => $request->rhtc_desc,

                'preventive_desc'          => $request->preventive_desc,
                'programmes'               => json_encode($this->buildProgrammes($request)),

                'commitment_desc'          => $request->commitment_desc,

                'created_by'               => Auth::id(),
                'created_at'               => Carbon::now(),
            ]);

            return redirect()
                ->route('admin.manage-community-outreach.index')
                ->with('message', 'Community outreach added successfully.');
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
        $community_outreach = CommunityOutreach::whereNull('deleted_at')->findOrFail($id);

        $programmes = json_decode($community_outreach->programmes, true) ?? [];

        return view('backend.about.community.edit', compact(
            'community_outreach',
            'programmes'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        $community_outreach = CommunityOutreach::whereNull('deleted_at')->findOrFail($id);

        $request->validate($this->rules(true), $this->messages());

        try {
            $uhtcImage  = $this->uploadImage($request, 'uhtc_image', 'uhtc')   ?? $community_outreach->uhtc_image;
            $sahasImage = $this->uploadImage($request, 'sahas_image', 'sahas') ?? $community_outreach->sahas_image;
            $rhtcImage  = $this->uploadImage($request, 'rhtc_image', 'rhtc')   ?? $community_outreach->rhtc_image;

            $community_outreach->update([
                'intro_desc'               => $request->intro_desc,

                'uhtc_desc'                => $request->uhtc_desc,
                'uhtc_image'               => $uhtcImage,

                'core_services_desc'       => $request->core_services_desc,

                'public_health_desc'       => $request->public_health_desc,
                'public_health_short_desc' => $request->public_health_short_desc,

                'sahas_image'              => $sahasImage,
                'sahas_desc'               => $request->sahas_desc,

                'impact_desc'              => $request->impact_desc,
                'keyarea_desc'              => $request->keyarea_desc,

                'rhtc_image'               => $rhtcImage,
                'rhtc_desc'                => $request->rhtc_desc,

                'preventive_desc'          => $request->preventive_desc,
                'programmes'               => json_encode($this->buildProgrammes($request)),

                'commitment_desc'          => $request->commitment_desc,

                'modified_by'              => Auth::id(),
                'modified_at'              => Carbon::now(),
            ]);

            return redirect()
                ->route('admin.manage-community-outreach.index')
                ->with('message', 'Community outreach updated successfully.');
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
            $community_outreach = CommunityOutreach::findOrFail($id);

            $community_outreach->update([
                'deleted_by' => Auth::id(),
                'deleted_at' => Carbon::now(),
            ]);

            return redirect()
                ->route('admin.manage-community-outreach.index')
                ->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}