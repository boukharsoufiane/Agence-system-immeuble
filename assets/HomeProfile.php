<?php

if (isset($_POST['deconnect'])) {
  session_start();

  $_SESSION = array();

  session_destroy();


  header('Location: index.php?show_element=true');
  exit;
}


?>

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
  <script src="https://kit.fontawesome.com/3c520e368e.js" crossorigin="anonymous"></script>

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
        <?php
        session_start();
        $profile = $_SESSION["image_profile"];
        echo "<img style='border-radius:70px;'  src='$profile' alt=''>";
        ?>

        <p style="font-weight:bold;color:#fff;display:flex;justify-content:center;"><?php $name = $_SESSION["first_name"];
                                                                                    echo $name; ?></p>
        <h1 class="text-light"><a href="index.html"></a></h1>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="index.php" class="nav-link scrollto "><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#" class="nav-link scrollto active"><i class="bx bx-user"></i> <span>Profile</span></a></li>
          <li><a href="EditerProfile.php" class="nav-link scrollto "><i class="bx bx-user"></i> <span>Edit Profile</span></a></li>
          <li><a href="Annonce.php" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Place an ad</span></a></li>
          <li><a href="index.php?#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
          <li><a href="index.php?#services" class="nav-link scrollto "><i class="bx bx-server"></i> <span>Services</span></a></li>
          <form method="post">
            <button type="submit" name="deconnect" class="btns" style="padding: 2%;margin-left:8%;background-color:#040b14"><img src="assets/img/turn-off-icon.png" alt="log" width="30vw" height="30vh"></button>
          </form>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->




  <section class="vh-70" style="background-color: #fff;">
    <style>
      #myVideo {
        position: fixed;
        right: 0;
        bottom: 0;
        min-width: 100%;
        min-height: 100%;
      }
    </style>
    <video autoplay muted loop id="myVideo">
      <source src="assets/img/Abstract White Background HD motion graphics background loop White video Royalty Free Footages (online-video-cutter.com).mp4" type="video/mp4">
    </video>


    <?php
    $con = mysqli_connect('localhost', 'Root', '', 'gestion');
    $id_client = $_SESSION["id_client"];
    $result = mysqli_query($con, "SELECT * FROM annonce WHERE id_client = $id_client");
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {

    ?>
      <div class="row" style="padding:7%;margin-left:25%;margin-top:-8%;">
        <div class="card" id="cards" style="background-color: #d2d3d5;width:90%;margin-bottom:3%;border:1px solid #000;">
          <div id="modal">
            <div class="infoModal" style="margin-bottom:-3%;">
              <h4 class="modal-title" style="display:flex;justify-content:center;color:#000;font-weight:bold;margin-top:2%;" id="exampleModalLabel"> <?php echo $row['titre']; ?></h4>
              <div style="display: flex;margin-top:3%;">
                <?php
                $id = $row['id_annonce'];
                $pic = mysqli_query($con, "SELECT image_main FROM image WHERE id_annonce = $id ");
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
              <div style="display: flex;justify-content:center;margin-left:2%;margin-bottom:4%;">
                <form method="post" action="EditerAnnonce.php" style="display:flex;flex-direction:row-reverse;margin-top:-10%;">
                  <input type="hidden" id="id" name="id" value="<?php echo $row['id_annonce']; ?>">
                  <button type="submit" name="EditAnnonce" style="height:8vh;margin-top:75%" class="modbuttons">SHOW MORE</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php
    }

    ?>
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

</body>

</html>