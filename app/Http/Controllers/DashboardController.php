<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use App\Models\JobCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request) {

        $authUserRole = Auth::user()->roles[0]->id;

        $total_users = User::all()->count();
        $total_category = JobCategory::all()->count();

        $jobs = Job::all();
        if(isset($authUserRole) && $authUserRole != 1) {
            $jobs = $jobs->where('created_by', '==', Auth::id());
        };
        $total_jobs = $jobs->count();


        $total_job_application=0;
        if(isset($authUserRole) && $authUserRole != 1) {
            $total_job_application = DB::table('job_application')
                    ->select('job_application.*', 'jobs.job_title','jobs.created_by','users.name')
                    ->leftJoin('jobs', 'job_application.job_id', '=', 'jobs.id')
                    ->leftJoin('users', 'job_application.user_id', '=', 'users.id')
                    ->where('jobs.created_by', '=', Auth::id())
                    ->get()->count();
        } else {
            $total_job_application = JobApplication::all()->count();
        }


        $total_job_applied_student_users = JobApplication::all()
                                            ->where('user_id', Auth::id())
                                            ->count();
        //dd($total_users);


        return view('dashboard', compact(['total_users', 'total_category', 'total_jobs', 'total_job_application', 'total_job_applied_student_users']));
    }
}
