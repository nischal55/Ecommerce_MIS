<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../Assets/style.css">
    <title>Admin | Login</title>
</head>
<body>
    <div class="container">
        
            <div class="card" id="login-card">
                <form action="../backend/adminLoginApi.php" method="post" style="margin-left:1rem">
                <h3 class="login-head">Admin Login</h3>
                    <label for="username">Username:</label><br>
                    <input type="text" name="username" id="username"><br><br>
                    <label for="password">Password:</label><br>
                    <input type="password" name="password" id="password"><br><br>
                    <input type="submit" value="Login" class="btn btn-primary" id="login-btn">
                </form>
            </div>
        </div>
        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>