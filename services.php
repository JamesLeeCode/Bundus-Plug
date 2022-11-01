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
      Property &mdash; Free Bootstrap 5 Website Template by Untree.co
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
              <li class="active"><a href="services.php">Categories</a></li>
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


    <div
      class="hero page-inner overlay"
      style="background-image: url('images/hero_bg_1.jpg')"
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">Services</h1>

            <nav
              aria-label="breadcrumb"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <ol class="breadcrumb text-center justify-content-center">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li
                  class="breadcrumb-item active text-white-50"
                  aria-current="page"
                >
                  Services
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div class="section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
            <div class="box-feature mb-4">

              <h3 class="text-black mb-3 font-weight-bold">
                Entertainment
              </h3>
              <p class="text-black-50">
              Get all your Entertainment gear here including board games for kids and xbox
              </p>
              <p><a href="index.php?searchText=Entertainment" class="learn-more">Search For Items</a></p>
          </div>
          </div>
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
            <div class="box-feature mb-4">
              <h3 class="text-black mb-3 font-weight-bold">Transportation</h3>
              <p class="text-black-50">
                Looking for a car to buy ?? We have all sorts of Transportations ready on market
              </p>
              <p><a href="index.php?searchText=Transportation" class="learn-more">Search For Items</a></p>
            </div>
          </div>
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
            <div class="box-feature mb-4">
              <h3 class="text-black mb-3 font-weight-bold">
                Catering
              </h3>
              <p class="text-black-50">
                If you are thinking of starting a Catering compnay, get good quality Catering equepment here
              </p>
              <p><a href="index.php?searchText=Catering" class="learn-more">Search For Items</a></p>
      </div>
          </div>
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
            <div class="box-feature mb-4">
              <h3 class="text-black mb-3 font-weight-bold">Health and Beauty</h3>
              <p class="text-black-50">
                For all Beauty products and safety kits likes the FIRST AID kit. Click here to start browsing.
              </p>
              <p><a href="index.php?searchText=Health and Beauty" class="learn-more">Search For Items</a></p>
      </div>
          </div>

          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
            <div class="box-feature mb-4">

              <h3 class="text-black mb-3 font-weight-bold">
                Education
              </h3>
              <p class="text-black-50">
                Get books and other school things to make life easy for your kids at school. We also have uniforms listed
              </p>
              <p><a href="index.php?searchText=Education" class="learn-more">Search For Items</a></p>
          </div>
          </div>
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
            <div class="box-feature mb-4">
              <h3 class="text-black mb-3 font-weight-bold">Food and Beverages</h3>
              <p class="text-black-50">
                Sharing is caring, get food for the family and some Beverages for the chillas
              </p>
              <p><a href="index.php?searchText=Food and Beverages" class="learn-more">Search For Items</a></p>
        </div>
          </div>
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
            <div class="box-feature mb-4">
              <h3 class="text-black mb-3 font-weight-bold">
                Technology
              </h3>
              <p class="text-black-50">
                Are you a Tech Person? or simply just looking for a phone, we have all sorts of technologies list on our site
              </p>
              <p><a href="index.php?searchText=Technology" class="learn-more">Search For Items</a></p>
            </div>
          </div>
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
            <div class="box-feature mb-4">

              <h3 class="text-black mb-3 font-weight-bold">Seamstress and Fashion Design</h3>
              <p class="text-black-50">
                We promote good fashion, buy fresh designer cloths for an afford price here..You can also buy cloths designs
              </p>
              <p><a href="index.php?searchText=Seamstress and Fashion Design" class="learn-more">Search For Items</a></p>
            </div>
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
