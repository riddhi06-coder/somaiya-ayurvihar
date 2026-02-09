<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\MedicalServiceSubCategory;
use App\Models\MedicalServiceCategory;
use App\Models\MedicalServiceMasterCategory;
use App\Models\ManageDiagnosticDetail;


class DiagnosticCriticalDetailsController extends Controller
{

    public function index()
    {
        $services = ManageDiagnosticDetail::with([
                'category:id,category_name',
                'subcategory:id,subcategory_name',
                'service:id,service_name'
            ])
            ->whereNull('deleted_by') 
            ->orderBy('category_id')
            ->orderBy('subcategory_id')
            ->get()
            ->groupBy([
                'category.category_name',
                'subcategory.subcategory_name',
                function ($item) {
                    return optional($item->service)->service_name ?? 'No Service';
                }
            ]);
        return view('backend.diagnostic.index', compact('services'));
    }

    public function create()
    {

        $masterCategories = MedicalServiceMasterCategory::where('category_name', '!=', 'specialities')
                        ->orderBy('created_at', 'asc')
                        ->get();
        $subCategories = MedicalServiceSubCategory::all();
        $facility = MedicalServiceCategory::all();
        
        return view('backend.diagnostic.create' ,compact('masterCategories', 'subCategories','facility'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'category_id' => 'required',
            'subcategory_id' => 'required',

            'banner_heading' => 'required|string|max:255',
            'banner_title' => 'required|string|max:255',

            'section_image.*' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

            'desc' => 'required',

            'service_heading' => 'required',

            // MULTIPLE SERVICE IMAGES
            'service_image.*' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

            'service_desc' => 'required',

            'special_heading' => 'required',
            'special_image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'special_desc' => 'required',

            'faq_heading' => 'required',
            'faq_image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

            'faq' => 'required|array',
            'faq.*.question' => 'required',
            'faq.*.answer' => 'required',

            'page_headers' => 'nullable|array',
            'page_headers.*.title' => 'required',

            'book_desc' => 'required',
            'book_heading' => 'required',
        ]);

        $uploadPath = public_path('uploads/service-details');

        // ================= MULTI SECTION IMAGES =================

        $sectionImages = [];

        if ($request->hasFile('section_image')) {
            foreach ($request->file('section_image') as $img) {
                $name = time().'_'.rand(1000,9999).'_section.'.$img->getClientOriginalExtension();
                $img->move($uploadPath, $name);
                $sectionImages[] = $name;
            }
        }

        // ================= MULTI SERVICE IMAGES =================

        $serviceImages = [];

        if ($request->hasFile('service_image')) {
            foreach ($request->file('service_image') as $img) {
                $name = time().'_'.rand(1000,9999).'_service.'.$img->getClientOriginalExtension();
                $img->move($uploadPath, $name);
                $serviceImages[] = $name;
            }
        }

        // ================= SINGLE IMAGES =================

        function uploadSingle($request, $field, $suffix)
        {
            if ($request->hasFile($field)) {
                $img = $request->file($field);
                $name = time().'_'.rand(1000,9999).'_'.$suffix.'.'.$img->getClientOriginalExtension();
                $img->move(public_path('uploads/service-details'), $name);
                return $name;
            }
            return null;
        }

        $specialImage = uploadSingle($request,'special_image','special');
        $faqImage     = uploadSingle($request,'faq_image','faq');

        // ================= JSON =================

        $faqJson          = json_encode($request->faq, JSON_UNESCAPED_UNICODE);
        $pageHeadersJson = json_encode($request->page_headers, JSON_UNESCAPED_UNICODE);

        $sectionImagesJson = json_encode($sectionImages);
        $serviceImagesJson = json_encode($serviceImages);

        // ================= STORE =================

        ManageDiagnosticDetail::create([

            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'service_id' => $request->service_id,

            'banner_heading' => $request->banner_heading,
            'banner_title' => $request->banner_title,

            'section_image' => $sectionImagesJson,
            'description' => $request->desc,

            'service_heading' => $request->service_heading,
            'service_image' => $serviceImagesJson,
            'service_desc' => $request->service_desc,

            'special_heading' => $request->special_heading,
            'special_image' => $specialImage,
            'special_desc' => $request->special_desc,

            'faq_heading' => $request->faq_heading,
            'faq_image' => $faqImage,
            'faq' => $faqJson,

            'page_headers' => $pageHeadersJson,

            'book_desc' => $request->book_desc,
            'book_heading' => $request->book_heading,

            'created_by' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.manage-diagnostic-critical.index')
            ->with('message','Service details added successfully!');
    }

    public function edit($id)
    {
        $service_details = ManageDiagnosticDetail::findOrFail($id);

        $service = MedicalServiceCategory::all();
        $masterCategories = MedicalServiceMasterCategory::where('category_name', '!=', 'specialities')
                        ->orderBy('created_at', 'asc')
                        ->get();

        $subCategories = MedicalServiceSubCategory::all();

        $service_details->section_image = json_decode($service_details->section_image, true);
        $service_details->service_image = json_decode($service_details->service_image, true);
        $service_details->features = json_decode($service_details->features, true);
        $service_details->faq = json_decode($service_details->faq, true);
        $service_details->page_headers = json_decode($service_details->page_headers, true);

        return view(
            'backend.diagnostic.edit',
            compact('service_details','service', 'masterCategories', 'subCategories')
        );
    }

    public function update(Request $request, $id)
    {
        // ================= VALIDATION =================
        $request->validate([

            'category_id' => 'required',
            'subcategory_id' => 'required',

            'desc' => 'required',

            'banner_heading' => 'required|string|max:255',
            'banner_title' => 'required|string|max:255',

            'section_image.*' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

            'service_heading' => 'required',
            'service_image.*' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'service_desc' => 'required',

            'special_heading' => 'required',
            'special_desc' => 'required',

            'faq_heading' => 'required',
            'faq_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

            'faq' => 'required|array',
            'faq.*.question' => 'required',
            'faq.*.answer' => 'required',

            'page_headers' => 'nullable|array',
            'page_headers.*.title' => 'required',

            'book_desc' => 'required',
            'book_heading' => 'required',
        ]);

        $service_details = ManageDiagnosticDetail::findOrFail($id);

        $uploadPath = public_path('uploads/service-details');

        // ================= SECTION IMAGES =================

        $existingSectionImages = json_decode($service_details->section_image, true) ?? [];
        $removedSection = json_decode($request->removed_section_images, true) ?? [];

        foreach ($removedSection as $img) {
            if (file_exists($uploadPath.'/'.$img)) unlink($uploadPath.'/'.$img);
            $existingSectionImages = array_values(array_diff($existingSectionImages, [$img]));
        }

        if ($request->hasFile('section_image')) {
            foreach ($request->file('section_image') as $img) {
                $name = time().'_'.rand(1000,9999).'_section.'.$img->getClientOriginalExtension();
                $img->move($uploadPath, $name);
                $existingSectionImages[] = $name;
            }
        }

        // ================= SERVICE IMAGES =================

        $existingServiceImages = json_decode($service_details->service_image, true) ?? [];
        $removedService = json_decode($request->removed_service_images, true) ?? [];

        foreach ($removedService as $img) {
            if (file_exists($uploadPath.'/'.$img)) unlink($uploadPath.'/'.$img);
            $existingServiceImages = array_values(array_diff($existingServiceImages, [$img]));
        }

        if ($request->hasFile('service_image')) {
            foreach ($request->file('service_image') as $img) {
                $name = time().'_'.rand(1000,9999).'_service.'.$img->getClientOriginalExtension();
                $img->move($uploadPath, $name);
                $existingServiceImages[] = $name;
            }
        }

        // ================= SINGLE IMAGE HELPER =================

        function uploadSingleUpdate($request,$field,$suffix,$old)
        {
            if ($request->hasFile($field)) {
                $img = $request->file($field);
                $name = time().'_'.rand(1000,9999).'_'.$suffix.'.'.$img->getClientOriginalExtension();
                $img->move(public_path('uploads/service-details'), $name);
                return $name;
            }
            return $old;
        }

        $specialImage = uploadSingleUpdate($request,'special_image','special',$service_details->special_image);
        $faqImage     = uploadSingleUpdate($request,'faq_image','faq',$service_details->faq_image);

        // ================= JSON =================

        $featuresJson    = json_encode($request->features);
        $faqJson         = json_encode($request->faq);
        $pageHeadersJson = json_encode($request->page_headers);
        $sectionJson     = json_encode($existingSectionImages);
        $serviceJson     = json_encode($existingServiceImages);

        // ================= UPDATE =================

        $service_details->update([

            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'service_id' => $request->service_id,


            'banner_heading' => $request->banner_heading,
            'banner_title' => $request->banner_title,

            'section_image' => $sectionJson,
            'description' => $request->desc,

            'service_heading' => $request->service_heading,
            'service_image' => $serviceJson,
            'service_desc' => $request->service_desc,

            'features' => $featuresJson,

            'special_heading' => $request->special_heading,
            'special_image' => $specialImage,
            'special_desc' => $request->special_desc,

            'faq_heading' => $request->faq_heading,
            'faq_image' => $faqImage,
            'faq' => $faqJson,

            'page_headers' => $pageHeadersJson,

            'book_desc' => $request->book_desc,
            'book_heading' => $request->book_heading,

            'updated_by' => Auth::id(),
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('admin.manage-diagnostic-critical.index')
            ->with('message','Service details updated successfully!');
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = ManageDiagnosticDetail::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-diagnostic-critical.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }


}