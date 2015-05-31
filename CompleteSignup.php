<?php
      $servername=$status=$email=$fname=$lname=$message=$name=$path="";
     $servername  = "localhost";
     $username    = "root";
     $password    = "";

     $conn        = mysqli_connect($servername, $username, $password);


if (!$conn)
 {

    die("Connection failed: " . mysqli_connect_error());
  }

$db_selected= mysqli_select_db($conn,'ecsb');

if (!$db_selected)
  {
    die ('Can\'t use foo : ' . mysql_error());
  }


  $email=$_POST['email'];
  
  $query=mysqli_query($conn,"SELECT fname,lname FROM siteowner WHERE email='$email'");
  while ($row=mysqli_fetch_row($query))
    {
    $fname=$row[0];
    $lname=$row[1];
    $name=mysqli_real_escape_string($conn,$fname.$lname);
    
    }
  // Free result set
  mysqli_free_result($query);


if ($_FILES["Photo"]["error"] > 0)
  {
  echo "Return Code: " . $_FILES["Photo"]["error"] . " ";
  }
  else
  {
    
    if (!file_exists('img/Users/'.$name)) {
    mkdir('img/Users/'.$name , 0777, true);
    
    }

$path='img/Users/'.$name.'/';

  if (file_exists($path. $_FILES["Photo"]["name"]))
  {
  $error="File Already Exists";
  echo $error;
  }
  else
  {

// error line for you to compare the error
// move_uploaded_file($_FILES["photo"]["tmp… "users/" . $_FILES["photo"]["name"]);

move_uploaded_file($_FILES["Photo"]["tmp_name"], $path . $_FILES["Photo"]["name"]);

  $img=$_FILES['Photo']['name'];
  $address=$_POST['address'];

  $query1="Update siteowner set image='$img',country='$address' WHERE email='$email'";
  $run1=mysqli_query($conn,$query1);

  
  header('Location:profile.php');
  }
  }
   // this was the missing closing brace
  


    
?>
