<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobCategory;
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
        //echo $id;die;

        $job = Job::find($id);
        //return view('jobs.show', compact('job'));

        return view('frontend.pages.job-detail', compact('job'));
    }
}
