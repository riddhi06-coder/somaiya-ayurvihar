<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InpatientService extends Model
{
    protected $table = 'inpatient_services';

    // Custom audit columns (created_at / modified_at / deleted_at)
    // are managed manually in the controller
    public $timestamps = false;

    protected $guarded = [];
}