<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    protected $table = 'insurance_tpa';
    public $timestamps = false;

        protected $fillable = [
            'insurance_heading',
            'room_rent_desc',
            'essential_heading',
            'essential_desc',
            'essential_image',
            'cashless_heading',
            'cash_desc',
            'short_cash_desc',
            'cashless_details',
            'tpa_desc',
            'reimburse_desc',
            'reimburse_image',
            'disclaimer_desc',
            'faq_heading',
            'faq_image',
            'faq',
            
            
            // Common
            'created_at',
            'created_by',
            'modified_at',
            'modified_by',
            'deleted_at',
            'deleted_by',
            
        ];

        protected $casts = [
            'cashless_details' => 'array',
            'faq' => 'array',
        ];
    

}
