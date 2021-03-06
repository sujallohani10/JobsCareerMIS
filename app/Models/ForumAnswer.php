<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'question_id',
        'answer_description',
    ];

    public function forumquestion()
    {
        return $this->belongsTo(ForumQuestion::class, 'question_id');
    }

    public static function countForumAnswer($question_id) {
       return ForumAnswer::all()->where('question_id', $question_id)->count();
    }
}
