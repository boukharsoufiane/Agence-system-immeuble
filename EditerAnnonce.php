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
          <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a></li>
          <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
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

          if (isset($_POST['EditAnnonce'])) {
            $id = $_POST['id'];
            $con = mysqli_connect('localhost', 'Root', '', 'gestion');
            $result = mysqli_query($con, "SELECT * FROM annonce WHERE id_annonce = '$id'");
            $tele = mysqli_query($con, "SELECT phone , first_name FROM client WHERE id_client IN (SELECT id_client FROM annonce WHERE id_annonce = $id)");
            $pic = mysqli_query($con, "SELECT image_main , image_secondaire FROM image WHERE id_annonce ='$id'");
            $data = array();
            while ($rows = mysqli_fetch_assoc($pic)) {
          ?>
              <div id="carouselExample" class="carousel slide" style="margin-left: -2%;">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <?php
                    $pics = mysqli_query($con, "SELECT image_main FROM image WHERE id_annonce = $id ");
                    $rows = mysqli_fetch_assoc($pics);
                    $imageMain = $rows["image_main"];
                    echo "<img width='100%' height='420vh' class='d-block w-100' src='" . $imageMain . "'>";
                    ?>
                  </div>

                  <?php
                  while ($row = mysqli_fetch_assoc($pic)) {
                    $image = $row["image_secondaire"];

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
              $idEdit = $row["id_annonce"];
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
                  <button type="button" style="background-color:#DFF3FC;color:#000;border:none" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Editer">
                    Edit Information
                  </button>
                  <button style="margin-top: 3%; background-color: #FD9898;color:#000;border:none" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delet">
                    Delete Annonce
                  </button>
                  <form action="EditImages.php" method="post">
                    <input type="hidden" name="imEDit" value="<?php echo $row['id_annonce']; ?>">
                    <button type="submit" name="imageUpdate" style="margin-top: 3%; background-color: #dfaa5a;color:#000;border:none;width:40vw;" class="btn btn-primary">
                      Edit Images
                    </button>
                  </form>
                  

                  

                  <!-- Modal -->
                  <div class="modal fade" id="delet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form method="post">
                            <input type="hidden" name="idDelet" value="<?php echo $row['id_annonce']; ?>">
                            <input type="submit" name="delete" value="OUI" class="modbuttons" style="width: 100%;">
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NON</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Modal -->
                  <div class="modal fade" id="Editer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form method="post">
                            <div class="row">
                              <div class="col-md-6 mb-4">
                                <div class="form-outline">

                                  <label class="form-label" for="form3Example1m">Annonce Title</label>
                                  <input type="text" id="form3Example1m" class="form-control form-control-lg" name="titre" value="<?php echo $row['titre']; ?>" />
                                </div>
                              </div>
                              <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                  <label class="form-label" for="form3Example1n">Annonce Area (m²)</label>
                                  <input type="text" id="form3Example1n" class="form-control form-control-lg" name="superficie" value="<?php echo $row['superficie']; ?>" />
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                  <label class="form-label" for="form3Example1m1">Annonce Address</label>
                                  <input type="text" id="form3Example1m1" class="form-control form-control-lg" name="adresse" value="<?php echo $row['adresse']; ?>" />
                                </div>
                              </div>
                              <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                  <label class="form-label" for="form3Example1n1">Annonce Price</label>
                                  <input type="text" id="form3Example1n1" class="form-control form-control-lg" name="prix" value="<?php echo $row['prix']; ?>" />
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6 mb-4">
                                <select class="form-select" aria-label="Default select example" name="categorie">
                                  <option selected value="<?php echo $row['categorie']; ?>"><?php echo $row['categorie']; ?></option>
                                  <option value="Buy">Buy</option>
                                  <option value="Rent">Rent</option>
                                </select>
                              </div>
                              <div class="col-md-6 mb-4">
                                <select class="form-select" aria-label="Default select example" name="type_annonce">
                                  <option selected value="<?php echo $row['type_annonce']; ?>"><?php echo $row['type_annonce']; ?></option>
                                  <option value="House">House</option>
                                  <option value="Villa">Villa</option>
                                  <option value="Bureau">Bureau</option>
                                  <option value="Land">Land</option>
                                  <option value="Appartement">Appartement</option>
                                </select>
                              </div>
                            </div>

                            <div class="col">
                              <div class="form-outline">
                                <label class="form-label" for="form3Example1m1">Annonce Description</label>
                                <input style="height: 15vh;" type="text" id="form3Example1m1" class="form-control form-control-lg" name="description" value="<?php echo $row['description']; ?>" />
                              </div>
                            </div>

                            <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">
                              <div class="row">
                                <div class="col- mb-4">
                                  <select class="form-select" aria-label="Default select example" name="ville">
                                    <option selected value="<?php echo $row['ville']; ?>"><?php echo $row['ville']; ?></option>
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
                              </div>
                            </div>
                            <div class="d-flex justify-content-end pt-3" style="margin-top:10%;">
                              <input type="hidden" id="idEDit" name="idAnnonce" value="<?php echo $row['id_annonce']; ?>">
                              <button type="submit" name="update" class="modbuttons" style="width: 100%;">EDIT ANNONCE</button>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>

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
          }
          ?>

        </div>

      </div>
    </section><!-- End About Section -->
    <?php
    session_start();

    if (isset($_POST['update'])) {
      $id_annonce = $_POST['idAnnonce'];
      $titre = $_POST['titre'];
      $description = $_POST['description'];
      $adresse = $_POST['adresse'];
      $superficie = $_POST['superficie'];
      $categorie = $_POST['categorie'];
      $type_annonce = $_POST['type_annonce'];
      $prix = $_POST['prix'];
      $ville = $_POST['ville'];

      $conn = mysqli_connect('localhost', 'Root', '', 'gestion');
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "UPDATE annonce SET titre='$titre', description='$description', adresse='$adresse', superficie='$superficie', categorie='$categorie', type_annonce='$type_annonce', prix='$prix', date_modification=NOW(), ville='$ville' WHERE id_annonce='$id_annonce'";

      if ($conn->query($sql) === TRUE) {
        header("location:profile.php");
      }

      $conn->close();
    }
    ?>
    <?php
    if (isset($_POST['delete'])) {
      $con = mysqli_connect('localhost', 'Root', '', 'gestion');
      $idDelet = $_POST['idDelet'];
      echo $idDelet;
      $sql = "DELETE FROM image WHERE id_annonce=$idDelet";

      if (mysqli_query($con, $sql) === true) {
        $sqlTwo = "DELETE FROM annonce WHERE id_annonce=$idDelet";
        if (mysqli_query($con, $sqlTwo)) {
          header("location:profile.php");
        }
      } else {
        echo "Error deleting record";
      }
    }
    ?>

    <?php
    if (isset($_POST["mainEdit"])) {
      $id = $_POST["mainIM"];
      $newImageData = addslashes(file_get_contents($_FILES["imMain"]["tmp_name"]));
      $con = mysqli_connect('localhost', 'Root', '', 'gestion');
      $sql = "UPDATE image SET image_main='$newImageData' WHERE id_annonce='$id'";
      mysqli_query($con, $sql);
    }

    if (isset($_POST["secondairEDit"])) {
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);

      $secIM = $_POST["secIM"];
      $newImageData = "https://www.muretprestige.com/images/produits/agence-immobiliere-marrakech-appartement-a-vendre-hivernage1.jpeg";
      $indexToUpdate = $_POST["indiceImages"];
      $con = mysqli_connect('localhost', 'Root', '', 'gestion');
      $query = "SELECT image_secondaire FROM image WHERE id_annonce ='$secIM'";
      $result = mysqli_query($con, $query);

      if (!$result) {
        die('Query failed: ' . mysqli_error($con));
      }

      $row = mysqli_fetch_assoc($result);
      $imageData = $row['image_secondaire'];

      $startIndex = $indexToUpdate * 1000;
      $updatedImageData = substr($imageData, 0, $startIndex) . $newImageData . substr($imageData, $startIndex + 1000);

      $query = "UPDATE image SET image_secondaire='$updatedImageData' WHERE id_annonce='$secIM'";

      if (mysqli_query($con, $query)) {
        header("location:profile.php");
      } else {
        die('Image update failed: ' . mysqli_error($con));
      }
    }


    ?>





    <!-- ======= Footer ======= -->
    <footer id="footer">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>iPortfolio</span></strong>
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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