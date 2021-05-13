@extends('frontend.layouts.app')
@section('main-content')

    <!-- ======= Hero Section ======= -->
    {{-- @if ($home->isNotEmpty()) --}}
    <section id="hero" class="d-flex align-items-center">

        <div class="container-fluid position-absolute" data-aos="zoom-out" data-aos-delay="100">
            <img src="https://www.julianabicycles.com/jfiles/styles/scb_natural_1440_auto/public/hero/my21_hero_roubion.jpg?itok=N-48OuC6"
                alt="">
            <div class="row justify-content-center">

            </div>
        </div>

    </section><!-- End Hero -->
    {{-- @endif --}}

    <main id="main" class="container">
        <div class="joblisting my-5">
            <div class="row">
                @foreach ($jobs as $job )
                    <div class="col-12">
                        <div class="job-list border-bottom">
                            <div class="job-list-details">
                                <div class="job-list-info">
                                    <div class="job-list-title">
                                        <h5 class="mb-0"><a href="{{ url('job-detail/'.$job->id) }}">{{ $job->job_title }}</a></h5>
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
                            <div class="job-list-favourite-time">
                                <span class="job-list-time">
                                    <i class="ri-time-fill icon-size"></i>
                                    {{ $job->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main><!-- End #main -->

@endsection
