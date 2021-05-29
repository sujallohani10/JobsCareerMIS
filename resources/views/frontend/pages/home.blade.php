@extends('frontend.layouts.app')
@section('main-content')

    <!-- ======= Hero Section ======= -->
    {{-- @if ($home->isNotEmpty()) --}}
    <section id="hero" class="d-flex align-items-center">

        <div class="container-fluid position-absolute" data-aos="zoom-out" data-aos-delay="100">
            <img src="{{ url('assets/img/home.jpg') }}" alt="homepage">
        </div>

        <div class="row justify-content-center container-fluid">
            <div class="tab-pane fade show active find-job" id="find-job" role="tabpanel" aria-labelledby="find-job-tab">
                <h6 class="font-weight-bold mb-3">Find A Job</h6>
                <form class="form-inline" action="{{ route('job.search') }}" method="GET">
                    @csrf
                  <div class="row w-100">
                    <div class="col-lg-4 col-sm-4">
                      <div class="input-group">
                        <input type="text" class="form-control" name="name" placeholder="Job name" value="{{ $search }}">
                      </div>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                      <div class="input-group">
                        <select name="category" class="form-control basic-select select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                          {{-- <option data-select2-id="3">Job Catogery</option> --}}
                            <option selected>Choose...</option>
                          @foreach ($JobCategories as $JobCategory)
                            <option value="{{ $JobCategory->id }}">{{ $JobCategory->category_name }}</option>
                          @endforeach
                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: 250px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-f8v4-container"><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                      </div>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                    <button type="submit" class="find-a-job-btn">Search</button>
                    </div>
                  </div>
                </form>
              </div>
        </div>

    </section><!-- End Hero -->
    {{-- @endif --}}

    <main id="main" class="container">
        <div class="joblisting my-5">
            @if ($search)
            <div class="mb-2 ml-2">
                Search keyword(s): {{ $search }}
            </div>
            @endif
            <div class="row">
                @if ($jobs->isEmpty())
                <div class="ml-auto mr-auto my-3">
                    No Jobs found for '{{ $search }}'.
                    Please search for another keyword.
                </div>
                @endif
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
