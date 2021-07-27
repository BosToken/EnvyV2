@extends('Partials.Admin.Sidebar')
@extends('Partials.Admin.Navbar')

<title>Add Product</title>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300&display=swap');

    .container {
        font-family: 'Montserrat', sans-serif;
    }

</style>

@section('content')
    <div class="container">
        <h2>
            <center><strong>Product</strong></center>
        </h2>
        <div class="row mt-3">
            <div class="col">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                </form>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">
                    <i class="fas fa-plus"></i>
                    Add
                </button>
            </div>
        </div>

        <div class="row mb-4">
            @foreach ($product as $products)
                <div class="col-md-3 mt-4">
                    <div class="card shadow">
                        <img class="card-img-top" src="{{ asset('products/' . $products->image_product) }}" />
                        <div class="card-body">
                            <div class="card-title">
                                <h5>{{ $products->name_product }}</h5>
                                <p>Price : RP. <strong>{{ number_format($products['price_product']) }}</strong></p>
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
            @endforeach
        </div>

        <!-- Add Address Modal -->
        <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ url('admin/addProduct/store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <h5><strong>
                                    <center>Add Product</center>
                                </strong></h5>
                            <div class="mb-3">
                                <label for="name_product">Name Product</label>
                                <input type="text" class="form-control" id="name_product" for="name_product" name="name_product" required>
                            </div>
                            <div class="md-3">
                                <div class="form-group">
                                <label for="description_product" class="form-label">Description</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        </div>
                                        <textarea class="form-control" aria-label="With textarea" name="description_product" type="text"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="image_product">Image</label>
                                <input type="file" class="form-control" id="image_product" for="image_product" name="image_product" required>
                            </div>
                            <div class="mb-3">
                                <label for="price_product">Price</label>
                                <input type="number" class="form-control" id="price_product" for="price_product" name="price_product"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="quantity_product">Quantity Product</label>
                                <input type="number" class="form-control" id="quantity_product" for="quantity_product" name="quantity_product" required>
                            </div>
                            <div class="mb-3">
                                <label for="gender_id">Gender</label>
                                <select class="form-select" aria-label="Default select example" id="gender_id" for="gender_id" name="gender_id">
                                    @foreach ($gender as $genders)
                                    <option value={{$genders->id}}>{{$genders->name_gender}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="type_id">Type</label>
                                <select class="form-select" aria-label="Default select example" id="type_id" for="type_id" name="type_id">
                                    @foreach ($type as $types)
                                    <option value={{$types->id}}>{{$types->name_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="size">Size</label>
                                <select class="form-select" aria-label="Default select example" id="size" for="size" name="size">
                                    <option selected value='S'>S</option>
                                    <option value='M'>M</option>
                                    <option value='L'>L</option>
                                    <option value='XL'>XL</option>
                                    <option value='XXL'>XXL</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="color">color</label>
                                <input type="text" class="form-control" id="color" for="color" name="color" required>
                            </div>
                            <div class="mb-3">
                                <label for="archive">Archive</label>
                                <select class="form-select" aria-label="Default select example" id="archive" for="archive" name="archive">
                                    <option selected value=1>No</option>
                                    <option value=2>Yes</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add</button>
                            <button type="reset" class="btn btn-secondary"><i class="fas fa-redo"></i> Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

@endsection
