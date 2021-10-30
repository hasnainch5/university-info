<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/c.css">
    <link rel="stylesheet" href="../styles/sign-up.css">
    <title>Register</title>
</head>
<body>
<div class="container">
    <div class="form">
        <form action="../server/send-sign-up-data.php" method="POST" onsubmit="return false;" id="getForm">
            <h1>Sign Up</h1>

            <div class="single-row">
                <div class="single-col">
                    <label for="firstName"></label>
                    <input type="text" id="firstName" name="firstName" placeholder="Enter First Name" onkeyup="validateForm(this)">
                    <div class="basic-styles-invalid">Should be letters and 1-10 characters long</div>
                </div>

                <div class="single-col">
                    <label for="lastName"></label>
                    <input type="text" id="lastName" name="lastName" placeholder="Enter Last Name" onkeyup="validateForm(this)">
                    <div class="basic-styles-invalid">Should be letters and 1-10 characters long</div>
                </div>
            </div>

           <div class="single-row">
               <div class="single-col">
                   <label for="email"></label>
                   <input type="email" id="email" name="email" placeholder="Enter Email Address" onkeyup="validateForm(this)">
                   <div class="basic-styles-invalid">Provide a valid email address</div>
               </div>

               <div class="single-col">
                   <label for="password"></label>
                   <input type="password" id="password" name="password" placeholder="Enter Password" onkeyup="validateForm(this)">
                   <div class="basic-styles-invalid">Alpha-numeric contains symbols, of 8-20 chars</div>
               </div>
           </div>

            <div class="single-row">
                <div class="single-col">
                    <input type="text" id="username" name="username" placeholder="Enter Username" onkeyup="validateForm(this)">
                    <div class="basic-styles-invalid">Alpha-numeric must be of 8-20 chars</div>
                </div>
                <div class="">
                    <label for="confirmPassword"></label>
                    <input type="password" id="confirmPassword" name="passwordO" placeholder="Re-enter Password" onkeyup="validateForm(this)">
                    <div id="div" class="basic-styles-invalid">Alpha-numeric contains symbols, of 8-20 chars</div>
                </div>
            </div>

            <button type="submit" onclick="validate('sign-up');">Sign up</button>
        </form>
    </div>
</div>
<script src="../scripts/form-validation.js"></script>
</body>
</html>
