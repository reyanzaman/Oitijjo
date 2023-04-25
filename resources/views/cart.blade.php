@php
$cart = session()->get('cart');
$cartItemCount = is_array($cart) ? count($cart) : 0;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/cart.css">

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

    <!-- Cart -->
    <div class="wrap cf">
        <div class="heading cf">
            <h1>My Cart</h1>
            <a href="{{ route('products') }}" class="continue">Continue Shopping</a>
        </div>
        <div class="cart heading">
            <ul id="cartItemList">
                <!-- Item To Be Displayed Here -->
            </ul>
        </div>

        <br>

        <div class="subtotal cf">
            <ul>
                <li class="totalRow"><span class="label">Subtotal</span><span class="value">$35.00</span></li>

                <li class="totalRow"><span class="label">Shipping</span><span class="value">$5.00</span></li>

                <li class="totalRow"><span class="label">Tax</span><span class="value">$4.00</span></li>
                <li class="totalRow final"><span class="label">Total</span><span class="value">$44.00</span></li>
                <li class="totalRow"><a href="{{ route('checkout') }}" class="btn checkout continue">Checkout</a></li>
            </ul>
        </div>
    </div>

    <footer class="footer bg-dark">
        <div class="container">
            <div class="container">
                <br><br>
                <div class="row justify-content-center align-items-center"
                    style="width: 200px; margin: auto; --progress-bar-color: transparent;">
                    <img src="assets/logo-2.png" class="img-fluid" alt="..."></img>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-white mb-4">Contact Us</h4>
                        <p class="text-muted">Afftabuddin Road.<br> Dhaka, Bangladesh</p>
                        <p class="text-muted">Phone: +880 123456789<br> Email: oitijjosupport@gmail.com</p>
                    </div>
                    <div class="col-md-3">
                        <h4 class="text-white mb-4">Useful Links</h4>
                        <ul class="list-unstyled">
                            <li><a href="#!">Home</a></li>
                            <li><a href="#!">About</a></li>
                            <li><a href="#!">Products</a></li>
                            <li><a href="#!">Contact Us</a></li>
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
                <p class="text-white">&copy; Copyright IUB 2023. All Right Reserved</p>
            </div>
    </footer>

    <script src="js/cart.js"></script>

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