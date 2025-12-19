<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AwardsDetails extends Model
{
    use SoftDeletes;

    protected $table = 'awards_details';

    protected $fillable = [
        'accreditation_heading',
        'accreditation_images',
        'award_heading',
        'award_images',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'accreditation_images' => 'array',
        'award_images' => 'array',
    ];

    protected $dates = [
        'deleted_at',
    ];
}
