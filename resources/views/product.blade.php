@extends('Partials/User/Navbar')
@extends('Partials/User/Footer')

<title>Product</title>

@section('content')

    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('product') }}">Product</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row mb-3">
            <h2>
                <center>
                    Product
                </center>
            </h2>
            <div class="col">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-3 mt-4">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('products/bajutidur.jpg') }}" />
                    <div class="card-body">
                        <div class="card-title">
                            <h5>Baju Tidur</h5>
                            <p>Price : <strong> RP. 105.000 </strong></p>
                            <a href="{{ url('product/detail') }}" class="btn btn-success">
                                <i class="fas fa-cart-plus"></i>
                                Buy
                            </a>
                            <a href="{{ url('product/add') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                                Add
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection