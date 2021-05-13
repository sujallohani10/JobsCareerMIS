@extends('frontend.layouts.app')
@section('main-content')

    <section class="container job-detail">
        <div class="joblisting">
            <div class="job-list border-bottom">
                <div class="job-list-details">
                    <div class="job-list-info">
                        <div class="job-list-title">
                            <h5 class="mb-0"><a href="#">{{$job->job_title}}</a></h5>
                            <span class="job-type">{{$job->job_type}}</span>
                        </div>
                        <div class="job-list-option">
                            <ul class="list-unstyled">
                                <li> <span class="mr-1">via</span> <a href="#">{{ $job->company_name }}</a>
                                </li>
                                <li><i class="ri-map-pin-fill icon-size"></i>{{$job->company_address}}</li>
                                <li><i class="ri-filter-2-fill icon-size"></i>{{$job->jobcategories->category_name}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="job-list-favourite-time d-flex justify-content-between">
                    <span class="job-list-time">
                        <i class="ri-time-fill icon-size"></i>
                        {{ $job->created_at->diffForHumans() }}
                    </span>
                    <div>
                        <button type="button" class="btn btn-primary btn-sm d-flex"><i class="ri-send-plane-fill mr-1"></i>Apply for job</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="border px-2 py-4 mt-4 mt-lg-5">
            <div class="row">
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="d-flex">
                        <i class="ri-money-dollar-circle-fill font-xll"></i>
                        <div class="feature-info-content pl-3">
                            <label class="mb-1">Offered Salary</label>
                            <span class="mb-0 font-weight-bold d-block text-dark">AUD {{$job->min_salary}} - AUD {{$job->max_salary}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="d-flex">
                        <i class="ri-calendar-fill font-xll"></i>
                        <div class="feature-info-content pl-3">
                            <label class="mb-1">Expired on</label>
                            <span class="mb-0 font-weight-bold d-block text-dark">{{ \Carbon\Carbon::parse($job->job_expiry_date)->toFormattedDateString() }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="d-flex">
                        <i class="ri-bar-chart-fill font-xll"></i>
                        <div class="feature-info-content pl-3">
                            <label class="mb-1">Career Level</label>
                            <span class="mb-0 font-weight-bold d-block text-dark">{{$job->career_level}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-md-0 mb-4">
                    <div class="d-flex">
                        <i class="ri-building-3-fill font-xll"></i>
                        <div class="feature-info-content pl-3">
                            <label class="mb-1">Industry</label>
                            <span class="mb-0 font-weight-bold d-block text-dark">{{$job->jobcategories->category_name}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-sm-0 mb-4">
                    <div class="d-flex">
                        <i class="ri-award-fill font-xll"></i>
                        <div class="feature-info-content pl-3">
                            <label class="mb-1">Experience</label>
                            <span class="mb-0 font-weight-bold d-block text-dark">{{$job->job_experience}} Years</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex">
                        <i class="ri-book-read-fill font-xll"></i>
                        <div class="feature-info-content pl-3">
                            <label class="mb-1">Qualification</label>
                            <span class="mb-0 font-weight-bold d-block text-dark">{{$job->job_qualification}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="my-4 my-lg-5">
            <h5 class="mb-3 mb-md-4 text-dark font-weight-bold">Job Description</h5>

            <p>{!! $job->job_desc !!}</p>
        </div>
    </section>

@endsection
