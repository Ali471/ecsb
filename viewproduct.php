<?php

$servername = "localhost";
     $username = "root";
     $password = "";

$conn = mysqli_connect($servername, $username, $password);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$db_selected= mysqli_select_db($conn,'ecsb');
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}

$storeid=$_POST['id'];

$query="select * from products where store_id=$storeid";

$run=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($run))
{
	echo $row['name']."#".$row['price']."#".$row['image']."#".$row['description'];
}



?>