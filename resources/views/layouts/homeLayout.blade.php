<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>nyateet - @yield('title')</title>
    <meta name="description" content="your personal online to-do list">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/bootstrap/css/custom.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{asset('/assets/fonts/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/fonts/material-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/fonts/typicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/fonts/fontawesome5-overrides.min.css')}}">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="icon" href="/assets/img/whitecat.png">
</head>

<body id="page-top">


    <div id="wrapper">

      <!-- Navbar kiri -->
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="{{ route('todo.todayIndex') }}">
                    <div class="sidebar-brand-icon"><i class="fas fa-cat"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>nyateet</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    @if (auth()->check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('profile')}}">
                                <img class="border rounded-circle img-profile" src={{ asset('assets/img/avatars/avatar1.jpeg') }}>
                                <span>{{ Auth::user()->name }}</span>
                                <span style="font-size: 10px;opacity: 0.55;padding: 5px;padding-left: 5px;">
                                    <em>{{ Auth::user()->role }}</em> {{-- Supposec for group, no implementation yet --}}
                                </span>
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{route('todo.todayIndex')}}"><i class="material-icons">today</i><span>Today</span></a></li>
                        <li class="nav-item"></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('todo.activeIndex')}}"><i class="fas fa-running"></i><span>Active Task</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('todo.historyIndex')}}"><i class="fa fa-history"></i><span>History</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('logout')}}"><i class="far fa-user-circle"></i><span>Logout</span></a>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{route('login')}}"><i class="far fa-user-circle"></i><span>Login</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('register')}}"><i class="fas fa-user-circle"></i><span>Register</span></a></li>
                    @endif
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <!-- Navbar atas -->
                @auth
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{ route('todo.search') }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..." name="search" id="search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary py-0" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </nav>
                @endauth

              <!-- ISI -->
                <div class="container-fluid">
                    @yield('content')
                </div>

            </div>

            <!-- Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto fixed-bottom">
                    <div class="text-center my-auto copyright" style="padding: 20px;padding-left: 30%"><span>Copyright © nyateet 2020</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>

    <script src={{ asset('assets/js/jquery.min.js') }}></script>
    <script src={{ asset("assets/bootstrap/js/bootstrap.min.js") }}></script>
    <script src={{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js') }}></script>
    <script src= {{ asset('assets/js/theme.js') }}></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @yield('script')
</body>

</html>