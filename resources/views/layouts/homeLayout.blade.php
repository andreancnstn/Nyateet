<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  {{-- <link rel="icon" href="php " type="image/icon type"> --}}
  <title>Nyateet | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- CSS -->
  <link rel="stylesheet" href="{{asset('/css/skin-blue-light.css')}}"> 
  <link rel="stylesheet" href="{{asset('/css/app.css')}}">
  {{-- <link rel="stylesheet" href="{{asset('/css/custom.css')}}"> --}}

</head>
<body class="skin-blue-light fixed sidebar-mini">
  <div class="loader"></div>
  <div id="cover"></div>
  <div id="blur"></div>
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="#" class="logo">
        <span class="logo-mini"><img src="#" class="logo" alt="LOGO NYATEET 1 huruf aja"></span>
        <span class="logo-lg"><img src="#" class="logo" alt="LOGO NYATEET FULL"> </span>
      </a>
      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button -->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
          </div>
        </form>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account -->
          </ul>
        </div>
      </nav>
    </header>
    
    <!-- Side Bar -->
    <aside class="main-sidebar">
      <section class="sidebar">
          <hr>
            {{-- <div class="user-panel">
              <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a>{{ Auth::user()->role }}</a>
              </div>
            </div> --}}

            <div class="user-panel" style="height: 60px">
              <div class="pull-left image">
              <img src="#" class="img-circle" alt="User Image">
              </div>
              <div class="pull-left info">
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="hidden-xs">{{ Auth::user()->name }}</span>
                  </a>
                  <ul class="dropdown-menu">
                    <!--User Menu Footer-->
                    <li class="user-footer">
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                        @csrf
                        <button>
                          Keluar
                          </button> 
                      </form>
                      {{-- <div class="pull-right">
                      
                      </div> --}}
                    </li>
                  </ul>
                </li>
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                {{-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> --}}
              </div>
            </div>
          <hr>
        <!-- Menu -->
        <ul class="sidebar-menu">
          <li>
            <i class="fa fa-calendar-o" aria-hidden="true"></i>
            <span class="menu">Today</span>
          </li>
          <li>
            <i class="fa fa-check-square-o" aria-hidden="true"></i>
              <span class="menu">Active Task</span>
          </li>

          {{-- <li class="{{ (request()->is('dokumen-sanksi*')) ? 'active' : '' }}">
            <a href="{{ route('forms.indexDS') }}"> --}}
              <i class="fa fa-clock-o" aria-hidden="true"></i>
              <span class="menu">History</span>
            {{-- </a>
          </li> --}}

      </section> 
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content container-fluid">
          @yield('content')
      </section>
    </div>

  </div>

  <!-- mix JS -->
  <script src="{{asset('/js/app.js')}}"></script>

  @yield('script')
</body>
</html>
