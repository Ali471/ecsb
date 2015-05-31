<?php

session_start();
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



$id=$_GET['id'];
$sid=$_SESSION['id'];

if($id==1)
{
    if(!empty($_POST['name'])&& !empty($_POST['description']))
    {
        $name=mysqli_real_escape_string($conn,$_POST['name']);
        $des=mysqli_real_escape_string($conn,$_POST['description']);
        $query1="select * from productcategory where name='$name' ";
        $run1=mysqli_query($conn,$query1);

        if(mysqli_num_rows($run1)>0)
        {
            echo "<script type='text/javascript'>alert('This Category Name Already Exists.');</script>";
            echo "<script>setTimeout(\"location.href = 'category.php';\",100);</script>";
        }

        else

        {

            $query="Insert into productcategory(description,name,siteOwner_id) values('$des','$name',$sid)";
            $run=mysqli_query($conn,$query);
                if($run)
                {
    	           header("location:category.php");
                }

                {
                    echo "<script type='text/javascript'>alert('Opps ! there is tecnicle Issue');</script>";
                }
        }
    }
    else
    {
        echo "<script type='text/javascript'>alert('Please Enter Name and Discription');</script>";
    }
}

else
{
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $query2="select * from brand where name='$name' ";
    $run2=mysqli_query($conn,$query2);

    if(mysqli_num_rows($run2)>0)
    {
        echo "<script type='text/javascript'>alert('This Brand Name Already Exists.');</script>";
        echo "<script>setTimeout(\"location.href = 'category.php';\",100);</script>";
    }

    else

    {

    $pcname=$_POST['pcategory'];
    $query3="select * from productcategory where name='$pcname' ";
    $run3=mysqli_query($conn,$query3);
    $row=mysqli_fetch_row($run3);
    $categoryid=$row[0];

    
    $des=mysqli_real_escape_string($conn,$_POST['description']);
    $pcategory=mysqli_real_escape_string($conn,$_POST['pname']);
    
    $query="Insert into brand(name,description,categoryid,siteOwner_id) values('$name','$des','$categoryid',$sid)";
$run=mysqli_query($conn,$query);
if($run)
{
    header("location:category.php");
}
{
    alert("ooop ! there is tecnical issue.. ");
}
}

}


    ?>