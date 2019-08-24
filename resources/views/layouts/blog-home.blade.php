<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home | Book Bar Online Lib</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bs-v4/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Font-Awesome CSS -->
    <link href="{{asset('css/font-awesome/css/all.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/bs-v4/heroic-features.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/bs-v4/home.css')}}">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}"><img class="logo-bookbar" src="/images/icons/bookbaricon.png" alt="BookBar logo"> <span class="logo-text">Book Bar</span></a>
        <div class="flex-grow-1 d-flex">
            <form class="nav-search form-inline flex-nowrap mx-0 mx-lg-auto rounded p-1">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search for a book...</button>
            </form>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('authors')}}">Authers</a>
                </li>

                @if (Route::has('login'))

                    @auth
                        @if(Auth::check())
                            @if(Auth::user()->isAdmin())
                                <li class="nav-item"><a class="nav-link" href="{{ url('auth/home') }}">Admin Panel</a></li>
                            @else
                                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Main Page</a></li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                </li>
                                <form id="logout-form" action="http://bookbar.test/logout" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endif
                        @endif
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>

                        @if (Route::has('register'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth

                @endif
            </ul>
        </div>
    </div>

</nav>

<!-- Page Content -->

<!-- Jumbotron Header -->
<header class="search-home jumbotron container-fluid my-4">
    <div id="particles-js"></div>
    <form action="/" method="GET">
        <div class="form-group" style="position: relative;">
            <input
                    style="height: 70px;"
                    placeholder="Book, Author or Book Category"
                    type="text"
                    class="form-control input-lg home_search_for"
                    name="search_for"
                    id="search_for"
                    required=""
                    autocomplete="off">
            <button
                    stop_loader="true"
                    type="submit"
                    class="btn btn-default book-bar-btn-b home-search-submit-btn"> &nbsp; Search &nbsp;
            </button>
            <i class="fa fa-search home-search-for-i"></i>
            <a href="/upload" class="pull-left upload-link-in-search">
                <i class="fa fa-upload"></i> Publish a Book
            </a>
        </div>
    </form>
</header>
<div class="container">


    <!-- Page Features -->
    <div class="row text-center">

        @yield('content')

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap script -->
<!-- Jquery -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/home.js')}}"></script>

</body>

</html>
