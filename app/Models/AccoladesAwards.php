<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccoladesAwards extends Model
{
    use HasFactory;

    protected $table = 'accolades_awards';
    public $timestamps = false;

        protected $fillable = [
        
        'heading',
        'short_desc',
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
