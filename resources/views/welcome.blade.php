@extends('Partials.User.Navbar')
@extends('Partials.User.Footer')

<title>Envy Product</title>

@section('content')

    <head>
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/app.css') !!}">
    </head>

    <div class="body">
        <div class="container">

            <div class="d-none d-md-block">
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="d-flex h-100">
                            <div class="justify-content-center align-self-center">
                                <h1>
                                    <div class="font-size-a">Show Up Your,</div>
                                </h1>
                                <h5>
                                    <div class="font-size-b">Best Style</div>
                                </h5>
                                <a href="{{ url('product') }}">
                                    <button class="btn btn-lg btn-dark">
                                        <i class="fas fa-arrow-right"></i> More
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('assets/Left_Blog.png') }}" width="100%" />
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    
                </div>
            </div>

        </div>
    </div>

@endsection