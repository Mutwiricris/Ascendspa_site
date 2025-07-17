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
          <h1 class="fs-120 text-uppercase fs-sm-10vw mb-2 lh-1">Hair Styling Studio</h1>
          <h3>Professional Hair Care Experience</h3>
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
        <h2>Premium Hair Styling</h2>
      </div>
      <div class="col-md-8">
        <h3>Our professional hair styling studio features state-of-the-art equipment and skilled stylists dedicated to creating your perfect look. From cuts and colors to treatments and styling, experience luxury hair care in a modern, comfortable environment.</h3>

        <div class="spacer-single"></div>

        <div class="row g-3">
        <div class="col-md-3 col-6">
          <div class="relative">
          <h4>Stations</h4>
          <div class="d-flex justify-content-start align-items-center">
            <img src="{{asset('images/icons-color/size.png')}}" class="w-40px me-3" alt="">
            <div class="">3 Professional</div>
          </div>
          </div>
        </div>

        <div class="col-md-3 col-6">
          <div class="relative">
          <h4>Services</h4>
          <div class="d-flex justify-content-start align-items-center">
            <img src="{{asset('images/icons-color/bed.png')}}" class="w-40px me-3" alt="">
            <div class="">Full Service</div>
          </div>
          </div>
        </div>

        <div class="col-md-3 col-6">
          <div class="relative">
          <h4>Hours</h4>
          <div class="d-flex justify-content-start align-items-center">
            <img src="{{asset('images/icons-color/tile.png')}}" class="w-40px me-3" alt="">
            <div class="">9AM - 8PM</div>
          </div>
          </div>
        </div>

        <div class="col-md-3 col-6">
          <div class="relative">
          <h4>Experience</h4>
          <div class="d-flex justify-content-start align-items-center">
            <img src="{{asset('images/icons-color/building.png')}}" class="w-40px me-3" alt="">
            <div class="">Expert Stylists</div>
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
        <div class="owl-custom-nav menu-float" data-target="#studio-carousel">
        <a class="btn-next"></a>
        <a class="btn-prev"></a>

        <div id="studio-carousel" class="owl-2-cols-center owl-carousel owl-theme">
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
        <div class="subtitle wow fadeInUp" data-wow-delay=".2s">Hair Studio</div>
        <h2 class="wow fadeInUp" data-wow-delay=".4s">Services Menu</h2>

        <div class="relative rounded-1 overflow-hidden">
          <div class="d-flex bg-light px-4 py-2">
          <div class="w-60">Hair Cut & Style</div>
          <div class="w-40 fw-600">$65</div>
          </div>
          <div class="d-flex px-4 py-2">
          <div class="w-60">Color Treatment</div>
          <div class="w-40 fw-600">$120</div>
          </div>
          <div class="d-flex bg-light px-4 py-2">
          <div class="w-60">Hair Highlights</div>
          <div class="w-40 fw-600">$150</div>
          </div>
          <div class="d-flex px-4 py-2">
          <div class="w-60">Deep Conditioning</div>
          <div class="w-40 fw-600">$45</div>
          </div>
          <div class="d-flex bg-light px-4 py-2">
          <div class="w-60">Keratin Treatment</div>
          <div class="w-40 fw-600">$200</div>
          </div>
          <div class="d-flex px-4 py-2">
          <div class="w-60">Hair Extensions</div>
          <div class="w-40 fw-600">$300</div>
          </div>
          <div class="d-flex bg-light px-4 py-2">
          <div class="w-60">Bridal Styling</div>
          <div class="w-40 fw-600">$150</div>
          </div>
          <div class="d-flex px-4 py-2">
          <div class="w-60">Consultation</div>
          <div class="w-40 fw-600">Free</div>
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
        <div class="subtitle wow fadeInUp" data-wow-delay=".0s">Studio Features</div>
        <h2 class="wow fadeInUp" data-wow-delay=".2s">Premium Hair Care Amenities</h2>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="spacer-single spacer-double"></div>
        <div class="row">
        <div class="col-md-5 wow fadeInUp" data-wow-delay=".2s">
          <ul class="ul-check fs-500 text-dark">
          <li>Professional Styling Chairs</li>
          <li>Advanced Hair Dryers</li>
          <li>Premium Product Lines</li>
          <li>Color Processing Area</li>
          <li>Wash Stations</li>
          </ul>
        </div>

        <div class="col-md-5 wow fadeInUp" data-wow-delay=".4s">
          <ul class="ul-check fs-500 text-dark">
          <li>Climate Controlled</li>
          <li>Natural Lighting</li>
          <li>Luxury Seating</li>
          <li>Complimentary Beverages</li>
          <li>Wi-Fi Access</li>
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
        <h2 class="wow fadeInUp" data-wow-delay=".2s">Schedule Your Appointment</h2>
      </div>
      </div>

      <div class="row g-4 gx-5">
      <div class="col-md-4">
        <div class="text-center">
        <img src="{{asset('images/agents/1.webp')}}" class="w-60 circle" alt="">

        <div class="mt-3">
          <h4 class="mb-0">Sarah Martinez</h4>
          <div class="fw-500 id-color">Senior Stylist</div>
          <div class="fw-500 id-color">(555) 234-5678</div>
        </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="text-center">
        <img src="{{asset('images/agents/2.webp')}}" class="w-60 circle" alt="">

        <div class="mt-3">
          <h4 class="mb-0">Jessica Thompson</h4>
          <div class="fw-500 id-color">Color Specialist</div>
          <div class="fw-500 id-color">(555) 345-6789</div>
        </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="text-center">
        <img src="{{asset('images/agents/3.webp')}}" class="w-60 circle" alt="">

        <div class="mt-3">
          <h4 class="mb-0">Amanda Chen</h4>
          <div class="fw-500 id-color">Hair Treatment Expert</div>
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
        <h3 class="mb-0 fs-32">Ready for your hair transformation?</h3>
      </div>
      <div class="col-lg-3 text-lg-end">
        <a class="btn-main fx-slide btn-line" href="{{route('contact')}}"><span>Book Appointment</span></a>
      </div>
      </div>
    </div>
    </section>

  </div>

@endsection