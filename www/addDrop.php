<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Add a Course</title>
    <link rel='stylesheet' type='text/css' href='index.css?version=1' />
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<div id='addDrop-container'>

    <div class='addDrop-main'>
        <h2>Add or Drop Classes</h2>
        <h4>Enter the Course ID, then click submit to add a class.</h4>
        <div class='addDrop-content'>
            <form id='search-form' action='courseToAdd.php' method='POST'>
                <input type='text' name='course-id' placeholder='Enter the course ID' />
                <input type="text" name="semester" placeholder="Enter the semester" />
                <input type="text" name='year' placeholder="Enter the year" />
                <input type='submit' value='Submit' />
            </form>
            <?php

            // include 'includes/dbConnect.php';

            // if (!$connection) {
            //     die("Connection failed: " . mysqli_connect_error());
            // }


            // // $query = "INSERT INTO Student_History VALUES";
            // // $result = $connection->query($result);
            // // $row = $result->fetch_assoc();




            // $connection->close();

            ?>
        </div>

    </div>
</div>

</html>