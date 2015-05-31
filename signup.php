<?php 
      session_start();
        $servername=$username=$email=$fname=$lname=$password="" ;
     
        
       
        
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
   
  $email      =   mysqli_real_escape_string($conn,$_POST['email']);
  $fname      =   mysqli_real_escape_string($conn,$_POST['fname']);
  $lname      =   mysqli_real_escape_string($conn,$_POST['lname']);
  $password   =   mysqli_real_escape_string($conn,$_POST['password']);
  
  $name=$fname+" "+$lname;
    
     if(!preg_match('/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/', $email)){ //validate email address - check if is a valid email address
        $status = "error";
        $message = "You have entered an invalid email address!";
    }
    else {
       $existingSignup = mysqli_query($conn,"SELECT * FROM siteowner WHERE Email='$email'"); 
       $row=  mysqli_num_rows($existingSignup);
       if($row< 1){
 
 
           $insertSignup = mysqli_query($conn,"INSERT INTO siteowner (fname,lname,email,password) VALUES ('$fname','$lname','$email','$password')");
           if($insertSignup){
            
            $exe = mysqli_query($conn,"SELECT * FROM siteowner WHERE Email='$email'"); 
            $row1=  mysqli_fetch_array($exe);
            
            
              $_SESSION['id']=$row1[0];
             
              $_SESSION['email']=$email;
            
               $status = "success";
               $message = $email;   
           }
           else {
               $status = "error";
               $message = "Ooops, Theres been a technical error!";  
           }
        }
        else {
            $status = "error";
            $message = "This email address has already been registered!";
        }
    }
 
    
    $data = array(
        'status' => $status,
        'message' => $message
    );
 
    echo json_encode($data);
 
    exit;





?>
