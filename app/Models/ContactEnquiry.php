<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactEnquiry extends Model
{
    use HasFactory;

    protected $table = 'contact_enquiries';
    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile_no',
        'user_message',
        
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
}
