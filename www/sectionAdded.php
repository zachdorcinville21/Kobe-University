<?php 
    include 'includes/dbConnect.php';
    session_start();

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $crn = $_POST['CRN'];
    $course_id = $_POST['CID'];
    $now = date("Y");
    $year = (int)$now;
    $fac_id = $_POST['facultyID'];
    $time_slot = $_POST['timeSlotID'];
    $days = $_POST['dayName'];
    $roomID = $_POST['roomID'];
    $sec_num = $_POST['sectionNum'];
    $semester = $_POST['Semester'];

    $_SESSION['crn'] = $crn;

    $stmt = $connection->prepare("INSERT INTO section VALUES (?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("iiisiiisi", $crn, $course_id, $roomID, $days, $time_slot, $fac_id, $sec_num, $semester, (int)$year);

    if (!$stmt->execute()) {
        echo "<h4>Unable to add section</h4>";
    } else {
        echo "<h4>Section successfully added.</h4>" . " <a href='userHome.php'>Return home</a>";
    }

?>