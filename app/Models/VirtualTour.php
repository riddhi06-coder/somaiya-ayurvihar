<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VirtualTour extends Model
{
    use HasFactory;

    protected $table = 'virtual_tours';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'testimonial',
        'thumbnail',
        'video',
        
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
}
