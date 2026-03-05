<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Requests\DoctorFormRequest;
use App\Models\Contact;

use DB;
use Carbon\Carbon;

class ContactUsController extends Controller
{
    
    public function index()
    {
        $contacts = Contact::wherenull('deleted_by')->get();
        return view('backend.contact.index', compact('contacts'));
    }

    public function create()
    {
        return view('backend.contact.create');
    }

    public function store(Request $request)
    {
        // Validation rules
        $rules = [
            'emergency_heading' => 'required|string|max:255',
            'hospital_name'     => 'required|string|max:255',
            'call_us'           => 'required|string|max:255',
            'location'          => 'required|string',
            'location_url'      => 'required|url',
            'email'             => 'required|email',
            'iframe_url'        => 'required|url',
            'associates_name'   => 'required|string|max:255',
            
            // Emergency Table
            'center_name.*'     => 'required|string|max:255',
            'contact.*'         => 'required|string|max:255',

            // Associates Table
            'image.*'           => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'institute_name.*'  => 'required|string|max:255',
            'contact_no.*'      => 'required|string|max:255',
            'url.*'             => 'required|url',

            // Social Media Links
            'social_media.*.platform' => 'required|string',
            'social_media.*.link'     => 'required|url',
        ];

        $messages = [
            'emergency_heading.required' => 'Emergency heading is required.',
            'hospital_name.required'     => 'Hospital name is required.',
            'call_us.required'           => 'Call Us field is required.',
            'location.required'          => 'Location is required.',
            'location_url.required'      => 'Location URL is required.',
            'email.required'             => 'Email is required.',
            'email.email'                => 'Please enter a valid email.',
            'iframe_url.required'        => 'Iframe URL is required.',
            'iframe_url.url'             => 'Please enter a valid URL.',
            'associates_name.required'   => 'Associates name is required.',

            'center_name.*.required'     => 'Emergency Center name is required.',
            'contact.*.required'         => 'Emergency contact is required.',
            'institute_name.*.required'  => 'Institute name is required.',
            'contact_no.*.required'      => 'Institute contact number is required.',
            'url.*.required'             => 'Institute URL is required.',
        ];

        $request->validate($rules, $messages);

        // Initialize data arrays
        $emergencyData = [];
        $associatesData = [];

        // Handle Emergency Table
        if ($request->has('center_name')) {
            foreach ($request->center_name as $key => $centerName) {

                $emergencyData[] = [
                    'center_name' => $centerName,
                    'contact'     => $request->contact[$key] ?? null,
                ];
            }
        }

        // Handle Associates Table
        if ($request->has('institute_name')) {
            foreach ($request->institute_name as $key => $instituteName) {

                $imageName = null;

                if (isset($request->image[$key])) {
                    $img = $request->file('image')[$key];
                    if ($img) {
                        $uploadPath = public_path('uploads/contact/');
                        if (!file_exists($uploadPath)) {
                            mkdir($uploadPath, 0777, true);
                        }
                        $imageName = time().'_'.rand(1000,9999).'_banner.'.$img->getClientOriginalExtension();
                        $img->move($uploadPath, $imageName);
                    }
                }

                $associatesData[] = [
                    'image'         => $imageName,
                    'institute_name'=> $instituteName,
                    'contact_no'    => $request->contact_no[$key] ?? null,
                    'url'           => $request->url[$key] ?? null,
                ];
            }
        }

        $contact = new Contact();
        $contact->emergency_heading    = $request->emergency_heading;
        $contact->hospital_name        = $request->hospital_name;
        $contact->call_us              = $request->call_us;
        $contact->location             = $request->location;
        $contact->location_url         = $request->location_url;
        $contact->email                = $request->email;
        $contact->iframe_url           = $request->iframe_url;
        $contact->associates_name      = $request->associates_name;

        $contact->emergency_details    = json_encode($emergencyData);
        $contact->associates_details   = json_encode($associatesData);
        $contact->social_media_links   = json_encode($request->social_media);
        $contact->created_at = Carbon::now();
        $contact->created_by = Auth::id();

        $contact->save();

        return redirect()->route('admin.manage-contact-us.index')->with('message', 'Doctor details saved successfully!');
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);

        $contact->emergency_details = json_decode($contact->emergency_details, true);
        
        $contact->associates_details = json_decode($contact->associates_details, true);

        $contact_details = $contact->social_media_links ? json_decode($contact->social_media_links, true) : [];

        return view(
            'backend.contact.edit',
            compact('contact','contact_details')
        );
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        // Validation
        $rules = [
            'emergency_heading' => 'required|string|max:255',
            'hospital_name'     => 'required|string|max:255',
            'call_us'           => 'required|string|max:255',
            'location'          => 'required|string',
            'location_url'      => 'required|url',
            'email'             => 'required|email',
            'iframe_url'        => 'required|url',
            'associates_name'   => 'required|string|max:255',

            'center_name.*'     => 'required|string|max:255',
            'contact.*'         => 'required|string|max:255',

            'image.*'           => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'institute_name.*'  => 'required|string|max:255',
            'contact_no.*'      => 'required|string|max:255',
            'url.*'             => 'required|url',

            'social_media.*.platform' => 'required|string',
            'social_media.*.link'     => 'required|url',
        ];

        $request->validate($rules);

        $emergencyData = [];
        $associatesData = [];

        // Emergency Table
        if ($request->has('center_name')) {

            foreach ($request->center_name as $key => $centerName) {

                $emergencyData[] = [
                    'center_name' => $centerName,
                    'contact'     => $request->contact[$key] ?? null,
                ];
            }
        }

        // Decode existing associates images
        $oldAssociates = json_decode($contact->associates_details, true);

        if ($request->has('institute_name')) {

            foreach ($request->institute_name as $key => $instituteName) {

                $imageName = $oldAssociates[$key]['image'] ?? null;

                // If new image uploaded
                if (isset($request->image[$key])) {

                    $img = $request->file('image')[$key];

                    if ($img) {

                        $uploadPath = public_path('uploads/contact/');

                        if (!file_exists($uploadPath)) {
                            mkdir($uploadPath, 0777, true);
                        }

                        // delete old image
                        if ($imageName && file_exists($uploadPath.$imageName)) {
                            unlink($uploadPath.$imageName);
                        }

                        $imageName = time().'_'.rand(1000,9999).'_banner.'.$img->getClientOriginalExtension();

                        $img->move($uploadPath, $imageName);
                    }
                }

                $associatesData[] = [
                    'image'         => $imageName,
                    'institute_name'=> $instituteName,
                    'contact_no'    => $request->contact_no[$key] ?? null,
                    'url'           => $request->url[$key] ?? null,
                ];
            }
        }

        // Update main fields
        $contact->emergency_heading  = $request->emergency_heading;
        $contact->hospital_name      = $request->hospital_name;
        $contact->call_us            = $request->call_us;
        $contact->location           = $request->location;
        $contact->location_url       = $request->location_url;
        $contact->email              = $request->email;
        $contact->iframe_url         = $request->iframe_url;
        $contact->associates_name    = $request->associates_name;

        $contact->emergency_details  = json_encode($emergencyData);
        $contact->associates_details = json_encode($associatesData);
        $contact->social_media_links = json_encode($request->social_media);

        $contact->modified_at = Carbon::now();
        $contact->modified_by = Auth::id();

        $contact->save();

        return redirect()->route('admin.manage-contact-us.index')->with('message','Contact details updated successfully!');
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = Contact::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-contact-us.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }

}
