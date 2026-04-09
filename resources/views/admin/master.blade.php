@php
use App\Models\Setting;
$settings = Setting::first();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title',$settings->store_name)</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('proassets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">


    <!-- Custom styles for this template-->
    <link href="{{asset('proassets/css/sb-admin-2.min.css')}}" rel="stylesheet">
    @yield('styles')

    <style>
        .table th,
        .table td {
        vertical-align: middle
        }
    </style>

    {{-- {{app()->currentLocale()}} --}}
    @if(app()->currentLocale()=='ar')
        <style>

            .topbar .dropdown .dropdown-menu {
                width: auto;
                right: -35px;
            }
            .dropdown-menu {
                text-align: right;
            }


            body {
                direction: rtl;
                text-align: right;
            }

            .sidebar {
                padding: 0
            }
            .sidebar .nav-item .nav-link{
                text-align: right;
            }
            .sidebar .nav-item .nav-link[data-toggle=collapse]::after{
                float: left;
                transform: rotate(180deg)
            }

            .ml-auto, .mx-auto {
                margin-right: auto !important;
                margin-left: 0 !important;
            }
            .scroll-to-top{
                left: 1rem !important;
                right: 90rem ;
            }

            .sidebar.toggled #sidebarToggle::after {
                font-weight: 900;
                content: '\f104';
                font-family: 'Font Awesome 5 Free';
                margin-right: 7px;
            }

            /* .sidebar #sidebarToggle::after */
            .sidebar #sidebarToggle::after {
                content: '\f105';
                font-family: 'Font Awesome 5 Free';
                margin-left: .25rem;
            }

        </style>
    @endif



</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('site.index')}}">
                <div class="sidebar-brand-icon ">
                    <i class="fas fa-store"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{$settings->store_name}}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.index')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{__('admin.dashboard')}}</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <!-- Nav Item - Pages Categories Menu -->
            <li class="nav-item ">
                <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseCategories"
                    aria-expanded="true" aria-controls="collapseCategories">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>{{__('admin.categories')}}</span>
                </a>
                <div id="collapseCategories" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('admin.categories.index')}}">{{__('admin.all_categories')}}</a>
                        <a class="collapse-item" href="{{route('admin.categories.create')}}">{{__('admin.add_new')}}</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Products Menu -->
            <li class="nav-item ">
                <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseProducts"
                    aria-expanded="true" aria-controls="collapseProducts">
                    <i class="fas fa-fw fa-heart"></i>
                    <span>{{__('admin.products')}}</span>
                </a>
                <div id="collapseProducts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('admin.products.index')}}">{{__('admin.all_products')}}</a>
                        <a class="collapse-item" href="{{route('admin.products.create')}}">{{__('admin.add_new')}}</a>
                    </div>
                </div>
            </li>

                          <!-- Nav Item - Reviews -->
                          <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="fas fa-fw fa-star"></i>
                                <span>{{__('admin.reviews')}}</span></a>
                        </li>

                         <!-- Nav Item - Orders -->
                         <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.orders.index')}}">
                                <i class="fas fa-fw fa-shopping-cart"></i>
                                <span>{{__('admin.orders')}}</span></a>
                        </li>


                         <!-- Nav Item - Payments -->
                         <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.payments.index')}}">
                                <i class="fas fa-fw fa-money-bill"></i>
                                <span>{{__('admin.payments')}}</span></a>
                        </li>

                          <!-- Nav Item - Customers -->
                          <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.users.index')}}">
                                <i class="fas fa-fw fa-users"></i>
                                <span>{{__('admin.customers')}}</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.settings')}}">
                                <i class="fas fa-cog"></i>
                                <span>{{__('admin.settings')}}</span></a>
                        </li>






            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Languages
                            </a>

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <a class="dropdown-item " rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                @endforeach
                            </div>
                        </li>



                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    {{__('admin.alerts_center')}}
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">{{__('admin.show_all_alerts')}}</a>
                            </div>
                        </li>



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('uploads/users/'.Auth::user()->image)}}">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> {{ __('admin.logout') }}
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                    @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; {{$settings->store_name }} {{date('Y')}} </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('proassets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('proassets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('proassets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('proassets/js/sb-admin-2.min.js')}}"></script>
    <script src="{{asset('bootstrap/bootstrap.min.js')}}"></script>


</body>

</html>
