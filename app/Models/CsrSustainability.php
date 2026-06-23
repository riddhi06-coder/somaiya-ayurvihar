<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CsrSustainability extends Model
{
    use HasFactory;

    protected $table = 'csr_sustainability';
    public $timestamps = false;

    protected $fillable = [
        'desc',

        'uhtc_heading',
        'uhtc_desc',
        'uhtc_image',
        'support_heading',
        'support_desc',
        'support_image',
        'community_heading',
        'community_desc',
        'community_image',
    
        'donation_desc',
        'inclusive_desc',
    
        'gallery_images',
      
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
}
