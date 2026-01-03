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
use App\Models\ManageServiceDetail;


class ServiceDetailsController extends Controller
{


    public function index()
    {
        $services = ManageServiceDetail::with([
                'category:id,category_name',
                'subcategory:id,subcategory_name',
                'service:id,service_name'
            ])
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

        return view('backend.service.index', compact('services'));
    }


    public function create()
    {

        $masterCategories = MedicalServiceMasterCategory::all();
        $subCategories = MedicalServiceSubCategory::all();
        $facility = MedicalServiceCategory::all();
        
        return view('backend.service.create' ,compact('masterCategories', 'subCategories','facility'));
    }


    public function store(Request $request)
    {
        // ================= VALIDATION =================
        $request->validate([
            'category_id'        => 'required',
            'subcategory_id'     => 'required',
            'service_id'         => 'nullable',

            'banner_heading'     => 'required|string|max:255',
            'image'              => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

            'section_image'      => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'desc'               => 'required|string',

            'service_heading'    => 'required|string|max:255',
            'service_image'      => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'service_desc'       => 'required|string',

            'features'           => 'required|array',
            'features.*.name'    => 'required|string',

            'special_heading'    => 'required|string|max:255',
            'special_desc'       => 'required|string',

            'faq_heading'        => 'required|string|max:255',
            'faq_image'          => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

            'faq'                => 'required|array',
            'faq.*.question'     => 'required|string',
            'faq.*.answer'       => 'required|string',
        ], [
            'category_id.required'    => 'Master category is required.',
            'subcategory_id.required' => 'Sub category is required.',
            'banner_heading.required' => 'Banner heading is required.',
            'image.required'          => 'Banner image is required.',
            'section_image.required'  => 'Section image is required.',
            'service_heading.required'=> 'Service heading is required.',
            'service_image.required'  => 'Service image is required.',
            'faq_heading.required'    => 'FAQ heading is required.',
            'faq_image.required'      => 'FAQ image is required.',
        ]);

        // ================= IMAGE UPLOADS =================
        $uploadPath = public_path('uploads/service-details');

        // Banner Image
        $bannerImage = null;
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $bannerImage = time().'_banner.'.$img->getClientOriginalExtension();
            $img->move($uploadPath, $bannerImage);
        }

        // Section Image
        $sectionImage = null;
        if ($request->hasFile('section_image')) {
            $img = $request->file('section_image');
            $sectionImage = time().'_section.'.$img->getClientOriginalExtension();
            $img->move($uploadPath, $sectionImage);
        }

        // Service Image
        $serviceImage = null;
        if ($request->hasFile('service_image')) {
            $img = $request->file('service_image');
            $serviceImage = time().'_service.'.$img->getClientOriginalExtension();
            $img->move($uploadPath, $serviceImage);
        }

        // FAQ Image
        $faqImage = null;
        if ($request->hasFile('faq_image')) {
            $img = $request->file('faq_image');
            $faqImage = time().'_faq.'.$img->getClientOriginalExtension();
            $img->move($uploadPath, $faqImage);
        }


        // Special Image
        $specialImage = null;
        if ($request->hasFile('special_image')) {
            $img = $request->file('special_image');
            $specialImage = time().'_special.'.$img->getClientOriginalExtension();
            $img->move($uploadPath, $specialImage);
        }


        // ================= JSON ENCODE TABLE DATA =================
        $featuresJson = json_encode($request->features);
        $faqJson      = json_encode($request->faq);

        // ================= STORE DATA =================
        ManageServiceDetail::create([
            'category_id'       => $request->category_id,
            'subcategory_id'    => $request->subcategory_id,
            'service_id'        => $request->service_id,

            'banner_heading'    => $request->banner_heading,
            'banner_image'      => $bannerImage,

            'section_image'     => $sectionImage,
            'description'       => $request->desc,

            'service_heading'   => $request->service_heading,
            'service_image'     => $serviceImage,
            'service_desc'      => $request->service_desc,

            'features'          => $featuresJson,

            'special_heading'   => $request->special_heading,
            'special_image'     => $specialImage,
            'special_desc'      => $request->special_desc,

            'faq_heading'       => $request->faq_heading,
            'faq_image'         => $faqImage,
            'faq'               => $faqJson,
            'created_at'        => Carbon::now(),
            'created_by'        => Auth::id(),
        ]);

        return redirect()->route('admin.manage-service-details.index')->with('message', 'Service details added successfully.');
    }


   public function edit($id)
    {
        $service_details = ManageServiceDetail::findOrFail($id);

        $service = MedicalServiceCategory::all();
        $masterCategories = MedicalServiceMasterCategory::all();
        $subCategories = MedicalServiceSubCategory::all();

        $service_details->features = json_decode($service_details->features, true);
        $service_details->faq = json_decode($service_details->faq, true);

        return view(
            'backend.service.edit',
            compact('service_details','service', 'masterCategories', 'subCategories')
        );
    }


}