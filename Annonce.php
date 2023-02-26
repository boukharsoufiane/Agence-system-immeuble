<?php
session_start();

if (isset($_POST['ajouter'])) {
  $id_client = $_SESSION["id_client"];
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

  $sql = "INSERT INTO annonce(id_client,titre, description, adresse, superficie, categorie, type_annonce, prix, date_publication, date_modification,ville) VALUES ('$id_client','$titre','$description','$adresse','$superficie','$categorie','$type_annonce','$prix',NOW(),NOW(),'$ville')";

  if ($conn->query($sql) === TRUE) {
    $id_annonce = $conn->insert_id;
    $image = $_FILES['image_main']['name'];
    $tmp_name = $_FILES['image_main']['tmp_name'];
    $folder = "assets/img/" . $image;
    move_uploaded_file($tmp_name, $folder);


    $sql_main = "INSERT INTO image(id_annonce,image_main,image_secondaire) VALUES ('$id_annonce', '$folder','')";
    if ($conn->query($sql_main) !== TRUE) {
      die("Error inserting main image data.");
    }

    if (!empty($_FILES["image_secondaire"]["name"][0])) {
      for ($i = 0; $i < count($_FILES["image_secondaire"]["name"]); $i++) {
        $images_name = $_FILES["image_secondaire"]["name"][$i];
        $tmp_name = $_FILES["image_secondaire"]["tmp_name"][$i];
        $folders = "assets/img/" . $images_name;
        move_uploaded_file($tmp_name, $folders);

    
        $sql_secondary = "INSERT INTO image(id_annonce,image_main, image_secondaire) VALUES ('$id_annonce','','$folders')";
        if ($conn->query($sql_secondary) !== TRUE) {
          die("Error inserting secondary image data.");
        }
      }
    }
  }

  $conn->close();
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
          <li><a href="profile.php" class="nav-link scrollto "><i class="bx bx-user"></i> <span>Profile</span></a></li>
          <li><a href="EditerProfile.php" class="nav-link scrollto "><i class="bx bx-user"></i> <span>Editer
                Profile</span></a></li>

          <li><a href="#" class="nav-link scrollto active"><i class="bx bx-server"></i> <span>Place an ad</span></a>
          </li>
          <li><a href="index.php?#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a>
          </li>
          <li><a href="index.php?#services" class="nav-link scrollto "><i class="bx bx-server"></i> <span>Services</span></a>
          </li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->


  <!-- ======= Hero Section ======= -->
  <section class="vh-70" style="background-color: #fff;">
    <form method="post" enctype="multipart/form-data">
      <section class="h-100">
        <div class="container py-5 h-100" style="margin-left: 13%;margin-top: -13%;">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
              <div class="card card-registration my-4">
                <div class="row g-0">
                  <div class="col-xl-6 d-none d-xl-block">
                    <img src="assets/img/information.png" alt="Sample photo" class="img-fluid" style="border-top-left-radius: .20rem; border-bottom-left-radius: .20rem;height: 60vh;width: 60%;margin-left: 25%;margin-top: 35%;" />
                  </div>
                  <div class="col-xl-6">
                    <div class="card-body p-md-5 text-black">
                      <h3 class="mb-5 text-uppercase" style="margin-left: -35%;font-size: 2.5em;">Add new Annonce</h3>
                      <form action="Annonce.php" method="post">
                        <div class="row">
                          <div class="col-md-6 mb-4">
                            <div class="form-outline">

                              <label class="form-label" for="form3Example1m">Annonce Title</label>
                              <input type="text" id="form3Example1m" class="form-control form-control-lg" name="titre" />
                            </div>
                          </div>
                          <div class="col-md-6 mb-4">
                            <div class="form-outline">
                              <label class="form-label" for="form3Example1n">Annonce Area (m²)</label>
                              <input type="text" id="form3Example1n" class="form-control form-control-lg" name="superficie" />
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-4">
                            <div class="form-outline">
                              <label class="form-label" for="form3Example1m1">Annonce Address</label>
                              <input type="text" id="form3Example1m1" class="form-control form-control-lg" name="adresse" />
                            </div>
                          </div>
                          <div class="col-md-6 mb-4">
                            <div class="form-outline">
                              <label class="form-label" for="form3Example1n1">Annonce Price</label>
                              <input type="text" id="form3Example1n1" class="form-control form-control-lg" name="prix" />
                            </div>
                          </div>
                        </div>
                        <div class="row">

                          <div class="mb-3">
                            <label for="formFile" class="form-label">Main picture</label>
                            <input class="form-control" type="file" id="formFile" name="image_main">
                          </div>
                          <div class="mb-3">
                            <label for="formFile" class="form-label">Pictures</label>
                            <input class="form-control" type="file" multiple id="formFile" name="image_secondaire[]">
                          </div>
                        </div>


                        <div class="row">
                          <div class="col-md-6 mb-4">
                            <select class="form-select" aria-label="Default select example" name="categorie">
                              <option selected>Annonce Categorey</option>
                              <option value="Buy">Buy</option>
                              <option value="Rent">Rent</option>
                            </select>
                          </div>
                          <div class="col-md-6 mb-4">
                            <select class="form-select" aria-label="Default select example" name="type_annonce">
                              <option selected>Annonce Type</option>
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
                            <input style="height: 15vh;" type="text" id="form3Example1m1" class="form-control form-control-lg" name="description" />
                          </div>
                        </div>

                        <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                          <div class="row">
                            <div class="col- mb-4">
                              <select class="form-select" aria-label="Default select example" name="ville">
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
                          </div>


                        </div>
                        <div class="d-flex justify-content-end pt-3" style="margin-top:10%;">
                          <button type="submit" name="ajouter" class="btn btn-warning btn-lg ms-2" style="margin-top:2%;margin-right: 30%;">Add Annonce</button>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </section>
    </form>
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