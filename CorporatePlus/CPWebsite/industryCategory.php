<?php
  

  session_start();

  if(!isset($_SESSION['categoryIdSite']))
    header("Location: index.php");
  
  $categoryId = $_SESSION['industryIdSite'];
  

  $con=mysqli_connect('localhost','root','','corporateplus');

  $query="SELECT * FROM industrial_applications WHERE industrial_application_id=".(int)$categoryId;

  $result = mysqli_query($con,$query);
  
  while($row=mysqli_fetch_array($result)){
        
        $industryName = $row['industry_name'];

        $description = $row['industry_description'];
        
        $imageName = $row['industry_image'];

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


  
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="icofont-envelope"></i><a href="mailto:contact@example.com">contact@example.com</a>
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



    <div class="banner service-banner spacetop">
                <div class="banner-image-plane parallax">
                  <div class="container">
                    <div class="logo float-left mt-5 col-xs-12">
                      <h1 class="text-light"><span><b>INDUSTRIAL APPLICATIONS</b></span></a></h1>
                    </div>
                  </div>
                 </div>
                
    </div>

    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2><?php echo $industryName ?></h2>
        </div>

        <div class="row  d-flex align-items-stretch">
           
          <div class="col-lg-6 faq-item" data-aos="fade-up">
                <img src='../dashboard_assets/dist/product_pic/<?php echo $imageName ?>' class='img-fluid industryinfo' alt='' style='height:300px;width:400px'>
          </div>   
            
            
          <div class="col-lg-6 faq-item" data-aos="fade-up">
            
            <p align="justify">
                <?php echo $description ?>
            </p><br>

            

              


            
          </div>
             

          
        </div>

      </div>
    </section>
    
      
    <section id="portfolio" class="portfolio section-bg">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="section-title">
          <h2><?php echo $industryName." Related Products" ?></h2>
        </div>

        <div class="row portfolio-container">

          <?php 
                  
                $con = mysqli_connect('localhost','root','','corporateplus');
                
                $result=mysqli_query($con,"SELECT product_industrial_application.product_id,products.product_name,products.product_pic,product_category.category_name
                                            FROM
                                            products,product_industrial_application,product_category
                                            WHERE
                                            products.product_id=product_industrial_application.product_id AND
                                            products.product_category_id=product_category.product_category_id AND
                                            product_industrial_application.industrial_application_id=".$categoryId);

                while($row=mysqli_fetch_array($result))
                {

                echo "<div class='col-lg-4 col-md-6 portfolio-item filter-products'>";
                echo "<div class='portfolio-wrap'>";

              
                
                  echo "<img src='../dashboard_assets/dist/product_pic/".$row['product_pic']."' class='img-fluid' style='height:250px;width:350px' alt=''>";

                  
                  echo "<div class='portfolio-info'>
                    <h4>".$row['category_name']."</h4>
                    <p>".$row['product_name']."</p>
                    <div class='portfolio-links'>
                      <a href='../dashboard_assets/dist/product_pic/".$row['product_pic']."' data-gall='portfolioGallery' class='venobox' title='".$row['product_name']."'><i class='icofont-eye'></i></a>
                                            <a href='javascript:void(0)' title='View More' class='productinfo'><i class='icofont-external-link'></i><input hidden type='text' value='".$row['product_id']."'></a>
                      
                    </div>
                  </div>";
               

                echo "</div>";
                echo "</div>";

                }

              
            
          ?>
        </div>

      </div>
    </section>  
      

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

  
  <script src="assets/js/main.js"></script>

</body>

</html>



