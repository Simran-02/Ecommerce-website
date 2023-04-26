<?php 
include("../Ecommerce/include/connect.php");
include("../Ecommerce/function/common-function.php");
// session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>payment page</title>
</head>
<style>
    img{
        width: 50%;
        margin: auto;
        display: block;
    }
</style>
<body>
    <!--php code for getting userid  -->
    <?php 
    $ip=getIPAddress();
    $get_user="select* from user_table where user_ip='$ip'";
    $run=mysqli_query($con,$get_user);
    $fetch=mysqli_fetch_assoc($run);
    $user_id=$fetch['user_id'];
    ?>
</body>
<div class="container">
    <h2 class="text-center text-info">Payment Option</h2>
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-md-6">  <a href="https://www.paypal.com">
            <img src="../Ecommerce/img/paypal.png" alt="">
        </a>
    </div>

        <div class="col-md-6">  
            <a href="user_area/order.php?user_id=<?php echo $user_id ?>" class="text-center">
<h2 class="text-center">Pay Offline</h2></a>
    </div>

    </div>
</div>

</html>