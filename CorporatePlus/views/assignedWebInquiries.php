<?php
    session_start();
    date_default_timezone_set('Asia/Kolkata');
    if(!$_SESSION['email']){
        header("Location: login.php");
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
?>

<!DOCTYPE html>
<html>
<head>
    
    <style>
/* height */
::-webkit-scrollbar {
  height: 5px;
}         
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
  <!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
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
<body class="hold-transition sidebar-mini layout-fixed"">
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
            <h1>Assigned Web Inquiries</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
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

    
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #007BFF">
                    
                    <h3 class="card-title col-md-9" style="color:white">List of Assigned Web Inquiries</h3>

                <div class="card-tools col-md-3">
                  <div class="input-group input-group-sm">

                    <input type="text" name="table_search" style="margin-left:20px" id="assigned-web-inquiry-search-string"  class="form-control" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default" id="assigned-web-inquiry-table-search"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
                   

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 390px;">
                <table class="table table-head-fixed table-hover text-nowrap">
                  <thead>
                    <tr>
                       <th>Inquiry<br>Reg. Num.</th>  
                      <th>Inquiry<br>Date</th>
                      <th>Person Name</th>
                      <th>Person Email</th>
                      <th>Person<br>Number</th>
                      <th>Interested<br>Product</th>
                      <th>Scheduled<br>Date</th>
                      <?php
                        
                        $query2 = "select access.form_id, form.form_file from access,form where access.form_id=form.form_id and access.designation_name='".$_SESSION['designation']."'";
                        $result2 = mysqli_query($con,$query2);
                        $flag = 0;
                        while($row2=mysqli_fetch_array($result2)){
                            if($row2['form_file']=='addInquiry.php')
                            $flag=1;
                        }
                        
                        if($flag==1){
                            echo "<th>Action</th>";
                        }
                        else{
                            echo "<th></th>";
                        }
                      
                      ?>
                      
                    </tr>

                  </thead>
                  <tbody id="assigned-web-inquiry-table-body">
                    
                      <?php
                      
                      $result = mysqli_query($con,"SELECT * FROM user WHERE email='".$_SESSION['email']."'");
                      while($row = mysqli_fetch_array($result)){
                          $myUserId = $row['user_id'];
                          
                          break;
                      }  
                        
                        $result = mysqli_query($con,"SELECT web_inquiry.web_inquiry_id,web_inquiry.web_inquiry_reg_num,web_inquiry.inquirer_name,web_inquiry.inquirer_email,web_inquiry.inquirer_number,web_inquiry.inquiry_date, web_inquiry.product_id,web_inquiry.inquiry_allocated_to,web_inquiry.appointment_timestamp,products.product_name
                                                    FROM web_inquiry,products
                                                    WHERE
                                                    products.product_id=web_inquiry.product_id AND
                                                    web_inquiry.inquiry_allocated_to=".(int)$myUserId." AND
                                                    web_inquiry.appointment_call=0 
                                                    ORDER BY web_inquiry.inquiry_date DESC, web_inquiry.web_inquiry_id DESC");
                        while($row = mysqli_fetch_array($result)){
                            
                            echo "<tr>";
                            
                            echo "<td>".$row['web_inquiry_reg_num']."</td>";
                            echo "<td>".date("d M, Y", strtotime($row['inquiry_date']))."</td>";
                            echo "<td>".$row['inquirer_name']."</td>";
                            echo "<td>".$row['inquirer_email']."</td>";
                            echo "<td>".$row['inquirer_number']."</td>";
                            echo "<td>".$row['product_name']."</td>";
                            echo "<td><span class='badge badge-warning'>PENDING</span></td>";
                            
                            if($flag)
                                echo "<td><a href='#' title='Schedule Appointment' data-toggle='modal' data-target='#appointment-modal-".$row['web_inquiry_id']."'><i class='far fa-calendar-check '></i></a></td>";
                            else
                                echo "<td></td>";
                            
                            echo "</tr>";
                            
                            
                            
                            echo "
                                 
                                    <div class='modal fade' id='appointment-modal-".$row['web_inquiry_id']."'>
                                        <div class='modal-dialog'>
                                          <div class='modal-content'>
                                            <div class='modal-header'>
                                              <h4 class='modal-title'>Schedule Appointment</h4>
                                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                              </button>
                                            </div>
                                            <div class='modal-body'>

                                                <div class='form-group'>

                                                    <div class='form-group'>
                                                      <label>Date</label>

                                                      <div class='input-group'>
                                                        <div class='input-group-prepend'>
                                                          <span class='input-group-text'><i class='far fa-calendar-alt'></i></span>
                                                        </div>
                                                        <input type='date' class='form-control validate-input1' value='".date('Y-m-d')."' id='appointment-date-".$row['web_inquiry_id']."' data-inputmask-alias='datetime' data-inputmask-inputformat='dd/mm/yyyy' data-mask placeholder='dd/mm/yy'>
                                                        <span  class='invalid-feedback'>Date field can't be empty</span>
                                                      </div>
                                                      <!-- /.input group -->
                                                    </div>
                                                    
                                                    <div class=\"bootstrap-timepicker\">
                                                      <div class=\"form-group\">
                                                        <label>Time:</label>

                                                        <div class=\"input-group date\" id=\"timepicker".$row['web_inquiry_id']."\" data-target-input=\"nearest\">
                                                            <div class=\"input-group-append\" data-target=\"#timepicker".$row['web_inquiry_id']."\" data-toggle=\"datetimepicker\">
                                                              <div class=\"input-group-text\"><i class=\"far fa-clock\"></i></div>
                                                          </div>
                                                            <input type=\"text\" name='time' id=\"appointment-time-".$row['web_inquiry_id']."\" value=\"".date('H:i A')."\" class=\"form-control datetimepicker-input validate-input1\" data-target=\"#timepicker\"/>
                                                          <span  class=\"invalid-feedback\">Select valid time</span>

                                                          </div>
                                                        <!-- /.input group -->
                                                      </div>
                                                      <!-- /.form group -->
                                                    </div>



                                                </div>  

                                            </div>
                                            <div class='modal-footer justify-content-between'>
                                              <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                              <button type='button' class='btn btn-primary fix-inquiry-appointment'>Save</button>
                                              <span hidden>".$row['web_inquiry_id']."</span>
                                            </div>
                                          </div>
                                          <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                      </div>

                                ";
                            
                                 
                            
                            
                            
                        }
                        
                        
                        $result = mysqli_query($con,"SELECT web_inquiry.web_inquiry_id,web_inquiry.web_inquiry_reg_num,web_inquiry.inquirer_name,web_inquiry.inquirer_email,web_inquiry.inquirer_number,web_inquiry.inquiry_date, web_inquiry.product_id,web_inquiry.inquiry_allocated_to,web_inquiry.appointment_timestamp,products.product_name
                                                    FROM web_inquiry,products
                                                    WHERE
                                                    products.product_id=web_inquiry.product_id AND
                                                    web_inquiry.inquiry_allocated_to=".(int)$myUserId." AND
                                                    web_inquiry.appointment_call=1 
                                                    ORDER BY web_inquiry.inquiry_date DESC, web_inquiry.web_inquiry_id DESC");
                        while($row = mysqli_fetch_array($result)){
                            
                            echo "<tr>";
                            
                            echo "<td>".$row['web_inquiry_reg_num']."</td>";
                            echo "<td>".date("d M, Y", strtotime($row['inquiry_date']))."</td>";
                            echo "<td>".$row['inquirer_name']."</td>";
                            echo "<td>".$row['inquirer_email']."</td>";
                            echo "<td>".$row['inquirer_number']."</td>";
                            echo "<td>".$row['product_name']."</td>";
                            echo "<td>".date("d M, Y", strtotime($row['appointment_timestamp']))."</td>";
                            
                            if($flag){
                                
                                echo "<td><a href='#' title='Take Inquiry'><i style='color:black' class='fas fa-arrow-right take-scheduled-appointment'></i></a><input type='text' hidden value='".$row['web_inquiry_id']."'></td>";
                            
                            }
                            else{
                                echo "<td></td>";
                            }
                            
                            echo "</tr>";
                            
                            
                        }
                        
                      ?>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
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

<script src="../dashboard_assets/dist/js/adminlte.js"></script>

<script src="../dashboard_assets/dist/js/pages/dashboard.js"></script>
<script src="../dashboard_assets/dist/js/demo.js"></script>

<script type="text/javascript">

$(function () {
  //Datemask dd/mm/yyyy
    $('#datemask').inputmask('yyyy/mm/dd', { 'placeholder': 'yyyy/mm/dd' })

  //Date range picker
    $('#reservation').daterangepicker()
  })

$(document).ready(function () {
  bsCustomFileInput.init();
  
   //Initialize Select2 Elements
    $('.select2').select2();
 
  

});
</script>

<?php
    $result = mysqli_query($con,"SELECT * FROM web_inquiry WHERE inquiry_allocated_to=".(int)$myUserId." AND appointment_call=0");
    
    while($row = mysqli_fetch_array($result)){
        echo "<script type='text/javascript'>
                $('#timepicker".$row['web_inquiry_id']."').datetimepicker({
                  format: 'LT'
                })
            </script>";
    }
?>


</body>
</html>