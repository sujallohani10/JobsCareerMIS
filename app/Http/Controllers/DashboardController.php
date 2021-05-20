<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use App\Models\JobCategory;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request) {

        $total_users = User::all()->count();
        $total_category = JobCategory::all()->count();
        $total_jobs = Job::all()->count();
        $total_job_application = JobApplication::all()->count();
        //dd($total_users);

        return view('dashboard', compact(['total_users', 'total_category', 'total_jobs', 'total_job_application']));
    }
}
