<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  {{-- <link rel="icon" href="php " type="image/icon type"> --}}
  <title>Bank Indonesia | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- CSS -->
  <link rel="stylesheet" href="{{asset('/css/skin-blue-light.css')}}"> 
  <link rel="stylesheet" href="{{asset('/css/app.css')}}">
  <link rel="stylesheet" href="{{asset('/css/AdminLTE.css')}}">
  <link rel="stylesheet" href="{{asset('/css/font-awesome.css')}}">

</head>
<body class="skin-blue-light fixed sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="#" class="logo">
        <span class="logo-lg"><img src="#" class="logo"> </span>
      </a>
      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button -->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <p>
                  {{ Auth::user()->name }}
                  </p>
                <!--User Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                  <button>  <a href="#" class="btn-default">Profil</a> </button>
                  
                  </div>
                  <div class="pull-right">
                  <button>
                  <a href="{{ route('logout') }}" class="btn-default">Keluar</a>
                  </button> 
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    
    <!-- Side Bar -->
    <aside class="main-sidebar">
      <section class="sidebar">
          <hr>
            <div class="user-panel">
              <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a>{{ Auth::user()->role }}</a>
              </div>
            </div>
          <hr>
        <!-- Menu -->
        <ul class="sidebar-menu">
          {{-- @if (Auth::user()->role == 'Administrator')
            <li class="{{ request()->is('manajemen*') ? 'active' : '' }}">
              <a href="{{ route('users.index') }}"> --}}
                  <li>
                <i class="fa fa-user"></i> <span class="menu">Manajemen Pengguna</span>
                  </li>
              {{-- </a>
            </li>
          @endif --}}

          
          {{-- <li class="{{ (request()->is('sanksi-pelaporan*')) ? 'active' : '' }}">
            <a href="{{ route('forms.indexSP') }}"> --}}
                <li>
              <i class="fa fa-exclamation-circle"></i>
              <span class="menu">Sanksi Pelaporan</span>
            {{-- </a> --}}
          </li>

          {{-- <li class="{{ (request()->is('dokumen-sanksi*')) ? 'active' : '' }}"> 
            <a href="{{ route('forms.indexDS') }}"> --}}
            <li>
                <i class="fa fa-file"></i>
                <span class="menu">Dokumen Sanksi</span>
            {{-- </a> --}}
            </li>

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
</body>
</html>
