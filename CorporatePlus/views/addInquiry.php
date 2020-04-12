<?php
    session_start();
    
    unset($_SESSION['editDesignationName']);
    unset($_SESSION['editUserId']);
    unset($_SESSION['editVendorRegNum']);
    unset($_SESSION['return-raw-mat-order-id']);
    unset($_SESSION['editProductId']);
    unset($_SESSION['barcode-product-name']);
    unset($_SESSION['barcode-quantity']);
    unset($_SESSION['followInqID']);
    unset($_SESSION['saleInvoiceGenSaleID']);
    unset($_SESSION['saleDescriptionSaleId']);
    unset($_SESSION['saleDescriptionFlag']);
    unset($_SESSION['editProductCategoryId']);
    unset($_SESSION['inquiryDescriptioninquiryID']);
    unset($_SESSION['confirmSaleinquiryID']);
    unset($_SESSION['addSaleFlag']);
    //unset($_SESSION['inquiryPageWebInqId']);
    //unset($_SESSION['inquiryPageFlag']);
    unset($_SESSION['industrialApplicationId']);
    
    date_default_timezone_set('Asia/Kolkata');
    if(!$_SESSION['email']){
        header("login.php");
    }

    $con=mysqli_connect('localhost','root','','corporateplus');
    
    //$query = "SELECT designation_name FROM access WHERE form_id=1";   //Change just 'id' for each page. One more change below
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
    
    if($_SESSION['inquiryPageFlag'] == 1){
        $webInqId = $_SESSION['inquiryPageWebInqId'];
        
        $result = mysqli_query($con,"SELECT * FROM web_inquiry WHERE web_inquiry_id=".(int)$webInqId);
        while($row = mysqli_fetch_array($result)){
            $customerName = $row['inquirer_name'];
            $customerEmail = $row['inquirer_email'];
            $customerPhone = $row['inquirer_number'];
            $interestedProductId = $row['product_id'];
        }
        
        $result = mysqli_query($con,"SELECT * FROM products WHERE product_id=".(int)$interestedProductId);
        while($row = mysqli_fetch_array($result)){
            $interestedProductName = $row['product_name'];
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
  
  <link rel="stylesheet" href="../dashboard_assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">

  <link rel="stylesheet" href="../dashboard_assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../dashboard_assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  
  <style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance:textfield;
}
</style>
  
  
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
            echo "<a href='#' class='d-block'>".$name."</a>";
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
            <h1>Add New Inquiry</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <?php
                if($_SESSION['inquiryPageFlag'] == 1){
                    echo "<li class='breadcrumb-item'><a href='assignedWebInquiries.php'>Assigned Web Inquiries</a></li>";
                }
                else{
                    echo "<li class='breadcrumb-item'><a href='displayInquiries.php'>On-site Inquiries</a></li>";
                }
                ?>
                
              <?php
                $query="select form_name from form where form_file='".basename($_SERVER['PHP_SELF'])."'";
                $result = mysqli_query($con, $query);
                while($row=mysqli_fetch_array($result)){
                    $formName = $row['form_name'];
                }
                echo "<li class='breadcrumb-item active'>".$formName."</li>";
                
              ?>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">New Inquiry</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              

                <?php                              //CHANGE HERE WITH THE TABLE OF PRODUCT
                      $query="SELECT * FROM raw_materials ORDER BY active DESC, name ASC";
                      
                      $result = mysqli_query($con,$query);
                      while($row=mysqli_fetch_array($result)){
                        
                        $query2 = "SELECT user_reg_num from user WHERE email='".$_SESSION['email']."'";

                        $result2 = mysqli_query($con,$query2);
                        while($row2=mysqli_fetch_array($result2)){
                            $adderID = $row2['user_reg_num'];
                        } 
                      }
                      ?>
                <form role="form">
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputName1">Inquiry Registration Number</label>
                    <?php
                       
                        $result = mysqli_query($con,"SELECT inquiry_reg_num from onsite_inquiry");
                        while($row = mysqli_fetch_array($result)){
                            $lastID = $row['inquiry_reg_num'];
                        }
                        
                        if(isset($lastID)){
                            $newID = substr($lastID,3);
    
                            $newID = $newID+1;
    
                            while(strlen($newID)!=5){
                                $newID="0".$newID;
                            }
    
                            $newID = "INQ".$newID;
                        }
                        else{
                            $newID = "INQ00001";
                        }
                        
                        echo "<input type='text' class='form-control' readonly name='irn' id='inquiry-reg-num' value='".$newID."'>";
                    ?>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputName1">Customer Name</label>
                    <input type="text" class="form-control validate-input1" <?php if($_SESSION['inquiryPageFlag'] == 1) echo "value='".$customerName."'"; ?> name='inquiry-name' id="inquiry-name" placeholder="Name">
                    <span  class="invalid-feedback">Name field can't be empty</span> 
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email Address</label>
                    <input type="email" class="form-control validate-input1" <?php if($_SESSION['inquiryPageFlag'] == 1) echo "value='".$customerEmail."'"; ?> name="inquiry-email" id="inquiry-email" placeholder="Email ID">
                    <span  class="invalid-feedback">Please enter a valid email address (eg: abc@xyz.com)</span>
                  </div>

                   <div class="form-group">
                    <label for="exampleInputNumber1">Phone Number</label>
                    <input type="number" class="form-control validate-input1" <?php if($_SESSION['inquiryPageFlag'] == 1) echo "value='".$customerPhone."'"; ?> name='inquiry-number' id="inquiry-number" placeholder="Phone Number">
                    <span  class="invalid-feedback">Please enter a valid mobile number (10 digit)</span>
                  </div>


                  <div class="form-group">
                  <div class="card card-default">
                    <div class="card-header">
                         <label for="exampleInputProducts1">Product(s)</label>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                            </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <div class="row">
                                <div class="col-12">
                                  <div class="form-group">
                                    <label style="font-weight: normal;">Select Products that the client/customer is interested in:</label>

                                    <select class="duallistbox" multiple="multiple" id="prod-name">
                                      <?php
                                        $result = mysqli_query($con, "SELECT * FROM products WHERE active=1 ORDER BY product_name ASC");
                                        while($row=mysqli_fetch_array($result)){
                                            
                                            if($_SESSION['inquiryPageFlag'] == 1){
                                                if($row['product_name']==$interestedProductName){
                                                    echo "<option selected>".$row['product_name']."</option>";
                                                }
                                                else{
                                                    echo "<option>".$row['product_name']."</option>";
                                                }
                                            }
                                            else{
                                                echo "<option>".$row['product_name']."</option>";
                                            }
                                            
                                        }
                                      ?>
                                    </select>
                                  </div>
                                  <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                              </div>
                              <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                            
                          </div>
                        </div>





                  <div class="form-group">
                      <label for="exampleInputDate1">Inquiry Date</label>
                      <?php 

                        $year = date('Y');
                        $month = date('m');
                        $day = date('d');

                        $today = $year . '-' . $month . '-' . $day;
                      ?>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask placeholder="yy-mm-dd" id="inquiry-date" name="inquiry-date" value="<?php echo $today;?>">
                      </div>
                      <!-- /.input group -->
                  </div>


                  <div class="form-group">
                    <label for="exampleInputName1">Comments on Inquiry</label>
                    <?php echo"<textarea type='text' name='comments' class='form-control validate-input1' id='inq-comments' placeholder='Enter Comments on Inquiry'> </textarea>";?>
                    <span  class="invalid-feedback">Inquiry Comments can't be empty</span>
                  </div>

                  <div class="custom-control custom-switch">
                    <input type='checkbox' class='custom-control-input'  id='customSwitch3'>
                    <label class="custom-control-label" for="customSwitch3">Need Follow Up?</label>
                  </div>

                    
                    
                    
                  <div class="form-group" id='follow-up-details-div' style='margin-top:20px'>
                    
                    <div class='card card-default'>
                        <div class='card-header'>
                            <label>Follow Up Details</label>
                        </div>
                        
                        <div class='card-body'>
                               
                            <div class="form-group">
                                  <label for="exampleInputDate1">Follow Up Date</label>
                                  <?php 

                                    $year = date('Y');
                                    $month = date('m');
                                    $day = date('d');

                                    $today = $year . '-' . $month . '-' . $day;
                                  ?>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask placeholder="yy-mm-dd" id="fup-date" name="fup-date">
                                  </div>
                                  <!-- /.input group -->
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputName1">Follow Up Reason</label>
                                <?php echo"<textarea type='text' name='comments' class='form-control' id='fup-reason' placeholder='Enter Comments on Inquiry'> </textarea>";?>
                              </div>
                            
                        </div>
                        
                    </div>
                    
                    
                </div> 
                    

                  


                

                
              </form>
            </div>
                    
            <!-- /.card -->
            <div class="card-footer">
                  <button  class="btn btn-primary" id="add-inquiry">Submit</button>
                </div>
            
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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

<!-- Bootstrap4 Duallistbox -->
<script src="../dashboard_assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>


<!-- Bootstrap 4 -->
<script src="../dashboard_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../dashboard_assets/plugins/select2/js/select2.full.min.js"></script>


<script src="../dashboard_assets/dist/js/pages/dashboard.js"></script>

<script type="text/javascript">
$(function () {
  //Datemask dd/mm/yyyy
    $('#datemask').inputmask('yyyy/mm/dd', { 'placeholder': 'yyyy/mm/dd' })

  //Date range picker
    $('#reservation').daterangepicker()
  })


$(document).ready(function () {
  bsCustomFileInput.init();
});

$("#follow-up-details-div").hide();

$("#customSwitch3").click(function(){
    if($("#customSwitch3").prop("checked") == true)
        $("#follow-up-details-div").show();
    else
        $("#follow-up-details-div").hide();
});



$(function () {
  //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()
    
   
  })
</script>
</body>
</html>
