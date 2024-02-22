<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | ProductAdd</title>
    <style>
        <?php include "../Assets/style.css" ?>
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    
    </div>
    <?php include "../components/AdminNav.php" ?>
    <div class="main-container">
    <div class="container">
        <div class="card" id="login-card">
            <form action="../backend/productAddApi.php" method="post" enctype="multipart/form-data" style="margin-left:1rem">
            <h3 class="login-head">Add Product</h3>
                <label for="productName">Product Name:</label><br>
                <input type="text" name="productName" id="username"><br><br>
                <label for="price">Price:</label><br>
                <input type="text" name="price" id="password"><br><br>
                <label for="quantity">Quantity:</label><br>
                <input type="text" name="quantity" id="password"><br><br>
                <label for="price">Product Image:</label><br>
                <input type="file" name="file" id="password"><br><br>
                <input type="submit" value="Add Product" class="btn btn-primary" id="login-btn">
            </form>
        </div>
    </div>
    </div><br><br><br>
    <?php include "../components/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>