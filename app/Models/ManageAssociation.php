<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageAssociation extends Model
{
    use HasFactory;

    protected $table = 'associations';
    public $timestamps = false;

    protected $fillable = [
        'asso_name',
        'assoc_contact',
        'assoc_url',
        'assoc_desc',

        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
}
