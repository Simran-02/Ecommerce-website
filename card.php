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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
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
                            <a class="nav-link" href="card.php">
                                <i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price:<?php total_card_price(); ?>/.</a>
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
        <div class="container">
            <form method="POST">
                <table class="table table table-bordered text-center">

                    <!-- php code to display cart list -->

                    <?php



                    global $con;
                    $total = 0;
                    $ip = getIPAddress();
                    $select_query = "select * from cart_details where ip_address='$ip'";
                    $result_select = mysqli_query($con, $select_query);


                    while ($row = mysqli_fetch_array($result_select)) {


                        $product_id = $row['product_id'];
                            $select_products = "select * from products where product_id='$product_id'";
                        $res_query= mysqli_query($con,$select_products);
                        while ($row_price = mysqli_fetch_assoc($res_query)) {
                            $product_price = array($row_price['product_price']);
                            $All_product_price = array_sum($product_price);
                            $total += $All_product_price;
                            $price_table = $row_price['product_price'];
                            $product_title = $row_price['product_title'];
                            $product_img1 = $row_price['product_img1'];



                            // // mnjhjjhjhjj
                            // global $con;
                            // $total_price = 0;
                            // $ip = getIPAddress();
                            // $select_query = "select * from cart_details where ip_address='$ip'";
                            // $result = mysqli_query($con, $select_query);
                            $result_count = mysqli_num_rows($result_select);
                            if ($result_count > 0) {
                                echo "
                    <thead>
                    <tr class='me-4'>
                        <th>Product Title</th>
                        <th>Product Image</th>
                        <th name='Quantity'>Quantity</th>
                        <th>Total Price</th>
                        <th>Remove</th>
                        <th colspan='2'>Operations</th>
                    </tr>
                </thead>";
                                // while ($product_id = mysqli_fetch_array($result)) {
                                //     $id = $product_id['product_id'];

                                //     $product_data = mysqli_query($con, "SELECT * FROM products WHERE product_id = $id") or die("Query error");
                                //     while ($fetch_product = mysqli_fetch_array($product_data)) {
                                //         $product_price = array($fetch_product['product_price']);
                                //         $price_table = $fetch_product['product_price'];
                                //         $product_title = $fetch_product['product_title'];
                                //         $product_img1 = $fetch_product['product_img1'];
                                //         $product_allprice = array_sum($product_price);
                                //         $total_price += $product_allprice;



                                //         // 
                    ?>

                                <tbody>
                                    <tr class="">
                                        <td><?php echo $product_title  ?></td>
                                        <td><img src="./img/<?php echo $product_img1 ?>" alt="" class="cart-img"></td>
                                        <td><input type="text" class="form-control" name="quantity" class="w-50 form-input" id=""></td>
                                        <?php
                                        $ip = getIPAddress();
                                        if (isset($_POST['update_cart'])) {
                                            $quantities = $_POST['quantity'];
                                            $update_cart = "update cart_details set quantity='$quantities' where ip_address='$ip'";
                                            $result = mysqli_query($con, $update_cart);

                                           
                                        }


                                        ?>
                                        <td><?php echo  $price_table  ?>/.</td>
                                        <td><input type="checkbox" name="" value="<?php echo $product_id ?>"></td>
                                        <td class="d-flex">

                                            <!-- <button class="bg-info px-3 py-2 border-0 onclick=''">Update</button> -->
                                            <input type="submit" value="Update_cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">

                                            <!-- <button class="bg-info px-3 py-2 border-0 mx-3"> Remove</button> -->
                                            <input type="submit" value="Remove_cart" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
                                        </td>
                                    </tr>



                                </tbody>
                    <?php } else {
                                echo "<h1 class='text-center text-danger'>Cart is empty</h1>";
                            }
                        }
                    }
                    ?>

                </table>
                <div class="d-flex mb-5">
                    <?php
                    global $con;
                    $total = 0;
                    $ip = getIPAddress();
                    $select_query = "select * from cart_details where ip_address='$ip'";
                    $result = mysqli_query($con, $select_query);
                    $result_count = mysqli_num_rows($result);

                    if ($result_count > 0) {
                        echo "<h4 class='px-4'>
                    
                    Subtotal: <strong class='text-info'><?php $total; ?>/.</strong>
                </h4>
                 <button class='bg-info px-3 py-2  border-0'><a href='index.php' 
                 class='text-light text-decoration-none'>ContinueShopping</button></a>
                 <button class='bg-secondary  p-3 py-2 mx-3 border-0 text-light'>
                    <a href='checkout.php' class='text-light text-decoration-none '> CheckOut</button></a>
";
                    } else {
                        echo "<h1 class='text-center text-danger m-auto'>Cart is empty</h1>";

                        echo " <button class='bg-info px-3 py-2  border-0 m-auto p-2'><a href='index.php' 
    class='text-black text-decoration-none'>Continue Shopping</button></a>";
                    }
                    ?>

                </div>
            </form>
            <!-- remove data -->
            <?php

            global $con;
            $ip = getIPAddress();
           echo  $select_query = "select * from cart_details where ip_address='$ip'";
            $result = mysqli_query($con, $select_query);
            $result_count = mysqli_fetch_assoc($result);


            $product = $result_count['product_id'];
            if (isset($_POST['remove_cart'])) {
                $delete_query = "Delete from cart_details where product_id='$product'";
                if (mysqli_query($con, $delete_query)) {
                    echo "<script>alert('data deleted')</script>";
                    echo "<script> window.location.href='http://localhost/Ecommerce/card.php';  
                        </script>";
                } else {
                    echo "<script>alert('please do again')</script>";
                }
            }



            ?>

     
<?php 
                    
                    // if(!isset($_SESSION['user_email'])){
                    //  header('location:user_area/user_login.php');
                    // }else{
                    //  include('payment.php');
     
                    // }

?>




        </div>




        <!-- last child -->

        <?php
        include "../Ecommerce/include/footer.php";
        ?>
    </div>
</body>

</html>