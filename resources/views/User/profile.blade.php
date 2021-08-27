@extends('Partials.User.Navbar')

<title>Biodata | Profile</title>

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
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('profile/biodata') }}">Profile</a>
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
                        <h2>
                            <center>
                                Profile
                            </center>
                        </h2>
                        <br>
                        <br>
                        <div class="col md-6">
                            <div class="card" style="width: 18rem;">
                                <center><img src="{{ asset('assets/User.png') }}" width="80%" /></center>
                                <div class="card-body">
                                    <div class="card-title">
                                        Username : <strong>{{ $user->username }}</strong><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col md-6">
                            <h5>
                                <div class="text-secondary">Biodata</div>
                            </h5>
                            <span for="Username">Username : </span>
                            <span>{{ $user->username }} </span>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#username">
                                <i class="fas fa-pen"></i>
                                Edit
                            </button>
                            <br>
                            <br>
                            <h5>
                                <div class="text-secondary">Contact</div>
                            </h5>
                            <span for="Email">Email : </span>
                            <span>{{ $user->email }}</span>
                            <br>
                            <br>
                            <span for="Email">Phone : </span>
                            @if ($user->phone === null)
                                <span>you haven't set</span>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#phone">
                                    <i class="fas fa-plus"></i>
                                    Add
                                </button>
                            @else
                                <span>{{ $user->phone }} </span>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#phone">
                                    <i class="fas fa-pen"></i>
                                    Edit
                                </button>
                            @endif
                        </div>
                    </div>
                </li>
        </div>

        <!-- Username Modal -->
        <div class="modal fade" id="username" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ url('profile/username/update', [$user->id]) }}" method="POST">
                {{ csrf_field() }}
                @method('PUT')
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <h5><strong>
                                    <center>Change Name</center>
                                </strong></h5>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="username" for="username" name="username"
                                    value="{{ $user->username }}" required>
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Phone Modal -->
        <div class="modal fade" id="phone" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ url('profile/phone/update', [$user->id]) }}" method="POST">
                {{ csrf_field() }}
                @method('PUT')
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <h5><strong>
                                    <center>Change Phone</center>
                                </strong></h5>
                            <div class="mb-3">
                                <input type="number" class="form-control" id="phone" for="phone" name="phone"
                                    value="{{ $user->phone }}" required>
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>


    </div>

@endsection
