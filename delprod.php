<?php

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
	
	
  	if(isset($_GET['abc']))
  		
  		{


	 		$data =$_GET['abc'];
	 		
	 		$query=mysqli_query($conn,"delete from products where product_id in(".$data.")");
	 		
	 		if($query)
	 		{
	 		echo"record successfully  deleted";
	 		}
	 		else
	 		{
	 			echo "Opps tecnicle Issue";
	 		}
		}
	 

	  
	
?>