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

            function getName($c_id)
            {
                include 'includes/dbConnect.php';
  
                  if (!$connection) {
                    die("Connection failed: " . mysqli_connect_error());
                  }

                $query = "SELECT courseName FROM course WHERE couseID = $c_id";
                $result = $connection->query($query);
                $row = $result->fetch_assoc();

                $course_name = $row['courseName'];

                $connection->close();

                return $course_name;
            }

            //getName();

            ?>
        </div>

    </div>
</div>

</html>