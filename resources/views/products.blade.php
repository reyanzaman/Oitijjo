@php
$cart = session()->get('cart');
$cartItemCount = is_array($cart) ? count($cart) : 0;
$isLoggedIn = auth()->check();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

    <script src="https://kit.fontawesome.com/27152874f8.js" crossorigin="anonymous"></script>
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.0.1/model-viewer.min.js"></script>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid mx-4">
            <a class="logo" href="{{ route('home') }}"><img src="assets/logo.png" alt="Logo"
                    draggable="false" class="nav-logo" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link mx-2" href="{{ route('products') }}">Products</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="{{ route('about') }}">About</a>
                        </li>
                        @if($isLoggedIn)
                    <li class="nav-item mx-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-success btn-rounded">
                                Log Out
                            </button>
                        </form>
                    </li>
                    <li class="nav-item mx-4">
                        <a href="{{ route('cart') }}">
                            <i class="fa-solid fa-cart-shopping fa-xl"></i>
                        </a>
                        <span id="cartItemCount" class="badge badge-pill badge-danger">{{ $cartItemCount }}</span>
                    </li>
                    @else
                    <li class="nav-item mx-2">
                        <a class="nav-link mx-2" href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="btn btn-outline-success btn-rounded" href="{{ route('login') }}">Sign in</a>
                    </li>
                    @endif
                    <!-- </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link mx-2" href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="btn btn-outline-success btn-rounded"
                            href="{{ route('login') }}">Sign in</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a href="{{ route('cart') }}">
                            <i class="fa-solid fa-cart-shopping fa-xl"></i>
                        </a>
                        <span id="cartItemCount" class="badge badge-pill badge-danger">{{ $cartItemCount }}</span>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>

    <div style="margin-top: 15vh; position: relative"></div>

    <!-- Gallery -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <model-viewer class="viewer" src="assets/matir_holder.glb" ar autoplay poster="assets/matir_holder_h.png"
                    shadow-intensity="1" camera-controls touch-action="pan-y"></model-viewer>
                <a href="{{ route('item') }}">
                    <h5 class="product-text">Matir Holder</h5>
                    <h6 class="seller">From Seller_Name</h6>
                </a>
                <h5 class="small-price-text">
                    <bold>200tk/-</bold>
                </h5>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <model-viewer class="viewer" src="assets/matir_shell.glb" ar autoplay poster="assets/matir_shell_h.png"
                    shadow-intensity="1" camera-controls touch-action="pan-y"></model-viewer>
                <a href="{{ route('item') }}">
                    <h5 class="product-text">Matir Shell</h5>
                    <h6 class="seller">From Seller_Name</h6>
                </a>
                <h5 class="small-price-text">
                    <bold>200tk/-</bold>
                </h5>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <model-viewer class="viewer" src="assets/matir_komir.glb" ar autoplay poster="assets/matir_komir_h.png"
                    shadow-intensity="1" camera-controls touch-action="pan-y"></model-viewer>
                <a href="{{ route('item') }}">
                    <h5 class="product-text">Matir Komir</h5>
                    <h6 class="seller">From Seller_Name</h6>
                </a>
                <h5 class="small-price-text">
                    <bold>200tk/-</bold>
                </h5>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <model-viewer class="viewer" src="assets/matir_bati.glb" ar autoplay poster="assets/matir_bati_h.png"
                    shadow-intensity="1" camera-controls touch-action="pan-y"></model-viewer>
                <a href="{{ route('item') }}">
                    <h5 class="product-text">Matir Bati</h5>
                    <h6 class="seller">From Seller_Name</h6>
                </a>
                <h5 class="small-price-text">
                    <bold>200tk/-</bold>
                </h5>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <model-viewer class="viewer" src="assets/matir_basha.glb" ar autoplay poster="assets/matir_basha_h.png"
                    shadow-intensity="1" camera-controls touch-action="pan-y"></model-viewer>
                <a href="{{ route('item') }}">
                    <h5 class="product-text">Matir Basha</h5>
                    <h6 class="seller">From Seller_Name</h6>
                </a>
                <h5 class="small-price-text">
                    <bold>200tk/-</bold>
                </h5>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <model-viewer class="viewer" src="assets/matir_fuldani.glb" ar autoplay poster="assets/matir_fuldani_h.png"
                    shadow-intensity="1" camera-controls touch-action="pan-y"></model-viewer>
                <a href="{{ route('item') }}">
                    <h5 class="product-text">Matir Fuldani</h5>
                    <h6 class="seller">From Seller_Name</h6>
                </a>
                <h5 class="small-price-text">
                    <bold>200tk/-</bold>
                </h5>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <model-viewer class="viewer" src="assets/matir_jug.glb" ar autoplay poster="assets/matir_jug_h.png"
                    shadow-intensity="1" camera-controls touch-action="pan-y"></model-viewer>
                <a href="{{ route('item') }}">
                    <h5 class="product-text">Matir Jug</h5>
                    <h6 class="seller">From Seller_Name</h6>
                </a>
                <h5 class="small-price-text">
                    <bold>200tk/-</bold>
                </h5>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <model-viewer class="viewer" src="assets/matir_baksho.glb" ar autoplay poster="assets/matir_baksho_h.png"
                    shadow-intensity="1" camera-controls touch-action="pan-y"></model-viewer>
                <a href="{{ route('item') }}">
                    <h5 class="product-text">Matir Baksho</h5>
                    <h6 class="seller">From Seller_Name</h6>
                </a>
                <h5 class="small-price-text">
                    <bold>200tk/-</bold>
                </h5>
            </div>
        </div>
    </div>

    <div style="margin-top: 5vh; position: relative"></div>

    <footer class="footer bg-dark">
        <div class="container">
            <div class="container">
                <br><br>
                <div class="row justify-content-center align-items-center"
                    style="width: 200px; margin: auto; --progress-bar-color: transparent;">
                    <img src="assets/logo-2.png" class="img-fluid" alt="..."></img>
                </div>
                <br><br>
                <div class="row justify-space-between align-items-center">
                    <div class="col-md-5">
                        <h4 class="text-white mb-4">Contact Us</h4>
                        <p class="text-muted">Afftabuddin Road, Dhaka Bangladesh
                        <p class="text-muted">Phone: +880 123456789<br> Email: oitijjosupport@gmail.com</p>
                    </div>
                    <div class="col-md-4">
                        <h4 class="text-white mb-4">Useful Links</h4>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('tracking') }}">Track Order</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            <li><a href="https://www.dndlab.org/">DnD Lab</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h4 class="text-white mb-4">Follow Us</h4>
                        <ul class="list-unstyled">
                            <li><a href="#!"><i class="fab fa-facebook-f"></i> Facebook</a></li>
                            <li><a href="#!"><i class="fab fa-twitter"></i> Twitter</a></li>
                            <li><a href="#!"><i class="fab fa-instagram"></i> Instagram</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="text-center p-3">
                <p class="text-white">&copy; Copyright DnD Lab 2023. All Right Reserved</p>
            </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script src="js/cart.js"></script>

</body>

</html>