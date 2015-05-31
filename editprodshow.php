<?php
        session_start();
        if($_SESSION['email']=='')
        {
            header("location:Home.php");
        }
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
        $iname="";
    
          $q=mysqli_query($conn,"SELECT fname,lname FROM siteowner WHERE email='$email'");
          while ($row=mysqli_fetch_row($q))
            {
            $fname=$row[0];
            $lname=$row[1];
            $iname=$fname.$lname;
            
            }

        $id=$_GET['id'];
       
        $name=$desc=$cat=$brand=$img=$price="";

        $query  =   mysqli_query($conn,"select * from products where product_id=$id");

        while($row=mysqli_fetch_assoc($query))
        {

        	$name      =   $row['name'];
        	$desc      =   $row['description'];
            $price     =   $row['price'];
            $catid     =   $row['category_id'];
            $bid       =   $row['brand_id'];
            $img       =   $row['image'];



            $query2 =   mysqli_query($conn,"select * from productcategory where category_id=$catid");

            while($row2=mysqli_fetch_assoc($query2))
            {
                $cat=$row2['name'];
            }

            $query3 =   mysqli_query($conn,"select * from brand where brand_id=$bid");

            while($row3=mysqli_fetch_assoc($query3))
            {
                $brand=$row3['name'];
            }

        }

        $data = array(

            'name'      =>     $name,
            'desc'      =>     $desc,
            'category'  =>     $cat,
            'iname'     =>     $iname,
            'image'     =>     $img,
            'brand'     =>     $brand, 
            'price'     =>     $price,
            'id'        =>     $id
    );
 
    echo json_encode($data);
 
    exit;


?>