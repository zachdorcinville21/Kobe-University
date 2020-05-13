<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>View Advisees</title>
    <link rel='stylesheet' type='text/css' href='index.css?version=1' />
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<div id='holds-container'>

    <div class='holds-main'>
        <h3 class='text-primary text-center'>Advisees</h3>
        <div class='holds-content'>
            <?php
            include "includes/dbConnect.php";
            session_start();

            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $query = "SELECT * FROM Advisor";
            $result = $connection->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='text-center'><p> <strong>Advisor: </strong>" . $row['aFirst'] . " " . $row['aLast'] .
                        " | <strong>Department: </strong>" . $row['department'] . "</p></div>" . "<br>";
                }
            } else {
                echo 'No results from query.';
            }

            $connection->close();

            ?>
        </div>

    </div>
</div>

</html>