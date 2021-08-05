@extends('Partials.Admin.Sidebar')
@extends('Partials.Admin.Navbar')

<title>Closed Product</title>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300&display=swap');

    .container {
        font-family: 'Montserrat', sans-serif;
    }

</style>

@section('content')
    <div class="container">
        <h2>
            <center>
                <strong>
                    Closed Product
                </strong>
            </center>
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
                        <div class="col-md-3 mt-4">
                            <div class="card shadow">
                                <img class="card-img-top" src="{{ asset('products/' . $products->image_product) }}" />
                                <div class="card-body">
                                    <div class="card-title">
                                        <h5>{{ $products->name_product }}</h5>
                                        <p>Price : RP. <strong>{{ number_format($products['price_product']) }}</strong>
                                        </p>

                                        <a href="{{ url('admin/detailProduct/detail', [$products->id]) }}"
                                            class="btn btn-success">
                                            <i class="fas fa-pen"></i>
                                        </a>

                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#closedProduct{{ $products->id }}">
                                            <i class="fas fa-plus"></i>
                                        </button>

                                        <a href="{{ url('admin/addProduct/destroy', [$products->id]) }}"
                                            class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                    @endif
                @else
                @endif

                <!-- Closed Modal -->
                <div class="modal fade" id="closedProduct{{ $products->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action="{{ url('admin/closedProduct/update', [$products->id]) }}" method="POST">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <h5><strong>
                                            <center>Add Stock</center>
                                        </strong></h5>
                                    <div class="mb-3">
                                        <label for="quantity_product">Stock</label>
                                        <input type="number" class="form-control" id="quantity_product"
                                            for="quantity_product" name="quantity_product"
                                            value="{{ $products->quantity_product }}" required>
                                    </div>
                                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>
                                        Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
