<?php
include('include/connect.php');
include('./function/common-function.php');
session_start();

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
    <div class="container-fluid p-0 overflow-hidden">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img class="img-logo" src="img/4.jpg" alt="">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display-all.php">Products</a>
                        </li>
                        <?php 
                        
                        if(isset($_SESSION['user_email'])){
                          echo "<li class='nav-item'>
                          <a class='nav-link' href='profile.php'>
                          My Account</a>
                      </li>";}else{
                        echo "<li class='nav-item'>
                            <a class='nav-link' href='./user_area/user_registration.php'>
                            Register</a>
                        </li>";
                      }
                        ?>
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
                    <!-- action="search_product.php" method="get" very important  -->
                    <form class="d-flex" action="search_product.php" method="get" role="search">
                        <input class="form-control me-2" name="search_data" type="search" placeholder="Search" aria-label="Search">

                        <input type="submit" class="btn btn-outline-light" name="search_data_products" value="search">
                    </form>
                </div>
            </div>
        </nav>
              <!-- second child -->
              <nav class="navbar navbar-expand-lg  navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
              <?php
        
            if(!isset($_SESSION['user_email'])){
            echo "<li class='nav-item'> 
            <a class='nav-link' href=''> Welcome Guest</a>
        </li>";
        }else{
              

          $select="select * from user_table ";
          $result=mysqli_query($con,$select);
          $fetch=mysqli_fetch_assoc($result);
           $name=$fetch['user_name']; 
      
       
            echo "<li class='nav-item '> 
            <a class='nav-link' href='profile.php' class=''> Welcome  $name</a>
        </li>";
        }
?>
               
                    <?php
        if(!isset($_SESSION['user_email'])){
            echo "<li class='nav-item'> 
            <a class='nav-link' href='./user_area/user_login.php'>login </a>
        </li>";
        }else{
            echo "<li class='nav-item'> 
            <a class='nav-link' href='logout.php'>Logout</a>
        </li>"; 
        }
?>
                  
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
        <div class="row px-1">
            <div class="col-lg-10">
                <!-- fetching products  -->
                <div class='row'>
                <?php 
                            view_details(); ?>
                    <!-- <div class="col-md-4">
                        <div class='card'>
                            <img src='img/lipstric.webp' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description
                                </p>
                                <p class='card-text'>$product_price
                                </p>
                                <a href='#' class='btn btn-info'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row"> -->
                            <!-- <div class="col-md-12">
                                <h4 class="text-center text-info mb-5">Related Products</h4>
                            </div>
                            <div class="col-md-6">
                                <img src='img/perfum.webp' class='card-img-top' alt='$product_title'>

                            </div>
                            <div class="col-md-6">
                                <img src='img/saree2.webp' class='card-img-top' alt='$product_title'>

                            </div>
                            <div class="col-md-12">
                                <h4 class="text-center text-danger mb-5">there is more products as your choics</h4>
                            </div> -->
                            

                        </div>
                    </div>

                    <?php


                    get_unique_category();
                    get_unique_brands();
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

        <?php
        include "../Ecommerce/include/footer.php";
        ?>
    </div>
</body>

</html>