@extends('layouts.app')
@section('content')
  <section id="section-hero" class="section-dark text-light no-top no-bottom relative overflow-hidden mh-600 jarallax">
    <img src="images/background/6.webp" class="jarallax-img" alt="">
    <div class="gradient-edge-top op-6"></div>
    <div class="abs w-80 bottom-10 z-2 w-100">
    <div class="container">
      <div class="row">
      <div class="col-lg-12">
        <div class="relative overflow-hidden">
        <div class="wow fadeInUpBig" data-wow-duration="1.5s">
          <h1 class="fs-120 text-uppercase fs-sm-10vw mb-2 lh-1">News</h1>
          <h3>What’s New in Your Neighborhood</h3>
        </div>
        </div>
      </div>
      </div>
    </div>
    </div>
    <div class="sw-overlay op-5"></div>
  </section>

  <section class="bg-light">
    <div class="container">
    <div class="row g-4">

      <div class="col-lg-4">
      <a href="#" class="d-block hover relative overflow-hidden text-light">
        <div class="relative">
        <div class="abs end-0 z-2 bg-blur rounded-2 text-white p-3 pb-2 m-4 text-center fw-600">
          <h4 class="fs-36 mb-0 lh-1">28</h4>
          <span>Apr</span>
        </div>
        </div>
        <img src="images/news/s1.webp" class="w-100 hover-scale-1-1" alt="">
        <div class="absolute start-0 bottom-0 p-40 z-2">
        <div class="bg-color p-0 px-2 d-inline-block mb-3">Tips &amp; Tricks</div>
        <h4>Government Introduces Tax Incentives for First-Time Homebuyers</h4>
        </div>
        <div class="gradient-edge-bottom h-70"></div>
      </a>
      </div>

      <div class="col-lg-4">
      <a href="#" class="d-block hover relative overflow-hidden text-light">
        <div class="relative">
        <div class="abs end-0 z-2 bg-blur rounded-2 text-white p-3 pb-2 m-4 text-center fw-600">
          <h4 class="fs-36 mb-0 lh-1">26</h4>
          <span>Apr</span>
        </div>
        </div>
        <img src="images/news/s2.webp" class="w-100 hover-scale-1-1" alt="">
        <div class="absolute start-0 bottom-0 p-40 z-2">
        <div class="bg-color p-0 px-2 d-inline-block mb-3">Tips &amp; Tricks</div>
        <h4>Eco-Friendly Homes Lead the Way in 2025 Property Trends</h4>
        </div>
        <div class="gradient-edge-bottom h-70"></div>
      </a>
      </div>

      <div class="col-lg-4">
      <a href="#" class="d-block hover relative overflow-hidden text-light">
        <div class="relative">
        <div class="abs end-0 z-2 bg-blur rounded-2 text-white p-3 pb-2 m-4 text-center fw-600">
          <h4 class="fs-36 mb-0 lh-1">24</h4>
          <span>Apr</span>
        </div>
        </div>
        <img src="images/news/s3.webp" class="w-100 hover-scale-1-1" alt="">
        <div class="absolute start-0 bottom-0 p-40 z-2">
        <div class="bg-color p-0 px-2 d-inline-block mb-3">Tips &amp; Tricks</div>
        <h4>Major Infrastructure Projects Drive Property Market Growth</h4>
        </div>
        <div class="gradient-edge-bottom h-70"></div>
      </a>
      </div>

      <div class="col-lg-4">
      <a href="#" class="d-block hover relative overflow-hidden text-light">
        <div class="relative">
        <div class="abs end-0 z-2 bg-blur rounded-2 text-white p-3 pb-2 m-4 text-center fw-600">
          <h4 class="fs-36 mb-0 lh-1">22</h4>
          <span>Apr</span>
        </div>
        </div>
        <img src="images/news/s4.webp" class="w-100 hover-scale-1-1" alt="">
        <div class="absolute start-0 bottom-0 p-40 z-2">
        <div class="bg-color p-0 px-2 d-inline-block mb-3">Tips &amp; Tricks</div>
        <h4>Commercial Real Estate Rebounds After Market Slowdown</h4>
        </div>
        <div class="gradient-edge-bottom h-70"></div>
      </a>
      </div>

      <div class="col-lg-4">
      <a href="#" class="d-block hover relative overflow-hidden text-light">
        <div class="relative">
        <div class="abs end-0 z-2 bg-blur rounded-2 text-white p-3 pb-2 m-4 text-center fw-600">
          <h4 class="fs-36 mb-0 lh-1">20</h4>
          <span>Apr</span>
        </div>
        </div>
        <img src="images/news/s5.webp" class="w-100 hover-scale-1-1" alt="">
        <div class="absolute start-0 bottom-0 p-40 z-2">
        <div class="bg-color p-0 px-2 d-inline-block mb-3">Tips &amp; Tricks</div>
        <h4>Affordable Housing Gains Ground as Millennials Seek Homes</h4>
        </div>
        <div class="gradient-edge-bottom h-70"></div>
      </a>
      </div>

      <div class="col-lg-4">
      <a href="#" class="d-block hover relative overflow-hidden text-light">
        <div class="relative">
        <div class="abs end-0 z-2 bg-blur rounded-2 text-white p-3 pb-2 m-4 text-center fw-600">
          <h4 class="fs-36 mb-0 lh-1">18</h4>
          <span>Apr</span>
        </div>
        </div>
        <img src="images/news/s6.webp" class="w-100 hover-scale-1-1" alt="">
        <div class="absolute start-0 bottom-0 p-40 z-2">
        <div class="bg-color p-0 px-2 d-inline-block mb-3">Tips &amp; Tricks</div>
        <h4>Property Prices Steady as Interest Rates Hold in Q2 2025</h4>
        </div>
        <div class="gradient-edge-bottom h-70"></div>
      </a>
      </div>

      <!-- pagination begin -->
      <div class="col-lg-12 pt-4 text-center">
      <div class="d-inline-block">
        <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true"><i class="fa fa-chevron-left"></i></span>
          </a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active" aria-current="page"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true"><i class="fa fa-chevron-right"></i></span>
          </a>
          </li>
        </ul>
        </nav>
      </div>
      </div>
      <!-- pagination end -->

    </div>
    </div>
  </section>

  <section class="bg-color section-dark text-light pt-50 pb-50">
    <div class="container">
    <div class="row g-4">
      <div class="col-md-9">
      <h3 class="mb-0 fs-32">Ready to make your next move?</h3>
      </div>
      <div class="col-lg-3 text-lg-end">
      <a class="btn-main fx-slide btn-line" href="02_apartment-contact.html"><span>Schedule a Visit</span></a>
      </div>
    </div>
    </div>
  </section>

  </div>

@endsection