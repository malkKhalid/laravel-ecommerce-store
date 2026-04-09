@php
    use App\Models\Category;
use App\Models\Setting;
$settings = Setting::first();
@endphp
<!DOCTYPE html>



<html lang="en">

<head>

    <!-- ** Basic Page Needs ** -->
    <meta charset="utf-8">
    <title>@yield('title',env('APP_NAME'))</title>

    <!-- ** Mobile Specific Metas ** -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Agency HTML Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Classified Marketplace Template v1.0">

    <!-- theme meta -->
    <meta name="theme-name" content="classimax" />

    <!-- favicon -->
    <link href="{{ asset('siteassets/images/favicon.png') }}" rel="shortcut icon">

    <!--
  Essential stylesheets
  =====================================-->
    <link href="{{ asset('siteassets/plugins/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('siteassets/plugins/bootstrap/bootstrap-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('siteassets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('siteassets/plugins/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('siteassets/plugins/slick/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('siteassets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">

    <link href="{{ asset('siteassets/css/style.css') }}" rel="stylesheet">

</head>

<body class="body-wrapper">


    <header>
        <div class="container">



            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light navigation">
                        <a class="navbar-brand" href="{{route('site.index')}}">
                            <h1 style="color: rgb(0, 0, 0)">{{$settings->store_name}}</h1>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto main-nav ">
                                <li class="nav-item {{ request()->routeIs('site.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{route('site.index')}}">{{__('site.home')}}</a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('site.shop') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{route('site.shop')}}">{{__('site.shope')}}</a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('site.all_blog') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{route('site.all_blog')}}">{{__('site.blog')}}</a>
                                </li>

                                <li class="nav-item dropdown dropdown-slide @@pages">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        {{__('admin.categories')}} <span><i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <!-- Dropdown list -->
                                    <ul class="dropdown-menu">
                                        @foreach (Category::orderByDesc('id')->limit(4)->get() as $category )
                                            <li><a class="dropdown-item @@package" href="{{route('site.category',$category->id )}}">{{$category->name_en}}</a></li>
                                        @endforeach
                                        <li><strong><a class="dropdown-item @@package"
                                            href="{{route('site.all_category')}}"> <strong> {{__('admin.all_categories')}} </strong></a></strong></li>

                                    </ul>
                                </li>


                            </ul>
                            <ul class="navbar-nav ml-auto mt-10">
                                <li class="nav-item">
                                    @auth
                                    <a class="nav-link login-button"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('site.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    @endauth

                                    @guest
                                    <a class="nav-link login-button" href="{{route('login')}}" >{{__('site.login')}}</a>
                                    @endguest
                                </li>

                                <li class="nav-item {{ request()->routeIs('site.cart') ? 'active' : '' }}">
                                    <a class="nav-link text-black" href="{{route('site.cart')}}"><i
                                        class="fa fa-shopping-cart"></i> {{__('site.cart')}}</a>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>




    @yield('content')



    <!--============================
=            Footer            =
=============================-->

    <footer class="footer section section-sm">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0 mb-4 mb-lg-0">
                    <!-- About -->
                    <div class="block about">
                        <!-- footer logo -->
                        <a  href="{{route('site.index')}}">
                            <h1 style="color: rgb(255, 255, 255)">{{$settings->store_name}}</h1>
                        </a>
                        <!-- description -->
                        <p class="alt-color">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <!-- Link list -->
                <div class="col-lg-2 offset-lg-1 col-md-3 col-6 mb-4 mb-lg-0">
                    <div class="block">
                        <h4>Site Pages</h4>
                        <ul>
                            <li><a href="">My Ads</a></li>
                            <li><a href="">Favourite Ads</a></li>
                            <li><a href="">Archived Ads</a></li>
                            <li><a href="">Pending Ads</a></li>
                            <li><a href="">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Link list -->
                <div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0 col-6 mb-4 mb-md-0">
                    <div class="block">
                        <h4>Admin Pages</h4>
                        <ul>
                            <li><a href="">Category</a></li>
                            <li><a href="">Single Page</a></li>
                            <li><a href="">Store Single</a></li>
                            <li><a href="">Single Post</a>
                            </li>
                            <li><a href="">Blog</a></li>



                        </ul>
                    </div>
                </div>
                <!-- Promotion -->
                <div class="col-lg-4 col-md-7">
                    <!-- App promotion -->
                    <div class="block-2 app-promotion">
                        <div class="mobile d-flex  align-items-center">
                            <a href="">
                                <!-- Icon -->
                                <img src="{{ asset('siteassets/images/footer/phone-icon.png') }}" alt="mobile-icon">
                            </a>
                            <p class="mb-0">Get the Dealsy Mobile App and Save more</p>
                        </div>
                        <div class="download-btn d-flex my-3">
                            <a href=""><img
                                    src="{{ asset('siteassets/images/apps/google-play-store.png') }}"
                                    class="img-fluid" alt=""></a>
                            <a href="" class=" ml-3"><img
                                    src="{{ asset('siteassets/images/apps/apple-app-store.png') }}" class="img-fluid"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </footer>
    <!-- Footer Bottom -->
    <footer class="footer-bottom">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left mb-3 mb-lg-0">
                    <!-- Copyright -->
                    <div class="copyright">
                        <p>Copyright &copy;
                            <script>
                                var CurrentYear = new Date().getFullYear()
                                document.write(CurrentYear)
                            </script>. Designed & Developed by <a class="text-white"
                                href="">{{$settings->store_name}}</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Social Icons -->
                    <ul class="social-media-icons text-center text-lg-right">
                        <li><a class="fa fa-facebook" href=""></a></li>
                        <li><a class="fa fa-twitter" href=""></a></li>
                        <li><a class="fa fa-pinterest-p" href=""></a></li>
                        <li><a class="fa fa-github-alt" href=""></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Container End -->
        <!-- To Top -->
        <div class="scroll-top-to">
            <i class="fa fa-angle-up"></i>
        </div>
    </footer>

    <!--
Essential Scripts
=====================================-->
    <script src="{{ asset('siteassets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('siteassets/plugins/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('siteassets/plugins/bootstrap/bootstrap.min.j') }}s"></script>
    <script src="{{ asset('siteassets/plugins/bootstrap/bootstrap-slider.js') }}"></script>
    <script src="{{ asset('siteassets/plugins/tether/js/tether.min.js') }}"></script>
    <script src="{{ asset('siteassets/plugins/raty/jquery.raty-fa.js') }}"></script>
    <script src="{{ asset('siteassets/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('siteassets/plugins/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
    <script src="{{ asset('siteassets/plugins/google-map/map.js') }}" defer></script>

    <script src="{{ asset('siteassets/js/script.js') }}"></script>

</body>

</html>
