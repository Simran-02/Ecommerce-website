<?php 
session_start();
if(isset($_SESSION['user_name'])){
echo "welcome".$_SESSION['user_name'];
echo "<br>";
echo "and password".$_SESSION['password'];
}else{
    echo "login to continue"; }