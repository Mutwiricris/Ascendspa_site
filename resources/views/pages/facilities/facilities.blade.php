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
                  <h1 class="fs-120 text-uppercase fs-sm-10vw mb-2 lh-1">Spa Facilities</h1>
                  <h3>Where Wellness Meets Luxury</h3>
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
            <div class="subtitle">Experience</div>
            <h2>Premium Spa Facilities</h2>
          </div>
          <div class="col-md-8">
            <h3>Discover our world-class spa facilities designed to provide the ultimate wellness experience. Each space is thoughtfully crafted with premium amenities, modern equipment, and a serene atmosphere to ensure your complete relaxation and rejuvenation.</h3>

            <div class="spacer-single"></div>

            <div class="row g-3">
              <div class="col-md-3 col-6">
                <div class="relative">
                  <h4>Total Facilities</h4>
                  <div class="d-flex justify-content-start align-items-center">
                    <img src="{{asset('images/icons-color/building.png')}}" class="w-40px me-3" alt="">
                    <div class="">6 Unique Spaces</div>
                  </div>
                </div>
              </div>

              <div class="col-md-3 col-6">
                <div class="relative">
                  <h4>Operating Hours</h4>
                  <div class="d-flex justify-content-start align-items-center">
                    <img src="{{asset('images/icons-color/size.png')}}" class="w-40px me-3" alt="">
                    <div class="">7AM - 10PM</div>
                  </div>
                </div>
              </div>

              <div class="col-md-3 col-6">
                <div class="relative">
                  <h4>Capacity</h4>
                  <div class="d-flex justify-content-start align-items-center">
                    <img src="{{asset('images/icons-color/bed.png')}}" class="w-40px me-3" alt="">
                    <div class="">50+ Guests</div>
                  </div>
                </div>
              </div>

              <div class="col-md-3 col-6">
                <div class="relative">
                  <h4>Amenities</h4>
                  <div class="d-flex justify-content-start align-items-center">
                    <img src="{{asset('images/icons-color/tile.png')}}" class="w-40px me-3" alt="">
                    <div class="">Premium</div>
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
            <div class="owl-custom-nav menu-float" data-target="#facilities-carousel">
              <a class="btn-next"></a>
              <a class="btn-prev"></a>

              <div id="facilities-carousel" class="owl-2-cols-center owl-carousel owl-theme">
                <!-- Hair Styling Studio -->
                <div class="item">
                  <div class="relative">
                    <div class="overflow-hidden">
                      <img src="{{asset('images/apartment/1.jpg')}}" class="w-100" alt="Hair Styling Studio">
                    </div>
                    <div class="abs z-2 bottom-0 p-30 w-100 text-center text-light">
                      <h3>Hair Styling Studio</h3>
                      <p>3 Professional Stations</p>
                    </div>
                    <div class="gradient-edge-bottom abs w-100 h-60 bottom-0"></div>
                  </div>
                </div>

                <!-- Nail Care Lounge -->
                <div class="item">
                  <div class="relative">
                    <div class="overflow-hidden">
                      <img src="{{asset('images/apartment/2.jpg')}}" class="w-100" alt="Nail Care Lounge">
                    </div>
                    <div class="abs z-2 bottom-0 p-30 w-100 text-center text-light">
                      <h3>Nail Care Lounge</h3>
                      <p>6 Luxurious Stations</p>
                    </div>
                    <div class="gradient-edge-bottom abs w-100 h-60 bottom-0"></div>
                  </div>
                </div>

                <!-- Massage Therapy Rooms -->
                <div class="item">
                  <div class="relative">
                    <div class="overflow-hidden">
                      <img src="{{asset('images/apartment/3.jpg')}}" class="w-100" alt="Massage Therapy Rooms">
                    </div>
                    <div class="abs z-2 bottom-0 p-30 w-100 text-center text-light">
                      <h3>Massage Therapy Rooms</h3>
                      <p>4 Private Treatment Rooms</p>
                    </div>
                    <div class="gradient-edge-bottom abs w-100 h-60 bottom-0"></div>
                  </div>
                </div>

                <!-- Facial Treatment Suites -->
                <div class="item">
                  <div class="relative">
                    <div class="overflow-hidden">
                      <img src="{{asset('images/apartment/4.jpg')}}" class="w-100" alt="Facial Treatment Suites">
                    </div>
                    <div class="abs z-2 bottom-0 p-30 w-100 text-center text-light">
                      <h3>Facial Treatment Suites</h3>
                      <p>3 Luxury Treatment Suites</p>
                    </div>
                    <div class="gradient-edge-bottom abs w-100 h-60 bottom-0"></div>
                  </div>
                </div>

                <!-- Traditional Barbershop -->
                <div class="item">
                  <div class="relative">
                    <div class="overflow-hidden">
                      <img src="{{asset('images/apartment/5.jpg')}}" class="w-100" alt="Traditional Barbershop">
                    </div>
                    <div class="abs z-2 bottom-0 p-30 w-100 text-center text-light">
                      <h3>Traditional Barbershop</h3>
                      <p>2 Classic Barber Chairs</p>
                    </div>
                    <div class="gradient-edge-bottom abs w-100 h-60 bottom-0"></div>
                  </div>
                </div>

                <!-- Relaxation Lounge -->
                <div class="item">
                  <div class="relative">
                    <div class="overflow-hidden">
                      <img src="{{asset('images/apartment/6.jpg')}}" class="w-100" alt="Relaxation Lounge">
                    </div>
                    <div class="abs z-2 bottom-0 p-30 w-100 text-center text-light">
                      <h3>Relaxation Lounge</h3>
                      <p>Tranquil Wellness Area</p>
                    </div>
                    <div class="gradient-edge-bottom abs w-100 h-60 bottom-0"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="relative">
      <div class="container relative z-2">
        <div class="row g-4">
          <div class="col-md-6">
            <div class="hover overflow-hidden relative text-light text-center wow zoomIn" data-wow-delay=".0s">
              <div class="wow scaleIn overflow-hidden">
                <img src="{{asset('images/apartment/1.jpg')}}" class="hover-scale-1-1 w-100" alt="">
              </div>
              <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                <a class="btn-main btn-line fx-slide" href="{{route('facilities.details')}}"><span>View Details</span></a>
              </div>
              <div class="abs bg-blur z-2 top-0 w-100 h-100 hover-op-1"></div>
              <div class="abs z-2 bottom-0 p-30 w-100 text-center hover-op-0">
                <div class="d-flex justify-content-between align-items-center">
                  <h3 class="mb-0">Hair Styling Studio</h3>
                  <div>3 Stations</div>
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
        <a class="btn-main btn-line fx-slide" href="{{route('facilities.details')}}"><span>View Details</span></a>
        </div>
        <div class="abs bg-blur z-2 top-0 w-100 h-100 hover-op-1"></div>
        <div class="abs z-2 bottom-0 p-30 w-100 text-center hover-op-0">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="mb-0">Nail Care Lounge</h3>
          <div>6 Stations</div>
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
        <a class="btn-main btn-line fx-slide" href="{{route('facilities.details')}}"><span>View Details</span></a>
        </div>
        <div class="abs bg-blur z-2 top-0 w-100 h-100 hover-op-1"></div>
        <div class="abs z-2 bottom-0 p-30 w-100 text-center hover-op-0">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="mb-0">Massage Therapy Rooms</h3>
          <div>4 Private Rooms</div>
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
        <a class="btn-main btn-line fx-slide" href="{{route('facilities.details')}}"><span>View Details</span></a>
        </div>
        <div class="abs bg-blur z-2 top-0 w-100 h-100 hover-op-1"></div>
        <div class="abs z-2 bottom-0 p-30 w-100 text-center hover-op-0">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="mb-0">Facial Treatment Suites</h3>
          <div>3 Luxury Suites</div>
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
        <a class="btn-main btn-line fx-slide" href="{{route('facilities.details')}}"><span>View Details</span></a>
        </div>
        <div class="abs bg-blur z-2 top-0 w-100 h-100 hover-op-1"></div>
        <div class="abs z-2 bottom-0 p-30 w-100 text-center hover-op-0">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="mb-0">Traditional Barbershop</h3>
          <div>2 Classic Chairs</div>
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
        <a class="btn-main btn-line fx-slide" href="{{route('facilities.details')}}"><span>View Details</span></a>
        </div>
        <div class="abs bg-blur z-2 top-0 w-100 h-100 hover-op-1"></div>
        <div class="abs z-2 bottom-0 p-30 w-100 text-center hover-op-0">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="mb-0">Relaxation Lounge</h3>
          <div>Wellness Area</div>
        </div>
        </div>
        <div class="gradient-edge-bottom abs w-100 h-40 bottom-0"></div>
      </div>
      </div>

        </div>
      </div>
    </section>

    <section class="overlay-dark-1">
      <div class="container">
        <div class="row g-4 justify-content-between">
          <div class="col-lg-4 relative z-3">
            <div class="me-lg-3">
              <div class="subtitle wow fadeInUp" data-wow-delay=".0s">Amenities</div>
              <h2 class="wow fadeInUp" data-wow-delay=".2s">Premium Spa Features</h2>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="spacer-single spacer-double"></div>
            <div class="row">
              <div class="col-md-5 wow fadeInUp" data-wow-delay=".2s">
                <ul class="ul-check fs-500 text-dark">
                  <li>Premium Sound Systems</li>
                  <li>Climate Control</li>
                  <li>Luxury Seating Areas</li>
                  <li>Private Consultation Rooms</li>
                  <li>Complimentary Refreshments</li>
                </ul>
              </div>

              <div class="col-md-5 wow fadeInUp" data-wow-delay=".4s">
                <ul class="ul-check fs-500 text-dark">
                  <li>High-End Equipment</li>
                  <li>Sanitization Stations</li>
                  <li>Organic Products</li>
                  <li>Wi-Fi & Charging Stations</li>
                  <li>Valet Parking</li>
                </ul>
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
            <a class="btn-main fx-slide btn-line" href="{{route('contact')}}"><span>Book Your Visit</span></a>
          </div>
        </div>
      </div>
    </section>

  </div>

@endsection