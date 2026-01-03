<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalServiceCategory extends Model
{
    use SoftDeletes;

    protected $table = 'medical_service_categorie';

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'service_name',
        'created_by',
        'updated_by',
        'deleted_by'    
    ];

    // 🔗 Master Category
    public function category()
    {
        return $this->belongsTo(MedicalServiceMasterCategory::class, 'category_id');
    }

    // 🔗 Sub Category
    public function subcategory()
    {
        return $this->belongsTo(MedicalServiceSubCategory::class, 'subcategory_id');
    }
}
