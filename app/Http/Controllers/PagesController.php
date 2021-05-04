<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\Home;
use App\Models\Team;
use App\Models\Service;
use App\Models\Contact;
use App\Models\About;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function home() {
        $home = [];
        $services = [];
        $teams = [];
        $contact = [];
        $faqs = [];
        $about = [];
        $testimonials = [];
        // dd($about);

        return view('frontend.pages.home')->with(compact('home', 'services', 'teams', 'contact', 'faqs', 'about', 'testimonials'));
    }

    public function services() {
        return view('frontend.pages.services');
    }

    public function jobDetail()
    {
        return view('frontend.pages.job-detail');
    }
}
