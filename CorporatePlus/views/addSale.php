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
        if($row['form_file']==basename($_SERVER['PHP_SELF']))
            $flag=1;
    }
    
    if($flag==0){
        header("Location: dashboard.php");
    }
    
    $confirmSaleFlag =0;
    
    if($_SESSION['addSaleFlag']==0)
        unset($_SESSION['confirmSaleinquiryID']);
    
    if(isset($_SESSION['confirmSaleinquiryID'])){
        $confirmSaleFlag = 1;
        
        $result = mysqli_query($con,"SELECT * FROM onsite_inquiry WHERE inquiry_id=".(int)$_SESSION['confirmSaleinquiryID']);
        while($row = mysqli_fetch_array($result)){
            
            $autoFillName = $row['customer_name'];
            $autoFillEmail = $row['customer_email'];
            $autoFillPhone = $row['customer_phone'];
            $autoFillProduct = $row['product_name'];
            $autoFillProductArray = explode(",",$autoFillProduct);

            break;
            
        }
        
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
            <h1>Add New Sale</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <?php
                    if($_SESSION['addSaleFlag']==1){
                        echo "<li class='breadcrumb-item'><a href='displayInquiries.php'>On-Site Inquiries</a></li>";
                    }
                    else{
                        echo "<li class='breadcrumb-item'><a href='sales.php'>Sales</a></li>";
                    }
                ?>
              <li class="breadcrumb-item active">Add New Sale</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->

    
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          
            
            
           <div class="col-12">
            <div class="card">
              <div class="card-header" style="background-color: #007BFF">
                <h3 class="card-title" style="color:white">New Sale</h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="height: auto;">
              
                  <?php 
                    if(isset($_SESSION['confirmSaleinquiryID'])){
                        echo "<input type='text' hidden id='refresh-flag' value='1'>";
                    }
                    else{
                        echo "<input type='text' hidden id='refresh-flag' value='0'>";
                    }
                  ?>
                  
                <div class="form-group">
                    <label for="exampleInputName1">Invoice Number</label>
                    <?php
                        
                        $tableName = "sale";
                        $columnName = "invoice_number";
                        $stringLength = 8;
                        
                        $result = mysqli_query($con,"SELECT ".$columnName." from ".$tableName);
                        while($row = mysqli_fetch_array($result)){
                            $lastID = $row[$columnName];
                        }
                        
                        if(isset($lastID)){
                            
                            $newID = $lastID+1;
    
                            while(strlen($newID)!=$stringLength){
                                $newID="0".$newID;
                            }
                            
                        }
                        else{
                            $newID = 1;
                            
                            while(strlen($newID)!=$stringLength){
                                $newID="0".$newID;
                            }
                        }
                        
                       
                    ?>
                    <input type='number' class='form-control validate-input1' name='invoice-number' value='<?php echo $newID; ?>' readonly id='invoice-number'>
                    
                </div>  
                  
                <div class="form-group">
                    <label for="exampleInputName1">Customer Name</label>
                    <input type="text" class="form-control validate-input1"  id="customer-name" <?php if($confirmSaleFlag==1) echo "value='".$autoFillName."'"; ?> placeholder="Enter Customer Name">
                    <span  class="invalid-feedback">Name field can't be empty</span>
                </div>  
                  
                <div class="form-group">
                    <label for="exampleInputName1">Customer Email Address</label>
                    <input type="text" class="form-control validate-input1" name="email" <?php if($confirmSaleFlag==1) echo "value='".$autoFillEmail."'"; ?> id="customer-email" placeholder="Enter Customer Email Address">
                    <span  class="invalid-feedback">Please enter a valid email address (eg: abc@xyz.com)</span>
                </div>
                  
                <div class="form-group">
                    <label for="exampleInputName1">Customer Phone Number</label>
                    <input type="text" class="form-control validate-input1" name="number"  id="customer-number" <?php if($confirmSaleFlag==1) echo "value='".$autoFillPhone."'"; ?> placeholder="Enter Customer Phone Number">
                    <span  class="invalid-feedback">Please enter a valid mobile number (10 digit)</span>
                </div>  
                
                
                  
                  
                
                  
                
                
                  
                  
                  
                <div class="form-group">
                  <div class="card card-default">
                    <div class="card-header">
                         <label for="exampleInputRawMaterials1">Products</label>

                            <div class="card-tools">
                           
                              </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <div class="row">
                                <div class="col-12">
                                  <div class="form-group">
                                    <label style="font-weight: normal;">Select Products To Be Bought:</label>
                                    <select class="duallistbox" multiple="multiple" id="sale-products">
                                 
                                      <?php
                                        if($confirmSaleFlag==0){
                                            $result = mysqli_query($con, "select * from products where active=1 ORDER BY product_name ASC");
                                            while($row=mysqli_fetch_array($result)){
                                                echo "<option>".$row['product_name']."</option>";
                                            }
                                        }
                                        else{
                                            $result = mysqli_query($con, "select * from products where active=1 ORDER BY product_name ASC");
                                            while($row=mysqli_fetch_array($result)){
                                                $testFlag=0;
                                                foreach ($autoFillProductArray as $value) {
                                                    if($value == $row['product_name']){
                                                        $testFlag=1;
                                                        break;
                                                    }
                                                }
                                                
                                                if($testFlag){
                                                    echo "<option selected>".$row['product_name']."</option>";
                                                }
                                                else {
                                                    echo "<option>".$row['product_name']."</option>";
                                                }
                                            }
                                        }
                                        
                                      ?>

                                    </select>
<!--                                    <span  class="invalid-feedback">Please Select atleast 1 raw material</span>-->
                                  </div>
                                  <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                              </div>
                                <a data-toggle='dropdown' href='#'><i id='select-sale-quantity' title='Select Product Quantities'  class='fas fa-lg fa-arrow-circle-right '></i></a>
                              <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                            
                          </div>

                  
                </div>
                
                <div class="form-group" id='product-quantity-div'>
                    
                    <div class='card card-default'>
                        <div class='card-header'>
                            <label>Select Quantities of the Products</label>
                        </div>
                        
                        <div class='card-body'>
                            <div class='row' id='product-quantity-body'>
                                
                            </div>
                                                        
                            <div class='row' style='margin-top:50px' id='preview-invoice-div'><div class='col-11'></div><div class='col-1'><a href="#" data-toggle='modal' data-target='#preview-invoice-modal'><span id='preview-invoice' class='badge badge-primary' style="background-color:#007BFF">View Net Cost</span></a></div></div>
        
                                
                            
                        </div>
                        
                    </div>
                    
                    
                </div>  
                  
                <?php
                
                    echo "<div class='modal fade' id='preview-invoice-modal'>
                            <div class='modal-dialog'>
                                <div class='modal-content bg-primary'>
                                    <div class='modal-header'>
                                        <h4 class='modal-title'>Cost Estimation</h4>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span></button>
                                    </div>
                                    <div class='modal-body' id='cost-estimation-modal-body'>";

                    

                    echo"           </div>
                                </div>
                            </div>
                        </div>";
                
                ?>  
                  
                  
                <div class="form-group">
                    <label for="exampleInputNumber1">Discount (%)</label>
                    <input type="number" class="form-control validate-input1" name='percentage' min='0' max='100' value='0' id="percent-discount" placeholder="Enter Percentage(%) Discount Given">
                    <span  class="invalid-feedback">Please enter valid percentage</span>
                </div>
                  
                <div class="form-group">
                    <label for="exampleInputReason1">Customer (Delivery) Address</label>
                    <textarea name='product-description' class='form-control validate-input1' rows='4' id='delivery-address' placeholder='Enter delivery address'></textarea>
                    <span  class="invalid-feedback">Address field can't be empty</span>
                </div> 
                  
                <div class="form-group">
                    <label for="exampleInputNumber1">Pin Code</label>
                    <input type="number" class="form-control validate-input1" name='pin-code' min='1' id="delivery-pin-code" placeholder="Enter Pin Code">
                    <span  class="invalid-feedback">Please enter valid pin-code</span>
                </div>  
                  
                
                <div class="form-group">
                    <label for="exampleInputName1">City</label>
                    <input type="text" class="form-control validate-input1"  id="delivery-city" placeholder="Enter City Name">
                    <span  class="invalid-feedback">City field can't be empty</span>
                </div>  
                  
                
                <div class="form-group">
                  <label>Select State</label>
                  <select id="delivery-state" class="form-control select2" style="width: 100%;">
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                        <option value="Daman and Diu">Daman and Diu</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Puducherry">Puducherry</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="West Bengal">West Bengal</option>
                  </select>
                  
                </div>  
                
                  
                <div class="form-group">
                  <label>Date of sale</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" class="form-control validate-input1" value='<?php echo date("Y-m-d") ?>' id='date' data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask placeholder="dd/mm/yy">
                    <span  class="invalid-feedback">Date field can't be empty</span>
                  </div>
                </div>   
             
                  
                  
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <button  class="btn btn-primary" id="add-new-sale">Submit</button>
              </div>
            </div>
            <!-- /.card -->
          </div> 
            
            
            
            
            
        </div>
      </div>
    </section>
  


  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
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
  
 //Initialize Select2 Elements
    $('.select2').select2();
 
 //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox();
 
    $('#add-new-sale').hide();
    $('#product-quantity-div').hide();
    $('#preview-invoice-div').hide();
    
    $('#select-sale-quantity').click(function(){
        
        $prodObj = $('#sale-products').val();
        $prodString = String($prodObj);
        if($prodString==""){
            alert("Please select atleast one product.");
            $('#product-quantity-div').hide();
            $('#add-new-sale').hide();
            $('#preview-invoice-div').hide();
        }
        else{
            
            $.ajax({
                
                url:"../models/modelMain.php",
            
            
            
                data:
                    {
                        productString: $prodString,
                        action:'show-sales-product-quantity'
                    },
                
                type: 'POST',
                datatype:'HTML',
            
                success: function(data){
                    
                    $('#product-quantity-div').show();
    
                    $("#product-quantity-body").html(data);
                    if($("#flag").val()!=0){
                        $('#add-new-sale').show();
                        $('#preview-invoice-div').show();
                    }
                    else{
                        $('#add-new-sale').hide();
                        $('#preview-invoice-div').hide();
                    }
                }
                
            });
            
             
        }
        
    });
    
    
    $("#preview-invoice").click(function(){
        
        
        $productNameString = $("#product-name-array").val()
        
        $productQuantityString = "";

        $('.sale-product-quantity').each(function()
        {
            if($productQuantityString==""){
               if($(this).val()!=null){
                   $productQuantityString = ""+$(this).val()+""; 
               } 
            }
            else{
                if($(this).val()!=null){
                    $productQuantityString = $productQuantityString+","+$(this).val();
                }
            }

        });
        
        $.ajax({
            
            url:"../models/modelMain.php",
            
            
            
            data:
                {
                    productNameString:$productNameString,
                    productQuantityString:$productQuantityString,
                    action:'preview-cost-estimation'
                },

            type: 'POST',
            datatype:'HTML',

            success: function(data){

                $("#cost-estimation-modal-body").html(data);
            }
            
        });
    });
    
    
    $("#preview-invoice").hover(function(){
       
       $("#preview-invoice").css('background-color','darkblue');
    });
    
    $("#preview-invoice").mouseout(function(){
       
       $("#preview-invoice").css('background-color','#007BFF');
    });
 
});
</script>
</body>
</html>
