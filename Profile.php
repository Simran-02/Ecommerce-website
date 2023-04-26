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
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="card.php">
                                <i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php total_card_price(); ?>/.</a>
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
        <?php
        cart();

        ?>
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
        <div class="row">
            <div class="col-md-2 ">
                <ul class="navbar-nav m-auto " style="height:100%">
                    <li class="nav-item bg-info ">
                        <a class="nav-link" href="#">
                            <h4 class="text-light text-center">Your Profile</h4>
                        </a>
                    </li>
                    <?php
                    // fetching profile img
                    $user_email = $_SESSION['user_email'];
                    $user_img = "select * from user_table where user_email='$user_email'";
                    $run_img = mysqli_query($con, $user_img);
                    $row_img = mysqli_fetch_assoc($run_img);
                    $user_img = $row_img['user_img'];
                    echo " <li class='nav-item bg-secondary '>
                    <img src='./user_area/user-img/$user_img ' alt='' class='profile_img my-4'>
                </li>";
                
                    ?>

                    <li class="nav-item bg-secondary">
                        <a class="nav-link" href="Profile.php">
                            <h5 class="text-light text-center">Pending orders</h4>
                        </a>
                    </li>
                    <li class="nav-item bg-secondary">
                        <a class="nav-link" href="Profile.php?editAccount">
                            <h5 class="text-light text-center">Edit Profile</h4>
                        </a>
                    </li>
                    <li class="nav-item bg-secondary">
                        <a class="nav-link" href="Profile.php?Myorders">
                            <h5 class="text-light text-center">My Orders</h5>
                        </a>
                    </li>
                    <li class="nav-item bg-secondary">
                        <a class="nav-link" href="Profile.php?DeleteAccount">
                            <h5 class="text-light text-center">Delete Account</h4>
                        </a>
                    </li>
                    <li class="nav-item bg-secondary">
                        <a class="nav-link" href="logout.php">
                            <h5 class="text-light text-center">Logout</h5>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="col md-10">
<?php getuser_orderdetails(); 
if(isset($_GET['editAccount'])){
    include("editAccount.php");
}
if(isset($_GET['Myorders'])){
    include("user_orders.php");
}
if(isset($_GET['DeleteAccount'])){
    include("deleted_account.php");
}


?>
            </div>
        </div>




        <!-- last child -->

        <?php
        include "../Ecommerce/include/footer.php";
        ?>
    </div>
</body>

</html>