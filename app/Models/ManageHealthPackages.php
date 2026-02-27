<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageHealthPackages extends Model
{
    use HasFactory;

    protected $table = 'health_packages';
    public $timestamps = false;

    protected $fillable = [
        'sub_category_id',
        'package_name',
        'slug',
        'actual_price',
        'discounted_price',
        'age_range',
        'gender',

        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];

    public function subcategory()
    {
        return $this->belongsTo(MedicalServiceSubCategory::class, 'sub_category_id');
    }

}
