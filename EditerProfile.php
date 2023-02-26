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
          <li><a href="profile.php" class="nav-link scrollto "><i class="bx bx-user"></i> <span>Profile</span></a>
          </li>
          <li><a href="#" class="nav-link scrollto active"><i class="bx bx-user"></i> <span>Editer
                Profile</span></a>
          </li>
          <li><a href="Annonce.php" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Place an ad</span></a></li>
          <li><a href="index.php?#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
          <li><a href="index.php?#services" class="nav-link scrollto "><i class="bx bx-server"></i> <span>Services</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->


  <!-- ======= Hero Section ======= -->
  <section class="vh-70" style="background-color: #fff;">
    <div class="container h-100" style="margin-left: 16%;margin-top: -6%;">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border: none;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">EDIT PROFILE</p>

                  <?php
                  session_start();
                  $id_client = $_SESSION["id_client"];
                  $con = mysqli_connect('localhost', 'Root', '', 'gestion');
                  $result = mysqli_query($con, "SELECT * FROM client WHERE id_client = $id_client");
                  $data = array();
                  while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                  ?>
                    <form class="mx-1 mx-md-4" method="post" id="forms">

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="form3Example1c">Your First Name</label>
                          <input type="text" id="form3Example1c" class="form-control" name="first_name" value="<?php echo $row['first_name']; ?>" />
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="form3Example2c">Your Last Name</label>
                          <input type="text" id="form3Example2c" class="form-control" name="last_name" value="<?php echo $row['last_name']; ?>" />
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center mb-4" id="pictureProfile">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="mb-3">
                          <label class="form-label" for="first_name">Your Profile Picture</label>
                          <input class="form-control" type="file" id="formFile" name="profileImages">
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="form3Example4c">Your Email</label>
                          <input type="email" id="form3Example4c" class="form-control" name="email" value="<?php echo $row['email']; ?>" />
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="form3Example3c">Your Number Phone</label>
                          <input type="number" id="form3Example3c" class="form-control" name="phone" value="0<?php echo $row['phone']; ?>" />
                        </div>
                      </div>

                      <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <button type="submit" onclick="pageEvent()" name="editProfile" class="btn btn-primary btn-lg" style="font-size: 0.8em">Edit</button>
                        <button type="button" class="btn btn-primary btn-lg" style="font-size: 0.8em;margin-left:3%;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          Change Password
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form action="">
                                  <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                      <label class="form-label" for="form3Example5c">Password</label>
                                      <input type="password" id="form3Example5c" name="password" class="form-control" />
                                    </div>
                                  </div>

                                  <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                      <label class="form-label" for="form3Example6cd">Repeat your password</label>
                                      <input type="password" id="form3Example6cd" name="validPassword" class="form-control" />
                                    </div>
                                  </div>
                                  <button type="submit" name="EditPassword" class="btn btn-primary">Save changes</button>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>


                  <?php
                    if (isset($_POST['editProfile'])) {
                      session_start();
                      $id_client = $_SESSION["id_client"];
                      $con = mysqli_connect('localhost', 'Rootw', '', 'gestion');
                      $first_name = $_POST['first_name'];
                      $last_name = $_POST['last_name'];
                      $email = $_POST['email'];
                      $phone = $_POST['phone'];

                      $image = $_FILES['profileImages']['name'];
                      $tmp_name = $_FILES['profileImages']['tmp_name'];
                      $folderProfile = "assets/img/" . $image;
                      move_uploaded_file($tmp_name, $folderProfile);

                      if (!empty($image)) {
                        $sql = "UPDATE client SET first_name='$first_name',last_name='$last_name',email='$email',phone='$phone ' ,image_profile = '$folderProfile' WHERE id_client = $id_client";
                        if (mysqli_query($con, $sql)) {
                          header("refresh:0");
                        }
                      } elseif (empty($image)) {
                        $sql = "UPDATE client SET first_name='$first_name',last_name='$last_name',email='$email',phone='$phone ' WHERE id_client = $id_client";
                        if (mysqli_query($con, $sql)) {
                          header("refresh:0");
                        }
                      } else {
                        echo "Error updating record: " . mysqli_error($con);
                      }
                    }

                    if (isset($_POST['EditPassword'])) {
                      session_start();
                      $id_client = $_SESSION["id_client"];
                      $con = mysqli_connect('localhost', 'Rootw', '', 'gestion');

                      $password = $_POST['password'];
                      $validPassword = $_POST['validPassword'];


                      $sql = "UPDATE client SET password='$password',validPassword='$validPassword' WHERE id_client = $id_client";
                      if (mysqli_query($con, $sql)) {
                        header("refresh:0");
                      } else {
                        echo "Error updating record: " . mysqli_error($con);
                      }
                    }
                  }
                  ?>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2" style="margin-top: 7%;">
                  <img src="assets/img/—Pngtree—instagram people profile sets user_5253843.png" style="width: 50vw;height: 70vh;margin-left: 6%;" alt="Sample image">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
</body>

</html>