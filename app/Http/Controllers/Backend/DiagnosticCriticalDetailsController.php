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

            // 'banner_heading' => 'required|string|max:255',
            // 'banner_title' => 'required|string|max:255',

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

}