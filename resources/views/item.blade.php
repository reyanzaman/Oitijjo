<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Item</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

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
                </ul>
            </div>
        </div>
    </nav>

    <!-- Popular image -->
    <div class="container image-container" style="margin-top: 10vh;">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <model-viewer class="popular-viewer" src="assets/shokher_hari.glb" ar autoplay
                    poster="assets/hari_p.png" shadow-intensity="0" camera-controls touch-action="pan-y"></model-viewer>
            </div>
            <div class="col-lg-6 col-sm-12 text-col popular-text">
                <h1 class="title-text">Shokher Hari</h1>
                <br>
                <p>Make this artistic piece of Bangladeshi art and culture your own.
                    We try to give you the best & most aesthetic products. Browse through all the products from
                    various sellers and choose the one you like best and get it right at your doorstep.</p>
                <h5>
                    <bold>Diameter: 63cm</bold>
                </h5>
                <h5>
                    <bold>Height: 42cm</bold>
                </h5>
                <br>
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <p class="price-text">500Tk/-</p>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <a class="btn btn-outline-success btn-lg buy-btn"
                            href="{{ route('item') }}">Buy Now</a>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 mb-4">
                        <img class="img-fluid" src="assets/shoker_hari.png">
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 mb-4">
                        <img class="img-fluid" src="assets/shoker_hari2.png">
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 mb-4">
                        <img class="img-fluid" src="assets/shoker_hari3.png">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top: 5vh; position: relative"></div>

    <div class="container">
        <h1 class="title-text">Recommended Products</h1>
        <br>
    </div>

    <!-- Gallery -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <model-viewer class="viewer" src="assets/holder.glb" ar autoplay poster="assets/holder_p.png"
                    shadow-intensity="1" camera-controls touch-action="pan-y"></model-viewer>
                <a href="{{ route('item') }}">
                    <h5 class="product-text">Matir Holder</h5>
                </a>
                <h5 class="small-price-text">
                    <bold>200tk/-</bold>
                </h5>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <model-viewer class="viewer" src="assets/shell.glb" ar autoplay poster="assets/shell_p.png"
                    shadow-intensity="1" camera-controls touch-action="pan-y"></model-viewer>
                <a href="{{ route('item') }}">
                    <h5 class="product-text">Matir Shell</h5>
                </a>
                <h5 class="small-price-text">
                    <bold>200tk/-</bold>
                </h5>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <model-viewer class="viewer" src="assets/croc.glb" ar autoplay poster="assets/komir_p.png"
                    shadow-intensity="1" camera-controls touch-action="pan-y"></model-viewer>
                <a href="{{ route('item') }}">
                    <h5 class="product-text">Matir Komir</h5>
                </a>
                <h5 class="small-price-text">
                    <bold>200tk/-</bold>
                </h5>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <model-viewer class="viewer" src="assets/dhakni_bati.glb" ar autoplay poster="assets/bati_p.png"
                    shadow-intensity="1" camera-controls touch-action="pan-y"></model-viewer>
                <a href="{{ route('item') }}">
                    <h5 class="product-text">Matir Bati</h5>
                </a>
                <h5 class="small-price-text">
                    <bold>200tk/-</bold>
                </h5>
            </div>
        </div>
    </div>

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

    <script>
        // Get all the images
        var images = document.querySelectorAll('.img-fluid');

        // Loop through each image and add a click event listener
        images.forEach(function (img) {
            img.addEventListener('click', function () {
                // Toggle the class 'enlarge' on the clicked image
                this.classList.toggle('enlarge');
            });
        });
    </script>

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