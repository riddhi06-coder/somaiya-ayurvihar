<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncementDetails extends Model
{
    use HasFactory;

    protected $table = 'announcements_details';
    public $timestamps = false;

    protected $fillable = [
        'announcement_id',
        'image',
        'description',
      
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
    
    public function announcement()
    {
        return $this->belongsTo(Announcements::class, 'announcement_id');
    }

}
