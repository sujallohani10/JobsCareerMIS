<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobCategory;
use App\Models\ForumQuestion;
use Illuminate\Http\Request;

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
        $jobs = Job::all()->where('active', 1);

        // dd($about);

        return view('frontend.pages.home')->with(compact('jobs'));
    }

    public function jobDetail($id)
    {
        $job = Job::find($id);

        return view('frontend.pages.job-detail', compact('job'));
    }

    public function about() {
        return view('frontend.pages.about');
    }

    public function contact() {
        return view('frontend.pages.contact');
    }

    public function forum()
    {
        $forum_questions = ForumQuestion::all();
        return view('frontend.pages.forum')->with(compact('forum_questions'));
    }
}
