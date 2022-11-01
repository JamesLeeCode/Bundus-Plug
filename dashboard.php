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
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="fonts/icomoon/style.css" />
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="css/tiny-slider.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/style.css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>
    Dashboard
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
            <li><a href="services.html">Categories</a></li>
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
          style="background-image: url('images/hero_bg_3.jpg')"
        ></div>

      </div>

      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center">
            <h1 class="heading" data-aos="fade-up">
              Easiest way to find your product or services in your Bundus
            </h1>
            <form
              action="#"
              class="narrow-w form-search d-flex align-items-stretch mb-3"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <input
                type="text"
                class="form-control px-4"
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
              Your Products
            </h2>
          </div>
          <div class="col-lg-6 text-lg-end">
            <p>
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add New Product</button>
            </p>
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
          <!-- Modal content-->
          <div align="left" class="modal-content">
            <div align="left" class="modal-header">
            <h4 class="modal-title">Add New Product </h4>
            </div>
            <div class="modal-body">
              <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <label for="user-password" >Enter Product Title</label>
                  <div class="col-12 mb-3">
                    <input
                      type="text"
                      id="title"
                      name="title"
                      class="form-control"
                      placeholder="Enter Product Title"
                    />
                  </div>
                    <label for="user-password" >Enter Short Product Description</label>
                  <div class="col-12 mb-3">
                    <input
                      type="text"
                      id="short_description"
                      name="short_description"
                      class="form-control"
                      placeholder="Enter Short Product Description"
                    />
                  </div>
                    <label for="user-password" >Enter Full Product Description</label>
                  <div class="col-12 mb-3">
                    <input
                      type="text"
                      id="full_description"
                      name="full_description"
                      class="form-control"
                      placeholder="Enter Full Product Description"
                    />
                  </div>
                    <label for="user-password" >Select Product Location</label>
                  <div class="col-12 mb-3">
                    <select
                      id="location"
                      required
                      name="location"
                      class="form-control">
                      <option value="Pella">Pella</option>
                     <option value="Tlokweng">Tlokweng</option>
                      <option value="Seshibitswe">Seshibitswe</option>
                      <option value="Vrede">Vrede</option>
                      <option value="Madikwe">Madikwe</option>
                      <option value="Latlhakane">Latlhakane</option>
                    </select>
                  </div>
                  <label for="user-password" >Enter Product Price</label>
                  <div class="col-12 mb-3">
                    <input
                      type="number"
                      id="price"
                      name="price"
                      class="form-control"
                      placeholder="Enter Product Price"
                    />
                  </div>

                  <input
                    type="text"
                    id="user_id"
                    name="user_id"
                    value="<?php echo  $_SESSION['username']; ?>"
                    hidden
                  />

                  <label for="user-password" >Select Product Category</label>
                <div class="col-12 mb-3">
                  <select
                    id="category"
                    name="category"
                    required
                    class="form-control">
                    <option value="Entertainment">Entertainment</option>
                    <option value="Transportation">Transportation</option>
                    <option value="Catering">Catering</option>
                    <option value="Health and Beauty">Health and Beauty</option>
                    <option value="Education">Education</option>
                    <option value="Food and Beverages">Food and Beverages</option>

                    <option value="Technology">Technology</option>
                    <option value="Construction & Building Material">Construction & Building Material</option>
                    <option value="Motor Spares and Repair Services">Motor Spares and Repair Services</option>
                    <option value="Seamstress and Fashion Design">Seamstress and Fashion Design</option>
                    <option value="Stockvels and Burial Society">Stockvels and Burial Society</option>
                    <option value="">Religion</option>
                  </select>
                </div>

                  <div class="col-12 mb-3">
                    <label for="user-password" >Product Picture
                            </label>
                          <input   required type="file" id="pic"   name="pic"  />
            </div>


                  <div class="col-12">
                    <input
                      type="submit"
                      name="addProduct"
                      value="Add New Product"
                      class="btn btn-primary"
                    />
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          </div>
         </div>

          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="property-slider-wrap">
              <div class="property-slider">

                <?php

                $email = $_SESSION['username'];
                $sql = "SELECT * FROM products WHERE user_id = '$email'  ";

                $result = $conn->query($sql);
                //Store the results in an array
                $arr = array();
                while ($row = mysqli_fetch_assoc($result)) {
                $arr[] = $row;

                 foreach ($arr as $row){
                }

            ?>
                <!-- .item Start -->
                <div class="property-item">
                  <a href="property-single.html" class="img">
                    <img src="upload/<?php echo  $row['image']; ?>" alt="Image" style="object-fit: cover;width: 100%; height: 450px" />
                  </a>

                  <div class="property-content">
                    <div class="price mb-2"><span>R<?php echo  $row['price']; ?></span></div>
                    <div>
                      <span class="d-block mb-2 text-black-50">
                        <?php echo  $row['short_description']; ?></span>
                      <span class="city d-block mb-3"><?php echo  $row['title']; ?></span>

                      <div class="specs d-flex mb-3">
                          <span class="caption"> Location:<?php echo  $row['location']; ?> </span>
                      </div>

                      <form method="POST" class="text-left">
                        <input
                          type="text"
                          id="id"
                        name="id"
                          hidden
                          value="<?php echo  $row['product_id']; ?>"
                        />
                        <button   type="submit" class="btn btn-danger btn-xm" name="delete_Prod">Delete</button>
                     </form>
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

      <div style="margin-top: -125px" class="section sec-testimonials">
      <div class="container">
        <h2 style="margin-bottom :15px" class="font-weight-bold heading text-primary mb-4 mb-md-0">
          Your Services
         </h2>
        <div class="row mb-5 align-items-center">
          <div class="col-md-6">
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">Add New Service</button>
          <div class="modal fade" id="myModal1" role="dialog">
            <div class="modal-dialog">
        <!-- Modal content-->
        <div align="left" class="modal-content">
          <div align="left" class="modal-header">
          <h4 class="modal-title">Add New Service </h4>
          </div>
          <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">
              <div class="row">
                  <label for="user-password" >Enter Service Title</label>
                <div class="col-12 mb-3">
                  <input
                    type="text"
                    id="title"
                    name="title"
                    class="form-control"
                    placeholder="Enter Service Title"
                  />
                </div>
                  <label for="user-password" >Enter Service Description</label>
                <div class="col-12 mb-3">
                  <input
                    type="text"
                    id="description"
                    name="description"
                    class="form-control"
                    placeholder="Enter Service Description"
                  />
                </div>

                  <label for="user-password" >Select Service Location</label>
                <div class="col-12 mb-3">
                  <select
                    id="location"
                    name="location"
                    class="form-control">
                    <option value="Pella">Pella</option>
                   <option value="Tlokweng">Tlokweng</option>
                    <option value="Seshibitswe">Seshibitswe</option>
                    <option value="Vrede">Vrede</option>
                    <option value="Madikwe">Madikwe</option>
                    <option value="Latlhakane">Latlhakane</option>
                  </select>
                </div>
                <label for="user-password" >Enter Service Price</label>
                <div class="col-12 mb-3">
                  <input
                    type="number"
                    id="price"
                    name="price"
                    class="form-control"
                    placeholder="Enter Service Price"
                  />
                </div>

                <input
                  type="text"
                  id="user_id"
                  name="user_id"
                  value="<?php echo  $_SESSION['username']; ?>"
                  hidden
                />

                <div class="col-12">
                  <input
                    type="submit"
                    name="addService"
                    0value="Add New Service"
                    class="btn btn-primary"
                  />
                </div>
              </div>
            </form>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        </div>
       </div>
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
                                $sql = "SELECT * FROM service
                                 where user_id = '$email'  ";

                                $result = $conn->query($sql);
                                //Store the results in an array
                                $arr = array();
                                while ($row = mysqli_fetch_assoc($result)) {
                                $arr[] = $row;

                                 foreach ($arr as $row){
                                }

                            ?>
                                <!-- .item Start -->
                <div style="border-radius: 25px; border: 2px solid #73AD21; padding: 20px; margin:5px" class="item">
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
                    <form method="POST" class="text-left">
                              <input
                                type="text"
                                id="id"
                              name="id"
                                hidden
                                value="<?php echo  $row['service_id']; ?>"
                              />
                              <button   type="submit" class="btn btn-danger btn-xm" name="delete_Serv">Delete</button>
                           </form>
                  </div>
                </div>
     <?php } ?>


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
