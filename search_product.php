<?php
include('./include/connect.php');
include('function/common-function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href=" 	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0  overflow-hidden">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img class="img-logo" src="img/4.jpg" alt="">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display-all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price:100</a>
                        </li>
                    </ul>
                    <form class="d-flex" action="search_product.php" method="get" role="search">
                        <input class="form-control me-2" name="search_data"
                         type="search" placeholder="Search" aria-label="Search">
                     
                        <input type="submit" class="btn btn-outline-light"
                         name="search_data_products" value="search">
                    </form>
                </div>
            </div>
        </nav>
        <!-- second child -->
        <nav class="navbar navbar-expand-lg  navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </nav>
        <!-- third child -->
        <div class="bg-light">
            <h3 class="text-center">
                Your Store
            </h3>
            <p class="text-center">Communication is at the heart of e-commerce and community</p>
        </div>

        <!-- fourth child -->
        <div class="row  px-1">
            <div class="col-md-10">
                <!-- fetching products  -->
                <div class='row'>
                    <?php
               
                // getproducts();
                // get_unique_category();
                // get_unique_brands();
                search_product();
                    ?>
                </div>

                <!-- all products -->
                <!-- <div class="row">
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="img/12.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-info">Add to Cart</a>
                                <a href="#" class="btn btn-secondary">view more</a>

                            </div>
                        </div>
                    </div>

                </div> -->


            </div>





            <!-- side nav -->
            <div class="col-md-2 bg-secondary p-0">
                <ul class="navbar-nav me-auto text-center ">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>Delivery Brands</h4>
                        </a>
                    </li>
                    <?php
                getbrands();
                    ?>


                </ul>
                <!-- brands to be display -->
                <ul class="navbar-nav me-auto text-center ">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>Categories</h4>
                        </a>
                    </li>
                    <?php
                 getcategory();
                    ?>

                </ul>
            </div>

        </div>


        <!-- last child -->

        <div class="bg-info p-3 text-center">
            <p>All rights reserved 0- Designed by suri-2023</p>
        </div>
    </div>
</body>

</html>