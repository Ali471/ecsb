<?php
        session_start();
        $name='';

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

        $query="select * from siteowner where siteOwner_id=".$_SESSION['id']."";
        $run=mysqli_query($conn,$query);
       

        while($row=mysqli_fetch_assoc($run))
        {
                $fname=$row['fname'];
                $lname=$row['lname'];
                $name=$fname.$lname;
                
        }



    
    
?>








 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
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
                <a  class="navbar-brand" href="profile.php">Ecommerce Store 

                </a>
            </div>

            <div class="notifications-wrapper">
<ul class="nav">
              
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user"></i> My Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </li>
                 <li>
                    <a href="Home.php"><i class="fa fa-home"></i> Home</a>
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
                                $query1 =   "select * from siteowner where siteOwner_id=".$_SESSION['id'];
                                $run1   =    mysqli_query($conn,$query1);

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
                        <a class="active-menu"  href="stores.php"><i class="fa fa-th-large "></i>Stores </a>
                        
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
                        <a href="themes.php"><i class="fa fa-dashcube "></i>Templates</a>
                    </li>
                   
                </ul>
            </div>

        </nav>
        <!-- /. SIDEBAR MENU (navbar-side) -->
        <div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
                <div class="row page-head-line">
                    <div class="col-md-8">
                        <h1 >Your Stores</h1>
                    </div>
                     <div class="col-md-4 text-right ">
                        <i class="btn btn-primary fa fa-plus" id="newstore" title="add New"></i>
                        <i class="btn btn-danger fa fa-trash-o"></i>
                        
                    </div>
                </div>
                
                <div class="row" id="store" style="display:none">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                ENTER NEW STORE INFO
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post" id="newstoreform" action="Newstore.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="Store Name">Store Name</label>
                                        <input type="text" class="form-control sn" id="name" name="sname" placeholder="Enter Name" />
                                        <p class="error"></p>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Store Image/logo</label>
                                        <input type="file" class="form-control si" id="image" name="image" placeholder="Select An Image" accept="image/*"/>
                                        <p class="error"></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="Store Name">Select a Template</label>
                                        <select class="form-control" name="template">
                                            <?php
                                           $q=mysqli_query($conn,"select * from template");
                                           while ($r=mysqli_fetch_assoc($q)) 
                                           {
                                              echo"<option>".$r['name']."</option>";
                                           }
                                            
                                            ?>
                                        </select>
                                        <p class="error"></p>
                                    </div>
                                 
                                    <i class="btn btn-success fa fa-plus" id="showprod">Add Products</i>
               
                <div class="row" id="prod" style="display:none">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-th-list" style="padding:10px;"></i>
                            Your Products
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="btn-success">
                                        <tr>
                                            <th></th>
                                            <th>Product Name</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th class="text-right">Price</th>
                                            <th>Description</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody class="btn-warning">
                                        <?php
                                        $q=mysqli_query($conn,"select * from products where siteOwner_id=".$_SESSION['id']."");
                                        while($r=mysqli_fetch_assoc($q))
                                        {
                                        echo "<tr>";
                                        echo "<td class='text-center'><input type='checkbox' name='pchk[]' value=".$r['product_id']." id=".$r['product_id']."></td>";
                                        echo "<td>".$r['name']."</td>";

                                        echo "<td class='text-center'><img src='img/Users/".$name."/".$r['image']."' class='img-circle' height='50px' width='50px' /></td>";

                                        $q1=mysqli_query($conn,"select name from productcategory where category_id=".$r['category_id']."");
                                        while($r1=mysqli_fetch_assoc($q1))
                                        {
                                        echo "<td>".$r1['name']."</td>";
                                        }

                                         $q2=mysqli_query($conn,"select name from brand where brand_id=".$r['brand_id']."");
                                        while($r2=mysqli_fetch_assoc($q2))
                                        {
                                        echo "<td>".$r2['name']."</td>";
                                        }
                                        
                                        echo "<td class='text-right'>".$r['price']."</td>";
                                        echo "<td>".$r['description']."</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>
                </div>

                                    <div class="form-group">
                                        <label for="Store menu">Store Menu<small>(Should b Comma Seperated)</small></label>
                                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Enter Menu" />
                                        <p class="error"></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="Store Name">Footer Text</label>
                                        <textarea type="text" class="form-control" id="footerinfo" name="finfo" placeholder="Enter Your Custom Text Here" ></textarea>
                                        <p class="error"></p>
                                    </div>
                                    <hr />
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button type="button" class="btn btn-warning" id="closestore">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                 <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            <i class="fa fa-th-list" style="padding:10px;"></i>
                            Your Stores
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead style="background-color:black;color:white">
                                        <tr>
                                            <th class="text-center"><input type="checkbox" id="chkall"> </th>
                                            <th>Store Name</th>
                                            <th>Image</th>
                                            <th>Menues</th>
                                            <th>Footer Text</th>
                                            <th class="text-center">View Products</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $q=mysqli_query($conn,"select * from store where siteOwner_id=".$_SESSION['id']."");
                                        while($r=mysqli_fetch_assoc($q))
                                        {
                                        echo "<tr>";
                                        echo "<td class='text-center'><input type='checkbox' class='pchk' value=".$r['storeid']." id=".$r['storeid']."></td>";
                                        echo "<td>".$r['name']."</td>";

                                        echo "<td><img src='img/Users/".$name."/".$r['logo']."' class='img-circle' height='50px' width='50px' /></td>";

                                     
                                        echo "<td>".$r['menu']."</td>";
                                        echo "<td>".$r['fotter']."</td>";
                                        
                                        
                                        echo "<td class='text-center'><a href='Templates/Free/wonder-landing/store.php?storeid=".$r['storeid']."'><i style='margin-left:5px' class='btn btn-success '>View Store</i></a></td>"; 
                                      
                                        echo"</tr>";

                                    }

                                    ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                           


                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>
                </div>


                


                <div class="row">
                    <div class="col-md-12 ">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Default Panel
                            </div>
                            <div class="panel-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                            </div>
                            <div class="panel-footer">
                                Panel Footer
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Info Panel
                            </div>
                            <div class="panel-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                            </div>
                            <div class="panel-footer">
                                Panel Footer
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                Warning Panel
                            </div>
                            <div class="panel-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                            </div>
                            <div class="panel-footer">
                                Panel Footer
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                Danger Panel
                            </div>
                            <div class="panel-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                            </div>
                            <div class="panel-footer">
                                Panel Footer
                            </div>
                        </div>
                    </div>
                </div>
              
               
                




               
                
                     
                   
               

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
