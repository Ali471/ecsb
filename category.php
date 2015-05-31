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
<html >
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
                        <a class="active-menu" href="category.php"><i class="fa fa-th-list"></i>Categories</a>
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
                        <h1>Product Categories </h1>
                    </div>
                     <div class="col-md-4 text-right">
                        <i class="btn btn-primary fa fa-plus" id="addcat" data-toggle="tooltip" data-placement="top" title="Add New Category" ></i>
                        <i class="btn btn-danger fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="Delete Category" id="delcat"></i>
                        
                    </div>
                </div>
                 <div class="row" id="newcat" style="display:none;">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Creat New Category
                        </div>
                         <form id="newcategory" role="form" method="POST" action="addcategory.php?id=1">
                        <div class="panel-body">
                      
                            <div class="form-group">
                                <label for="Store Name">Category Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" />
                            </div>
                            <div class="form-group">
                                <label for="Store Name">Description</label>
                                <textarea type="text" class="form-control" name="description" placeholder="Enter Description" /></textarea>
                            </div>

  
                           <hr />
                           <button type="submit" id="submit" name="submit" class="btn btn-success">Submit</button>
                           <button type="button" class="btn btn-default" id="closecat">Close</button>
                        
                        </div>
                        </form>
                        </div>
                    </div>
                
                </div>

                



                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                                    <thead style="background-color:black;color:white">
                                        <tr>
                                            <th class="text-center"> <input type="checkbox" id="chkall"></th>
                                            
                                            <th>Category Name</th>
                                            <th>Description</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                             $q=mysqli_query($conn,"select * from productcategory where siteOwner_id=".$_SESSION['id']."");
                                             while($r=mysqli_fetch_assoc($q))
                                            {

                                        echo" <tr>";
                                           echo" <td class='text-center chk'><input type='checkbox' class='chk' value=".$r['category_id']." id=".$r['category_id']."></td>";
                                            
                                          echo"  <td>".$r['name']."</td> ";
                                         echo"   <td>".$r['description']."</td>";
                                          echo"  <td class='text-right'><i class='btn btn-primary fa fa-pencil editcat' id=".$r['category_id']."></i></td> ";
                                        echo"</tr>";
                                        
                                    }
                                    ?>
                                       
                                    </tbody>
                                </table>

                                <!-- Update Section -->

                            <div class="table-responsive" id="editcat" style="display:none">
                                <table class="table table-bordered table-striped" >

                                    <thead style="background-color:orange;color:white">
                                        <tr>
                                            
                                            
                                            <th>Category Name</th>
                                            <th>Description</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                      <form id="ucategory" role="form" method="POST" action="">
                                    <tbody>
                                        <td><input type="text" name="epname" id="epname" class="form-control" value=""></td>
                                        <td><textarea rows="1" type="text" name="epdes" id="epdes" class="form-control" value=""></textarea>
                                            <input type="hidden" id="epid" name="epid">
                                        <td class="text-center" ><i class="fa fa-check btn btn-success" id="updatecat" style="margin:10px"></i><i class="fa fa-close btn btn-danger" id="eclose"></i></td>
                                    </tbody>
                                </form>
                                </table>
                            </div>
                </div>
                <hr>

                 <div class="row page-head-line">
                    <div class="col-md-8">
                        <h1>Product Brands </h1>
                    </div>
                     <div class="col-md-4 text-right">
                        <i class="btn btn-primary fa fa-plus" id="addbrand" data-toggle="tooltip" data-placement="top" title="Add New Brand" ></i>
                        <i class="btn btn-danger fa fa-trash-o" data-toggle="tooltip" data-placement="top" id="delbrand" title="Delete Brand"></i>
                        
                    </div>
                </div>
                 <div class="row newbrand" style="display:none;">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Creat New Brand
                        </div>
                        <div class="panel-body">
                       <form id="newbrand" role="form" method="POST" action="addcategory.php?id=2">
                            <div class="form-group">
                                <label for=" Name">Brand Name</label>
                                <input type="text" class="form-control" id="pname" name="name" placeholder="Enter Name" />
                            </div>
                             <div class="form-group">
                                            <label for="Brand">Category</label>
                                            <select class="form-control inn" id="selectcategory" name="pcategory" onChange="selectprod()" >
                                                <option id=''>Select Category</option>
                                                    <?php
 
                                                        $runn=mysqli_query($conn,"SELECT * FROM productcategory where siteOwner_id=".$_SESSION['id']."");
                                                        while($roww=mysqli_fetch_assoc($runn))
                                                        {
                                                        echo" <option id=".$roww['category_id'].">".$roww['name']."</option>";
                                                        }
                                                        ?>
                                            </select>
                            </div>
                            <div class="form-group">
                                <label for=" Name">Description</label>
                                <input type="text" class="form-control" id="pdescription" name="description" placeholder="Enter Description" />
                            </div>
  
                           <hr />
                           <button type="submit" id="submit" name="submit" class="btn btn-success">Submit</button>
                           <button type="button" class="btn btn-default" id="closebrand">Close</button>
                        </form>
                        </div>
                        </div>
                    </div>
                
                </div>


               
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                                    <thead style="background-color:black;color:white">
                                        <tr>
                                            <th class="text-center"><input type="checkbox" id="chkall"></th>
                                            
                                            <th>Brand Names</th>
                                            <th >Description</th>
                                            <th class="text-right">Category</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php
                                             $q=mysqli_query($conn,"select * from brand where siteOwner_id=".$_SESSION['id']."");
                                             while($r=mysqli_fetch_assoc($q))
                                            {

                                        echo" <tr>";
                                           echo" <td class='text-center'><input type='checkbox' class='bchk' id=".$r['brand_id']."></td>";
                                            
                                          echo"  <td>".$r['name']."</td> ";
                                         echo"   <td >".$r['description']."</td>";

                                          $q2=mysqli_query($conn,"select name from productcategory where category_id=".$r['categoryid']."");
                                            while($r1=mysqli_fetch_assoc($q2))
                                            {
                                          echo"   <td class='text-right'>".$r1['name']."</td>";
                                            }
                                          echo"  <td class='text-right'><i class='btn btn-primary fa fa-pencil ebrand' id=".$r['brand_id']."></i></td> ";
                                        echo"</tr>";
                                    }
                                    ?>
                                        
                                    </tbody>
                                </table>
                </div>

                <div class="table-responsive" id="editbrand" style="display:none" >
                                <table class="table table-bordered table-striped" >
                                    <thead style="background-color:orange;color:white">
                                        <tr>
                                           <th>Brand Names</th>
                                             <th >Category</th>
                                            <th>Description</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form id="ubrand" role="form" method="POST" action="">
                                        <td><input type="text" name="ebname" id="ebname" class="form-control" value=""></td>
                                        <td><select class="form-control inn pcat" name="upcat" id="upcat" >
                                                <option id=''>Select Category</option>
                                                    <?php
 
                                                        $runn=mysqli_query($conn,"SELECT * FROM productcategory where siteOwner_id=".$_SESSION['id']."");
                                                        while($roww=mysqli_fetch_assoc($runn))
                                                        {
                                                        echo" <option id=".$roww['category_id']." value=".$roww['name'].">".$roww['name']."</option>";
                                                        }
                                                        ?>
                                            </select>
                                        </td>
                                        <td><textarea rows="1" type="text" name="ebdes" id="ebdes" class="form-control" value=""></textarea>
                                            <input type="hidden" name="bid" id="hidden">
                                        </form>
                                        <td class="text-center" ><i class="fa fa-check btn btn-success" id="updatebrand" style="margin:10px"></i><i class="fa fa-close btn btn-danger" id="bclose"></i></td>
                                    </tbody>
                                </table>
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
    <script src="js/jquery.easing.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script src="js/script.js"></script>
    


</body>
</html>
