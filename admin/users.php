<?php require_once 'includes/admin-header.php'; ?>
<div class="d-flex align-items-stretch">
  <!-- Sidebar Navigation-->
  <?php include 'includes/admin-sidebar.php' ?>
  <!-- Sidebar Navigation end-->
  <div class="page-content">
    <!-- Page Header-->
    <div class="page-header no-margin-bottom">
      <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Users</h2>
      </div>
    </div>

    <!-- Breadcrumb-->
    <div class="container-fluid">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Users </li>
      </ul>
      <div> <?php successMsg();  ?> </div>
    </div>
    <section class="no-padding-top">
      <div class="container-fluid">
        <div class="row">

          <div class="col-lg-12">

            <?php

              if (isset($_GET['source'])) {

                $source = $_GET['source'];
              } else {
                $source = "";
              }

              switch ($source) {
                case 'add_user':
                include 'includes/add_user.php';
                break;
                case 'edit_user':
                include 'includes/edit_user.php';
                  break;
                case 75:
                echo 'nice 75';
                  break;
                default:
                include 'includes/view_all_users.php';
                break;
              }

              ?>

          </div>
        </div>






  </div>
</div>
</section>
<?php include 'includes/admin-footer.php' ?>
