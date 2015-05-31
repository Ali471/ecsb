<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//Connect To Db
$db_selected= mysqli_select_db($conn,'mydb');
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}



?>





