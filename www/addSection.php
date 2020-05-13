 <head>
   <meta charset="utf-8">
   <title><?php print("Add Section"); ?></title>
   <link rel='stylesheet' type='text/css' href='index.css?version=1' />
   <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
 </head>

 <section class="main-container">
   <div class="container">
     <h2>Add Section</h2>
     <form class="form" action="sectionAdded.php" method="POST">
       <input type="text" name="CRN" id="CRN" placeholder="CRN" style="width:250px;" />
       <input type="text" name="CourseID" id="CID" placeholder="Course ID" style="width:250px;" />
       <input type="text" name="year" id="year" placeholder="Year" style="width:250px;" />
       <input type="text" name="facultyID" id="facultyID" placeholder="Faculty ID" style="width:250px;" />
       <input type="text" name="timeSlotID" id="timeSlotID" placeholder="timeSlotID" style="width:250px;" />
       <input type="text" name="dayName" id="dayName" placeholder="Day Name" style="width:250px;" />
       <input type="text" name="roomID" id="room-id" placeholder="Room Number" style="width:250px;" />

       <select name="Semester" id="Semester">
         <option disabled selected>Semester</option>
         <option value="FALL">FALL</option>
         <option value="SPRING">SPRING</option>
       </select>

       <select name="sectionNum" id="sectionNum">
         <option value="" disabled selected>Section Number</option>
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
         <option value="6">6</option>
       </select>

       <input type='submit' value="Add Section" />
     </form>
   </div>
 </section>