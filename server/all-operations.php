<?php
session_start();
include "./ALL-SERVER-OPERATIONS.php";
$operation = $_REQUEST["operation"];
function showUniCards(mysqli_result|bool $resultObtained) {
    if (!is_bool($resultObtained)) {
        if ($resultObtained->num_rows > 0) {
            while ($row = $resultObtained->fetch_assoc()) {
                $id = $row["uni_id"];
                $uniName = $row["uni_name"];
                $ranking = $row["ranking"];
                $imageLink = $row["image_link"];
                $className = "badge bg-primary";
                if (strlen($ranking) == 0) {
                    $ranking = "No ranking available";
                    $className = "badge bg-dark";
                }
                echo "
                <div class='col mb-4 cursor-add single-card' role='click' onclick='openPage(this)' id='" . $id . "'>
                    <div class='card'>
                        <img src='" . $imageLink . "' class='card-img-top' alt=''>
                        <div class='card-body'>
                            <h5 class='card-title'><span><strong>University Name: </strong></span>" . $uniName . "</h5>
                            <p class='card-text'><span><strong>World Ranking: </strong></span><span class='" . $className . "'>$ranking</span></p>
                        </div>
                    </div>
                </div>";
            }
        } else {
            echo 'No Uni data found';
        }
    }
}

switch ($operation) {
    case 'loginUser':
        $email = $_REQUEST["email"];
        $password = $_REQUEST["password"];
        $resultObtained = getUserData($email, $password);
        if (!is_bool($resultObtained)) {
            if ($resultObtained->num_rows > 0) {
                $completeRow = $resultObtained->fetch_assoc();
                $username = $completeRow["user_id"];
                $firstName = $completeRow["first_name"];
                $lastName = $completeRow["last_name"];
                $emailAddress = $completeRow["email_address"];
                $_SESSION["username"] = $username;
                $_SESSION["firstName"] = $firstName;
                echo 'true';
            }
        } else {
            echo "false";
        }
        break;
    case 'logoutUser':
        session_destroy();
        header("location: ../markup/index.php");
        break;
    case 'writeAllUni':
        $resultObtained = getDataAllUni(30);
        showUniCards($resultObtained);
        break;
    case 'writeSuggestName':
        $name = $_REQUEST["suggestName"];
        $resultObtained = getDataAllUniSuggest("uni_name", $name);
        showUniCards($resultObtained);
        break;
    case 'writeSuggestRank':
        $rankValues = $_REQUEST["suggestRank"];
        $resultObtained = getDataAllUniSuggest("ranking", $rankValues);
        showUniCards($resultObtained);
        break;
    case 'writeSuggestResearch':
        $research = $_REQUEST["suggestResearch"];
        $resultObtained = getDataAllUniSuggest("researchOutput", $research);
        showUniCards($resultObtained);
        break;
    case 'writeSuggestScholarship':
        $scholarship = $_REQUEST["suggestScholarship"];
        $resultObtained = getDataAllUniSuggest("scholarship_availability", $scholarship);
        showUniCards($resultObtained);
        break;
    case 'writeUniDetails':
        function write() {
            $universityCode = $_REQUEST["uniId"];
            $resultObtained = getSingleUniData($universityCode);
            if (!is_bool($resultObtained)) {
                if ($resultObtained->num_rows > 0) {
                    while ($row = $resultObtained->fetch_assoc()) {
                        $uniName = $row["uni_name"];
                        $ranking = $row["ranking"];
                        $sector = $row["sector"];
                        $research = $row["researchOutput"];
                        $studentsCurrentlyEnrolled = $row["student_currently_enrolled"];
                        $scholarship = $row["scholarship_availability"];
                        $facultyCount = $row["faculty_count"];
                        $link = $row["link"];

                        $className = "badge bg-primary";
                        if (strlen($ranking) == 0) {
                            $ranking = "Ranking not available";
                            $className = "badge bg-dark";
                        }

                        $class = 'badge bg-primary';
                        if (strlen($facultyCount) == 0) {
                            $class = 'badge bg-dark';
                        }

                        echo "
                            <p><span><strong>University Name: </strong></span>" . $uniName . "</p>
                            <p><span><strong>World Ranking: </strong></span><span class='" . $className . "'>" . $ranking . "</span></p>   
                            <p><span><strong>Sector</strong></span> " . $sector . "</p>
                            <p><span><strong>Research Papers Published: </strong></span> $research</p>
                            <p><span><strong>Currently Enrolled Student Count: </strong></span>" . $studentsCurrentlyEnrolled . "</p>
                            <p><span><strong>Is Scholarship Available? </strong></span> " . $scholarship . "</p>
                            <p><span><strong>Faculty count: </strong></span> <span class='" . $class . "'>" . $facultyCount . "</span></p>
                            <p><span><strong>Link: </strong></span> " . $link . "</p>
";

                        $undergrad = getUndergradCourses($universityCode);
                        if (!is_bool($undergrad)) {
                            if ($undergrad->num_rows > 0) {
                                echo $undergrad->num_rows;
                                echo '<p><strong>Offered Undergraduate Courses</strong></p> <p>';
                                while ($row = $undergrad->fetch_assoc()) {
                                    echo "<span style='font-size: 16px;' class='badge bg-secondary m-1'>" . $row["name_course"] . "</span>";
                                }
                                echo '</p>';
                            } else {
                                echo 'No data present for the undergrad courses';
                            }
                        }
                        $postgrad = getPostgradCourses($universityCode);
                        if (!is_bool($postgrad)) {
                            if ($postgrad->num_rows > 0) {
                                echo '<p><strong>Offered Undergraduate Courses</strong></p> <p>';
                                while ($row = $postgrad->fetch_assoc()) {
                                    echo "<span style='font-size: 18px;' class='badge bg-secondary m-1'>" . $row["name_course"] . "</span>";
                                }
                                echo '</p>';
                            } else {
                                echo 'No data present for the post grad courses';
                            }
                        }
                    }
                }
            }
        }

        write();
        break;
    case 'getAllFeedback':
        $id = $_REQUEST["universityCode"];
        $resultObtained = getFeedbackOfParticularUni($id);
        if (!is_bool($resultObtained)) {
            if ($resultObtained->num_rows > 0) {
                while ($row = $resultObtained->fetch_assoc()) {
                    $universityID = $row["uni_id_"];
                    $username_id_ = $row["username_id_"];
                    $resultUser = getUserDataFromDatabase($username_id_);
                    $resultUser = $resultUser->fetch_assoc();
                    echo "
                    <div class='single-feedback-container'>
                        <p><span><strong>Feedback given by: </strong></span> ".$resultUser["first_name"]." ".$resultUser["last_name"]."</p>
                        <p><span><strong>Feedback: </strong></span> ".$row["feedback"]."</p>
                    </div>
                    ";
                }
            }
        }
        break;
    case 'addFeedback':
        $feedbackText = $_REQUEST["feedback"];
        $universityID = $_REQUEST["universityCode"];
        $result = addFeedback($_SESSION["username"], $universityID, $feedbackText);
        echo $result;
        break;
}
