<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edukate - Online Education Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('visitors') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('visitors') }}/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark">
        <div class="row py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center text-white">
                    <small><i class="fa fa-phone-alt mr-2"></i>+012 345 6789</small>
                    <small class="px-3">|</small>
                    <small><i class="fa fa-envelope mr-2"></i>info@example.com</small>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="{{ route('home') }}" class="navbar-brand ml-lg-3">
                <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-book-reader mr-3"></i>Edukate</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="{{ route('home') }}"
                        class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('about') }}"
                        class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                    <a href="{{ route('visitors_courses') }}"
                        class="nav-item nav-link {{ request()->routeIs('visitors_courses') ? 'active' : '' }}">Courses</a>
                    <a href="{{ route('feature') }}"
                        class="nav-item nav-link {{ request()->routeIs('feature') ? 'active' : '' }}">Our Features</a>
                    {{-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="detail.html" class="dropdown-item">Course Detail</a>
                            <a href="team.html" class="dropdown-item">Instructors</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        </div>
                    </div> --}}
                    <a href="{{ route('contact') }}"
                        class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                </div>
                <a href="{{ route('register') }}" class="btn btn-primary py-2 mx-2 px-4 d-none d-lg-block">Join Us</a>

                @if (auth()->Check())
                    <a href="{{ route('student_dashboard') }}"
                        class="btn btn-primary py-2 px-4 d-none d-lg-block">Dashboard</a>
                @endif


            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    @if (!route('register') && !route('login'))

        <div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
            <div class="container text-center my-5 py-5">
                @if (Request::is('/'))
                    {{-- Check if it's the home page --}}
                    <div>

                        <h1 class="text-white mt-4 mb-4">Learn From Home</h1>
                        <h1 class="text-white display-1 mb-5">Education Courses</h1>
                    </div>
                @else
                    {{-- For all other pages (e.g., About/Course) --}}
                    <div>

                        <h1 class="text-white display-1">{{ request()->segment(1) }}</h1>
                        <div class="d-inline-flex text-white mb-5">
                            <p class="m-0 text-uppercase"><a class="text-white" href="{{ route('home') }}">Home</a>
                            </p>
                            <i class="fa fa-angle-double-right pt-1 px-3"></i>
                            <p class="m-0 text-uppercase">{{ request()->segment(1) }}</p>
                        </div>
                    </div>
                @endif
                <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-light bg-white text-body px-4 dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Courses</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Courses 1</a>
                                <a class="dropdown-item" href="#">Courses 2</a>
                                <a class="dropdown-item" href="#">Courses 3</a>
                            </div>
                        </div>
                        <input type="text" class="form-control border-light" style="padding: 30px 25px;"
                            placeholder="Keyword">
                        <div class="input-group-append">
                            <button class="btn btn-secondary px-4 px-lg-5">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
    @endif

    <!-- Header End -->
