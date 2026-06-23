<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerPage extends Model
{
    use HasFactory;

    protected $table = 'career_page';
    public $timestamps = false;

    protected $fillable = [
        'heading',
        'banner_image',
        'desc',
        'benefits_heading',
        'benefits',
        'job_heading',

        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
}
