<?php
session_start();
if(isset($_SESSION['username'])){
    $user_id = $_SESSION['user_id'];
    include "config/db.php";
    $query = "select * from cart_tbl join product_details on cart_tbl.product_id = product_details.product_id where user_id='$user_id'";
    $query_result = mysqli_query($conn, $query);
    
    
?>
    <!doctype html>
    <html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    
    <body>
        <?php include "components/navbar.php" ?>
        <div class="container mt-5">
            <h3>Cart List</h3>
            <table class="table table-striped" id="cart_tbl">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Produact Image </th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count=0; while ($row = mysqli_fetch_assoc($query_result)) {
                        $count++;
                        $product_name = $row['product_name'];
                        $price = $row['product_price'];
                        $product_id = $row['product_id'];
                        $image = $row['product_image'];
                    ?>
                        <tr>
                            <th scope="row"><?php echo($count); ?></th>
                            <td><img src="uploads/<?php echo($image) ?>" alt="" width="100" height="100"></td>
                            <td><?php echo($product_name); ?></td>
                            <td>Rs. <?php echo($price); ?></td>
                            <td>
                                <a href="" class="btn btn-danger">Remove</a>
                                <a href="" class="btn btn-warning">Buy Now</a>
                            </td>
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
    
