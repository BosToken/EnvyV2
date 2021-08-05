@extends('Partials.User.Navbar')

<title>Cart</title>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300&display=swap');

    .container {
        font-family: 'Montserrat', sans-serif;
    }

</style>

@section('content')
    <div class="container">
        <center>
            <h2>Cart</h2>
        </center>
        <div class="row mt-3">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    @php $number=0; @endphp
                    @foreach ($cart as $carts)
                        @php $number++; @endphp
                        <tbody>
                        @if ($carts->products->archive === 1)
                            @if ($carts->products->quantity_product === 0)
                            <tr>
                                <th scope="row">{{ $number }}</th>
                                <td>Name : <strong>{{ $carts->products->name_product }}</strong>
                                    <br><br><img class="img-fluid shadow" width="250"
                                        src="{{ asset('products/' . $carts->products->image_product) }}" />
                                </td>
                                <td>This item is not in stock</td>
                                <td><a href="{{ url('cart/destroy', [$carts->id]) }}" class="btn btn-danger"><i
                                            class="fas fa-trash"></i></a></td>
                            </tr>

                            @else
                                    <tr>
                                        <th scope="row">{{ $number }}</th>
                                        <td>Name : <strong>{{ $carts->products->name_product }}</strong>
                                            <br><br><img class="img-fluid shadow" width="250"
                                                src="{{ asset('products/' . $carts->products->image_product) }}" />
                                        </td>
                                        <td>Price : RP.
                                            <strong>{{ number_format($carts->products['price_product']) }}</strong>
                                            <br><br>{{ $carts->products->description_product }}
                                        </td>
                                        <td><a href="{{ url('cart/destroy', [$carts->id]) }}" class="btn btn-danger"><i
                                                    class="fas fa-trash"></i></a></td>
                                    </tr>
                            @endif
                        @else
                        <tr>
                            <th scope="row">{{ $number }}</th>
                            <td>Name : <strong>{{ $carts->products->name_product }}</strong>
                                <br><br><img class="img-fluid shadow" width="250"
                                    src="{{ asset('products/' . $carts->products->image_product) }}" />
                            </td>
                            <td>This item is not available</td>
                            <td><a href="{{ url('cart/destroy', [$carts->id]) }}" class="btn btn-danger"><i
                                        class="fas fa-trash"></i></a></td>
                        </tr>

                        @endif
                    @endforeach
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>
                            Total : RP. <strong>IDK</strong> <br />
                        </td>
                        <td>
                            <a href="/checkout" class="btn btn-primary">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
