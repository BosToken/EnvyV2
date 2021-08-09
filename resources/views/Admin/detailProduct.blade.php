@extends('Partials.Admin.Sidebar')
@extends('Partials.Admin.Navbar')

<title>Detail Product</title>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300&display=swap');

    .container {
        font-family: 'Montserrat', sans-serif;
    }

</style>

@section('content')
    <div class="container">
        <h2>
            <center><strong>Detail Product</strong></center>
        </h2>
        <div class="row mt-3">
            <div class="col">

            </div>
        </div>
        @foreach ($product as $products)
            <div class="row mb-3">
                <div class="col md-6">
                    <img class="shadow" style="border-radius: 10px"
                        src="{{ asset('products/' . $products->image_product) }}" width="200">
                    <br>
                    <button type="button" href="" class="btn" data-bs-toggle="modal"
                        data-bs-target="#editImg{{ $products->id }}">
                        <i class="fas fa-pen"></i>
                    </button>
                    <br><br>

                    Price : RP. <strong>{{ number_format($products['price_product']) }}</strong><br>
                    Archive
                    @if ($products->archive === 1)
                        <i class="fas fa-times"></i>
                    @elseif ($products->archive === 2)
                        <i class="fas fa-check"></i>
                    @else
                    @endif<br>
                    Status :
                    @if ($products->quantity_product === 0)
                        This item is not in stock
                    @else
                        This item is ready
                    @endif <br><br>
                    <button type="button" href="" class="btn btn-success " data-bs-toggle="modal"
                        data-bs-target="#editProduct{{ $products->id }}">
                        <i class="fas fa-pen"></i> Edit
                    </button>
                </div>
                <br>

                <div class="col md-6">
                    Name Product <br>
                    <strong>{{ $products->name_product }}</strong><br><br>
                    Description Product <br>
                    <strong>{{ $products->description_product }}</strong><br><br>
                    Gender <br>
                    <strong>
                        @if ($products->gender_id === 1) Men

                        @elseif ($products->gender_id === 2) Woman

                        @elseif ($products->gender_id === 3) Kids

                        @elseif ($products->gender_id === 4) Bag

                        @else
                            {{ $products->gender_id }}
                        @endif
                    </strong><br><br>
                    Stock <br>
                    <strong>{{ $products->quantity_product }}</strong><br><br>
                    Size <br>
                    <strong>{{ $products->size }}</strong><br><br>
                    Color <br>
                    <strong>{{ $products->color }}</strong><br><br>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary"><i class="fas fa-undo-alt"></i> Back</a>
                </div>
            </div>
            
            <!-- Edit Image Modal -->
            <div class="modal fade" id="editImg{{ $products->id }}"" tabindex=" -1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="{{ url('admin/detailProduct/imgUpdate', [$products->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <h5><strong>
                                        <center>Image Product</center>
                                    </strong></h5>
                                <div class="mb-3">
                                    <input type="file" class="form-control" id="image_product" for="image_product"
                                        name="image_product" required>
                                </div>
                                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Edit Product Modal -->
            <div class="modal fade" id="editProduct{{ $products->id }}"" tabindex=" -1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="{{ url('admin/detailProduct/update', [$products->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <h5><strong>
                                        <center>Edit Product</center>
                                    </strong></h5>
                                <div class="mb-3">
                                    <label for="name_product">Name Product</label>
                                    <input type="text" class="form-control" id="name_product" for="name_product"
                                        name="name_product" value="{{ $products->name_product }}" required>
                                </div>
                                <div class="md-3">
                                    <div class="form-group">
                                        <label for="description_product" class="form-label">Description</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            </div>
                                            <textarea class="form-control" aria-label="With textarea"
                                                name="description_product"
                                                type="text">{{ $products->description_product }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="price_product">Price</label>
                                    <input type="number" class="form-control" id="price_product" for="price_product"
                                        name="price_product" value="{{ $products->price_product }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="quantity_product">Quantity Product</label>
                                    <input type="number" class="form-control" id="quantity_product" for="quantity_product"
                                        name="quantity_product" value="{{ $products->quantity_product }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="gender_id">Gender</label>
                                    <select class="form-select" aria-label="Default select example" id="gender_id"
                                        for="gender_id" name="gender_id">
                                        <option selected value={{ $products->gender_id }}>
                                            @if ($products->gender_id === 1)
                                                Men
                                            @elseif( $products->gender_id === 2)
                                                Woman
                                            @elseif( $products->gender_id === 3)
                                                Kids
                                            @elseif( $products->gender_id === 4)
                                                Bags
                                            @else
                                            @endif
                                        </option>
                                        @foreach ($gender as $genders)
                                            <option value={{ $genders->id }}>{{ $genders->name_gender }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="type_id">Type</label>
                                    <select class="form-select" aria-label="Default select example" id="type_id"
                                        for="type_id" name="type_id">
                                        <option selected value={{ $products->type_id }}>
                                            @if ($products->type_id === 1)
                                                Shirt
                                            @elseif( $products->type_id === 2)
                                                TShirt
                                            @elseif( $products->type_id === 3)
                                                Jacket
                                            @elseif( $products->type_id === 4)
                                                Hoodie
                                            @else
                                            @endif
                                        </option>
                                        @foreach ($type as $types)
                                            <option value={{ $types->id }}>{{ $types->name_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="size">Size</label>
                                    <select class="form-select" aria-label="Default select example" id="size" for="size"
                                        name="size">
                                        @if ($products->size === 'S')
                                            <option selected value='S'>S</option>
                                            <option value='S'>S</option>
                                            <option value='M'>M</option>
                                            <option value='L'>L</option>
                                            <option value='XL'>XL</option>
                                            <option value='XXL'>XXL</option>
                                        @elseif( $products->size === 'M')
                                            <option selected value='M'>M</option>
                                            <option value='S'>S</option>
                                            <option value='M'>M</option>
                                            <option value='L'>L</option>
                                            <option value='XL'>XL</option>
                                            <option value='XXL'>XXL</option>
                                        @elseif( $products->size === 'L')
                                            <option selected value='L'>L</option>
                                            <option value='S'>S</option>
                                            <option value='M'>M</option>
                                            <option value='L'>L</option>
                                            <option value='XL'>XL</option>
                                            <option value='XXL'>XXL</option>
                                        @elseif( $products->size === 'XL')
                                            <option selected value='XL'>XL</option>
                                            <option value='S'>S</option>
                                            <option value='M'>M</option>
                                            <option value='L'>L</option>
                                            <option value='XL'>XL</option>
                                            <option value='XXL'>XXL</option>
                                        @elseif( $products->size === 'XXL')
                                            <option selected value='XXL'>XXL</option>
                                            <option value='S'>S</option>
                                            <option value='M'>M</option>
                                            <option value='L'>L</option>
                                            <option value='XL'>XL</option>
                                            <option value='XXL'>XXL</option>
                                        @else
                                            <option selected value='S'>S</option>
                                            <option value='M'>M</option>
                                            <option value='L'>L</option>
                                            <option value='XL'>XL</option>
                                            <option value='XXL'>XXL</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="color">color</label>
                                    <input type="text" class="form-control" id="color" for="color" name="color"
                                        value="{{ $products->color }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="archive">Archive</label>
                                    <select class="form-select" aria-label="Default select example" id="archive"
                                        for="archive" name="archive">
                                        @if ($products->archive === 1)
                                            <option selected value=1>No</option>
                                            <option value=2>Yes</option>
                                        @elseif ($products->archive === 2)
                                            <option selected value=2>No</option>
                                            <option value=1>Yes</option>
                                        @else
                                        @endif
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        @endforeach
    </div>
@endsection
