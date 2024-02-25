<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:../userLogin.php');
}else{ 
  include "../config/db.php";
  $product_id = $_GET['product_id'];
  $qty = $_GET['qty'];
  $user_id = $_SESSION['user_id'];
  $sql = "INSERT INTO cart_tbl(product_id,user_id,qty)values('$product_id','$user_id','$qty')";
  $result = mysqli_query($conn,$sql);
  if($result){
    header('location:../displayCart.php');
  }else{
    echo("failed");
  }
  ?>





<?php
}
?>