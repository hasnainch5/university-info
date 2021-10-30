<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/e4c9fd59d1.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="../styles/update-password.css">
    <title>Document</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
        <p style="font-weight: bold">UNIVERSITY INFORMATOR</p>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./aboutTheCompany.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./UniList.html">Universities</a>
                </li>
                <?php
                if (!isset($_SESSION["username"])) {
                    echo '
                    <li class="nav-item ">
                        <a class="nav-link" href="./sign-in.php">Sign In</a>
                    </li>';
                } else {
                    echo "
                    <li class='nav-item'>
                        <a class='nav-link' href='#'>" . $_SESSION['firstName'] . "</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='../server/all-operations.php?operation=showBookmarkedUniversities'>Bookmarked Universities</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='../server/all-operations.php?operation=logoutUser'>Logout</a>
                    </li>
                    
                    ";
                }
                ?>
            </ul>
        </div>
    </nav>
</header>
<main>
    <div class="main-housing">
        <h3>Change Your Password</h3>
        <div class="rowM">
            <label for="oldPassword"></label>
            <input type="password" class="form-control" placeholder="Enter Your Old Password" id="oldPassword">

            <label for="newPassword"></label>
            <input type="password" class="form-control" placeholder="Enter your new Password" id="newPassword">
        </div>
    </div>
</main>
<footer>
    <div class="middle"><span class="far fa-copyright"></span>University Informator. 2020 All Rights Reserved</div>
</footer>
</body>
</html>
