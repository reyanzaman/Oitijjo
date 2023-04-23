@php
$cart = session()->get('cart');
$cartItemCount = is_array($cart) ? count($cart) : 0;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

    <script src="https://kit.fontawesome.com/27152874f8.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/27152874f8.js" crossorigin="anonymous"></script>
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

    <hr class="my-5">

    <div class="container">
        <h2 class="text-center mb-5">Collaborators</h2>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-3">Khandoker Ashik Uz Zaman</h4>
                        <p class="card-text text-center">Hello, my name is Khandoker Ashik Uz Zaman, and I am a
                            full-stack
                            developer
                            with [Number of years] of experience. My expertise includes
                            developing scalable web applications using a variety of programming languages, such as
                            JavaScript, Python, and Java. I also have experience working with popular front-end
                            frameworks like React, Angular, and Vue, as well as back-end technologies like Node.js,
                            Django, and Spring.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-3">Tanmoy Bhowmick</h4>
                        <p class="card-text text-center">Hello, my name is Tanmoy Bhowmick, and I am a full-stack
                            developer
                            with [Number of years] of experience. My expertise includes
                            developing scalable web applications using a variety of programming languages, such as
                            JavaScript, Python, and Java. I also have experience working with popular front-end
                            frameworks like React, Angular, and Vue, as well as back-end technologies like Node.js,
                            Django, and Spring.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-3">Umme Aiman</h4>
                        <p class="card-text text-center">Hello, my name is Umme Aiman, and I am a full-stack developer
                            with [Number of years] of experience. My expertise includes
                            developing scalable web applications using a variety of programming languages, such as
                            JavaScript, Python, and Java. I also have experience working with popular front-end
                            frameworks like React, Angular, and Vue, as well as back-end technologies like Node.js,
                            Django, and Spring.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5">

    <div class="container">
        <h2 class="text-center mb-5">Our Vision</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <p class="text-center">We aim to prevent the street hawkers from losing their jobs due to infrastructure
                    development inside Dhaka City. This will also help to preserve the traditional arts &amp; crafts of
                    Bangladeshi culture which is slowly fading away. We are also proposing a new &amp; innovative way of
                    improving
                    customer experience through the use of 3D models which solves one of the biggest issues of online
                    shopping
                    which is not getting the same product as it looks like on the internet.</p>
            </div>
        </div>
    </div>

    <br>
    <h3 class="text-center" style="color: green">Website made for Data & Design Lab Metaverse & Improved E-commerce
        Project</h3>
    <br><br>
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


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var cartItemCountElement = document.getElementById("cartItemCount");
            if (cartItemCountElement) {
                var cartItemCount = localStorage.getItem('cartItemCount');
                if (cartItemCount) {
                    cartItemCountElement.innerText = cartItemCount;
                }
            }
        });
    </script>

</body>

</html>