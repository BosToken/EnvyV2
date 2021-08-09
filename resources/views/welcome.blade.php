@extends('Partials.User.Navbar')

<title>Envy Product</title>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300&display=swap');

    .container {
        font-family: 'Montserrat', sans-serif;
    }

    /* .body {
        background-color: black;
        color: white;
    } */

</style>

@section('content')

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

            <hr>
            <div class="row mb-3">
                <h2>
                    <center>Product</center>
                </h2>
                <div class="col-md-3 mt-3">
                    <div class="shadow">
                        <a href="{{ url('product/men') }}"><img src="{{ asset('models/Men.jpg') }}" width="270"></a>
                    </div>
                    <p>
                    <h4>Men</h4>
                    </p>
                </div>
                <div class="col-md-3 mt-3">
                    <div class="shadow">
                        <a href="{{ url('product/woman') }}"><img src="{{ asset('models/Woman.jpg') }}" width="270"></a>
                    </div>
                    <p>
                    <h4>Woman</h4>
                    </p>
                </div>
                <div class="col-md-3 mt-3">
                    <div class="shadow">
                        <a href="{{ url('product/kid') }}"><img src="{{ asset('models/Kids.jpg') }}" width="270"></a>
                    </div>
                    <p>
                    <h4>Kids</h4>
                    </p>
                </div>
                <div class="col-md-3 mt-3">
                    <div class="shadow">
                        <a href="{{ url('product/bag') }}"><img src="{{ asset('models/Bag.jpg') }}" width="270"></a>
                    </div>
                    <p>
                    <h4>Bags</h4>
                    </p>
                </div>
            </div>

        </div>
    </div>

@endsection
