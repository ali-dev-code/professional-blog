<div class="block">
  <div class="title"><strong class="d-block">Add Post</strong><span class="d-block">A good post</span></div>
  <?php add_post(); ?>
  <div class="block-body">
    <form method="POST" action="" enctype="multipart/form-data">
      <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" name="post_title" id="post_title" class="form-control" value="<?php echo $post_title ?>" placeholder=""
          aria-describedby="helpId">
      </div>
      <label class="d-block" for="post_category">Category</label>
      <select class="mb-3" name="post_category" id="post_category">
        <?php

        $sql = " SELECT * FROM categories ";
        $result = query($sql);
        confirm($result);
        while ($row = fetch_array($result)) {
          echo "  <option value = '{$row['cat_id']}' >{$row['cat_name']}</option> ";
        }

        ?>

      </select>

      <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" name="post_author" id="post_author" class="form-control" value="<?php echo $post_author ?>"
          placeholder="" aria-describedby="helpId">
      </div>
      <div class="form-group">
        <label for="post_content">Post Content</label>
        <input id="post_content" type="hidden" name="post_content" value="<?php echo $post_content ?>">
        <trix-editor input="post_content"></trix-editor>
      </div>
      <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" name="post_status" id="post_status" class="form-control" placeholder="" aria-describedby="helpId">
      </div>
      <div class="form-group">
        <label for="post_img">Post Image</label>
        <input type="file" name="post_image" id="post_img" class="form-control" placeholder="" aria-describedby="helpId">
      </div>
      <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" name="post_tags" id="post_tags" class="form-control" value="<?php echo $post_tags ?>" placeholder=""
          aria-describedby="helpId">
      </div>
      <div class="form-group">
        <button name="add-post" type="submit" class="btn btn-success" btn-lg">Add Now</button>
      </div>

    </form>
  </div>
</div>
