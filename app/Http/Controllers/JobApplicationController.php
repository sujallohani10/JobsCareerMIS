<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
{
    public function apply(Request $request)
    {
        //dd('sdfsfd');

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
            $job_application->save();
            return back()->with('success');
        }


    }
}
