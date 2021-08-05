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
                    <img class="shadow" style="border-radius: 10px" src="{{ asset('products/' . $products->image_product) }}" width="200"><br><br>
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
                    @endif 
                </div>
                <br>

                <div class="col md-6">
                    Name Product  <br>
                    <strong>{{ $products->name_product }}</strong><br><br>
                    Description Product  <br>
                    <strong>{{ $products->description_product }}</strong><br><br>
                    Gender  <br>
                    <strong>
                        @if ($products->gender_id === 1) Men
                            
                        @elseif($products->gender_id === 2) Woman
                            
                        @elseif($products->gender_id === 3) Kids

                        @elseif($products->gender_id === 4) Bag

                        @endif
                    </strong><br><br>
                    Stock  <br>
                    <strong>{{ $products->quantity_product }}</strong><br><br>
                    Size  <br>
                    <strong>{{ $products->size }}</strong><br><br>
                    Color  <br>
                    <strong>{{ $products->color }}</strong><br><br>
                </div>
            </div>

        @endforeach
    </div>
@endsection
