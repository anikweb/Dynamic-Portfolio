<?php
    ob_start();
  session_start();
  if(isset($_SESSION['id'])){
    header('location:../dashboard/index.php');
  }
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
    <meta property="og:url" content="http://facebook.com/anik.web">
    <meta property="og:title" content="Anik Kumar Nandi">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Professional Web Developer">
    <meta name="author" content="Anik">

    <title>Login - </title>

    <!-- vendor css -->
    <link href="../assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link href="../assets/css/starlight.css" rel="stylesheet" >
  </head>

  <body>
    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">
    
      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
      <?php
      if(isset($_SESSION['regSuccess2'])):?>
        <div class="text-center mb-4">
          <span class="alert alert-success"><?=$_SESSION['regSuccess2']?></span>    
        </div>
        <?php unset($_SESSION['regSuccess2']);
      endif ?>
         <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Anik <span class="tx-info tx-normal">Admin</span></div>
        <div class="tx-center mg-b-60">Professional Portfolio</div>
        <form action="login-post.php" method="POST">
          <div class="form-group">
            <input type="email" class="form-control loginEmail" placeholder="Enter your Email" name="email" 
            value="<?php
                     if(isset($_SESSION['loginEmail'])){
                       echo $_SESSION['loginEmail'];
                       unset($_SESSION['loginEmail']);
                      }
                  ?>">
                  <span class="text-danger">
                    <?php 
                      if(isset($_SESSION['loginEmailErr'])){
                        echo $_SESSION['loginEmailErr'];
                        echo "<style>.loginEmail{border:1px solid red}</style>";
                        unset($_SESSION['loginEmailErr']);
                      }else if(isset($_SESSION['loginEmailEmpty'])){
                        echo $_SESSION['loginEmailEmpty'];
                        echo "<style>.loginEmail{border:1px solid red}</style>";
                        unset($_SESSION['loginEmailEmpty']);
                      }
                    ?>
                  </span>
          </div>
          <div class="form-group">
            <input type="password" class="form-control loginPswd" placeholder="Enter your password" name="pswd">
            <span class="text-danger">
              <?php
                if(isset($_SESSION['loginPassErr'])){
                  echo $_SESSION['loginPassErr'];
                  echo "<style>.loginPswd{border:1px solid red}</style>";
                  unset($_SESSION['loginPassErr']);
                }else if(isset($_SESSION['loginPassEmpty'])){
                  echo $_SESSION['loginPassEmpty'];
                  echo "<style>.loginPswd{border:1px solid red}</style>";
                  unset($_SESSION['loginPassEmpty']);
                }
                
              ?>
            </span>
            <a href="http://janikabarman.com" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
          </div><!-- form-group -->
          <button type="submit" class="btn btn-info btn-block">Sign In</button>
        </form>
        

        <div class="mg-t-60 tx-center">Not yet a member? <a href="../registration.php" class="tx-info">Registration Here</a></div>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="../../lib/jquery/jquery.js"></script>
    <script src="../../lib/popper.js/popper.js"></script>
    <script src="../../lib/bootstrap/bootstrap.js"></script>

  </body>
</html>
<?php 
ob_end_flush();
?>
