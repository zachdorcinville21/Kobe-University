<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Transcript</title>
    <link rel='stylesheet' type='text/css' href='index.css?version=1' />
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<div id='schedule-container'>

    <div class='schedule-main'>
        <h3 class='text-primary text-center'>Student Transcript</h3>
        <div class='schedule-content'>
            <?php

            session_start();
            $userid = $_POST['ID'];
            include 'includes/dbConnect.php';
  
              if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
              }

             $query = "SELECT * FROM section
                       INNER JOIN studentcoursehistory ON studentcoursehistory.CRN = section.CRN
                       INNER JOIN timeslotdayperiod ON section.timeSlotID = timeslotdayperiod.timeSlotID
                       INNER JOIN course ON section.courseID = course.courseID
                       INNER JOIN sysuser ON section.facultyID = sysuser.userID
                       JOIN sectionperiod ON timeslotdayperiod.periodID = sectionperiod.periodID
                       WHERE studentID =  $userid";

            $result = $connection->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='student-schedule'>";
                    echo "<p class='schedule-item'>" . $row['courseID'] . "</p>" . '<br>';
                    echo "<p class='schedule-item'>" . $row['courseName'] . "</p>" . '<br>';
                    echo "<p class='schedule-item'>" . $row['timeStart'] . "</p>" . '<br>';
                    echo "<p class='schedule-item'>" . $row['timeEnd'] . "</p>" . '<br>';
                    //echo "<p class='schedule-item'>" . $row['start_date'] . "</p>" . '<br>';
                    //echo "<p class='schedule-item'>" . $row['end_date'] . "</p>" . '<br>';
                    echo "<p class='schedule-item'>" . $row['firstName'] . " " . $row['lastName']. "</p>" . '<br>';
                    echo "<p class='schedule-item'>" . $row['semester'] . "</p>" . '<br>';
                    echo "<p class='schedule-item'> Grade: " . $row['grade'] . "</p>" . '<br>';
                    echo "<button type='submit'>Edit Grade</button>";
                    echo "<hr>";
                    echo "</div>";
                }
            } else {
                echo 'No results from database query.';
            }

            $connection->close();

            ?>
        </div>

    </div>
</div>

</html>