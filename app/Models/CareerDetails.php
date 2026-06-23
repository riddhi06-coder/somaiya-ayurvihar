<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerDetails extends Model
{
    use HasFactory;

    protected $table = 'career_details';
    public $timestamps = false;

    protected $fillable = [
        'job_id',
        'department',
        'experience',
        'job_type',
        'job_details',
        'desc',
      
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
    
    public function job()
    {
        return $this->belongsTo(CareerListing::class, 'job_id');
    }
}
