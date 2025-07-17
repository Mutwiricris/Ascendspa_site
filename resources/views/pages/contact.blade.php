@extends('layouts.app')
@section('content')

<div id="wrapper">

    <section id="section-hero" class="section-dark text-light no-top no-bottom relative overflow-hidden mh-600 jarallax">
        <img src="{{asset('images/background/3.webp')}}" class="jarallax-img" alt="">
        <div class="gradient-edge-top op-6"></div>
        <div class="abs w-80 bottom-10 z-2 w-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="relative overflow-hidden">
                            <div class="wow fadeInUpBig" data-wow-duration="1.5s">
                                <h1 class="fs-120 text-uppercase fs-sm-10vw mb-2 lh-1">Contact Us</h1>
                                <h3>Book Your Appointment Today</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sw-overlay op-5"></div>
    </section>

    <section id="contact" class="relative">
        <div class="container relative z-2">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="subtitle s2 mb-3 wow fadeInUp" data-wow-delay=".0s">Get In Touch</div>
                    <h2 class="wow fadeInUp" data-wow-delay=".2s">Ready to Book Your Service?</h2>
                </div>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-lg-8">
                    <div class="spacer-single"></div>
                    <p class="text-center">Contact us to schedule an appointment or for any inquiries about our services. We're here to help you look and feel your best.</p>
                </div>
            </div>

            <div class="row g-4 mt-4">
                <div class="col-lg-4 col-md-6 mb-sm-30">
                    <div class="d-flex justify-content-center">
                        <i class="fs-60 id-color icon_phone"></i>
                        <div class="ms-3">
                            <h4 class="mb-0">Call Us</h4>
                            <p>Call: +1 (555) SPA-LIFE</p>
                            <p>Text: +1 (555) 772-5433</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-sm-30">
                    <div class="d-flex justify-content-center">
                        <i class="fs-60 id-color icon_clock"></i>
                        <div class="ms-3">
                            <h4 class="mb-0">Opening Hours</h4>
                            <p>Monday - Saturday: 08:00 - 22:00</p>
                            <p>Sunday: 10:00 - 20:00</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-sm-30">
                    <div class="d-flex justify-content-center">
                        <i class="fs-60 id-color icon_mail"></i>
                        <div class="ms-3">
                            <h4 class="mb-0">Email Us</h4>
                            <p>info@wellnessspahub.com</p>
                            <p>appointments@wellnessspahub.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-8">
                    <h3 class="text-center mb-4">Our Locations</h3>
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="bg-white p-4 rounded">
                                <h4>Chuna Mall Location</h4>
                                <p><strong>Address:</strong><br>
                                Chuna Mall, Ground Floor<br>
                                Beauty & Wellness Wing<br>
                                Suite 15-18</p>
                                <p><strong>Phone:</strong> +1 (555) 772-5433</p>
                                <p><strong>Services:</strong> Full service location offering all treatments</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="bg-white p-4 rounded">
                                <h4>OBC Center Branch</h4>
                                <p><strong>Address:</strong><br>
                                OBC Center, 2nd Floor<br>
                                Premium Beauty Plaza<br>
                                Units 25-28</p>
                                <p><strong>Phone:</strong> +1 (555) 772-5434</p>
                                <p><strong>Services:</strong> Complete beauty hub with specialized treatments</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-color section-dark text-light pt-50 pb-50">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-9">
                    <h3 class="mb-0 fs-32">Ready to experience ultimate wellness?</h3>
                </div>
                <div class="col-lg-3 text-lg-end">
                    <a class="btn-main fx-slide btn-line" href="tel:+15557725433"><span>Call Now</span></a>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection