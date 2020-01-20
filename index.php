<?php require_once 'includes/header.php' ?>
<!-- /.header -->


<!-- Main Content -->
<main class="main-content">
  <div class="section bg-gray">
    <div class="container">
      <div> <?php  errorMsg(); ?> </div>
      <div class="row">

        <div class="col-md-8 col-xl-9">
          <div class="row gap-y">

            <?php

         $count_sql = " SELECT * FROM posts ";
         $select_count =  query($count_sql);
         $count = row_count($select_count);
         $count = ceil($count/1);
        // $count = ceil($count/$per_page);
        // $post_pages = ceil($count/4);
  // $per_page = 2;
        if (isset($_GET['page'])) {

        $page = $_GET['page'];
        } else {
          $page = 1;
        }

        if ($page == "" || $page == 1) {
         $page_1 = 0 ;
        }else {
          $page_1 = ($page * 1)-1;
        //  $page_1 = ($page *$per_page )-$per_page;
        }




        //for search SearchButton
        if (isset($_GET['search'])) {
            $Search = escape($_GET['search']);
            $showPost = "SELECT * FROM posts
          WHERE post_tags LIKE '%$Search%' OR post_title LIKE '%$Search%' AND post_status = 'published' ORDER By post_id DESC LIMIT $page_1 , 1  ";
        }

        else {
            $showPost = " SELECT * FROM posts WHERE post_status = 'published' ORDER By post_id DESC LIMIT $page_1 , 1 ";
        }
          $executeShowPost = query($showPost);
          confirm($executeShowPost);
          if (row_count($executeShowPost) > 0) {
              while ($row = fetch_array($executeShowPost)) {
                $post_cat_id  = $row['category_id'];
                  ?>
            <div class="col-md-6">
              <div class="card border hover-shadow-6 mb-6 d-block">
                <a href="post/<?php echo $row['post_id']; ?>"><img class="card-img-top"
                    src="assets/img/thumb/<?php echo $row['post_image']; ?>" alt="Card image cap"></a>
                <div class="p-6 text-center">

                  <?php

                      $find_cat_name = " SELECT * FROM categories WHERE cat_id = '$post_cat_id' ";
                      $execute_cat_name = query($find_cat_name);
                      confirm($execute_cat_name);
                      $row2 = fetch_array($execute_cat_name);
                      $cat_name = $row2['cat_name'];

                      ?>



                  <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#"><?php echo $cat_name; ?></a></p>
                  <h5 class="mb-0"><a class="text-dark"
                      href="post.php?p_id=<?php echo $row['post_id']; ?>"><?php echo $row['post_title']; ?></a></h5>

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


          <nav class="flexbox mt-30">

            <a class="btn btn-white <?php if($page <= 1){ echo 'disabled'; } ?>"
              href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); }
               if (isset($_GET['search'])) {
                echo "&search={$Search}";
                }

              ?>">
              <i class="ti-arrow-left fs-9 mr-4"></i> Prev
            </a>
            <a class="btn btn-white <?php if($page >= $count){ echo 'disabled'; }
              if (row_count($executeShowPost) == 0) {
                echo 'disabled';
              }
            ?> "
              href="<?php if($page >= $count){ echo '#'; } else { echo "?page=".($page + 1); }
               if (isset($_GET['search'])) {
                echo "&search={$Search}";
                }

              ?>">Next <i
                class="ti-arrow-right fs-9 ml-4"></i></a>
          </nav>


          <!--
             <nav>
            <ul class="pagination  pagination-sm">
 <?php

//for ($i=1; $i <=$count ; $i++) {

 //if ($i == $page) {
//echo "<li class='page-item active '>  <a class='page-link' href='index.php?page={$i}'>  {$i} </a> </li>";
 //} else {
 // echo "<li class='page-item '>  <a class='page-link' href='index.php?page={$i}'>  {$i} </a> </li>";
// }

//}
//?>

</ul>
</nav>

            -->

        </div>

        <?php include 'includes/sidebar.php' ?>

      </div>
    </div>
  </div>
</main>

<?php include 'includes/footer.php'; ?>
