<?php
session_start();
if($_SESSION['email']=='')
	header("location:Home.php");
	
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
$query="select * from store where siteOwner_id=".$_SESSION['id'];
$run=mysqli_query($conn,$query);



	
	
?>


<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <link rel="stylesheet" href="css/styles.css">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/animate.min.css" type="text/css">
   <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
   <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

   <title>Profile</title>
   
   
   <script type="text/javascript">
   
   
   
   
   
   </script>
   
   
   
   
   
</head>
<body class="wow fadein">
   <!--<div class="container-fluid navbar-fixed-top head" id="profile">
      <div class="row">
         <div class="col col-lg-3 col-sm-3 col-xs-4">
            <div class="rounded class="wow fadeInUp >
               <img src="images/share.jpg"  alt="">
               <h3>Muhammad Ali</h3>
            </div>
         </div>
         <div class="col col-lg-6 col-sm-6 col-xs-4">
            <div class="name">
             
            </div>
         </div>        
         <div class="col col-lg-3 col sm-3 col-xs-4">
            <div class="name">
               <a href="#" id="logout">Log Out</a>
            </div>
         </div>   
      </div>
</div>-->

 <!--<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
           <!-- <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" 
                data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>-->
               <!--  <a href="#page-top" class=" navbar-brand page-scroll "><img src="http://blog.flamingtext.com/blog/2015/04/22/flamingtext_com_1429711641_103716239.gif" ></a>-->
            <!--   <div class="rounded wow rotateIn" >
               <img src="images/share.jpg"  alt="">
               <h3>Muhammad Ali</h3>
            </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
          <!--  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="logout.php">Logout</a>
                    </li>
                     <li>
                        <a class="page-scroll" href="#about">Home</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
       <!-- </div>
        <!-- /.container-fluid -->
    <!--</nav>-->




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
				<div class="rounded wow rotateIn" >
               <img src="images/share.jpg"  alt="">
               
            </div>
               <a class="navbar-brand page-scroll" href="#page-top">Ecommerce Store</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll  fa fa-arrow-left" href="Home.php">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll " href="#portfolio">Themes</a>
                    </li>
                    <li>
                        <a class="page-scroll " href="logout.php">Logout</a>
                    </li>
                   

                     
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>






<div id="wrapper">
   <div id="left" class="wow fadeInLeft">
      <div id='cssmenu'>
         <ul>
            <li class='active'><a href='#' ><span>Home</span></a></li>
            <li class='has-sub'><a href='#'><span>Your Stores</span></a>
               <ul>
                  <li><a href='#'><span>View Store</span></a></li>
                  <li><a href='#'><span>Add New Store</span></a></li>
                  <li class='last'><a href='#'><span>Edit Store</span></a></li>
               </ul>
            </li>
            <li class='has-sub'><a href='#'><span>Template</span></a>
               <ul>
                  <li><a href='#'><span>Free</span></a></li>
                  <li class='last'><a href='#'><span>Premieum</span></a></li>
               </ul>
            </li>
            <li class='last'><a href='#'><span>Profile</span></a></li>
         </ul>
      </div>
   </div>
<div class="container">
   <div id="right">
   <section class="content">

    <!--<section id="heading">
  
        <div class="row">
          <div class="col col-lg-12">
            <h1 animate zoominup>Creat New Store,Choose Theme And Add Your Products</h1>
          </div>
      </div>
    </section>-->
    
    <section>
    
    
    <table class="table">
    <thead>
      <tr>
      <th></th>
        <th>Name</th>
        <th>Logo</th>
        <th>Footer</th>

      </tr>
    </thead>
    <tbody>
    <?php
	while($row=mysqli_fetch_assoc($run))
	{
      echo"<tr class='wow fadeInUp'>";
	  echo"<td><img src='images/icon_plus.png' class='viewprod'
	  		 id='viewprod' onClick='viewprod1(".$row['storeid'].")'/></td>";
        echo"<td>".$row['name']."</td>";
        echo"<td><img src='img/store/".$row['logo']."' class='logo'/></td>";
		echo"<td>".$row['fotter']."</td>";
        echo"<td><button type='button' class='btn' data-toggle='modal'
		     onClick='addproduct(".$row['storeid'].")'>Add Products</button></td>";
      echo"</tr>";
	  
	  
	  
	  
	}
      ?>
    </tbody>
  </table>
    
    <div class="row">
		<div class="col-lg-2 col-lg-offset-9">
        <input type="button" class="btn btn-warning" id="AddStore" value="Add Store">
        </div>    
    </div>
    
    
    </section>
    
   
   <!-- pop up model -->
   
   
   <div class="modal fade addproduct" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
      <form method="post" id="addprod" enctype="multipart/form-data" role="form">
        <div class="modal-header">
        
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="gridSystemModalLabel">Add Product</h4>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
           
          <div class="form-group">
    <label for="storename">Store Name:</label>
    <label for="storevalue" id="storevalue"></label>
    <img id="storelogo" class="logo1"/>
    
    
    
  </div> 
           
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control inn" id="pname" name="pname" placeholder="Enter product name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">image</label>
    <input type="file" class="form-control inn" id="pimage" id="pimage" name="pimage">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input type="text" class="form-control inn" id="price" name="price" placeholder="Enter product price">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea class="form-control " id="description" name="description"
     placeholder="Enter product description"></textarea>
  </div>
 
  <div class="form-group">
  <label for="Brand">Category</label>
  <select class="form-control inn" id="selectcategory" name="pcategory" onChange="selectprod()" >
  <option id=''>Select Category</option>
 <?php
 
 	$runn=mysqli_query($conn,"SELECT * FROM productcategory");
	while($roww=mysqli_fetch_assoc($runn))
	{
 echo" <option id=".$roww['category_id'].">".$roww['name']."</option>";
	
	}
 ?>
</select>
  </div>
   <div class="form-group">
  <label for="Brand">Brand<small id="alertmessage" >(Select Category to see brands)</small></label>
  <select class="form-control in" id="brands" name="brands" disabled>
 </select>
  </div>
 
 <input type="hidden" id="storeid" name="storeid"/>
 <input type="hidden" id="mode" name="mode"/>
 

           
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
   
   
   
   
   
    

<section id="newstore" style="display:none">
    <div class="container-fluid">
      <form method="post" id="store" role="form" enctype="multipart/form-data">
      <div class="row">
        <div class="col col-lg-1">
          <h3>Name</h4>
        </div>
       <div class="col col-lg-8 col-lg-offset-1">
        <input type="text" name="name" id="name" class="form-control">
       </div>
       </div>
      <div class="row">
        <div class="col col-lg-1">
          <h3>Logo</h4>
        </div>
       <div class="col col-lg-8 col-lg-offset-1">
        <input type="file" name="logo" id="logo" class="form-control inn">
       </div>
       
      </div>
      <div class="row">
        <div class="col col-lg-1">
          <h3>Footer</h4>
        </div>
       <div class="col col-lg-8 col-lg-offset-1">
        <textarea type="text" name="footer" id="footer" class="form-control" rows="3"></textarea>
       </div>
       
      </div>
      <div class="row" style="margin-top:10px">
      <div class="col col-lg-3 col-lg-offset-4">
      <input type="submit" class="btn" id="submit" name="submit" Value="Save"/>
      </div>
    
    </div>
    </form>
    </div>
    </section>




      <section id="themes"> 
        
            <div class="row no-gutter">
                <div class="col-lg-4 col-sm-6 wow fadeInLeft">
                    <a href="#" class="portfolio-box">
                        <img src="img/t1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow zoomInDown">
                    <a href="#" class="portfolio-box">
                        <img src="img/t2.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInRight">
                    <a href="#" class="portfolio-box">
                        <img src="img/t3.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInLeft">
                    <a href="#" class="portfolio-box">
                        <img src="img/t4.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow zoomInup">
                    <a href="#" class="portfolio-box">
                        <img src="img/t5.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInRight">
                    <a href="#" class="portfolio-box">
                        <img src="img/t6.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
        </div>
    </section>
    

   </section>
 </div>
   <div class="clear"></div>
   
</div>
</div>





  <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>
    <!-- custom js -->
   <script src="js/script.js"></script>
   <script>
 new WOW().init();
</script>

</body>
<html>
