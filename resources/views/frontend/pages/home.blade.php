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
                <div class="col-12">
                    <div class="job-list border-bottom">
                        <div class="job-list-details">
                            <div class="job-list-info">
                                <div class="job-list-title">
                                    <h5 class="mb-0"><a href="{{ url('job-detail') }}">Network Support Engineer</a></h5>
                                    <span class="job-type">Full-Time</span>
                                </div>
                                <div class="job-list-option">
                                    <ul class="list-unstyled">
                                        <li> <span class="mr-1"></span> <a href="employer-detail.html">Computer Networking</a>
                                        </li>
                                        <li><i class="ri-map-pin-fill icon-size"></i>Sydney CBD, 7054</li>
                                        <li><i class="ri-filter-2-fill icon-size"></i>Computer Networking</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="job-list-favourite-time">
                            <span class="job-list-time">
                                <i class="ri-time-fill icon-size"></i>
                                1M ago
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="job-list border-bottom">
                        <div class="job-list-details">
                            <div class="job-list-info">
                                <div class="job-list-title">
                                    <h5 class="mb-0"><a href="{{ url('job-detail') }}">Client Services & Administration Assistant</a></h5>
                                    <span class="job-type">Full-Time</span>
                                </div>
                                <div class="job-list-option">
                                    <ul class="list-unstyled">
                                        <li> <span class="mr-1">via</span> <a href="employer-detail.html">Toon Boom Harmony courses</a>
                                        </li>
                                        <li><i class="ri-map-pin-fill icon-size"></i>Parsippany, NJ 07054</li>
                                        <li><i class="ri-filter-2-fill icon-size"></i>Administration & Office Support</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="job-list-favourite-time">
                            <span class="job-list-time">
                                <i class="ri-time-fill icon-size"></i>
                                1H ago
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="job-list border-bottom">
                        <div class="job-list-details">
                            <div class="job-list-info">
                                <div class="job-list-title">
                                    <h5 class="mb-0"><a href="{{ url('job-detail') }}">Part Time Accounts Payable Officer</a></h5>
                                    <span class="job-type">Part-Time</span>
                                </div>
                                <div class="job-list-option">
                                    <ul class="list-unstyled">
                                        <li> <span class="mr-1">via</span> <a href="employer-detail.html">Toon Boom Harmony courses</a>
                                        </li>
                                        <li><i class="ri-map-pin-fill icon-size"></i>Parsippany, NJ 07054</li>
                                        <li><i class="ri-filter-2-fill icon-size"></i>Accounting</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="job-list-favourite-time">
                            <span class="job-list-time">
                                <i class="ri-time-fill icon-size"></i>
                                20H ago
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="job-list border-bottom">
                        <div class="job-list-details">
                            <div class="job-list-info">
                                <div class="job-list-title">
                                    <h5 class="mb-0"><a href="{{ url('job-detail') }}">Human Resource Manager</a></h5>
                                    <span class="job-type">Full-Time</span>
                                </div>
                                <div class="job-list-option">
                                    <ul class="list-unstyled">
                                        <li> <span class="mr-1">via</span> <a href="employer-detail.html">Toon Boom Harmony courses</a>
                                        </li>
                                        <li><i class="ri-map-pin-fill icon-size"></i>South West & M5 Corridor</li>
                                        <li><i class="ri-filter-2-fill icon-size"></i>Accountancy</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="job-list-favourite-time">
                            <span class="job-list-time">
                                <i class="ri-time-fill icon-size"></i>
                                22H ago
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="job-list border-bottom">
                        <div class="job-list-details">
                            <div class="job-list-info">
                                <div class="job-list-title">
                                    <h5 class="mb-0"><a href="{{ url('job-detail') }}">Customer Service Officer</a></h5>
                                    <span class="job-type">Full-Time</span>
                                </div>
                                <div class="job-list-option">
                                    <ul class="list-unstyled">
                                        <li> <span class="mr-1">via</span> <a href="employer-detail.html">Toon Boom Harmony courses</a>
                                        </li>
                                        <li><i class="ri-map-pin-fill icon-size"></i>Parramatta & Western Suburbs</li>
                                        <li><i class="ri-filter-2-fill icon-size"></i>Administration & Office Support</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="job-list-favourite-time">
                            <span class="job-list-time">
                                <i class="ri-time-fill icon-size"></i>
                                1D ago
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="job-list border-bottom">
                        <div class="job-list-details">
                            <div class="job-list-info">
                                <div class="job-list-title">
                                    <h5 class="mb-0"><a href="{{ url('job-detail') }}">Sales Representative</a></h5>
                                    <span class="job-type">Part-Time</span>
                                </div>
                                <div class="job-list-option">
                                    <ul class="list-unstyled">
                                        <li> <span class="mr-1">via</span> <a href="employer-detail.html">Toon Boom Harmony courses</a>
                                        </li>
                                        <li><i class="ri-map-pin-fill icon-size"></i>CBD, Inner West & Eastern Suburbs</li>
                                        <li><i class="ri-filter-2-fill icon-size"></i>Sales</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="job-list-favourite-time">
                            <span class="job-list-time">
                                <i class="ri-time-fill icon-size"></i>
                                2d ago
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="job-list border-bottom">
                        <div class="job-list-details">
                            <div class="job-list-info">
                                <div class="job-list-title">
                                    <h5 class="mb-0"><a href="{{ url('job-detail') }}">Data Entry</a></h5>
                                    <span class="job-type">Casual</span>
                                </div>
                                <div class="job-list-option">
                                    <ul class="list-unstyled">
                                        <li> <span class="mr-1">via</span> <a href="employer-detail.html">Data</a>
                                        </li>
                                        <li><i class="ri-map-pin-fill icon-size"></i>Ryde & Macquarie Park</li>
                                        <li><i class="ri-filter-2-fill icon-size"></i>Administration & Office Support</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="job-list-favourite-time">
                            <span class="job-list-time">
                                <i class="ri-time-fill icon-size"></i>
                                3D ago
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main><!-- End #main -->

@endsection
