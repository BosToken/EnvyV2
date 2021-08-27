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
                            <strong>Shipping Address : </strong>
                            <br>
                            @if (count($address) === 0)
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#chooseAddress">
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
                            <strong>Delivery Courier : </strong>
                            <br>
                            <br>
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
                                            <option id="selectDebug" selected>Choose Courier</option>
                                            <option id="JNE" Value="JNE">JNE</option>
                                            <option id="JNT" Value="J&T">J&T</option>
                                            <option id="SiCepat" Value="SiCepat">SiCepat</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <strong>Payment Method : </strong>
                            <br>
                            @if (count($main) === 0)
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#choosePayment">
                                    Choose Payment <i class="fas fa-chevron-right"></i>
                                </button>
                            @else
                                @foreach ($main as $banks)
                                    <img style="width: 10%" class="card-img-top" id="cg-img"
                                        src="{{ asset('assets/bank/' . $banks->bank_names->image_bank) }}" /><br>
                                    <strong id="cg-name_bank">{{ $banks->bank_names->name_bank }}</strong><br>
                                    <strong id="cg-account">{{ $banks->account_number }}</strong>
                                    a.n <strong id="cg-name">{{ $banks->account_name }}</strong>
                                @endforeach
                                <br><br>

                                <button type="button" class="btn btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#choosePayment">
                                    <strong>Choose Other Payment</strong> <i class="fas fa-chevron-right"></i>
                                </button>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Payment Modal -->
        <div class="modal fade" id="choosePayment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            {{-- <form action="{{ url('profile/address/changeMainYes', [$addresss->id]) }}" method="POST">
                {{ csrf_field() }}
                @method('PUT') --}}
            {{-- @if (count($bank) === 0) --}}
                {{-- <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="mb-3" style="margin-bottom: -5px">
                                <center>
                                    <h3><strong>Other Payment</strong></h3>
                                    <p><a href="{{ url('profile/bank') }}" class="link-success">You must have main
                                            payment</a></p>
                                </center>
                            </div>
                            <button type="close" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">
                                Close</button>
                        </div>
                    </div>
                </div> --}}

            {{-- @else --}}

                @if ($user->bank_main_id === null)

                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="mb-3" style="margin-bottom: -5px">
                                    <center>
                                        <h3><strong>Other Payment</strong></h3>
                                        <p><a href="{{ url('profile/bank') }}" class="link-success">You must have main
                                                payment</a></p>
                                    </center>
                                    @foreach ($bank as $banks)
                                        <div class="container">
                                            <div class="row">
                                                <div class="mt-3 col-md-12 border rounded border-secondary p-3"
                                                    id={{ 'paymentSelector' . $banks->bank_names->id }}>
                                                    <img style="width: 20%"
                                                        src="{{ asset('assets/bank/' . $banks->bank_names->image_bank) }}">
                                                    <h3>{{ $banks->bank_names->name_bank }}</h3>
                                                    <h4>{{ $banks->account_number }}</h4>
                                                    <p>{{ $banks->account_name }}</p>

                                                    <a href="{{ url('profile/bank/changeMainBuy', [$banks->id]) }}"
                                                        class="link-light">
                                                        <button type="button" class="btn btn-outline-primary btn-sm"
                                                            style="">
                                                            Change To Main <i class="fas fa-exchange-alt"></i>
                                                        </button>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="close" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    Close</button>
                            </div>
                        </div>
                    </div>

                @else

                    <input id="selectedPayment" type="hidden" name="payment" value={{ $user->bankmain->bank_name_id }}>
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="mb-3" style="margin-bottom: -5px">
                                    <center>
                                        <h3><strong>Other Payment</strong></h3>
                                    </center>
                                    @foreach ($bank as $banks)
                                        <div class="container">
                                            <div class="row">
                                                <div class="mt-3 col-md-12 border rounded border-secondary p-3"
                                                    id={{ 'paymentSelector' . $banks->bank_names->id }}>
                                                    <img style="width: 20%"
                                                        src="{{ asset('assets/bank/' . $banks->bank_names->image_bank) }}">
                                                    <h3>{{ $banks->bank_names->name_bank }}</h3>
                                                    <h4>{{ $banks->account_number }}</h4>
                                                    <p>{{ $banks->account_name }}</p>
                                                    <button class="btn btn-success btn-sm"
                                                        id={{ 'paymentSelector' . $banks->bank_names->id }} type="button"
                                                        value={{ $banks->bank_names->id }}>Select</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="close" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    Close</button>
                                {{-- <button type="submit" class="btn btn-success">
                    Yes</button> --}}
                            </div>
                        </div>
                    </div>
                @endif

            {{-- @endif --}}


            {{-- </form> --}}
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
        document.querySelectorAll("button[id^='payment']").forEach(element => {
            element.addEventListener('click', (e) => {
                const parentElement = document.querySelector(`div#${e.target.id}`)
                const img = parentElement.querySelector('* > img').attributes.src.value
                const bankName = parentElement.querySelector('* > h3').textContent
                const accountNumber = parentElement.querySelector('* > h4').textContent
                const accountName = parentElement.querySelector('* > p').textContent
                document.getElementById('selectedPayment').setAttribute('value', e.target.value)

                document.getElementById('cg-img').setAttribute('src', img)
                document.getElementById('cg-name_bank').textContent = bankName
                document.getElementById('cg-account').textContent = accountNumber
                document.getElementById('cg-name').textContent = accountName
            })
        })

        let initOptionParam = ''
        let Deliverys = document.querySelector('#delivery').addEventListener('change', e => {
            console.log(e.target.value)
            initOptionParam = e.target.value

            let Regular = 30000
            let Cargo = 80000
            let Economy = 15000
            let nol = 0
            const courier = [{
                name: 'Regular',
                option: [{
                    name: 'JNE Reg',
                    value: 'JNE Reg'
                },
                {
                    name: 'SiCepat Reg',
                    value: 'SiCepat Reg'
                },
                {
                    name: 'AnterAja',
                    value: 'AnterAja'
                }
                ] // [{Content, Value}]

            }, {
                name: 'Cargo',
                option: [{
                    name: 'SiCepat GOKIL',
                    value: 'SiCepat GOKIL'
                }, {
                    name: 'JNE',
                    value: 'JNE'
                }]
            }, {
                name: 'Economy',
                option: [{
                        name: 'SiCepat HALU',
                        value: 'SiCepat HALU'
                    },
                    {
                        name: 'JNE OKE',
                        value: 'JNE OKE'
                    },
                    {
                        name: 'J&T Eco',
                        value: 'J&T Eco'
                    }
                ]
            }]

            document.querySelector('select#courier').innerHTML = ''

            courier.forEach(item => {
                if (item.name === e.target.value) {
                    item.option.forEach(data => {
                        const elementNode = document.createElement('option')
                        const textNode = document.createTextNode(data.name)
                        elementNode.appendChild(textNode)
                        document.createElement('option').innerHTML = data.name
                        document.querySelector('select#courier').appendChild(elementNode)
                    })
                }
            })

            if (initOptionParam === 'Regular') {
                document.querySelector('#shipping').textContent =
                    `${Regular}`
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
