<!DOCTYPE html>
<html lang="zxx">

<head>
  <title>Wellness Spa Hub - Premium Hair, Nails, Spa & Barbershop Services</title>
  <link rel="icon" href="{{asset('images/icon.webp')}}" type="image/gif" sizes="16x16">
  <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta
    content="Wellness Spa Hub - Professional hair styling, nail care, spa treatments, massage therapy, facials and barbershop services at Chuna Mall & OBC Center"
    name="description">
  <meta content="" name="keywords">
  <meta content="" name="author">
  <!-- CSS Files
    ================================================== -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap">
  <link href="{{asset("css/plugins.css")}}" rel="stylesheet" type="text/css">
  <link href="{{asset("css/swiper.css")}}" rel="stylesheet" type="text/css">
  <link href="{{asset("css/style.css")}}" rel="stylesheet" type="text/css">
  <link href="{{asset("css/coloring.css")}}" rel="stylesheet" type="text/css">
  <!-- custom-css -->
  <link href="{{asset('css/swiper-custom-1.css')}}" rel="stylesheet" type="text/css">
  <!-- color scheme -->
  <link id="colors" href="{{asset('css/colors/scheme-01.css')}}" rel="stylesheet" type="text/css">

</head>

<body>

  <div id="wrapper">

    <div class="float-text show-on-scroll">
      <span><a href="#">Scroll to top</a></span>
    </div>
    <div class="scrollbar-v show-on-scroll"></div>

    <!-- page preloader begin -->
    <div id="de-loader"></div>
    <!-- page preloader close -->

    <header class="transparent logo-center">
      <div class="container-fluid px-lg-5 px-3">
        <div class="row">
          <div class="col-lg-12">
            <div class="de-flex">
              <div class="col-start">
                <ul id="mainmenu">
                  <li><a class="menu-item" href="/">Home</a>
                    
                  </li>
                  <li><a class="menu-item" href="#services">Services</a>
                    <ul>
                      <li><a class="menu-item" href="{{ route('services.hair') }}">Hair Services</a></li>
                      <li><a class="menu-item" href="{{ route('services.nails') }}">Nail Care</a></li>
                      <li><a class="menu-item" href="{{ route('services.spa') }}">Spa Treatments</a></li>
                      <li><a class="menu-item" href="{{ route('services.massage') }}">Massage Therapy</a></li>
                      <li><a class="menu-item" href="{{ route('services.facials') }}">Facial Treatments</a></li>
                      <li><a class="menu-item" href="{{ route('services.barbershop') }}">Barbershop</a></li>
                    </ul>
                  </li>
                  <li><a class="menu-item" href="/facilities">Facilities</a></li>
                  <li><a class="menu-item" href="/about">About</a></li>
                  <li><a class="menu-item" href="/contact">Contact</a></li>
                </ul>
              </div>
              <div class="col-center">
                <a href="{{ route('home') }}"><img src="{{asset('images/logo.webp')}}" alt="Wellness Spa Hub"></a>
              </div>
              <div class="col-end">
                <div class="menu_side_area">
                  <a href="/booking" class="btn-main btn-line bg-blur fx-slide sm-hide"><span>Book an appointment</span></a>
                  <span id="menu-btn"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    @yield('content')
    <footer class="section-dark">
      <div class="container">
        <div class="row gx-5 justify-content-center">
          <div class="col-lg-8">
            <div class="text-center">
              <img src="images/logo.webp" class="w-200px" alt="">
              <div class="spacer-single"></div>
              <div class="fs-16">
                Chuna Mall & OBC Center<br>
                Two Convenient Locations
              </div>
            </div>
          </div>
        </div>
    
        <div class="spacer-double"></div>
    
        <div class="row g-4">
          <div class="col-lg-4 col-md-6 mb-sm-30">
            <div class="d-flex justify-content-center">
              <i class="fs-60 id-color icon_phone"></i>
              <div class="ms-3">
                <h4 class="mb-0">Call Us</h4>
                <p>Call: +1 (555) SPA-LIFE</p>
              </div>
            </div>
          </div>
    
          <div class="col-lg-4 col-md-6 mb-sm-30">
            <div class="d-flex justify-content-center">
              <i class="fs-60 id-color icon_clock"></i>
              <div class="ms-3">
                <h4 class="mb-0">Opening Hours</h4>
                <p>Daily 08:00 - 22:00</p>
              </div>
            </div>
          </div>
    
          <div class="col-lg-4 col-md-6 mb-sm-30">
            <div class="d-flex justify-content-center">
              <i class="fs-60 id-color icon_mail"></i>
              <div class="ms-3">
                <h4 class="mb-0">Email Us</h4>
                <p>info@wellnessspahub.com</p>
              </div>
            </div>
          </div>
        </div>
    
      </div>
    <div class="subfooter">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            Copyright 2025 - Wellness Spa Hub
          </div>
          <div class="col-md-6 text-md-end">
            <div class="social-icons mb-sm-30 text-center">
              <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
              <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
              <a href="#"><i class="fa-brands fa-instagram"></i></a>
              <a href="#"><i class="fa-brands fa-youtube"></i></a>
              <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    </footer>
    <!-- footer end -->
    
    <!-- Javascript Files
    ================================================== -->
    <script src="{{asset("js/vendors.js")}}"></script>
    <script src="{{asset("js/designesia.js")}}"></script>
    <script src="{{asset("js/swiper.js")}}"></script>
    <script src="{{asset("js/custom-swiper-2.js")}}"></script>
    
    </body>
    
    </html>