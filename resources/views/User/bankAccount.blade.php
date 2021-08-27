@extends('Partials.User.Navbar')

<title>Bank Account | Profile</title>

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
                            <h3><strong>Registering a Bank Account</strong></h3>
                        </div>
                        <div class="col md-6">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#addBankAccount">
                                <i class="fas fa-plus"></i>
                                Add Bank Account
                            </button>
                        </div>
                    </div>
                    <br>
                    @foreach ($bank as $banks)
                        <div class="row mb-5">
                            <div class="col md-6">
                                @if ($user->bank_main_id === $banks->id)
                                    <div class="mb-2">
                                        <span class="badge bg-secondary">
                                            Main
                                        </span>
                                    </div>
                                    {{-- <br> --}}
                                @else
                                @endif
                                <img style="width: 10%" class="card-img-top"
                                    src="{{ asset('assets/bank/' . $banks->bank_names->image_bank) }}" />
                                <br>
                                {{ $banks->bank_names->company_bank }} <br>
                                <strong>{{ $banks->account_number }}</strong><br>
                                a.n <strong>{{ $banks->account_name }}</strong>
                            </div>
                            <div class="col md-6">
                                @if ($user->bank_main_id === $banks->id)

                                @else
                                    <a href="{{ url('profile/bank/changeMain', [$banks->id]) }}" class="link-light">
                                        <button type="button" class="btn btn-outline-primary btn-sm" style="">
                                            Change To Main <i class="fas fa-exchange-alt"></i>
                                        </button>
                                    </a>

                                    <a href="{{ url('profile/bank/destroy', [$banks->id]) }}">
                                        <button type="button" class="btn btn-outline-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </a>
                                @endif

                            </div>
                        </div>

                    @endforeach
                </li>
            </ul>
        </div>
        <!-- Yes Modal -->
        <div class="modal fade" id="addBankAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ url('profile/bank/store') }}" method="POST">
                {{ csrf_field() }}
                @method('PUT')
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <h5><strong>
                                </strong></h5>
                            <div class="mb-3">
                                <center>
                                    <h3><strong>Add Bank Account</strong></h3>
                                    <p>By continuing, you agree to the applicable Terms & Conditions.</p>
                                </center>
                            </div>
                            <br>
                            <div class="mb-2">
                                <label for="bank_name_id" style="color: gray"><strong>Name Bank</strong> </label>
                                <select class="form-select" aria-label="Default select example" id="bank_name_id"
                                    for="bank_name_id" name="bank_name_id">
                                    <option selected>Choose Bank Name</option>
                                    @foreach ($nameBank as $nameBanks)
                                        <option value={{ $nameBanks->id }}>{{ $nameBanks->company_bank }} /
                                            {{ $nameBanks->name_bank }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="account_number" style="color: gray"><strong>Account Number</strong> </label>
                                <input type="number" class="form-control" id="account_number" for="account_number"
                                    name="account_number" required>
                            </div>
                            <div class="mb-2">
                                <label for="account_name" style="color: gray"><strong>Account Name</strong> </label>
                                <input type="text" class="form-control" id="account_name" for="account_name"
                                    name="account_name" required>
                            </div>
                            <hr>
                            <br>
                            <button type="close" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal"
                                aria-label="Close">
                                Close </button>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Add</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
