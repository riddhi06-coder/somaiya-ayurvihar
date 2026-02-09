<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagePrayer extends Model
{
    use HasFactory;

    protected $table = 'about_prayer';
    public $timestamps = false;

    protected $fillable = [
        'image',
        'heading',
        'description',
      
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
}
