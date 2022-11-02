<?php

    session_start();

    // Order of these files is IMPORTANT
    include "db.php";
    include "retrieve.php";
    include "functions.php";
    include "logic.php";

    $service_id = $_GET['id'];

    $sql = "SELECT * FROM service
    INNER JOIN users ON service.user_id=users.email
     where service_id = '$service_id'  ";

    $result = $conn->query($sql);
    //Store the results in an array
    $arr = array();
    while ($row = mysqli_fetch_assoc($result)) {
    $arr[] = $row;

     foreach ($arr as $row){
    }

   $user_id = $row['user_id'];

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
      Bundus Plug - View Product
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

    <div
      class="hero page-inner overlay"
      style="background-image: url('images/hero_bg_3.jpg')"
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">
              <?php echo  $row['title']; ?>
            </h1>

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
                  <?php echo  $row['title']; ?>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-7">
            <div class="img-property-slide-wrap">
              <div class="img-property-slide">
                <img src="images/serv.jpg" alt="Image" class="img-fluid" />
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <h2 class="heading text-primary">  <?php echo  $row['title']; ?></h2>

            <p class="text-black-50">
                <h6 class="mb-0"> <?php echo  $row['description']; ?></h6>
            </p>
            <br>
              <h6 class="mb-0">Product Price: R <?php echo  $row['price']; ?></h6>
            <div class="d-block agent-box p-5">
              <div class="img mb-4">
                <a  class="img">
                  <img src="upload/<?php echo  $row['profile']; ?>" alt="Image" style="border-radius: 25px; object-fit: cover;width: 100%; height: 350px" />
                </a>
              </div>


              <div class="text">
                  <h3 class="mb-0"><?php echo  $row['user_name'].' '.$row['user_surname'] ?></h3>
                <div class="meta mb-3">Email: <b><?php echo $row['email'] ?></b>
                  <p>
                          Phone: <b> <?php echo $row['phone'] ?> </b></div>
                          </p>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- /.site-footer -->

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
        <?php }?>
