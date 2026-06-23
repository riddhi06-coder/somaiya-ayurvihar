<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AyurvedaEnquiry extends Model
{
    use HasFactory;

    protected $table = 'ayurveda_enquiries';
    public $timestamps = false;

        protected $fillable = [
        
        'name',
        'email',
        'mobile_no',
        'user_message',

        // Common
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];



}