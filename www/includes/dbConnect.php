<?php
//Reduces redundancy from retyping in connection info to the Database.
//Just include this file if you need to access the database. 
//Also makes it easier to hotswap databases if any of this information changes
//$dbServername = "localhost";
//$dbUsername = "root";
//$dbPassword = "";
//$dbName = "kobe_university";
//$connection = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
 $connection = new mysqli('127.0.0.1:3306', 'root', 'zachster101', 'Kobe_University');
//$connection = new mysqli('kobeuni-db-instance.c4hb4gimpjus.us-east-1.rds.amazonaws.com', 'root', 'zachster101', 'Kobe_University');
