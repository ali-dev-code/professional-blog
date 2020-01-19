<?php require_once 'config/init.php' ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>CodeTheWeb Login</title>

    <!-- Styles -->
    <link href="assets/css/page.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
    <link rel="icon" href="assets/img/favicon.png">
  </head>

  <body class="layout-centered bg-img" style="background-image: url(assets/img/bg/4.jpg);">

 <div class=" mt-7 row justify-content-center ">
   <div>
   <?php user_login(); ?>
   </div>
 </div>
    <!-- Main Content -->
    <main class="main-content">

      <div class="bg-white rounded shadow-7 w-400 mw-100 p-6">

        <h5 class="mb-7">Sign into your account</h5>

        <form action=""  method="POST">
          <div class=" p-0 form-group">
            <input type="text" class="form-control" name="username" placeholder="Username">
            <?php  if (isset($login_errors['u'])): ?>
            <span  class = "text-danger">
              <?php echo $login_errors['u']; ?>
             </span>
           <?php endif;  ?>
          </div>


          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <?php  if (isset($login_errors['p'])): ?>
            <span  class = "text-danger">
              <?php echo $login_errors['p']; ?>
             </span>
           <?php endif;  ?>
          </div>

          <div class="form-group flexbox py-3">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input">
              <label class="custom-control-label">Remember me</label>
            </div>

            <a class="text-muted small-2" href="user-recover.html">Forgot password?</a>
          </div>

          <div class="form-group">
            <button class="btn btn-block btn-primary" name="login" type="submit">Login</button>
          </div>
        </form>

        <hr class="w-30">

        <p class="text-center text-muted small-2">Don't have an account? <a href="user-register.html">Register here</a></p>
      </div>

    </main><!-- /.main-content -->


    <!-- Scripts -->
    <script src="assets/js/page.min.js"></script>
    <script src="assets/js/script.js"></script>

  </body>
</html>
