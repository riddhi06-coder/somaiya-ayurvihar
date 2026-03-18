<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class GalleryDetail extends Model
{
    use HasFactory;

    protected $table = 'gallery_details';

    protected $fillable = [
        'gallery_id',
        'description',   // only filename
        'images',     // image | video

        'created_at',
        'updated_at',   // only filename
        'updated_by',     // image | video
        'deleted_at',
        'deleted_by',

    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class, 'gallery_id');
    }
}
