<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    /**
     * The table associated with the JobApplication Model.
     *
     * @var string
     */
    protected $table = 'job_application';

    protected $fillable = [
        'user_id',
        'job_id',
        'status',
        'cv_file_path',
    ];

    // relation to jobs table for job_id column in job applicatio table
    public function jobs()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    // relation to users table for user_id column in job applicatio table
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
