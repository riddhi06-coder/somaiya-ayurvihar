<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageDiagnosticDetail extends Model
{
    use HasFactory;

    protected $table = 'diagnostic_details';
    public $timestamps = false;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'service_id',
        
        'banner_heading',
        'banner_title',

        'section_image',
        'description',

        'page_headers',

        'service_heading',
        'service_image',
        'service_desc',


        'book_desc',
        'book_heading',

        'special_heading',
        'special_image',
        'special_desc',

        'faq_heading',
        'faq_image',
        'faq',

        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];


    public function category()
    {
        return $this->belongsTo(
            MedicalServiceMasterCategory::class,
            'category_id',
            'id'
        );
    }

    public function subcategory()
    {
        return $this->belongsTo(
            MedicalServiceSubCategory::class,
            'subcategory_id',
            'id'
        );
    }

    public function service()
    {
        return $this->belongsTo(
            MedicalServiceCategory::class,          // ✅ THIS IS IMPORTANT
            'service_id',
            'id'
        );
    }
}
