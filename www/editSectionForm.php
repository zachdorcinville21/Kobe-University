 <head>
  <meta charset="utf-8">
  <title><?php print("Edit Section"); ?></title>
  <link rel='stylesheet' type='text/css' href='index.css?version=1' />
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<?php 

if (isset($_POST['submit'])) 
{
	include 'includes/dbConnect.php';
	
	$CID = mysqli_real_escape_string($conn, $_POST['courseID']);
	$CRN = mysqli_real_escape_string($conn, $_POST['CRN']);
	$semester = mysqli_real_escape_string($conn, $_POST['semester']);
	$courseN = mysqli_real_escape_string($conn, $_POST['CName']);
	$year = mysqli_real_escape_string($conn, $_POST['year']);
	$room = mysqli_real_escape_string($conn, $_POST['roomID']);
	$courseN = mysqli_real_escape_string($conn, $_POST['CName']);
	$Credits = mysqli_real_escape_string($conn, $_POST['NumCredits']);	
}
else if(isset($_POST['delete']))
{
	include 'includes/dbConnect.php';
	/*TODO: Backend work to delete course from database and redirect to homepage*/
}

?>

<section class="main-container">
	<div class="container">
		<h2>Edit Section</h2>
		<form class="form" action="" method="POST">
			<input type="text" name="courseName" id="Name" placeholder="Course Name" style="width:250px;">
			<input type="hidden" name="CourseID" value="<?php $CID ?>"/>
			<input type="hidden" name="CRN" value="<?php $CRN ?>"/>
			<input type="text" name="room" id="room" placeholder="Room" style="width:250px;">
			<input type="text" name="faculty" id="faculty" placeholder="Faculty ID" style="width:250px;">
			<input type="text" name="year" id="year" placeholder="Year" style="width:250px;">
			<input type="text" name="sectionNum" id="sectionNum" placeholder="SectionNum" style="width:250px;">
			<select name = "semester" id="semester">
				<option value="" disabled selected>Semester</option>
 				<option value="1">FALL</option>
  				<option value="2">SPRING</option>
			</select>

			<div> <button type="submit" name="submit"> Save Changes </button> </div>
		</form>
	</div>
    	

</form>	
</section>