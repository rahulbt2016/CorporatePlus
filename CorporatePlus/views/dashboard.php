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
    unset($_SESSION['inquiryPageWebInqId']);
    unset($_SESSION['inquiryPageFlag']);
    unset($_SESSION['industrialApplicationId']);
    
    date_default_timezone_set('Asia/Kolkata');
    if(!$_SESSION['email']){
        header("Location: login.php");
    }
    
    $con=mysqli_connect('localhost','root','','corporateplus');
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
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../dashboard_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../dashboard_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../dashboard_assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dashboard_assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../dashboard_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../dashboard_assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../dashboard_assets/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
    <!-- SEARCH FORM -->
<!--    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>-->

    
    <ul class="navbar-nav ml-auto">
      
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a id="logout" class="nav-link" data-toggle="dropdown" href="#">
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
  
  <?php
        
        function deadlineString($datetime, $full = false) {
                    
            $date = date_default_timezone_set('Asia/Kolkata');

            $ago = new DateTime;
            $now = new DateTime($datetime);


            if($now<$ago){
                return "Deadline Passed";
            }

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
            return $string ? implode(', ', $string) . '' : 'Now';

        }

        function deadlineColorBadge($datetime){

            $deadlineString = deadlineString($datetime);

            if(strpos($deadlineString, "year")){
                return "badge-secondary";
            }
            else if(strpos($deadlineString, "month")){
                return "badge-secondary";
            }
            else if(strpos($deadlineString, "week")){
                return "badge-primary";
            }
            else if(strpos($deadlineString, "days")){
                return "badge-success";
            }
            else if(strpos($deadlineString, "day")){
                return "badge-warning";
            }
            else if(strpos($deadlineString, "hour")){
                return "badge-info";
            }
            else if(strpos($deadlineString, "minute")){
                return "badge-danger";
            }
            else if(strpos($deadlineString, "second")){
                return "badge-danger";
            }
            else{
                return "badge-danger";
            }

        }
  
  ?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
        <img src="../dashboard_assets/dist/img/logo2NewNoBG.png" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>Corporate Plus</b><br></span>
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
              <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                  <?php
                    $result = mysqli_query($con,"SELECT COUNT(user_id) as count FROM user WHERE active=1");
                    while($row = mysqli_fetch_array($result)){
                        $activeUsers = $row['count'];
                        break;
                    }
                    echo "<h3>".$activeUsers."</h3>";
                  ?>
                

                <p>Active Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
                <a href="users.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                    $result = mysqli_query($con,"SELECT COUNT(product_id) as count FROM products WHERE active=1");
                    while($row = mysqli_fetch_array($result)){
                        $uniqueProducts = $row['count'];
                        break;
                    }
                    echo "<h3>".$uniqueProducts."</h3>";
                  ?>
                <p>Unique Products</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
                <a href="products.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                    $result = mysqli_query($con,"SELECT COUNT(product_manufacture_id) as count FROM products_manufactured");
                    while($row = mysqli_fetch_array($result)){
                        $manufacturedProducts = $row['count'];
                        break;
                    }
                    echo "<h3>".$manufacturedProducts."</h3>";
                  ?>

                <p>Manufactured Products</p>
              </div>
              <div class="icon">
                <i class="ion ion-settings"></i>
              </div>
                <a href="manufacturedProducts.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                    $result = mysqli_query($con,"SELECT COUNT(product_manufacture_id) as count FROM products_manufactured WHERE status=1");
                    while($row = mysqli_fetch_array($result)){
                        $soldProducts = $row['count'];
                        break;
                    }
                    echo "<h3>".$soldProducts."</h3>";
                  ?>
                <p>Sales</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-cart"></i>
              </div>
                <a href="sales.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        
        <!-- Main row -->
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <!-- TO DO List -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="ion ion-clipboard mr-1"></i>
                      To Do List
                    </h3>
                    <?php
                        
                        if (isset($_GET['pageno'])) {
                            $pageno = $_GET['pageno'];
                        } else {
                            $pageno = 1;
                        }
                        $no_of_records_per_page = 6;
                        $offset = ($pageno-1) * $no_of_records_per_page;
                        
                        $total_pages_sql = "SELECT COUNT(*) FROM to_do WHERE user_id=".(int)$userId;
                        $result = mysqli_query($con,$total_pages_sql);
                        $total_rows = mysqli_fetch_array($result)[0];
                        $total_pages = ceil($total_rows / $no_of_records_per_page);
                    
                    ?>  

                    <div class="card-tools">
                      <ul class="pagination pagination-sm">
                        <li class="page-item"><a href="?pageno=1" class="page-link">&laquo;</a></li>
                        <?php
                            for($i=1;$i<=$total_pages;$i++){
                                echo "<li class='page-item'><a href='?pageno=".$i."' class='page-link'>".$i."</a></li>";
                            }
                        ?>
                        <li class="page-item"><a href="?pageno=<?php if($total_pages==0) echo 1; else echo $total_pages; ?>" class="page-link">&raquo;</a></li>
                      
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <li>
                           <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                              </button> 
                        </li>
                        <li>
                            <button  type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                              </button>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <ul class="todo-list" data-widget="todo-list">
                      
                      <?php
                      
                        $result = mysqli_query($con,"SELECT * FROM to_do WHERE user_id=".(int)$userId." ORDER BY done ASC, deadline ASC LIMIT ".$offset.",".$no_of_records_per_page);
                        
                        if(mysqli_num_rows ( $result )==0){
                            echo "<b>The List is empty. You can add entries by clicking the button below.</b>";
                        }
                        
                        while($row = mysqli_fetch_array($result)){
                            echo "
                                <li>
                                
                                <span class='handle'>
                                  <i class='fas fa-ellipsis-v'></i>
                                  <i class='fas fa-ellipsis-v'></i>
                                </span>";
                                
                                if($row['done']==1){
                                  echo "
                                      
                                      <div  class='icheck-primary d-inline ml-2'>
                                        <input type='checkbox' checked value='' name='todo1' id='todoCheckbox".$row['to_do_id']."' class='to-do-checkbox'>
                                        <label for='todoCheckbox".$row['to_do_id']."'></label>
                                        <span hidden>".$row['to_do_id']."</span>
                                      </div>  
                                    ";  
                                }
                                else{
                                    echo "
                                        
                                        <div  class='icheck-primary d-inline ml-2'>
                                          <input type='checkbox' value='' name='todo1' id='todoCheckbox".$row['to_do_id']."' class='to-do-checkbox'>
                                          <label for='todoCheckbox".$row['to_do_id']."'></label>
                                          <span hidden>".$row['to_do_id']."</span>
                                        </div>
                                    ";
                                }
                                
                                
                                echo "<span class='text'>".$row['data']."</span>
                                
                                <small class='badge ". deadlineColorBadge($row['deadline'])."'><i class='far fa-clock'></i> ". deadlineString($row['deadline'])."</small>
                                
                                <div class='tools'>
                                  <i class='text-primary fas fa-edit edit-to-do' data-toggle='modal' data-target='#edit-to-do-modal".$row['to_do_id']."'></i>
                                  <i style='margin-left:20px' class='fas fa-trash delete-to-do'></i>
                                  <span hidden>".$row['to_do_id']."</span>
                                </div>
                              </li>
                            ";
                                
                                
                                
                                
                                
                             echo "
                                 
                                    <div class='modal fade' id='edit-to-do-modal".$row['to_do_id']."'>
                                        <div class='modal-dialog'>
                                          <div class='modal-content'>
                                            <div class='modal-header'>
                                              <h4 class='modal-title'>Edit Item</h4>
                                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                              </button>
                                            </div>
                                            <div class='modal-body'>

                                                <div class='form-group'>

                                                    <div class='form-group'>
                                                        <label for='exampleInputName1'>To Do</label>
                                                        <input type='text' class='form-control validate-input1' value='".$row['data']."'  id='to-do-data-".$row['to_do_id']."' placeholder='Enter work to be done'>
                                                        <span  class='invalid-feedback'>This field can't be empty</span>
                                                    </div>


                                                    <div class='form-group'>
                                                      <label>Deadline Date</label>

                                                      <div class='input-group'>
                                                        <div class='input-group-prepend'>
                                                          <span class='input-group-text'><i class='far fa-calendar-alt'></i></span>
                                                        </div>
                                                        <input type='date' class='form-control validate-input1' value='".date('Y-m-d',strtotime($row['deadline']))."' id='deadline-date-".$row['to_do_id']."' data-inputmask-alias='datetime' data-inputmask-inputformat='dd/mm/yyyy' data-mask placeholder='dd/mm/yy'>
                                                        <span  class='invalid-feedback'>Date field can't be empty</span>
                                                      </div>
                                                      <!-- /.input group -->
                                                    </div>
                                                    
                                                    <div class=\"bootstrap-timepicker\">
                                                      <div class=\"form-group\">
                                                        <label>Deadline Time:</label>

                                                        <div class=\"input-group date\" id=\"timepicker".$row['to_do_id']."\" data-target-input=\"nearest\">
                                                            <div class=\"input-group-append\" data-target=\"#timepicker".$row['to_do_id']."\" data-toggle=\"datetimepicker\">
                                                              <div class=\"input-group-text\"><i class=\"far fa-clock\"></i></div>
                                                          </div>
                                                            <input type=\"text\" name='time' id=\"deadline-time-".$row['to_do_id']."\" value=\"".date('H:i A',strtotime($row['deadline']))."\" class=\"form-control datetimepicker-input validate-input1\" data-target=\"#timepicker\"/>
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
                                              <button type='button' class='btn btn-primary save-edited-to-do'>Save</button>
                                              <span hidden>".$row['to_do_id']."</span>
                                            </div>
                                          </div>
                                          <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                      </div>

                                ";
                                
                        }
                      ?>
                      
                    </ul>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                    <button type="button" class="btn btn-info float-right" data-toggle='modal' data-target='#add-to-do-modal'><i class="fas fa-plus"></i> Add item</button>
                  </div>
                </div>
                
                <div class="modal fade" id="add-to-do-modal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Add New Item</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      
                        <div class="form-group">
                            
                            <div class="form-group">
                                <label for="exampleInputName1">To Do</label>
                                <input type="text" class="form-control validate-input1"  id="to-do-data" placeholder="Enter work to be done">
                                <span  class="invalid-feedback">This field can't be empty</span>
                            </div>
                            
                            
                            <div class="form-group">
                              <label>Deadline Date</label>

                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control validate-input1" value='<?php echo date("Y-m-d") ?>' id='deadline-date' data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask placeholder="dd/mm/yy">
                                <span  class="invalid-feedback">Date field can't be empty</span>
                              </div>
                              <!-- /.input group -->
                            </div>
                            
                            <div class="bootstrap-timepicker">
                              <div class="form-group">
                                <label>Deadline Time:</label>

                                <div class="input-group date" id="timepicker" data-target-input="nearest">
                                    <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="far fa-clock"></i></div>
                                  </div>
                                    <input type="text" id='deadline-time' name='time' value='<?php echo date("H:i a") ?>' class="form-control datetimepicker-input validate-input1" data-target="#timepicker"/>
                                  <span  class="invalid-feedback">Select valid time</span>
                                  
                                  </div>
                                <!-- /.input group -->
                              </div>
                              <!-- /.form group -->
                            </div>
                            
                            
                        </div>  
                        
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" id="add-new-to-do">Add</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
            
                
                <!-- /.card -->
            </section>
        </div>
        
        
        
        <?php
        //Get Current Week Quantity Array////////////////////////////////////////////////////////////////////////////////
        $thisMonday = date( 'Y-m-d', strtotime( 'monday this week' ) );
        $todayDate = date("Y-m-d");
        
        $currentWeekString = "";
        $currentWeekQuantityString = "";
        
        $tempDate = $thisMonday;
        while($tempDate<=$todayDate){
            
            
            if($currentWeekString==""){
                $currentWeekString = "".$tempDate."";
            }
            else{
                $currentWeekString = $currentWeekString.",".$tempDate;
            }
                
                
            $tempDate = date('Y-m-d',strtotime("+1 day", strtotime($tempDate)));
        }
        
        $currentWeekArray = explode(",",$currentWeekString);
        
        foreach ($currentWeekArray as $value) {
            //echo "alert('".$value."');";
            
            $result = mysqli_query($con,"SELECT sale.sale_date, SUM(sale_products.quantity) as quantity FROM sale, sale_products
                                        WHERE sale.sale_id=sale_products.sale_id AND 
                                        sale.sale_date='".date('Y-m-d',strtotime($value))."'
                                        GROUP BY sale.sale_date");
            
            if(mysqli_num_rows ( $result )==0){
                
                if($currentWeekQuantityString==""){
                    $currentWeekQuantityString="0";
                }
                else{
                    $currentWeekQuantityString=$currentWeekQuantityString.",0";
                }
            }
            else{
                while($row = mysqli_fetch_array($result)){
                
                    if($currentWeekQuantityString==""){
                        $currentWeekQuantityString="".$row['quantity']."";
                    }
                    else{
                        $currentWeekQuantityString=$currentWeekQuantityString.",".$row['quantity'];
                    }

                    break;
                }
            }
            
            
        }
        $currentWeekQuantityArray = explode(",", $currentWeekQuantityString);
        
        //Get Last Week Quantity Array///////////////////////////////////////////////////////////////////////////////////
        $lastMonday = date( 'Y-m-d', strtotime( 'monday last week' ) );
        $lastSunday = date( 'Y-m-d', strtotime( 'sunday last week' ) );
        
       
        
        $lastWeekString = "";
        $lastWeekQuantityString = "";
        
        $tempDate = $lastMonday;
        while($tempDate<=$lastSunday){
            
            
            if($lastWeekString==""){
                $lastWeekString = "".$tempDate."";
            }
            else{
                $lastWeekString = $lastWeekString.",".$tempDate;
            }
                
                
            $tempDate = date('Y-m-d',strtotime("+1 day", strtotime($tempDate)));
        }
        
        $lastWeekArray = explode(",",$lastWeekString);
        
        
        foreach ($lastWeekArray as $value) {
            //echo "alert('".$value."');";
            
            $result = mysqli_query($con,"SELECT sale.sale_date, SUM(sale_products.quantity) as quantity FROM sale, sale_products
                                        WHERE sale.sale_id=sale_products.sale_id AND 
                                        sale.sale_date='".date('Y-m-d',strtotime($value))."'
                                        GROUP BY sale.sale_date");
            
            if(mysqli_num_rows ( $result )==0){
                
                if($lastWeekQuantityString==""){
                    $lastWeekQuantityString="0";
                }
                else{
                    $lastWeekQuantityString=$lastWeekQuantityString.",0";
                }
            }
            else{
                while($row = mysqli_fetch_array($result)){
                
                if($lastWeekQuantityString==""){
                    $lastWeekQuantityString="".$row['quantity']."";
                }
                else{
                    $lastWeekQuantityString=$lastWeekQuantityString.",".$row['quantity'];
                }
                
                break;
            }
            }
            
            
        }
        
        $lastWeekQuantityArray = explode(",", $lastWeekQuantityString);
        
        //CURRENT YEAR SALE GRAPH///////////////////////////////////////////////////////////////////////////////////////////////
        
        $currentMonth = date('m');
        $currentYear = date('Y');
        
        $currentYearQuantity="";
        
        for($i=1;$i<=(int)$currentMonth;$i++){
            //echo "<script>alert('".$i."')</script>";
            
            $result = mysqli_query($con,"SELECT DATE_FORMAT(sale.sale_date, '%c') as months, SUM(sale_products.quantity) as quantity FROM sale, sale_products
                                WHERE sale.sale_id=sale_products.sale_id AND
                                DATE_FORMAT(sale.sale_date, '%Y')='".(int)$currentYear."' AND
                                DATE_FORMAT(sale.sale_date, '%c') = '".$i."'    
                                GROUP BY months
                                ORDER BY months ASC");
            
            if(mysqli_num_rows ( $result )==0){
                if($currentYearQuantity==""){
                    $currentYearQuantity="0";
                }
                else{
                    $currentYearQuantity=$currentYearQuantity.",0";
                }
            }
            else{
                while($row = mysqli_fetch_array($result)){
                    if($currentYearQuantity==""){
                        $currentYearQuantity="".$row['quantity']."";
                    }
                    else{
                        $currentYearQuantity=$currentYearQuantity.",".$row['quantity'];
                    }
                    
                    break;
                }
            }
            
        }
        
        //echo "<script>alert('".$currentYearQuantity."')</script>";
        $currentYearQuantity = explode(",",$currentYearQuantity);

        //END CURRENT YEAR SALE GRAPH///////////////////////////////////////////////////////////////////////////////////////////
        
        
        //LAST YEAR SALE GRAPH///////////////////////////////////////////////////////////////////////////////////////////
        
        $lastYear = date('Y', strtotime("last year"));
        
        $lastYearQuantity="";
        
        for($i=1;$i<=12;$i++){
            //echo "<script>alert('".$lastYear."')</script>";
            
            $result = mysqli_query($con,"SELECT DATE_FORMAT(sale.sale_date, '%c') as months, SUM(sale_products.quantity) as quantity FROM sale, sale_products
                                WHERE sale.sale_id=sale_products.sale_id AND
                                DATE_FORMAT(sale.sale_date, '%Y')='".(int)$lastYear."' AND
                                DATE_FORMAT(sale.sale_date, '%c') = '".$i."'    
                                GROUP BY months
                                ORDER BY months ASC");
            
            if(mysqli_num_rows ( $result )==0){
                if($lastYearQuantity==""){
                    $lastYearQuantity="0";
                }
                else{
                    $lastYearQuantity=$lastYearQuantity.",0";
                }
            }
            else{
                while($row = mysqli_fetch_array($result)){
                    if($lastYearQuantity==""){
                        $lastYearQuantity="".$row['quantity']."";
                    }
                    else{
                        $lastYearQuantity=$lastYearQuantity.",".$row['quantity'];
                    }
                    
                    break;
                }
            }
            
        }
        
        //echo "<script>alert('".$currentYearQuantity."')</script>";
        $lastYearQuantity = explode(",",$lastYearQuantity);

        
        //END LAST YEAR SALE GRAPH///////////////////////////////////////////////////////////////////////////////////////////
        
        //CURRENT YEAR CAPITAL SALE GRAPH/////////////////////////////////////////////////////////////////////////////////
        
        $currentMonth = date('m');
        $currentYear = date('Y');
        
        $currentYearCapital="";
        
        for($i=1;$i<=(int)$currentMonth;$i++){
            //echo "<script>alert('".$i."')</script>";
            
            $result = mysqli_query($con,"SELECT DATE_FORMAT(sale_date, '%c') as months, SUM(total_cost) as capital FROM sale
                                WHERE DATE_FORMAT(sale_date, '%Y')='".(int)$currentYear."' AND
                                DATE_FORMAT(sale_date, '%c') = '".$i."' 
                                GROUP BY DATE_FORMAT(sale_date, '%c')
                                ORDER BY months ASC");
            
            
            if(mysqli_num_rows ( $result )==0){
                if($currentYearCapital==""){
                    $currentYearCapital="0";
                }
                else{
                    $currentYearCapital=$currentYearCapital.",0";
                }
            }
            else{
                while($row = mysqli_fetch_array($result)){
                    
                    
                    //For Calculating Monthly Capital Percentage
                    if($i==(int)$currentMonth){
                        $currentMonthCapital = $row['capital'];
                    }
                    if($i==(((int)$currentMonth)-1)){
                        $lastMonthCapital = $row['capital'];
                    }
                    ////////////////////////////////////////////

                    
                    if($currentYearCapital==""){
                        $currentYearCapital="".$row['capital']."";
                    }
                    else{
                        $currentYearCapital=$currentYearCapital.",".$row['capital'];
                    }
                    
                    break;
                }
            }
            
        }
        
        //echo "<script>alert('".$currentYearQuantity."')</script>";
        $currentYearCapital = explode(",",$currentYearCapital);
        
        //END CURRENT YEAR CAPITAL SALE GRAPH////////////////////////////////////////////////////////////////////////////
        
        //LAST YEAR CAPITAL SALE GRAPH////////////////////////////////////////////////////////////////////////////////////
        
        $lastYear = date('Y', strtotime("last year"));
        
        $lastYearCapital="";
        
        for($i=1;$i<=12;$i++){
            //echo "<script>alert('".$lastYear."')</script>";
            
            $result = mysqli_query($con,"SELECT DATE_FORMAT(sale_date, '%c') as months, SUM(total_cost) as capital FROM sale
                                WHERE DATE_FORMAT(sale_date, '%Y')='".(int)$lastYear."' AND
                                DATE_FORMAT(sale_date, '%c') = '".$i."' 
                                GROUP BY DATE_FORMAT(sale_date, '%c')
                                ORDER BY months ASC");
            
            if(mysqli_num_rows ( $result )==0){
                if($lastYearCapital==""){
                    $lastYearCapital="0";
                }
                else{
                    $lastYearCapital=$lastYearCapital.",0";
                }
            }
            else{
                while($row = mysqli_fetch_array($result)){
                    if($lastYearCapital==""){
                        $lastYearCapital="".$row['capital']."";
                    }
                    else{
                        $lastYearCapital=$lastYearCapital.",".$row['capital'];
                    }
                    
                    break;
                }
            }
            
        }
        
        //echo "<script>alert('".$currentYearQuantity."')</script>";
        $lastYearCapital = explode(",",$lastYearCapital);

        //END LAST YEAR CAPITAL SALE GRAPH////////////////////////////////////////////////////////////////////////////////
        

        //CURRENT MONTH SALE GRAPH////////////////////////////////////////////////////////////////////////////////////////
        
        $currentMonthFirstDay = date("Y-m-d",strtotime('first day of this month'));
        $today = date("Y-m-d");
        
        $currentMonthArray="";
        $currentMonthQuantity="";
        
        $tempDate=$currentMonthFirstDay;
        while($tempDate<=$today){
            
            
            if($currentMonthArray==""){
                $currentMonthArray = "".$tempDate."";
            }
            else{
                $currentMonthArray = $currentMonthArray.",".$tempDate;
            }
                
                
            $tempDate = date('Y-m-d',strtotime("+1 day", strtotime($tempDate)));
        }
        
        //echo "<script>alert('".$currentMonthArray."')</script>";
        $currentMonthArray = explode(",",$currentMonthArray);
        
        foreach ($currentMonthArray as $value) {
            //echo "alert('".$value."');";
            
            $result = mysqli_query($con,"SELECT sale.sale_date, SUM(sale_products.quantity) as quantity FROM sale, sale_products
                                        WHERE sale.sale_id=sale_products.sale_id AND 
                                        sale.sale_date='".date('Y-m-d',strtotime($value))."'
                                        GROUP BY sale.sale_date");
            
            if(mysqli_num_rows ( $result )==0){
                
                if($currentMonthQuantity==""){
                    $currentMonthQuantity="0";
                }
                else{
                    $currentMonthQuantity=$currentMonthQuantity.",0";
                }
            }
            else{
                while($row = mysqli_fetch_array($result)){
                
                if($currentMonthQuantity==""){
                    $currentMonthQuantity="".$row['quantity']."";
                }
                else{
                    $currentMonthQuantity=$currentMonthQuantity.",".$row['quantity'];
                }
                
                break;
            }
            }
            
            
        }
        
        $currentMonthQuantity = explode(",", $currentMonthQuantity);
        

        //END CURRENT MONTH SALE GRAPH////////////////////////////////////////////////////////////////////////////////////
        
        
        
        //LAST MONTH SALE GRAPH////////////////////////////////////////////////////////////////////////////////////////
        
        $lastMonthFirstDay = date("Y-m-d",strtotime('first day of last month'));
        $lastMonthLastDay = date("Y-m-d",strtotime('last day of last month'));
        
        $lastMonthArray="";
        $lastMonthQuantity="";
        
        $tempDate=$lastMonthFirstDay;
        while($tempDate<=$lastMonthLastDay){
            
            
            if($lastMonthArray==""){
                $lastMonthArray = "".$tempDate."";
            }
            else{
                $lastMonthArray = $lastMonthArray.",".$tempDate;
            }
                
                
            $tempDate = date('Y-m-d',strtotime("+1 day", strtotime($tempDate)));
        }
        
        //echo "<script>alert('".$currentMonthArray."')</script>";
        $lastMonthArray = explode(",",$lastMonthArray);
        
        foreach ($lastMonthArray as $value) {
            //echo "alert('".$value."');";
            
            $result = mysqli_query($con,"SELECT sale.sale_date, SUM(sale_products.quantity) as quantity FROM sale, sale_products
                                        WHERE sale.sale_id=sale_products.sale_id AND 
                                        sale.sale_date='".date('Y-m-d',strtotime($value))."'
                                        GROUP BY sale.sale_date");
            
            if(mysqli_num_rows ( $result )==0){
                
                if($lastMonthQuantity==""){
                    $lastMonthQuantity="0";
                }
                else{
                    $lastMonthQuantity=$lastMonthQuantity.",0";
                }
            }
            else{
                while($row = mysqli_fetch_array($result)){
                
                if($lastMonthQuantity==""){
                    $lastMonthQuantity="".$row['quantity']."";
                }
                else{
                    $lastMonthQuantity=$lastMonthQuantity.",".$row['quantity'];
                }
                
                break;
            }
            }
            
            
        }
        
        $lastMonthQuantity = explode(",", $lastMonthQuantity);
        

        //END LAST MONTH SALE GRAPH////////////////////////////////////////////////////////////////////////////////////
        
        
        
        ///////////////////////////DESIGNATION GRAPH/////////////////////////////////////////////////////////////////////
        
        $designationArray = "";
        
        $result = mysqli_query($con,"SELECT * FROM designation ORDER BY designation_name ASC");
        while($row = mysqli_fetch_array($result)){
           if($designationArray == "")
                   $designationArray="'".$row['designation_name']."'";
           else
               $designationArray=$designationArray.",'".$row['designation_name']."'";
        }
        
        $designationArrayMain = explode(",",$designationArray);
        
        $designationUserNumber = "";
        
        foreach($designationArrayMain as $value){
            
            $result = mysqli_query($con,"SELECT COUNT(*) as count FROM user WHERE designation_name=".$value." GROUP BY designation_name");
            
            if(mysqli_num_rows ( $result )==0){
                
                if($designationUserNumber==""){
                    $designationUserNumber="'0'";
                }
                else{
                    $designationUserNumber=$designationUserNumber.",'0'";
                }
            }
            else{
                while($row = mysqli_fetch_array($result)){
                   if($designationUserNumber == "")
                           $designationUserNumber="'".$row['count']."'";
                   else
                       $designationUserNumber=$designationUserNumber.",'".$row['count']."'";
                   
                   break;
                }
            }
        }
        
        
        
        ////////////////////////END DESIGNATION GRAPH/////////////////////////////////////////////////////////////////////
        
        
        //////////////////////IN DEMAND PRODUCTS PIE CHART///////////////////////////////////////////////////////////////
        
        $remainingOtherProductNumber = (int)$soldProducts;
        
        $productNameString = "";
        $productSaleNumber = "";
        
        $result = mysqli_query($con,"SELECT products.product_name as products, COUNT(products.product_name) as count
                                    FROM products,products_manufactured 
                                    WHERE
                                    products.product_id=products_manufactured.product_id AND
                                    products_manufactured.status=1
                                    GROUP BY products
                                    ORDER BY count DESC, products ASC
                                    LIMIT 9");
        while($row = mysqli_fetch_array($result)){
            if($productNameString == "")
                $productNameString="'".$row['products']."'";
            else
               $productNameString=$productNameString.",'".$row['products']."'";
            
            if($productSaleNumber == "")
                $productSaleNumber="'".$row['count']."'";
            else
               $productSaleNumber=$productSaleNumber.",'".$row['count']."'";
            
            $remainingOtherProductNumber = $remainingOtherProductNumber - ((int)$row['count']);
           
        }
        
        $productNameString = $productNameString.",'Other'";
        $productSaleNumber = $productSaleNumber.",'".$remainingOtherProductNumber."'";
        
        //////////////////////END IN DEMAND PRODUCTS PIE CHART///////////////////////////////////////////////////////////////
        
        
        //////////////////////PRODUCT CATEGORYWISE SALE DONUT CHART///////////////////////////////////////////////////////////////
        
        
        $productsCategoryString = "";
        
        $result = mysqli_query($con,"SELECT * FROM product_category WHERE active=1 ORDER BY category_name ASC");
        while($row = mysqli_fetch_array($result)){
           if($productsCategoryString == "")
                   $productsCategoryString="'".$row['category_name']."'";
           else
               $productsCategoryString=$productsCategoryString.",'".$row['category_name']."'";
        }
        
        $productCategorywiseSale = "";
        
        $productCategoryArray = explode(",",$productsCategoryString);
        foreach($productCategoryArray as $value){
            
            $result = mysqli_query($con,"SELECT product_category.category_name as category, SUM(sale_products.quantity) as count
                                        FROM product_category,products,sale_products
                                        WHERE
                                        product_category.product_category_id=products.product_category_id AND
                                        products.product_id=sale_products.product_id AND 
                                        product_category.category_name = ".$value."
                                        GROUP BY category");
            
            if(mysqli_num_rows ( $result )==0){
                
                if($productCategorywiseSale==""){
                    $productCategorywiseSale="'0'";
                }
                else{
                    $productCategorywiseSale=$productCategorywiseSale.",'0'";
                }
            }
            else{
                while($row = mysqli_fetch_array($result)){
                   if($productCategorywiseSale == "")
                           $productCategorywiseSale="'".$row['count']."'";
                   else
                       $productCategorywiseSale=$productCategorywiseSale.",'".$row['count']."'";
                   
                   break;
                }
            }
        }
        
        
        
        
        //////////////////////END PRODUCT CATEGORYWISE SALE DONUT CHART///////////////////////////////////////////////////////////////
    ?>
        
        
        
        
        <div class="row">
            <section class="col-lg-7 connectedSortable">
                
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-chart-line mr-1"></i>
                      Sales (Quantity)
                    </h3>
                    <div class="card-tools">
                      <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                          <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Week</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#monthly-sales-chart" data-toggle="tab">Month</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#yearly-sales-chart" data-toggle="tab">Year</a>
                        </li>
                        <li>
                           <button style='margin-top:4px' type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                              </button> 
                        </li>
                        <li>
                            <button style='margin-top:4px'  type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                              </button>
                        </li>
                      </ul>
                    </div>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content p-0">
                      <!-- Morris chart - Sales -->
                      <div class="chart tab-pane active" id="revenue-chart"
                           style="position: relative; height: 320px;">
                          <canvas id="weekly-sales-chart-canvas" height="300" style="height: 300px;"></canvas>                         
                       </div>
                      <div class="chart tab-pane" id="monthly-sales-chart" style="position: relative; height: 320px;">
                        <canvas id="monthly-sales-chart-canvas" height="300" style="height: 300px;"></canvas>                         
                      </div>  
                      <div class="chart tab-pane" id="yearly-sales-chart" style="position: relative; height: 320px;">
                        <canvas id="yearly-sales-chart-canvas" height="300" style="height: 300px;"></canvas>                         
                      </div> 
                    </div>
                      <div style="margin-top:20px">
                          <span class="badge" style="background-color:rgba(60,141,188,0.9)">Current</span>
                          <span class="badge" style="margin-left:10px;background-color:rgba(210, 214, 222, 1)">Previous</span>
                      </div>  
                  </div><!-- /.card-body -->
                </div>
                
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-bar mr-1"></i>
                        Sales (Capital)
                    </h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex">
                      <p class="d-flex flex-column">
                          <?php
                            $currentYearGrandTotalCapital = 0;
                            
                            foreach($currentYearCapital as $value){
                                $currentYearGrandTotalCapital = $currentYearGrandTotalCapital + $value;
                            }
                            
                            $lastYearGrandTotalCapital = 0;
                            
                            foreach($lastYearCapital as $value){
                                $lastYearGrandTotalCapital = $lastYearGrandTotalCapital + $value;
                            }
                            
                            if($currentYearGrandTotalCapital>=$lastYearGrandTotalCapital){
                                $capitalPercentageChange = (($currentYearGrandTotalCapital-$lastYearGrandTotalCapital)*100)/$currentYearGrandTotalCapital;
                            }
                            else{
                                $capitalPercentageChange = (($lastYearGrandTotalCapital-$currentYearGrandTotalCapital)*100)/$lastYearGrandTotalCapital;
                            }
                            
                            if($currentMonthCapital>=$lastMonthCapital){
                                $capitalPercentageChangeMonthly = (($currentMonthCapital-$lastMonthCapital)*100)/$currentMonthCapital;
                            }
                            else{
                                $capitalPercentageChangeMonthly = (($lastMonthCapital-$currentMonthCapital)*100)/$lastMonthCapital;
                            }
                            
                            
                          ?>
                          <span class="text-bold text-lg">₹<?php echo number_format($lastYearGrandTotalCapital) ?></span>
                        <span>Total sales this year</span>
                      </p>
                      <p class="ml-auto d-flex flex-column text-right">
                          <?php
                            if($currentYearGrandTotalCapital>=$lastYearGrandTotalCapital){
                                echo "<span class='text-success'>
                                  <i class='fas fa-arrow-up'></i> ".number_format($capitalPercentageChange,2)."%
                                </span>";
                            }
                            else{
                                echo "<span class='text-danger'>
                                  <i class='fas fa-arrow-down'></i> ".number_format($capitalPercentageChange,2)."%
                                </span>";
                            }
                          ?>
                        
                        <span class="text-muted">Since last year</span>
                        <br>
                        <?php
                            if($currentMonthCapital>=$lastMonthCapital){
                                echo "<span class='text-success'>
                                  <i class='fas fa-arrow-up'></i> ".number_format($capitalPercentageChangeMonthly,2)."%
                                </span>";
                            }
                            else{
                                echo "<span class='text-danger'>
                                  <i class='fas fa-arrow-down'></i> ".number_format($capitalPercentageChangeMonthly,2)."%
                                </span>";
                            }
                          ?>
                        
                        <span class="text-muted">Since last month</span>
                        
                      </p>
                    </div>
                    <!-- /.d-flex -->

                    <div class="position-relative mb-4">
                      <canvas id="sales-chart" height="200"></canvas>
                    </div>

                    <div class="d-flex flex-row justify-content-end">
                      <span class="mr-2">
                        <i class="fas fa-square text-primary"></i> This year (<?php echo $currentYear ?>)
                      </span>

                      <span>
                        <i class="fas fa-square text-gray"></i> Last year (<?php echo $lastYear ?>)
                      </span>
                    </div>
                  </div>
                </div> 
                
              <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        In-demand Products
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                    
                    
                </div>
                  
                <div class="card-body">
                    <canvas id="pieChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                </div>  
            </div>
                
                
            </section>
            
            <section class="col-lg-5 connectedSortable">
                
                <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-shopping-cart mr-1"></i>
                    Recently Added Products</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                    
                    <?php
                        $result = mysqli_query($con,"SELECT * FROM products ORDER BY product_id DESC LIMIT 4");
                        
                        while($row = mysqli_fetch_array($result)){
                            echo "<li class='item'>
                                    <div class='product-img'>
                                        <img style='width:70px;height:70px' src='../dashboard_assets/dist/product_pic/".$row['product_pic']."' alt='Product Image'>
                                    </div>
                                    <div class='product-info'>
                                      <span class='product-title text-info'>".$row['product_name']."
                                        <span class='badge badge-warning float-right'>₹".$row['unit_cost']."</span></span>
                                      <span class='product-description'>
                                        ".$row['mini_description']." 
                                      </span>
                                    </div>
                                  </li>";
                        }
                    ?>
                  
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                  <a href="products.php" class="uppercase">View All Products</a>
              </div>
              <!-- /.card-footer -->
            </div>
            
                
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-bar mr-1"></i>
                    Active Users
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 384px; height: 383px; max-height: 383px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>   
                
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                    Product-Categorywise Sale
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
              </div>
                
            </div>
                
            </section>
        </div>
        
        
        </div>
        
        

            
    </section>

  </div>
  <!-- /.content-wrapper -->
  
  
  
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="#">Corporate <b>+</b></a>.</strong>
     All rights reserved.
    
  </footer>

  
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../dashboard_assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../dashboard_assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 4 -->
<script src="../dashboard_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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

<script src="../dashboard_assets/dist/js/adminlte.js"></script>

<script src="../dashboard_assets/dist/js/pages/dashboard.js"></script>


<script src="../dashboard_assets/dist/js/demo.js"></script>


 <script type="text/javascript">
     //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
</script> 

 <script type="text/javascript">
     /* Chart.js Charts */
  // Sales chart
  var salesChartCanvas = document.getElementById('weekly-sales-chart-canvas').getContext('2d');
  //$('#revenue-chart').get(0).getContext('2d');

  var salesChartData = {
    labels  : ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
    datasets: [
      {
        label               : 'Current Week',
        backgroundColor     : 'rgba(60,141,188,0.9)',
        borderColor         : 'rgba(60,141,188,0.8)',
        pointRadius          : 3,
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : [<?php
                                  foreach ($currentWeekQuantityArray as $key => $value) {
                                    if($key==0){
                                        echo (int)$value;
                                    }
                                    else{
                                        echo ",".(int)$value;
                                    }
                                }  
                                ?>]
      },
      {
        label               : 'Last Week',
        backgroundColor     : 'rgba(210, 214, 222, 1)',
        borderColor         : 'rgba(210, 214, 222, 1)',
        pointRadius         : 3,
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : [<?php
                                  foreach ($lastWeekQuantityArray as $key => $value) {
                                    if($key==0){
                                        echo (int)$value;
                                    }
                                    else{
                                        echo ",".(int)$value;
                                    }
                                }  
                                ?>]
      },
    ]
  }

  var salesChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines : {
          display : false,
        },
        scaleLabel :{
            
            display: true,
            labelString: 'Days',
            fontStyle: 'bold'
        }
      }],
      yAxes: [{
        gridLines : {
          display : false,
        },
        scaleLabel :{
            
            display: true,
            labelString: 'Quantity',
            fontStyle: 'bold'
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  var salesChart = new Chart(salesChartCanvas, { 
      type: 'line', 
      data: salesChartData, 
      options: salesChartOptions
    }
  )
  
  
  ////////MONTHLY SALES GRAPH////////////////////////////////////////////////////////////////////////////////////////////
  
  var monthlySalesChartCanvas = document.getElementById('monthly-sales-chart-canvas').getContext('2d');

  var monthlySalesChartData = {
    labels  : [<?php
                for($i=1;$i<=31;$i++){
                    if($i==1)
                        echo $i;
                    else
                        echo ",".$i;
                }
                ?>],
    datasets: [
      {
        label               : 'Current Month (<?php echo date("M Y") ?>)',
        backgroundColor     : 'rgba(60,141,188,0.9)',
        borderColor         : 'rgba(60,141,188,0.8)',
        pointRadius          : 3,
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : [<?php
                                  foreach ($currentMonthQuantity as $key => $value) {
                                    if($key==0){
                                        echo (int)$value;
                                    }
                                    else{
                                        echo ",".(int)$value;
                                    }
                                }  
                                ?>]
      },
      {
        label               : 'Last Month (<?php echo date("M Y", strtotime("first day of last month")) ?>)',
        backgroundColor     : 'rgba(210, 214, 222, 1)',
        borderColor         : 'rgba(210, 214, 222, 1)',
        pointRadius         : 3,
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : [<?php
                                  foreach ($lastMonthQuantity as $key => $value) {
                                    if($key==0){
                                        echo (int)$value;
                                    }
                                    else{
                                        echo ",".(int)$value;
                                    }
                                }  
                                ?>]
      },
    ]
  }

  var monthlySalesChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
              
        gridLines : {
          display : false,
        },
        scaleLabel :{
            
            display: true,
            labelString: 'Dates',
            fontStyle: 'bold'
        }
      }],
      yAxes: [{
        gridLines : {
          display : false,
        },
        scaleLabel :{
            
            display: true,
            labelString: 'Quantity',
            fontStyle: 'bold'
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  var monthlySalesChart = new Chart(monthlySalesChartCanvas, { 
      type: 'line', 
      data: monthlySalesChartData, 
      options: monthlySalesChartOptions
    }
  )
  
  ////////END MONTHLY SALES GRAPH////////////////////////////////////////////////////////////////////////////////////////
  
  
  ////////YEARLY SALES GRAPH////////////////////////////////////////////////////////////////////////////////////////////
  
  
  var yearlySalesChartCanvas = document.getElementById('yearly-sales-chart-canvas').getContext('2d');

  var yearlySalesChartData = {
    labels  : ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
    datasets: [
      {
        label               : 'Current Year (<?php echo (int)$currentYear ?>)',
        backgroundColor     : 'rgba(60,141,188,0.9)',
        borderColor         : 'rgba(60,141,188,0.8)',
        pointRadius          : 3,
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : [<?php
                                  foreach ($currentYearQuantity as $key => $value) {
                                    if($key==0){
                                        echo (int)$value;
                                    }
                                    else{
                                        echo ",".(int)$value;
                                    }
                                }  
                                ?>]
      },
      {
        label               : 'Last Year (<?php echo (int)$lastYear ?>)',
        backgroundColor     : 'rgba(210, 214, 222, 1)',
        borderColor         : 'rgba(210, 214, 222, 1)',
        pointRadius         : 3,
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : [<?php
                                  foreach ($lastYearQuantity as $key => $value) {
                                    if($key==0){
                                        echo (int)$value;
                                    }
                                    else{
                                        echo ",".(int)$value;
                                    }
                                }  
                                ?>]
      },
    ]
  }

  var yearlySalesChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines : {
          display : false,
        },
        scaleLabel :{
            
            display: true,
            labelString: 'Months',
            fontStyle: 'bold'
        }
      }],
      yAxes: [{
        gridLines : {
          display : false,
        },
        scaleLabel :{
            
            display: true,
            labelString: 'Quantity',
            fontStyle: 'bold'
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  var yearlySalesChart = new Chart(yearlySalesChartCanvas, { 
      type: 'line', 
      data: yearlySalesChartData, 
      options: yearlySalesChartOptions
    }
  )
  
  
  ////////END YEARLY SALES GRAPH////////////////////////////////////////////////////////////////////////////////////////

var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true


var $salesChart = $('#sales-chart')
  var salesChart  = new Chart($salesChart, {
    type   : 'bar',
    data   : {
      labels  : ['JAN','FEB','MAR','APR','MAY','JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor    : '#007bff',
          data           : [<?php foreach ($currentYearCapital as $key => $value) {
                                    if($key==0){
                                        echo (int)$value;
                                    }
                                    else{
                                        echo ",".(int)$value;
                                    }
                                }   ?>]
        },
        {
          backgroundColor: '#ced4da',
          borderColor    : '#ced4da',
          data           : [<?php foreach ($lastYearCapital as $key => $value) {
                                    if($key==0){
                                        echo (int)$value;
                                    }
                                    else{
                                        echo ",".(int)$value;
                                    }
                                }   ?>]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value, index, values) {
              if (value >= 1000) {
                value /= 1000
                value += 'K'
              }
              return '₹' + value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })



    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    
    var barChartData = {
        labels  : [<?php 
                    echo $designationArray;
                  ?>],
          datasets: [
            {
              label               : 'Users',
              backgroundColor     : 'rgba(60,141,188,0.9)',
              borderColor         : 'rgba(60,141,188,0.8)',
              pointRadius          : false,
              pointColor          : '#3b8bba',
              pointStrokeColor    : 'rgba(60,141,188,1)',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data                : [<?php echo $designationUserNumber ?>]
            }
          ]
    }
    
    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })
    
    
    
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = {
      labels: [<?php 
                echo $productNameString;
      ?>
      ],
      datasets: [
        {
          data: [<?php 
                echo $productSaleNumber;
      ?>],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#CD8500', '#808000', '#5DFC0A', '#EE00EE', '#000', '#d2d6de'],
        }
      ]
    };
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })
    
    
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [<?php echo $productsCategoryString
      ?>],
      datasets: [
        {
          data: [<?php echo $productCategorywiseSale ?>],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#CD8500', '#808000', '#5DFC0A', '#EE00EE', '#000', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions      
    })
    
    
</script> 

<?php
    $result = mysqli_query($con,"SELECT * FROM to_do WHERE user_id=".(int)$userId);
    
    while($row = mysqli_fetch_array($result)){
        echo "<script type='text/javascript'>
                $('#timepicker".$row['to_do_id']."').datetimepicker({
                  format: 'LT'
                })
            </script>";
    }
?>

    
</body>
</html>
