<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Doctor;
use App\Models\CareerApplication;
use App\Models\HealthCheckupEnquiries;
use App\Models\DoctorAppointmentEnquiries;
use App\Models\MedicalServiceSubCategory;
use App\Models\AyurvedaEnquiry;
use App\Models\ContactEnquiry;



    class FormController extends Controller
    {
    
        //=========== Health Package Form Submit
        public function healthCheckupSubmit(Request $request)
        {
            Log::info('Health Checkup Form Hit', $request->all());
         
            try {
         
                // ✅ Validation
                $validated = $request->validate([
                    'name' => 'required|regex:/^[A-Za-z\s]+$/',
                    'pkg_name' => 'required',
                    'birth' => 'required|date|before_or_equal:today',
                    'appint_date' => 'required|date|after_or_equal:today',
                    'email' => 'required|email',
                    'mobile_no' => 'required|digits_between:10,12',
                ]);
         
                Log::info('Validation Passed');
         
                // ✅ Data
                $data = [
                    'name' => $request->name,
                    'package' => $request->pkg_name,
                    'birth' => $request->birth,
                    'appointment_date' => $request->appint_date,
                    'email' => $request->email,
                    'mobile' => $request->mobile_no,
                    'created_at' => Carbon::now(),
                ];
         
                Log::info('Prepared Data', $data);
         
                // ✅ Save to DB BEFORE sending mail
                $checkup = HealthCheckupEnquiries::create($data);
         
                Log::info('Health Checkup Saved', ['id' => $checkup->id]);
         
                // ✅ 1. Send Mail to Admin
                Mail::send('frontend.emails.health_checkup_admin', $data, function ($message) use ($data) {
                    $message->to('riddhi@matrixbricks.com')
                            ->cc(['shweta@matrixbricks.com'])
                            ->subject('New Health Checkup Booking Request - ' . $data['package']);
                });
         
                Log::info('Admin Mail Sent');
         
                // ✅ 2. Send Mail to User
                Mail::send('frontend.emails.health_checkup_user', $data, function ($message) use ($data) {
                    $message->to($data['email'])
                            ->subject('Health Checkup Request Received - ' . $data['package']);
                });
         
                Log::info('User Mail Sent');
         
                return redirect()->route('frontend.thank_you')
                    ->with('success', 'Form submitted successfully!');
         
            } catch (\Exception $e) {
         
                Log::error('Health Checkup Error: ' . $e->getMessage());
         
                return back()->with('error', 'Something went wrong. Please try again.');
            }
        }
        
        
        public function getLocation(Request $request)
        {
            $pincode = $request->pincode;
        
            $data = DB::table('ads_pincode_live')
                ->where('COL3', $pincode)
                ->first();
        
            if ($data) {
                return response()->json([
                    'status' => true,
                    'city' => $data->COL4,
                    'state' => $data->COL8,
                    'country' => $data->COL7
                ]);
            } else {
                return response()->json([
                    'status' => false
                ]);
            }
        }
        
        
        public function getDoctors(Request $request)
        {
            $speciality_id = $request->speciality_id;
        
            $doctors = Doctor::whereNull('deleted_by')
                ->where('subcategory_id', $speciality_id) 
                ->get(['id', 'doctor_name']);
        
            return response()->json($doctors);
        }
        
        //=========== Doctor Appointment Form Submit
        public function doctorAppointmentSubmit(Request $request)
        {
            // ✅ Validation
            $request->validate([
                'patient_name' => 'required|string',
                'gender' => 'required|not_in:--Select Gender*--',
                'mobile' => 'required|digits:10',
                'email' => 'required|email',
                'pincode' => 'required|digits:6',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'speciality' => 'required',
                'doctor_name' => 'required',
                'appointement_date' => 'required|date|after_or_equal:today',
                'slot' => 'required',
            ]);
         
            // ✅ Get names from DB (optional but recommended)
            $speciality = MedicalServiceSubCategory::find($request->speciality);
            $doctor = Doctor::find($request->doctor_name);
         
            // ✅ Data for mail
            $data = [
                'patient_name' => $request->patient_name,
                'gender' => $request->gender,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'pincode' => $request->pincode,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'speciality' => $speciality->subcategory_name ?? '',
                'doctor_name' => $doctor->doctor_name ?? '',
                'appointment_date' => $request->appointement_date,
                'slot' => $request->slot,
            ];
         
            // ✅ Save to DB BEFORE sending mail (stores both raw IDs and resolved names)
            DoctorAppointmentEnquiries::create([
                'patient_name'     => $data['patient_name'],
                'gender'           => $data['gender'],
                'mobile'           => $data['mobile'],
                'email'            => $data['email'],
                'pincode'          => $data['pincode'],
                'country'          => $data['country'],
                'state'            => $data['state'],
                'city'             => $data['city'],
                'speciality_id'    => $request->speciality,
                'speciality'       => $data['speciality'],
                'doctor_id'        => $request->doctor_name,
                'doctor_name'      => $data['doctor_name'],
                'appointment_date' => $data['appointment_date'],
                'slot'             => $data['slot'],
                'created_at'       => Carbon::now(),
            ]);
         
            // ✅ 1. Mail to Admin
            Mail::send('frontend.emails.doctor_appointment_admin', $data, function ($message) use ($data) {
                $message->to('riddhi@matrixbricks.com')
                        ->cc(['shweta@matrixbricks.com'])
                        ->subject('New Doctor Appointment Request - ' . $data['speciality']);
            });
         
            // ✅ 2. Mail to User (Acknowledgement)
            Mail::send('frontend.emails.doctor_appointment_user', $data, function ($message) use ($data) {
                $message->to($data['email'])
                        ->subject('Doctor Appointment Request Received');
            });
         
            return redirect()->route('frontend.thank_you')
                ->with('success', 'Appointment request submitted successfully!');
        }
        
        
        public function getDoctorSlots(Request $request)
        {
            $doctor = \App\Models\Doctor::find($request->doctor_id);
        
            if (!$doctor || !$request->date) {
                return response()->json([]);
            }
        
            $weekday = \Carbon\Carbon::parse($request->date)->format('l');
            $windows = json_decode($doctor->doctor_time_slot ?? '', true);
        
            $slots = [];
        
            if (is_array($windows)) {
                foreach ($windows as $window) {
                    if (empty($window['days'])) continue;
        
                    $days = array_map(fn($d) => strtolower(trim($d)), $window['days']);
                    if (!in_array(strtolower($weekday), $days)) continue;
        
                    $slots[] = $window['from'] . ' - ' . $window['to'];
                }
            }
        
            // FALLBACK: no defined slots for this day -> hourly 9 AM to 9 PM
            if (empty($slots)) {
                $start = \Carbon\Carbon::createFromTime(9, 0);   // 09:00 AM
                $end   = \Carbon\Carbon::createFromTime(21, 0);  // 09:00 PM (last block 8-9 PM)
        
                while ($start < $end) {
                    $next = (clone $start)->addHour();
                    $slots[] = $start->format('h:i A') . ' - ' . $next->format('h:i A');
                    $start->addHour();
                }
            }
        
            return response()->json(array_values(array_unique($slots)));
        }
        
        //=========== Career Applications Form Submit
        public function applicationSubmit(Request $request)
        {
            // Don't log the file binary — exclude it
            Log::info('Application Form Hit', $request->except('resume'));
     
            try {
     
                // ✅ Validation
                $request->validate([
                    'name'      => 'required|regex:/^[A-Za-z\s.\'-]+$/',
                    'email'     => 'required|email',
                    'resume'    => 'required|file|mimes:pdf,doc,docx|max:5120', // 5120 KB = 5 MB
                    'message'   => 'nullable|string|max:5000',
                    'job_title' => 'required|string|max:255',
                    'job_id'    => 'nullable|integer',
                ], [
                    'name.regex'    => 'Name cannot contain numbers or invalid characters.',
                    'resume.mimes'  => 'Resume must be a PDF or Word document (.pdf, .doc, .docx).',
                    'resume.max'    => 'Resume must not exceed 5 MB.',
                    'resume.file'   => 'Please upload a valid file.',
                ]);
     
                Log::info('Validation Passed');
     
                // ✅ Store the uploaded resume on the "public" disk -> storage/app/public/resumes
                $file         = $request->file('resume');
                $originalName = $file->getClientOriginalName();
     
                // Unique, safe filename; move into public/uploads/resumes
                $fileName  = time() . '_' . preg_replace('/[^A-Za-z0-9._-]/', '_', $originalName);
                $file->move(public_path('uploads/resumes'), $fileName);
     
                // web-relative path (use with asset()), e.g. uploads/resumes/169..._cv.pdf
                $storedPath = 'uploads/resumes/' . $fileName;
     
                // ✅ Save to DB BEFORE sending mail
                $application = CareerApplication::create([
                    'name'                 => $request->name,
                    'email'                => $request->email,
                    'job_id'               => $request->job_id,
                    'job_title'            => $request->job_title,
                    'resume_path'          => $storedPath,
                    'resume_original_name' => $originalName,
                    'message'              => $request->message,
                    'created_at'           => Carbon::now(),
                ]);
     
                Log::info('Application Saved', ['id' => $application->id]);
     
                // ✅ Data passed to the email views.
                // NOTE: use "user_message" (not "message") — Laravel reserves $message
                // inside mail views for the message builder instance.
                $data = [
                    'name'         => $application->name,
                    'email'        => $application->email,
                    'job_title'    => $application->job_title,
                    'user_message' => $application->message,
                    'resume_name'  => $originalName,
                    // absolute path for attaching the file
                    'resume_full'  => public_path($storedPath),
                ];
     
                Log::info('Prepared Data', collect($data)->except('resume_full')->toArray());
     
                // ✅ 1. Mail to Admin (with the resume attached)
                Mail::send('frontend.emails.career_admin_email', $data, function ($message) use ($data) {
                    $message->to('riddhi@matrixbricks.com')
                            ->cc(['shweta@matrixbricks.com'])
                            ->subject('New Application: ' . $data['job_title'] . ' - ' . $data['name'])
                            ->attach($data['resume_full'], ['as' => $data['resume_name']]);
                });
     
                Log::info('Admin Mail Sent');
     
                // ✅ 2. Acknowledgement mail to User
                Mail::send('frontend.emails.career_user_email', $data, function ($message) use ($data) {
                    $message->to($data['email'])
                            ->subject('Application Received - ' . $data['job_title']);
                });
     
                Log::info('User Mail Sent');
     
                return redirect()->route('frontend.thank_you')
                    ->with('success', 'Application submitted successfully!');
     
            } catch (ValidationException $e) {
                // Let field errors flash back so they show under each input
                return back()->withErrors($e->errors())->withInput();
     
            } catch (\Exception $e) {
                Log::error('Application Error: ' . $e->getMessage());
                return back()->with('error', 'Something went wrong. Please try again.');
            }
        }
        
        
        //=========== Ayurveda Enquiry Form Submit
        public function ayurveda_submit(Request $request)
        {
            try {
        
                $validated = $request->validate([
                    'name'      => 'required|regex:/^[A-Za-z\s]+$/',
                    'email'     => 'required|email',
                    'mobile_no' => 'required|digits_between:10,12',
                    'message'   => 'nullable|string',
                ]);
        
                $data = [
                    'name'       => $request->name,
                    'email'      => $request->email,
                    'mobile_no'  => $request->mobile_no,
                    'user_message' => $request->message,
                    'created_at' => Carbon::now(),
                    
                ];
        
                // Save To Database
                $enquiry = AyurvedaEnquiry::create($data);
        
                Log::info('Contact Enquiry Saved', [
                    'id' => $enquiry->id
                ]);
        
                // Admin Mail
                Mail::send(
                    'frontend.emails.ayurveda_admin_email',
                    $data,
                    function ($message) {
                        $message->to('riddhi@matrixbricks.com')
                                ->cc(['shweta@matrixbricks.com'])
                                ->subject('New Ayurveda Enquiry Received');
                    }
                );
        
                // User Mail
                Mail::send(
                    'frontend.emails.ayurveda_user_email',
                    $data,
                    function ($message) use ($data) {
                        $message->to($data['email'])
                                ->subject('Thank You For Contacting Us');
                    }
                );
        
                return redirect()->route('frontend.thank_you')
                    ->with('success', 'Form submitted successfully!');
        
            } catch (\Exception $e) {
        
                Log::error('Contact Form Error : '.$e->getMessage());
        
                return back()
                    ->with('error', 'Something went wrong. Please try again.');
            }
        }
        
        
        //=========== Contact Form Submit
        public function contactSubmit(Request $request)
        {
            try {
        
                $validated = $request->validate([
                    'first_name' => 'required|regex:/^[A-Za-z\s]+$/',
                    'last_name'  => 'required|regex:/^[A-Za-z\s]+$/',
                    'email'      => 'required|email',
                    'mobile_no'  => 'required|digits_between:10,12',
                    'message_text' => 'nullable|string',
                ]);
        
                $data = [
                    'first_name' => $request->first_name,
                    'last_name'  => $request->last_name,
                    'email'      => $request->email,
                    'mobile_no'  => $request->mobile_no,
                    'user_message'    => $request->message_text,
                    'created_at'           => Carbon::now(),
                ];
        
                ContactEnquiry::create($data);
        
                Mail::send('frontend.emails.contact_admin_email', $data, function ($message) {
                    $message->to('riddhi@matrixbricks.com')
                            ->cc(['shweta@matrixbricks.com'])
                            ->subject('New Contact Form Enquiry');
                });
        
                Mail::send('frontend.emails.contact_user_email', $data, function ($message) use ($data) {
                    $message->to($data['email'])
                            ->subject('Thank You For Contacting Us');
                });
        
                return redirect()->route('frontend.thank_you');
        
            } catch (\Exception $e) {
        
                Log::error('Contact Form Error: '.$e->getMessage());
        
                return back()->with('error', 'Something went wrong.');
            }
        }
    }