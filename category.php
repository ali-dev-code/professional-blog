<?php require_once 'includes/header.php' ?>
<!-- /.header -->


  <!-- Main Content -->
  <main class="main-content">
    <div class="section bg-gray">
      <div class="container">
        <div class="row">

          <div class="col-md-8 col-xl-9">
            <div class="row gap-y">
            <?php

        //for search SearchButton
        if (isset($_GET['seacrh-button'])) {
            $Search = escape($_GET['search']);
            $showPost = "SELECT * FROM posts
          WHERE post_tags LIKE '%$Search%' OR post_title LIKE '%$Search%'";
        } elseif($_GET['category']) {
          $cat_id = $_GET['category'];
            $showPost = " SELECT * FROM posts WHERE category_id = '$cat_id' ORDER By post_id DESC  ";
        }
          $executeShowPost = query($showPost);
          confirm($executeShowPost);
          if (row_count($executeShowPost) > 0) {
              while ($row = fetch_array($executeShowPost)) {
                $post_cat_id  = $row['category_id'];
                  ?>
              <div class="col-md-6">
                <div class="card border hover-shadow-6 mb-6 d-block">
                  <a href="post.php?p_id=<?php echo $row['post_id']; ?>"><img class="card-img-top" src="/codeBlog/assets/img/thumb/<?php echo $row['post_image']; ?>" alt="Card image cap"></a>
                  <div class="p-6 text-center">

                    <?php

                      $find_cat_name = " SELECT * FROM categories WHERE cat_id = '$post_cat_id' ";
                      $execute_cat_name = query($find_cat_name);
                      confirm($execute_cat_name);
                      $row2 = fetch_array($execute_cat_name);
                      $cat_name = $row2['cat_name'];

                      ?>



                    <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#"><?php echo $cat_name; ?></a></p>
                    <h5 class="mb-0"><a class="text-dark" href="post.php?p_id=<?php echo $row['post_id']; ?>"><?php echo $row['post_title']; ?></a></h5>

                    <time class="timeago float " datetime="<?php echo $row['post_time']; ?>"></time>
                  </div>

                </div>
              </div>
          <?php
              }
          } else {
            echo '<h1 class = "text-danger" > No Result found </h1>';
          } ?>
            </div>

            <?php if (!isset($_GET['seacrh-button'])):?>
              <nav class="flexbox mt-30">
              <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>
              <a class="btn btn-white" href="#">Older <i class="ti-arrow-right fs-9 ml-4"></i></a>
            </nav>
            <?php endif; ?>

          </div>

         <?php include 'includes/sidebar.php' ?>

        </div>
      </div>
    </div>
  </main>


  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row gap-y align-items-center">

        <div class="col-6 col-lg-3">
          <a href="../index.html"><img src="/codeBlog/assets/img/logo-dark.png" alt="logo"></a>
        </div>

        <div class="col-6 col-lg-3 text-right order-lg-last">
          <div class="social">
            <a class="social-facebook" href="https://www.facebook.com/thethemeio"><i class="fa fa-facebook"></i></a>
            <a class="social-twitter" href="https://twitter.com/thethemeio"><i class="fa fa-twitter"></i></a>
            <a class="social-instagram" href="https://www.instagram.com/thethemeio/"><i class="fa fa-instagram"></i></a>
            <a class="social-dribbble" href="https://dribbble.com/thethemeio"><i class="fa fa-dribbble"></i></a>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
            <a class="nav-link" href="../uikit/index.html">Elements</a>
            <a class="nav-link" href="../block/index.html">Blocks</a>
            <a class="nav-link" href="../page/about-1.html">About</a>
            <a class="nav-link" href="../blog/grid.html">Blog</a>
            <a class="nav-link" href="../page/contact-1.html">Contact</a>
          </div>
        </div>

      </div>
    </div>
  </footer><!-- /.footer -->


  <!-- Scripts -->
  <script src="/codeBlog/assets/js/page.min.js"></script>
  <script src="/codeBlog/assets/js/script.js"></script>
  <script src="/codeBlog/assets/js/jquery.timeago.js" type="text/javascript"></script>

  <script type="text/javascript">
   jQuery(document).ready(function() {
     $("time.timeago").timeago();
   });
</script>

</body>
</html>
