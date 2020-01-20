<?php require_once 'config/init.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">

  <title>CodeTheWeb</title>

  <!-- Styles -->
  <link href="/codeBlog/assets/css/page.min.css" rel="stylesheet">
    <link href="/codeBlog/assets/css/style.css" rel="stylesheet">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="/codeBlog/assets/img/apple-touch-icon.png">
  <link rel="icon" href="/codeBlog/assets/img/favicon.png">
  <style>

  body{
    background-color: #FFFFFF !important;
  }

  </style>
</head>

<body>


  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
    <div class="container">

      <div class="navbar-left">
        <a class="navbar-brand text-white font-weight-900 text-uppercase" href="/codeBlog/index">
          <!-- <img class="logo-dark" src="assets/img/logo-dark.png" alt="logo">
             <img class="logo-light" src="assets/img/logo-light.png" alt="logo">
            -->
          Code The Web
        </a>
      </div>

    </div>
  </nav><!-- /.navbar -->
  <div>

    <?php

if (isset($_GET['p_id'])) {

 $the_post_id = $_GET['p_id'];

 $sql = "SELECT * FROM posts WHERE post_id = '$the_post_id' ";
 $execute = query($sql);
 confirm($execute);
 while ($row = fetch_array($execute)) {
  $post_cat_id = $row['category_id'];
  $post_title = $row['post_title'];
  $post_author = $row['post_author'];
  $post_image = $row['post_image'];
  $post_content = $row['post_content'];
  $post_tags = $row['post_tags'];

 }


}

?>

  </div>

  <!-- Header -->
  <header class="header text-white h-fullscreen pb-80" style="background-image: url(/codeBlog/assets/img/thumb/<?php echo $post_image; ?>);"
    data-overlay="9">
    <div class="container text-center">

      <div class="row h-100">

        <div class="col-lg-8 mx-auto align-self-center">

          <p class="opacity-70 text-uppercase small ls-1">Product</p>
          <h1 class="display-4 mt-7 mb-8"><?php echo $post_title; ?></h1>
          <p><span class="opacity-70 mr-1">By</span> <a class="text-white" href="#"><?php echo $post_author; ?></a></p>
          <p><img class="avatar avatar-sm" src="/codeBlog/assets/img/avatar/2.jpg" alt="..."></p>

        </div>

        <div class="col-12 align-self-end text-center">
          <a class="scroll-down-1 scroll-down-white" href="#section-content"><span></span></a>
        </div>

      </div>

    </div>
  </header><!-- /.header -->


  <!-- Main Content -->
  <main class="main-content">


    <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Blog content
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
    <div class="section" id="section-content">
      <div class="container">
      <div>
    <?php successMsg(); ?>
    </div>
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <p> <?php echo nl2br($post_content); ?> </p>
          </div>

        </div>
    <div class="row">
      <div class="col-lg-8 mx-auto" >
      <div class="gap-xy-2 mt-6">
                <a class="badg badge-pill badge-secondary" href="#"><?php echo $post_tags; ?></a>

              </div>
      </div>
    </div>
      </div>

    </div>



    <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Comments
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
    <div class="section bg-gray">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 mx-auto">
          <?php

$sql_com = " SELECT * FROM comments WHERE comment_post_id = '$the_post_id' AND comment_status = 1 ORDER BY c_id DESC";
$execute_com = query($sql_com);
confirm($execute_com);
while($row = fetch_array($execute_com)) {

?>
            <div class="media-list">
              <div class="media">
                <img class="avatar avatar-sm mr-4" src="/codeBlog/assets/img/avatar/1.jpg" alt="...">

                <div class="media-body">
                  <div class="small-1">
                    <strong><?php echo $row['comment_author']; ?></strong>

                    <time class="timeago ml-4 opacity-70 small-3  " datetime="<?php echo $row['comment_time']; ?>"></time>
                  </div>
                  <p class="small-2 mb-0"><?php echo $row['comment_content']; ?></p>
                </div>
              </div>


            </div>
            <?php } ?>



            <hr>

            <h3> Leave a comment </h3>
            <?php add_comment(); ?>
            <form action="" method="POST">

              <div class="row">
                <div class="form-group col-12 col-md-6">
                  <input class="form-control" type="text" name="c-author" required placeholder="Name">
                </div>

                <div class="form-group col-12 col-md-6">
                  <input class="form-control" type="email" required name="c-email"  placeholder="Email">
                </div>
              </div>

              <div class="form-group">
                <textarea class="form-control" placeholder="Comment" required rows="4" name="c-content" ></textarea>
              </div>

              <button class="btn btn-primary btn-block" name="add-com" type="submit">Submit your comment</button>
            </form>

          </div>


        </div>

      </div>
    </div>



  </main>


  <!-- Footer -->
  <?php include 'includes/footer.php'; ?>
