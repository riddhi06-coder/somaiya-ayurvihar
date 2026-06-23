<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcements extends Model
{
    use HasFactory;

    protected $table = 'anouncements_listing';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'slug',
        'date',
        'image',
        'social_media',
        'is_featured',
        'priority',

        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
}
