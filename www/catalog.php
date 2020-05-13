<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Course Catalog</title>
    <link rel='stylesheet' type='text/css' href='index.css?version=1' />
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<div id='catalog-container'>

    <div class='catalog-main'>
        <h2 class='text-center' id='catalog-title'>Courses currently being offered</h2>
        <form action="" method='POST'>
                <select name="semester">
                    <option value="FALL">FALL</option>
                    <option value="SPRING">SPRING</option>
                </select>
                <select name="year">
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                </select>
                <input type="submit" value="Update" />
            </form>
        <div class='catalog-content'>
            <?php

            include 'includes/dbConnect.php';

            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $semester = $_POST['semester'];
            $year = (int)$_POST['year'];
            $query = "SELECT * FROM course, section WHERE section.semester = '$semester' AND section.year = $year";
            $result = mysqli_query($connection, $query);

            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div id='item'>";
                    echo "<i>" . $row["courseID"] . "</i>" . " " .
                        $row["courseName"] . //"<b> Start Date: </b>" .
                        //$row["start_date"] . "<b> End Date: </b>" .
                        //$row["end_date"] . " " .
                        "<b> Dept: </b> " . $row["departmentCode"] . "Credits: (" . $row["numberOfCredits"] .  ") " . 
                       $row['semester'] . ' ' . $row['year'] .   "<br>";
                    echo "</div>" . "<hr>";
                }
            } else {
                print("No courses are being offered as of right now");
            }

            $connection->close();

            ?>
        </div>

    </div>
</div>

</html>