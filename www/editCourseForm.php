 <head>
  <meta charset="utf-8">
  <title><?php print("Edit Course"); ?></title>
  <link rel='stylesheet' type='text/css' href='index.css?version=1' />
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<?php 

if (isset($_POST['submit'])) 
{
	include 'includes/dbConnect.php';
	
	$CID = mysqli_real_escape_string($connection, $_POST['CourseID']);
	$DeptID = mysqli_real_escape_string($connection, $_POST['DeptCode']);
	$courseN = mysqli_real_escape_string($connection, $_POST['CName']);
	$Credits = mysqli_real_escape_string($connection, $_POST['NumCredits']);
	
}
else if(isset($_POST['delete']))
{
	include 'includes/dbConnect.php';
	/*TODO: Backend work to delete course from database and redirect to homepage*/
}

?>

<section class="main-container">
	<div class="container">
		<h2>Edit Course</h2>
		<form class="form" action="" method="POST">
			<input type="text" name="courseName" id="Name" placeholder="Course Name" style="width:250px;">
			<input type="hidden" name="CourseID" value="<?php $CID ?>"/>
        	<input type="text" name="Dept" id="DeptID" placeholder="Dept" style="width:250px;">
			
			<select name = "Credits" id="Cred">
				<option value="" disabled selected>Credits</option>
 				<option value="1">1</option>
  				<option value="2">2</option>
  				<option value="3">3</option>
  				<option value="4">4</option>
			</select>

			<div> <button type="submit" name="submit"> Save Changes </button> </div>
		</form>
	</div>
    	

</form>	
</section>