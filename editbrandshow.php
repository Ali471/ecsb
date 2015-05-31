<?php
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

        $id=$_GET['id'];
       
        $name="";
        $desc="";
        $cat="";
        $query=mysqli_query($conn,"select * from brand where brand_id=$id");
        while($row=mysqli_fetch_assoc($query))
        {

        	$name=$row['name'];
        	$desc=$row['description'];
            $catid=$row['categoryid'];

            $query2=mysqli_query($conn,"select * from productcategory where category_id=$catid");
            while($row2=mysqli_fetch_assoc($query2))
            {
                $cat=$row2['name'];
            }

        }

        $data = array(
        'name' => $name,
        'descr' => $desc,
        'category'=>$cat,
        'id' =>$id
    );
 
    echo json_encode($data);
 
    exit;


?>