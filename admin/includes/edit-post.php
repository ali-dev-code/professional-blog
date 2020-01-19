<?php update_post(); ?>




<?php

   if (isset($_GET['p_id'])) {


   $post_id_from_url  = $_GET['p_id'];

   $query = "SELECT * FROM posts WHERE post_id = '$post_id_from_url' " ;
   $select_posts = query($query);

   while ($row = fetch_array($select_posts)) {
       $post_id = $row['post_id'];
       $post_cat_id = $row['category_id'];
       $post_author = $row['post_author'];
       $post_title = $row['post_title'];
       $post_image = $row['post_image'];
       $post_content = $row['post_content'];
       $post_status = $row['post_status'];
       $post_tags = $row['post_tags'];
       $post_comment_count = $row['post_comment_count'];
       $post_date = $row['post_date'];

   }

   }
    ?>
    <div class="block">
  <div class="title"><strong class="d-block">Edit Post</strong><span class="d-block">A good post</span></div>
  <?php add_post(); ?>
  <div class="block-body">
<form method="POST" action="" enctype="multipart/form-data">
  <div class="form-group">
    <label for="post_title">Post Title</label>
    <input type="text" name="post_title" id="post_title" class="form-control" value="<?php echo $post_title ?>" placeholder=""
      aria-describedby="helpId">
  </div>

  <div class="form-group">
    <label for="post_category">Category</label>
    <select class="form-control" name="post_category" id="post_category">
      <?php

        $sql = " SELECT * FROM categories ";
        $result = query($sql);
        confirm($result);
        while ($row = fetch_array($result)) {
          echo "  <option value = '{$row['cat_id']}' >{$row['cat_name']}</option> ";
        }

        ?>


    </select>
  </div>

  <div class="form-group">
    <label for="post_author">Post Author</label>
    <input type="text" name="post_author" id="post_author" class="form-control" value="<?php echo $post_author ?>" placeholder=""
      aria-describedby="helpId">
  </div>
  <div class="form-group">
    <label for="post_content">Post Content</label>
    <input id="post_content" type="hidden" name="post_content" value="<?php echo $post_content ?>">
    <trix-editor input="post_content"></trix-editor>
  </div>
  <div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" name="post_status" id="post_status" class="form-control" value="<?php echo $post_status ?>" placeholder=""
      aria-describedby="helpId">
  </div>
  <h6>Default img</h6>
  <span> <img src="../assets/img/thumb/<?php echo $post_image; ?>" width="70px" height="55px"> </span>
  <div class="form-group mt-3">
    <label for="post_img">Post Image</label>
    <input type="file" name="post_image" id="post_img" class="form-control" placeholder="" aria-describedby="helpId">
  </div>
  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" name="post_tags" id="post_tags" class="form-control" value="<?php echo $post_tags ?>" placeholder=""
      aria-describedby="helpId">
  </div>
  <div class="form-group">
    <button name="update-post" type="submit" class="btn btn-success" btn-lg">Update Now</button>
  </div>

</form>
</div>
</div>
