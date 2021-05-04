@extends('frontend.layouts.app')
@section('main-content')

    <section class="container job-detail">
        <div class="joblisting">
            <div class="job-list border-bottom">
                <div class="job-list-details">
                    <div class="job-list-info">
                        <div class="job-list-title">
                            <h5 class="mb-0"><a href="{{ url('job-detail') }}">Toon Boom Harmony courses</a></h5>
                            <span class="job-type">Freelance</span>
                        </div>
                        <div class="job-list-option">
                            <ul class="list-unstyled">
                                <li> <span class="mr-1">via</span> <a href="employer-detail.html">Toon Boom Harmony
                                        courses</a>
                                </li>
                                <li><i class="ri-map-pin-fill icon-size"></i>Parsippany, NJ 07054</li>
                                <li><i class="ri-filter-2-fill icon-size"></i>Accountancy</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="job-list-favourite-time d-flex justify-content-between">
                    <span class="job-list-time">
                        <i class="ri-time-fill icon-size"></i>
                        1M ago
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
                            <span class="mb-0 font-weight-bold d-block text-dark">£15,000 - £20,000</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="d-flex">
                        <i class="ri-women-fill font-xll"></i>
                        <div class="feature-info-content pl-3">
                            <label class="mb-1">Gender</label>
                            <span class="mb-0 font-weight-bold d-block text-dark">Female</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="d-flex">
                        <i class="ri-bar-chart-fill font-xll"></i>
                        <div class="feature-info-content pl-3">
                            <label class="mb-1">Career Level</label>
                            <span class="mb-0 font-weight-bold d-block text-dark">Executive</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-md-0 mb-4">
                    <div class="d-flex">
                        <i class="ri-building-3-fill font-xll"></i>
                        <div class="feature-info-content pl-3">
                            <label class="mb-1">Industry</label>
                            <span class="mb-0 font-weight-bold d-block text-dark">Management</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-sm-0 mb-4">
                    <div class="d-flex">
                        <i class="ri-award-fill font-xll"></i>
                        <div class="feature-info-content pl-3">
                            <label class="mb-1">Experience</label>
                            <span class="mb-0 font-weight-bold d-block text-dark">2 Years</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex">
                        <i class="ri-book-read-fill font-xll"></i>
                        <div class="feature-info-content pl-3">
                            <label class="mb-1">Qualification</label>
                            <span class="mb-0 font-weight-bold d-block text-dark">Bachelor Degree</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="my-4 my-lg-5">
            <h5 class="mb-3 mb-md-4 text-dark font-weight-bold">Job Description</h5>
            <p>One of the main areas that I work on with my clients is shedding these non-supportive beliefs and replacing
                them with beliefs that will help them to accomplish their desires.</p>
            <p class="font-italic">It is truly amazing the damage that we, as parents, can inflict on our children. So why
                do we do it? For the most part, we don’t do it intentionally or with malice. In the majority of cases, the
                cause is a well-meaning but unskilled or un-thinking parent, who says the wrong thing at the wrong time, and
                the message sticks – as simple as that!</p>
        </div>

        <hr />

        <div class="my-4 my-lg-5">
            <h5 class="mb-3 mb-md-4 text-dark font-weight-bold">Required Knowledge, Skills, and Abilities</h5>
            <ul class="list-unstyled list-style">
                <li><i class="ri-check-fill mr-2"></i></i>Commitment – understanding the price and
                    having the willingness to pay that price</li>
                <li><i class="ri-check-fill mr-2"></i></i>Belief – believing in yourself and those
                    around you</li>
                <li><i class="ri-check-fill mr-2"></i></i>Taking action – practice Ready, Fire, Aim…
                </li>
                <li><i class="ri-check-fill mr-2"></i></i>You will drift aimlessly until you arrive
                    back at the original dock</li>
                <li class="mb-0"><i class="ri-check-fill mr-2"></i></i>You will run aground and
                    become hopelessly stuck in the mud</li>
            </ul>
        </div>

        <hr />

        <div class="mt-4 mt-lg-5">
            <h5 class="mb-3 mb-md-4 font-weight-bold">Education + Experience</h5>
            <ul class="list-unstyled list-style mb-4 mb-lg-0">
                <li><i class="ri-check-fill mr-2"></i></i>You will sail along until you collide with
                    an immovable object, after which you will sink to the bottom</li>
                <li><i class="ri-check-fill mr-2"></i></i>Clarity – developing the Vision</li>
                <li><i class="ri-check-fill mr-2"></i></i>Focus – having a plan</li>
                <li><i class="ri-check-fill mr-2"></i></i>Give yourself the power of responsibility.
                    Remind yourself the only thing stopping you is yourself.</li>
                <li><i class="ri-check-fill mr-2"></i></i>Do it today. Remind yourself of someone you
                    know who died suddenly and the fact that there is no guarantee that tomorrow will come.</li>
                <li><i class="ri-check-fill mr-2"></i></i>Now go push your own limits and succeed!
                </li>
                <li><i class="ri-check-fill mr-2"></i></i>Let success motivate you. Find a picture of
                    what epitomizes success to you and then pull it out when you are in need of motivation.</li>
                <li><i class="ri-check-fill mr-2"></i></i>Belief – believing in yourself and those
                    around you</li>
                <li class="mb-0"><i class="ri-check-fill mr-2"></i></i>So, make the decision to move
                    forward. Commit your decision to paper, just to bring it into focus. Then, go for it!</li>
            </ul>
        </div>
    </section>

@endsection
