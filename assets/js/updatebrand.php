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

       $name    = $_POST['ebname'];
       $cat     = $_POST['upcat'];
       $desc    = $_POST['ebdes'];


       






        $data = array(
        'name' => $name,
        'descr' => $desc
    );
 
    echo json_encode($data);
 
    exit;


?>