<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:userLogin.php');
} else {
    include "config/db.php";
    $product_id = $_GET['product_id'];
    $qty=$_GET['qty'];

    
    $sql = "SELECT *FROM product_details where product_id='$product_id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $product_name = $row['product_name'];
            $price = $row['product_price'];
            $product_id = $row['product_id'];
            $image = $row['product_image'];
            $product_desc = $row['product_desc'];
            $total_amt = intval($price)*intval($qty);
?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Admin | ProductAdd</title>
                <style>
                    <?php include "Assets/style.css" ?>
                </style>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

            </head>

            <body>

                </div>
                <?php include "components/navbar.php" ?>
                <div class="main-container">
                    <div class="container">
                        <div class="card" id="login-card">
                            <form action="backend/buyproductApi.php" method="post" style="margin-left:1rem">
                                <h3 class="login-head">Buy Product</h3>
                                <label for="productName">Product Name:</label><br>
                                <input type="text" name="productName" value="<?php echo ($product_name) ?>" id="username" readonly><br><br>
                                <label for="price">Price:</label><br>
                                <input type="text" name="price" id="price" class="price" value="<?php echo ($price) ?>" readonly><br><br>
                                <label for="quantity">Quantity:</label><br>
                                <input type="text" name="quantity" id="qty" class="qty" value="<?php echo($qty) ?>"  required readonly><br><br>
                                <label for="total">Total:</label><br>
                                <input type="text" name="total" class="total" id="total" value="<?php echo($total_amt) ?>" required readonly><br><br>
                                <label for="total">Payment Method:</label><br>
                                <select name="pay_method" id="password">
                                    <option value="esewa">Esewa</option>
                                    <option value="cash">Cash on Delivery</option>
                                </select><br><br>
                                <input type="text" value="<?php echo ($product_id) ?>" name="product_id" hidden>

                                <input type="submit" value="Buy Now" class="btn btn-warning" id="login-btn">
                            </form>
                        </div>
                    </div>
                </div><br><br><br><br><br>

                <?php include "components/footer.php" ?>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
             
            </body>

            </html>

<?php
        }
    }
}

?>