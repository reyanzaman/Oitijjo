
@php
$cart = session()->get('cart');
$cartItemCount = is_array($cart) ? count($cart) : 0;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Delivery Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/tracking.css">

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
                        <a class="btn btn-outline-success btn-rounded"
                            href="{{ route('login') }}">Logout</a>
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

    <br><br><br>
    <form id="tracking-form" method="POST" action="/deliveryStatus">
        @csrf
        <h2 style="text-align:center;">Delivery Man Panel</h2><br>
        <div class="field full row">
            <div class="col-lg-8">
                <input id="orderID" name="orderID" type="number" placeholder="Order ID" required>
            </div>
            <div class="col-lg-4">
                <a onclick="updateStatus(event)" type="submit" class="button-primary button">Update Status</a>
            </div>
        </div>
        <br>
        <div class="field full row">
            <div class="col-lg-3 col-md-6 col-sm-12" style="margin-bottom: 20px;">
                <a onclick="handleButtonClick(this)" id="pending" type="submit" class="btn btn-lg btn-outline-primary status active">Pending</a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12" style="margin-bottom: 20px;">
                <a onclick="handleButtonClick(this)" id="processing" type="submit" class="btn btn-lg btn-outline-warning status">Processing</a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12" style="margin-bottom: 20px;">
                <a onclick="handleButtonClick(this)" id="completed" type="submit" class="btn btn-lg btn-outline-success status">Completed</a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12" style="margin-bottom: 20px;">
                <a onclick="handleButtonClick(this)" id="cancelled" type="submit" class="btn btn-lg btn-outline-danger status">Cancelled</a>
            </div>
        </div>
        <br><br>
        <div id="output"></div>
    </form>
    <div id="error"></div>
    <div id="main" class="main">
        <div class="hh-grayBox pt45 pb20">
            <div class="row justify-content-between">
                <div id="pending" class="order-tracking completed">
                    <span class="is-complete"></span>
                    <p>Pending<br><span id="pending_date">Mon, June 24</span></p>
                </div>
                <div id="processing" class="order-tracking">
                    <span class="is-complete"></span>
                    <p>Processing<br><span id="processing_date">Tue, June 25</span></p>
                </div>
                <div id="completed" class="order-tracking cancelled">
                    <span class="is-complete"></span>
                    <p>Completed<br><span id="completed_date">Fri, June 28</span></p>
                </div>
            </div>
        </div>
    </div>

    <br><br><br>
    <br><br><br>

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

    <script src="js/delivery.js"></script>

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