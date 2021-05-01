<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'job_desc',
        'job_expiry_date',
        'company_address',
        'job_type',
        'min_salary',
        'max_salary',
        'category_id',
        'created_by',
    ];

    public function jobcategories()
    {
        return $this->belongsTo(JobCategory::class, 'category_id');
    }

    // relation to users table for created_by column
    public function createdby() {
        return $this->belongsTo(User::class, 'created_by');
    }

    // relation to users table for verified_by column
    public function verifiedby() {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
