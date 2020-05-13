<?php 
include_once 'includes/dbConnect.php';
?>
 <head>
  <meta charset="utf-8">
  <title><?php print("View All Accounts"); ?></title>
  <link rel='stylesheet' type='text/css' href='index.css?version=1' />
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
</script>
<section class="main-container">

</section>

<div class="container">
    <table id="userTable" class="display nowrap" width="100%">
    <thead>
        <tr>
          <th style="background-color: #ADD8E6; color:#fff;">USER_ID</th>
            <th style="background-color: #ADD8E6; color:#fff;">USER_EMAIL</th>
            <th style="background-color: #ADD8E6; color:#fff;">FIRST_NAME</th>
            <th style="background-color: #ADD8E6; color:#fff;">LAST_NAME</th>
            <th style="background-color: #ADD8E6; color:#fff;">PHONE</th>
            <th style="background-color: #ADD8E6; color:#fff;">TYPE</th>
            <th style="background-color: #ADD8E6; color:#fff;">MAJOR</th>
            <th style="background-color: #ADD8E6; color:#fff;">MINOR</th>
            <th style="background-color: #ADD8E6; color:#fff;"></th>
            <th style="background-color: #ADD8E6; color:#fff;"></th>
            <th style="background-color: #ADD8E6; color:#fff;"></th>
            <th style="background-color: #ADD8E6; color:#fff;"></th>
            <th style="background-color: #ADD8E6; color:#fff;"></th>
            <th style="background-color: #ADD8E6; color:#fff;"></th>
            <th style="background-color: #ADD8E6; color:#fff;"></th>
        </tr>
    </thead>
    
    <tbody>
        <?php 
                
        $sql = "SELECT * FROM `sysuser`
                LEFT JOIN studentmajor ON sysuser.userID = studentmajor.studentID
                LEFT JOIN studentminor ON sysuser.userID = studentminor.studentID;";
	      $result = mysqli_query($connection, $sql);
        
        while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>
        <tr>
            <td><?php echo $row['userID']; ?></td>
            <td><?php echo $row['userEmail']; ?></td>
            <td><?php echo $row['firstName']; ?></td>
            <td><?php echo $row['lastName']; ?></td>
            <td><?php echo $row['phoneNumber']; ?></td>
            <td><?php echo $row['userType']; ?></td>
            <td><?php echo $row['majorName']; ?></td>
            <td><?php echo $row['minorName']; ?></td>
            
            <form method="post" action="viewUserFormSubmit.php">
                <input type="hidden" name="userID" value="<?php echo $row['userID']; ?>"/>
            	<input type="hidden" name="userEmail" value="<?php echo $row['userEmail']; ?>"/>
           	    <input type="hidden" name="FName" value="<?php echo $row['firstName']; ?>"/>
           	    <input type="hidden" name="LName" value="<?php echo $row['lastName']; ?>"/>
           	    <input type="hidden" name="Phone" value="<?php echo $row['phoneNumber']; ?>"/>
            	<input type="hidden" name="Type" value="<?php echo $row['userType']; ?>"/>
            	<?php
            	//Disable Buttons if The User is an Admin
            	if($row['userType'] != "ADMIN"){ ?>
            	<td> <button type="submit" name="submit"> Edit </button></td>
                <td><button type="submit" name="delete"> Delete </button></td>
              <?php
              //Add Extra Buttons for Student
              if($row['userType'] == "STUDENT")
                { ?>
                <input type="hidden" name="majorName" value="<?php echo $row['majorName']; ?>"/>
                <input type="hidden" name="minorName" value="<?php echo $row['minorName']; ?>"/>
                <td><button type="submit" name="viewSchedule"> Schedule </button></td>
                <td><button type="submit" name="viewAdvisors"> Advisors </button></td>
                <td><button type="submit" name="viewHolds"> Holds </button></td>
                <td><button type="submit" name="viewTranscript"> Transcript </button></td>
              <?php }  else if($row['userType'] == "FACULTY") { ?>
                <td><button type="submit" name="viewFacultySchedule"> Schedule </button></td>
                <td><button type="submit" name="viewAdvisees"> Advisees </button></td> <?php }?>
            	<?php } else { ?>
            	<td></td>
            	<td></td>
            	<?php } ?>
            </form>
        </tr>
        <?php endwhile ?>
    </tbody>
</table>
</div>