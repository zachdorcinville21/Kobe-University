<?php
session_start();

include 'dbConnect.php';

	$email = $_POST['email'];
  	$password = $_POST['password'];
	$loginQuery = "SELECT * FROM sysuser WHERE userEmail = '$email' AND userPassword = '$password'";
  	$result = mysqli_query($connection, $loginQuery);

	if($row = mysqli_fetch_assoc($result))
	{
		//Log in User
		$_SESSION['f_name'] = $row['firstName'];
  		$_SESSION['u_type'] = $row['userType'];
 		$_SESSION['userID'] = $row['userID'];

		header("Location: ../userHome.php?login=success");
		exit();
	}
else
{
	echo ("<script LANGUAGE='JavaScript'>
    	window.location.href='../login.html?loginfailed';
    	</script>");
	exit();
}