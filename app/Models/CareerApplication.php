<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerApplication extends Model
{
    use HasFactory;

    protected $table = 'career_application_details';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'resume_path',
        'resume_original_name',
        'message',
         'job_id',
        'job_title',
      
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
    
}
