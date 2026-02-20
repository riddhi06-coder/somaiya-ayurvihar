<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageMediaCoverage extends Model
{
    use HasFactory;

    protected $table = 'media_coverages';
    public $timestamps = false;

    protected $fillable = [
        'media_heading',
        'media_publication',
        'media_type',

        'media_publication_date',
        'description',
        'thumbnail_image',
      
        'media_image',
        'media_video',
        'url',

        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
}
