<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('job_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $authUserRole = Auth::user()->roles[0]->id;

        $jobs = Job::all();

        if(isset($authUserRole) && $authUserRole != 1) {
                $jobs = $jobs->where('created_by', '==', Auth::id());
        };

        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('job_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $jobcategories = JobCategory::all();
        return view('jobs.create', compact('jobcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobRequest $request)
    {
        abort_if(Gate::denies('job_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $job_expiry_date = date("Y-m-d", strtotime($request->job_expiry_date));

        $validated = $request->validated();
        if($validated) {
            $job = new Job;
            $job->job_title = $request->job_title;
            $job->job_desc = $request->job_desc;
            $job->job_qualification = $request->job_qualification;
            $job->job_experience = $request->job_experience;
            $job->job_expiry_date = $job_expiry_date;
            $job->company_name = $request->company_name;
            $job->company_address = $request->company_address;
            $job->min_salary = $request->min_salary;
            $job->max_salary = $request->max_salary;
            $job->category_id = $request->category_id;
            $job->career_level = $request->career_level;
            $job->job_type = $request->job_type;
            $job->active = 1;
            $job->created_by = Auth::id();
            $job->save();

            return redirect()->route('jobs.index')
                    ->with('alert-success','You have successfully created a job!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('job_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $job = Job::find($id);
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('job_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $job = Job::find($id);
        $jobCategoryById = JobCategory::find($job->category_id);
        $jobcategories = JobCategory::all()
                            ->where('id', '!=', $job->category_id);
        return view('jobs.edit', compact(['job', 'jobcategories', 'jobCategoryById']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        abort_if(Gate::denies('job_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $job_expiry_date = date("Y-m-d", strtotime($request->job_expiry_date));

        $validated = $request->validated();
        if($validated) {
            $job->job_title = $request->job_title;
            $job->job_desc = $request->job_desc;
            $job->job_qualification = $request->job_qualification;
            $job->job_experience = $request->job_experience;
            $job->job_expiry_date = $job_expiry_date;
            $job->company_name = $request->company_name;
            $job->company_address = $request->company_address;
            $job->min_salary = $request->min_salary;
            $job->max_salary = $request->max_salary;
            $job->category_id = $request->category_id;
            $job->career_level = $request->career_level;
            $job->job_type = $request->job_type;
            $job->active = $request->status;
            $job->created_by = Auth::id();
            $job->update();

            return redirect()->route('jobs.index')
                ->with('alert-success','You have successfully updated a job!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        abort_if(Gate::denies('job_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $job->delete();
        //Session::flash('alert-danger', 'Successfully deleted user!');
        return redirect()->route('jobs.index')
                ->with('alert-danger','You have deleted a job!');
    }


    /**
     *Verify the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verifyJob(Job $job, Request $request, $id)
    {
        abort_if(Gate::denies('admin_job_verify'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $job->where('id', $id)->update([
                    'is_verified' => 1,
                    'verified_by' => Auth::id(),
                ]);

        return redirect()->route('jobs.index')
                ->with('alert-success','You have successfully verified a job!');
    }
}
