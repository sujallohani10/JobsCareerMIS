<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobCategory;
use App\Models\ForumQuestion;
use App\Models\JobApplication;
use App\Models\ForumAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function home() {
        $jobs = Job::orderBy('created_at', 'DESC')
                ->where('active', 1)
                ->where('is_verified', 1)
                ->paginate(5);
        $JobCategories = JobCategory::all();
        $search = null;
        $searchCategory = null;

        // dd($about);

        return view('frontend.pages.home')->with(compact('jobs', 'JobCategories', 'search', 'searchCategory'));
    }

    public function jobDetail($id)
    {
        $job = Job::find($id);

        $appliedJob = false;
        if(Auth::id()) {
            $jobApplicationByUser = JobApplication::all()
                                        ->where('job_id', $id)
                                        ->where('user_id', Auth::id());

            //dd($jobApplicationByUser);
            (count($jobApplicationByUser) > 0) ? $appliedJob=true : false;
        }

        return view('frontend.pages.job-detail', compact('job', 'appliedJob'));
    }

    public function about() {
        return view('frontend.pages.about');
    }

    public function contact() {
        return view('frontend.pages.contact');
    }

    public function forum()
    {
        $forum_questions = ForumQuestion::orderBy('created_at', 'DESC')->paginate(5);
        //dd($forum_questions);
        $search = null;
        return view('frontend.pages.forum')->with(compact('forum_questions', 'search'));
    }

    public function forumDetail($id)
    {
        $forum_question = ForumQuestion::find($id);
        $forum_answers = ForumAnswer::select('*')
        ->join('users', 'users.id', '=', 'forum_answers.user_id')
        ->where('forum_answers.question_id', $id)
        ->orderBy('forum_answers.created_at','ASC')
        ->get();
        return view('frontend.pages.forum-detail')->with(compact('forum_question', 'forum_answers'));
    }

    public function search(Request $request)
    {
        $search = $request->name;
        $searchCategory = $request->category;
        $jobs = Job::query()->where('job_title', 'LIKE', "%{$request->name}%")->where('category_id', '=', "{$request->category}")->paginate(5);
        $JobCategories = JobCategory::all();
        return view('frontend.pages.home')->with(compact('jobs', 'search', 'JobCategories', 'searchCategory'));
    }

    public function forumSearch(Request $request)
    {
        $search = $request->name;
        $forum_questions = ForumQuestion::query()->where('question_title', 'LIKE', "%{$request->name}%")->get();
        return view('frontend.pages.forum')->with(compact('forum_questions', 'search'));
    }
}
