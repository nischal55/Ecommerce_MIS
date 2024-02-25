<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../userLogin.php');
} else {
    $product_id = $_POST['product_id'];
    // $product_name = $_POST['productName'];
   // $product_qty = $_POST['quantity'];
     $price = $_POST['total'];
     $pay_method = $_POST['pay_method'];
    // $total = $_POST['total'];
    // $secret = "8gBm/:&EnhH.1/q";
    // echo ($product_name);
    // echo ($total);

    if($pay_method=="esewa"){
            $amount = "$price";  
            $transaction_uuid=bin2hex(random_bytes(20));
            $product_code="EPAYTEST";
            $secret_key='8gBm/:&EnhH.1/q';
            $message = 'total_amount='.$amount.',transaction_uuid='.$transaction_uuid.',product_code='.$product_code;
            $signature = base64_encode(hash_hmac('sha256',$message, $secret_key, true));
?>
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
        <?php include "../components/navbar.php" ?>
        <div class="main-container">
            <div class="container">
                <div class="card" id="login-card">

                    <body>
                        <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST" id="esewa">
                            <input type="text" id="amount" name="amount" value="<?php echo($amount) ?>" required hidden>
                            <input type="text" id="tax_amount" name="tax_amount" value="0" required hidden>
                            <input type="text" id="total_amount" name="total_amount" value="<?php echo($amount) ?>" required hidden>
                            <input type="text" id="transaction_uuid" name="transaction_uuid" value=<?php echo($transaction_uuid) ?> required hidden>
                            <input type="text" id="product_code" name="product_code" value="EPAYTEST" required hidden>
                            <input type="text" id="product_service_charge" name="product_service_charge" value="0" required hidden>
                            <input type="text" id="product_delivery_charge" name="product_delivery_charge" value="0" required hidden>
                            <input type="text" id="success_url" name="success_url" value="http://localhost/Ecommerce/" required hidden>
                            <input type="text" id="failure_url" name="failure_url" value="https://google.com" required hidden>
                            <input type="text" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required hidden>
                            <input type="text" id="signature" name="signature" value=<?php echo($signature) ?>  required hidden>
                            <input value=" Submit" type="submit" hidden>
                        </form>
                    </body>
                </div>
            </div>
        </div><br><br><br><br><br>

        <?php include "../components/footer.php" ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
       <script>
        document.getElementById("esewa").submit();
       </script>
    </body>

    </html>
<?php
    }else{
        echo("payment");
    }
}


?>