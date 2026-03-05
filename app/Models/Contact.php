<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact';
    public $timestamps = false;

    protected $fillable = [
        'emergency_heading',
        'hospital_name',
        'call_us',
        'location',
        'location_url',
        'email',
        'iframe_url',
        'associates_name',
        'emergency_details',
        'associates_details',
        'social_media_links',

        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
}
