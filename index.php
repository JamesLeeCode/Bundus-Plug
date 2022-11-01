<?php

    session_start();

    // Order of these files is IMPORTANT
    include "db.php";
    include "retrieve.php";
    include "functions.php";
    include "logic.php";

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="fonts/icomoon/style.css" />
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="css/tiny-slider.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/style.css" />

    <title>
      Bundus Plug
    </title>
  </head>
  <body>
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
      <div class="container">
        <div class="menu-bg-wrap">
          <div class="site-navigation">
            <a href="index.php" class="logo m-0 float-start">Bundus Plug</a>

            <ul
              class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end"
            >
              <li ><a href="index.php">Home</a></li>
            <li >  <?php if(!empty($_SESSION['username'])){?>
              <a href="dashboard.php">Dashboard</a>
 <?php }?></li>
              <li class="has-children">
                <a ">Locations</a>
                <ul class="dropdown">
                  <li><a href="index.php?searchText=Pella">Pella</a></li>
                  <li><a href="index.php?searchText=Tlokweng">Tlokweng</a></li>
                  <li><a href="index.php?searchText=Seshibitswe">Seshibitswe</a></li>
                  <li><a href="index.php?searchText=Vrede">Vrede</a></li>
                  <li><a href="index.php?searchText=Madikwe">Madikwe</a></li>
                  <li><a href="index.php?searchText=Latlhakane">Latlhakane</a></li>
                </ul>
              </li>
              <li><a href="services.php">Categories</a></li>
             <?php if(empty($_SESSION['username'])){?>   <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>

               <?php }?>

                <?php if(!empty($_SESSION['username'])){?>
                  <form method="POST" class="text-center">
            <li> <button   type="submit" class="btn btn-danger btn-xm" name="logout">Logout</button> </li>
       </form>
   <?php }?>
    </ul>
            <a
              href="#"
              class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
              data-toggle="collapse"
              data-target="#main-navbar"
            >
              <span></span>
            </a>
          </div>
        </div>
      </div>
    </nav>

    <div class="hero">
      <div class="hero-slide">

        <div
          class="img overlay"
          style="background-image: url('images/hero_bg_1.jpg')"
        ></div>
      </div>

      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center">
            <h1 class="heading" data-aos="fade-up">
              Easiest way to find your product or services in your Bundus
            </h1>
            <form
              method="GET"
              class="narrow-w form-search d-flex align-items-stretch mb-3"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <input
                type="text"
                class="form-control px-4"
                name="searchText" id="searchText"
                placeholder="Search Product or Service"
              />
              <button type="submit" class="btn btn-primary">Search</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-lg-6">
            <h2 class="font-weight-bold text-primary heading">
              Popular Products
            </h2>
          </div>
          <div class="col-lg-6 text-lg-end">

          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="property-slider-wrap">
              <div class="property-slider"> "
                <?php

                if(isset($_GET['searchText']))
              {
                $searchText = $_GET['searchText'];
                $sql = "SELECT * FROM products WHERE title LIKE '%$searchText%' OR location LIKE '%$searchText%' OR category LIKE '%$searchText%'  ";
              }
             else {
                 $sql = "SELECT * FROM products ";
               }
                $result = $conn->query($sql);
                //Store the results in an array
                $arr = array();
                while ($row = mysqli_fetch_assoc($result)) {
                $arr[] = $row;

                 foreach ($arr as $row){
                }

            ?>
                <!-- .item Start -->

                <div style="border-radius: 25px; border: 2px solid #73AD21; padding: 10px; margin :3px" class="property-item">
                  <a  class="img">
                    <img src="upload/<?php echo  $row['image']; ?>" alt="Image" style="border-radius: 25px; object-fit: cover;width: 100%; height: 450px" />
                  </a>

                  <div class="property-content">
                    <div class="price mb-2"><span>R<?php echo  $row['price']; ?></span></div>
                    <div>
                      <span class="d-block mb-2 text-black-50">
                        <?php echo  $row['short_description']; ?></span>
                      <span class="city d-block mb-3"><?php echo  $row['title']; ?></span>

                      <div class="specs d-flex mb-4">
                        <span class="d-block d-flex align-items-center me-3">
                              <span class="caption"> Location:<?php echo  $row['location']; ?> </span>
                        </span>
                        <span class="d-block d-flex align-items-center">
                              <span class="caption"> Category:<?php echo  $row['category']; ?> </span>
                        </span>
                      </div>
                      <?php if(!empty($_SESSION['username'])){?>
                        <a
                            href="property-single.php?id=<?php echo  $row['product_id']; ?>"
                          class="btn btn-primary py-2 px-3"
                          >See details</a>
                    <?php }?>
                    <?php if(empty($_SESSION['username'])){?>
                    <a
                        href="login.php"
                      class="btn btn-primary py-2 px-3"
                      >Login To See details</a  >
                      <?php }?>
                    </div>
                  </div>
                </div>
                <!-- .item -->
               <?php } ?>

              </div>

              <div
                id="property-nav"
                class="controls"
                tabindex="0"
                aria-label="Carousel Navigation"
              >
                <span
                  class="prev"
                  data-controls="prev"
                  aria-controls="property"
                  tabindex="-1"
                  >Prev</span
                >
                <span
                  class="next"
                  data-controls="next"
                  aria-controls="property"
                  tabindex="-1"
                  >Next</span
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section sec-testimonials">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-md-6">
            <h2 class="font-weight-bold heading text-primary mb-4 mb-md-0">
              Our Services
            </h2>
          </div>
          <div class="col-md-6 text-md-end">
            <div id="testimonial-nav">
              <span class="prev" data-controls="prev">Prev</span>

              <span class="next" data-controls="next">Next</span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4"></div>
        </div>
        <div class="testimonial-slider-wrap">
          <div class="testimonial-slider">

                            <?php
                            if(isset($_GET['searchText']))
                          {
                            $searchText = $_GET['searchText'];
                            $sql = "SELECT * FROM service
                             INNER JOIN users ON service.user_id = users.email
                             WHERE title LIKE '%$searchText%' OR location LIKE '%$searchText%'    ";
                            }
                             else {
                               $sql = "SELECT * FROM service
                                INNER JOIN users ON service.user_id = users.email
                                ";
                             }
                            $result = $conn->query($sql);
                            //Store the results in an array
                            $arr = array();
                            while ($row = mysqli_fetch_assoc($result)) {
                            $arr[] = $row;

                             foreach ($arr as $row){
                            }

                        ?>
                            <!-- .item Start -->
            <div style="border-radius: 25px; border: 2px solid #73AD21; padding: 20px" class="item">
              <div class="testimonial">

                <h3 class="h5 text-primary mb-4"><?php echo  $row['title']; ?></h3>
                <div class="price mb-2"><span><b>R<?php echo  $row['price']; ?></b></span></div>
                <blockquote>
                  <p>
                  "<?php echo  $row['description']; ?>"
                  </p>
                </blockquote>
                <p class="text-black-50">
                  <?php echo  $row['location']; ?>
                </p>
                <?php if(!empty($_SESSION['username'])){?>
                  <a
                      href="property-single.php?id=<?php echo  $row['service_id']; ?>"
                    class="btn btn-primary py-2 px-3"
                    >See details</a>
              <?php }?>

                <?php if(empty($_SESSION['username'])){?>
                <a
                    href="login.php"
                  class="btn btn-primary py-2 px-3"
                  >Login To See details</a>
                  <?php }?>
              </div>
            </div>
 <?php } ?>

          </div>
        </div>
      </div>
    </div>

    <div class="section section-4 bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-lg-5">
            <h2 class="font-weight-bold heading text-primary mb-4">
              Let's find something perfect for you near you
            </h2>

          </div>
        </div>
      </div>
    </div>





    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>
