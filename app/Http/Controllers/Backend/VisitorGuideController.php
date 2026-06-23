<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\VisitorGuide;
use Illuminate\Http\Request;
use Carbon\Carbon;



class VisitorGuideController extends Controller
{

    public function index()
    {
        $visitor_guide = VisitorGuide::wherenull('deleted_by')->get(); 
        return view('backend.visitor_guide.index', compact('visitor_guide'));
    }
    
    public function create()
    {
        return view('backend.visitor_guide.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
    
            'visitor_guide__heading' => 'required|string|max:255',
            'visitor_intro_desc' => 'required',
    
            /*
            |--------------------------------------------------------------------------
            | Visiting Hours
            |--------------------------------------------------------------------------
            */
            'visiting_hour_heading' => 'required|string|max:255',
            'visiting_hour_desc' => 'required',
            'visiting_desc' => 'required',
    
            'title' => 'required|array',
            'title.*' => 'required|string|max:255',
    
            'details' => 'required|array',
            'details.*' => 'required',
    
            /*
            |--------------------------------------------------------------------------
            | Visitor Pass Policy
            |--------------------------------------------------------------------------
            */
            'visitor_pass_heading' => 'required|string|max:255',
            'visitor_pass_desc' => 'required',
    
            'visitor_pass_image' => 'required|mimes:jpg,jpeg,png,webp,svg|max:2048',
    
            /*
            |--------------------------------------------------------------------------
            | Guidelines
            |--------------------------------------------------------------------------
            */
            'guideline_heading' => 'required|string|max:255',
            'guideline_desc' => 'required',
            'guideline_description' => 'required',
    
            /*
            |--------------------------------------------------------------------------
            | FAQ
            |--------------------------------------------------------------------------
            */
            'faq_heading' => 'required|string|max:255',
    
            'faq_image' => 'required|mimes:jpg,jpeg,png,webp,svg|max:2048',
    
            'faq' => 'required|array',
            'faq.*.question' => 'required',
            'faq.*.answer' => 'required',
    
        ], [
    
            'visitor_guide__heading.required' => 'Heading is required.',
            'visitor_intro_desc.required' => 'Description is required.',
    
            'visiting_hour_heading.required' => 'Visiting hour heading is required.',
            'visiting_hour_desc.required' => 'Visiting hour description is required.',
            'visiting_desc.required' => 'Short description is required.',
    
            'title.required' => 'At least one title is required.',
            'title.*.required' => 'Title is required.',
    
            'details.required' => 'At least one detail is required.',
            'details.*.required' => 'Detail is required.',
    
            'visitor_pass_heading.required' => 'Visitor pass heading is required.',
            'visitor_pass_desc.required' => 'Visitor pass description is required.',
    
            'visitor_pass_image.required' => 'Visitor pass image is required.',
            'visitor_pass_image.mimes' => 'Only jpg, jpeg, png, webp and svg files are allowed.',
            'visitor_pass_image.max' => 'Image size should be less than 2MB.',
    
            'guideline_heading.required' => 'Guideline heading is required.',
            'guideline_desc.required' => 'Guideline description 1 is required.',
            'guideline_description.required' => 'Guideline description 2 is required.',
    
            'faq_heading.required' => 'FAQ heading is required.',
    
            'faq_image.required' => 'FAQ image is required.',
            'faq_image.mimes' => 'Only jpg, jpeg, png, webp and svg files are allowed.',
            'faq_image.max' => 'Image size should be less than 2MB.',
    
            'faq.*.question.required' => 'FAQ question is required.',
            'faq.*.answer.required' => 'FAQ answer is required.',
        ]);
    
        /*
        |--------------------------------------------------------------------------
        | Visitor Pass Image Upload
        |--------------------------------------------------------------------------
        */
        $visitorPassImage = null;
    
        if ($request->hasFile('visitor_pass_image')) {
    
            $visitorPassImage = time().'_visitor_pass.'.$request->visitor_pass_image->extension();
    
            $request->visitor_pass_image->move(
                public_path('uploads/visitor_guide'),
                $visitorPassImage
            );
        }
    
        /*
        |--------------------------------------------------------------------------
        | FAQ Image Upload
        |--------------------------------------------------------------------------
        */
        $faqImage = null;
    
        if ($request->hasFile('faq_image')) {
    
            $faqImage = time().'_faq.'.$request->faq_image->extension();
    
            $request->faq_image->move(
                public_path('uploads/visitor_guide'),
                $faqImage
            );
        }
    
        /*
        |--------------------------------------------------------------------------
        | Visiting Hours Table JSON
        |--------------------------------------------------------------------------
        */
        $visitingHours = [];
    
        foreach ($request->title as $key => $title) {
    
            $visitingHours[] = [
                'title'   => $title,
                'details' => $request->details[$key] ?? '',
            ];
        }
    
        /*
        |--------------------------------------------------------------------------
        | FAQ JSON
        |--------------------------------------------------------------------------
        */
        $faqData = json_encode($request->faq);
    
        /*
        |--------------------------------------------------------------------------
        | Store
        |--------------------------------------------------------------------------
        */
        VisitorGuide::create([
    
            'visitor_guide_heading' => $request->visitor_guide__heading,
            'visitor_intro_desc' => $request->visitor_intro_desc,
    
            'visiting_hour_heading' => $request->visiting_hour_heading,
            'visiting_hour_desc' => $request->visiting_hour_desc,
            'visiting_desc' => $request->visiting_desc,
            'visiting_hour_details' => json_encode($visitingHours),
    
            'visitor_pass_heading' => $request->visitor_pass_heading,
            'visitor_pass_desc' => $request->visitor_pass_desc,
            'visitor_pass_image' => $visitorPassImage,
    
            'guideline_heading' => $request->guideline_heading,
            'guideline_desc' => $request->guideline_desc,
            'guideline_description' => $request->guideline_description,
    
            'faq_heading' => $request->faq_heading,
            'faq_image' => $faqImage,
            'faq' => $faqData,
    
            'created_by' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);
    
        return redirect()
            ->route('admin.manage-visitor-guide.index')
            ->with('message', 'Visitor guide added successfully.');
    }
    
    public function edit($id)
    {
        $convenience_facility = VisitorGuide::findOrFail($id);
        $faqData = json_decode($convenience_facility->faq, true) ?? [];
    
        return view('backend.visitor_guide.edit', compact(
            'convenience_facility',
            'faqData'
        ));
    }
    
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $visitorGuide = VisitorGuide::findOrFail($id);

        $request->validate([
            'visitor_guide__heading' => 'required|string|max:255',
            'visitor_intro_desc'     => 'required',

            'visiting_hour_heading'  => 'required|string|max:255',
            'visiting_hour_desc'     => 'required',

            'title'                  => 'required|array',
            'title.*'                => 'required|string|max:255',

            'details'                => 'required|array',
            'details.*'              => 'required',

            'visiting_desc'          => 'required',

            'visitor_pass_heading'   => 'required|string|max:255',
            'visitor_pass_desc'      => 'required',

            'guideline_heading'      => 'required|string|max:255',
            'guideline_desc'         => 'required',
            'guideline_description'  => 'required',

            'faq_heading'            => 'required|string|max:255',

            'faq'                    => 'required|array',
            'faq.*.question'         => 'required',
            'faq.*.answer'           => 'required',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Visitor Pass Image Upload (keep existing if no new file)
        |--------------------------------------------------------------------------
        */
        $visitorPassImage = $visitorGuide->visitor_pass_image;

        if ($request->hasFile('visitor_pass_image')) {

            $visitorPassImage = time().'_visitor_pass.'.$request->visitor_pass_image->extension();

            $request->visitor_pass_image->move(
                public_path('uploads/visitor_guide'),
                $visitorPassImage
            );
        }

        /*
        |--------------------------------------------------------------------------
        | FAQ Image Upload (keep existing if no new file)
        |--------------------------------------------------------------------------
        */
        $faqImage = $visitorGuide->faq_image;

        if ($request->hasFile('faq_image')) {

            $faqImage = time().'_faq.'.$request->faq_image->extension();

            $request->faq_image->move(
                public_path('uploads/visitor_guide'),
                $faqImage
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Visiting Hours Details (title[] / details[])
        |--------------------------------------------------------------------------
        */
        $visitingHourDetails = [];

        foreach ($request->title as $key => $title) {
            $visitingHourDetails[] = [
                'title'   => $title,
                'details' => $request->details[$key] ?? '',
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | FAQ JSON
        |--------------------------------------------------------------------------
        */
        $faqData = json_encode(array_values($request->faq));

        /*
        |--------------------------------------------------------------------------
        | Update Record
        |--------------------------------------------------------------------------
        */
        $visitorGuide->update([

            'visitor_guide__heading' => $request->visitor_guide__heading,
            'visitor_intro_desc'     => $request->visitor_intro_desc,

            'visiting_hour_heading'  => $request->visiting_hour_heading,
            'visiting_hour_desc'     => $request->visiting_hour_desc,
            'visiting_hour_details'  => json_encode($visitingHourDetails),

            'visiting_desc'          => $request->visiting_desc,

            'visitor_pass_heading'   => $request->visitor_pass_heading,
            'visitor_pass_image'     => $visitorPassImage,
            'visitor_pass_desc'      => $request->visitor_pass_desc,

            'guideline_heading'      => $request->guideline_heading,
            'guideline_desc'         => $request->guideline_desc,
            'guideline_description'  => $request->guideline_description,

            'faq_heading'            => $request->faq_heading,
            'faq_image'              => $faqImage,
            'faq'                    => $faqData,

            'modified_by'            => Auth::id(),
            'modified_at'            => Carbon::now(),
        ]);

        return redirect()->route('admin.manage-visitor-guide.index')->with('message', 'Visitor guide updated successfully.');
    }
    
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = VisitorGuide::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-visitor-guide.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}