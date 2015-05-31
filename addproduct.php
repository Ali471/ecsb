<?php
		session_start();
						
							$name='';
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

	$pname=$_POST['pname'];	

	$q="select * from products where name='$pname' and siteOwner_id=".$_SESSION['id']."";
	$r=mysqli_query($conn,$q);
	if(mysqli_num_rows($r)>0)
	{
		 echo "<script type='text/javascript'>alert('This Producct Already .');</script>";
        echo "<script>setTimeout(\"location.href = 'products.php';\",100);</script>";
	}
	else
	{


	$pcname=$_POST['pcategory'];
	$query1="select * from productcategory where name='$pcname' ";
	$run1=mysqli_query($conn,$query1);
	$row=mysqli_fetch_row($run1);
	$categoryid=$row[0];
	
	$brands=$_POST['brands'];
	$query2="select * from brand where name='$brands' ";
	$run2=mysqli_query($conn,$query2);
	$row2=mysqli_fetch_row($run2);
	$brandid=$row2[0];
	
	$email=$_POST['email'];
	$sid=$_SESSION['id'];
  
  $query=mysqli_query($conn,"SELECT fname,lname FROM siteowner WHERE email='$email'");
  while ($row=mysqli_fetch_row($query))
    {
    $fname=$row[0];
    $lname=$row[1];
    $name=$fname.$lname;
    
    }
 

if ($_FILES["pimage"]["error"] > 0)
  {
  echo "Return Code: " . $_FILES["pimage"]["error"] . " ";
  }
  else
  {

$path='img/Users/'.$name.'/';

 

move_uploaded_file($_FILES["pimage"]["tmp_name"], $path . $_FILES["pimage"]["name"]);


	
	$pimage=$_FILES['pimage']['name'];	
	$price=mysqli_real_escape_string($conn,$_POST['price']);
	$pdes=$_POST['description'];
	
	
		$query1="insert into products(name,description,price,image,brand_id,category_id,siteOwner_id)values('$pname','$pdes','$price','$pimage',$brandid,$categoryid,$sid)";
		$run=mysqli_query($conn,$query1);
		if($run)
		{

		header("location:products.php");
		}
	else
		{
		echo"tecnical issue";
		}

	}
}
?>