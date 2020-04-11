<?php
  session_start();
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

  <!--<div class="parallax-container">
      <div class="parallax"><img src="assets/img/machinery.jpeg"></div>
  </div>-->

    <div class="banner service-banner spacetop">
                <div class="banner-image-apply parallax">
                  <div class="container">
                    <div class="logo float-left mt-5 col-xs-12">
                      <h1 class="text-light"><span><b>APPLY ONLINE</b></span></a></h1>
                    </div>
                  </div>
                 </div>
                
    </div>

    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2>We are looking for talented Workforce.</h2>
        </div>

        <div class="row  d-flex align-items-stretch">

          <div class="col-lg-12 faq-item" data-aos="fade-up">
            
            <p align="justify">
              For Applying at our company one needs to fill up the form which is present below and all the details are needed ot be filled as well the required document i.e the resume is also to be submitted which is for looking at other academic as well as personal details of the applicant, but he/she needs to carry all the required documents at the time of the personal interview for the verification purpose.</p></br>

              <p align="justify"> Our Company recruits the applicant by not only seeing their academic record but also the skills in various aspects which can benefit the company as well as the individual in future. Once the application is submitted online, the applicant will receive the e-mail and will be notified shortly for the personal interview dates. </p></br>

            

            
          </div>

          
        </div>

      </div>
    </section><!-- End Section -->

    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Please fill all the details</h2>
        </div>

          <div class="row">
            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
            <form role="form">
                <div class="form-row">

                      <div class="col-lg-2 form-group">

                        <label>Name :</label>
                        
                      </div>

                      <div class="col-lg-10 form-group">
                        
                        <input type="text" class="form-control validate-input1" name="fname" id="person-name" placeholder="Enter your name">
                        <span  class="invalid-feedback">Name field can't be empty.</span>
                      </div>

                      <div class="col-lg-2 form-group">

                        <label>Email :</label>
                        
                      </div>

                      <div class="col-lg-10 form-group">
                        
                        <input type="email" class="form-control validate-input1" name="email" id="person-email" placeholder="Enter Email">
                        <span  class="invalid-feedback">Please enter a valid email address (eg: abc@xyz.com)</span>
                      </div>

                      <div class="col-lg-2 form-group">

                        <label>Phone Number :</label>
                        
                      </div>

                      <div class="col-lg-10 form-group">
                        
                        <input type="number" class="form-control validate-input1" name="number" id="person-number" placeholder="Enter your phone number">
                        <span  class="invalid-feedback">Please enter a valid mobile number (10 digit)</span>
                      </div>

                      <div class="col-lg-12  form-group">

                        <label>Educational Qualification</label>
                        
                      </div>

                      
                      <div class="col-lg-2 form-group">

                        <label>SSC (10th) % :</label>
                        
                      </div>                      


                      <div class="col-lg-10 form-group">
                        
                        <input type="number" class="form-control validate-input1" name='percentage' id="person-ssc" placeholder="Enter 10th Standard Percentage">
                        <span  class="invalid-feedback">This field can't be empty</span>
                      </div>

                      <div class="col-lg-2 form-group">

                        <label>HSC (12th) % :</label>
                        
                      </div>                      


                      <div class="col-lg-10 form-group">
                        
                        <input type="number" class="form-control validate-input1" name='percentage' id="person-hsc" placeholder="Enter 12th Standard Percentage">
                        <span  class="invalid-feedback">This field can't be empty</span>
                      </div>

                      <div class="col-lg-2 form-group">

                        <label>Diploma % :</label>
                        
                      </div>                      


                      <div class="col-lg-10 form-group">
                        
                        <input type="text" class="form-control validate-input1" name='percentage' id="person-diploma" placeholder="Enter Diploma Percentage">
                        <span  class="invalid-feedback">This field can't be empty</span>
                      </div>

                      <div class="col-lg-2 form-group">

                        <label>Choose your highest qualification :</label>
                        
                      </div>                      


                      <div class="col-lg-10 form-group">
                        
                        <select class="form-control validate-input1" name='qualification' placeholder="Select your highest qualification" id="person-qualification">
                                      <option></option>
                                      <option>B.Tech</option>
                                      <option>M.Tech</option>
                                      <option>MBA</option>
                                      <option>MCA</option>
                                      <option>B.E</option>
                                      <option>M.E</option>
                                      
                          
                        </select>
                        <span  class="invalid-feedback">This field can't be empty</span>

                      </div>

                      <div class="col-lg-2 form-group">

                        <label>Choose your specialization :</label>
                        
                      </div>

                      <div class="col-lg-10 form-group">
                      <select class="form-control validate-input1" name='specialization' placeholder="Select your Specialization" id="person-specialization">
                                      <option></option>
                                      <option>Information Technology</option>
                                      <option>Computer Engineering</option>
                                      <option>Mechanical Engineering</option>
                                      <option>Electonics and Communication</option>
                                      <option>Electrical Engineering</option>
                                      <option>Marketing</option>
                                      <option>Accounts</option>
                                      <option>Finance</option>
                                      <option>Sales</option>
                                      <option>HR</option>
                                      
                          
                        </select>
                        <span  class="invalid-feedback">This field can't be empty</span>
                      </div>

                      <div class="col-lg-2 form-group">

                        <label>Interested Field :</label>
                        
                      </div>

                      <div class="col-lg-10 form-group">

                        <input type='text' class='form-control validate-input1' name='interest' id='person-interest' placeholder="Enter Area or Field of Interest">
                        <span  class="invalid-feedback">Interested Field can't be empty</span>
                      </div>


                      <div class="col-lg-2 form-group">

                        <label>Work Experience :</label>
                        
                      </div>

                      <div class="col-lg-10 form-group">

                        <input type="text" class="form-control validate-input1" name='experience' id="person-experience" placeholder="Enter Work Experience in years">
                        <span  class="invalid-feedback">Work Experience can't be empty</span>

                      </div>

                      <div class="col-lg-2 form-group">

                        <label for="exampleInputAddDoc">Resume :</label>
                        
                      </div>

                      <div class="col-lg-10 form-group">

                        <div class="input-group"> 
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" id="additional-doc">
                              <label id='file-name-label' class="custom-file-label" for="exampleInputAddDoc">Choose file</label>
                          </div>
                        </div>


                        
                        
                      </div>
                    

                </div>
                <br>
                <div class="text-center"><button class="btn btn-primary" id="apply-now"> Apply </button></div>
            </form>
            </div>
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
  <script>
    $("#additional-doc").change(function(){
        $("#file-name-label").html($("#additional-doc").val().replace("C:\\fakepath\\",""));
    });  
  </script>

</body>

</html>

