<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-xl-10 d-flex align-items-center">
          <h1 class="logo mr-auto"><a href="{{ url('/') }}">JobsCareer<span>.</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->

          <nav class="nav-menu d-none d-lg-block">
            <ul>
              <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
              <li class="{{ (request()->is('about')) ? 'active' : '' }}"><a href="{{ url('/about') }}">About</a></li>
              <li class="{{ (request()->is('contact')) ? 'active' : '' }}"><a href="{{ url('/contact') }}">Contact</a></li>
              {{-- <li class="drop-down"><a href="">Drop Down</a>
                <ul>
                  <li><a href="#">Drop Down 1</a></li>
                  <li class="drop-down"><a href="#">Deep Drop Down</a>
                    <ul>
                      <li><a href="#">Deep Drop Down 1</a></li>
                      <li><a href="#">Deep Drop Down 2</a></li>
                      <li><a href="#">Deep Drop Down 3</a></li>
                      <li><a href="#">Deep Drop Down 4</a></li>
                      <li><a href="#">Deep Drop Down 5</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Drop Down 2</a></li>
                  <li><a href="#">Drop Down 3</a></li>
                  <li><a href="#">Drop Down 4</a></li>
                </ul>
              </li> --}}
              <li class="{{ (request()->is('forum')) ? 'active' : '' }}"><a href={{ url('/forum') }}>Forum</a></li>
            </ul>
          </nav><!-- .nav-menu -->


          @if (!Auth::id())
                <a href="{{ url('/login') }}" class="get-started-btn scrollto">Login</a>
                <a href="{{ url('/register') }}" class="get-started-btn scrollto">Register</a>
            @else
                <a href="{{ url('/dashboard') }}" class="btn btn-primary get-started-btn">My Dashboard</a>
          @endif
        </div>
      </div>

    </div>
  </header>
  <!-- End Header -->
