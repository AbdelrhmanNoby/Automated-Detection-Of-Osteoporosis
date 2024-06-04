<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img')}}/favicon.png" rel="icon">
  <link href="{{asset('assets/img')}}/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/fontawesome-free/css')}}/all.min.css" rel="stylesheet">
  <link href="{{asset('assets/vendor/animate.css')}}/animate.min.css" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css')}}/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons')}}/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css')}}/boxicons.min.css" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css')}}/glightbox.min.css" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon')}}/remixicon.css" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper')}}/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css')}}/style.css" rel="stylesheet">
  @yield('style')

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">info@osteoknee.com</a>
        <i class="bi bi-phone"></i> +1 5589 55488 55
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{route("homePage")}}">DetOste</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="{{route("homePage")}}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{route('homePage')}}/#about">About</a></li>
          <li><a class="nav-link scrollto" href="{{route('homePage')}}/#services">Services</a></li>
          <li><a class="nav-link scrollto" href="{{route('homePage')}}/#faqs">FaQs</a></li>
          <li><a class="nav-link scrollto" href="{{route('homePage')}}/#test">Testimonials</a></li>
          <li><a class="nav-link scrollto" href="{{route('homePage')}}/#contact">Contact</a></li>
        @if(Auth::guard("web")->check() ==false && Auth::guard("patient")->check() == false )
          <li class="dropdown"><a href="#"><span>Register</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{route("registerDoctor")}}">As Doctor</a></li>
              <li><a href="{{route("registerPatient")}}">As Patient</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Login</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{route("loginDoctor")}}">As Doctor</a></li>
              <li><a href="{{route("loginPatient")}}">As Patient</a></li>
            </ul>
          </li>
        @endif
          @if (Auth::guard("patient")->check())
          <li><a class="nav-link scrollto" href="{{route("clinicalPage")}}">Clinical</a></li>
 
          @elseif(Auth::guard("web")->check())
          <li><a class="nav-link scrollto" href="{{route("dignosisPage")}}">Diagnosis</a></li>
              
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->


      @if(Auth::guard("web")->check()||Auth::guard("patient")->check() )
        <form action="{{route("logout")}}" method="POST">
        @csrf 
      {{-- <a href="{{route("logout")}}" class="appointment-btn scrollto"><span class="d-none d-md-inline"></span>Logout</a> --}}
       <button type="submit" class="appointment-btn scrollto" name="submit">Logout</button>
        </form>
      @endif


    </div>
  </header>

  @yield('content')






  
  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/purecounter')}}/purecounter_vanilla.js"></script>
  <script src="{{asset('assets/vendor/bootstrap/js')}}/bootstrap.bundle.min.js"></script>
  <script src="{{asset('assets/vendor/glightbox/js')}}/glightbox.min.js"></script>
  <script src="{{asset('assets/vendor/swiper')}}/swiper-bundle.min.js"></script>
  {{-- <script src="{{asset('assets/vendor/php-email-form/validate.js"></script> --}}

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js')}}/main.js"></script>

</body>

</html>