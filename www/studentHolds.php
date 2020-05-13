<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Holds</title>
  <link rel='stylesheet' type='text/css' href='index.css?version=1' />
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<div id='holds-container'>

  <div class='holds-main'>
    <h3 class='text-primary text-center'>Account Holds</h3>
    <div class='holds-content'>
      <?php
      include "includes/dbConnect.php";
      session_start();

      $userid = $_SESSION['userID'];
      $year = date("Y");

      if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $query = "SELECT * FROM studenthold WHERE studentID = $userid";
      $result = $connection->query($query);
      $row = $result->fetch_assoc();

      if ($result->num_rows > 0) {
        echo "<p id='hold'><strong>" . $row['hName'] . ' Hold' . "</strong></p>";
        echo "<br>";
      } else {
        echo "<h4>Nice going. You have no holds on your account.</h4>";
      }

      $connection->close();

      ?>
    </div>

  </div>
</div>

</html>