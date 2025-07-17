@extends('layouts.app')
@section('content')
    <section id="section-hero" class="section-dark text-light no-top no-bottom relative overflow-hidden mh-600 jarallax">
    <img src="{{asset('images/background/5.webp')}}" class="jarallax-img" alt="">
    <div class="gradient-edge-top op-6"></div>
    <div class="abs w-80 bottom-10 z-2 w-100">
    <div class="container">
      <div class="row">
      <div class="col-lg-12">
      <div class="relative overflow-hidden">
      <div class="wow fadeInUpBig" data-wow-duration="1.5s">
        <h1 class="fs-120 text-uppercase fs-sm-10vw mb-2 lh-1">About Us</h1>
        <h3>Your Journey to Wellness and Beauty Begins Here</h3>
      </div>
      </div>
      </div>
      </div>
    </div>
    </div>
    <div class="sw-overlay op-5"></div>
    </section>


    <section class="bg-dark section-dark text-light relative no-top no-bottom overflow-hidden">
    <div class="container-fluid position-relative half-fluid">

      <div class="container">

      <div class="row gx-5">
        <!-- Image -->
        <div class="col-lg-6 position-lg-absolute right-half h-100 overflow-hidden">
        <div class="image" data-bgimage="url({{asset('images/misc/l6.webp')}}) center"></div>
        </div>
        <!-- Text -->
        <div class="col-lg-6 relative z-3">
        <div class="me-lg-5 pe-lg-5 py-5 my-5">
          <div class="subtitle wow fadeInUp" data-wow-delay=".2s">About Wellness Spa Hub</div>
          <h2 class="wow fadeInUp" data-wow-delay=".4s">Your one-stop destination for complete beauty and wellness
          </h2>
          <p class="wow fadeInUp" data-wow-delay=".6s">At Wellness Spa Hub, we offer comprehensive beauty and wellness
          services including professional hair styling, nail care, relaxing spa treatments, therapeutic massage,
          rejuvenating facials, and traditional barbershop services. Visit us at our convenient locations in Chuna
          Mall or OBC Center.</p>
          <a class="btn-main fx-slide" href="#contact"><span>Book Treatment</span></a>
        </div>
        </div>
      </div>
      </div>
    </div>
    </section>

    <section class="section-dark p-0">
    <div class="container-fluid">
      <div class="row g-0">
      <div class="col-lg-3 col-sm-6">
        <div class="hover overflow-hidden relative text-light text-center">
        <img src="{{asset('images/misc/s2.webp')}}" class="hover-scale-1-1 w-100" alt="">
        <div class="abs z-2 bottom-0 mb-3 w-100 text-center hover-op-0">
          <h4 class="mb-3">Hair Styling Studio</h4>
        </div>
        <div class="gradient-edge-bottom abs w-100 h-40 bottom-0 hover-op-0"></div>
        </div>
      </div>

      <div class="col-lg-3 col-sm-6">
        <div class="hover overflow-hidden relative text-light text-center">
        <img src="{{asset('images/misc/s3.webp')}}" class="hover-scale-1-1 w-100" alt="">
        <div class="abs z-2 bottom-0 mb-3 w-100 text-center hover-op-0">
          <h4 class="mb-3">Nail Care Center</h4>
        </div>
        <div class="gradient-edge-bottom abs w-100 h-40 bottom-0 hover-op-0"></div>
        </div>
      </div>

      <div class="col-lg-3 col-sm-6">
        <div class="hover overflow-hidden relative text-light text-center">
        <img src="{{asset('images/misc/s5.webp')}}" class="hover-scale-1-1 w-100" alt="">
        <div class="abs z-2 bottom-0 mb-3 w-100 text-center hover-op-0">
          <h4 class="mb-3">Spa Treatment Rooms</h4>
        </div>
        <div class="gradient-edge-bottom abs w-100 h-40 bottom-0 hover-op-0"></div>
        </div>
      </div>

      <div class="col-lg-3 col-sm-6">
        <div class="hover overflow-hidden relative text-light text-center">
        <img src="{{asset('images/misc/s4.webp')}}" class="hover-scale-1-1 w-100" alt="">
        <div class="abs z-2 bottom-0 mb-3 w-100 text-center hover-op-0">
          <h4 class="mb-3">Barbershop Corner</h4>
        </div>
        <div class="gradient-edge-bottom abs w-100 h-40 bottom-0 hover-op-0"></div>
        </div>
      </div>
      </div>
    </div>
    </section>

    <section class="text-center pt60 pb50 relative">
    <div class="container">
    <div class="row g-4">
      <div class="col-lg-3 col-sm-6 mb-sm-30">
      <div class="de_count relative fs-15 wow fadeInRight" data-wow-delay=".0s">
      <h3 class="fs-60 mb-0"><span class="timer" data-to="5000" data-speed="3000">0</span></h3>
      <div>Happy Clients</div>
      </div>
      </div>
      <div class="col-lg-3 col-sm-6 mb-sm-30">
      <div class="de_count relative fs-15 wow fadeInRight" data-wow-delay=".2s">
      <h3 class="fs-60 mb-0"><span class="timer" data-to="6" data-speed="3000">0</span></h3>
      <div>Service Categories</div>
      </div>
      </div>
      <div class="col-lg-3 col-sm-6 mb-sm-30">
      <div class="de_count relative fs-15 wow fadeInRight" data-wow-delay=".4s">
      <h3 class="fs-60 mb-0"><span class="timer" data-to="15" data-speed="3000">0</span></h3>
      <div>Expert Professionals</div>
      </div>
      </div>
      <div class="col-lg-3 col-sm-6 mb-sm-30">
      <div class="de_count relative fs-15 wow fadeInRight" data-wow-delay=".6s">
      <h3 class="fs-60 mb-0"><span class="timer" data-to="2" data-speed="3000">0</span></h3>
      <div>Convenient Locations</div>
      </div>
      </div>
    </div>
    </div>
    </section>

    <section class="relative overlay-dark-1">
    <div class="container">
    <div class="row g-4">
      <div class="col-lg-6 offset-lg-3 text-center">
      <div class="subtitle wow fadeInUp">Our Team</div>
      <h2 class="wow fadeInUp" data-wow-delay=".2s">Meet the Team</h2>
      </div>
    </div>
    <div class="row g-4">
      <div class="col-lg-3">
      <img src="{{asset('images/team/1.webp')}}" class="w-100" alt="">
      <div class="p-3 text-center
        ">
      <h4 class="mb-0">Barbara Charline</h4>
      <p class="mb-2">Spa Manager</p>
      <div class="social-icons">
      <a href="#"><i class="bg-white id-color bg-hover-2 text-hover-white fa-brands fa-facebook-f"></i></a>
      <a href="#"><i class="bg-white id-color bg-hover-2 text-hover-white fa-brands fa-x-twitter"></i></a>
      <a href="#"><i class="bg-white id-color bg-hover-2 text-hover-white fa-brands fa-instagram"></i></a>
      </div>
      </div>
      </div>

      <div class="col-lg-3">
      <img src="{{asset('images/team/2.webp')}}" class="w-100" alt="">
      <div class="p-3 text-center
        ">
      <h4 class="mb-0">Thomas Bennett</h4>
      <p class="mb-2">Senior Massage Therapist</p>
      <div class="social-icons">
      <a href="#"><i class="bg-white id-color bg-hover-2 text-hover-white fa-brands fa-facebook-f"></i></a>
      <a href="#"><i class="bg-white id-color bg-hover-2 text-hover-white fa-brands fa-x-twitter"></i></a>
      <a href="#"><i class="bg-white id-color bg-hover-2 text-hover-white fa-brands fa-instagram"></i></a>
      </div>
      </div>
      </div>

      <div class="col-lg-3">
      <img src="{{asset('images/team/3.webp')}}" class="w-100" alt="">
      <div class="p-3 text-center
        ">
      <h4 class="mb-0">Madison Jane</h4>
      <p class="mb-2">Lead Aesthetician</p>
      <div class="social-icons">
      <a href="#"><i class="bg-white id-color bg-hover-2 text-hover-white fa-brands fa-facebook-f"></i></a>
      <a href="#"><i class="bg-white id-color bg-hover-2 text-hover-white fa-brands fa-x-twitter"></i></a>
      <a href="#"><i class="bg-white id-color bg-hover-2 text-hover-white fa-brands fa-instagram"></i></a>
      </div>
      </div>
      </div>

      <div class="col-lg-3">
      <img src="{{asset('images/team/4.webp')}}" class="w-100" alt="">
      <div class="p-3 text-center
        ">
      <h4 class="mb-0">Joshua Henry</h4>
      <p class="mb-2">Master Hair Stylist</p>
      <div class="social-icons">
      <a href="#"><i class="bg-white id-color bg-hover-2 text-hover-white fa-brands fa-facebook-f"></i></a>
      <a href="#"><i class="bg-white id-color bg-hover-2 text-hover-white fa-brands fa-x-twitter"></i></a>
      <a href="#"><i class="bg-white id-color bg-hover-2 text-hover-white fa-brands fa-instagram"></i></a>
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
      <h3 class="mb-0 fs-32">Ready to experience ultimate relaxation?</h3>
      </div>
      <div class="col-lg-3 text-lg-end">
      <a class="btn-main fx-slide btn-line" href="#contact"><span>Book Your Treatment</span></a>
      </div>
    </div>
    </div>
    </section>
    <section class="bg-dark section-dark text-light">

      <div class="container relative z-2">
        <div class="row g-4 justify-content-center">                    
          <div class="col-lg-6 text-center">
              <div class="subtitle wow fadeInUp" data-wow-delay=".0s">Premium Services</div>
              <h2 class="wow fadeInUp" data-wow-delay=".2s">Choose Your Treatment</h2>
          </div>
        </div>
      </div>

      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <div class="owl-custom-nav menu-float" data-target="#room-carousel">
                      <a class="btn-next"></a>
                      <a class="btn-prev"></a>                                

                      <div id="room-carousel" class="owl-2-cols-center owl-carousel owl-theme">
                          <!-- room begin -->
                          <div class="item">
                              <div class="hover overflow-hidden relative text-light text-center">
                                  <div class="overflow-hidden">
                                      <img src="images/apartment/1.jpg" class="hover-scale-1-1 w-100" alt="">
                                  </div>
                                  <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                                      <a class="btn-main btn-line fx-slide" href="#contact"><span>Book Now</span></a>
                                  </div>
                                  <div class="abs bg-blur z-2 top-0 w-100 h-100 hover-op-1"></div>
                                  <div class="abs z-2 bottom-0 p-30 w-100 text-center hover-op-0">
                                      <div class="d-flex justify-content-between align-items-center">
                                          <h3 class="mb-0">Hair Styling Package</h3>
                                          <div>90 min</div>
                                      </div>
                                  </div>
                                  <div class="gradient-edge-bottom abs w-100 h-40 bottom-0"></div>
                              </div>
                          </div>
                          <!-- room end -->
                                                  
                          <!-- room begin -->
                          <div class="item">
                              <div class="hover overflow-hidden relative text-light text-center">
                                  <div class="overflow-hidden">
                                      <img src="images/apartment/2.jpg" class="hover-scale-1-1 w-100" alt="">
                                  </div>
                                  <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                                      <a class="btn-main btn-line fx-slide" href="#contact"><span>Book Now</span></a>
                                  </div>
                                  <div class="abs bg-blur z-2 top-0 w-100 h-100 hover-op-1"></div>
                                  <div class="abs z-2 bottom-0 p-30 w-100 text-center hover-op-0">
                                      <div class="d-flex justify-content-between align-items-center">
                                          <h3 class="mb-0">Nail Care Deluxe</h3>
                                          <div>60 min</div>
                                      </div>
                                  </div>
                                  <div class="gradient-edge-bottom abs w-100 h-40 bottom-0"></div>
                              </div>
                          </div>
                          <!-- room end -->
                          
                          <!-- room begin -->
                          <div class="item">
                              <div class="hover overflow-hidden relative text-light text-center">
                                  <div class="overflow-hidden">
                                      <img src="images/apartment/3.jpg" class="hover-scale-1-1 w-100" alt="">
                                  </div>
                                  <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                                      <a class="btn-main btn-line fx-slide" href="#contact"><span>Book Now</span></a>
                                  </div>
                                  <div class="abs bg-blur z-2 top-0 w-100 h-100 hover-op-1"></div>
                                  <div class="abs z-2 bottom-0 p-30 w-100 text-center hover-op-0">
                                      <div class="d-flex justify-content-between align-items-center">
                                          <h3 class="mb-0">Relaxing Massage</h3>
                                          <div>60 min</div>
                                      </div>
                                  </div>
                                  <div class="gradient-edge-bottom abs w-100 h-40 bottom-0"></div>
                              </div>
                          </div>
                          <!-- room end -->

                          <!-- room begin -->
                          <div class="item">
                              <div class="hover overflow-hidden relative text-light text-center">
                                  <div class="overflow-hidden">
                                      <img src="images/apartment/4.jpg" class="hover-scale-1-1 w-100" alt="">
                                  </div>
                                  <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                                      <a class="btn-main btn-line fx-slide" href="#contact"><span>Book Now</span></a>
                                  </div>
                                  <div class="abs bg-blur z-2 top-0 w-100 h-100 hover-op-1"></div>
                                  <div class="abs z-2 bottom-0 p-30 w-100 text-center hover-op-0">
                                      <div class="d-flex justify-content-between align-items-center">
                                          <h3 class="mb-0">Facial Treatment</h3>
                                          <div>45 min</div>
                                      </div>
                                  </div>
                                  <div class="gradient-edge-bottom abs w-100 h-40 bottom-0"></div>
                              </div>
                          </div>
                          <!-- room end -->

                          <!-- room begin -->
                          <div class="item">
                              <div class="hover overflow-hidden relative text-light text-center">
                                  <div class="overflow-hidden">
                                      <img src="images/apartment/5.jpg" class="hover-scale-1-1 w-100" alt="">
                                  </div>
                                  <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                                      <a class="btn-main btn-line fx-slide" href="#contact"><span>Book Now</span></a>
                                  </div>
                                  <div class="abs bg-blur z-2 top-0 w-100 h-100 hover-op-1"></div>
                                  <div class="abs z-2 bottom-0 p-30 w-100 text-center hover-op-0">
                                      <div class="d-flex justify-content-between align-items-center">
                                          <h3 class="mb-0">Barbershop Grooming</h3>
                                          <div>30 min</div>
                                      </div>
                                  </div>
                                  <div class="gradient-edge-bottom abs w-100 h-40 bottom-0"></div>
                              </div>
                          </div>
                          <!-- room end -->

                          <!-- room begin -->
                          <div class="item">
                              <div class="hover overflow-hidden relative text-light text-center">
                                  <div class="overflow-hidden">
                                      <img src="images/apartment/6.jpg" class="hover-scale-1-1 w-100" alt="">
                                  </div>
                                  <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                                      <a class="btn-main btn-line fx-slide" href="#contact"><span>Book Now</span></a>
                                  </div>
                                  <div class="abs bg-blur z-2 top-0 w-100 h-100 hover-op-1"></div>
                                  <div class="abs z-2 bottom-0 p-30 w-100 text-center hover-op-0">
                                      <div class="d-flex justify-content-between align-items-center">
                                          <h3 class="mb-0">Complete Beauty Package</h3>
                                          <div>3 hours</div>
                                      </div>
                                  </div>
                                  <div class="gradient-edge-bottom abs w-100 h-40 bottom-0"></div>
                              </div>
                          </div>
                          <!-- room end -->
                      </div>
                  </div>
              </div>
          </div>
      </div>

  </section>

  <section class="bg-dark section-dark text-light relative no-top no-bottom overflow-hidden">
      <div class="container-fluid position-relative half-fluid">
  
          <div class="container">
  
              <div class="row gx-5">
                  <!-- Image -->
                  <div class="col-lg-6 position-lg-absolute right-half h-100 overflow-hidden">
                      <div class="image" data-bgimage="url(images/misc/l4.webp) center"></div>
                  </div>
                  <!-- Text -->
                  <div class="col-lg-6 relative z-3">
                      <div class="me-lg-5 pe-lg-5 py-5 my-5">
                          <div class="subtitle wow fadeInUp" data-wow-delay=".0s">Hair Services</div>
                          <h2 class="wow fadeInUp" data-wow-delay=".2s">Style. Cut. Transform</h2>
  
                          <p>Experience professional hair styling with our expert stylists who specialize in cuts, colors, highlights, and treatments. From classic styles to modern trends, we use premium products and techniques to give you the perfect look that complements your personality and lifestyle.</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  
  <section class="bg-dark section-dark text-light  relative no-top no-bottom overflow-hidden">
      <div class="container-fluid position-relative half-fluid">
  
          <div class="container">
  
              <div class="row gx-5">
                  <!-- Image -->
                  <div class="col-lg-6 position-lg-absolute left-half h-100 overflow-hidden">
                      <div class="image" data-bgimage="url(images/misc/l5.webp) center"></div>
                  </div>
                  <!-- Text -->
                  <div class="col-lg-6 offset-lg-6 relative z-3">
                      <div class="ms-lg-5 ps-lg-5 py-5 my-5">
                          <div class="subtitle wow fadeInUp" data-wow-delay=".0s">Nail Care</div>
                          <h2 class="wow fadeInUp" data-wow-delay=".2s">Polish. Perfect. Pamper</h2>
  
                          <p>Indulge in our comprehensive nail care services including manicures, pedicures, nail art, and extensions. Our skilled nail technicians use high-quality products and maintain the highest hygiene standards to ensure beautiful, healthy nails that make a lasting impression.</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <section aria-label="section" class="section-dark relative p-0 text-light">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <a class="d-block hover popup-youtube" href="https://www.youtube.com/watch?v=C6rf51uHWJg">
                      <div class="relative overflow-hidden">
                          <div class="absolute start-0 w-100 abs-middle fs-36 text-white text-center z-3">
                              <div class="player circle wow scaleIn"><span></span></div>
                          </div> 
                          <div class="absolute w-100 h-100 top-0 bg-dark hover-op-05"></div>
                          <img src="images/background/3.webp" class="w-100 hover-scale-1-1" alt="">
                          <div class="gradient-edge-bottom h-100 op-8"></div>
                      </div>

                      <div class="abs w-80 bottom-10 z-2 w-100">
                          <div class="container">
                              <div class="row">
                                  <div class="col-lg-6">
                                      <h1 class="fs-120 text-uppercase fs-sm-10vw mb-2 lh-1">Virtual Tour</h1>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </a>
              </div>
          </div>
      </div>
  </section>

  <section id="contact" class="relative">

      <div class="container relative z-2">
        <div class="row g-4 justify-content-center">                    
          <div class="col-lg-6 text-center">
              <div class="subtitle s2 mb-3 wow fadeInUp" data-wow-delay=".0s">Contact Us</div>
              <h2 class="wow fadeInUp" data-wow-delay=".2s">Meet Our Beauty Professionals</h2>
          </div>
        </div>

          <div class="row g-4 justify-content-center">
              <div class="col-lg-8">
                  <div class="spacer-single"></div>
                  <p class="text-center">For appointments, inquiries, or feedback, please fill out the form below or contact us directly at our Chuna Mall or OBC Center locations.</p>
              </div>
              </div>
      </div>
  </section>
    </div>

@endsection