<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    public function apply(Request $request)
    {
        //file validation
        $request->validate([
            'file_cv' => 'required|mimes:doc,pdf,docx|max:2048',
        ]);

        //file upload CV to directory and save the data
        $job_application = new JobApplication();
        if ($request->file('file_cv')) {
            $file = $request->file('file_cv');
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('ResumeDirectory', $fileName, 'public');
            $job_application->cv_file_path = $path;
            $job_application->user_id = 2; //need to be session user, Auth::id()
            $job_application->job_id = $request['job_id'];
            $job_application->status = 1; //Applied Status
            $job_application->save();
            return back()->with('success');
        }
    }

    public function index(Request $request)
    {
        $jobsapplications = DB::table('job_application')
                ->leftJoin('jobs', 'job_application.job_id', '=', 'jobs.id')
                ->leftJoin('users', 'job_application.user_id', '=', 'users.id')
                ->where('jobs.created_by', '=', Auth::id())
                ->get();


        //dd(Storage::allDirectories());
        //dd($jobsapplications);

        return view('jobapplication.index', compact('jobsapplications'));
    }

    public function download_file(Request $request)
    {
        //dd(storage_path('app/public/'));
        $path= $request['path'];
        /**this will force download your file**/
        if($path){
            $file_path = storage_path('app/public/'.$path);
            return response()->download($file_path);
        }

    }
}
