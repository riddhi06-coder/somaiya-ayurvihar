<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $table = 'testimonials';
    public $timestamps = false;

    protected $fillable = [
        'type',
        'title',
        'thumbnail',
        'testimonial',
        'rating',
        'person_name',
        'person_role',
        'video',
        'priority',
        'is_active',

        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
}
