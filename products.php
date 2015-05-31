<?php
            session_start();

                if($_SESSION['email']=='')
                header("location:Home.php");
    
                $servername = "localhost";
                $username = "root";
                $password = "";
                $name="";
           

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
                        <li><a href="#"><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </li>
                 <li><a href="Home.php"><i class="fa fa-home"></i> Home</a>
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
                        <a  href="#"> <strong> Romelia Alexendra </strong></a>
                    </li>

                    <li>
                        <a   href="profile.php"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                        <a  href="stores.php"><i class="fa fa-th-large "></i>Stores </a>
                        
                    </li>
                    
                    <li>
                        <a class="active-menu" href="products.php"><i class="fa fa-th-list "></i>Products</a>
                        
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
                        <h1 >Products</h1>
                    </div>
                    <div class="col-md-4 text-right">
                        <i class="btn btn-primary fa fa-plus" data-target="#myModal" data-toggle="modal" title="add New"></i>
                        <i class="btn btn-danger fa fa-trash-o" id="delprod" ></i>
                        
                    </div>
                    <a class="alert-success" ></a>
                </div>
                <div class="row">
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
                                    <thead style="background-color:black;color:white">
                                        <tr>
                                            <th class="text-center" ><input type="checkbox" id="chkall"></th>
                                            <th>Product Name</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th class="text-right">Price</th>
                                            <th>Description</th>
                                            <th class="text-center ">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        <?php
                                        $q=mysqli_query($conn,"select * from products where siteOwner_id=".$_SESSION['id']."");
                                        while($r=mysqli_fetch_assoc($q))
                                        {
                                        echo "<tr>";
                                        echo "<td class='text-center'><input type='checkbox'  class='pchk' value=".$r['product_id']." id=".$r['product_id']."></td>";
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
                                        echo "<td class='text-center'><i class='btn btn-primary fa fa-pencil eproduct' id=".$r['product_id']."></i></td>"; 
                                        echo "</tr>";
                                    }
                                    ?>
                                       
                                    </tbody>
                                </table>
                            </div>

                            <div class="table-responsive" id="editproduct" style="display:none">
                                <table class="table table-bordered table-striped">
                                    <thead style="background-color:orange;color:white">
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Brand</th>
                                    </thead>
                                    <tbody>
                                        <form>
                                            <tr>
                                                <td><input type="text" class="form-control" id="epn"></td>
                                                <td><select class="form-control" id="epc"></select><option></option></td>
                                                <td><input type="text" class="form-control" id="epp"></td>
                                                <td><input type="text" class="form-control" id="epb"></td>
                                           </tr>
                                           <tr>
                                                <td colspan="2"><b>Image</b><hr><img style="height:50px;width:90px;margin:10px" src="img/t1.jpg"><input type="file" class="form-control"></td>
                                                <td colspan="2"><b>Description<b><hr><textarea class="form-control" rows="4"></textarea></td>
                                           </tr>
                                           <td colspan="4" class="text-center" ><i class="fa fa-check btn btn-success" id="updateproduct" style="margin:10px"></i><i class="fa fa-close btn btn-danger" id="pclose"></i></td>
                                           <tr>

                                           </tr>
                                        </form>
                                    </tbody>
                                </table>
                            </div>
                           

                </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>
                </div>


                
                


                <div class="modal fade addproduct" id="myModal" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" id="addprod" action="addproduct.php" enctype="multipart/form-data" role="form">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="gridSystemModalLabel">Add Product</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        
           
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control inn" id="pname" name="pname" placeholder="Enter product name">
                                        </div>

                                        <div class="form-group">
                                             <label for="exampleInputPassword1">image</label>
                                             <input type="file" class="form-control inn" id="pimage" id="pimage" name="pimage" accept="image/*">
                                        </div>

                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="text" class="form-control inn" id="price" name="price" placeholder="Enter product price">
                                        </div>
                                        <div class="form-group">
                                            <label for="quantity">Quantity</label>
                                            <input type="text" class="form-control inn" id="quantity" name="quantity" placeholder="Enter product quantity">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Description</label>
                                            <textarea class="form-control " id="description" name="description"
                                            placeholder="Enter product description"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="Brand">Category</label>
                                            <select class="form-control inn" id="selectcategory" name="pcategory" onChange="selectprod()" >
                                                <option id=''></option>
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
                                            <label for="Brand">Brand<small id="alertmessage" >(Select Category to see brands)</small></label>
                                            <select class="form-control in" id="brands" name="brands" disabled>
                                            </select>
                                        </div>
                                        <?php
                                      echo"<input type='hidden' id='storeid' name='email' value=".$_SESSION['email']." />";
                                        ?>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" >Add</button>
                                </div>
                            </form>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>





            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <footer >
        &copy; 2015 YourCompany | By : <a href="Home.php" target="_blank">Ecommerce Store Builder</a>
    </footer>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script src="js/script.js"></script>


</body>
</html>
