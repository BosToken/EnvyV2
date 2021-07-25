@extends('Partials.User.Navbar')

<title>Register</title>

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
                        <li class="breadcrumb-item active" aria-current="page"><a
                                href="{{ url('register') }}">Register</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row mb-3">
            <h2>
                <strong>
                    <center>
                        Register
                    </center>
                </strong>
            </h2>
            <div class="col">
                <form action="{{ url('register/store') }}" method="POST">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="username" class="form-control" id="username" for="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" for="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" for="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <center>
                    <h8>already have an account</h8>
                    <br>
                    <a class="link-danger" aria-current="page" href="{{ url('login') }}">
                        Login
                    </a>
                </center>
            </div>
        </div>
        <br>
        <br>
    </div>

@endsection
