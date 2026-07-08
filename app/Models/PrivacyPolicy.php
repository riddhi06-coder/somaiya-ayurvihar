<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivacyPolicy extends Model
{
    use HasFactory;

    protected $table = 'privacy_policy';
    public $timestamps = false;

    protected $fillable = [
        'privacy_policy',
        'questions', 
        'contact_details',
      
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
    
    protected $casts = [
        'questions' => 'array',
    ];
}
