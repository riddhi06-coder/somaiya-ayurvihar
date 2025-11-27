<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DoctorFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $doctorId = $this->route('doctor')?->id ?? null;

        return [
            // Personal Info
            'salutation'            => 'required|in:Dr.,Mr.,Mrs.,Ms.,Prof.',
            'first_name'            => 'required|string|max:100',
            'middle_name'           => 'nullable|string|max:100',
            'last_name'             => 'required|string|max:100',
            'gender'                => 'required|in:Male,Female,Other',

            // Professional
            'registration_number'   => [
                'required',
                'string',
                'max:50',
                Rule::unique('doctors', 'registration_number')->ignore($doctorId),
            ],
            'registration_council'  => 'required|string|max:150',

            // Degrees (multi-select: degree_id[])
            'degree_id'             => 'required|array|min:1',
            'degree_id.*'           => 'exists:degrees,id',

            'languages'             => 'required|string|max:255',
            'medical_service_sub_category_id' => 'required|exists:medical_service_sub_categories,id',

            'experience_years'      => 'required|integer|min:0|max:70',
            'consultation_fee'      => 'required|numeric|min:0|max:100000',

            // Availability
            'available_days'        => 'required|array|min:1',
            'available_days.*'      => 'in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',

            // TIME SLOTS – THIS IS THE EXACT MATCH FOR FINAL BLADE
            'slots'                 => 'required|array|min:1',
            'slots.*.start'         => 'required|date_format:H:i',
            'slots.*.end'           => 'required|date_format:H:i|after:slots.*.start',

            // Contact
            'phone' => [
                'required',
                'regex:/^[6-9]\d{9}$/',
                Rule::unique('doctors', 'phone')->ignore($doctorId),
            ],
            'email' => [
                'required',
                'email',
                'max:100',
                Rule::unique('doctors', 'email')->ignore($doctorId),
            ],

            // Address
            'address_line_1'        => 'required|string|max:255',
            'city'                  => 'required|string|max:100',
            'pincode'               => 'required|digits:6',

            // Files
            'profile_image' => [
                $this->isMethod('POST') ? 'required' : 'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],
            'short_video'   => 'nullable|mimes:mp4,mov,avi,webm|max:51200', // 50MB
        ];
    }

    public function messages(): array
    {
        return [
            'degree_id.required'          => 'Please select at least one degree.',
            'slots.required'              => 'Please add at least one time slot.',
            'slots.*.end.after'           => 'End time must be after start time.',
            'phone.regex'                 => 'Enter a valid 10-digit Indian mobile number.',
            'pincode.digits'              => 'Pincode must be exactly 6 digits.',
            'profile_image.required'      => 'Profile image is required when creating a doctor.',
        ];
    }
}