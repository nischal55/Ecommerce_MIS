<?php
include "../config/db.php";
$customer_name = $_POST['customer_name'];
$address = $_POST['address'];
$username = $_POST['username'];
$password = $_POST['password'];
$contact = $_POST['contact'];

$hashed_password = password_hash($password,PASSWORD_BCRYPT);

$sql = "INSERT INTO customer_details(customer_name,address,contact_no,username,password)values('$customer_name','$address','$contact','$username','$hashed_password')";

$result = mysqli_query($conn,$sql);

if($result){
    header('location:../userLogin.php');
}else{
    echo("Login Failed");
}
?>