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

       $name    = $_POST['epname'];
       $desc    = $_POST['epdes'];
       $id      = $_POST['epid'];
       $message =   '';

       if(!empty($name)&&!empty($desc)&&!empty($id))
       {

        
        
        $query1=mysqli_query($conn,"Update productcategory Set name='$name' ,  description='$desc' Where category_id=$id");
        if($query1)
        {
            $message="Success";

        }
        else
        {
            $message="error";
        }

       }






        $data = array(
        'response' => $message,
        
    );
 
    echo json_encode($data);
 
    exit;


?>