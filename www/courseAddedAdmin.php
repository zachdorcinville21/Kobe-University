<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Thank You</title>
    <link rel='stylesheet' type='text/css' href='index.css?version=1' />
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<div id='courseAdded-container'>

    <div class='courseAdded-main'>
        <h4>Registration successful!</h4>
        <div class='courseAdded-content'>
            <?php
            //include 'getCourseName.php';

            session_start();
            $time_slot = $_SESSION['time_slot'];

            include 'includes/dbConnect.php';

            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $c_name = $_POST['courseName'];
            $c_desc = $_POST['courseDescription'];
            $c_id = $_POST['CourseID'];
            $dept = $_POST['Dept'];
            $num_credits = $_POST['Credits'];
            $grad_type = $_POST['grad-type'];


            $stmt = $connection->prepare("INSERT INTO course VALUES (?,?,?,?,?,?)");
            $stmt->bind_param("ssisis", $c_id, $dept, $c_name, $c_desc, $num_credits, $grad_type);

            if (!$stmt->execute()) {
                echo "<h4>Error creating record</h4>";
            } else {
                echo "<h4>Course created successfully.</h4>";
            }

            $connection->close();

            ?>
        </div>

        <a href='userHome.php'>Home</a>

    </div>
</div>

</html>