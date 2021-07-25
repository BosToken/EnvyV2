@extends('Partials.User.Navbar')

<title>Login</title>

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
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('product') }}">Product</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row mb-3">
            <h2>
                <strong>
                    <center>
                        Login
                    </center>
                </strong>
            </h2>
            <p><strong>User : Email : user@gmail.com | Password : user</strong></p>
            <p><strong>Admin : Email : admin@gmail.com | Password : admin</strong></p>
            <br>
            <div class="col">
                <form action="{{url('login/check')}}" method="POST">
                    {{ csrf_field() }}
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
                    <h8>don't have an account?</h8>
                    <br>
                    <a class="link-danger" aria-current="page" href="{{ url('register') }}">
                        Register
                    </a>
                </center>
            </div>
        </div>
    </div>

@endsection
