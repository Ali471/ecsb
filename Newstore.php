<?php


	session_start();
	 $servername = "localhost";
     $username = "root";
     $password = "";

	$conn = mysqli_connect($servername, $username, $password);


if (!$conn) 
	{
    	die("Connection failed: " . mysqli_connect_error());
	}

$db_selected= mysqli_select_db($conn,'ecsb');

if (!$db_selected) 
	{
    	die ('Can\'t use foo : ' . mysql_error());
	}

	$email=$_SESSION['email'];
	$sname='';
  
  $query=mysqli_query($conn,"SELECT fname,lname FROM siteowner WHERE email='$email'");
  while ($row=mysqli_fetch_row($query))
    {
    $fname=$row[0];
    $lname=$row[1];
    $sname=$fname.$lname;
    
    }

$temid="";
if(isset($_POST['template']))
	{
	$name=$_POST['template'];
	$q=mysqli_query($conn,"select template_id from template where name='$name'");
		while($r=mysqli_fetch_assoc($q))
		{
			$temid=$r['template_id'];
		}

	}



if(isset($_POST['sname'])&&isset($_FILES['image']['name'])&&isset($_POST['menu'])&&isset($_POST['finfo']))
{

$name=mysqli_real_escape_string($conn,$_POST['sname']);
$image=$_FILES['image']['name'];
$menu=mysqli_real_escape_string($conn,$_POST['menu']);
$fotter=$_POST['finfo'];
$sid=$_SESSION['id'];
$store_id="";

$exist=mysqli_query($conn,"select * from store where name='$name'");
$existrun=mysqli_num_rows($exist);
if($existrun>0)
{
	echo "<script type='text/javascript'>alert('This Store Name Already been Taken');</script>";
	echo "<script>setTimeout(\"location.href = 'stores.php';\",100);</script>";
}
else
{

$path='img/Users/'.$sname.'/';

 

move_uploaded_file($_FILES["image"]["tmp_name"], $path . $_FILES["image"]["name"]);



$query=mysqli_query($conn,"insert into store(name,menu,logo,fotter,siteOwner_id,template_id)values('$name','$menu','$image','$fotter','$sid','$temid')");
if($query)
{
	$query2=mysqli_query($conn,"select storeid from store where name='$name'");
	while($run2=mysqli_fetch_assoc($query2))
	{
		$store_id=$run2['storeid'];
	
	}

	if(isset($_POST['pchk']))
	{
	$chk=$_POST['pchk'];
	foreach ($chk as $value) 
	
	{
		$run=mysqli_query($conn,"insert into storeproducts(store_id,product_id)values($store_id,$value)");
	
	}
	}
	echo "<script type='text/javascript'>alert('New Store Created Succesfully.');</script>";
	echo "<script>setTimeout(\"location.href = 'stores.php';\",100);</script>";
}
else
{
	echo "<script type='text/javascript'>alert('Ooop there is tecnical issue.try again in few minutes');</script>";
	echo "<script>setTimeout(\"location.href = 'stores.php';\",100);</script>";
}

}

}
else
{
	echo "<script type='text/javascript'>alert('Please  Fill All Fields');</script>";
	echo "<script>setTimeout(\"location.href = 'stores.php';\",500);</script>";
}



?>