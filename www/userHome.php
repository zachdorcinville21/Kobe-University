<!DOCTYPE html>

<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title><?php print("Welcome, " . $_SESSION['f_name'] . "."); ?></title>
  <link rel='stylesheet' type='text/css' href='index.css?version=1' />
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<?php
    session_start(); 
?>
<div id='container'>
  <div class='main'>
    <h2 id='greeting'>
    	<?php
         echo("Welcome, " . $_SESSION['f_name']);
        ?>                  
    </h2>
	
    <div class="nav">
      <nav id='navbar'>
      	<ul class='menu'>
	<?php
		if($_SESSION['u_type'] == 'STUDENT')
		{
		  echo'
          <li><a class="menu-link" href="addDrop.php"><i class=\'fas fa-chalkboard-teacher\'></i><br>Add/Drop Class</a></li>
          <li><a class="menu-link" href="studentHolds.php"><i class=\'fas fa-hand-paper\'></i><br>View Holds</a></li>
          <li><a class="menu-link" href="catalog.php"><i class=\'fas fa-book-open\'></i><br>Look up Catalog</a></li>
          <li><a class="menu-link" href="viewTranscript.php"><i class=\'fas fa-file-signature\'></i><br>View Transcript</a></li>
          <li><a class="menu-link" href="studentSchedule.php"><i class=\'fas fa-calendar-alt\'></i><br>View Schedule</a></li>';
		}
		else if($_SESSION['u_type'] == 'FACULTY')
		{
		  echo'
          <li><a class="menu-link" href="viewCoursesFaculty.php"><i class=\'fas fa-chalkboard-teacher\'></i><br>View Classes</a></li>
          <li><a class="menu-link" href="facultySchedule.php"><i class=\'fas fa-calendar-alt\'></i><br>View Schedule</a></li>
          <li><a class="menu-link" href="viewAdvisorFaculty.php"><i class=\'fas fa-user-friends\'></i><br>View Advisees</a></li>';
		}
		else if($_SESSION['u_type'] == 'ADMIN')
		{
		  echo'
		  <li><a class="menu-link" href="viewUsers.php"><i class=\'fas fa-users\'></i><br>View Users</a></li>
		  <li><a class="menu-link" href="addSection.php"><i class=\'fas fa-calendar-alt\'></i><br>Add Sections</a></li>
      <li><a class="menu-link" href="viewSections.php"><i class=\'fas fa-chalkboard-teacher\'></i><br>View Sections</a></li>
		  <li><a class="menu-link" href="addCourse.php"><i class=\'fas fa-chalkboard\'></i><br>Add Courses</a></li>
          <li><a class="menu-link" href="viewCourses.php"><i class=\'fas fa-edit\'></i><br>Update Courses</a></li>
          <li><a class="menu-link" href="viewMasterSchedule.php"><i class=\'fas fa-file-signature\'></i><br>View Master Schedule</a></li>
          <li><a class="menu-link" href="catalog.php"><i class=\'fas fa-book-open\'></i><br>Look up Catalog</a></li>
          ';
		}
		else if($_SESSION['u_type'] == 'RESEARCH')
		{
		  echo'
          <li><a class="menu-link" href="viewMasterSchedule.php"><i class=\'fas fa-file-signature\'></i><br>View Master Schedule</a></li>
          <li><a class="menu-link" href="viewAcademicCalander.php"><i class=\'fas fa-calendar-alt\'></i><br>View Academic Calendar</a></li>
          <li><a class="menu-link" href="catalog.php"><i class=\'fas fa-book-open\'></i><br>Look up Catalog</a></li>';
		}

	?>
	</ul>
      </nav>
    </div>

  </div>

</div>

</html>