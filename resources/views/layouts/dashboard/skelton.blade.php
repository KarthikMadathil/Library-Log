<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MCK Library</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="{{ asset('admin/styles/extras.1.1.0.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/styles/mine.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/styles/shards-dashboards.1.1.0.min.css') }}" id="main-stylesheet" data-version="1.1.0" rel="stylesheet">

    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </head>
  <body class="h-100"> 

    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
@include('layouts.dashboard.header')
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              <div class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                <div class="input-group input-group-seamless ml-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                  @csrf
                  <input class="navbar-search form-control" type="text" placeholder="Enter student reg number to login.." name="reg_no"  id="register_no"  onchange ="login()" autofocus aria-label="Search"> </div>
              </div>
              <ul class="navbar-nav border-left flex-row ">

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src="admin/images/avatars/0.jpg" alt="User Avatar">
                    <span class="d-none d-md-inline-block">{{ Auth::user()->name }}</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small">

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                      <i class="material-icons text-danger">&#xE879;</i>   {{ __('Logout') }} </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
                </li>
              </ul>
              <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                  <i class="material-icons">&#xE5D2;</i>
                </a>
              </nav>
            </nav>
          </div>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">@yield('sub-title')</span>
                <h3 class="page-title">@yield('title')</h3>
              </div>
            </div>
            <!-- End Page Header -->
              @yield('content')
          </div>


          <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            <!--
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>
            </ul>
          -->
            <span class="copyright ml-auto my-auto mr-2">Copyright © 2018
              <a href="https://verbalcodes.com" rel="nofollow">Verbalcodes</a>
            </span>
          </footer>
        </main>
      </div>
    </div>
    <div class="promo-popup animated">
      <a href="http://bit.ly/shards-dashboard-pro" class="pp-cta extra-action">
        <img src="https://dgc2qnsehk7ta.cloudfront.net/uploads/sd-blog-promo-2.jpg"> </a>
      <div class="pp-intro-bar"> Need More Help?
        <span class="close">
          <i class="material-icons">close</i>
        </span>
        <span class="up">
          <i class="material-icons">keyboard_arrow_up</i>
        </span>
      </div>
      <div class="pp-inner-content">
        <h2>Verbalcodes Pvt Ltd.</h2>
        <p>if you need any assistance please feel free to contact us 9809221199</p>
        <a class="pp-cta extra-action" href="tel:+919809221199">Contact</a>
        <a class="pp-cta extra-action" href="mailto:info@verbalcodes.com">Email</a>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="{{ asset('admin/scripts/app/app-blog-overview.1.1.0.js') }}" defer></script>
    <script src="{{ asset('admin/scripts/shards-dashboards.1.1.0.min.js') }}" defer></script>
    <script src="{{ asset('admin/scripts/extras.1.1.0.min.js') }}" defer></script>
    <!-- <script src="{{ asset('js/custom.js') }}" defer></script> -->
    @yield('scripts')



  </body>
</html>
