<?php 
session_start();
if(isset($_SESSION['user_name'])){
    unset($_SESSION['user_name']);
}
session_unset();
session_destroy();

header("location:user_area/user_login.php");
?>