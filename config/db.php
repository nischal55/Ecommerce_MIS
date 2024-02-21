<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce_425";


$conn = mysqli_connect($host,$username,$password,$dbname);
if($conn){
    echo("Db connected");
}
?>