<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobCategory;
use App\Http\Requests\StoreJobCategoryRequest;
use App\Http\Requests\UpdateJobCategoryRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class JobCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('job_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = JobCategory::all();

        return view('jobcategory.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('job_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('jobcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobCategoryRequest $request)
    {
        JobCategory::create($request->validated());

        return redirect()->route('jobcategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('job_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $category = JobCategory::find($id);
        return view('jobcategory.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('job_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $category = JobCategory::find($id);
        return view('jobcategory.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateJobCategoryRequest $request)
    {
        JobCategory::where('id', $id)->update($request->validated());

        return redirect()->route('jobcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobCategory $Categories, $id)
    {
        abort_if(Gate::denies('job_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $Categories = JobCategory::find($id);
        $Categories->delete();

        return redirect()->route('jobcategory.index');
    }
}
