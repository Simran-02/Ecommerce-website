<?php 
if(isset($_GET['editAccount'])){
    $user_email=$_SESSION['user_email'];
     $select="select * from user_table where user_email='$user_email'";
    $run=mysqli_query($con,$select);
    $row_fetch=mysqli_fetch_assoc($run);
    $user_id=$row_fetch['user_id'];
    $user_name=$row_fetch['user_name'];
    $user_email=$row_fetch['user_email'];

    $user_address=$row_fetch['user_address'];
    $user_mobile=$row_fetch['user_mobile'];

    if(isset($_POST['submit'])){
        $update_id=$user_id;
        $user_name=$_POST['name'];
        $user_email=$_POST['email'];
    
        $user_address=$_POST['address'];
        $user_mobile=$_POST['mobile'];
        $img=$_FILES['img']['name'];
        $img_temp=$_FILES['img']['tmp_name'];
        // move_uploaded_file($img_temp,"./user_area/user-img/");
    move_uploaded_file($img_temp,"user_area/user-img/$img");

       echo $update="update user_table set user_name='$user_name', user_email='$user_email',
       user_img='$img',user_address='$user_address', user_mobile='$user_mobile' where user_id='$update_id'";
        $update_run=mysqli_query($con,$update) or die("eorro");
        if($update_run){
            echo "<script> alert('data updated successfully')</script>";
            echo "<script>window.open('profile.php','_self')</script>";

        }else{
            echo "<script> alert('data not updated');</script>";


        }

        
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit Account</title>
    <style>
        .editAccount {
  width: 34%;
 
}
    </style>
</head>
<body>
<h3 class="text-center text-success mb-4">Edit Account</h3>
<form action="" method="post" enctype="multipart/form-data"
 class="text-center">
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php  echo $user_name ?>" 
         name="name">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php  echo $user_email ?>"
         name="email">
    </div>
    <div class="form-outline mb-4 d-flex w-50 m-auto">
        <input type="file" class="form-control " name="img">
        <img src="./user_area/user-img/<?php echo $user_img ?>" class="editAccount" alt="">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php  echo $user_address ?>"
         name="address">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php  echo $user_mobile ?>"
         name="mobile">
    </div>
    
        <input type="submit" value="update" class="bg-info py-2  px-3 mb-2 border-0"
         name="submit">
    
</form>
</body>
</html>