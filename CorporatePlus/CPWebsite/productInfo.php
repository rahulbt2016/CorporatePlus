<?php

  session_start();
  
  //unset($_SESSION['productIdSite']);
  unset($_SESSION['categoryIdSite']);
  unset($_SESSION['industryIdSite']);
  
  if(!isset($_SESSION['productIdSite']))
    header("Location: index.php");
  
  $productId = $_SESSION['productIdSite'];
  

  $con=mysqli_connect('localhost','root','','corporateplus');

  $query="SELECT * FROM products WHERE product_id=".(int)$productId;

  $result = mysqli_query($con,$query);
  
  while($row=mysqli_fetch_array($result)){

        $productId = $row['product_id'];
        $productCode = $row['product_code'];
        $productName = $row['product_name'];
        $productImgName = $row['product_pic'];
        $productDescription = $row['mini_description'];
        $productDocumentationFileName = $row['description_pdf'];
        $productCategory = $row['product_category_id'];
        
        break;
        
  }






?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Corporate Plus</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <script type="text/javascript" src="jquery_main/jquery.min.js"></script>
  <script type="text/javascript" src="control/control.js"></script>

  <style>
        
       
/*To hide up down button in input type number*/
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;    
    }
        
  </style> 



<!-- Favicons -->

  <link href="assets/img/demo_icon.png" rel="icon">
  

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
   <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  
  <link href="assets/css/style.css" rel="stylesheet">  

  <link rel="stylesheet" href="assets/vendor/daterangepicker/daterangepicker.css">
  
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="icofont-envelope"></i><a href="mailto:contact@example.com">corporate.plus.erp@gmail.com</a>
        <i class="icofont-phone"></i> +91 99909 99090
      </div>
      <div class="social-links float-right">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </section>

    <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href="index.php"><span>Corporate Plus</span></a></h1>
      </div>

      <nav class="nav-menu float-right d-none d-lg-block"> <!-- hide elements only on sm and display on large(lg) screens-->
        <ul>
            <li class="active"><a href="index.php#header">Home</a></li>
          <li><a href="index.php#about">About Us</a></li>
          <li><a href="index.php#services">Services</a></li>
          <li class="drop-down"><a href="products.php">Products</a>
            <?php 

              $con=mysqli_connect('localhost','root','','corporateplus');

              $query="SELECT * FROM product_category WHERE active=1";

              $result = mysqli_query($con,$query);
              echo '<ul>';
              while($row=mysqli_fetch_array($result)){
              
                echo "<li><a href='#' class='link-to-product-category'>".$row['category_name']."</a><input type='text' hidden value='".$row['product_category_id']."' ></li>";
              
            }
              echo '</ul>';
            ?>
          </li>
          <li><a href="index.php#portfolio">Portfolio</a></li>
          
          <li class="drop-down"><a href="industries.php">Industries</a>
            <?php 

              $con=mysqli_connect('localhost','root','','corporateplus');

              $query="SELECT * FROM industrial_applications WHERE active=1";

              $result = mysqli_query($con,$query);
              echo '<ul>';
              while($row=mysqli_fetch_array($result)){
              
                echo "<li><a href='#' class='link-to-industry-category'>".$row['industry_name']."</a><input type='text' hidden value='".$row['industrial_application_id']."' ></li>";
              
              }
              echo '</ul>';
            ?>
          </li> 
          
          <li><a href="index.php#contact">Contact Us</a></li>
          <li><a href="applyNow.php">Apply Now</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">
    <section id="about" class="about">
      <div class="container">

        <div class="row no-gutters">
          <div class="col-lg-6">
              <img src='../dashboard_assets/dist/product_pic/<?php echo $productImgName ?>' style='height:400px;width:500px' class="img-fluid" alt="">
            
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

            <div class="section-title" style='height: auto;'>
              <h2><?php echo $productName ?></h2>
              <p><?php echo $productDescription ?></p>

            </div>
            
            <div class="product-description">
              <?php
              echo '<a href="#" class="shipping product-documentation"><div> 
              <div class="icon"><i class="bx bx-file"></i>&nbsp;&nbsp;Documentation</div></div></a><input type="text" hidden value='.$productId.'>';?>
              <?php
              echo "<a href='#' data-toggle='modal' data-target='#modal-primary-30' class='shipping'><div>
              <div class='icon'><i class='bx bx-cog'></i>&nbsp;&nbsp;Product Inquiry</div></div></a>";

              echo "<div class='modal fade' id='modal-primary-30'>
                                <div class='modal-dialog modal-lg'>
                                    
                                    <div class='modal-content bg-light'>
                                        <div class='modal-header'>
                                            <h4 class='modal-title'>Product Inquiry</h4>
                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span></button>
                                        </div>
                                    <div class='modal-body'>                                                        
                                        <div class = 'row'>

                                        <div class='form-group col-12'>
                                          
                                          <input type='text' name='name' class='form-control validate-input1'  id='inqperson-name' placeholder='Name'>
                                          <span  class='invalid-feedback'>This field can't be empty</span>
                                        </div>


                                        <div class='form-group col-12'>
                                          
                                          <input type='text' name='email' class='form-control validate-input1'  id='inqperson-email' placeholder='Email'>
                                          <span  class='invalid-feedback'>This field can't be empty</span>
                                        </div>

                                        <div class='form-group col-12'>
                                          
                                          <input type='number' name='number' class='form-control validate-input1'  id='inqperson-number' placeholder='Mobile Number'>
                                          <span  class='invalid-feedback'>This field can't be empty</span>
                                        </div>"; 
                                        
                                        $tableName = "web_inquiry";
                                        $columnName = "web_inquiry_reg_num";
                                        $prefix = "WINQ";
                                        $prefixLength = strlen($prefix);
                                        $numbersLength = 5;

                                        $result = mysqli_query($con,"SELECT ".$columnName." from ".$tableName);
                                        while($row = mysqli_fetch_array($result)){
                                            $lastID = $row[$columnName];
                                        }

                                        if(isset($lastID)){
                                            $newID = substr($lastID,$prefixLength);

                                            $newID = $newID+1;

                                            while(strlen($newID)!=$numbersLength){
                                                $newID="0".$newID;
                                            }

                                            $newID = $prefix.$newID;
                                        }
                                        else{
                                            $newID = 1;

                                            while(strlen($newID)!=$numbersLength){
                                                $newID="0".$newID;
                                            }

                                            $newID = $prefix.$newID;
                                        }

                                   echo"<div class='form-group col-12'>
                                          
                                          <input type='text' hidden readonly value='".$newID."' class='form-control'  id='winq-reg-num'>
                                        </div>";
                                        
                                        
                                        
                                         
                                        echo'<div class="col-12">
                                          
                                          <input type="text" hidden class="form-control validate-input1"  id="inqproduct-id" value='.$productId.' >
                                          
                                        </div>';

                                        




                                        //echo "<div class='text-center'><button class='btn btn-primary' id='contact-us'> Send Message </button></div>";

                                        echo "<div class='form-group col-4'><button class='btn btn-primary btn-lg' id='web-inquiry'><span class='glyphicon glyphicon-off'></span>SEND</button></div>";




                                        
                        
                        echo"                </div>
                                       
                                    </div>
                                </div>
                                
                            </div>

                          </div>";
                        
                      


              ?>

              
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->
  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Corporate Plus</h3>
            <p>
              Evenue Gardens <br>
              India<br><br>
              <strong>Phone:</strong> +91 99909 99090<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#services">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#portfolio">Portfolio</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#contact">Contact Us</a></li>
<!--              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>-->
            </ul>
          </div>
            
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Products</h4>
            <ul>
              <?php 

              $con=mysqli_connect('localhost','root','','corporateplus');

              $query="SELECT * FROM product_category WHERE active=1";

              $result = mysqli_query($con,$query);
              while($row=mysqli_fetch_array($result)){
              
                echo "<li><i class='bx bx-chevron-right'></i><a href='index.php#' class='link-to-product-category'>".$row['category_name']."</a><input type='text' hidden value='".$row['product_category_id']."' ></li>";
              
              }
            ?>  
            </ul>
          </div>  

          <div class="col-lg-4 col-md-6 footer-links">
              <h4>Our Products' Industrial Applications</h4>
              <div class="row">
                  
                  <div class="col-lg-6 col-md-6 footer-links">
                      <ul>
                            <?php 

                              $con=mysqli_connect('localhost','root','','corporateplus');

                              $query="SELECT COUNT(*) FROM industrial_applications WHERE active=1";
                              $result = mysqli_query($con,$query);
                              while($row = mysqli_fetch_array($result)){
                                  $count = $row['COUNT(*)'];
                                  break;
                              }
                              
                              $query="SELECT * FROM industrial_applications WHERE active=1 LIMIT ".(int)($count%2==0 ? ($count/2) : ($count/2)+1);
                              $result = mysqli_query($con,$query);
                              while($row=mysqli_fetch_array($result)){

                                echo "<li><i class='bx bx-chevron-right'></i><a href='#' class='link-to-industry-category'>".$row['industry_name']."</a><input type='text' hidden value='".$row['industrial_application_id']."' ></li>";

                              }
                            ?> 
                        </ul>
                  </div>
                  
                  <div class="col-lg-6 col-md-6 footer-links">
                      <ul>
                          <?php
                          
                              $query="SELECT * FROM industrial_applications WHERE active=1 LIMIT ".(int)$count." OFFSET ".(int)($count%2==0 ? ($count/2) : ($count/2)+1);
                              $result = mysqli_query($con,$query);
                              while($row=mysqli_fetch_array($result)){

                                echo "<li><i class='bx bx-chevron-right'></i><a href='#' class='link-to-industry-category'>".$row['industry_name']."</a><input type='text' hidden value='".$row['industrial_application_id']."' ></li>";

                              }
                            ?> 
                          
                        </ul>
                  </div>
                  
              </div>
            
            
          </div>  

         
          
          

                

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Corporate Plus</span></strong>. All Rights Reserved
      </div>
      
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
  <script src="assets/js/main.js"></script>
  <script type="text/javascript">
    $(function () {
      //Datemask dd/mm/yyyy
        $('#datemask').inputmask('yyyy/mm/dd', { 'placeholder': 'yyyy/mm/dd' })

      //Date range picker
        $('#reservation').daterangepicker()
      })
  </script>


</body>

</html>
