 <head>
  <meta charset="utf-8">
  <title><?php print("Add Course"); ?></title>
  <link rel='stylesheet' type='text/css' href='index.css?version=1' />
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<section class="main-container">
  <div class="container">
    <h2>Add Course</h2>
    <form class="form" action="courseAddedAdmin.php" method="POST">
      <input type="text" name="courseName" id="Name" placeholder="Course Name" style="width:250px;" />
      <input type="text" name="courseDescription" id="Desc" placeholder="Course Desc" style="width:250px;" />
      <input type="text" name="CourseID" id="CID" placeholder="Course ID" style="width:250px;" />
      <input type="text" name="grad-type" id="g-type" placeholder="Graduate Type" style="width:250px;" />

      <select name = "Dept" id="Dept">
        <option value="" disabled selected>Department</option>
          <option value="MA">Mathematics</option>
          <option value="CR">Criminology</option>
          <option value="CS">Computer Information & Science</option>
          <option value="CS">Management Information Systems</option>
          <option value="HP">History</option>
          <option value="HP">Philosphy & Religion</option>
          <option value="CP">Chemistry</option>
          <option value="CP">Biochemistry</option>
          <option value="MD">Music & Dance</option>
          <option value="SO">Sociology</option>
          <option value="BU">Business</option>
        </select>
      <select name = "Credits" id="Cred">
        <option value="" disabled selected>Credits</option>
        <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
      </select>

      <div> <button type="submit" name="submit"> Add Course </button> </div>
    </form>
  </div>
      

</form> 
</section>