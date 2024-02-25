<?php
session_start();
if (isset($_SESSION['username'])) {
    $user_id = $_SESSION['user_id'];
    include "../config/db.php";
    $query = "select * from cart_tbl join product_details on cart_tbl.product_id = product_details.product_id where user_id='$user_id'";

    $query_result = mysqli_query($conn, $query);
    $cart_total = 0;
    while ($row = mysqli_fetch_assoc($query_result)) {
        $product_name = $row['product_name'];
        $price = $row['product_price'];
        $product_id = $row['product_id'];
        $quantity = $row['qty'];
        $image = $row['product_image'];
        $total = $price * $quantity;
        $cart_total = $cart_total + $total;
        $payment_type ='cash';

        $order_query = "INSERT INTO order_details(product_id,customer_id,qty,payment_status,order_status)values('$product_id','$user_id','$quantity','$payment_type','Pending')";
        echo($order_query);
        $result = mysqli_query($conn, $order_query);

        $sql = "delete from cart_tbl where user_id = '$user_id'";
        $result2 = mysqli_query($conn,$sql);

        if($result){
            header('location:../showOrder.php');
        }
    }
}