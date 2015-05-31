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
        $pid="";
        $query=mysqli_query($conn,"select * from productcategory where category_id=$id");
        while($row=mysqli_fetch_assoc($query))
        {
        	$name=$row['name'];
        	$desc=$row['description'];
            $pid=$row['category_id'];
        }

        $data = array(
        'name' => $name,
        'descr' => $desc,
        'id'    =>$pid
    );
 
    echo json_encode($data);
 
    exit;


?>