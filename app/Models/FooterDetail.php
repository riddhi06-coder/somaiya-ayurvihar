<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterDetail extends Model
{
    protected $fillable = [
        'logo',
        'address',
        'map_iframe',
        'enquiry_number',
        'emergency_contact',
        'opd_appointment',
        'wellness_appointment',
        'social_links', // JSON field for social icons
        'created_by',

        'created_at',
        'updated_at',   // only filename
        'updated_by',     // image | video
        'deleted_at',
        'deleted_by',

    ];

    protected $casts = [
        'social_links' => 'array', // automatically cast JSON to array
    ];
}
