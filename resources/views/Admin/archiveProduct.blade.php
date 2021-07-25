@extends('Partials.Admin.Sidebar')
@extends('Partials.Admin.Navbar')

<title>Archive Product</title>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300&display=swap');

    .container {
        font-family: 'Montserrat', sans-serif;
    }

</style>

@section('content')
    <div class="container">
        <h2>
            <center><strong>Archive Product</strong></center>
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
                @if ($products->archive === 2)
                    <div class="col-md-3 mt-4">
                        <div class="card shadow">
                            <img class="card-img-top" src="{{ asset('products/' . $products->image_product) }}" />
                            <div class="card-body">
                                <div class="card-title">
                                    <h5>{{ $products->name_product }}</h5>
                                    <p>Price : <strong> RP. {{ $products->price_product }} </strong></p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#archiveProduct{{ $products->id }}">
                                        <i class="fas fa-check"></i>
                                    </button>

                                    <a href="{{ url('admin/addProduct/destroy', [$products->id]) }}" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                @endif


                    <!-- Archive Modal -->
                    <div class="modal fade" id="archiveProduct{{ $products->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form action="{{ url('admin/archiveProduct/update', [$products->id]) }}" method="POST">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        <h5><strong>
                                                <center>Active Product</center>
                                            </strong></h5>
                                        <div class="mb-3">
                                            <label for="archive">Archive</label>
                                            <select class="form-select" aria-label="Default select example" id="archive" for="archive" name="archive">
                                                @if ($products->archive === 2)
                                                <option selected value=2>Yes</option>
                                                <option value=1>No</option>
                                                @else
                                                <option selected value=1>No</option>
                                                <option value=2>Yes</option>
                                                @endif
                                            </select>
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
