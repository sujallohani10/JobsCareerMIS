<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'question_title',
        'question_description',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
