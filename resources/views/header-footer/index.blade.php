<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>VillaBotosari</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- DataTables -->
  <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: EstateAgency - v4.9.1
  * Template URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
@include('sweetalert::alert')

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.html">Villa<span class="color-b">Botosari</span></a>

      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link" href="{{route('index')}}">Home</a>
          </li>

          {{-- <li class="nav-item">
            <a class="nav-link " href="{{route('about')}}">About</a>
          </li> --}}

          <li class="nav-item">
            <a class="nav-link " href="{{route('property_grid')}}">Property</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="{{route('contact')}}">About Us</a>
          </li>
          <li class="nav-item dropdown">
            @guest
                @if (Route::has('authLogin'))
                <a class="nav-link" href="{{ route('authLogin') }}">{{ __('Login') }}</a>
                @endif
            @else
                <a class="nav-link dropdown-toggle" href="#">{{\Auth::user()->name}}</a>
                <div class="dropdown-menu">
                    @if(Auth::user()->role == 'admin')
                    <a class="dropdown-item " href="{{route('admin.index')}}">Management</a>
                    <a class="dropdown-item " href="{{ route('admin.pesan.index') }}">Message</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    @else
                    <a class="dropdown-item " href="{{route('user.index')}}">Message</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    @endif

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            @endguest
          </li>
        </ul>
      </div>
    </div>
  </nav><!-- End Header/Navbar -->

  @yield('content')

  <!-- ======= Footer ======= -->
  <section class="section-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">VillaBotosari</h3>
            </div>
            <div class="w-body-a">
              <p class="w-text-a color-text-a">
                Untuk info harga, temukan di aplikasi SEPAKAT.
              </p>
            </div>
            <div class="w-footer-a">
              <ul class="list-unstyled">
                <li class="color-a">
                  <span class="color-text-a">Layanan WA (Senin-Jumat, 08.00-17.00)</span><br>
                  08133-5258-080
                </li>
                <li class="color-a">
                  <span class="color-text-a">Layanan Telepon (Senin-Jumat, 08.00-17.00)</span><br>
                  Telkomsel: 08133-5258-181 <br>
                  XL: 0819-9038-2009 <br>
                  Three: 0897-2570-801 <br>
                </li>
                <li class="color-a">
                    <span class="color-text-a">Layanan Telepon/WA (di luar jam oprasional)</span><br>
                    0813-4226-2620
                  </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>
