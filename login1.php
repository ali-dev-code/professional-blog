<?php require_once 'config/init.php' ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dark Bootstrap Admin by Bootstrapious.com</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="admin/vendor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="admin/vendor/font-awesome/css/font-awesome.min.css">
  <!-- Custom Font Icons CSS-->
  <link rel="stylesheet" href="admin/css/font.css">
  <!-- Google fonts - Muli-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="admin/css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="admin/css/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="admin/img/favicon.ico">
  <!-- Tweaks for older IEs-->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
  <div class="login-page">
    <div class="container d-flex align-items-center">
      <div class="form-holder has-shadow">
        <div class="row">
          <!-- Logo & Information Panel-->
          <div class="col-lg-6">
            <div class="info d-flex align-items-center">
              <div class="content">
                <div class="logo">
                  <h1>Dashboard</h1>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
              </div>
            </div>
          </div>
          <!-- Form Panel    -->
          <div class="col-lg-6">
            <div class="form d-flex align-items-center">
              <div class="content">

                <form class="form-validate mb-4" method="POST" >
                <?php user_login(); ?>
                  <div class="form-group">
                    <input id="login-username" type="text" name="username" required data-msg="Please enter your username"
                      class="input-material">
                    <?php  if (isset($login_errors['u'])): ?>
                    <span class="text-danger">
                      <?php echo $login_errors['u']; ?>
                    </span>
                    <?php endif;  ?>
                    <label for="login-username" class="label-material">User Name</label>
                  </div>
                  <div class="form-group">
                    <input id="login-password" type="password" name="password"" required data-msg=" Please enter your password"
                      class="input-material">
                    <?php  if (isset($login_errors['p'])): ?>
                    <span class="text-danger">
                      <?php echo $login_errors['p']; ?>
                    </span>
                    <?php endif;  ?>
                    <label for="login-password" class="label-material">Password</label>
                  </div>
                  <button type="submit" name="login" class="btn btn-primary">Login</button>
                </form><a href="#" class="forgot-pass">Forgot Password?</a><br><small>Do not have an account? </small><a
                  href="register.html" class="signup">Signup</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="copyrights text-center">
      <p>Design by <a href="https://bootstrapious.com/p/bootstrap-4-dark-admin" class="external">Bootstrapious</a></p>
      <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
    </div>
  </div>
  <!-- JavaScript files-->
  <script src="admin/vendor/jquery/jquery.min.js"></script>
  <script src="admin/vendor/popper.js/umd/popper.min.js"> </script>
  <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="admin/vendor/jquery.cookie/jquery.cookie.js"> </script>
  <script src="admin/vendor/chart.js/Chart.min.js"></script>
  <script src="admin/vendor/jquery-validation/jquery.validate.min.js"></script>
  <script src="admin/js/front.js"></script>
</body>
</html>
