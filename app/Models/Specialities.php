<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialities extends Model
{
    use HasFactory;

    protected $table = 'specialities';
    public $timestamps = false;

    protected $fillable = [
        'subcategory_id',
        'specialities_image',
        'desc',
     

        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
    
    public function subcategory()
    {
        return $this->belongsTo(\App\Models\MedicalServiceSubCategory::class, 'subcategory_id');
    }
}
