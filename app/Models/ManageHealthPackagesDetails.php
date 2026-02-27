<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageHealthPackagesDetails extends Model
{
    use HasFactory;

    protected $table = 'health_packages_details';
    public $timestamps = true;

    protected $fillable = [
        'package_id',
        'sub_category_id',
        'location',
        'location_url',
        'description',

        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];

    
    public function package()
    {
        return $this->belongsTo(ManageHealthPackages::class, 'package_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(MedicalServiceSubCategory::class, 'sub_category_id');
    }
    
}
