<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Available Sections</title>
    <link rel='stylesheet' type='text/css' href='index.css?version=1' />
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<div id='courseToAdd-container'>

    <div class='courseToAdd-main'>
        <h4>Here are the available sections for that course</h4>
        <div class='courseToAdd-content'>
            <?php

            session_start();

            function getData()
            {
                include 'includes/dbConnect.php';

                if (!$connection) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $course_id = $_POST['course-id'];
                $semester = $_POST['semester'];
                $year = $_POST['year'];

                $_SESSION['course-id'] = $course_id;
                $_SESSION['semester'] = $semester;
                $_SESSION['year'] = $year;

                $query = "SELECT * FROM section, sectionperiod, course, sysuser WHERE section.courseID = $course_id 
                AND section.semester = '$semester' 
                AND section.year = $year
                AND section.courseID = course.courseID
                AND section.facultyID = sysuser.userID";
                $result = $connection->query($query);


                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $_SESSION['crn'] = $row['CRN'];
                        echo "<div id='section'>";
                        echo "<a href='register.php'><p id='section-text'>" . 'Course ID: ' . $row['courseID'] .
                            ' | <strong>Course: </strong>' . $row['courseName'] .
                            ' | <strong>Time: </strong>' . $row['timeStart'] . " - " . $row['timeEnd'] .
                            ' | <strong>Faculty: </strong>' . $row['firstName'] . ' ' . $row['lastName'] .  "</p>";
                        echo "</a></div>";
                        echo '<br>';
                    }
                    $_SESSION['time_slot'] = $row['time_slot'];
                }
                $connection->close();
            }

            getData();

            ?>
        </div>

    </div>
</div>

</html>