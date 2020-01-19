<?php include_once 'config/init.php' ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>TheSaaS — Blog with sidebar</title>

    <!-- Styles -->
    <link href="assets/css/page.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
    <link rel="icon" href="assets/img/favicon.png">
  </head>

  <body>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
      <div class="container">

        <div class="navbar-left">
          <button class="navbar-toggler" type="button">&#9776;</button>
          <a class="navbar-brand text-white  font-weight-bold " href="index.php">
           CODE THE WEB
          </a>
        </div>

        <section class="navbar-mobile">
          <span class="navbar-divider d-mobile-none"></span>
          <ul class="nav nav-navbar">

            <li class="nav-item">
              <a class="nav-link" href="#">Categories<span class="arrow"></span></a>
              <nav class="nav">
              <?php

              $sql = " SELECT * FROM categories ";
              $result = query($sql);
              while ($row = fetch_array($result)) {
                $catName = $row['cat_name'];
              ?>
                <a class="nav-link" href="category.php?category=<?php echo $row['cat_id']; ?>"><?php echo $catName; ?></a>

              <?php } ?>

              </nav>
            </li>





          </ul>
        </section>

        <a class="btn btn-xs btn-round btn-success" href="login1.php">Admin</a>

      </div>
    </nav><!-- /.navbar -->


    <!-- Header -->
    <header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
      <div class="container">

        <div class="row">
          <div class="col-md-8 mx-auto">

            <h1>Latest Blog Posts</h1>
            <p class="lead-2 opacity-90 mt-6">Read and get updated on how we progress</p>

          </div>
        </div>

      </div>
    </header><!-- /.header -->
