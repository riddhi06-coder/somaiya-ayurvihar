<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageChairmanMessage extends Model
{
    use HasFactory;

    protected $table = 'chairman_message';
    public $timestamps = false;

    protected $fillable = [
        'chairman_name',
        'chairman_designation',
        'image',
        'chairman_description',
        'desc_image',
        'about_description',
        'motto',
        'message',

        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];

}
