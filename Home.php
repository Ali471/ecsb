<?php


session_start();

 $servername = "localhost";
     $username = "root";
     $password = "";
     $name="";

$conn = mysqli_connect($servername, $username, $password);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$db_selected= mysqli_select_db($conn,'ecsb');
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}



?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Creative Ecommerce Themes</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">
     

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



</head>

<body id="page-top" class="wow fadein">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" 
                data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <!--  <a href="#page-top" class=" navbar-brand page-scroll "><img src="http://blog.flamingtext.com/blog/2015/04/22/flamingtext_com_1429711641_103716239.gif" ></a>-->

               <a class="navbar-brand page-scroll" href="#page-top">Ecommerce Themes</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll " href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Stores</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                    <?php 
                    if(!empty($_SESSION['email']))
                    {
                        
                    
                     echo" <li class='dropdown btn '>";
                    echo"<a class='dropdown-toggle btn-warning' data-toggle='dropdown' href='#'>";
                     echo"   <i class='fa fa-user'></i>  <i class='fa fa-caret-down'></i>";
                    echo"</a>";
                   
                    echo"<ul class='dropdown-menu dropdown-user'>";
                    echo"    <li><a href='profile.php''><i class='fa fa-user'></i> My Profile</a>";
                     echo"   </li>";
                     echo"  <li>";
                      echo"  <a  href='stores.php'><i class='fa fa-th-large'></i>Your Stores</a>";
                    echo" </li>";
                    echo"    <li class='divider'></li>";
                     echo"   <li><a href='logout.php'><i class='fa fa-sign-out'></i> Logout</a>";
                     echo"   </li>";
                     
                    echo"</ul>";
                echo"</li>";
                  
                    }
                    else
                    {
                        echo" <li class='dropdown btn '>";
                    echo"<a class='dropdown-toggle btn-danger ' data-toggle='dropdown' href='#'>";
                     echo"   <i class='fa fa-user-plus '></i>  <i class='fa fa-caret-down'></i>";
                    echo"</a>";
                   
                    echo"<ul class='dropdown-menu dropdown-user'>";
                    echo"    <li><a id='gosignin' ><i class='fa fa-user-plus' ></i> Signin</a>";
                     echo"   </li>";
                    echo"    <li class='divider'></li>";
                     echo"   <li><a id='gosignup' ><i class='fa fa-sign-out'></i> Register</a>";
                     echo"   </li>";
                    echo"</ul>";
                echo"</li>";
                    }
                    
                    ?>

                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content" class="wow fadeinup">
            <div class="header-content-inner">
                <h1 class="wow rotatein">Your Favorite Source of Free Themes And Online Stores</h1>
                <hr>
                <p class="wow zoomindown">Online Ecommerce Themes can help you build better websites using the Bootstrap CSS framework! Just download your template and start going, no strings attached!</p>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a>
            </div>
            <div class="row animate">
           	 	<div class="col-lg-12 col-sm-10 text-center">
             		<div class="social-popout">
             			<img src="img/twitter.png" class="img-responsive" /></div>
                        <div class="social-popout">
                        <img src="img/fb.png" class="img-responsive" /></div>
                        <div class="social-popout">
                        <img src="img/linkedin.png" class="img-responsive" /></div>
                        <div class="social-popout">
                        <img src="img/GooglePlus.png" class="img-responsive" /></div>
                     
             		</div>
             </div>
        </div>
           <span class="fa fa-arrow-circle-up fa-3x scrollToTop"></span>
   </header>

    <section class="bg-primary wow fadeinleft" id="about" >
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">We've got what you need!</h2>
                    <hr class="light">
                    <p class="text-faded">Online Ecommerce Themes has everything you need to get your new website up and running in no time! All of the templates and themes on Ecommerce Store are open source, free to download, and easy to use. No strings attached!</p>
                    <a   class="btn btn-default btn-xl" <?php if(!empty($_SESSION['email'])){echo 'href="profile.php"';}else{echo 'href="#" id="lg"';} ?> >Creat Your Store</a>
                </div>
            </div>
        </div>
    </section>

                 
  <section id="signin" class="wow fadein" style="display:none">
        <span class="fa fa-close fa-3x pull-right" id="close1"></span>
            <div class="container abc">
                <form id="newsletter-signin" role="form" method="post" action="?action=signin" >
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-4 text-center">
                      <h2 class="section-heading">Sign In</h2>
                      <hr class="primary">
                    </div>
                </row>
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-4" >
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="lemail" name="email"
                            placeholder="Enter email"><p id="signin-response"></p>
                        </div>
                        <p class="lEerror error"></p>
                     </div>
              </div> 
              <div class="row">
                    <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-4 ">
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id="lpassword" name="password" 
                                placeholder="Enter Password">
                             </div>
                             <div class="lperror error"></div>
                             </div>
                    </div>
              
            <div class="row" style="margin-top:30px;">
                <div class="col-lg-3 col-lg-offset-4 col-sm-6 col-sm-offset-4 ">
                     <input type="submit" class="btn btn-block btn-default" id="submit" name="submit" Value="Sign In"> 
                </div>
                <div class="col-lg-1  col-sm-3  ">
                            <span class="fa fa-spinner fa-spin fa-3x" id="signin-spin"></span> 
                </div>
                <p>Don't have Account?<a href="#" id="gosign-up">Sign Up</a></p>
            </div>
               
            
        </form>
    </div>
    </section>

            
        


                        <!-- Services Section  -->


              
                 
         

    <section id="services" class="wow fadeinright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">At Your Service</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond wow bounceIn text-primary"></i>
                        <h3>Sturdy Templates</h3>
                        <p class="text-muted">Our templates are updated regularly so they don't break.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>Ready to Ship</h3>
                        <p class="text-muted">You can use this theme as is, or you can make changes!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h3>Up to Date</h3>
                        <p class="text-muted">We update dependencies to keep things fresh.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
                        <h3>Made with Love</h3>
                        <p class="text-muted">You have to make your websites with love these days!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>




                    <!-- Themes Section  -->





    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter">
                <?php 
                        $name='';
                        $q1=mysqli_query($conn,'select * from store');
                        while ($r1=mysqli_fetch_assoc($q1)) {
                            
                            $q2=mysqli_query($conn,"select fname,lname from siteowner where siteOwner_id=".$r1['siteOwner_id']."");
                            $r2=mysqli_fetch_assoc($q2);
                            $name=$r2['fname'].$r2['lname'];    

                      
              echo'  <div class="col-lg-4 col-sm-6 wow fadeinleft">';
                echo'    <a href="Templates/Free/wonder-landing/store.php?storeid='.$r1['storeid'].'" target="_blank" class="portfolio-box">';
                   echo'      <img src="img/Users/'.$name.'/'.$r1['logo'].'" class="img-responsive" height="500px" width="650px" alt="">';
                     echo'        <div class="portfolio-box-caption">';
                   echo'          <div class="portfolio-box-caption-content">';
                    echo'             <div class="project-category text-faded btn">';
                    echo'                View Store';
                     echo'            </div>';
                    echo'             <div class="project-name">';
                     echo      $r1['name'];
                        echo'          </div>';
                      echo'       </div>';
                      echo'   </div>';
                   echo'  </a>';
                echo' </div>';
                  }

                ?>
            </div>
        </div>
    </section>


                        <!-- Aside With Signup Button-->


    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>SignUp Free And make Your Site!</h2>
                <a href="#" class="btn btn-default btn-xl wow rotatein showsection">SignUp Now!</a>
            </div>
        </div>
    </aside>
   

                        <!--Sign Up Form -->


    
    <section id="signup" class="wow rotatein" style="display:none">
    	<span class="fa fa-close fa-3x pull-right" id="close"></span>
    		<div class="container abc">
                <div class="row">
            		<div class="col-lg-4 col-lg-offset-4 text-center">
                  	  <h2 class="section-heading">Sign Up</h2>
                   	  <hr class="primary">
               		</div>
        		</div>
                    <form id="newsletter-signup" role="form" method="post" action="?action=signup" >
            	       <div class="row">
            		        <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-4 ">
                		       <div class="form-group">
    				  		        <label for="fname">First Name:</label>
     				  		       <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter first Name">
    					       </div>
                                <div class=" ferror error"></div>
                                <div class="fa fa-check fsuccess success"></div>
                            </div>
                        </div>
                        <div class="row">
            	           <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-4 ">
                		       <div class="form-group">
    				  		        <label for="lname">Last Name:</label>
     				  		        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter last Name">
    					        </div>
                                <div class="lerror error"></div>
                                <div class="fa fa-check lsuccess success"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-4" >
    					       <div class="form-group">
    			  		 	        <label for="email">Email:</label>
     					 	        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"><p id="signup-response" style="display:none;"></p>
   						        </div>
                                <p class="Eerror error"></p>
                                <div class="fa fa-check Esuccess success"></div>
                            </div>
                        </div> 
                        <div class="row">
            		        <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-4 ">
                			    <div class="form-group">
    				  			   <label for="pwd">Password:</label>
     				  			   <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                                </div>
                                <div class="perror error"></div>
                                <div class="fa fa-check psuccess success"></div>
                            </div>
                        </div>
                        <div class="row">
                    
                   
                    
                        <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-4 ">
                             <div class="form-group">
                                <label for="cpwd">Confirm Password:</label>
                                <input type="password" class="form-control" id="cpassword" name="Cpassword" 
                                placeholder="REnter Password">
                             </div>
                             <div class="cperror error"></div>
                              <div class="fa fa-check cpsuccess success"></div>
                             
                             
                             
                           
                        </div>
                </div>


               
                 
                <div class="row" style="margin-top:30px;">
                <div class="col-lg-3 col-lg-offset-4 col-sm-6 col-sm-offset-4 ">
                			
    				  			
     				  			<input type="submit" class="btn btn-block btn-warning" id="submit" 
                                name="submit" Value="Sign Up"> 
    						
                    	</div>
                        <div class="col-lg-1  col-sm-3  ">
                            
                                
                                <span class="fa fa-spinner fa-spin fa-3x" id="signup-spin"></span> 
                            
                        </div>
                        <p>Already have an Acount?<a href="#" id="gosign-in">Sign In</a></p>
                </div>
               </form>
            
        </div>
    </section>



                <!-- Complete Sign Up Profile -->


    <section id="signupinfo" class="wow fadein" style="display:none;" >
        <div class="container abc">

            <form role="form" method="POST"  action="CompleteSignUp.php" enctype="multipart/form-data">

                <div class="row text-center"><i class="fa fa-heart fa-spin"></i><h2>Welcome</h2><p id="showname"></p></div>
                 <div class="row" style="margin-top:10px;">
                     <div class="form-group">
                        <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-4">
                            <label for="cpwd">Email</label>
                            <input type="email" class="form-control " name="email" id="showemail" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                     <div class="form-group" style="margin-top:10px;">
                        <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-4">
                            <label for="cpwd">Please Select Profile Image</label>
                            <input type="file" class="form-control btn btn-warning fa fa-file-image-o select" id="file" name="Photo" accept="image/*">
                            <p id="siignup-response" style="display:none;"></p>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top:10px;">
                     <div class="form-group">
                        <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-4">
                            <label for="cpwd">Address</label>
                            <input type="text" class="form-control btn btn-success" name="address" id="address" placeholder="Enter Address">
                        </div>
                    </div>
                </div>
                 <div class="row" style="margin-top:30px;">
                    <div class="col-lg-3 col-lg-offset-4 col-sm-6 col-sm-offset-4 ">
                        <input type="submit" class="btn btn-warning btn-block" id="submit" name="continue" Value="continue"> 
                    </div>
                    <div class="col-lg-1  col-sm-3  ">
                        <span class="fa fa-spinner fa-spin fa-3x" id="signup-spin"></span> 
                    </div>

                </div>
            </form>
        </div>
    </section>







    <section id="contact" class="wow zoomin">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="primary">
                    <p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>123-456-6789</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:your-email@your-domain.com">feedback@onlinestore.com</a></p>
                </div>
                 
            </div>
            <hr class="bg-warning">
            <form class="form-horizontal" role="form">
            	<div class="row col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
            		<div class="col-lg-4 col-sm-5  col-md-4   text-center">
    					<div class="form-group">
    				  		<label for="name">Name:</label>
     				  		<input type="text" class="form-control" id="name" placeholder="Enter Name">
    					</div>
                    </div>
                    <div class="col-lg-4 col-lg-offset-1  col-sm-5 col-md-4 col-md-offset-1
                     col-sm-offset-1  text-center">
    					<div class="form-group">
    			  		 	<label for="email">Email:</label>
     					 	<input type="email" class="form-control" id="email"
                          	placeholder="Enter email">
   					 	</div>
                     </div>
                 </div>
                 <div class="row col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                     <div class="col-lg-9 col-sm-11  col-md-9  text-center">
                   		<div class="form-group">
    				  		<label for="text"> Comment</label>
                      		<textarea class="form-control" rows="6" placeholder="Enter Your Message Here">
                      		</textarea>
    				 	</div>
                     	<button type="submit" class="btn btn-danger btn-xl  wow tada ">Submit</button>
                      </div>
    			 </div>
  			</form>
                 
                
        
    </section>




 


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>


    
 
</body>

</html>
