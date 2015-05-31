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
       $id      = $_POST['bid'];
       $catid   =   '';
       $message =   '';

       if(!empty($name)&&!empty($cat)&&!empty($desc)&&!empty($id))
       {

        $query=mysqli_query($conn,"select category_id from productcategory where name='$cat'");
        while($row=mysqli_fetch_assoc($query))
        {
            $catid=$row['category_id'];
        }
        
        $query1=mysqli_query($conn,"Update brand Set name='$name' , categoryid=$catid , description='$desc' Where brand_id=$id");
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