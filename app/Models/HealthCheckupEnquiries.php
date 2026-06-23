<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthCheckupEnquiries extends Model
{
    use HasFactory;

    protected $table = 'health_checkup_enquiries';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'package',
        'birth',
        'appointment_date',
        'email',
        'mobile',
      
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
    
}
