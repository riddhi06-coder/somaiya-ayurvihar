<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorAppointmentEnquiries extends Model
{
    use HasFactory;

    protected $table = 'doctor_appointments_enquiries';
    public $timestamps = false;

    protected $fillable = [
        'patient_name',
        'gender',
        'mobile',
        'email',
        'pincode',
        'country',
        'state',
        'city',
        'speciality_id',
        'speciality',
        'doctor_id',
        'doctor_name',
        'appointment_date',
        'slot',
      
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
    
}
