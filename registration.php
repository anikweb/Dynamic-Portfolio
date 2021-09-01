<?php
ob_start();
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="Anik">

    <title>Registration</title>

    <!-- vendor css -->
    <link href="assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="assets/lib/select2/css/select2.min.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="assets/css/starlight.css">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">
      <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">starlight <span class="tx-info tx-normal">admin</span></div>
        <div class="tx-center mg-b-60">Professional Admin Template Design</div>
        <form action="dashboard/reg2.php" method="POST">
          <div class="form-group">
            <input type="text" class="form-control regName" placeholder="Enter your Full Name" name="name"
               value="<?php 
                        if(isset($_SESSION['rname'])){
                          echo $_SESSION['rname'];
                          unset($_SESSION['rname']);
                        }
               ?>"
            >
            <span class="text-danger">
              <?php 
                if(isset($_SESSION['regNameErr'])){
                  echo $_SESSION['regNameErr'];
                  echo "<style>.regName{border:1px solid red}</style>";
                  unset($_SESSION['regNameErr']);
                }else if(isset($_SESSION['regNameTypeErr'])){
                  echo $_SESSION['regNameTypeErr'];
                  echo "<style>.regName{border:1px solid red}</style>";
                  unset($_SESSION['regNameTypeErr']);
                }
              ?>
            </span>
          </div><!-- form-group -->
          <div class="form-group">
            <input type="email" class="form-control regEmail" placeholder="Enter your Email" name="email"
              value="<?php 
                        if(isset($_SESSION['remail'])){
                          echo $_SESSION['remail'];
                          unset($_SESSION['remail']);
                        }
                      ?>"
            >
            <span class="text-danger">
              <?php 
                if(isset($_SESSION['regEmailErr'])){
                  echo $_SESSION['regEmailErr'];
                  echo "<style>.regEmail{border:1px solid red}</style>";
                  unset($_SESSION['regEmailErr']);
                }else if(isset($_SESSION['regEmailValidationErr'])){
                  echo $_SESSION['regEmailValidationErr'];
                  echo "<style>.regEmail{border:1px solid red}</style>";
                  unset($_SESSION['regEmailValidationErr']);
                }else if(isset($_SESSION['regEmailFetchErr'])){
                  echo $_SESSION['regEmailFetchErr'];
                  echo "<style>.regEmail{border:1px solid red}</style>";
                  unset($_SESSION['regEmailFetchErr']);
                }
              ?>
            </span>
          </div><!-- form-group -->
          <div class="form-group">
            <input type="password" class="form-control regPass" placeholder="Create password" name="pswd"
            value="<?php 
                        if(isset($_SESSION['rpswd'])){
                          echo $_SESSION['rpswd'];
                          unset($_SESSION['rpswd']);
                        }
                      ?>"
            >
            <span class="text-danger">
              <?php 
                if(isset($_SESSION['regPasswordErr'])){
                  echo $_SESSION['regPasswordErr'];
                  echo "<style>.regPass{border:1px solid red}</style>";
                  unset($_SESSION['regPasswordErr']);
                }
              ?>
            </span>
          </div><!-- form-group -->
          <div class="form-group">
            <input type="password" class="form-control regConPass" placeholder="Confrim password" name="conpswd"
              value="<?php 
                        if(isset($_SESSION['rconpswd'])){
                          echo $_SESSION['rconpswd'];
                          unset($_SESSION['rconpswd']);
                        }
                      ?>"
            >
            <span class="text-danger">
              <?php 
                if(isset($_SESSION['regConPasswordErr'])){
                  echo $_SESSION['regConPasswordErr'];
                  echo "<style>.regConPass{border:1px solid red}</style>";
                  unset($_SESSION['regConPasswordErr']);
                }else if(isset($_SESSION['regPassworMatchdErr'])){
                  echo $_SESSION['regPassworMatchdErr'];
                  echo "<style>.regConPass{border:1px solid red}</style>";
                  unset($_SESSION['regPassworMatchdErr']);
                }
                else if(isset($_SESSION['regPasswordValidationErr'])){
                  echo $_SESSION['regPasswordValidationErr'];
                  echo "<style>.regConPass{border:1px solid red}</style>";
                  unset($_SESSION['regPasswordValidationErr']);
                }
              ?>
            </span>
          </div><!-- form-group -->
          <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
          <button type="submit" class="btn btn-info btn-block">Registrater</button>
        </form>
        <div class="mg-t-40 tx-center">Already have an account? <a href="admin/index.php" class="tx-info">Log In</a></div>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="assets/lib/jquery/jquery.js"></script>
    <script src="assets/lib/popper.js/popper.js"></script>
    <script src="assets/lib/bootstrap/bootstrap.js"></script>
    <script src="assets/lib/select2/js/select2.min.js"></script>
    <script>
      $(function(){
        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
      });
    </script>

  </body>
</html>
<?php ob_end_flush(); ?>