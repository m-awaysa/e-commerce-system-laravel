<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>E-Commerce</title>
    <!-- bootstrap -->
    <!-- <link href="{{asset('css/all.min.css')}}" rel="stylesheet" type="text/css"> -->
    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/adminStyle.css')}}" rel="stylesheet">
    <!-- font awesome-->
    <script src="https://kit.fontawesome.com/25a6d913fa.js" crossorigin="anonymous"></script>
    <!-- //chart cdn -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js" crossorigin="anonymous"></script>
    <!-- jquery  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- bootstrap cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- links to use multiselect list  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>




</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa-solid fa-store text-warning"></i>
                </div>
                <div class="sidebar-brand-text mx-3">E-Comm<span class="text-warning">erce</span></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <li class="nav-item">
                <a class="nav-link" href="{{route('category')}}">
                    <i class="fa-solid fa-box-open text-light"></i>
                    <span>Category</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('product')}}">
                    <i class="fa-solid fa-shop text-light"></i>
                    <span>Product</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('order')}}">
                    <i class="fa-solid fa-shop text-light"></i>
                    <span>Orders</span>
                    <span class="badge badge-danger badge-counter mt-1">
                    +{{\App\Http\Controllers\Admin\OrderController::getOrderRequestCount()}}
                    </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('salesman')}}">
                    <i class="fa-solid fa-user-tie text-light"></i>
                    <span>Salesman</span>
                    <span class="badge badge-danger badge-counter mt-1">
                    +{{\App\Http\Controllers\Admin\SalesmanController::getRequestCount()}}
                    </span>
                </a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Layouts</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Layout:</h6>
                        <a class="collapse-item" href="{{route('layout.home')}}">Home</a>
                        <a class="collapse-item" href="#">Available soon</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="fa-solid fa-house-chimney text-light"></i></i>
                    <span>Home</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

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

                        @auth
                        <li class="nav-item  no-arrow">
                            <a href="{{route('logout')}}" class="mr-1 d-none d-sm-inline text-gray-600 ">Logout</a>
                        </li>
                        @endauth
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item  no-arrow">
                            <span class="mr-2 d-none d-sm-inline text-gray-600 small">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</span>


                        </li>


                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                