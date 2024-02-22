<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Skin Care Shop</title>
    <link rel="stylesheet" href="Assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php 
    include'components/navbar.php';
    ?>
    <center>
    <div class="crousel-box">
    <?php
    include'components/crousel.php';
    ?>
    </div>
    </center>
    
    <div class="container">
        <h2 class="trending-products">Trending Products</h2>
        <div class="container mt-5 d-flex flex-wrap">
            <div class="card" id="product-card">
              <div class="img-part">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, repellat. Aspernatur numquam expedita ipsum ratione quaerat rerum minima sequi aperiam earum perferendis recusandae omnis libero fuga labore, explicabo aliquam dolorem.</div>
              <div class="desc-part">Rs. 150</div>
            </div>
            
        </div>
        
    </div>


    <?php
    include "components/footer.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
