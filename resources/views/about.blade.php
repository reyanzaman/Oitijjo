<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

    <script src="https://kit.fontawesome.com/27152874f8.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid mx-4">
            <a class="logo" href="{{ route('home') }}"><img src="assets/logo.png" alt="Logo" draggable="false" class="nav-logo"/></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                <a class="nav-link mx-2" href="{{ route('register') }}" >Register</a>
                </li>
                <li class="nav-item mx-2">
                <a class="btn btn-outline-success btn-rounded" href="{{ route('login') }}" >Sign in</a>
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

    <hr><br>

    <h1 class="title-text text-center">Collaborators</h1>
    <br>
    <h5 class="text-center">Khandoker Ashik Uz Zaman</h5>
    <h5 class="text-center">Tonmoy Bhowmick</h5>
    <h5 class="text-center">Umme Aiman</h5>
    <br>
    <h1 class="title-text text-center">Our Vision</h1>

    <div class="container text-center">
        <p>We aim to prevent the street hawkers from losing their jobs due to
        infrastructure development inside Dhaka City. This will also help to preserve
        the traditional arts & crafts of Bangladeshi culture which is slowly fading
        away. We are also proposing a new & innovative way of improving customer experience
        through the use of 3D models which solves one of the biggest issue of online shopping
        which is not getting the same product as it looks like on the internet. 
        </p>
        <br>
            <h3 class="text-center" style="color: green">Website made for Data & Design Lab Metaverse & Improved E-commerce Project</h3>
        <br><br>
    </div>

    <footer>
        <div class="container">
            <div class="row justify-content-center align-items-center" style="width: 200px; margin: auto">
                <img src="assets/logo-2.png" class="img-fluid" alt="..."></img>
            </div>
        </div>
        <hr>
        <div class="container-fluid">
            <p class="text-center">Copyright © IUB 2023. All Right Reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>