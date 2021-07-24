<link rel="stylesheet" type="text/css" href="{!! asset('assets/sidebar.css') !!}">
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('/css/sidebar.js') }}"> --}}

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
{{-- Font --}}
<script src="https://kit.fontawesome.com/a47e0565cc.js" crossorigin="anonymous"></script>

<script>
    jQuery(function($) {

        $(".sidebar-dropdown > a").click(function() {
            $(".sidebar-submenu").slideUp(200);
            if (
                $(this)
                .parent()
                .hasClass("active")
            ) {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .parent()
                    .removeClass("active");
            } else {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .next(".sidebar-submenu")
                    .slideDown(200);
                $(this)
                    .parent()
                    .addClass("active");
            }
        });

        $("#close-sidebar").click(function() {
            $(".page-wrapper").removeClass("toggled");
        });
        $("#show-sidebar").click(function() {
            $(".page-wrapper").addClass("toggled");
        });




    });
</script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Sidebar template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">


</head>

@section('sidebar')

    <body>
        <div class="page-wrapper chiller-theme toggled">
            <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
                <i class="fas fa-bars"></i>
            </a>
            <nav id="sidebar" class="sidebar-wrapper">
                <div class="sidebar-content">
                    <div class="sidebar-brand">
                        <a href="#">AppTitle</a>
                    </div>
                    <div class="sidebar-header">
                        <div class="user-info">
                            <span class="user-name">
                                <i class="fas fa-users"></i>
                                <strong>{{ $user->username }}</strong>
                            </span>
                            <span class="user-role">Administrator</span>
                        </div>
                    </div>
                    <!-- sidebar-search  -->
                    <div class="sidebar-menu">
                        <ul>
                            <li class="header-menu">
                                <span class="text-light">General</span>
                            </li>
                            <li class="sidebar">
                                <a href="{{ url('admin/dashboard') }}">
                                    {{-- <i class="fa fa-tachometer-alt"></i> --}}
                                    <i class="fas fa-clipboard-list"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar">
                                <a href="{{url('/admin/addProduct')}}">
                                    {{-- <i class="fa fa-shopping-cart"></i> --}}
                                    <i class="fas fa-folder-plus"></i>
                                    <span>Add Product</span>
                                </a>
                            </li>
                            <li class="sidebar">
                                <a href="#">
                                    {{-- <i class="far fa-gem"></i> --}}
                                    <i class="fas fa-check"></i>
                                    <span>Active Product</span>
                                </a>
                            </li>
                            <li class="sidebar">
                                <a href="#">
                                    {{-- <i class="fa fa-chart-line"></i> --}}
                                    <i class="fas fa-times"></i>
                                    <span>Closed Product</span>
                                </a>
                            </li>
                            <li class="sidebar">
                                <a href="#">
                                    {{-- <i class="fa fa-globe"></i> --}}
                                    <i class="fas fa-file-archive"></i>
                                    <span>Archive Product</span>
                                </a>
                            </li>
                            <li class="sidebar">
                                <a href="#">
                                    {{-- <i class="fa fa-globe"></i> --}}
                                    <i class="fas fa-exchange-alt"></i>
                                    <span>Transaction</span>
                                </a>
                            </li>
                            <li class="sidebar">
                                <a href="#">
                                    {{-- <i class="fa fa-globe"></i> --}}
                                    <i class="fas fa-history"></i>
                                    <span>History Transaction</span>
                                </a>
                            </li>
                            <br>
                            <li class="header-menu">
                                <span class="text-light">Extra</span>
                            </li>
                            <li>
                                <a href="#">
                                    {{-- <i class="fa fa-book"></i> --}}
                                    <span>Documentation</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    {{-- <i class="fa fa-calendar"></i> --}}
                                    <span>Calendar</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    {{-- <i class="fa fa-folder"></i> --}}
                                    <span>Examples</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- sidebar-menu  -->
            </nav>
            <!-- sidebar-wrapper  -->

            <main class="page-content">
                @yield('content')
            </main>

            <!-- page-content" -->
        </div>

    </body>

    </html>
