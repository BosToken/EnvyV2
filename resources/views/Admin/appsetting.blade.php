@extends('Partials.Admin.Sidebar')
@extends('Partials.Admin.Navbar')

<title>Add Product</title>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300&display=swap');

    .container {
        font-family: 'Montserrat', sans-serif;
    }

</style>

@foreach ($setting as $settings)
    @section('content')
        <div class="container">
            <h2>
                <center><strong>App Setting</strong></center>
            </h2>
            <div class="row mt-3">
                <div class="col">

                </div>
            </div>
            <div class="row mb-3">
                <div class="col md-6">
                    <h4><strong>
                            <div class="text-secondary">
                                App Setting
                            </div>
                        </strong>
                    </h4>
                    <br>
                    App Title : <strong>{{$settings->title_app}}</strong>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#title{{ $settings->id }}">
                        <i class="fas fa-pen"></i>
                    </button>
                    <br>
                    <br>
                    App Language : <strong>
                        @if ($settings->lang_app === "eng")
                            English
                        @else
                            Not Yet
                        @endif</strong>
                    <br>
                    <br>
                    App Image : 
                    <br>
                    <img src="{{asset('assets/'. $settings->image_app) }}" class="img-thumbnail" width="200">
                </div>

                <div class="col md-6">
                    <h4><strong>
                            <div class="text-secondary">
                                Contact
                            </div>
                        </strong>
                    </h4>
                    <br>
                    Email : <strong>{{$settings->email_app}} </strong>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#email{{ $settings->id }}">
                        <i class="fas fa-pen"></i>
                    </button>
                    <br>
                    <br>
                    Instagram : <strong>{{$settings->instagram_app}} </strong>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#instagram{{ $settings->id }}">
                        <i class="fas fa-pen"></i>
                    </button>
                    <br>
                    <br>
                    WhatsApp : <strong>+62{{$settings->whatsapp_app}} </strong>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#whatsapp{{ $settings->id }}">
                        <i class="fas fa-pen"></i>
                    </button>
                </div>
            </div>

            {{-- App Setting --}}

        <!-- Gmail Modal -->
        <div class="modal fade" id="title{{ $settings->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ url('admin/setting/titleUpdate', [$settings->id]) }}" method="POST">
                {{ csrf_field() }}
                @method('PUT')
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <h5><strong>
                                    <center>App Title</center>
                                </strong></h5>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="title_app" for="title_app" name="title_app" placeholder="App Title" required>
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

            {{-- Contanct --}}

        <!-- Gmail Modal -->
        <div class="modal fade" id="email{{ $settings->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ url('admin/setting/emailUpdate', [$settings->id]) }}" method="POST">
                {{ csrf_field() }}
                @method('PUT')
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <h5><strong>
                                    <center>Email</center>
                                </strong></h5>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="email_app" for="email_app" name="email_app" placeholder="Email" required>
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Instagram Modal -->
        <div class="modal fade" id="instagram{{ $settings->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ url('admin/setting/instagramUpdate', [$settings->id]) }}" method="POST">
                {{ csrf_field() }}
                @method('PUT')
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <h5><strong>
                                    <center>Instagram Name</center>
                                </strong></h5>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="instagram_app" for="instagram_app" name="instagram_app" placeholder="Instagram" required>
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- WhatsApp Modal -->
        <div class="modal fade" id="whatsapp{{ $settings->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ url('admin/setting/whatsappUpdate', [$settings->id]) }}" method="POST">
                {{ csrf_field() }}
                @method('PUT')
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <h5><strong>
                                    <center>Number WhatsApp</center>
                                </strong></h5>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="whatsapp_app" for="whatsapp_app" name="whatsapp_app">+62</span>
                                <input type="number" class="form-control" id="whatsapp_app" for="whatsapp_app" name="whatsapp_app" placeholder="WhatsApp" required>
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        </div>
    @endsection
@endforeach
