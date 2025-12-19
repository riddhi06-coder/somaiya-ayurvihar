<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompassionDetails extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'heading',
        'description',
        'items', // stores all table rows as JSON
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $casts = [
        'items' => 'array', // automatically converts JSON <-> array
    ];

    protected $dates = ['deleted_at'];
}
