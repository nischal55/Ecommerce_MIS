<?php
include "../config/db.php";
$product_name = $_POST['productName'];
$product_price = $_POST['price'];
$product_quantity = $_POST['quantity'];
$product_image= $_FILES['file'];
$product_desc = $_POST['product-desc'];
$product_category = $_POST['category'];

$filename = $product_image['name'];

$temp_name = $product_image['tmp_name'];
if($product_category=="1"){
    echo("Select Category");
}else{
    $file = '../uploads/' . $filename;
move_uploaded_file($temp_name, $file);

$sql = "INSERT INTO product_details(product_name,product_price,product_image,product_qty,product_desc,category)values('$product_name','$product_price','$filename','$product_quantity','$product_desc','$category')";

$result = mysqli_query($conn,$sql);

if($result){
    header('location:../Admin/productAdd.php');
}else{
    echo"failed";
}

}

?>