<?php
        session_start();

        $storeid=$_GET['storeid'];


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

$q="select * from siteowner where siteOwner_id in (select siteOwner_id from store where storeid = $storeid)";
        $run=mysqli_query($conn,$q);
       

        while($r=mysqli_fetch_assoc($run))
        {
                $fname=$r['fname'];
                $lname=$r['lname'];
                $name=$fname.$lname;
                
        }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
     <!-- Favicon Icon -->
    <link rel="icon" href="assets/img/favicon.ico" />
    <title>Wonder Landing Page</title>
    <!-- BOOTSTRAP CORE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- ION ICONS STYLES -->
    <link href="assets/css/ionicons.css" rel="stylesheet" />
     <!-- FONT AWESOME ICONS STYLES -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
     <!-- IE10 viewport hack  -->
    <script src="assets/js/ie-10-view-port.js"></script>
    <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- HEADER SECTION START-->
   <header id="header">
        <div class="container" >
                <div class="row"  >
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 logo-wrapper">
                         <img src="assets/img/logo.png" alt="" />
                     </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right" >
                          <div class="menu-links scroll-me">
                              <a href="#header"> <i class="ion-ios-home-outline"></i>  </a>
                          <a href="#product" data-toggle="tooltip" data-placement="bottom" title="Products"> <i class="ion-ios-list-outline"></i> </a>
                          <a href="#clients"> <i class="ion-bag"></i></a>
                          <a href="#contact"> <i class="ion-ios-chatboxes-outline"></i> </a>
                          <a href="#cart" class="dropdown-toggle" data-toggle="tooltip" data-placement="bottom" title="View Cart"> <i class="ion-ios-cart showcart"><span class="notify">1</span></i></a>
                    
                         
                          </div>                    
                </div>
                      
                </div>
              
                
            </div>
   </header>
    <!-- HEADER SECTION END-->
     <!-- CART SECTION Start-->
<section id="cartitems" >
        <div class="container">
            
            <div class="row text-center">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="icon-wrapper">
                        <i class="ion-ios-cart">  Your Cart</i>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-lg-12">
                       <div class="table-responsive" id="editcat" >
                            <table class="table table-bordered table-striped" id="tblCart">
                                     <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Name</th>
                                            <th class="text-center">Price</th>
                                            <th>Quantity</th>
                                            <th class="text-center">Subtotal</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <form id="ucategory" role="form" method="POST" action="">
                                    <tbody>
                                        <?php

                                        $pid = isset($_SESSION['pid']) ? $_SESSION['pid'] : "''";

                                      
                                        $qy=mysqli_query($conn,"select * from products where product_id in(".$pid.")");
                                        if(mysqli_num_rows($qy) == 0)
                                        {
                                            echo' <tr>';
                                          echo'    <td colspan="6"> <h2 class="head-line"><i class="ion-sad"></i>  No item in your cart</h2>';
                                          echo'    </td>';
                                          echo'    </tr>';

                                        }
                                        else
                                        {
                                          while ($re=mysqli_fetch_assoc($qy)) {
                                          echo' <tr>';
                                          echo'    <td><img src="../../../img/Users/'.$name.'/'.$re['image'].'" class="img-circle" height="50px"></td>';
                                          echo'   <td class="padd">'.$re['name'].'</td>';
                                          echo'    <td class="text-center padd">'.$re['price'].'</td>';
                                          echo'    <td width="100px" class="padd"><input type="text" class="form-control" value="1" onblur="changeQuantity(this)"></td>';
                                          echo'   <td class="text-center padd" id="subtotal" >'.$re['price'].'</td>';
                                          echo'   <td class="padd"><i class="ion-close-round" data-toggle="tooltip" data-placement="top" title="Remove From Cart" onclick="removeProductFromCart(this,'.$re['product_id'].')" style="cursor: pointer;"></i></td>';
                                          echo' </tr>';
                                        }
                                        }
                                        ?>
                                    </tbody>
                                    </form>
                            </table>
                        </div>
                </div>
            </div>
                     

            <div class="row text-right cartdetails">
               
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div>
                        
                        <p><i class="head-line p">SubTotal:</i><span class="price stotal"></span></p>
                       <p> <i class="head-line p">Tax:</i><span class="price tax"></span></p>
                        <p><i class="head-line p">Total:</i><span class="price total"></span></p>
                          
                        
                        
                </div>
            </div>



            <div class="row text-center">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="icon-wrapper">
                        
                        <a href="#header" class="btn btn-custom btn-three pull-right"><i class="ion-android-checkbox"> </i>Checkout</a>

                        
                        <a href="#header" class="btn btn-custom btn-three continueshopping pull-left"><i class="ion-happy-outline "> </i>Continue Sopping</a>
                </div>
            </div>

        </div>
</section>


      <!-- CART SECTION END-->    





    <!--HOME SECTION START  -->
    <div id="home">
        <div class="overlay">
            <div class="container">
                <div class="row scroll-me" >
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <h1>Store</h1>
                    <h4>
                        Consectetur adipiscing elit felis dolor felis dolor vitae.
                        Eelit felis dolor vitae  adipiscing elit felis dolor felis dolor vitae.
                        Eelit felis dolor vitae

                    </h4>
                    <a href="#product" class="btn btn-custom btn-two" >Explore Products</a>
                    <a href="#email-subscribe" class="btn btn-custom btn-one" >Subscribe Right Now </a>
                </div>
                </div>
              
                
            </div>
        </div>

    </div>
    <!--HOME SECTION END  -->
     <!-- ABOUT SECTION START-->
    <section id="product">
        <div class="container-fluid">
            <div class="row text-center">
            <?php 

               $query=mysqli_query($conn,"SELECT * FROM Products p inner join storeproducts sp on p.product_id = sp.product_id where sp.store_id = $storeid");
               while ($row=mysqli_fetch_assoc($query)) {

                   $qb1=mysqli_query($conn,"select * from brand  where brand_id=".$row['brand_id']."");
                    $rows1=mysqli_fetch_assoc($qb1);
                    $brand1=$rows1['name'];

                $description = strlen($row['description']) > 35 ? substr($row['description'],0, 35)."..." : $row['description'];  
            
            echo"               <div class='col-lg-3 col-md-4 col-sm-4 col-xs-6 products'>";                  
            echo"                   <img src='../../../img/Users/".$name."/".$row['image']."' class='img-thumbnail productimg' height='150px' width='200px'>";
            echo"                   <h2 class='head-line pname'>".$row['name']."</h2>";
            echo"                   <P class='desc'>".$description."</P>";
            echo"                           <input type='hidden' class='fulldesc' value='".$row['description']."' >";
            echo"                          <p >     Price <b class='price'>Rs:".$row['price']."</b> </p>";
            echo"                       <div class='row'>";
            echo"                         <input type='hidden' class='brand' value=".$brand1.">";
            echo"                           <i class='ion-ios-cart btn btn-default addtocart pull-left' id=".$row['product_id']." >Add to cart</i>";
            echo"                            <i class='ion-ios-plus btn btn-default pull-right viewdetails' id=".$row['product_id']." >View Details</i>";
            echo"                       </div>";
            echo"               </div>";
                      
             }
            ?>
            </div>
        </div>
    </section>
    <!-- ABOUT SECTION END-->
     <!-- CLIENTS SECTION START-->
    <section id="clients">
        <div class="overlay">       
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  client-cover" >
                     <div id="carousel-example" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="testimonial-section">
                           Pellentesque posuere malesuada venenatis. 
                                Donec laoreet dapibus nulla,
                                 vitae feugiat metus aliquet sed. 
                        </div>
                        <div class="testimonial-section-name">
                            <img src="assets/img/client1.jpg" alt="" class="img-circle" />
                            -  Justine Goliyad
                        </div>
                            
                        </div>
                        <div class="item">
                           <div class="testimonial-section">
                             Pellentesque posuere malesuada venenatis. 
                                Donec laoreet dapibus nulla,
                                 vitae feugiat metus aliquet sed.
                        </div>
                        <div class="testimonial-section-name">
                            <img src="assets/img/client2.jpg" alt="" class="img-circle" />
                            -  Justine Goliyad
                        </div>
                            
                        </div>
                        <div class="item">
                          <div class="testimonial-section">
                             Pellentesque posuere malesuada venenatis. 
                                Donec laoreet dapibus nulla,
                                 vitae feugiat metus aliquet sed.
                        </div>
                        <div class="testimonial-section-name">
                            <img src="assets/img/client3.jpg" alt="" class="img-circle" />
                            -  Justine Goliyad
                        </div>
                            
                        </div>
                         <!--INDICATORS-->
                    <ol class="carousel-indicators carousel-indicators-set">
                        <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example" data-slide-to="1"></li>
                        <li data-target="#carousel-example" data-slide-to="2"></li>
                    </ol>

                    </div>
                   
                </div>
                </div>
            </div>
           
        </div>
             </div>
    </section>
     <!-- CLIENTS SECTION END-->
    <!-- FEATURES SECTION START-->
    <section id="features" >
        <div class="container">
            
            <div class="row ">
                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12  text-center">
                     <div class="icon-wrapper">

                     
                     <img id="dimg" src="assets/img/client3.jpg" class="imgbig" height="400px" with="400px">
                          </div>
                    <h4 ></h4>
                                      Consectetur adipiscing elit felis dolor .
                    

                        
            </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-2 col-md-offset-2 scroll-me ">
                  <i class="ion-heart btn btn-danger btn-block " data-toggle="tooltip" title="Like Me" data-target="top"></i>

                       <h1 class="head-line text-center" id="dname">Macbook</h1>
                       
                       <i class="ion ion-ios-list-outline head-line"> Description:</i>
                        <h4  id="ddesc">
                            Integer vehicula efficitur dictum. Integer pharetra venenatis enim non porta.
                             Integer vehicula efficitur dictum. Integer pharetra venenatis enim non porta.
                              Integer vehicula efficitur dictum. Integer pharetra venenatis enim non porta.

                        </h4>
                        <br>
                      <i class="ion-bag head-line"> Brand:</i> <span >
                        <h4 id="bbrand">Mobile</h4>
                        <br>
                         <i class="ion-ios-box-outline head-line"> Availability:</i> 
                        <h4>In Stock</h4>
                        <br>
                        <i class="ion-cash-outline head-line "> Price:</i>
                        <h4 id="pprice">Rs:</h4>
                        <br>
                        <i class="ion-plus head-line"> Quantity:</i> 
                        <input type="text" class="form-control" id="cartQuantity" value="1">
                        <input type="hidden" class="hiddenpid" value="">
                     <a href="#header" class="btn btn-custom btn-three add2cart" id="" ><i class="ion-ios-cart"></i>Add to Cart</a>
                </div>
                
                
        </div>
</div>

    </section>
    <!-- FEATURES SECTION END-->     
     <!-- SUBSCRIBE SECTION START-->
     <section id="email-subscribe">
         <div class="container">
          <div class="row text-center">

                  <h1 class="head-line"><i class="ion-log-in head-line"></i>   Login to Purchase Our Products </h1>
          </div>
<div class="row">
  <form action="subscribe.php" role="form" method="post" id="postcontent"> 
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">

        <div class="form-group">
              <label for="pwd" class="text-left" >Email:</label>
	    				<input type="email" name="email" class="form-control" placeholder="Enter Your E-mail Address..." required />
        </div>
    </div>

    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
       
        <div class="form-group text-left">
              <label for="pwd"  >Password:</label>
              
           <input type="password" name="password" class="form-control " placeholder="Enter Your Password" required />
           </div><br>
           <button type="submit" class="btn btn-subscribe btn-block"  ><i class="ion-log-in"></i>  Login </button>
          
    </div>
    </form>
</div>
         </div>
     </section>
     <!-- SUBSCRIBE SECTION END-->
     <!-- CONTACT SECTION START-->
    <section id="contact">
        <div class="overlay">       
        <div class="container">
            <div class="row text-center">
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  contact-cover" >
                     <h2>Physical Location</h2>
                     <h3>345, New Street ,</h3>
                     <h3>United States </h3>
                     <div class="space"> </div>
                      <div class="social">
                        <a href="#"><i class="fa fa-facebook "></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google-plus "></i></a>
                        
                        <a href="#"><i class="fa fa-linkedin "></i></a>
                    </div>
                </div>
               
               
            </div>
           
        </div>
             </div>
    </section>
     <!-- CONATCT SECTION END-->
    <!-- FOOTER SECTION START-->
    <footer>
        <div class="container">
<div class="row text-center">
    <div class="col-lg-12 col-md-12 col-sm-12">
                             &copy; 2015 YourDomain.com | by <a href="http://www.designbootstrap.com/" target="_blank"> DesignBootstrap </a> 
                         </div>

    </div>
            </div>
    </footer>
    <!-- FOOTER SECTION END-->

    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- SCROLLING SCRIPTS PLUGIN  -->
    <script src="assets/js/jquery.easing.min.js"></script>
    <!-- CUSTOM SCRIPTS   -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
