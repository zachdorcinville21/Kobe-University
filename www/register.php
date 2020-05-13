<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel='stylesheet' type='text/css' href='index.css?version=1' />
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<div id='addDrop-container'>

    <div class='register-main'>
        <div class='register-content'>
            <?php
            include 'includes/dbConnect.php';
            session_start();

            $student_id = $_SESSION['userID'];
            $crn = $_SESSION['crn'];
            $year = date("Y");

            $term_id = $_SESSION['semester'] == "SPRING" ? $year . "S" : $year . "F";

            $date = date("Y-m-d H:i:s");

            if (!$connection) {
                die('Connection failed: ' . mysqli_connect_error());
            }

            $stmt = $connection->prepare("INSERT INTO enrollment (studentID, CRN, termID, dateEnrolled) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiss", $student_id, $crn, $term_id, $date);

            if (!$stmt->execute()) {
                echo "<h3>Error registering for course</h3>" . "<br><a href='userHome.php'>Back to home</a>";
            } else {
                echo "<h3>Registration successful.</h3>" . "<br><a href='userHome.php'>Back to home</a>";
            }
            ?>
        </div>

    </div>
</div>

</html>