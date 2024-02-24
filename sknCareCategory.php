<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Skin Care Shop</title>
  <style>
    <?php include "Assets/style.css" ?>
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <?php
  include 'components/navbar.php';
  ?>
  <center>
    <div class="crousel-box">
      <?php
      include 'components/crousel.php';
      ?>
    </div>
  </center>

  <div class="container">
    <h2 class="trending-products">Skin Care Products</h2>
    <div class="container mt-5 d-flex flex-wrap" id="card-container">
      <?php
      include "config/db.php";

      $sql = "select * from product_details where category='skinCare'";
      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_assoc($result)) {
        $product_name = $row['product_name'];
        $price = $row['product_price'];
        $product_id = $row['product_id'];
        $image = $row['product_image'];
      ?>
     <a href="getProductDetails.php?product_id=<?php echo($product_id) ?>" style="text-decoration: none;" >
       <div class="card" id="product-card">
           <div class="img-part"><img src="uploads/<?php echo($image)?>" alt="" height="180" width="180"></div>
           <div class="desc-part"><p class="product-title"><?php echo($product_name) ?></p><p style="color:red"> Rs. <?php echo($price) ?></p></div>
         </div>
     </a>
     
        

      <?php
      }
      ?>

    </div>

  </div>


  <?php
  include "components/footer.php";
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>