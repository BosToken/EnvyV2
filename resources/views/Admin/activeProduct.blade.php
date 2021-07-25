@extends('Partials.Admin.Sidebar')
@extends('Partials.Admin.Navbar')

<title>Active Product</title>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300&display=swap');

    .container {
        font-family: 'Montserrat', sans-serif;
    }

</style>

@section('content')
    <div class="container">
        <h2>
            <center><strong>Active Product</strong></center>
        </h2>
        <div class="row mt-3">
            <div class="col">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="row mb-4">
            @foreach ($product as $products)
                @if ($products->archive === 1)
                    @if ($products->quantity_product === 0)
                    @else
                        <div class="col-md-3 mt-4">
                            <div class="card shadow">
                                <img class="card-img-top" src="{{ asset('products/' . $products->image_product) }}" />
                                <div class="card-body">
                                    <div class="card-title">
                                        <h5>{{ $products->name_product }}</h5>
                                        <p>Price : <strong> RP. {{ $products->price_product }} </strong></p>
                                        <a href="{{ url('product/detail') }}" class="btn btn-success">
                                            <i class="fas fa-pen"></i>
                                        </a>
        
                                        <a href="{{ url('admin/addProduct/destroy', [$products->id]) }}" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                @endif
            @endforeach
        </div>
    </div>
@endsection
