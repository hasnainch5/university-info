<?php
    if (isset($_SESSION["username"])) {
        header("location: ../markup/index.php");
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/c.css">
    <link rel="stylesheet" href="../styles/sign-in.css">
    <title>Login page</title>


</head>
<body>
<div class="container">
    <div class="form">
        <form method="POST" onsubmit="return false;" id="getForm">
            <h1>LOGIN</h1>
            <label for="email"></label>
            <input type="email" id="email" name="email" placeholder="Enter Email Address" onkeyup="validateForm(this);">
            <div class="basic-styles-invalid">Provide a valid email address</div>

            <label for="password"></label>
            <input type="password" id="password" name="password" placeholder="Enter Password" onkeyup="validateForm(this);">
            <div class="basic-styles-invalid">Must be alphanumeric, contains symbol, and of 8-20 characters</div>

            <button type="submit" onclick="validate(`sign-in`);">Login</button>
            <div>
                <ul class="social-network social-circle">
                    <li><a href="#" class="icoFacebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#" class="icoTwitter" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" class="icoGoogle" title="Google +"><i class="fab fa-google-plus"></i></a></li>
                </ul>
            </div>
            <a href="./Sign-up.php" style="font-size: 20px">Or Sign Up here!</a>

        </form>
    </div>
</div>
<script src="../scripts/form-validation.js"></script>
</body>
</html>
