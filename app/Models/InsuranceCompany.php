<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceCompany extends Model
{
    use HasFactory;

    protected $table = 'insurance_company';
    public $timestamps = false;

        protected $fillable = [
            'insurance_type',
            'company_data',
            
            // Common
            'created_at',
            'created_by',
            'modified_at',
            'modified_by',
            'deleted_at',
            'deleted_by',
            
        ];

        protected $casts = [
            'company_data' => 'array',
        ];
    

}
