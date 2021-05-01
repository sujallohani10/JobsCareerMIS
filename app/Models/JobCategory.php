<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'category_description',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
