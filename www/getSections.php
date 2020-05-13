<?php 
    include 'includes/dbConnect.php';
    session_start();

    $crn = $_SESSION['crn'];
    $roomID;

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT roomID FROM section WHERE CRN = $crn";

    $result = $connection->query($query);
    $row = $result->fetch_assoc();

    if ($result->num_rows == 0) {
        echo 'No results returned.';
    } else {
        $roomID = $row['roomID'];
    }
?>