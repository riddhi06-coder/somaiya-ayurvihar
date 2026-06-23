<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingProcess extends Model
{
    use HasFactory;

    protected $table = 'billing_process';
    public $timestamps = false;

        protected $fillable = [
        // Visitors Policy
        'visitor_heading',
        'visitor_details',

        // Room Types
        'room_heading',
        'room_types',

        // Room Rent
        'room_rent_heading',
        'room_rent_desc',

        // General Info
        'general_info_heading',
        'general_info_desc',

        // Document Timelines
        'doc_sub_heading',
        'document_timelines',

        // Documents Submitted
        'doc_submitted_heading',
        'doc_image',
        'doc_submitted_desc',

        // Details
        'sd_desc',
        'declaration_desc',

        // Common
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];

    protected $casts = [
        'visitor_details'    => 'array',
        'room_types'         => 'array',
        'document_timelines' => 'array',
    ];
    

}
