<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConvenienceFacility extends Model
{
    use HasFactory;

    protected $table = 'convenience_facilities';
    public $timestamps = false;

    protected $fillable = [
        'cafeteria_intro_desc',
        'cafeteria_heading',
        'cafeteria_desc',
        'cafeteria_details',
        
        'atm_heading',
        'atm_desc',
        'short_atm_desc',
        'atm_details',
        
        'pharmacy_heading',
        'pharmacy_desc',
        'pharmacy_details',
        
        'internet_heading',
        'internet_desc',
        
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
