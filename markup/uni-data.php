<?php
session_start();
if (!isset($_SESSION["username"])){
    header("location: ./sign-in.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
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
    <link rel="stylesheet" href="../styles/uni-data.css">
    <title>Document</title>
</head>
<body onload="writeAllUni();">
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
                    <a class="nav-link" href="./index.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./uni-data.php">Universities</a>
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
    <div class="all-universities-housing">
        <div class="top-housing">
            <div class="row-m mx-auto">
                <label for="uniName" style="width: 0; height: 0;"></label>
                <input class="input" type="text" id="uniName" placeholder="University Name" onkeyup="suggestName(this);">

                <label for="sector" style="width: 0; height: 0;"></label>
                <input class="input" id="sector" placeholder="University Rank" onkeyup="suggestRank(this);">

                <label for="researchCategory" style="width: 0; height: 0;"></label>
                <input class="input" type="text" id="researchCategory" placeholder="Research Output" onkeyup="suggestResearch(this);">

                <select
                        required
                        class="form-select pl-3 select"
                        aria-label="Default select example"
                        name="scholarship"
                        onchange="suggestScholarship(this)"
                >
                    <option value="" selected>You Interested in Scholarship</option>
                    <option value="">Undetermined</option>
                    <option value="Yes">Yes</option>
                    <option value="">No</option>
                </select>
            </div>
        </div>
        <div class="bottom-housing">
            <div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 width' id="full"></div>
        </div>
    </div>

</main>
<footer>
    <div class="middle"><span class="far fa-copyright"></span>University Informator. 2020 All Rights Reserved</div>
</footer>
<script src="../scripts/uni-data.js"></script>
</body>
</html>
