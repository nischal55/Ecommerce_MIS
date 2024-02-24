<?php
session_start();
include "config/db.php";
$product_id = $_GET['product_id'];

$sql = "select * from product_details where product_id='$product_id'";
$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){
        $product_name = $row['product_name'];
        $price = $row['product_price'];
        $product_id = $row['product_id'];
        $image = $row['product_image'];
        $product_desc = $row['product_desc'];
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php include "components/navbar.php" ?>

            <div class="container d-flex flex-wrap mt-4">
                <div class="card m-3">
                  <img src="uploads/<?php echo($image) ?>" alt="" height=450 width=350/>
                </div>
                <div class="card p-4 m-3" style="width:'22rem'">
                  <h2><?php echo($product_name) ?></h2>
                  
                  <h3 style="color:'red'">Rs.<?php echo($price) ?> </h3>
                  <div class="container mt-3">
                  <button class="btn btn-primary col-5 m-2" onclick="window.location.href='../backend/addToCartApi.php?product_id=<?php echo($product_id) ?>'">Add to Cart</button>
                  <button class="btn btn-danger col-5 m-2">Buy Now</button>
                  </div>
                  <hr />
                  <div class="productDesc" style="width: 19rem;">
                  <h4 class="mt-1">Description</h4>
                  <p>
                    <?php echo($product_desc) ?>
                  </p>
                  </div>
                </div>
                
              </div>
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
             