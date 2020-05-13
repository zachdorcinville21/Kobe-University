 <head>
  <meta charset="utf-8">
  <title><?php print("User Form Submit"); ?></title>
  <link rel='stylesheet' type='text/css' href='index.css?version=1' />
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<?php 

if (isset($_POST['submit'])) 
{
	include 'includes/dbConnect.php';
	
	$UID = mysqli_real_escape_string($connection, $_POST['userID']);
	$Email = mysqli_real_escape_string($connection, $_POST['userEmail']);
	$fname = mysqli_real_escape_string($connection, $_POST['FName']);
	$lname = mysqli_real_escape_string($connection, $_POST['LName']);
	$phone = mysqli_real_escape_string($connection, $_POST['Phone']);
	$u_type = mysqli_real_escape_string($connection, $_POST['Type']);
	if($u_type == 'STUDENT')
	{
		$major = mysqli_real_escape_string($connection, $_POST['majorName']);
		$minor = mysqli_real_escape_string($connection, $_POST['minorName']);
	}
}
else if(isset($_POST['viewSchedule']))
{
	include_once 'includes/dbconnect.php';
	$UID = mysqli_real_escape_string($connection, $_POST['userID']);
	$u_type = mysqli_real_escape_string($connection, $_POST['Type']);
	echo'<form id="form" action="viewUserSchedule.php" method="post">';
 	echo '<input type="hidden" name="ID" value="';echo $UID; echo'">';
 	echo '<input type="hidden" name="Type" value="';echo $u_type; echo'">';
	echo'</form>';
	echo'<script type="text/javascript">
    	document.getElementById(\'form\').submit();
	</script>';
}
else if(isset($_POST['viewTranscript']))
{
	include_once 'includes/dbconnect.php';
	$UID = mysqli_real_escape_string($connection, $_POST['userID']);
	echo'<form id="form" action="viewUserTranscript.php" method="post">';
 	echo '<input type="hidden" name="ID" value="';echo $UID; echo'">';
	echo'</form>';
	echo'<script type="text/javascript">
    	document.getElementById(\'form\').submit();
	</script>';
}
else if(isset($_POST['viewFacultySchedule']))
{
	include_once 'includes/dbconnect.php';
	$UID = mysqli_real_escape_string($connection, $_POST['userID']);
	$u_type = mysqli_real_escape_string($connection, $_POST['Type']);
	echo'<form id="form" action="viewUserSchedule.php" method="post">';
 	echo '<input type="hidden" name="ID" value="';echo $UID; echo'">';
 	echo '<input type="hidden" name="Type" value="';echo $u_type; echo'">';
	echo'</form>';
	echo'<script type="text/javascript">
    	document.getElementById(\'form\').submit();
	</script>';
}
else if(isset($_POST['viewAdvisees']))
{
	
}
else if(isset($_POST['viewAdvisors']))
{

}
else if(isset($_POST['viewHolds']))
{

}
else if(isset($_POST['delete']))
{
	include_once 'includes/dbconnect.php';
	/*TODO: Backend work to delete user from database and redirect to homepage*/
}

?>

<section class="main-container">
	<div class="container">
		<h2>Edit User</h2>
		<form class="form" action="" method="POST">
			<input type="text" name="Email" id="Email" placeholder="Email" style="width:150px;">
			<input type="text" name="FName" id="FName" placeholder="First Name" style="width:150px;">
			<input type="text" name="LName" id="LName" placeholder="Last Name" style="width:150px;">
			<input type="text" name="Password" id="Password" placeholder="Password" style="width:150px;">
			<input type="hidden" name="userID" value="<?php echo $UID; ?>"/>
			<?php 
			if($u_type == 'STUDENT')
			{

				echo '<select name = "major" id="minor">
				<option value="" disabled selected>Major</option>
 				<option value="1">UNDECLARED</option>
  				<option value="2">Mathematics</option>
  				<option value="3">Criminology</option>
  				<option value="4">Computer Information & Science</option>
  				<option value="5">Management Information Systems</option>
  				<option value="6">History</option>
  				<option value="7">Philosphy & Religion</option>
  				<option value="8">Chemistry</option>
  				<option value="9">Biochemistry</option>
				</select>

			<select name = "minor" id="minor">
				<option value="" disabled selected>Minor</option>
 				<option value="1">UNDECLARED</option>
  				<option value="2">Mathematics</option>
  				<option value="3">Criminology</option>
  				<option value="4">Computer Information & Science</option>
  				<option value="5">Management Information Systems</option>
  				<option value="6">History</option>
  				<option value="7">Philosphy & Religion</option>
  				<option value="8">Chemistry</option>
  				<option value="9">Biochemistry</option>
			</select>';
			}
			?>

			<div> <button type="submit" name="submit"> Save Changes </button> </div>
		</form>
	</div>
    	

</form>	
</section>