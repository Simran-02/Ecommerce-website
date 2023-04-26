<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My All Orders</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    
<?php 
$email=$_SESSION['user_email'];
$get_user="select * from user_table where user_email='$email'";
$urun=mysqli_query($con,$get_user);
$fetch=mysqli_fetch_assoc($urun);
 $id=$fetch['user_id'];
?>
<h3 class="text-center text-success ">My All Orders</h3>
<table class="table table-bordered mt-3 m-auto">
    <thead class="bg-info">
    <tr>
        <th>SI.No</th>
        <th>Product id</th>
        <th>Amount Due</th>
        <th>Total products</th>
        <th>Invoice number</th>
        <th>Date</th>
        <th>Complete/Incomplete</th>
        <th>Status</th>

    </tr></thead>
    <tbody class="bg-secondary text-light text-center">

    <?php 
    $get_order_details="select * from user_orders where user_id='$id'";
    $grun=mysqli_query($con,$get_order_details);
    $si=1;
while($gfetch=mysqli_fetch_assoc($grun)){
    $order_id=$gfetch['order_id'];
    $amount_due=$gfetch['amount_due'];
    $total_products=$gfetch['total_products'];
    $invoice_no=$gfetch['invoice_no'];
    $order_date=$gfetch['order_date'];
    $order_status =$gfetch['order_status'];
    if($order_status=='pending'){
        $order_status='incomplete'; 
    }else{
        $order_status='complete'; 

    }
    echo "<tr>
    <td>$si</td>
    <td>$order_id</td>
    <td>$amount_due</td>
    <td>$total_products</td>
    <td>$invoice_no</td>
    <td>$order_date</td>
    <td>$order_status</td> ?>";
    ?>
    <?php 
    if($order_status=='complete'){
        echo "<td class='text-dark'>Paid</td>";
    } else{
    
    echo"<td><a href='confirm_payment.php?order_id=$order_id'
     class='text-info'>confirm</a></td> </tr>";}



$si++;    
}
 
    ?>
        
    </tbody>
</table>
</body>
</html>