<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AwardsQuality extends Model
{
    use HasFactory;

    protected $table = 'awards_quality';
    public $timestamps = false;

        protected $fillable = [
        
        'heading',
        'certification_name',
        'desc',
        'banner_image',
        'type',

        // Common
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];



}
