@extends('Partials.User.Navbar')

<title>{{{$user->username}}} Cart</title>

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
                    <tbody>
                        @php $number=0; @endphp
                        @if (count($cart) === 0)
                            <center>
                                <div class="col-md-6">
                                    <img src="{{ asset('assets/Empty_Center.png') }}" width="80%" />
                                </div>
                                <br>
                                <h3>Your Cart is Empty</h3> 
                                <a class="btn btn-success" href="{{URL('')}}" style="border-radius: 8px">Go Shopping</a>
                            </center>
                        @else
                            @foreach ($cart as $carts)
                                @php $number++; @endphp
                                @if ($carts === 0)
                                @else
                                    @if ($carts->products->archive === 1)
                                        @if ($carts->products->quantity_product === 0)
                                            <tr>
                                                <th scope="row">{{ $number }}</th>
                                                <td>Name : <span
                                                        style="font-weight: bold">{{ $carts->products->name_product }}</span>
                                                    <br><br><img class="img-fluid shadow" width="250"
                                                        src="{{ asset('products/' . $carts->products->image_product) }}" />
                                                </td>
                                                <td>This item is not in stock</td>
                                                <td><a href="{{ url('cart/destroy', [$carts->id]) }}"
                                                        class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                                            </tr>

                                        @else
                                            <tr>
                                                <th scope="row">{{ $number }}</th>
                                                <td>Name : <span
                                                        style="font-weight: bold">{{ $carts->products->name_product }}</span>
                                                    <br><br><img class="img-fluid shadow" width="250"
                                                        src="{{ asset('products/' . $carts->products->image_product) }}" />
                                                </td>
                                                <td>Price : RP.
                                                    {{-- <strong>{{ number_format($carts->products['price_product']) }}</strong> --}}
                                                    <strong id="separator">{{ $carts->products->price_product }}</strong>
                                                    <br><br>{{ $carts->products->description_product }}
                                                </td>
                                                <td><a href="{{ url('cart/destroy', [$carts->id]) }}"
                                                        class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                                            </tr>
                                        @endif
                                    @else
                                        <tr>
                                            <th scope="row">{{ $number }}</th>
                                            <td>Name : <span
                                                    style="font-weight: bold">{{ $carts->products->name_product }}</span>
                                                <br><br><img class="img-fluid shadow" width="250"
                                                    src="{{ asset('products/' . $carts->products->image_product) }}" />
                                            </td>
                                            <td>This item is not available</td>
                                            <td><a href="{{ url('cart/destroy', [$carts->id]) }}"
                                                    class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                                        </tr>

                                    @endif

                                @endif
                            @endforeach
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td>
                                    <span id="total"></span> <br />
                                </td>
                                <td>
                                    <a href="/checkout" class="btn btn-primary">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        let initialData = 0
        document.querySelectorAll('td > strong').forEach((item) => {
            item.textContent = item.textContent.replace(/,/g, '.')
            initialData += Number.parseInt(item.textContent)
        })

        document.querySelector('#total').textContent =
            `Total : RP. ${initialData.toString().replace(/(.)(?=(.{3})+$)/g,"$1,")}`
        document.querySelectorAll('#separator').forEach(el => {
            el.textContent = el.textContent.toString().replace(/(.)(?=(.{3})+$)/g, "$1,")
        })
    </script>
@endsection
