@extends('frontend.layouts.app')
@section('main-content')
    <section>
        <section class="space-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title">
                                    <h2 class="title"><span>Let’s Get In Touch!</span></h2>
                                </div>
                            </div>
                        </div>
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="Username" placeholder="Enter Your Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="email" placeholder="Subject">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="Password"
                                        placeholder="Enter Your Email Address">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="phone"
                                        placeholder="Enter Your Phone Number">
                                </div>
                                <div class="form-group col-12 mb-0">
                                    <textarea rows="5" class="form-control" id="sector" placeholder="Subject"></textarea>
                                </div>
                                <div class="col-12 mt-4">
                                    <a class="btn btn-primary" href="#">Send your message</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-6 mt-4 mt-xl-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title">
                                    <h2 class="title"><span>Contact information</span></h2>
                                    <p>How can we motivate ourselves? One of the most difficult aspects of achieving success
                                        is staying motivated over the long haul.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="border d-flex align-items-center p-4">
                                    <i class="ri-map-2-line mr-3 fa-3x"></i>
                                    <div>
                                        <h5 class="mb-2">Address</h5>
                                        <span class="d-block">25-29 Wilga Street </span>
                                        <span>Sydney, Australia</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="border d-flex align-items-center p-4">
                                    <i class="ri-phone-line mr-3 fa-3x"></i>
                                    <div>
                                        <h5 class="mb-2">Phone Number</h5>
                                        <span class="d-block">(+61) 445-6329</span>
                                        <span>(+61) 465-6223</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4 mb-md-0">
                                <div class="border d-flex align-items-center p-4">
                                    <i class="ri-mail-line mr-3 fa-3x"></i>
                                    <div>
                                        <h5 class="mb-2">Email</h5>
                                        <span class="d-block">support@jobcareer.com</span>
                                        <span>gethelp@jobcareer.com</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border d-flex align-items-center p-4">
                                    <i class="ri-red-packet-line mr-3 fa-3x"></i>
                                    <div>
                                        <h5 class="mb-2">Fax</h5>
                                        <span class="d-block">(54) 325-6689</span>
                                        <span>(54) 478-2589</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="space-pb ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="feature-info-02 text-left p-4 border">
                            <div class="feature-info-icon">
                                <i class="flaticon-hand-shake"></i>
                            </div>
                            <div class="feature-info-content pl-0 pl-sm-3">
                                <h5 class="title text-dark">Chat To Us Online</h5>
                                <p class="mb-0">Chat to us online if you have any question.</p>
                                <a class="mt-2 mb-0 d-block" href="#">Click here to open chat</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="feature-info-02 text-left p-4 border">
                            <div class="feature-info-icon">
                                <i class="flaticon-profiles"></i>
                            </div>
                            <div class="feature-info-content pl-0 pl-sm-3">
                                <h5>Call Us</h5>
                                <p class="mb-0">Our support agent will work with you to meet your lending.</p>
                                <h5 class="mt-2 mb-0">(123) 345-6789</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="feature-info-02 text-left p-4 border">
                            <div class="feature-info-icon">
                                <i class="flaticon-conversation-1"></i>
                            </div>
                            <div class="feature-info-content pl-0 pl-sm-3">
                                <h5>Read our latest news</h5>
                                <p class="mb-0">Visit our Blog page and know more about news.</p>
                                <a class="mt-2 mb-0 d-block" href="#">Read Blog post </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
