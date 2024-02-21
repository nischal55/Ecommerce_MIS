<?php
include '../config/db.php';
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "select * from user_details";

$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){
    $db_username = $row['username'];
    $db_password = $row['password'];
    

    if($username==$db_username){
        if(password_verify($password,$db_password)){
            header('location:../Admin/AdminDashboard.php');
            break;
        }else{
            echo("Failed");
        }
    }
}


?>