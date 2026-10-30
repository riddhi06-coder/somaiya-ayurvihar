<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeStrength extends Model
{
    use SoftDeletes;

    protected $table = 'home_strengths';

    protected $fillable = [
        'heading',
        'image',
        'items', // stores all feature rows as JSON
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'items' => 'array', // automatically converts JSON <-> array
    ];

    protected $dates = ['deleted_at'];
}
