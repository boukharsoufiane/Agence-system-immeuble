<?php
if (isset($_POST["imageDelet"])) {
  $con = mysqli_connect('localhost', 'Root', '', 'gestion');
  $id = $_POST["main"];
  $sql = mysqli_query($con, "DELETE FROM image WHERE id_image='$id'");
  if ($sql) {
    header("Location:profile.php");
  }
}

if (isset($_POST["picEdit"])) {
  $con = mysqli_connect('localhost', 'Root', '', 'gestion');
  $id = $_POST["main"];
  $image = $_FILES['mainEdit']['name'];
  $tmp_name = $_FILES['mainEdit']['tmp_name'];
  $folderMain = "assets/img/" . $image;
  move_uploaded_file($tmp_name, $folderMain);

  $sql = mysqli_query($con, "UPDATE image SET image_main = '$folderMain' WHERE id_image='$id'");
  if ($sql) {
    header("Location:profile.php");
  }
}

if (isset($_POST["picEditSEC"])) {
  $con = mysqli_connect('localhost', 'Root', '', 'gestion');
  $id = $_POST["main"];
  $image = $_FILES['mainSECONDAIRE']['name'];
  $tmp_name = $_FILES['mainSECONDAIRE']['tmp_name'];
  $folderMains = "assets/img/" . $image;
  move_uploaded_file($tmp_name, $folderMains);

  $sql = mysqli_query($con, "UPDATE image SET image_secondaire = '$folderMains' WHERE id_image='$id'");
  if ($sql) {
    header("Location:profile.php");
  }
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
          <li><a href="profile.php" class="nav-link scrollto active"><i class="bx bx-user"></i> <span>Profile</span></a></li>
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
          <h3 style="display: flex;justify-content:center;margin-bottom: 6%;">IMAGES OF ANNONCE</h3>
          <?php
          $i = 0;
          $i++;

          if (isset($_POST['imageUpdate'])) {
            $id = $_POST['imEDit'];
            $con = mysqli_connect('localhost', 'Root', '', 'gestion');
            $pic = mysqli_query($con, "SELECT id_image,image_secondaire FROM image WHERE id_annonce ='$id'");
            $pics = mysqli_query($con, "SELECT id_image,image_main FROM image WHERE id_annonce ='$id'");

            while ($rows = mysqli_fetch_assoc($pics)) {
              $imageMain = $rows["image_main"];
              $IDimage = $rows["id_image"];

          ?>
              <?php
              if (!empty($imageMain)) {
                echo "<div class='card container' style='width: 35rem;'>";
              }

              ?>
              <?php

              if (!empty($imageMain)) {
                echo "<img width='100%' height='250vh' src='" . $imageMain . "' alt='>";
              }
              ?>
              <?php

              if (!empty($imageMain)) {
                echo "<div class='card-body'>";
                echo "<form method='post' enctype='multipart/form-data'>";
                echo "<input type='hidden' name='main' value='" . $IDimage . "'>";
                echo "<input type='file' type='file' class='form-control' name='mainEdit'>";
                echo "<div style='display:flex;justify-content:space-evenly;margin-top:3%;margin-bottom:3%;'>";
                echo "<button class='btn btn-primary' type='submit' name='picEdit'>EDIT</button>";
                echo "<button type='submit' name='imageDelet' class='btn btn-danger'data-bs-toggle='modal' data-bs-target='#delete'>DELETE</button>";
                echo "</div>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
              }
              ?>
            <?php
            }
            while ($row = mysqli_fetch_assoc($pic)) {
              $image = $row["image_secondaire"];
              $imageMain = $row["image_main"];
              $IDimage = $row["id_image"];

            ?>
              <?php

              if (!empty($image)) {
                echo "<div class='card container' style='width: 35rem;margin-top:3%;'>";
              }
              ?>
              <?php
              if (!empty($image)) {
                echo "<img width='100%' height='250vh' src='" . $image . "' alt='>";
              }

              ?>
              <?php
              if (!empty($image)) {
                echo "<div class='card-body'>";
                echo "<form method='post' enctype='multipart/form-data'>";
                echo "<input type='hidden' name='main' value='" . $IDimage . "'>";
                echo "<input  type='file' class='form-control' name='mainSECONDAIRE'>";
                echo "<div style='display:flex;justify-content:space-evenly;margin-top:3%;margin-bottom:3%;'>";
                echo "<button class='btn btn-primary' name='picEditSEC'>EDIT</button>";
                echo "<button type='submit' name='imageDelet' class='btn btn-danger'>DELETE</button>";
                echo "</div>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
              }

              ?>
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