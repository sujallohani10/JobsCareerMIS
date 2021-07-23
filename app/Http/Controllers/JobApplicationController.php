<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class JobApplicationController extends Controller
{

    public function index(Request $request)
    {
        abort_if(Gate::denies('job_application'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $jobsapplications = DB::table('job_application')
                ->select('job_application.*', 'jobs.job_title','jobs.created_by','users.name')
                ->leftJoin('jobs', 'job_application.job_id', '=', 'jobs.id')
                ->leftJoin('users', 'job_application.user_id', '=', 'users.id')
                ->where('jobs.created_by', '=', Auth::id())
                ->get();
        //dd($jobsapplications);

        return view('jobapplication.index', compact('jobsapplications'));
    }

    public function edit($id) {
        abort_if(Gate::denies('job_application'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $job_application = JobApplication::find($id);
        return view('jobapplication.edit', compact('job_application'));
    }

    public function update(JobApplication $job_application,Request $request, $id) {
        abort_if(Gate::denies('job_application'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->validate($request, [
            'status' => 'required|integer',
        ]);

        $job_application->where('id', $id)->update(['status' => intval($request->status)]);


        return redirect()->route('jobapplication.index')
                ->with('alert-success','You have successfully updated an application!');
    }

    //method for job application from frontend
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
            $job_application->user_id = Auth::id();
            $job_application->job_id = $request['job_id'];
            $job_application->status = 1; //Applied Status
            $job_application->save();
            return back()->with('success');
        }
    }

    public function download_file(Request $request)
    {
        abort_if(Gate::denies('job_application'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //dd(storage_path('app/public/'));
        $path= $request['path'];
        /**this will force download your file**/
        if($path){
            $file_path = storage_path('app/public/'.$path);
            return response()->download($file_path);
        }

    }

    public function jobAppliedbyStudentUser(Request $request)
    {
        abort_if(Gate::denies('student_applied_jobs'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $jobsapplications = DB::table('job_application')
                ->select('job_application.*', 'jobs.job_title','jobs.company_name', 'jobs.company_address', 'jobs.created_by','users.name')
                ->leftJoin('jobs', 'job_application.job_id', '=', 'jobs.id')
                ->leftJoin('users', 'job_application.user_id', '=', 'users.id')
                ->where('job_application.user_id', '=', Auth::id())
                ->get();
        //dd($jobsapplications);

        return view('jobapplication.appliedlist', compact('jobsapplications'));
    }
}
