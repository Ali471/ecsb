<?php
session_start();

$servername=$username=$email=$name=$logo=$footer="" ;
     
        
       
        
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



$name=mysqli_real_escape_string($conn,$_POST['name']);
$logo=mysqli_real_escape_string($conn,$_FILES['logo']['name']);
$footer=mysqli_real_escape_string($conn,$_POST['footer']);
$id=$_SESSION['id'];

$logo=date("hisa").$logo;

$query="insert into store(name,logo,fotter,siteOwner_id)values('$name','$logo','$footer','$id')";
$run=mysqli_query($conn,$query);
if($run)
{



$path='img/store/';

  if (file_exists($path. $logo))
  {
  $error="File Already Exists";
  echo $error;
  }
  else
  {

// error line for you to compare the error
// move_uploaded_file($_FILES["photo"]["tmp… "users/" . $_FILES["photo"]["name"]);

move_uploaded_file($_FILES["logo"]["tmp_name"], $path . $logo);



	$status="success";
}
}
else
{
	$status="error";
}

$data = array(
        'status' => $status,
        
    );

echo json_encode($data);
?>