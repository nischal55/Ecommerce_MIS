<?php
include "../config/db.php";
session_start();
$product_id = $_GET['product_id'];
$user_id=$_SESSION['user_id'];
$sql = "delete from cart_tbl where user_id = '$user_id' and product_id= '$product_id'";
$result = mysqli_query($conn,$sql);
if($result){
    header('location:../displayCart.php');
   
}


?>