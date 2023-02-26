<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HOME WELL</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/my_home.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio - v3.10.0
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="assets/img/my_home.png" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.html"></a></h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="index.php" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="signin.php" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Place an ad</span></a></li>
          <li><a href="index.php?#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a></li>
          <li><a href="index.php?#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->



  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <?php

          if (isset($_POST['showModal'])) {
            $id = $_POST['id'];
            $con = mysqli_connect('localhost', 'Root', '', 'gestion');
            $result = mysqli_query($con, "SELECT * FROM annonce WHERE id_annonce = '$id'");
            $tele = mysqli_query($con, "SELECT phone , first_name FROM client WHERE id_client IN (SELECT id_client FROM annonce WHERE id_annonce = $id)");
            $pic = mysqli_query($con, "SELECT image_main , image_secondaire FROM image WHERE id_annonce ='$id'");

            $data = array();
            while ($row = mysqli_fetch_assoc($pic)) {
          ?>


              <div id="carouselExample" class="carousel slide" style="margin-left: -2%;">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img width="100%" height="420vh" src="<?php echo $row['image_main']; ?>" class="d-block w-100" alt="...">
                  </div>

                  <?php


                  while ($row = mysqli_fetch_assoc($pic)) {
                    $image = $row['image_secondaire'];
                  ?>
                    <div class="carousel-item">
                      <?php
                        if(!empty($image)){
                          echo "<img width='100%' height='420vh' src='".$image."' class='d-block w-100' alt=''...'>";
                        }
                      ?>
                    </div>
                  <?php
                  }
                  ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>


            <?php
            }

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <div style="display: flex;justify-content:space-between">
                <div class="card" style="border:none;">
                  <div class="card-body">
                    <p class="card-text"><span style="font-weight: bold;">Title :</span> <?php echo $row['titre']; ?></p>
                    <p class="card-text"><span style="font-weight: bold;">Categorie :</span> <?php echo $row['categorie']; ?></p>
                    <p class="card-text"><span style="font-weight: bold;">Type d'annonce :</span> <?php echo $row['type_annonce']; ?></p>
                    <p class="card-text"><span style="font-weight: bold;">Superficie :</span> <?php echo $row['superficie']; ?> <span style="font-weight: bold;">m²</span></p>
                    <p class="card-text"><span style="font-weight: bold;">Description :</span> <?php echo $row['description']; ?></p>
                    <p class="card-text"><span style="font-weight: bold;">Adresse :</span> <?php echo $row['adresse']; ?></p>
                    <p class="card-text"><span style="font-weight: bold;">City :</span> <?php echo $row['ville']; ?></p>
                    <p class="card-text"><span style="font-weight: bold;">Price :</span> <?php echo $row['prix']; ?> <span style="font-weight: bold;">DH</span></p>
                    <p class="card-text"><span style="font-weight: bold;">Date of annonce :</span> <?php echo $row['date_publication']; ?></p>

                  </div>
                  <button type="button" class="modbuttons" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    SHOW CONTACT
                  </button>

                </div>
                <div style="margin-right: 5%;margin-top:2%;">
                  <div class="mapouter">
                    <div class="gmap_canvas">
                      <iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=tanger&t=&z=12&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                      <a href="https://2yu.co">2yu</a><br>
                      <style>
                        .mapouter {
                          position: relative;
                          text-align: right;
                          height: 96%;
                          width: 100%;
                        }
                      </style>
                      <a href="https://embedgooglemap.2yu.co/">html embed google map</a>
                      <style>
                        .gmap_canvas {
                          overflow: hidden;
                          background: none !important;
                          height: 96%;
                          width: 100%;
                        }
                      </style>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            }

            while ($row = mysqli_fetch_assoc($tele)) {
            ?>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Contact advertiser</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div style="display: flex;">
                        <img src="assets/img/iconPhone.png" alt="phone" width="40vw" height="40vh">
                        <p style="margin-left: 2%;font-weight:bold;margin-top:2%;"><?php echo $row['phone']; ?></p>
                      </div>
                      <div style="display: flex;">
                        <img src="assets/img/user.png" alt="phone" width="40vw" height="40vh">
                        <p style="margin-left: 2%;font-weight:bold;margin-top:2%;"><?php echo $row['first_name']; ?></p>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

          <?php
            }
          }

          ?>


        </div>

      </div>
    </section><!-- End About Section -->





    <!-- ======= Footer ======= -->
    <footer id="footer">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>HOME WELL</span></strong>
        </div>
      </div>
    </footer><!-- End  Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/typed.js/typed.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
      var refreshInterval = setInterval(function() {
        location.reload(false);
      }, 1500000);


      setTimeout(function() {
        clearInterval(refreshInterval);
      }, 150000);
    </script>
    <script>
      function showContact() {
        document.getElementById('contactShow').style.display = "block";
      }
    </script>

</body>

</html>