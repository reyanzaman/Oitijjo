<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'oitijjo';

$conn = mysqli_connect($host, $username, $password, $dbname);

$sql = "SELECT * FROM `order`;";

$result_sql = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin</title>
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
                            href="">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>




<div class="container">
        <h1 class=" mt-115 ">Welcome!!</h1>
        <table class="table">
            <tr>
                <th>USER ID</th>
                <th>TOTAL AMOUNT</th>
                <th>STATUS</th>
                <th>METHOD</th>
                <th>NUMBER</th>
                
            </tr>
            <?php
            while ($result = mysqli_fetch_array($result_sql)) {

            ?>
                <tr>
                    <td><?php echo $result['user_id'] ?></td>
                    <td><?php echo $result['total_amount'] ?></td>
                    <td><?php echo $result['status'] ?></td>
                    <td><?php echo $result['method'] ?></td>
                    <td><?php echo $result['number'] ?></td>
                </tr>
            <?php } ?>

        </table>
</div>

<!-- Footer -->
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

<style>
        
        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 59px;
            font-weight: 600;
            padding-bottom: 15px;
        }

        .mt-115{
            margin-top: 115px;
        }
        .container {
            max-width: 1320px;
            margin: 0 auto;
            padding: 5%;

        }

        .table {
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            border: 1% solid;

        }

        table,
        th,
        td {
            border: 1px solid;
            background-color: white;
        }

        .logout {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        .logout:hover {
            background: lightyellow;
            color: black;
        }
    </style>

</body>

</html>