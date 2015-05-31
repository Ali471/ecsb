<?php 
session_start();

        $servername=$password=$email="" ;
     
        
       
        
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

 $email     	=   mysqli_real_escape_string($conn,$_POST['email']);
 $password      =   mysqli_real_escape_string($conn,$_POST['password']);



 if(!preg_match('/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/', $email)){ //validate email address - check if is a valid email address
        $status = "error";
        $message = "You have entered an invalid email address!";
    }
    else {
       $existingSignup = mysqli_query($conn,"SELECT * FROM siteowner WHERE email='$email' && password='$password'"); 
       $row=mysqli_fetch_assoc($existingSignup) ; 
       if( $row< 1){
 
 
           $status = "error";
            $message = "The email or password  incorrect..!";
           
        }
        else
         {

         	$_SESSION['email']=$row['email'];
            $_SESSION['id']=$row['siteOwner_id'];
            $status="success";
            $message="success";
            
        }
    }
 
    
    $data = array(
        'status' => $status,
        'message' => $message
    );
 
    echo json_encode($data);
 
    exit;





?>