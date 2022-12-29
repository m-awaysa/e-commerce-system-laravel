<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>
    <link rel="shortcut icon" href="{{asset('images/title-image.png')}}">
    <script src="https://kit.fontawesome.com/25a6d913fa.js" crossorigin="anonymous"></script>
    <!-- Box Icons  -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- Styles  -->
    <link rel="stylesheet" href="{{asset('css/publicStyle.css')}}">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


    @livewireStyles


<body class="body">

    <!-- ============= Home Section =============== -->
    <section class="home ">
        <div class="top-bar  nav shadow-1 navbar navbar-expand-lg">

            <button class="navbar-toggler btn btn-lg rounded-0 " type="button" data-bs-toggle="collapse"
                data-bs-target="#navmenu">
                <i class='bx bx-menu text-light'></i>
            </button>
            <!-- search form -->

            <form action="{{route('search')}}" class="search-form d-flex justify-content-center col-7 
            col-md-5  align-self-center align-items-center bg-light">


                <input type="text" name="search" class="form-control rounded-0  " placeholder="Search" id="search12" />

                <button type="submit" id="searchButton" class="btn btn-dark text-light rounded-0">
                    <i class="fas fa-search search-icon"></i>
                </button>

            </form>
            <div class="collapse navbar-collapse bg-dark" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    @auth
                    <li class="nav-item d-flex justify-content-center me-3">
                        <a href="{{route('logout')}}" class="nav-link text-light">Logout</a>
                    </li>
                    @else

                    <li class="nav-item d-flex justify-content-center  me-3">
                        <a href="{{route('login')}}" class="nav-link text-light">Login</a>

                        @endauth

                        @livewire('user.cart-counter')

                </ul>
            </div>


        </div>

        <div class="  col-12  shadow-1 text-light">
            <div class="container text-center  ">
                @auth
                @if(auth()->user()->role == 1)
                <a class="me-5 text-dark" href="{{route('dashboard')}}">Dashboard</a>
                @endif
                @endauth
                <a class="me-5 text-dark" href="{{route('home')}}">Home</a>

                <a class="me-5 text-dark" href="{{route('public.products')}}">Product</a>
                <a class="me-5 text-dark" href="{{route('public.category')}}">Category</a>
                @auth <a class="me-5 text-dark" href="{{route('discount')}}">Discount</a>@endauth
                @auth <a class="me-5 text-dark" href="{{route('salesman.info')}}">Account</a> @endauth
                <a class="me-5 text-dark" href="{{route('contactUs')}}">Contact Us</a>
                <a class="me-5 text-dark" href="{{route('readMe')}}">Read Me</a>
            </div>
        </div>
        @if(session('messageSuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> {{session('messageSuccess')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session('messageFail'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> {{session('messageFail')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif



        <!-- //errors from modal for guest request -->
        @error('product')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> {{$message}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @enderror

        @error('company_name')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> {{$message}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @enderror

        @error('phone_number')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> {{$message}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @enderror
        @error('note')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> {{$message}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @enderror
        @error('street')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> {{$message}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @enderror
        @error('city')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> {{$message}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @enderror
        @error('amount')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> {{$message}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @enderror
        @error('email')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> {{$message}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @enderror