<?php
$msgValids = "";
if (isset($_POST['submit'])) {
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $validPassword = $_POST['validPassword'];
  $Identi = $_POST['cni'];
  $Security = $_POST['Security'];
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  $hashed_validPassword = password_hash($validPassword, PASSWORD_DEFAULT);

  $image = $_FILES['profileImage']['name'];
  $tmp_name = $_FILES['profileImage']['tmp_name'];
  $folderProfile = "assets/img/" . $image;
  move_uploaded_file($tmp_name, $folderProfile);

  $conn = mysqli_connect('localhost', 'Root', '', 'gestion');
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $validEmail = mysqli_query($conn, "SELECT * FROM client WHERE email='$email'");
  $row = mysqli_fetch_array($validEmail);

  if ($email == $row["email"]) {
    $msgValids = "<li style='color:red;margin-bottom:8%;'>Email is already use it</li>";
  }
  if ($Identi == $row["cni"]) {
    $msgValids = "<li style='color:red;margin-bottom:8%;'>ID card is already use it</li>";
  }
  else {
    if (!empty($profile)) {
      $sql = "INSERT INTO client (first_name,last_name,email,phone,password,validPassword,cni,question,image_profile) VALUES ('$first_name','$last_name','$email','$phone','$hashed_password','$hashed_validPassword','$Identi','$Security','$folderProfile')";
      if ($conn->query($sql) === TRUE) {
        header("Location:signin.php");
      }
    } elseif (empty($profile)) {
      $sql = "INSERT INTO client (first_name,last_name,email,phone,password,validPassword,cni,question,image_profile) VALUES ('$first_name','$last_name','$email','$phone','$hashed_password','$hashed_validPassword','$Identi','$Security','assets/img/sans.webp')";
      if ($conn->query($sql) === TRUE) {
        header("Location:signin.php");
      }
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
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
  <script src="https://kit.fontawesome.com/41ea557c6e.js" crossorigin="anonymous"></script>
  <link href="assets/css/style.css" rel="stylesheet">
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

          <li><a href="signin.php" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Sign in</span></a></li>
          <li><a href="index.php" class="nav-link scrollto "><i class="bx bx-server"></i> <span>Services</span></a></li>
          <li><a href="index.php" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->


  <!-- ======= Hero Section ======= -->
  <section class="vh-70" style="background-color: #fff;">
    <div class="container h-100" style="margin-left: 16%;">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border: none;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                  <form method="post" action="signup.php" enctype="multipart/form-data">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="first_name">Your First Name</label>
                        <input type="text" id="first_name" class="form-control" name="first_name" onkeyup="validName()" />
                        <p id="return1"></p>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="last_name">Your Last Name</label>
                        <input type="text" id="last_name" class="form-control" name="last_name" onkeyup="validPrenom()" />
                        <p id="return2"></p>
                      </div>
                    </div>
                    <input type="checkbox" id="my-checkbox" style="margin-left:3%;">
                    <label for="my-checkbox" style="margin-left: 3.5%;">Check to add profile picture</label>
                    <div id="my-div">
                      <div class="d-flex flex-row align-items-center mb-4" id="pictureProfile">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="mb-3">
                          <input class="form-control" type="file" id="formFile" name="profileImage">
                        </div>
                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="email">Your Email</label>
                        <input type="email" id="email" class="form-control" name="email" onkeyup="validEmail()" />
                        <p id="return3"></p>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="phone">Your Number Phone</label>
                        <input type="number" id="phone" class="form-control" name="phone" onkeyup="validTell()" />
                        <p id="return4"></p>
                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="Identi">CNI</label>
                        <input type="text" id="Identi" class="form-control" name="cni" />
                        <p id="return8"></p>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="Security">Security Phrase</label>
                        <input type="text" id="Security" class="form-control" name="Security" />
                        <p id="return9"></p>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" id="password" class="form-control" name="password" onkeyup="passwordReg()" />
                        <i style="float: right;margin-left: -25px;margin-top: -25px;position: relative;z-index: 2;" class="fa fa-eye" id="showPasswordIcon"></i>
                        <p id="return5"></p>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="validPassword">Repeat your password</label>
                        <input type="password" id="validPassword" class="form-control" name="validPassword" onkeyup="ValidpasswordReg()" />
                        <i style="float: right;margin-left: -25px;margin-top: -25px;position: relative;z-index: 2;" class="fa fa-eye" id="showPasswordIcons"></i>

                        <p id="return6"></p>
                      </div>
                    </div>
                    <ul style="margin-left:12%;" id="validInfo">
                      <?php echo $msgValids; ?>
                    </ul>

                    <div class="form-check d-flex justify-content-center mb-5">
                      <label class="form-check-label" for="form2Example3">
                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                        I agree all statements in <a href="#!">Terms of service</a>
                      </label>
                    </div>
                    <p id="return7"></p>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button id="btnDisp" type="submit" name="submit" disabled class="btn btn-primary btn-lg">Register</button>
                    </div>

                  </form>


                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2" style="margin-top: -15%;">

                  <img style="position: fixed;top:20%;right:2%;width:40vw;height:70vh;" src="assets/img/draw1.webp" class="img-fluid" alt="Sample image">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <style>
    #my-div.disabled {
      pointer-events: none;
      opacity: 0.5;
    }
  </style>
  <script>
    const myCheckbox = document.getElementById('my-checkbox');
    const myDiv = document.getElementById('my-div');
    const isChecked = JSON.parse(localStorage.getItem('isChecked'));
    const isDisabled = JSON.parse(localStorage.getItem('isDisabled'));
    myCheckbox.checked = isChecked;
    if (isDisabled) {
      myDiv.classList.add('disabled');
    } else {
      myDiv.classList.remove('disabled');
    }
    myCheckbox.addEventListener('change', function() {
      if (this.checked) {
        myDiv.classList.remove('disabled');
      } else {
        myDiv.classList.add('disabled');
      }
      localStorage.setItem('isChecked', JSON.stringify(this.checked));
      localStorage.setItem('isDisabled', JSON.stringify(myDiv.classList.contains('disabled')));
    });
  </script>






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
  <script src="java.js"></script>
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
    document.getElementById("Identi").onkeyup = function() {
      let identi = document.getElementById('Identi').value;
      let button = document.getElementById('btnDisp');
      let regName = /^[a-zA-Z 0-9]{6,10}$/;
      if (regName.test(identi) === false) {
        document.getElementById('Identi').style.border = '3px solid red';
        document.getElementById('Identi').style.background = 'rgb(248, 147, 147)';
        document.getElementById('return8').innerHTML = "Please enter correct ID card";
        document.getElementById('return8').style.color = "red";
        button.disabled = true;
      } else {
        document.getElementById('Identi').style.border = '3px solid green';
        document.getElementById('Identi').style.background = 'rgb(130, 246, 130)';
        document.getElementById('return8').innerHTML = "Your ID card is valide";
        document.getElementById('return8').style.color = "green";

      }
    }
  </script>

  <script>
    document.getElementById("Security").onkeyup = function() {
      let secu = document.getElementById('Security').value;
      let button = document.getElementById('btnDisp');
      let regName = /^[a-zA-Z 0-9]{6,50}$/;
      if (regName.test(secu) === false) {
        document.getElementById('Security').style.border = '3px solid red';
        document.getElementById('Security').style.background = 'rgb(248, 147, 147)';
        document.getElementById('return9').innerHTML = "Please enter correct security reponse";
        document.getElementById('return9').style.color = "red";
        button.disabled = true;
      } else {
        document.getElementById('Security').style.border = '3px solid green';
        document.getElementById('Security').style.background = 'rgb(130, 246, 130)';
        document.getElementById('return9').innerHTML = "Your security reponse is valide";
        document.getElementById('return9').style.color = "green";

      }
    }
  </script>
  <script>
    const showPasswordIcon = document.getElementById('showPasswordIcon');
    const passwordField = document.getElementById('password');

    showPasswordIcon.addEventListener('click', function() {
      const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordField.setAttribute('type', type);
      this.classList.toggle('fa-eye-slash');
    });
  </script>
  <script>
    const showPasswordIcons = document.getElementById('showPasswordIcons');
    const passwordFields = document.getElementById('validPassword');

    showPasswordIcons.addEventListener('click', function() {
      const type = passwordFields.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordFields.setAttribute('type', type);
      this.classList.toggle('fa-eye-slash');
    });
  </script>

</body>

</html>