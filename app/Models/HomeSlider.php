<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    use HasFactory;

    protected $table = 'home_sliders';

    protected $fillable = [
        'banner_heading',
        'banner_media',   // only filename
        'media_type',     // image | video
        'created_by',
    ];

    /**
     * Get full media URL
     */
    public function getBannerMediaUrlAttribute()
    {
        if (!$this->banner_media) {
            return null;
        }

        return asset('home/bannerimagevideo/' . $this->banner_media);
    }

    /**
     * Check if media is image
     */
    public function isImage()
    {
        return $this->media_type === 'image';
    }

    /**
     * Check if media is video
     */
    public function isVideo()
    {
        return $this->media_type === 'video';
    }
}
