<?php
include "../server/ALL-SERVER-OPERATIONS.php";
session_start();
$username = $_REQUEST["username"];
$firstName = $_REQUEST["firstName"];
$lastName = $_REQUEST["lastName"];
$emailAddress = $_REQUEST["email"];
$password = $_REQUEST["password"];

echo $username;
echo $firstName;
echo $lastName;
echo $emailAddress;
echo $password;

$result = addUserInDatabase($username, $firstName, $lastName, $emailAddress, $password);
if ($result) {
    $_SESSION["username"] = $username;
    $_SESSION["firstName"] = $firstName;
    header("location: ../markup/index.php");
} else {
    echo "<script>alert('Username or email already exists');</script>";
}

//Ayanali789412.@