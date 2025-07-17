@extends('layouts.app')
@section('content')

  <section id="section-hero" class="section-dark text-light no-top no-bottom relative overflow-hidden mh-600 jarallax">
  <img src="{{asset('images/background/3.webp')}}" class="jarallax-img" alt="">
  <div class="gradient-edge-top op-6"></div>
  <div class="abs w-80 bottom-10 z-2 w-100">
    <div class="container">
    <div class="row">
    <div class="col-lg-12">
    <div class="relative overflow-hidden">
      <div class="wow fadeInUpBig" data-wow-duration="1.5s">
      <h1 class="fs-120 text-uppercase fs-sm-10vw mb-2 lh-1">Massage Therapy</h1>
      <h3>Professional Therapeutic Massage & Wellness Treatments</h3>
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
    <div class="subtitle">Starting From</div>
    <h2>$65</h2>
    </div>
    <div class="col-md-8">
    <h3>Our massage therapy services offer professional treatments for relaxation and wellness. From Swedish massage to deep tissue therapy, hot stone treatments to aromatherapy sessions, we provide comprehensive massage care in a tranquil environment.</h3>

    <div class="spacer-single"></div>

    <div class="row g-3">
    <div class="col-md-3 col-6">
      <div class="relative">
      <h4>Duration</h4>
      <div class="d-flex justify-content-start align-items-center">
      <img src="{{asset('images/icons-color/size.png')}}" class="w-40px me-3" alt="">
      <div class="">60-120 min</div>
      </div>
      </div>
    </div>

    <div class="col-md-3 col-6">
      <div class="relative">
      <h4>Services</h4>
      <div class="d-flex justify-content-start align-items-center">
      <img src="{{asset('images/icons-color/bed.png')}}" class="w-40px me-3" alt="">
      <div class="">9 Types</div>
      </div>
      </div>
    </div>

    <div class="col-md-3 col-6">
      <div class="relative">
      <h4>Location</h4>
      <div class="d-flex justify-content-start align-items-center">
      <img src="{{asset('images/icons-color/tile.png')}}" class="w-40px me-3" alt="">
      <div class="">Massage Rooms</div>
      </div>
      </div>
    </div>

    <div class="col-md-3 col-6">
      <div class="relative">
      <h4>Booking</h4>
      <div class="d-flex justify-content-start align-items-center">
      <img src="{{asset('images/icons-color/building.png')}}" class="w-40px me-3" alt="">
      <div class="">Available</div>
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
  <section class="relative p-1 section-dark">
  <div class="container-fluid relative z-2">
    <div class="row g-1">
    <div class="col-md-6">
    <div class="hover overflow-hidden relative text-light text-center wow zoomIn" data-wow-delay=".0s">
    <div class="wow scaleIn overflow-hidden">
      <img src="{{asset('images/apartment/1.jpg')}}" class="hover-scale-1-1 w-100" alt="">
    </div>
    <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
      <a class="btn-main btn-line fx-slide" href="#"><span>Book Now</span></a>
    </div>
    <div class="abs bg-blur z-2 top-0 w-100 h-100 hover-op-1"></div>
    <div class="abs z-2 bottom-0 p-30 w-100 text-center hover-op-0">
      <div class="d-flex justify-content-between align-items-center">
      <h3 class="mb-0">Swedish Massage</h3>
      <div>From $65</div>
      </div>
    </div>
    <div class="gradient-edge-bottom abs w-100 h-40 bottom-0"></div>
    </div>
    </div>

    <div class="col-md-6">
    <div class="hover overflow-hidden relative text-light text-center wow zoomIn" data-wow-delay=".0s">
    <div class="wow scaleIn overflow-hidden">
      <img src="{{asset('images/apartment/2.jpg')}}" class="hover-scale-1-1 w-100" alt="">
    </div>
    <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
      <a class="btn-main btn-line fx-slide" href="#"><span>Book Now</span></a>
    </div>
    <div class="abs bg-blur z-2 top-0 w-100 h-100 hover-op-1"></div>
    <div class="abs z-2 bottom-0 p-30 w-100 text-center hover-op-0">
      <div class="d-flex justify-content-between align-items-center">
      <h3 class="mb-0">Deep Tissue Massage</h3>
      <div>From $85</div>
      </div>
    </div>
    <div class="gradient-edge-bottom abs w-100 h-40 bottom-0"></div>
    </div>
    </div>

    <div class="col-md-6">
    <div class="hover overflow-hidden relative text-light text-center wow zoomIn" data-wow-delay=".0s">
    <div class="wow scaleIn overflow-hidden">
      <img src="{{asset('images/apartment/3.jpg')}}" class="hover-scale-1-1 w-100" alt="">
    </div>
    <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
      <a class="btn-main btn-line fx-slide" href="#"><span>Book Now</span></a>
    </div>
    <div class="abs bg-blur z-2 top-0 w-100 h-100 hover-op-1"></div>
    <div class="abs z-2 bottom-0 p-30 w-100 text-center hover-op-0">
      <div class="d-flex justify-content-between align-items-center">
      <h3 class="mb-0">Hot Stone Massage</h3>
      <div>From $95</div>
      </div>
    </div>
    <div class="gradient-edge-bottom abs w-100 h-40 bottom-0"></div>
    </div>
    </div>

    <div class="col-md-6">
    <div class="hover overflow-hidden relative text-light text-center wow zoomIn" data-wow-delay=".0s">
    <div class="wow scaleIn overflow-hidden">
      <img src="{{asset('images/apartment/4.jpg')}}" class="hover-scale-1-1 w-100" alt="">
    </div>
    <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
      <a class="btn-main btn-line fx-slide" href="#"><span>Book Now</span></a>
    </div>
    <div class="abs bg-blur z-2 top-0 w-100 h-100 hover-op-1"></div>
    <div class="abs z-2 bottom-0 p-30 w-100 text-center hover-op-0">
      <div class="d-flex justify-content-between align-items-center">
      <h3 class="mb-0">Aromatherapy Massage</h3>
      <div>From $75</div>
      </div>
    </div>
    <div class="gradient-edge-bottom abs w-100 h-40 bottom-0"></div>
    </div>
    </div>

    <div class="col-md-6">
    <div class="hover overflow-hidden relative text-light text-center wow zoomIn" data-wow-delay=".0s">
    <div class="wow scaleIn overflow-hidden">
      <img src="{{asset('images/apartment/5.jpg')}}" class="hover-scale-1-1 w-100" alt="">
    </div>
    <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
      <a class="btn-main btn-line fx-slide" href="#"><span>Book Now</span></a>
    </div>
    <div class="abs bg-blur z-2 top-0 w-100 h-100 hover-op-1"></div>
    <div class="abs z-2 bottom-0 p-30 w-100 text-center hover-op-0">
      <div class="d-flex justify-content-between align-items-center">
      <h3 class="mb-0">Sports Massage</h3>
      <div>From $90</div>
      </div>
    </div>
    <div class="gradient-edge-bottom abs w-100 h-40 bottom-0"></div>
    </div>
    </div>

    <div class="col-md-6">
    <div class="hover overflow-hidden relative text-light text-center wow zoomIn" data-wow-delay=".0s">
    <div class="wow scaleIn overflow-hidden">
      <img src="{{asset('images/apartment/6.jpg')}}" class="hover-scale-1-1 w-100" alt="">
    </div>
    <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
      <a class="btn-main btn-line fx-slide" href="#"><span>Book Now</span></a>
    </div>
    <div class="abs bg-blur z-2 top-0 w-100 h-100 hover-op-1"></div>
    <div class="abs z-2 bottom-0 p-30 w-100 text-center hover-op-0">
      <div class="d-flex justify-content-between align-items-center">
      <h3 class="mb-0">Prenatal Massage</h3>
      <div>From $80</div>
      </div>
    </div>
    <div class="gradient-edge-bottom abs w-100 h-40 bottom-0"></div>
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
    <div class="subtitle wow fadeInUp" data-wow-delay=".2s">Services</div>
    <h2 class="wow fadeInUp" data-wow-delay=".4s">Massage Therapy Menu</h2>

    <div class="relative rounded-1 overflow-hidden">
      <div class="d-flex bg-light px-4 py-2">
      <div class="w-60">Swedish Massage</div>
      <div class="w-40 fw-600">$65</div>
      </div>
      <div class="d-flex px-4 py-2">
      <div class="w-60">Deep Tissue Massage</div>
      <div class="w-40 fw-600">$85</div>
      </div>
      <div class="d-flex bg-light px-4 py-2">
      <div class="w-60">Hot Stone Massage</div>
      <div class="w-40 fw-600">$95</div>
      </div>
      <div class="d-flex px-4 py-2">
      <div class="w-60">Aromatherapy Massage</div>
      <div class="w-40 fw-600">$75</div>
      </div>
      <div class="d-flex bg-light px-4 py-2">
      <div class="w-60">Sports Massage</div>
      <div class="w-40 fw-600">$90</div>
      </div>
      <div class="d-flex px-4 py-2">
      <div class="w-60">Prenatal Massage</div>
      <div class="w-40 fw-600">$80</div>
      </div>
      <div class="d-flex bg-light px-4 py-2">
      <div class="w-60">Couples Massage</div>
      <div class="w-40 fw-600">$150</div>
      </div>
      <div class="d-flex px-4 py-2">
      <div class="w-60">Reflexology</div>
      <div class="w-40 fw-600">$70</div>
      </div>
      <div class="d-flex px-4 bg-light py-2">
      <div class="w-60">Chair Massage</div>
      <div class="w-40 fw-600">$45</div>
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
    <div class="subtitle wow fadeInUp" data-wow-delay=".0s">Features</div>
    <h2 class="wow fadeInUp" data-wow-delay=".2s">Premium Massage Therapy Services</h2>
    </div>
    </div>

    <div class="col-lg-6">
    <div class="spacer-single spacer-double"></div>
    <div class="row">
    <div class="col-md-5 wow fadeInUp" data-wow-delay=".2s">
      <ul class="ul-check fs-500 text-dark">
      <li>Professional Equipment</li>
      <li>Sterilized Tools</li>
      <li>Quality Massage Oils</li>
      <li>Licensed Massage Therapists</li>
      <li>Relaxing Environment</li>
      </ul>
    </div>

    <div class="col-md-5 wow fadeInUp" data-wow-delay=".4s">
      <ul class="ul-check fs-500 text-dark">
      <li>Custom Therapy Sessions</li>
      <li>Hot Stone & Aromatherapy</li>
      <li>Pressure Point Therapy</li>
      <li>Full Body Treatments</li>
      <li>Wellness Consultation</li>
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
    <h2 class="wow fadeInUp" data-wow-delay=".2s">Schedule Your Massage Therapy Appointment</h2>
    </div>
    </div>

    <div class="row g-4 gx-5">
    <div class="col-md-4">
    <div class="text-center">
    <img src="{{asset('images/agents/1.webp')}}" class="w-60 circle" alt="">
    <div class="mt-3">
      <h4 class="mb-0">Sarah Johnson</h4>
      <div class="fw-500 id-color">Licensed Massage Therapist</div>
    </div>
    </div>
    </div>

    <div class="col-md-4">
    <div class="text-center">
    <img src="{{asset('images/agents/2.webp')}}" class="w-60 circle" alt="">
    <div class="mt-3">
      <h4 class="mb-0">Maria Garcia</h4>
      <div class="fw-500 id-color">Therapeutic Specialist</div>
    </div>
    </div>
    </div>

    <div class="col-md-4">
    <div class="text-center">
    <img src="{{asset('images/agents/3.webp')}}" class="w-60 circle" alt="">
    <div class="mt-3">
      <h4 class="mb-0">Lisa Chen</h4>
      <div class="fw-500 id-color">Senior Massage Therapist</div>
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
    <h3 class="mb-0 fs-32">Ready to relax and rejuvenate?</h3>
    </div>
    <div class="col-lg-3 text-lg-end">
    <a class="btn-main fx-slide btn-line" href="#"><span>Book Appointment</span></a>
    </div>
    </div>
  </div>
  </section>

@endsection