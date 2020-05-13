<?php 
include 'includes/dbConnect.php';
?>
 <head>
  <meta charset="utf-8">
  <title><?php print("View All Sections"); ?></title>
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
          <th style="background-color: #ADD8E6; color:#fff;">CRN</th>
          <th style="background-color: #ADD8E6; color:#fff;">COURSEID</th>
            <th style="background-color: #ADD8E6; color:#fff;">SEMESTER</th>
            <th style="background-color: #ADD8E6; color:#fff;">YEAR</th>
            <th style="background-color: #ADD8E6; color:#fff;">ROOMID</th>
            <th style="background-color: #ADD8E6; color:#fff;">COURSE_NAME</th>
            <th style="background-color: #ADD8E6; color:#fff;">CREDITS</th>
            <th style="background-color: #ADD8E6; color:#fff;"></th>
            <th style="background-color: #ADD8E6; color:#fff;"></th>
        </tr>
    </thead>
    
    <tbody>
        <?php 
                
        $sql = "SELECT * FROM `section` 
                INNER JOIN course ON section.courseID = course.courseID
                ORDER BY `year` DESC;";
	      $result = mysqli_query($connection, $sql);
        
        while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>
        <tr>
            <td><?php echo $row['CRN']; ?></td>
            <td><?php echo $row['courseID']; ?></td>
            <td><?php echo $row['semester']; ?></td>
            <td><?php echo $row['year']; ?></td>
            <td><?php echo $row['roomID']; ?></td>
            <td><?php echo $row['courseName']; ?></td>
            <td><?php echo $row['numberOfCredits']; ?></td>
            
            <form method="post" action="editSectionForm.php">
              <input type="hidden" name="CRN" value="<?php echo $row['CRN']; ?>"/>
            	<input type="hidden" name="courseID" value="<?php echo $row['courseID']; ?>"/>
              <input type="hidden" name="semester" value="<?php echo $row['semester']; ?>"/>
              <input type="hidden" name="year" value="<?php echo $row['year']; ?>"/>
           	  <input type="hidden" name="CName" value="<?php echo $row['courseName']; ?>"/>
              <input type="hidden" name="NumCredits" value="<?php echo $row['numberOfCredits']; ?>"/>
           	  <input type="hidden" name="roomID" value="<?php echo $row['roomID']; ?>"/>
            	<td> <button type="submit" name="edit"> Edit </button></td>
              <td><button type="submit" name="delete"> Delete </button></td>
            </form>
        </tr>
        <?php endwhile ?>
    </tbody>
</table>
</section>
</div>