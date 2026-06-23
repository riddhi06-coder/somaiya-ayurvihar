<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerListing extends Model
{
    use HasFactory;

    protected $table = 'career_listing';
    public $timestamps = false;

    protected $fillable = [
        'job_heading',
        'job_location',
        'desc',
        'slug',
      
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
}
