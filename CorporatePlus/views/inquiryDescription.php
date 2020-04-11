<?php

    session_start();
            
            
   if(!$_SESSION['email']){
        header("Location: login.php");
    }

    $con=mysqli_connect('localhost','root','','corporateplus');
    
    
    $query = "select access.form_id, form.form_file from access,form where access.form_id=form.form_id and access.designation_name='".$_SESSION['designation']."'";
    $result = mysqli_query($con,$query);
    $flag = 0;
    while($row=mysqli_fetch_array($result)){
        if($row['form_file']=='displayInquiries.php')
            $flag=1;
    }
    
    if($flag==0){
        header("Location: dashboard.php");
    }
    
    
    
    if(!isset($_SESSION['inquiryDescriptioninquiryID']))
        header("Location: dashboard.php");
    
    
    $inqID = (int)$_SESSION['inquiryDescriptioninquiryID'];

    
    
    $result = mysqli_query($con,"SELECT * FROM onsite_inquiry WHERE inquiry_id=".$inqID);
    while($row=mysqli_fetch_array($result)){
        
        $inquiryRegNum = $row['inquiry_reg_num'];
        $customerName = $row['customer_name'];
        $email = $row['customer_email'];
        $phone= $row['customer_phone'];
        $product = $row['product_name'];
        $comment = $row['comment'];
        $inquiryDate = $row['inquiry_date'];
        $fupNeeded = $row['follow_up_needed'];
        $fupReason = $row['follow_up_reason'];
        $fupDate = $row['follow_up_date'];
        $inquiryTakerId = $row['inquiry_taker'];


        break;
    }
    
    $result = mysqli_query($con,"SELECT * FROM user WHERE user_id=".(int)$inquiryTakerId);
    while($row=mysqli_fetch_array($result)){
        $inquiryTakerName = $row['user_name'];
        $inquiryTakerRegNum = $row['user_reg_num'];
        break;
    }
    
//    $result2 = mysqli_query($con,"SELECT * FROM onsite_inquiry_follow_up WHERE inquiry_id=".$inqID);
//    while($row2=mysqli_fetch_array($result2)){
//        
//        $fupComments = $row2['comments'];
//        $fupNeededAgain = $row2['follow_up_needed'];
//        $fupReasonAgain = $row2['follow_up_reason'];
//        $fupDateAgain = $row2['follow_up_date'];
//        //$fupID = $row2['follow_up_id'];
//  
//        break;
//    }

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
            <h1>Inquiry Description</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item">
                    <?php
                        
                            echo "<a href='displayInquiries.php'>Display Inquiries</a>";
                  
                    ?>
                    
                </li>
                <li class="breadcrumb-item active">Inquiry Description</li>
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
                                        <th style='width:30%'>Name</th>
                                        <th style='width:5%'>:</th>
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
                                    
                                    
                                </tbody>
                            </table>    
                        </div>
                        
                    </div>    
                </div>    
                
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="background-color: #007BFF">
                            <h3 class="card-title" style="color:white">Inquiry Summary</h3>
                        </div>

                        <div class="card-body table-responsive p-0" style="height:auto;">
                            
                            <table class="table table-head-fixed table-hover text-nowrap">
                                <tbody>
                                    <tr>
                                        <th style='width:30%'>Inquiry Number</th>
                                        <th style='width:5%'>:</th>
                                        <td><?php echo $inquiryRegNum ?></td>
                                    </tr>

                                    <tr>
                                        <th>Interested Products</th>
                                        <th>:</th>
                                        <td>
                                        <?php
                                            $productArray = explode(',',$product);
                                            echo "<div class='row'>";
                                            foreach($productArray as $value){
                                                echo "
                                                    <div class='col-12'>".$value."</div>
                                                ";
                                                //echo "<td>".$value."</td>";
                                            }
                                            echo "</div>";
                                        ?>
                                        </td>    
                                    </tr>
                                    
                                    <tr>
                                        <th>Inquiry Date</th>
                                        <th>:</th>
                                        <td><?php echo date("d M, Y",strtotime($inquiryDate)) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Inquiry Taken By</th>
                                        <th>:</th>
                                        <td><?php echo $inquiryTakerName." - ".$inquiryTakerRegNum ?></td>
                                    </tr>
                                    <tr>
                                        <th>Inquiry Discussion (Summary)</th>
                                        <th>:</th>
                                        <td><?php echo  $comment ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Applied for a follow up?</th>
                                        <th>:</th>
                                        <td><?php echo ($fupNeeded==1) ? "Yes" : "No"; ?></td>
                                    </tr>
                                    
                                    <?php
                                    
                                    if($fupNeeded==1){
                                        
                                        echo "
                                            <tr>
                                                <th>Follow Up Date</th>
                                                <th>:</th>
                                                <td>".date("d M, Y",strtotime($fupDate))."</td>
                                            </tr>    
                                            
                                            <tr>
                                                <th>Follow Up Reason</th>
                                                <th>:</th>
                                                <td>".$fupReason."</td>
                                            </tr>
                                        ";
                                        
                                    }
                                    
                                    ?>
                                    

                                    
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div> 


                <?php 
                
                $result3 = mysqli_query($con,"SELECT * FROM onsite_inquiry_follow_up WHERE inquiry_id='".$inqID."' ORDER BY fup_date ASC");
                if(mysqli_num_rows($result3)==0){
                        
                        echo "<div class='col-12'>
                                <div class='card'>

                                    <div class='card-header' style='background-color: #007BFF'>
                                        <h3 class='card-title' style='color:white'>Follow Up Not Yet Taken</h3>
                                    </div>

                                </div>

                                </div>";
                        
                }
                $rowCounter = 0;
                while($row3=mysqli_fetch_array($result3)){
                    $rowCounter++;
                    
                    $result4 = mysqli_query($con,"SELECT * FROM user WHERE user_id=".(int)$row3['follow_up_taker']);
                    while($row4 = mysqli_fetch_array($result4)){
                        $followUpTakerRegNum = $row4['user_reg_num'];
                        $followUpTakerName = $row4['user_name'];
                        break;
                    }
                    
                    echo "<div class='col-12'>
                    <div class='card'>
                        
                        <div class='card-header' style='background-color: #007BFF'>
                            <h3 class='card-title' style='color:white'>Follow Up Details (".$rowCounter.")</h3>
                        </div>
                        
                        <div class='card-body table-responsive p-0' style='height:auto;'>
                            <table class='table table-head-fixed table-hover text-nowrap'>
                                <tbody>
                                    <tr>
                                        <th style='width:30%'>Date</th>
                                        <th style='width:5%'>:</th>
                                        <td>".date('d M, Y', strtotime($row3['fup_date']))."</td>
                                    </tr>
                                    
                                    <tr>
                                        
                                        <th>Follow Up Taken By</th>
                                        <th>:</th>
                                        <td>".$followUpTakerName." - ".$followUpTakerRegNum."</td>
                                    
                                    </tr>

                                    <tr>
                                        <th>Follow Up Discussion (Summary)</th>
                                        <th>:</th>
                                        <td>";if($row3['comments']==''){
                                
                                                echo 'NA';}

                                              else
                                                {
                                                echo $row3['comments'];
                                                }
                                              
                                        echo "</td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th>Applied for another follow up?</th>
                                        <th>:</th>
                                        <td>";
                                        if($row3['follow_up_needed']==0){
                                
                                                echo "No";}

                                              else
                                                {
                                                echo "Yes";
                                        }

                                    
                                        echo "</td>
                                    </tr>";
                                    
                                    if($row3['follow_up_needed']==1){
                                        
                                        echo "<tr>
                                        <th>Next Follow Up Date</th>
                                        <th>:</th>
                                        <td>".date("d M, Y",strtotime($row3['follow_up_date']))."</td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Reason for Another Follow Up</th>
                                        <th>:</th>
                                        <td>".$row3['follow_up_reason']."</td>
                                    </tr>";
                                    
                                        
                                    }
                                    
                                    
                            echo "</tbody>
                            </table>    
                        </div>
                        
                    </div>    
                </div>";
                    
                }
                
                ?>    
                
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
