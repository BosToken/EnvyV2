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
                            @if (count($address) === 0)
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#choosePayment">
                                    Choose Address <i class="fas fa-chevron-right"></i>
                                </button>
                            @else
                                @foreach ($address as $addresss)
                                    <span class="badge bg-secondary">
                                        Main
                                    </span><b> {{ $user->username }}</b> ({{ $user->phone }})
                                    <br>{{ $addresss->address }} ({{ $addresss->post }}), {{ $addresss->city }},
                                    {{ $addresss->province }}, {{ $addresss->country }}.
                                @endforeach
                            @endif
                        </li>
                        <li class="list-group-item">
                            {{-- <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#chooseCourier">
                                Choose Courier <i class="fas fa-chevron-right"></i>
                            </button> --}}
                            <div class="row mb-3">
                                <div class="col md-6">
                                    <div class="mb-3">
                                        <select id="delivery" name="delivery" class="form-select">
                                            <option selected Value="nol">Choose Delivery</option>
                                            <option Value="Regular">Regular (2-4 Days) RP. 30.000</option>
                                            <option Value="Cargo">Cargo (5-7 Days) RP. 80.000</option>
                                            <option Value="Economy">Economy (3 Days) RP. 15,000</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col md-6">
                                    <div class="mb-3">
                                        <select id="courier" name="courier" class="form-select">
                                            <option selected>Choose Courier</option>
                                            <option Value="Lion Parcel">Lion Parcel</option>
                                            <option Value="SiCepat">SiCepat</option>
                                            <option Value="JNE">JNE</option>
                                            <option Value="J&T">J&T</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
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
                            <br>Total Price : RP.
                            <strong id="price">{{ $products->price_product }}</strong>
                            <br>Shipping Cost : RP.
                            <strong id="shipping"></strong>
                            <br>Insurance : RP.
                            <strong id="insurance"></strong>
                        </li>
                        <li class="list-group-item">
                            Total Bill : RP.
                            <strong id="total"></strong>
                        </li>
                        <li class="list-group-item">
                            <button type="button" class="btn btn-success"><i class="far fa-check-square"></i> PAY</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        let initOptionParam = ''
        let Deliverys = document.querySelector('#delivery').addEventListener('change', e => {
            console.log(e.target.value)
            initOptionParam = e.target.value

            let Regular = 30000
            let Cargo = 80000
            let Economy = 15000
            let nol = 0

            if (initOptionParam === 'Regular') {
                document.querySelector('#shipping').textContent =
                    `${Regular}`
            } else if (initOptionParam === 'Cargo') {
                document.querySelector('#shipping').textContent =
                    `${Cargo}`
            } else if (initOptionParam === 'Economy') {
                document.querySelector('#shipping').textContent =
                    `${Economy}`
            } else if (initOptionParam === 'nol') {
                document.querySelector('#shipping').textContent =
                    `${nol}`
            } else {
                document.querySelector('#shipping').textContent =
                    `${nol.toString().replace(/(.)(?=(.{3})+$)/g,"$1,")}`
            }
            let DeliveryPrice = document.querySelector('#shipping').textContent
            let Insurances = document.querySelector('#insurance').textContent
            let Prices = document.querySelector('#price').textContent
            DeliveryPrice = parseInt(DeliveryPrice)
            Insurances = parseInt(Insurance)
            Prices = parseInt(Prices)
            let Total = (Insurances + Prices + DeliveryPrice).toString().replace(/(.)(?=(.{3})+$)/g, "$1,")
            document.querySelectorAll('br > strong').forEach((item) => {
                item.textContent = item.textContent.replace(/,/g, '.')
                Total += Number.parseInt(item.textContent)
            })

            document.querySelector('#total').textContent = Total
        })

        let Insurance = 500
        let Insurances = document.querySelector('#insurance').textContent = Insurance
        // `${Insurance.toString().replace(/(.)(?=(.{3})+$)/g,"$1,")}`

        let Prices = document.querySelectorAll('#price').forEach(price => {
            // price.textContent = price.textContent.toString().replace(/(.)(?=(.{3})+$)/g, "$1,")
        })

        // let Total = 0  
        // document.querySelectorAll('br > strong').forEach((item) => {
        //     item.textContent = item.textContent.replace(/,/g, '.')
        //     Total += Number.parseInt(item.textContent)
        // })

        // document.querySelector('#total').textContent =
        //     `${Total}`
    </script>
@endsection
