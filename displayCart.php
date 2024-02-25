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
        <title>Cart</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    
    <body>
        <?php include "components/navbar.php";
        $cart_total = 0;
        ?>
        <div class="container mt-5">
            <h3>Cart List</h3>
            <table class="table table-striped" id="cart_tbl">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Image </th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count=0; while ($row = mysqli_fetch_assoc($query_result)) {
                        $count++;
                        $product_name = $row['product_name'];
                        $price = $row['product_price'];
                        $product_id = $row['product_id'];
                        $quantity = $row['qty'];
                        $image = $row['product_image'];
                        $total = $price*$quantity;
                        $cart_total = $cart_total+$total;
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
                            <td><button class="btn btn-outline-danger" onclick="window.location.href='backend/removeCart.php?product_id=<?php echo($product_id) ?>'">Remove</button></td>
                        </tr>
                    <?php
                    } ?>
    
                </tbody>
            </table>
            <div class="container d-flex">
                <h5 class="mt-2">Cart Total = Rs. <?php echo($cart_total) ?>.00</h5>
                <div class="container mx-2">
                    <input type="radio" name="payment_type" value="esewa" class="mx-1" checked>Esewa
                    <input type="radio" name="payment_type" class=" mx-1" value="cash">Cash on Delivery
                    <button class="btn btn-warning mx-5" onclick="displayRadio()">Check Out</button>
                </div>
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <script>
            function displayRadio(){
                let ele = document.getElementsByName('payment_type');
                for (i = 0; i < ele.length; i++) {
                if (ele[i].checked)
                    var payment_type = ele[i].value;
                
            }
            window.location.href="backend/checkOut.php?pay_type="+payment_type;
            }
            
        </script>
    </body>
    
    </html>
    <?php

}else{
    header('location:userLogin.php');
 } ?>
    
