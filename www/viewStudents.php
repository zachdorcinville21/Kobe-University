 <head>
  <meta charset="utf-8">
  <title><?php print("View All Courses"); ?></title>
  <link rel='stylesheet' type='text/css' href='index.css?version=1' />
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
</script>
<section class="main-container">



<div class="container">
    <table id="userTable" class="display nowrap" width="100%">
    <thead>
        <tr>
          <th style="background-color: #ADD8E6; color:#fff;">First Name</th>
          <th style="background-color: #ADD8E6; color:#fff;">Last Name</th>
          <th style="background-color: #ADD8E6; color:#fff;">Email</th>
          <th style="background-color: #ADD8E6; color:#fff;">Grade</th>
          <th style="background-color: #ADD8E6; color:#fff;"></th>
        </tr>
    </thead>
    
    <tbody>
        <?php
        session_start();
        include 'includes/dbConnect.php';
    
        $CID = mysqli_real_escape_string($connection, $_POST['CourseID']);
        $DeptID = mysqli_real_escape_string($connection, $_POST['DeptCode']);
        $courseN = mysqli_real_escape_string($connection, $_POST['CName']);
        $CRN = mysqli_real_escape_string($connection, $_POST['CRN']);
        $semester = mysqli_real_escape_string($connection, $_POST['semester']);
        $termID = '';
        if($semester == 'SPRING')
        {
            $termID = '2020S';
        }
        else
        {
            $termID = '2020F';
        }
        $sql = "SELECT * FROM sysuser
                INNER JOIN studentcoursehistory ON studentcoursehistory.studentID = sysuser.userID 
                WHERE userType = 'STUDENT' AND studentcoursehistory.CRN = '$CRN' AND studentcoursehistory.termID = '$termID'";
        $result = mysqli_query($connection, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck < 1)
        {
            echo 'No students have registered for this course yet.';
        }

        while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>
        <tr>
            <td><?php echo $row['firstName']; ?></td>
            <td><?php echo $row['lastName']; ?></td>
            <td><?php echo $row['userEmail']; ?></td>
            <td><?php echo $row['grade']; ?></td>
            
            <form method="post" action="editGrade.php">
                <input type="hidden" name="UID" value="<?php echo $row['userID']; ?>"/>
                <input type="hidden" name="CRN" value="<?php echo $CRN; ?>"/>
                <td> <button type="submit" name="edit"> Edit Grade </button></td>
            </form>
        </tr>
        <?php endwhile?>
    </tbody>
</table>
</section>
</div>