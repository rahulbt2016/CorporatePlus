<?php

    session_start();
            
    date_default_timezone_set('Asia/Kolkata');        
   if(!$_SESSION['email']){
        header("Location: login.php");
    }

    $con=mysqli_connect('localhost','root','','corporateplus');
    
    
    $query = "select access.form_id, form.form_file from access,form where access.form_id=form.form_id and access.designation_name='".$_SESSION['designation']."'";
    $result = mysqli_query($con,$query);
    $flag = 0;
    while($row=mysqli_fetch_array($result)){
        if($row['form_file']=='sales.php')
            $flag=1;
    }
    
    if($flag==0){
        header("Location: dashboard.php");
    }
    
    
    
    if(!isset($_SESSION['saleDescriptionSaleId']))
        header("Location: dashboard.php");
    
    
    $saleId = (int)$_SESSION['saleDescriptionSaleId'];
    
    $result = mysqli_query($con,"SELECT * FROM sale WHERE sale_id=".$saleId);
    while($row=mysqli_fetch_array($result)){
        
        $invoiceNumber = $row['invoice_number'];
        $date = $row['sale_date'];
        $customerName = $row['customer_name'];
        $email = $row['customer_email'];
        $phone= $row['customer_number'];
        $address = $row['delivery_address'];
        $city = $row['delivery_city'];
        $pinCode = $row['delivery_pin_code'];
        $state = $row['delivery_state'];
        $discountPercent = $row['percentage_discount'];
        $sellerId = $row['seller_id'];
        
        break;
    }
    
    $result = mysqli_query($con,"SELECT * FROM user WHERE user_id=".$sellerId);
    while($row=mysqli_fetch_array($result)){
        
        $sellerName = $row['user_name'];
        $sellerRegNum = $row['user_reg_num'];
        
        break;
    }

?>




<!DOCTYPE html>
<html>
<head>
    
    <style>
/* width */
::-webkit-scrollbar {
  width: 7px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
</style>
    
  <style>
        
       
/*To hide up down button in input type number*/
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;    
    }
    
 /*To hide printing header-footer*/
    
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
        
  </style>  
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="../dashboard_assets/dist/img/logo2NewNoBG.png" alt="logo">
  

  
   <script src="../jquery_main/jquery.min.js"></script>
  <script src="../control/control.js"></script>
  <title>Corporate Plus</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../dashboard_assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  
  <!-- Dual List --> 
  <link rel="stylesheet" href="../dashboard_assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  
  <!-- Select2 -->
  <link rel="stylesheet" href="../dashboard_assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../dashboard_assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  
  
  
  <!-- Theme style -->
  <link rel="stylesheet" href="../dashboard_assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../dashboard_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../dashboard_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../dashboard_assets/plugins/jqvmap/jqvmap.min.css">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../dashboard_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../dashboard_assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../dashboard_assets/plugins/summernote/summernote-bs4.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="../dashboard_assets/dist/css/adminlte.min.css">
  
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
          <a href="dashboard.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="profile.php" class="nav-link">Profile</a>
      </li>
    </ul>

    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" id="logout" href="#">
          <i class="fas fa-sign-out-alt"><svg hidden aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-out-alt" class="svg-inline--fa fa-sign-out-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"></path></svg></i>
          
          
        </a>
         
          
      </li>
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <?php
            
            $result = mysqli_query($con,"SELECT * from user where email='".$_SESSION['email']."'");
            while($row=mysqli_fetch_array($result)){
                $userId = $row['user_id'];
                
                break;
            }
            
            $notificationCount = 0;
            
            
            $result = mysqli_query($con,"SELECT * FROM notification WHERE notification_for=".(int)$userId." AND notification_read=0");
            while($row=mysqli_fetch_array($result)){
                $notificationCount = (int)$notificationCount+1;
            }
            
            echo "<span id='notification-number'>";
            if($notificationCount!=0){
                echo "<span class='badge badge-warning navbar-badge'>".$notificationCount."</span>";
            }
            echo "</span>";
          ?>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id='notification-content'>
          
            <!-- Message Start -->
            <?php
    
                function time_elapsed_string($datetime, $full = false) {


                    $date = date_default_timezone_set('Asia/Kolkata');

                    $now = new DateTime;
                    $ago = new DateTime($datetime);
                    $diff = $now->diff($ago);

                    $diff->w = floor($diff->d / 7);
                    $diff->d -= $diff->w * 7;

                    $string = array(
                        'y' => 'year',
                        'm' => 'month',
                        'w' => 'week',
                        'd' => 'day',
                        'h' => 'hour',
                        'i' => 'minute',
                        's' => 'second',
                    );
                    foreach ($string as $k => &$v) {
                        if ($diff->$k) {
                            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                        } else {
                            unset($string[$k]);
                        }
                    }

                    if (!$full) $string = array_slice($string, 0, 1);
                    return $string ? implode(', ', $string) . ' ago' : 'just now';
                }
                
            ?>
            <?php
                $result = mysqli_query($con,"SELECT * FROM notification WHERE notification_for=".(int)$userId." AND notification_read=0 ORDER BY notification_time DESC");
                while($row=mysqli_fetch_array($result)){
                    
                    if($row['notification_from']==0){
                        
                        $notiUserName = "Corporate Plus";
                        $notiUserImg = "logo2New.jpg";
                    }
                    else{
                        
                        $result2 = mysqli_query($con,"SELECT * from user where user_id=".$row['notification_from']);
                        while($row2=mysqli_fetch_array($result2)){
                            $notiUserName = $row2['user_name'];
                            $notiUserImg = $row2['user_photo'];

                            break;
                        }
                        
                    }
                    
                    echo "<a href='#' class='dropdown-item solo-notification-content'>";
                    echo "<input type ='text' hidden value='".$row['notification_id']."'>";
                    echo "<p hidden>".$row['link_page']."</p>";
                    echo "";
                    echo "<div class='media'>";
                        echo "<img src='../dashboard_assets/dist/img/".$notiUserImg."' alt='User Avatar' class='img-size-50 mr-3 img-circle'>
                              <div class='media-body'>
                                <h3 class='dropdown-item-title'>
                                  ".$notiUserName."
                                  
                                </h3>
                                <p class='text-sm' style='color:".$row['message_color']."'>".$row['notification_message']."</p>
                                <p class='text-sm text-muted'><i class='far fa-clock mr-1'></i> ".time_elapsed_string($row['notification_time'])."</p>
                                </div>";
                    echo "</div>";
                    echo "</a>";
                    echo "<div class='dropdown-divider'></div>";
                    
                   //to change priority color  //<span class='float-right text-sm text-danger'><i class='fas fa-star'></i></span>
                    
                    
                    
                }
                echo "<a href='notifications.php' class='dropdown-item dropdown-footer' id='show-all-notification'>See All Notifications</a>";
            
            ?>

        </div>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="../dashboard_assets/dist/img/demo_icon.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>Corporate Plus</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!--<img src="../dashboard_assets/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">-->
         <?php
            $con=mysqli_connect('localhost','root','','corporateplus');
            $query = "SELECT user_photo,user_name FROM user WHERE email='".$_SESSION['email']."'";
            $result = mysqli_query($con,$query);
            while($row=mysqli_fetch_array($result)){
                $image_name = $row['user_photo'];
                $name = $row['user_name'];
            }
            
            echo "<img style='height:40px; width:40px' src='../dashboard_assets/dist/img/".$image_name."' class='img-circle elevation-2' alt='User Image'>";
 
          ?>
        </div>
        <div class="info">
          <!--<a href="#" class="d-block">Admin</a>-->
          <?php
            echo "<a href='profile.php' class='d-block'>".$name."</a>";
          ?>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
              <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!--
              <li class="nav-item">
                <a href="../forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Elements</p>
                </a>
              </li>
            -->

            <?php
                
                $query = "select access.form_id,form.form_name,form.form_file from access,form where show_in_nav=1 and access.form_id=form.form_id and access.designation_name='".$_SESSION['designation']."'";
                $result = mysqli_query($con,$query);
                while($row=mysqli_fetch_array($result)){
                    
                    if($row['form_file'] == basename($_SERVER['PHP_SELF'])){        //basename to get the current file name
                        echo "<li class='nav-item'>
                                <a href='".$row['form_file']."' class='nav-link active'>
                                    <i class='far fa-circle nav-icon'></i>
                                    <p>".$row['form_name']."</p>
                                </a>
                            </li>";
                    }
                    else{
                        echo "<li class='nav-item'>
                                <a href='".$row['form_file']."' class='nav-link '>
                                    <i class='far fa-circle nav-icon'></i>
                                    <p>".$row['form_name']."</p>
                                </a>
                            </li>";
                    }
                }
                
              ?>

             
            </ul>
          </li>
          
          <li class="nav-item">
              <a href="../CPWebsite/" class="nav-link">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                Website
              </p>
            </a>
          </li>
		  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sale Description</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item">
                    <?php
                        if($_SESSION['saleDescriptionFlag']==1){
                            echo "<a href='manufacturedProducts.php'>Manufactured Products</a>";
                        }
                        else{
                            echo "<a href='sales.php'>Sales</a>";
                        }
                    ?>
                    
                </li>
                <li class="breadcrumb-item active">Sale Description</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        
                        <div class="card-header" style="background-color: #007BFF">
                            <h3 class="card-title" style="color:white">Customer Details</h3>
                        </div>
                        
                        <div class="card-body table-responsive p-0" style="height:auto;">
                            <table class="table table-head-fixed table-hover text-nowrap">
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <th>:</th>
                                        <td><?php echo $customerName ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Email</th>
                                        <th>:</th>
                                        <td><?php echo $email ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Contact Number</th>
                                        <th>:</th>
                                        <td><?php echo $phone ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Delivery Address</th>
                                        <th>:</th>
                                        <td>
                                            <div class="row">
                                                <div class="col-12"><?php echo $address ?></div>
                                                <div class="col-12"><?php echo $city." - ".$pinCode ?></div>
                                                <div class="col-12"><?php echo $state ?></div>
                                            </div>    
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>    
                        </div>
                        
                    </div>    
                </div>    
                
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="background-color: #007BFF">
                            <h3 class="card-title" style="color:white">Sale Summary</h3>
                        </div>

                        <div class="card-body table-responsive p-0" style="height:auto;">
                            
                            <table class="table table-head-fixed table-hover text-nowrap">
                                <tbody>
                                    <tr>
                                        <th>Invoice Number</th>
                                        <th>:</th>
                                        <td><?php echo $invoiceNumber ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Sale Date</th>
                                        <th>:</th>
                                        <td><?php echo date("d M, Y",strtotime($date)) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Seller</th>
                                        <th>:</th>
                                        <td><?php echo  $sellerName." - ".$sellerRegNum?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Bought Items</th>
                                        <th>:</th>
                                        <td>
                                            <table class="table table-head-fixed table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Qty</th>
                                                        <th>Product</th>
                                                        <th>Unit Cost</th>
                                                        <th>Batch Numbers</th>
                                                        <th>Sub-total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $result = mysqli_query($con,"SELECT products.product_name,
                                                                                    sale_products.product_id,
                                                                                    sale_products.sale_product_id,
                                                                                    sale_products.quantity,
                                                                                    sale_products.unit_cost
                                                                                    FROM sale_products,products 
                                                                                    WHERE
                                                                                    sale_id=".$saleId." AND
                                                                                    products.product_id = sale_products.product_id");
                                                        $totalCost = 0;
                                                        
                                                        while($row = mysqli_fetch_array($result)){
                                                            
                                                            echo "<tr>";
                                
                                                            echo "<td>".$row['quantity']."</td>";
                                                            echo "<td><a href='#' data-toggle='modal' data-target='#product-modal-".$row['product_id']."' class='product-description-link'>".$row['product_name']."</a></td>";
                                                            echo "<td>₹".$row['unit_cost']."</td>";
                                                            echo "<td><div class='row'>";

                                                            $result2 = mysqli_query($con,"SELECT products_manufactured.batch_number,
                                                                                            sale_product_batch_numbers.product_manufacture_id,
                                                                                            products_manufactured.manufacture_date,
                                                                                            products_manufactured.manufactured_by,
                                                                                            user.user_name,
                                                                                            user.user_reg_num
                                                                                            FROM products_manufactured,sale_product_batch_numbers,user
                                                                                            WHERE products_manufactured.product_manufacture_id=sale_product_batch_numbers.product_manufacture_id AND
                                                                                            user.user_id = products_manufactured.manufactured_by AND
                                                                                            sale_product_batch_numbers.sale_product_id=".$row['sale_product_id']."
                                                                                    ");
                                                            while($row2 = mysqli_fetch_array($result2)){
                                                                echo "<div class='col-12'><a href='#' data-toggle='modal' data-target='#manufacture-info-modal-".$row2['product_manufacture_id']."'>".$row2['batch_number']."</a></div>";
                                                                
                                                                
                                                                //Modals
                                                                
                                                                echo "<div class='modal fade' id='manufacture-info-modal-".$row2['product_manufacture_id']."'>
                                                                        <div class='modal-dialog'>
                                                                            <div class='modal-content bg-primary'>
                                                                                <div class='modal-header'>
                                                                                    <h4 class='modal-title'>Product Manufacturing Description</h4>
                                                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                                    <span aria-hidden='true'>&times;</span></button>
                                                                                </div>
                                                                                <div class='modal-body'>";

                                                                echo "<div class='row'>
                     
                                                                        <div class='col-4'>Manufacturing Date</div><div class='col-1'>:</div><div class='col-7'>".date("d M, Y",strtotime($row2['manufacture_date']))."</div>
                                                                        <div class='col-4'>Batch Number</div><div class='col-1'>:</div><div class='col-7'>".$row2['batch_number']."</div>
                                                                        <div class='col-4'>Manufacturer</div><div class='col-1'>:</div><div class='col-7'>".$row2['user_name']." - ".$row2['user_reg_num']."</div>  
                                                                        <div class='col-4'>Status</div><div class='col-1'>:</div><div class='col-7'><span class='badge badge-danger'>SOLD</span></div>  
                                                                            
                                                                    ";
                                                                        
                                                                echo "        
                                                                    </div>
                                                                ";


                                                                echo"           </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>";
                                                                
                                                                
                                                                //Modals
                                                                
                                                                
                                                                
                                                            }

                                                            echo  "</div></td>";
                                                            echo "<td>₹".$row['unit_cost']*$row['quantity']."</td>";

                                                           echo "</tr>";

                                                           $totalCost =$totalCost + ((int)$row['unit_cost']*(int)$row['quantity']);
                                                           
                                                           
                                                           
                                                           //Modals
                                                           
                                                           $query2="SELECT 
                                                                products.product_id,
                                                                products.product_code,
                                                                products.product_name,
                                                                product_category.category_name,
                                                                products.available_quantity,
                                                                products.unit_cost,
                                                                products.product_pic,
                                                                products.mini_description,
                                                                products.description_pdf,
                                                                user.user_reg_num,
                                                                products.active
                                                                FROM
                                                                products,product_category,user
                                                                WHERE
                                                                product_category.product_category_id=products.product_category_id AND
                                                                user.user_id=products.added_by AND
                                                                products.product_id='".$row['product_id']."'";
                                                           
                                                            $result2 = mysqli_query($con,$query2);
                                                            while($row2=mysqli_fetch_array($result2)){
                                                                
                                                                
                                                                
                                                                
                                                                echo "<div class='modal fade' id='product-modal-".$row2['product_id']."'>
                                                                        <div class='modal-dialog'>
                                                                            <div class='modal-content bg-primary'>
                                                                                <div class='modal-header'>
                                                                                    <h4 class='modal-title'>Product Description</h4>
                                                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                                    <span aria-hidden='true'>&times;</span></button>
                                                                                </div>
                                                                                <div class='modal-body'>";

                                                                echo "<div class='row'>
                                                                        <div class='col-12' style='margin-bottom:25px'><center><img style='height:200px; width:250px;background-color:white' src='../dashboard_assets/dist/product_pic/".$row2['product_pic']."' class=' elevation-2' alt='Product Image'></center></div>

                                                                        <div class='col-3'>Product Name</div><div class='col-1'>:</div><div class='col-8'>".$row2['product_name']."</div>
                                                                        <div class='col-3'>Category</div><div class='col-1'>:</div><div class='col-8'>".$row2['category_name']."</div>
                                                                        <div class='col-3'>Unit Cost</div><div class='col-1'>:</div><div class='col-8'>₹ ".$row2['unit_cost']."</div>




                                                                        <div class='col-3'>Documentation</div><div class='col-1'>:</div>";
                                                                if($row2['description_pdf']!=0){
                                                                    echo "<div class='col-8'><a  data-toggle='dropdown' href='#'><i class='fas fa-file-pdf product-documentation' style='color:white'></i></a><input type='text' hidden value='".$row2['product_id']."'></div>";
                                                                }        
                                                                else{
                                                                    echo "<div class='col-8'>NA</div>";
                                                                }        
                                                                echo "        
                                                                    </div>
                                                                ";


                                                                echo"           </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>";
                                                                

                                                                
                                                                break;
                                                            }
                                                            
                                                            
                                                            //End Modals
                                                           
                                                        }
                                                    ?>
                                                </tbody>
                                                
                                                
                                            </table>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Total Cost Calculations</th>
                                        <th>:</th>
                                        <td>
                                            
                                            <table class="table table-head-fixed table-hover text-nowrap">
                                               
                                                <tbody>
                                                      <tr>
                                                        <th style="width:50%">Sub-total</th>
                                                        <th>:</th>
                                                        <td>₹<?php echo $totalCost ?></td>
                                                      </tr>
                                                      <tr>
                                                        <th>Discount (<?php echo $discountPercent ?>%)</th>
                                                        <th>:</th>
                                                        <td>- ₹<?php 
                                                                    echo ($totalCost*$discountPercent)/100;
                                                                    $totalCost = $totalCost - (($totalCost*$discountPercent)/100);
                                                                ?>
                                                        </td>
                                                      </tr>

                                                      <tr>
                                                        <th>GST (18%)</th>
                                                        <th>:</th>
                                                        <td><?php echo ($totalCost*18)/100; ?></td>

                                                        <?php
                                                            $totalCost = $totalCost + (($totalCost*18)/100);
                                                        ?>

                                                      </tr>

                                                      <tr>
                                                        <th>Total</th>
                                                        <th>:</th>
                                                        <td><b><u>₹<?php echo $totalCost ?></u></b></td>
                                                      </tr>
                                                </tbody>
                                                
                                                
                                            </table>
                                            
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>    
                
            </div>
        </div>
    </section>
    
    
  


  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer no-print">
    
    <strong>Copyright &copy; 2020 <a href="#">Corporate <b>+</b></a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../dashboard_assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../dashboard_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../dashboard_assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>







<script src="../dashboard_assets/dist/js/adminlte.min.js"></script>

<script src="../dashboard_assets/dist/js/demo.js"></script>



<!-- ChartJS -->
<script src="../dashboard_assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../dashboard_assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../dashboard_assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../dashboard_assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../dashboard_assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../dashboard_assets/plugins/moment/moment.min.js"></script>
<script src="../dashboard_assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../dashboard_assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../dashboard_assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../dashboard_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Select2 -->
<script src="../dashboard_assets/plugins/select2/js/select2.full.min.js"></script>
<!--Dual List-->
<script src="../dashboard_assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>




<script src="../dashboard_assets/dist/js/pages/dashboard.js"></script>

<script type="text/javascript">



$(document).ready(function () {
  bsCustomFileInput.init();
  

});
</script>
</body>
</html>

