@extends('frontend.layouts.app')
@section('main-content')

    <!-- ======= Hero Section ======= -->
    {{-- @if ($home->isNotEmpty()) --}}
        <section id="hero" class="d-flex align-items-center">

            <div class="container-fluid position-absolute" data-aos="zoom-out" data-aos-delay="100">
                <img src="https://www.julianabicycles.com/jfiles/styles/scb_natural_1440_auto/public/hero/my21_hero_roubion.jpg?itok=N-48OuC6" alt="">
                <div class="row justify-content-center">

                </div>
            </div>

        </section><!-- End Hero -->
    {{-- @endif --}}

    <main id="main" class="container">
        <div class=" joblisting">
            <h2>Job Title 1</h2>
            <span class="badge badge-primary">Posted: 2 days ago</span>

            <h2>Job Title 2</h2>
            <span class="badge badge-secondary">Posted: 5 days ago</span>

            <h2>Job Title 3</h2>
            <span class="badge badge-success">Posted: 10 days ago</span>

        </div>
    </main><!-- End #main -->

@endsection
