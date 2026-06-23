<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorGuide extends Model
{
    use HasFactory;

    protected $table = 'visitor_guides';
    public $timestamps = false;

    protected $fillable = [
        'visitor_guide_heading',
        'visitor_intro_desc',
        
        'visiting_hour_heading',
        'visiting_hour_desc',
        'visiting_desc',
        'visiting_hour_details',
        
        'visitor_pass_heading',
        'visitor_pass_desc',
        'visitor_pass_image',
        
        'guideline_heading',
        'guideline_desc',
        'guideline_description',
        
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
}
