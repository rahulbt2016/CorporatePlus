<?php
  session_start();
  
  unset($_SESSION['productIdSite']);
  unset($_SESSION['categoryIdSite']);
  unset($_SESSION['industryIdSite']);
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
          <li class="active"><a href="#header">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
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
          <li><a href="#portfolio">Portfolio</a></li>
          
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
          
          <li><a href="#contact">Contact Us</a></li>
          <li><a href="applyNow.php">Apply Now</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel"> <!--The Carousel plugin is a component for cycling through elements, like a carousel (slideshow).
      The data-ride="carousel" attribute tells Bootstrap to begin animating the carousel immediately when the page loads.
      -->

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url('assets/img/slide/slide-7.jpg');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animated fadeInDown">Welcome to <span>Corporate Plus</span></h2>
                <p class="animated fadeInUp">Providing Reliable and Eloquent Solutions.</p>
                <a href="#about" class="btn-get-started animated fadeInUp scrollto">Read More</a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url('assets/img/slide/slide-10.jpg');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animated fadeInDown">Commitment to Customer Service</h2>
                <p class="animated fadeInUp">Providing Reliable and Eloquent Solutions.</p>
                <a href="#about" class="btn-get-started animated fadeInUp scrollto">Read More</a>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url('assets/img/slide/slider-11.jpg');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animated fadeInDown">Engineering Quality</h2>
                <p class="animated fadeInUp">Providing Reliable and Eloquent Solutions.</p>
                <a href="#about" class="btn-get-started animated fadeInUp scrollto">Read More</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row no-gutters">
          <div class="col-lg-6 video-box">
            <img src="assets/img/machinery.jpg" class="img-fluid" alt="" height="600">
            <a href="https://www.youtube.com/watch?v=t0_JMBPOdLw" class="venobox play-btn" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

            <div class="section-title">
              <h2>About Us</h2>
              <p>The Company was established in the year 2020 with skilled workforce in the manufacturing of Industrial Geared motors and Reducers, Material Handling Equipment, Mining equipment, casting processes etc. It is one of the largest manufacturers of Material Handling Equipments and Industrial Gears in Asia. </p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100"> <!--aos is the animate on scroll library -->
              <div class="icon"><i class="bx bx-cog"></i></div>
              <h4 class="title"><a href="">Vision</a></h4>
              <p class="description">To Intensify the value and provide content to our customers by creating Global Companionship in various sectors of Industry.</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bx-rocket"></i></div>
              <h4 class="title"><a href="">Mission</a></h4>
              <p class="description">Our Mission is to "Forestall in Technical terms" by improvising our existing product ranges and continuosly making a smart investment in Research and Development area to serve new industries, applications and various other domains. </p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    

    <!-- ======= Counts Section ======= -->
    <section class="counts section-bg">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
            <div class="count-box">
              <i class="icofont-simple-smile" style="color: #20b38e;"></i>
              <span data-toggle="counter-up">
                  <?php
                    $result = mysqli_query($con,"SELECT COUNT(*) as count FROM sale");
                    while($row = mysqli_fetch_array($result)){
                        echo $row['count'];
                        break;
                    }
               ?>
              </span>
              <p>Happy Clients</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
            <div class="count-box">
              <i class="icofont-shopping-cart" style="color: #c042ff;"></i>
              <span data-toggle="counter-up">
                  <?php
                    $result = mysqli_query($con,"SELECT COUNT(*) as count FROM products");
                    while($row = mysqli_fetch_array($result)){
                        echo $row['count'];
                        break;
                    }
                  ?>
              </span>
              <p>Products</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
            <div class="count-box">
              <i class="icofont-live-support" style="color: #46d1ff;"></i>
              <span data-toggle="counter-up">24</span>
              <p>Hours Of Support</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
            <div class="count-box">
              <i class="icofont-users-alt-5" style="color: #ffb459;"></i>
              <span data-toggle="counter-up">
                  <?php
                    $result = mysqli_query($con,"SELECT COUNT(*) as count FROM user");
                    while($row = mysqli_fetch_array($result)){
                        echo $row['count'];
                        break;
                    }
                  ?>
              </span>
              <p>Hard Workers</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
            <div class="icon"><i class="icofont-gears"></i></div>
            <h4 class="title"><a href="">Gearboxes</a></h4>
            <p class="description"></p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="icofont-hammer-alt"></i></div>
            <h4 class="title"><a href="">Custom Built Gearboxes</a></h4>
            <p class="description"></p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="icofont-tools"></i></div>
            <h4 class="title"><a href="">Refurbishment of Gearboxes</a></h4>
            <p class="description"></p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
            <div class="icon"><i class="icofont-fix-tools"></i></div>
            <h4 class="title"><a href="">Repairing of Gearboxes</a></h4>
            <p class="description"></p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
            <div class="icon"><i class="icofont-tools-bag"></i></div>
            <h4 class="title"><a href="">Support for Machinery Equipment</a></h4>
            <p class="description"></p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
            <div class="icon"><i class="icofont-tools-alt-2"></i></div>
            <h4 class="title"><a href="">Service of Equipments</a></h4>
            <p class="description"></p>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Our Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title">
          <h2>Our Portfolio</h2>
          <p>Our business portfolio is a group of products, services, and business units that conform a given company and allows it to pursue its strategic goals.</p>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-products">Products</li>
              <li data-filter=".filter-services">Services</li>
              <li data-filter=".filter-industries">Industries</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

        
            
        
<!--        <div class="col-lg-4 col-md-6 portfolio-item ">
            <div class="portfolio-wrap">
              <a href="" class="venobox ">
                  
                  <img src="" class="img-fluid" alt="">
                  <span class="portfolio-info">
                        <h4></h4>
                        <p></p>
                  </span>
              </a>
            </div>
        </div>    -->
        
        <?php
            $result = mysqli_query($con,"SELECT products.product_name,products.product_pic,product_category.category_name FROM products,product_category
                                        WHERE products.product_category_id=product_category.product_category_id
                                        ORDER BY RAND()
                                        LIMIT 1");
            while($row = mysqli_fetch_array($result)){
                $productName1 = $row['product_name'];
                $productImageName = $row['product_pic'];
                $categoryName = $row['category_name'];
                
                break;
            }
        ?>
        <div class="col-lg-4 col-md-6 portfolio-item filter-products">
            <div class="portfolio-wrap">
                <img style="height:240px;width:350px" src="../dashboard_assets/dist/product_pic/<?php echo $productImageName; ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                    <h4><?php echo $productName1 ?></h4>
                    <p><?php echo $categoryName ?></p>
                <div class="portfolio-links">
                  <a href="../dashboard_assets/dist/product_pic/<?php echo $productImageName; ?>" data-gall="portfolioGallery" class="venobox" title="<?php echo $productName1 ?>"><i class="icofont-eye"></i></a>
<!--                  <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                -->
                </div>
              </div>
            </div>
          </div>

          


        <div class="col-lg-4 col-md-6 portfolio-item filter-services">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/services_1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Refurbish Gearboxes</h4>
                <p></p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/services_1.jpg" data-gall="portfolioGallery" class="venobox" title="Refurbish Gearboxes"><i class="icofont-eye"></i></a>
<!--                  <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                -->
                </div>
              </div>
            </div>
          </div>
            
              

          <?php
            $result = mysqli_query($con,"SELECT products.product_name,products.product_pic,product_category.category_name FROM products,product_category
                                        WHERE products.product_category_id=product_category.product_category_id AND
                                        products.product_name!='".$productName1."'
                                        ORDER BY RAND()
                                        LIMIT 1");
            while($row = mysqli_fetch_array($result)){
                $productName2 = $row['product_name'];
                $productImageName = $row['product_pic'];
                $categoryName = $row['category_name'];
                
                break;
            }
        ?>
        <div class="col-lg-4 col-md-6 portfolio-item filter-products">
            <div class="portfolio-wrap">
                <img style="height:240px;width:350px" src="../dashboard_assets/dist/product_pic/<?php echo $productImageName; ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                    <h4><?php echo $productName2 ?></h4>
                    <p><?php echo $categoryName ?></p>
                <div class="portfolio-links">
                  <a href="../dashboard_assets/dist/product_pic/<?php echo $productImageName; ?>" data-gall="portfolioGallery" class="venobox" title="<?php echo $productName2 ?>"><i class="icofont-eye"></i></a>
<!--                  <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                -->
                </div>
              </div>
            </div>
          </div>
            
            
           <?php
                
                $result = mysqli_query($con, "SELECT * FROM industrial_applications ORDER BY RAND() LIMIT 1");
                while($row = mysqli_fetch_array($result)){
                    $industryName1 = $row['industry_name'];
                    $industryImageName = $row['industry_image'];
                    
                    break;
                }
                
            
           ?> 

          <div class="col-lg-4 col-md-6 portfolio-item filter-industries">
            <div class="portfolio-wrap">
              <img style="height:240px;width:350px" src="../dashboard_assets/dist/product_pic/<?php echo $industryImageName ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><?php echo $industryName1 ?></h4>
                <p></p>
                <div class="portfolio-links">
                  <a href="../dashboard_assets/dist/product_pic/<?php echo $industryImageName ?>" data-gall="portfolioGallery" class="venobox" title="<?php echo $industryName1 ?>"><i class="icofont-eye"></i></a>
<!--                  <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                -->
                </div>
              </div>
            </div>
          </div>
            
            
             

          <div class="col-lg-4 col-md-6 portfolio-item filter-services">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/services_2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Gearbox Repair</h4>
                <p></p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/services_2.jpg" data-gall="portfolioGallery" class="venobox" title="Gearbox Repair"><i class="icofont-eye"></i></a>
<!--                  <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                -->
                </div>
              </div>
            </div>
          </div>
            
            
           

          <?php
            $result = mysqli_query($con,"SELECT products.product_name,products.product_pic,product_category.category_name FROM products,product_category
                                        WHERE products.product_category_id=product_category.product_category_id AND
                                        products.product_name!='".$productName1."' AND
                                        products.product_name!='".$productName2."'    
                                        ORDER BY RAND()
                                        LIMIT 1");
            while($row = mysqli_fetch_array($result)){
                $productName3 = $row['product_name'];
                $productImageName = $row['product_pic'];
                $categoryName = $row['category_name'];
                
                break;
            }
        ?>
        <div class="col-lg-4 col-md-6 portfolio-item filter-products">
            <div class="portfolio-wrap">
                <img style="height:240px;width:350px" src="../dashboard_assets/dist/product_pic/<?php echo $productImageName; ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                    <h4><?php echo $productName3 ?></h4>
                    <p><?php echo $categoryName ?></p>
                <div class="portfolio-links">
                  <a href="../dashboard_assets/dist/product_pic/<?php echo $productImageName; ?>" data-gall="portfolioGallery" class="venobox" title="<?php echo $productName3 ?>"><i class="icofont-eye"></i></a>
<!--                  <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                -->
                </div>
              </div>
            </div>
          </div>
            
            
            
           

          <?php
                
                $result = mysqli_query($con, "SELECT * FROM industrial_applications
                                            WHERE industry_name!='".$industryName1."'
                                            ORDER BY RAND() LIMIT 1");
                while($row = mysqli_fetch_array($result)){
                    $industryName2 = $row['industry_name'];
                    $industryImageName = $row['industry_image'];
                    
                    break;
                }
                
            
           ?> 

          <div class="col-lg-4 col-md-6 portfolio-item filter-industries">
            <div class="portfolio-wrap">
              <img style="height:240px;width:350px" src="../dashboard_assets/dist/product_pic/<?php echo $industryImageName ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><?php echo $industryName2 ?></h4>
                <p></p>
                <div class="portfolio-links">
                  <a href="../dashboard_assets/dist/product_pic/<?php echo $industryImageName ?>" data-gall="portfolioGallery" class="venobox" title="<?php echo $industryName2 ?>"><i class="icofont-eye"></i></a>
<!--                  <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                -->
                </div>
              </div>
            </div>
          </div>
            
            
           

        <?php
            $result = mysqli_query($con,"SELECT products.product_name,products.product_pic,product_category.category_name FROM products,product_category
                                        WHERE products.product_category_id=product_category.product_category_id AND
                                        products.product_name!='".$productName1."' AND
                                        products.product_name!='".$productName2."' AND
                                        products.product_name!='".$productName3."'    
                                        ORDER BY RAND()
                                        LIMIT 1");
            while($row = mysqli_fetch_array($result)){
                $productName4 = $row['product_name'];
                $productImageName = $row['product_pic'];
                $categoryName = $row['category_name'];
                
                break;
            }
        ?>
        <div class="col-lg-4 col-md-6 portfolio-item filter-products">
            <div class="portfolio-wrap">
                <img style="height:240px;width:350px" src="../dashboard_assets/dist/product_pic/<?php echo $productImageName; ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                    <h4><?php echo $productName4 ?></h4>
                    <p><?php echo $categoryName ?></p>
                <div class="portfolio-links">
                  <a href="../dashboard_assets/dist/product_pic/<?php echo $productImageName; ?>" data-gall="portfolioGallery" class="venobox" title="<?php echo $productName4 ?>"><i class="icofont-eye"></i></a>
<!--                  <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                -->
                </div>
              </div>
            </div>
          </div>
            
            
            


          
          <?php
                
                $result = mysqli_query($con, "SELECT * FROM industrial_applications
                                            WHERE industry_name!='".$industryName1."' AND
                                            industry_name!='".$industryName2."'    
                                            ORDER BY RAND() LIMIT 1");
                while($row = mysqli_fetch_array($result)){
                    $industryName3 = $row['industry_name'];
                    $industryImageName = $row['industry_image'];
                    
                    break;
                }
                
            
           ?> 

          <div class="col-lg-4 col-md-6 portfolio-item filter-industries">
            <div class="portfolio-wrap">
              <img style="height:240px;width:350px" src="../dashboard_assets/dist/product_pic/<?php echo $industryImageName ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><?php echo $industryName3 ?></h4>
                <p></p>
                <div class="portfolio-links">
                  <a href="../dashboard_assets/dist/product_pic/<?php echo $industryImageName ?>" data-gall="portfolioGallery" class="venobox" title="<?php echo $industryName3 ?>"><i class="icofont-eye"></i></a>
<!--                  <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                -->
                </div>
              </div>
            </div>
          </div>
            
         


        </div>

      </div>
    </section><!-- End Our Portfolio Section -->

    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Our Team</h2>
          
        </div>

        <div class="row">

          <div class="col-xl-4 col-lg-4 col-md-4" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="assets/img/team/harsh.jpeg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Harsh Patel</h4>
                <span>Chief Executive Officer</span>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-4 col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="pic"><img src="assets/img/team/rb.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Rahul Brahmbhatt</h4>
                <span>HR</span>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-4 col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="pic"><img src="assets/img/team/rt.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Rahul Tiwari</h4>
                <span>Manager</span>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          

        </div>

      </div>
    </section><!-- End Our Team Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
        </div>

        <div class="row  d-flex align-items-stretch">

          <div class="col-lg-6 faq-item" data-aos="fade-up">
            <h4>How can I inquire about any product or get information about the services at your company?</h4>
            <p>
              There are variety of products that our company sells but for inquiring about them,one can select their interested product category and can read it's description and their will be a button "Inquire" which will open up a form, after filling up the necessary details, that inquiry form will be submitted to the company and the authorized person will respond you regarding the same after going through it.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="100">
            <h4>What products,solutions and services does your company offer?</h4>
            <p>
                Our company focusses on offering variety of products from various categories like Energy Transmission, Machiery operating equipment, Coal Mining Application, Metal Mining Application, Construciton whereas the services includes Refurbishment of Gearboxes, Gearbox Repairing, Custom Built Gearbox etc. 
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="200">
            <h4>What Industries do you typically work in? Who are your typical customers?</h4>
            <p>
              It would be easier to tell you what industries we haven’t worked in! Our customers include heavy equipment manufacturers, general commercial businesses, and companies in the pneumatic, transportation, electric, oil, gas, and machine tool industries, among others. While our customers are spread throughout the India and around the world, they all have something in common: the need for high-quality products machined to print, on time, and within budget.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="300">
            <h4>What Raw Materials do you run?</h4>
            <p>
              We run a variety of materials including carbon alloys, aluminum, brass, stainless steel, high nickel alloys, titanium alloys, Gears-Steel Grade-20MnCr5, Gears-Steel Grade- SAE 8620, Gears-Steel Grade -SAE 1045, Shafts-Steel Grade-EN8D, Shifter Forks- EN8D and plastics. We can also help you choose the best material for your application. And, even if you’re considering a material other than those listed here, give us a call. Chances are, we can help!
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="400">
            <h4>Can you help with product's design or suggest cost-saving measures</h4>
            <p>
              Yes! Our team enjoys applying their production experience to new challenges. We can assist with designing your product, selecting the best raw materials, and choosing the most effective machining protocols and finishing steps. Keeping the part’s end use in mind, we can often find a minor design tweak or a change in material or tolerance that can reduce your product’s cost without any reduction in quality or performance.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="500">
            <h4>How do I contact you by e-mail/phone?</h4>
            <p>
              You can easily find our e-mail address and phone our contact us section. We’ve also included a brief and easy-to-use web form that you can use to request an inquiry regarding any product or service. However you choose to contact us, we look forward to hearing from you!
            </p>
          </div>

        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact Us</h2>
        </div>

        <div class="row">

          <div class="col-lg-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="info-box">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>16,Evenue Gardens,India</p>
            </div>
          </div>

          <div class="col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info-box">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>corporate.plus.erp@gmail.com</p>
            </div>
          </div>

          <div class="col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="info-box ">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>+91 99909 99090</p>
            </div>
          </div>

          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
            <form role="form">
            <div class="form-row">

                  <div class="col-lg-6 form-group">
                    
                    <input type="text" class="form-control validate-input1" name="name" id="contact-name" placeholder="Enter Name">
                    <span  class="invalid-feedback">Name field can't be empty</span>
                  </div>

                  <div class="col-lg-6 form-group">
                    
                    <input type="email" class="form-control validate-input1" name="email" id="contact-email" placeholder="Enter Email">
                    <span  class="invalid-feedback">Please enter a valid email address (eg: abc@xyz.com)</span>
                  </div>

            </div>

<!--                  <div class="form-group">
                    
                    <input type="text" class="form-control validate-input1" name="subject" id="contact-subject" placeholder="Enter the Subject">
                    <span  class="invalid-feedback">Subject field can't be empty</span>
                  </div>-->

                  <div class="form-group">
                    <textarea class="form-control validate-input1" name="message" rows="5" data-msg="Please write something for us" placeholder="Message" id="contact-message"></textarea>
                  <span class="invalid-feedback">Message field can't be empty</span>
                  </div>

                  <div class="text-center"><button class="btn btn-primary" id="contact-us"> Send Message </button></div>


        </form>


        </div>

      </div>

    </div>
    </section><!-- End Contact Us Section -->


  </main><!-- End #main -->

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
              <strong>Email:</strong> corporate.plus.erp@gmail.com<br>
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
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Portfolio</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact Us</a></li>
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
              
                echo "<li><i class='bx bx-chevron-right'></i><a href='#' class='link-to-product-category'>".$row['category_name']."</a><input type='text' hidden value='".$row['product_category_id']."' ></li>";
              
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

