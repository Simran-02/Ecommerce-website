<?php
include('include/connect.php');
session_start();
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $select_data="select * from user_orders where order_id='$order_id' ";
    $sdrun=mysqli_query($con,$select_data);
    $fetch_data=mysqli_fetch_assoc($sdrun);
 $invoice_no=$fetch_data['invoice_no'];
    $amount_due=$fetch_data['amount_due'];


}
if(isset($_POST['confirm'])){
 $invoice_no=$_POST['invoice_no'];
 $amount_due=$_POST['amount'];
 $payment_mode=$_POST['payment_mode'];
 echo $insert_query="insert into user_payment(order_id,invoice_no,amount,payment_mode)
 values($order_id,$invoice_no,'$amount_due','$payment_mode')";
 $presult=mysqli_query($con,$insert_query) or die('error');
 if($presult){
    echo "<script> alert(' Payment successfully ');</script>";
    echo "<script> window.open('profile.php?Myorders','_self')</script>";
 }
 $update_user_orders="update user_orders set order_status='complete' where
  order_id='$order_id'";
  $urun=mysqli_query($con,$update_user_orders);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body class="bg-secondary">
    <h1 class="text-center text-light">Confirm Payment</h1>
    <div class="container my-4">
        <form action="" method="post" class="">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto text-center"
                name="invoice_no" value="<?php echo $invoice_no?>">
            </div>
            <div class="form-outline my-3 text-center w-50 m-auto">
                <label for="" class="text-center text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto text-center"
                name="amount" value="<?php echo $amount_due?>" >
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
               <select name="payment_mode" id="" class="form-select text-center w-50 m-auto">
                <option value="">Select Payment Mode</option>
                <option value="">UPI</option>
                <option value="">Netbanking</option>
                <option value="">Cash on delivery</option>
                <option value="">Paypal</option>
               </select>
            </div>
            <div class="form-outline my-3 text-center w-50 m-auto">
                <input type="submit" class="bg-info py-2 px-3 border-0" value="Confirm Payment"
                name="confirm">
            </div>
        </form>
    </div>

    
</body>
</html>
