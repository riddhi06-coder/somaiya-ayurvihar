<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'doctors';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'modified_at'; 
    
    protected $fillable = [

        // Category Mapping
        'category_id',
        'subcategory_id',
        'service_id',
        'priority',

        // Images
        'doctor_image',
        'profile_desc',
        'designation',

        // Doctor Basic Info
        'doctor_name',
        'slug',
        'qualification',

        // Availability & Timings
        'doctor_time_slot',

        'social_media_links',
        'status',

        // Meta
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];



    public function category()
    {
        return $this->belongsTo(MedicalServiceMasterCategory::class, 'category_id', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(MedicalServiceSubCategory::class, 'subcategory_id', 'id');
    }

    public function service()
    {
        return $this->belongsTo(MedicalServiceCategory::class, 'service_id', 'id'); // as per your previous note
    }

   


}