@extends('Partials.User.Navbar')


<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300&display=swap');

    .container {
        font-family: 'Montserrat', sans-serif;
    }

</style>

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header">
                        <i class="fab fa-product-hunt"></i> Product
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($product as $products)
                            <title>{{ $products->name_product }}</title>
                            <li class="list-group-item">
                                <div class="col md-3">
                                    <img class="shadow" style="border-radius: 5px"
                                        src="{{ asset('products/' . $products->image_product) }}" width="100">
                                </div>
                                <div class="col md-3">
                                    <b> {{ $products->name_product }} <br>
                                        RP. {{ number_format($products['price_product']) }}</b>
                                </div>
                                <br>
                                <input type="text" class="form-control" id="product_note" name="product_note"
                                    placeholder="Noted">
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <br>
        <div class="row mb-3">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header">
                        <i class="fas fa-box"></i> Shipping & Payment
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            @foreach ($address as $addresss)
                                <span class="badge bg-secondary">
                                    Main
                                </span><b> {{ $user->username }}</b> ({{ $user->phone }})
                                <br>{{ $addresss->address }} ({{ $addresss->post }}), {{ $addresss->city }},
                                {{ $addresss->province }}, {{ $addresss->country }}. 
                            @endforeach
                        </li>
                        <li class="list-group-item">
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#chooseCourier">
                                Choose Courier <i class="fas fa-chevron-right"></i>
                            </button>
                        </li>
                        <li class="list-group-item">
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#choosePayment">
                                Choose Payment <i class="fas fa-chevron-right"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <br>
        <div class="row mb-3">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header">
                        <i class="far fa-credit-card"></i> Shopping Summary
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            Total Price : RP. {{ number_format($products['price_product']) }} <br>
                            Shipping Cost : RP. 20,000 <br>
                            Insurance : RP. 1,000 
                        </li>
                        <li class="list-group-item">
                            Total Bill : RP. IDK
                        </li>
                        <li class="list-group-item">
                            <button type="button" class="btn btn-success"><i class="far fa-check-square"></i> PAY</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
