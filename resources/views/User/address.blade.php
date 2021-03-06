@extends('Partials.User.Navbar')

<title>Address | Profile</title>

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
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a
                                href="{{ url('profile/biodata') }}">Profile</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card" style="width: auto">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page"
                                            href="{{ url('profile/biodata') }}">Biodata</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page"
                                            href="{{ url('profile/address') }}">Address</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page"
                                            href="{{ url('profile') }}">Payment</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page"
                                            href="{{ url('profile/bank') }}">Bank
                                            Account</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </li>
                <li class="list-group-item">
                    <div class="row mb-3">
                        <div class="col md-6">
                            <h3><strong>Register Address</strong></h3>
                        </div>
                        <div class="col md-6">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#addAddress">
                                <i class="fas fa-plus"></i>
                                Add Address
                            </button>
                        </div>
                    </div>
                    @foreach ($address as $addresss)
                        <div class="card shadow">
                            <div class="card-body">
                                @if ($user->address_main_id === $addresss->id)
                                    <div class="mb-1">
                                        <span class="badge bg-secondary">
                                            Main
                                        </span>
                                    </div>
                                @else
        
                                @endif
                                <strong>{{ $user->username }}</strong><br>
                                @if ($user->phone === null)
                                    you haven't set
                                @else
                                    {{ $user->phone }}
                                @endif
                                <br>
                                {{ $addresss->address }} ({{ $addresss->post }}), {{ $addresss->city }},
                                {{ $addresss->province }}, {{ $addresss->country }}. <br>

                                @if ($user->address_main_id === $addresss->id)
                                @else
                                
                                <a href="{{ url('profile/address/changeMain', [$addresss->id]) }}" class="link-light">
                                <button type="button" class="btn btn-outline-primary btn-sm">
                                    Change To Main <i class="fas fa-exchange-alt"></i>
                                </button>
                                </a>

                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                    data-bs-target="#address{{ $addresss->id }}">
                                    <i class="fas fa-pen"></i>
                                </button>

                                <a href="{{ url('profile/address/destroy', [$addresss->id]) }}">
                                    <button type="button" class="btn btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </a>
        
                                @endif

                            </div>
                        </div>
                        <br>

                        <!-- Address Modal -->
                        <div class="modal fade" id="address{{ $addresss->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form action="{{ url('profile/address/changeMain', [$user->id]) }}" method="POST">
                                {{ csrf_field() }}
                                @method('PUT')
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                            <h5><strong>
                                                    <center>Add Address</center>
                                                </strong></h5>
                                            <div class="mb-3">
                                                <label for="country">Country</label>
                                                <input type="text" class="form-control" id="country" for="country"
                                                    name="country" value="{{ $addresss->country }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="province">Province</label>
                                                <input type="text" class="form-control" id="province" for="province"
                                                    name="province" value="{{ $addresss->province }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="country">City</label>
                                                <input type="text" class="form-control" id="city" for="city" name="city"
                                                    value="{{ $addresss->city }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="country">Address</label>
                                                <input type="text" class="form-control" id="address" for="address"
                                                    name="address" value="{{ $addresss->address }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="country">Post</label>
                                                <input type="number" class="form-control" id="post" for="post" name="post"
                                                    value={{ $addresss->post }} required>
                                            </div>
                                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>
                                                Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    @endforeach
                </li>

                <!-- Add Address Modal -->
                <div class="modal fade" id="addAddress" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <form action="{{ url('profile/address/store', [$user->id]) }}" method="POST">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <h5><strong>
                                            <center>Add Address</center>
                                        </strong></h5>
                                    <div class="mb-3">
                                        <label for="country">Country</label>
                                        <input type="text" class="form-control" id="country" for="country" name="country"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="province">Province</label>
                                        <input type="text" class="form-control" id="province" for="province" name="province"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="country">City</label>
                                        <input type="text" class="form-control" id="city" for="city" name="city" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="country">Address</label>
                                        <input type="text" class="form-control" id="address" for="address" name="address"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="country">Post</label>
                                        <input type="number" class="form-control" id="post" for="post" name="post" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>
                                        Add</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
@endsection
