<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AwardsImages extends Model
{
    use HasFactory;

    protected $table = 'awards_images';
    public $timestamps = false;

        protected $fillable = [
        'banner_image',
        'date',
        'desc',

        // Common
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];



}
