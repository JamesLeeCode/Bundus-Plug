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
      Bundus Plug - Register
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
              <li><a href="index.php">Home</a></li>

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
            <h1 class="heading" data-aos="fade-up">User Register</h1>

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
                  User Register
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="row">
          <div
            class="col-lg-4 mb-5 mb-lg-0"
            data-aos="fade-up"
            data-aos-delay="100"
          >
          <div class="contact-info">
            <div class="address mt-2">
              <i class="icon-roo"></i>
              <h4 class="mb-2">Registered Users:</h4>
              <p>
                <?php


                 $sql = "SELECT * FROM users ";

                $result = $conn->query($sql);
                //Store the results in an array
                $arr = array();
                while ($row = mysqli_fetch_assoc($result)) {
                $arr[] = $row;
                 $totProd = 0;
                 foreach ($arr as $row){
                   $totProd  = $totProd + 1;
                }
              }
              echo $totProd ;
            ?>

              </p>
            </div>

            <div class="open-hours mt-4">
              <i class="icon-clck-o"></i>
              <h4 class="mb-2">Available Items On sale:</h4>
              <p>
                <?php


                 $sql = "SELECT * FROM products ";

                $result = $conn->query($sql);
                //Store the results in an array
                $arr = array();
                while ($row = mysqli_fetch_assoc($result)) {
                $arr[] = $row;
                 $totProd = 0;
                 foreach ($arr as $row){
                   $totProd  = $totProd + 1;
                }
              }
              echo $totProd ;
              ?>
              </p>
            </div>

            <div class="email mt-4">
              <i class="icon-tool"></i>
              <h4 class="mb-2">Available Services</h4>
              <p> <?php


               $sql = "SELECT * FROM service ";

              $result = $conn->query($sql);
              //Store the results in an array
              $arr = array();
              while ($row = mysqli_fetch_assoc($result)) {
              $arr[] = $row;
               $totProd = 0;
               foreach ($arr as $row){
                 $totProd  = $totProd + 1;
              }
            }
            echo $totProd ;
            ?> </p>
            </div>

          </div>
        </div>
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
            <form method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-6 mb-3">
                  <input
                    type="text"
                    id="user_name"
                    name="user_name"
                    class="form-control"
                    placeholder="Your Name"
                  />
                </div>
                <div class="col-6 mb-3">
                  <input
                    type="text"
                    id="user_surname"
                    name="user_surname"
                    class="form-control"
                    placeholder="Your Surname"
                  />
                </div>
                <div class="col-6 mb-3">
                  <input
                    type="phone"
                    id="phone"
                    name="phone"
                    class="form-control"
                    placeholder="Your Phone Number"
                  />
                    </div>

                <div class="col-6 mb-3">
                  <input
                    type="email"
                    id="email"
                  name="email"
                    class="form-control"
                    placeholder="Your Email"
                  />
                  </div>
                  <div class="col-12 mb-3">
                    <input
                      type="text"
                      id="q1"
                      name="q1"
                      class="form-control"
                      placeholder="Security Question: Who was your favourate teacher in school"
                    />
                  </div>
                  <div class="col-12 mb-3">
                    <input
                      type="text"
                      id="q2"
                      name="q2"
                      class="form-control"
                      placeholder="Security Question: What is your first pet name"
                    />
                  </div>

                <div class="col-6 mb-3">
                  <input
                    type="password"
                    id="password"
                  name="password"
                    class="form-control"
                    placeholder="Your Password"
                  />
                </div>
                  <div class="col-6 mb-3">
                <label for="user-password" >Profile Picture
                        </label>
                     <input   required type="file" id="pic"   name="pic"  />
                  </div>

                <div class="col-12">
                  <input
                    type="submit"
                    name="register"
                    value="Register New User"
                    class="btn btn-primary"
                  />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.untree_co-section -->



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
