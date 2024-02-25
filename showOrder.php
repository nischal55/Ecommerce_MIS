<?php
session_start();
if(isset($_SESSION['username'])){
    $user_id = $_SESSION['user_id'];
    include "config/db.php";
    $query = "select * from order_details join product_details on order_details.product_id = product_details.product_id  where customer_id='$user_id' order by order_id desc limit 5";

    $query_result = mysqli_query($conn, $query);
    
    
?>
    <!doctype html>
    <html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Order</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    
    <body>
        <?php include "components/navbar.php";
        $count =0; 
        ?>
        <div class="container mt-5">
            <h3>My Order List</h3>
            <table class="table table-striped" id="cart_tbl">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Image </th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Order Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                   
                    <?php  while ($row = mysqli_fetch_assoc($query_result)) {
                        $count=$count+1;
                        $product_name = $row['product_name'];
                        $price = $row['product_price'];
                        $product_id = $row['product_id'];
                        $quantity = $row['qty'];
                        $image = $row['product_image'];
                        $total = $price*$quantity;
                        $payment_status = $row['payment_status'];
                        $order_status = $row['order_status'];
                    ?>
                        <tr>
                            <th scope="row"><?php echo($count); ?></th>
                            <td><img src="uploads/<?php echo($image) ?>" alt="" width="100" height="100"></td>
                            <td><?php echo($product_name); ?></td>
                            <td>Rs. <?php echo($price); ?></td>
                            <td>
                                <?php echo($quantity) ?>
                            </td>
                            <td> Rs. <?php echo($total)  ?></td>
                            <td><?php echo($payment_status) ?></td>
                            <td><?php echo($order_status) ?></td>
                            <td><button class="btn btn-outline-danger">Cancel</button></td>
                        </tr>
                    <?php
                    } ?>
    
                </tbody>
            </table>
          
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

      
    </body>
    
    </html>
    <?php

}else{
    header('location:userLogin.php');
 } ?>
    

?>