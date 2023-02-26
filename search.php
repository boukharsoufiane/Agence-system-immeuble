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
          <li><a href="index.php" class="nav-link scrollto "><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="index.php?#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
          <li><a href="index.php?#services" class="nav-link scrollto "><i class="bx bx-server"></i> <span>Services</span></a></li>
          <li><a href="signup.php" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Sign up</span></a></li>
          <li><a href="signin.php" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Sign in</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->


  <!-- ======= Hero Section ======= -->
  <section class="vh-70" style="background-color: #fff;">
    <h1 style="margin-left:48%;margin-bottom:5%;">Filter Annonces</h1>
    <div class="row" style="padding:2%;margin-left:27%;">
      <?php
      if (isset($_POST['recherche'])) {
        $con = mysqli_connect('localhost', 'Root', '', 'gestion');
        $maxPrix = $_POST["maxPric"];
        $minPrix = $_POST["min"];
        $categorie = $_POST["categorie"];
        $type_annonces = $_POST["type_annonce"];
        $villes = $_POST["villes"];
        $Date_publication = $_POST["Date_publication"];
        $result ="";
        

        if ($maxPrix != "" && $minPrix != "") {
          $query = "SELECT * FROM annonce WHERE prix BETWEEN $minPrix AND $maxPrix";
          $result = mysqli_query($con, $query);
        }
        elseif ($maxPrix != "" && $minPrix != "" && $categorie != "") {
          $query = "SELECT * FROM annonce WHERE prix BETWEEN $minPrix AND $maxPrix AND categorie ='$categorie' ";
          $result = mysqli_query($con, $query);
        }
        elseif ($maxPrix != "" && $minPrix != "" && $categorie != "" && $type_annonces != "") {
          $query = "SELECT * FROM annonce WHERE prix BETWEEN $minPrix AND $maxPrix AND categorie ='$categorie' AND type_annonce='$type_annonces' ";
          $result = mysqli_query($con, $query);
        }
        elseif ($maxPrix != "" && $minPrix != "" && $categorie != "" && $type_annonces != "" && $villes != "") {
          $result .= mysqli_query($con, " ");
          $query = "SELECT * FROM annonce WHERE prix BETWEEN $minPrix AND $maxPrix AND categorie ='$categorie' AND type_annonce='$type_annonces' AND ville ='$villes'";
          $result = mysqli_query($con, $query);
        }
        elseif ($villes !== "") {
          $query = "SELECT * FROM annonce WHERE ville ='$villes'";
          $result = mysqli_query($con, $query);
        }
        if ($categorie !== "Category") {
          $query = "SELECT * FROM annonce WHERE categorie ='$categorie'";
          $result = mysqli_query($con, $query);
        }
        elseif ($type_annonces !== "") {
          $query = "SELECT * FROM annonce WHERE type_annonce ='$type_annonces'";
          $result = mysqli_query($con, $query);
        }

        if ($Date_publication !== "TRI") {
          $query = "SELECT * FROM annonce ORDER BY date_publication DESC";
          $result = mysqli_query($con, $query);
        }
        while ($row = mysqli_fetch_assoc($result)) {
          ?>

            <div class="card" id="cards" style="background-color: #DFF3FC;width:90%;margin-bottom:3%;border:none;">
              <div id="modal">
                <div class="infoModal" style="margin-bottom:-3%;">
                  <h4 class="modal-title" style="display:flex;justify-content:center;color:#000;font-weight:bold;margin-top:2%;" id="exampleModalLabel"> <?php echo $row['titre']; ?></h4>
                  <div style="display: flex;margin-top:3%;">
                      <?php
                      $id = $row['id_annonce'];
                      $pic = mysqli_query($con, "SELECT image_main FROM image WHERE id_annonce = $id ");

                      while ($rows = mysqli_fetch_assoc($pic)) {
                        $image = $rows['image_main'];
                      ?>
                          <?php
                            if(!empty($image)){
                              echo "<img width='37%' height='200vh' src='".$image."'>";
                            }
                          ?>
                      <?php
                      }
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
      }
      ?>
      
    </div>
    
  </section>

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

</body>

</html>