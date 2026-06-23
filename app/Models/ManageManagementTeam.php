<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageManagementTeam extends Model
{
    protected $table = 'about_management_team';
    public $timestamps = false;

    protected $fillable = [

        'name',
        'designation',
        'description',
        'image',
        'priority',
      
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
}
