<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RightsResponsibility extends Model
{
    use HasFactory;

    protected $table = 'rights_responsibilities';
    public $timestamps = false;

    protected $fillable = [
        'introduction',
        'patient_desc',
        'patient_rights_desc',
        'faq_heading',
        'faq_image',
        'faq',
      
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
}
