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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


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
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a></li>
          <li><?php
              if (isset($_GET['show_element']) && $_GET['show_element'] === 'true') {
                echo '<a style="display:none" href="profile.php" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Profile</span></a>';
              } else {
                echo '<a style="display:block" href="profile.php" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Profile</span></a>';
              }
              ?></li>
          <li><?php
              if (isset($_GET['show_element']) && $_GET['show_element'] === 'true') {
                echo '<a style="display:block" href="signin.php" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Place an ad</span></a>';
              } else {
                echo '<a style="display:none" href="#" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Profile</span></a>';
              }
              ?></li>
          <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
        </ul>
      </nav>
    </div>
  </header>



  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1>FIND YOUR HOME</h1>
      <p>BUY or Rent <span class="typed" data-typed-items="Appartement,Villa,Bureau,Land"></span></p>
    </div>
    <div class="video-container">
      <video autoplay loop muted playsinline style="width: 100%; height: auto;">
        <source src="assets/img/VILLA LUXE SAINT RAPHAËL - PRÉSENTATION VIDÉO IMMOBILIÈRE.mp4" type="video/mp4">
      </video>

    </div>


  </section>
  <style>
    .video-container {
      width: 100%;
      height: 500px;
      margin-top: -10%;
    }
  </style>





  <main id="main">
    <section class="clients section-bg">
      <div class="container">

        <div class="row" data-aos="zoom-in">

          <form class="form-inline" action="search.php" method="post" style="display: flex;">
            <div class="form-group mx-sm-3 mb-2">
              <input type="number" class="form-control" name="maxPric" placeholder="Max-prix" style="width:10vw;">
            </div>
            <div class="form-group mx-sm-3 mb-2">
              <input type="number" class="form-control" name="min" placeholder="Min-prix" style="width:10vw;">
            </div>
            <div class="form-group mx-sm-3 mb-3">
              <select class="form-select" aria-label="Default select example" name="categorie">
                <option selected>Category</option>
                <option value="Buy">Buy</option>
                <option value="Rent">Rent</option>
              </select>
            </div>
            <div class="form-group mx-sm-3 mb-3">
              <select class="form-select" aria-label="Default select example" name="type_annonce">
                <option selected>Type annonce</option>
                <option value="House">House</option>
                <option value="Villa">Villa</option>
                <option value="Bureau">Bureau</option>
                <option value="Land">Land</option>
                <option value="Appartement">Appartement</option>
              </select>
            </div>
            <div class="form-group mx-sm-3 mb-3">
              <select class="form-select" aria-label="Default select example" name="villes">
                <option selected>City</option>
                <option value="Tangier">Tangier</option>
                <option value="Casablanca">Casablanca</option>
                <option value="Marrakesh">Marrakesh</option>
                <option value="Agadir">Agadir</option>
                <option value="Rabat">Rabat</option>
                <option value="Tetouan">Tetouan</option>
                <option value="Essaouira">Essaouira</option>
                <option value="Al Hoceima">Al Hoceima</option>
              </select>
            </div>
            <div class="form-group mx-sm-3 mb-3">
              <select class="form-select" aria-label="Default select example" name="Date_publication">
                <option selected>TRI</option>
                <option value="Date_publication">Date publication</option>
              </select>
            </div>

            <button type="submit" name="recherche" class="btn btn-primary mb-2" style="background-color: #DFF3FC;border:1px solid #000;color:#000;margin-top:-1%;" id="btn">SEARCH</button>
          </form>


        </div>

      </div>
    </section>

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>Annonces</h2>
          <p>Find here the best offers</p>
        </div>

        <div class="row" style="padding:7%;">
          <?php
          $con = mysqli_connect('localhost', 'Root', '', 'gestion');
          $numberPage = 5;
          $lienPage = isset($_GET['page']) ? $_GET['page'] : 1;

          $startPage = ($lienPage - 1) * $numberPage;

          $query = "SELECT * FROM annonce LIMIT $startPage, $numberPage";
          $result = mysqli_query($con, $query);

          while ($row = mysqli_fetch_assoc($result)) {
          ?>

            <div class="card" id="cards" style="background-color: #d2d3d5;width:90%;margin-bottom:3%;border:none;">
              <div id="modal">
                <div class="infoModal" style="margin-bottom:-3%;">
                  <h4 class="modal-title" style="display:flex;justify-content:center;color:#000;font-weight:bold;margin-top:2%;" id="exampleModalLabel"> <?php echo $row['titre']; ?></h4>
                  <div style="display: flex;margin-top:3%;">
                    <?php
                    $ids = $row['id_annonce'];
                    $pic = mysqli_query($con, "SELECT image_main FROM image WHERE id_annonce = $ids ");
                    $rows = mysqli_fetch_assoc($pic);
                    $imageMain = $rows["image_main"];
                    echo "<img class='card-text' width='37%' height='200vh;' style='margin-top: 5%;' src='" . $imageMain . "'>";
                    ?>
                    <div class="infoModal2" style="margin-left: 6%;margin-bottom:2%;margin-top:4%;">
                      <p class="card-text"><span style="">Categorie :</span> <?php echo $row['categorie']; ?></p>
                      <p class="card-text"><span>Type d'annonce :</span> <?php echo $row['type_annonce']; ?></p>
                      <p class="card-text"><span>Superficie :</span> <?php echo $row['superficie']; ?> <span>m²</span></p>
                      <p class="card-text"><span>Adresse :</span> <?php echo $row['adresse']; ?></p>
                      <p class="card-text"><span>Price :</span> <?php echo $row['prix']; ?> <span>DH</span></p>
                    </div>
                  </div>
                  <form method="post" action="details.php" style="display:flex;flex-direction:row-reverse;margin-top:-10%;">
                    <input type="hidden" id="id" name="id" value="<?php echo $row['id_annonce']; ?>">
                    <button type="submit" name="showModal" class="modbuttons">SHOW MORE</button>
                  </form>
                </div>
              </div>
            </div>
          <?php

          }
          $query = "SELECT COUNT(*) as numberData FROM annonce";
          $result = mysqli_query($con, $query);
          $row = mysqli_fetch_assoc($result);
          $AllData = $row['numberData'];
          $AllPage = ceil($AllData / $numberPage);
          echo "<ul style='display:flex;flex-wrap:wrap;' class='container'>";
          for ($i = 1; $i <= $AllPage; $i++) {
            echo "<a href='?page=$i?#about' class='btn' style='margin-left:2%;background-color:#149ddd;'>Page $i</a>";
          }
          echo "</ul>";

          ?>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Facts Section ======= -->

    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
            <div class="icon"><i class="bi bi-briefcase"></i></div>
            <h4 class="title"><a href="">Lorem Ipsum</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="bi bi-card-checklist"></i></div>
            <h4 class="title"><a href="">Dolor Sitema</a></h4>
            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="bi bi-bar-chart"></i></div>
            <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
            <div class="icon"><i class="bi bi-binoculars"></i></div>
            <h4 class="title"><a href="">Magni Dolores</a></h4>
            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
            <div class="icon"><i class="bi bi-brightness-high"></i></div>
            <h4 class="title"><a href="">Nemo Enim</a></h4>
            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
            <div class="icon"><i class="bi bi-calendar4-week"></i></div>
            <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
          </div>
        </div>

      </div>

      <img srff="hello">
    </section>
    </section><!-- End Services Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row" data-aos="fade-in">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Revenue California, Tanger, NY 90000</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>Home.well@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+2128000000</p>
              </div>

              <div class="mapouter">
                <div class="gmap_canvas">
                  <iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=tanger&t=&z=12&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                  <a href="https://2yu.co">2yu</a><br>
                  <style>
                    .mapouter {
                      position: relative;
                      text-align: right;
                      height: 70%;
                      width: 100%;
                    }
                  </style>
                  <a href="https://embedgooglemap.2yu.co/">html embed google map</a>
                  <style>
                    .gmap_canvas {
                      overflow: hidden;
                      background: none !important;
                      height: 70%;
                      width: 100%;
                    }
                  </style>
                </div>
              </div>

            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

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

</body>

</html>