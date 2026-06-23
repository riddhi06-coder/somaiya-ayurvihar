<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog_listing';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'slug',
        'date',
        'author',
        'blog_image',
        'blog_details',
        'is_featured',
        'priority',
        'is_active',

        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
}
