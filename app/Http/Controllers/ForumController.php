<?php

namespace App\Http\Controllers;

use App\Models\ForumAnswer;
use App\Models\ForumQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ForumController extends Controller
{
    public function storeForumQuestion(Request $request)
    {
        //dd('forum store');
        $rules = [
            'question_title'=>'required',
            'question_description' =>'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $question = new ForumQuestion();
            $question->question_title = $request->question_title;
            $question->question_description = $request->question_description;
            $question->user_id = Auth::id();
            $question->status = 1;
            $question->save();
            return response()->json($question);
        }
    }

    public function storeForumAnswer(Request $request)
    {
        //dd('forum store');
        $rules = [
            'answer_description' =>'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $answer = new ForumAnswer();
            $answer->answer_description = $request->answer_description;
            $answer->question_id = $request->question_id;
            $answer->user_id = Auth::id();
            $answer->save();

            if($request->status){
                $question = ForumQuestion::findorFail($request->question_id);
                $question->status = $request->status;
                $question->update();
            }

            return response()->json($answer);
        }
    }
}
