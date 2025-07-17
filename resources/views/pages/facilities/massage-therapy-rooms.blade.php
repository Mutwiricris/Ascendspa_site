@extends('layouts.app')
@section('content')

  <div id="wrapper">

    <section id="section-hero" class="section-dark text-light no-top no-bottom relative overflow-hidden mh-600 jarallax">
    <img src="{{asset('images/background/7.webp')}}" class="jarallax-img" alt="">
    <div class="gradient-edge-top op-6"></div>
    <div class="abs w-80 bottom-10 z-2 w-100">
      <div class="container">
      <div class="row">
        <div class="col-lg-12">
        <div class="relative overflow-hidden">
          <div class="wow fadeInUpBig" data-wow-duration="1.5s">
          <h1 class="fs-120 text-uppercase fs-sm-10vw mb-2 lh-1">Massage Therapy Rooms</h1>
          <h3>Therapeutic Wellness & Relaxation</h3>
          </div>
        </div>
        </div>
      </div>
      </div>
    </div>
    <div class="sw-overlay op-5"></div>
    </section>

    <section>
    <div class="container">
      <div class="row">
      <div class="col-md-4">
        <div class="subtitle">Service</div>
        <h2>Professional Massage Therapy</h2>
      </div>
      <div class="col-md-8">
        <h3>Experience ultimate relaxation in our private massage therapy rooms. Our certified massage therapists provide personalized treatments designed to relieve stress, tension, and promote overall wellness in serene, tranquil environments.</h3>

        <div class="spacer-single"></div>

        <div class="row g-3">
        <div class="col-md-3 col-6">
          <div class="relative">
          <h4>Rooms</h4>
          <div class="d-flex justify-content-start align-items-center">
            <img src="{{asset('images/icons-color/size.png')}}" class="w-40px me-3" alt="">
            <div class="">4 Private Rooms</div>
          </div>
          </div>
        </div>

        <div class="col-md-3 col-6">
          <div class="relative">
          <h4>Services</h4>
          <div class="d-flex justify-content-start align-items-center">
            <img src="{{asset('images/icons-color/bed.png')}}" class="w-40px me-3" alt="">
            <div class="">Therapeutic</div>
          </div>
          </div>
        </div>

        <div class="col-md-3 col-6">
          <div class="relative">
          <h4>Hours</h4>
          <div class="d-flex justify-content-start align-items-center">
            <img src="{{asset('images/icons-color/tile.png')}}" class="w-40px me-3" alt="">
            <div class="">9AM - 9PM</div>
          </div>
          </div>
        </div>

        <div class="col-md-3 col-6">
          <div class="relative">
          <h4>Experience</h4>
          <div class="d-flex justify-content-start align-items-center">
            <img src="{{asset('images/icons-color/building.png')}}" class="w-40px me-3" alt="">
            <div class="">Licensed Therapists</div>
          </div>
          </div>
        </div>
        </div>
      </div>
      </div>
    </div>
    </section>

    <section class="pt-0 overflow-hidden">

    <div class="container-fluid">
      <div class="row">
      <div class="col-lg-12">
        <div class="owl-custom-nav menu-float" data-target="#massage-carousel">
        <a class="btn-next"></a>
        <a class="btn-prev"></a>

        <div id="massage-carousel" class="owl-2-cols-center owl-carousel owl-theme">
          <!-- item begin -->
          <div class="item">
          <div class="relative">
            <div class="overflow-hidden">
            <img src="{{asset('images/gallery/l1.webp')}}" class="w-100" alt="">
            </div>
          </div>
          </div>
          <!-- item end -->

          <!-- item begin -->
          <div class="item">
          <div class="relative">
            <div class="overflow-hidden">
            <img src="{{asset('images/gallery/l2.webp')}}" class="w-100" alt="">
            </div>
          </div>
          </div>
          <!-- item end -->

          <!-- item begin -->
          <div class="item">
          <div class="relative">
            <div class="overflow-hidden">
            <img src="{{asset('images/gallery/l3.webp')}}" class="w-100" alt="">
            </div>
          </div>
          </div>
          <!-- item end -->

          <!-- item begin -->
          <div class="item">
          <div class="relative">
            <div class="overflow-hidden">
            <img src="{{asset('images/gallery/l4.webp')}}" class="w-100" alt="">
            </div>
          </div>
          </div>
          <!-- item end -->

          <!-- item begin -->
          <div class="item">
          <div class="relative">
            <div class="overflow-hidden">
            <img src="{{asset('images/gallery/l5.webp')}}" class="w-100" alt="">
            </div>
          </div>
          </div>
          <!-- item end -->

        </div>
        </div>
      </div>
      </div>
    </div>

    </section>

    <section id="section-services">
    <div class="container">
      <div class="row g-4 align-items-center">
      <div class="col-lg-4">
        <div class="pe-lg-3">
        <div class="subtitle wow fadeInUp" data-wow-delay=".2s">Massage Therapy</div>
        <h2 class="wow fadeInUp" data-wow-delay=".4s">Treatment Menu</h2>

        <div class="relative rounded-1 overflow-hidden">
          <div class="d-flex bg-light px-4 py-2">
          <div class="w-60">Swedish Massage (60min)</div>
          <div class="w-40 fw-600">$90</div>
          </div>
          <div class="d-flex px-4 py-2">
          <div class="w-60">Deep Tissue (60min)</div>
          <div class="w-40 fw-600">$110</div>
          </div>
          <div class="d-flex bg-light px-4 py-2">
          <div class="w-60">Hot Stone (90min)</div>
          <div class="w-40 fw-600">$140</div>
          </div>
          <div class="d-flex px-4 py-2">
          <div class="w-60">Aromatherapy (60min)</div>
          <div class="w-40 fw-600">$100</div>
          </div>
          <div class="d-flex bg-light px-4 py-2">
          <div class="w-60">Prenatal Massage (60min)</div>
          <div class="w-40 fw-600">$95</div>
          </div>
          <div class="d-flex px-4 py-2">
          <div class="w-60">Sports Massage (60min)</div>
          <div class="w-40 fw-600">$115</div>
          </div>
          <div class="d-flex bg-light px-4 py-2">
          <div class="w-60">Couples Massage (60min)</div>
          <div class="w-40 fw-600">$200</div>
          </div>
          <div class="d-flex px-4 py-2">
          <div class="w-60">Chair Massage (30min)</div>
          <div class="w-40 fw-600">$50</div>
          </div>
        </div>
        </div>
      </div>

      <div class="col-lg-8">
        <img src="{{asset('images/misc/floorplan-2.webp')}}" class="w-100 wow fadeInUp" data-wow-delay=".2s" alt="">
      </div>
      </div>
    </div>
    </section>

    <section class="overlay-dark-1">
    <div class="container">
      <div class="row g-4 justify-content-between">
      <div class="col-lg-4 relative z-3">
        <div class="me-lg-3">
        <div class="subtitle wow fadeInUp" data-wow-delay=".0s">Room Features</div>
        <h2 class="wow fadeInUp" data-wow-delay=".2s">Therapeutic Environment</h2>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="spacer-single spacer-double"></div>
        <div class="row">
        <div class="col-md-5 wow fadeInUp" data-wow-delay=".2s">
          <ul class="ul-check fs-500 text-dark">
          <li>Professional Massage Tables</li>
          <li>Heated Rooms</li>
          <li>Premium Oils & Lotions</li>
          <li>Soft Ambient Lighting</li>
          <li>Sound Therapy Systems</li>
          </ul>
        </div>

        <div class="col-md-5 wow fadeInUp" data-wow-delay=".4s">
          <ul class="ul-check fs-500 text-dark">
          <li>Private Changing Areas</li>
          <li>Aromatherapy Diffusers</li>
          <li>Temperature Control</li>
          <li>Relaxation Music</li>
          <li>Hygienic Standards</li>
          </ul>
        </div>
        </div>
      </div>
      </div>
    </div>
    </section>

    <section id="contact" class="relative">

    <div class="container relative z-2">
      <div class="row g-4 justify-content-center">
      <div class="col-lg-6 text-center">
        <div class="subtitle s2 mb-3 wow fadeInUp" data-wow-delay=".0s">Book Now</div>
        <h2 class="wow fadeInUp" data-wow-delay=".2s">Schedule Your Massage</h2>
      </div>
      </div>

      <div class="row g-4 gx-5">
      <div class="col-md-4">
        <div class="text-center">
        <img src="{{asset('images/agents/1.webp')}}" class="w-60 circle" alt="">

        <div class="mt-3">
          <h4 class="mb-0">David Johnson</h4>
          <div class="fw-500 id-color">Licensed Massage Therapist</div>
          <div class="fw-500 id-color">(555) 234-5678</div>
        </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="text-center">
        <img src="{{asset('images/agents/2.webp')}}" class="w-60 circle" alt="">

        <div class="mt-3">
          <h4 class="mb-0">Rachel Green</h4>
          <div class="fw-500 id-color">Deep Tissue Specialist</div>
          <div class="fw-500 id-color">(555) 345-6789</div>
        </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="text-center">
        <img src="{{asset('images/agents/3.webp')}}" class="w-60 circle" alt="">

        <div class="mt-3">
          <h4 class="mb-0">Michael Lee</h4>
          <div class="fw-500 id-color">Sports Massage Expert</div>
          <div class="fw-500 id-color">(555) 567-8901</div>
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
        <h3 class="mb-0 fs-32">Ready for ultimate relaxation?</h3>
      </div>
      <div class="col-lg-3 text-lg-end">
        <a class="btn-main fx-slide btn-line" href="{{route('contact')}}"><span>Book Massage</span></a>
      </div>
      </div>
    </div>
    </section>

  </div>

@endsection