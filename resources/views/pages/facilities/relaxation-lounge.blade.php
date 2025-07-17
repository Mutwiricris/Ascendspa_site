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
          <h1 class="fs-120 text-uppercase fs-sm-10vw mb-2 lh-1">Relaxation Lounge</h1>
          <h3>Tranquil Wellness Sanctuary</h3>
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
        <h2>Ultimate Relaxation</h2>
      </div>
      <div class="col-md-8">
        <h3>Escape to our serene relaxation lounge, a tranquil wellness sanctuary designed for complete peace and rejuvenation. This quiet haven offers comfortable seating, calming ambiance, and wellness amenities for the perfect pre or post-treatment relaxation.</h3>

        <div class="spacer-single"></div>

        <div class="row g-3">
        <div class="col-md-3 col-6">
          <div class="relative">
          <h4>Area</h4>
          <div class="d-flex justify-content-start align-items-center">
            <img src="{{asset('images/icons-color/size.png')}}" class="w-40px me-3" alt="">
            <div class="">Spacious Lounge</div>
          </div>
          </div>
        </div>

        <div class="col-md-3 col-6">
          <div class="relative">
          <h4>Services</h4>
          <div class="d-flex justify-content-start align-items-center">
            <img src="{{asset('images/icons-color/bed.png')}}" class="w-40px me-3" alt="">
            <div class="">Wellness Retreat</div>
          </div>
          </div>
        </div>

        <div class="col-md-3 col-6">
          <div class="relative">
          <h4>Hours</h4>
          <div class="d-flex justify-content-start align-items-center">
            <img src="{{asset('images/icons-color/tile.png')}}" class="w-40px me-3" alt="">
            <div class="">7AM - 10PM</div>
          </div>
          </div>
        </div>

        <div class="col-md-3 col-6">
          <div class="relative">
          <h4>Experience</h4>
          <div class="d-flex justify-content-start align-items-center">
            <img src="{{asset('images/icons-color/building.png')}}" class="w-40px me-3" alt="">
            <div class="">Peaceful Environment</div>
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
        <div class="owl-custom-nav menu-float" data-target="#lounge-carousel">
        <a class="btn-next"></a>
        <a class="btn-prev"></a>

        <div id="lounge-carousel" class="owl-2-cols-center owl-carousel owl-theme">
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
        <div class="subtitle wow fadeInUp" data-wow-delay=".2s">Relaxation Lounge</div>
        <h2 class="wow fadeInUp" data-wow-delay=".4s">Wellness Amenities</h2>

        <div class="relative rounded-1 overflow-hidden">
          <div class="d-flex bg-light px-4 py-2">
          <div class="w-60">Herbal Tea Service</div>
          <div class="w-40 fw-600">Complimentary</div>
          </div>
          <div class="d-flex px-4 py-2">
          <div class="w-60">Meditation Space</div>
          <div class="w-40 fw-600">Available</div>
          </div>
          <div class="d-flex bg-light px-4 py-2">
          <div class="w-60">Reading Area</div>
          <div class="w-40 fw-600">Quiet Zone</div>
          </div>
          <div class="d-flex px-4 py-2">
          <div class="w-60">Aromatherapy</div>
          <div class="w-40 fw-600">Essential Oils</div>
          </div>
          <div class="d-flex bg-light px-4 py-2">
          <div class="w-60">Relaxation Music</div>
          <div class="w-40 fw-600">Ambient Sounds</div>
          </div>
          <div class="d-flex px-4 py-2">
          <div class="w-60">Wellness Consultations</div>
          <div class="w-40 fw-600">Available</div>
          </div>
          <div class="d-flex bg-light px-4 py-2">
          <div class="w-60">Healthy Snacks</div>
          <div class="w-40 fw-600">$5-15</div>
          </div>
          <div class="d-flex px-4 py-2">
          <div class="w-60">Infused Water</div>
          <div class="w-40 fw-600">Complimentary</div>
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
        <div class="subtitle wow fadeInUp" data-wow-delay=".0s">Lounge Features</div>
        <h2 class="wow fadeInUp" data-wow-delay=".2s">Tranquil Wellness Environment</h2>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="spacer-single spacer-double"></div>
        <div class="row">
        <div class="col-md-5 wow fadeInUp" data-wow-delay=".2s">
          <ul class="ul-check fs-500 text-dark">
          <li>Luxury Seating Areas</li>
          <li>Soft Natural Lighting</li>
          <li>Calming Water Features</li>
          <li>Temperature Control</li>
          <li>Privacy Nooks</li>
          </ul>
        </div>

        <div class="col-md-5 wow fadeInUp" data-wow-delay=".4s">
          <ul class="ul-check fs-500 text-dark">
          <li>Zen Garden Views</li>
          <li>Meditation Cushions</li>
          <li>Wellness Library</li>
          <li>Fresh Air Circulation</li>
          <li>Quiet Atmosphere</li>
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
        <div class="subtitle s2 mb-3 wow fadeInUp" data-wow-delay=".0s">Visit Us</div>
        <h2 class="wow fadeInUp" data-wow-delay=".2s">Experience Our Relaxation Lounge</h2>
      </div>
      </div>

      <div class="row g-4 gx-5">
      <div class="col-md-4">
        <div class="text-center">
        <img src="{{asset('images/agents/1.webp')}}" class="w-60 circle" alt="">

        <div class="mt-3">
          <h4 class="mb-0">Zen Master Lisa</h4>
          <div class="fw-500 id-color">Wellness Coordinator</div>
          <div class="fw-500 id-color">(555) 234-5678</div>
        </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="text-center">
        <img src="{{asset('images/agents/2.webp')}}" class="w-60 circle" alt="">

        <div class="mt-3">
          <h4 class="mb-0">Maya Patel</h4>
          <div class="fw-500 id-color">Meditation Guide</div>
          <div class="fw-500 id-color">(555) 345-6789</div>
        </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="text-center">
        <img src="{{asset('images/agents/3.webp')}}" class="w-60 circle" alt="">

        <div class="mt-3">
          <h4 class="mb-0">Claire Morgan</h4>
          <div class="fw-500 id-color">Aromatherapy Specialist</div>
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
        <h3 class="mb-0 fs-32">Ready to find your inner peace?</h3>
      </div>
      <div class="col-lg-3 text-lg-end">
        <a class="btn-main fx-slide btn-line" href="{{route('contact')}}"><span>Visit Lounge</span></a>
      </div>
      </div>
    </div>
    </section>

  </div>

@endsection