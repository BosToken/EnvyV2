@extends('Partials.User.Navbar')

<title>Profile</title>

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
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('profile') }}">Profile</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row mb-3">
            <h2>
                <center>
                    Profile
                </center>
            </h2>
            <br>
            <br>
            <div class="col md-6">
                @foreach ($address as $addresss)
                    <div class="card shadow" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="text-secondary">Address</h5>
                            <p class="card-text">Username : {{ $user->username }}</p>
                            @if ($user->phone === null)
                                <p class="card-text">Phone : you haven't set</p>
                            @else
                                <p class="card-text">Phone : {{ $user->phone }}</p>
                            @endif
                            <p class="card-text">Address : {{ $addresss->address }}</p>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#address{{ $addresss->id }}">
                                <i class="fas fa-pen"></i>
                                Edit
                            </button>
                            <a href="{{ url('profile/address/destroy', [$addresss->id]) }}">
                                <button type="button" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </button>
                            </a>
                        </div>
                    </div>
                    <br>
                    <!-- Address Modal -->
                    <div class="modal fade" id="address{{ $addresss->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form action="{{ url('profile/address/update', [$user->id]) }}" method="POST">
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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAddress">
                    <i class="fas fa-plus"></i>
                    Add Address
                </button>
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#phone">
                        <i class="fas fa-plus"></i>
                        Add
                    </button>
                @else
                    <span>{{ $user->phone }} </span>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#phone">
                        <i class="fas fa-pen"></i>
                        Edit
                    </button>
                @endif
            </div>
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

        <!-- Add Address Modal -->
        <div class="modal fade" id="addAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ url('profile/address/store', [$user->id]) }}" method="POST">
                {{ csrf_field() }}
                @method('PUT')
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <h5><strong>
                                    <center>Add Address</center>
                                </strong></h5>
                            <div class="mb-3">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" for="country" name="country" required>
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
                                <input type="text" class="form-control" id="address" for="address" name="address" required>
                            </div>
                            <div class="mb-3">
                                <label for="country">Post</label>
                                <input type="number" class="form-control" id="post" for="post" name="post" required>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

@endsection
