
<?php
session_start();
$msgs="";

if (isset($_POST['signin'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $con = mysqli_connect('localhost', 'Root', '', 'gestion');
  $sql = mysqli_query($con, "SELECT * FROM client WHERE email='$email'");
  $row = mysqli_fetch_array($sql);
  if (is_array($row)) {
    if (password_verify($password, $row['password'])) {
      $_SESSION["email"] = $row["email"];
      $_SESSION["password"] = $row["password"];
      $_SESSION["id_client"] = $row["id_client"];
      $_SESSION["first_name"] = $row["first_name"];
      $_SESSION["image_profile"] = $row["image_profile"];
      header("location:HomeProfile.php");
    } else {
      $msgs = "Email or Password is incorrect";
    }
  } else {
    $msgs = "Email or Password is incorrect";
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
          <li><a href="index.php" class="nav-link scrollto "><i class="bx bx-server"></i> <span>Services</span></a></li>
          <li><a href="index.php" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->


  <!-- ======= Hero Section ======= -->
  <section class="vh-100" style="background-color: #fff;">

    <section class="vh-100" style="margin-top: -5%;">
      <div class="container-fluid h-custom" style="margin-left: 10%;">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-9 col-lg-6 col-xl-5" style="margin-left: 4%;">
            <img src="assets/img/draw2.webp" class="img-fluid" alt="Sample image" style="margin-left: 8%;">
          </div>
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1" style="margin-right: 11%;margin-top: 7%;">

            <form method="post">


              <!-- Email input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Email address</label>
                <input type="email" id="form3Example3" name="email" class="form-control form-control-lg" required onkeyup="validEmail()"/>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-3">
                <label class="form-label" for="form3Example4">Password</label>
                <input type="password" id="passwords" name="password" class="form-control form-control-lg" required />
                <i style="float: right;margin-left: -30px;margin-top: -30px;position: relative;z-index: 2;" class="fa fa-eye" id="showPasswordIconss"></i>
              </div>
              <p style="color: red;"><?php echo $msgs; ?></p>

              


              <div class="d-flex justify-content-between align-items-center">
                <!-- Checkbox -->
                <div class="form-check mb-0">
                  <label class="form-check-label" for="form2Example3">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                    Remember me
                  </label>
                </div>
                <a href="changePassword.php" class="text-body">Forgot password?</a>
              </div>

              <div class="text-center text-lg-start mt-4 pt-2">
                <button type="submit" name="signin" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="signup.php" class="link-danger">Register</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>

      </div>
    </section>
  </section>

 






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

  <script>
    const showPasswordIconss = document.getElementById('showPasswordIconss');
    const passwordFieldss = document.getElementById('passwords');

    showPasswordIconss.addEventListener('click', function() {
      const type = passwordFieldss.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordFieldss.setAttribute('type', type);
      this.classList.toggle('fa-eye-slash');
    });
  </script>
  <script>
    function passwordReg() {
      let password = document.getElementById('password').value;
      let regexPass = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!.%*#?&])[A-Za-z\d@$!.%*#?&]{8,}$/;
      let button = document.getElementById('btnDisp');

      if (regexPass.test(password)) {
        document.getElementById('password').style.border = '3px solid green';
        document.getElementById('password').style.background = 'rgb(130, 246, 130)';
        document.getElementById('return5').innerHTML = "Your password is valide";
        document.getElementById('return5').style.color = "green";

      } else {
        document.getElementById('password').style.border = '3px solid red';
        document.getElementById('password').style.background = 'rgb(248, 147, 147)';
        document.getElementById('return5').innerHTML = "Please enter minimum eight characters,at least one letter, one number and one special character";
        document.getElementById('return5').style.color = "red";
        button.disabled = true;

      }
      document.getElementById('validPassword').onkeyup = function() {
        let validPassword = document.getElementById('validPassword').value;

        if (validPassword == password) {
          document.getElementById('validPassword').style.border = '3px solid green';
          document.getElementById('validPassword').style.background = 'rgb(130, 246, 130)';
          document.getElementById('return6').innerHTML = "Your password is valide";
          document.getElementById('return6').style.color = "green";
          button.disabled = false;


        } else {
          document.getElementById('validPassword').style.border = '3px solid red';
          document.getElementById('validPassword').style.background = 'rgb(248, 147, 147)';
          document.getElementById('return6').innerHTML = "Please enter correct password!";
          document.getElementById('return6').style.color = "red";
          button.disabled = true;

        }

      }
    }
  </script>
  

</body>

</html>