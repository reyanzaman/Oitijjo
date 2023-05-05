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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/checkout.css">

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
                    <li class="nav-item mx-4">
                        <a href="{{ route('cart') }}">
                            <i class="fa-solid fa-cart-shopping fa-xl"></i>
                        </a>
                        <span id="cartItemCount" class="badge badge-pill badge-danger">{{ $cartItemCount }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Landing -->
    <div class="row container-flex" style="position: relative; margin:40px; padding-top: 12vh; padding-bottom: 2vh;">
        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
            <img src="assets/Image1.png" class="img-fluid" alt="landing page"></img>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
            <img src="assets/Image2.png" class="img-fluid" alt="landing page"></img>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
            <img src="assets/Image2.png" class="img-fluid" alt="landing page"></img>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
            <img src="assets/Image1.png" class="img-fluid" alt="landing page"></img>
        </div>
    </div>

    <!-- Checkout -->
    <div class="card">
        <div id="main-2" class="container"></div>
        <div id="main" class="container">
            <div class="card-title">
                <h2>Payment</h2>
            </div>
            <form id="payment-form" method="POST" action="/order">
                @csrf
                <div class="card-body">
                    <div class="payment-type">
                        <h4>Choose payment method below</h4>
                        <div class="types flex justify-space-between">
                            <input type="hidden" name="selected_button" id="selected_button" value="opt1">
                            <div onclick="clickOpt1(event)" id="opt1" class="type selected">
                                <div class="logo">
                                    <i class="far fa-solid fa-wallet"></i>
                                </div>
                                <div class="text">
                                    <p>Cash On Delivery</p>
                                </div>
                            </div>
                            <div onclick="clickOpt2(event)" id="opt2" class="type">
                                <div class="logo">
                                    <img class="fab" src="assets/Bkash.png" style="width:60px;"></img>
                                </div>
                                <div class="text">
                                    <p>Pay with Bkash</p>
                                </div>
                            </div>
                            <div onclick="clickOpt3(event)" id="opt3" class="type">
                                <div class="logo">
                                    <img class="fab" src="assets/Nagad.png" style="width:80px"></img>
                                </div>
                                <div class="text">
                                    <p>Pay with Nagad</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="payment-info flex justify-space-between align-items-start">
                        <div class="column billing">
                            <div class="title">
                                <h4>Billing Info</h4>
                            </div>
                            <div class="field full">
                                <label for="name">Full Name</label>
                                <input id="name" name="name" type="text" placeholder="Full Name" required>
                            </div>
                            <div class="field full">
                                <label for="address">Billing Address</label>
                                <input id="address" name="address" type="text" placeholder="Billing Address" required>
                            </div>
                            <div class="flex justify-space-between">
                                <div class="field full">
                                    <label for="city">City</label>
                                    <input id="city" name="city" type="text" placeholder="City" required>
                                </div>
                            </div>
                        </div>
                        <div class="column shipping">
                            <div class="title">
                                <h4 style="visibility:hidden;">...</h4>
                            </div>
                            <div class="field full">
                                <label for="phone">Contact Number</label>
                                <input id="phone" name="phone" type="text" placeholder="Contact Number" required>
                            </div>
                            <div class="field full">
                                <label for="phone">Alternate Contact Number</label>
                                <input id="alt_number" name="alt_number" type="text" placeholder="Contact Number (optional)">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-actions flex justify-space-between">
                    <div class="flex-start">
                        <a href="{{ route('products') }}" class="button button-secondary">Return to Store</a>
                    </div>
                    <div class="flex-end">
                        <a href="{{ route('cart') }}" class="button button-link">Back to Cart</a>
                        <a onclick="proceed(event)" class="button button-primary">Proceed</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <br><br>

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

    <script src="js/cart.js"></script>
    <script src="js/checkout.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</body>

</html>