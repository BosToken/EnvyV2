<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

{{-- Font --}}
<script src="https://kit.fontawesome.com/a47e0565cc.js" crossorigin="anonymous"></script>

<style>
    .navbar {
        background-color: #fff;
    }

</style>

@extends('Partials/User/Footer')

@section('navbar')

    <head>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                            <a class="navbar-brand" href="{{ url('') }}">AppTitle</a>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ url('product') }}">Product</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Men
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Shirt</a></li>
                                    <li><a class="dropdown-item" href="#">TShirt</a></li>
                                    <li><a class="dropdown-item" href="#">Jacket</a></li>
                                    <li><a class="dropdown-item" href="#">Hoodie</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Woman
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Shirt</a></li>
                                    <li><a class="dropdown-item" href="#">TShirt</a></li>
                                    <li><a class="dropdown-item" href="#">Jacket</a></li>
                                    <li><a class="dropdown-item" href="#">Hoodie</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Kids
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Shirt</a></li>
                                    <li><a class="dropdown-item" href="#">TShirt</a></li>
                                    <li><a class="dropdown-item" href="#">Jacket</a></li>
                                    <li><a class="dropdown-item" href="#">Hoodie</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="navbar-nav mt-auto mb-2">
                            @if($user)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-users"></i>
                                    {{$user->username}}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if($user->role === 1)
                                    <li><a class="dropdown-item" href="{{ url('admin/dashboard') }}">Admin Pages</a></li>
                                    <hr>
                                    @else
                                    @endif
                                    <li><a class="dropdown-item" href="{{ url('profile') }}">Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ url('setting') }}">Setting</a></li>
                                    <li><a class="dropdown-item" href="{{ url('logout') }}">Logout</a></li>
                                </ul>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ url('login') }}">
                                    <i class="fas fa-users"></i>
                                    SignIn/SignUp
                                </a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ url('Cart') }}">
                                    Cart
                                    <i class="fas fa-cart-plus"></i>
                                    <span class="badge bg-danger">0</span>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </nav>
    </head>

    @yield('content')

    @section('footer')
    @endsection
