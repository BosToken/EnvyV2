<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<style>
    /* .footer {
        background-color: black;
        color: white;
    } */
</style>

{{-- <footer>
<div class="footer">
    <hr>
    <p>© 2021 Copyright App Title</p>
</div>
</footer> --}}

@section('footer')

    <footer class="footer page-footer">
        <hr>
        <div class="container">
            <div class="row">
                <div class="col s6">
                    <ul>
                        SHOP BY COLLECTION
                        <li><a href="" class="link-dark">Stripped Outfits</a></li>
                        <li><a href="" class="link-dark">Jacket & Hoodie</a></li>
                    </ul>
                </div>
                <div class="col s6">
                    <ul>
                        Information
                        <li><a href="" class="link-dark">User Rules</a></li>
                        <li><a href="" class="link-dark">Privacy Policy</a></li>
                        <li><a href="" class="link-dark">Copyright Policy</a></li>
                        <li><a href="" class="link-dark">Terms & Conditions Applicable</a></li>
                        <li><a href="" class="link-dark">Store Location</a></li>
                    </ul>
                </div>
                <div class="col s6">
                    <ul>
                        Help
                        <li><a href="" class="link-dark">How to Shop</a></li>
                        <li><a href="" class="link-dark">Size Guide</a></li>
                        <li><a href="" class="link-dark">FAQ</a></li>
                        <li><a href="" class="link-dark">Shipping Terms & Checks</a></li>
                        <li><a href="" class="link-dark">Returns & Refunds</a></li>
                    </ul>
                </div>
                <div class="col s6">
                    <ul>
                        <br>
                        <a href="{{ url('mailto:' . $settings->email_app) }}" class="link-light" target="_blank">
                            <img src="{{ asset('assets/gmail.png') }}" width="27" height="27">
                        </a>
                        <a href="{{ url('https://www.instagram.com/' . $settings->instagram_app) }}" class="link-light" target="_blank">
                            <img src="{{ asset('assets/ig.png') }}" width="25" height="25">
                        </a>
                        <a href="{{ url('https://wa.me/62' . $settings->whatsapp_app . '/?text=Saya%20tertarik%20dengan%20web%20ini') }}" class="link-light" target="_blank">
                            <img src="{{ asset('assets/whats.png') }}" width="25" height="25">
                        </a>
                        <a href="https://github.com/BosToken" class="link-light" target="_blank">
                            <img src="{{ asset('assets/git.png') }}" width="22" height="22">
                        </a>
                    </ul>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    <center>&copy;2021 Copyright {{$settings->title_app}}</center>
                </div>
            </div>
        </div>
    </footer>
