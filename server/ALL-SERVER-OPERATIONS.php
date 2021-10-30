<?php
$hostName = "localhost";
$username = "root";
$password = "Sarim915602";
$dbName = "hasnain_waleed_uni_scrape";
$connection = mysqli_connect($hostName, $username, $password, $dbName);
if (mysqli_connect_error()) {
    die ("i am dead");
}

function addUserInDatabase(string $username, string $firstName, string $lastName, string $emailAddress, string $password): mysqli_result|bool {
    global $connection;
    $query = "INSERT INTO users_data VALUES ('$username', '$password' ,'$emailAddress', '$firstName', '$lastName')";
    echo "<br>" . $query . "<br>";
    return $connection->query($query);
}

function getUserData(string $emailAddress, string $password): mysqli_result|bool {
    global $connection;
    $query = "SELECT * FROM users_data WHERE email_address='$emailAddress' AND password='$password'";
    return $connection->query($query);
}

function getUserDataFromDatabase(string $userId): mysqli_result|bool {
    global $connection;
    $query = "SELECT * FROM users_data WHERE user_id = '$userId'";
    return $connection->query($query);
}

function checkIfUserExists(string $userId): bool {
    global $connection;
    $result = getUserDataFromDatabase($userId);
    if (!is_bool($result)) {
        if ($result->num_rows > 0) {
            return true;
        }
    }
    return false;
}

function getSingleUniData(string $uniId): mysqli_result|bool {
    global $connection;
    $query = "SELECT * FROM uni_data WHERE uni_id = '$uniId'";
    return $connection->query($query);
}

function getDataAllUni(int $limit = 20): mysqli_result|bool {
    global $connection;
    $query = "SELECT * FROM uni_data ORDER BY uni_name LIMIT $limit";
    return $connection->query($query);
}

function getDataAllUniSuggest(string $column, string $stringValues, int $limit = 20): mysqli_result|bool {
    global $connection;
    $query = "SELECT * FROM uni_data WHERE $column LIKE '%$stringValues%' LIMIT $limit";
    return $connection->query($query);
}

//function getFeedbackOfParticularUni(string $uniId) {
//    global $connection;
//    $query = "SELECT * FROM feedback WHERE uni_id_='$uniId'";
//}

function getUsersBookmarkedUni(string $userId): mysqli_result|bool {
    global $connection;
    $query = "SELECT * FROM bookmarked_universities_data WHERE user_id = '$userId'";
    return $connection->query($query);
}

function getCreatorsInformation(): mysqli_result|bool {
    global $connection;
    $query = "SELECT * FROM creatorinformation";
    return $connection->query($query);
}

function getUndergradCourses(string $universityCode): mysqli_result|bool {
    global $connection;
    $query = "SELECT * FROM undergraduate WHERE uni_id='$universityCode'";
    return $connection->query($query);
}

function getPostgradCourses(string $universityCode): mysqli_result|bool {
    global $connection;
    $query = "SELECT * FROM postgraduate WHERE uni_id='$universityCode'";
    return $connection->query($query);
}
function getFeedbackOfParticularUni(string $uniId): mysqli_result|bool {
    global $connection;
    $query = "SELECT * FROM feedback WHERE uni_id_='$uniId'";
    return $connection->query($query);
}

function addFeedback(string $username, string $uniId, string $feedback): mysqli_result|bool {
    global $connection;
    $query = "INSERT INTO feedback (feedback, uni_id_, username_id_) VALUES ('$feedback', '$uniId', '$username')";
    return $connection->query($query);
}