<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestimonialDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'heading',    // main heading/title
        'title',    // main heading/title
        'items',      // stores video rows as JSON
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $casts = [
        'items' => 'array', // automatically cast JSON to array
    ];

    protected $dates = ['deleted_at'];
}
