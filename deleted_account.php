

    <h2 class="text-center text-danger mb-4">Delete Account</h2>
    <form action="" method="post" class="mt-5 ">
        <div class="form-outline mb-4">
            <input type="submit" class="form-control 
            w-50 m-auto" name="delete" value="Delete Account">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="form-control
             w-50 m-auto" name="dont_delete" value="Don't Delete Account">
        </div>
    </form>
    
<?php 
$user_email=$_SESSION['user_email'];
if(isset($_POST['delete'])){
    $delete="delete from user_table where user_email='$user_email'";
    $run=mysqli_query($con,$delete);
    if($run){
        session_destroy();
        echo"<script>alert('Account Deleted uccessfully')</script>";
        echo"<script>window.open('./index.php','_self')</script>";
    }
}
if(isset($_POST['dont_delete'])){
    echo"<script>window.open('./profile.php','_self')</script>";
}
?>