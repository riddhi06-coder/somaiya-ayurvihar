<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'gallery_list';

    protected $fillable = [
        'event_name',
        'slug',   // only filename
        'date',     // image | video
        'image',

        'created_at',
        'updated_at',   // only filename
        'updated_by',     // image | video
        'deleted_at',
        'deleted_by',

    ];
}
