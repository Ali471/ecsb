<?php
        session_start();

                if($_SESSION['email']=='')
                header("location:Home.php");
    
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

        $query="select * from store where siteOwner_id=".$_SESSION['id'];
        $run=mysqli_query($conn,$query);



    
    
?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME ICONS STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM STYLES-->
    <link href="assets/css/style.css" rel="stylesheet" />
      <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " id="NAV" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a  class="navbar-brand" href="profile.php">Ecommerce Stores

                </a>
            </div>

            <div class="notifications-wrapper">
<ul class="nav">
               
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user-plus"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user-plus"></i> My Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </li>
                 <li>
                    <a href="#"><i class="fa fa-home"></i> Home</a>
                </li>
            </ul>
            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav  class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                           
                           <?php
                    $query1="select * from siteowner where siteOwner_id=".$_SESSION['id'];
                    $run1=mysqli_query($conn,$query1);

                    while($row=mysqli_fetch_assoc($run1))
                                { 


                            echo"<img src='img/Users/".$row['fname'].$row['lname']."/".$row['image']."' class='img-circle'  alt=''>";

                           
                      echo"  </div>";

                  echo"  </li>";
                     echo"<li>";
                      echo"  <a  href='#'><strong>".$row['fname']." ".$row['lname']. "</strong></a>";
                  echo"  </li>";
                       }
                            ?>

                    <li>
                        <a   href="profile.php"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                        <a  href="stores.php"><i class="fa fa-th-large "></i>Stores </a>
                        
                    </li>
                    
                    <li>
                        <a  href="products.php"><i class="fa fa-th-list "></i>Products</a>
                        
                    </li>
                   
                     
                     <li>
                        <a  href="category.php"><i class="fa fa-th-list"></i>Categories</a>
                    </li>
                   
                    <li>
                        <a href="#"><i class="fa fa-bar-chart "></i>Reports<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="#"><i class="fa fa-shopping-cart "></i>Sales</a>
                            </li>
                             <li>
                                <a href="#"><i class="fa fa-man"></i>Customers</a>
                            </li>
                            

                                    <li>
                                        <a href="#" ><i class="fa fa-shopping-cart "></i>Orders</a>
                                    </li>

                                

                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="active-menu" href="themes.php"><i class="fa fa-dashcube "></i>Templates</a>
                    </li>
                   
                </ul>
            </div>

        </nav>
        <!-- /. SIDEBAR MENU (navbar-side) -->
        <div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line ">Templates</h1>
                    </div>
                </div>
                
                    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-4 col-sm-6 wow fadeinleft">
                    <a href="#" class="portfolio-box">
                        <img src="img/t1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded btn">
                                    View Demo
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow zoomindown">
                    <a href="#" class="portfolio-box">
                        <img src="img/t2.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded btn">
                                    View Demo
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeinright">
                    <a href="#" class="portfolio-box">
                        <img src="img/t3.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded btn">
                                    View Demo
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeinleft">
                    <a href="#" class="portfolio-box">
                        <img src="img/t4.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded btn">
                                    View Demo
                                </div>
                                <div class="project-name">
                                    Responsive Dark Template
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow zoominup">
                    <a href="#" class="portfolio-box">
                        <img src="img/t5.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded btn">
                                   View Demo
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeinright">
                    <a href="#" class="portfolio-box">
                        <img src="img/t6.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded btn">
                                    View Demo
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                 <div class="col-lg-4 col-sm-6 wow fadeinright">
                    <a href="#" class="portfolio-box">
                        <img src="img/t3.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded btn">
                                   View Demo
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                 <div class="col-lg-4 col-sm-6 wow fadeinright">
                    <a href="#" class="portfolio-box">
                        <img src="img/t1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded btn">
                                    View Demo
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                 <div class="col-lg-4 col-sm-6 wow fadeinright">
                    <a href="#" class="portfolio-box">
                        <img src="img/t2.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded btn">
                                    View Demo
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>



          



            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <footer >
        &copy; 2015 YourCompany | By : <a href="http://www.designbootstrap.com/" target="_blank">DesignBootstrap</a>
    </footer>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script src="js/script.js"></script>


</body>
</html>
