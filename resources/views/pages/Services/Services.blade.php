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
          <h1 class="fs-120 text-uppercase fs-sm-10vw mb-2 lh-1">Services</h1>
          <h3>Wellness & Spa Treatments</h3>
        </div>
        </div>
      </div>
      </div>
    </div>
    </div>
    <div class="sw-overlay op-5"></div>
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
        <a class="btn-main btn-line fx-slide" href="{{ route('services.massage') }}"><span>Book Now</span></a>
        </div>
        <div class="abs bg-blur z-2 top-0 w-100 h-100 hover-op-1"></div>
        <div class="abs z-2 bottom-0 p-30 w-100 text-center hover-op-0">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="mb-0">Massage Therapy</h3>
          <div>From $85</div>
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
        <a class="btn-main btn-line fx-slide" href="{{ route('services.spa') }}"><span>Book Now</span></a>
        </div>
        <div class="abs bg-blur z-2 top-0 w-100 h-100 hover-op-1"></div>
        <div class="abs z-2 bottom-0 p-30 w-100 text-center hover-op-0">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="mb-0">Spa Treatments</h3>
          <div>From $95</div>
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
        <a class="btn-main btn-line fx-slide" href="{{ route('services.facials') }}"><span>Book Now</span></a>
        </div>
        <div class="abs bg-blur z-2 top-0 w-100 h-100 hover-op-1"></div>
        <div class="abs z-2 bottom-0 p-30 w-100 text-center hover-op-0">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="mb-0">Facial Treatments</h3>
          <div>From $75</div>
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
        <a class="btn-main btn-line fx-slide" href="{{ route('services.hair') }}"><span>Book Now</span></a>
        </div>
        <div class="abs bg-blur z-2 top-0 w-100 h-100 hover-op-1"></div>
        <div class="abs z-2 bottom-0 p-30 w-100 text-center hover-op-0">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="mb-0">Hair Services</h3>
          <div>From $65</div>
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
        <a class="btn-main btn-line fx-slide" href="{{ route('services.nails') }}"><span>Book Now</span></a>
        </div>
        <div class="abs bg-blur z-2 top-0 w-100 h-100 hover-op-1"></div>
        <div class="abs z-2 bottom-0 p-30 w-100 text-center hover-op-0">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="mb-0">Nail Care</h3>
          <div>From $45</div>
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
        <a class="btn-main btn-line fx-slide" href="{{ route('services.barbershop') }}"><span>Book Now</span></a>
        </div>
        <div class="abs bg-blur z-2 top-0 w-100 h-100 hover-op-1"></div>
        <div class="abs z-2 bottom-0 p-30 w-100 text-center hover-op-0">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="mb-0">Barbershop</h3>
          <div>From $35</div>
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
            <h2 class="wow fadeInUp" data-wow-delay=".4s">Complete Service Menu</h2>

            <div class="relative rounded-1 overflow-hidden">
              <div class="d-flex bg-light px-4 py-2">
                <div class="w-60">Massage Therapy</div>
                <div class="w-40 fw-600">From $85</div>
              </div>
              <div class="d-flex px-4 py-2">
                <div class="w-60">Spa Treatments</div>
                <div class="w-40 fw-600">From $95</div>
              </div>
              <div class="d-flex bg-light px-4 py-2">
                <div class="w-60">Facial Treatments</div>
                <div class="w-40 fw-600">From $75</div>
              </div>
              <div class="d-flex px-4 py-2">
                <div class="w-60">Hair Services</div>
                <div class="w-40 fw-600">From $65</div>
              </div>
              <div class="d-flex bg-light px-4 py-2">
                <div class="w-60">Nail Care</div>
                <div class="w-40 fw-600">From $45</div>
              </div>
              <div class="d-flex px-4 py-2">
                <div class="w-60">Barbershop</div>
                <div class="w-40 fw-600">From $35</div>
              </div>
              <div class="d-flex bg-light px-4 py-2">
                <div class="w-60">Wellness Packages</div>
                <div class="w-40 fw-600">From $150</div>
              </div>
              <div class="d-flex px-4 py-2">
                <div class="w-60">Bridal Services</div>
                <div class="w-40 fw-600">From $200</div>
              </div>
              <div class="d-flex px-4 bg-light py-2">
                <div class="w-60">Group Bookings</div>
                <div class="w-40 fw-600">Custom</div>
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

@endsection