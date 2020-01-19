<?php update_cat(); ?>
<form class= "pt-2" method="POST" action="">
<h4>Update Category</h4>
  <div class="form-group">
    <label for="">Category Title</label>
    <?php
                  if (isset($_GET['edit'])) {
                      $cat_edit_id = $_GET['edit'];
                      $query = "SELECT * FROM categories WHERE cat_id = '$cat_edit_id' ";
                      $select_categories = query($query);
                      confirm($select_categories);
                      $row = fetch_array($select_categories);
                      $cat_title = $row['cat_name'];
                  }
                  ?>

    <input type="text" name="cat_name" value="<?php echo $cat_title; ?>" class="form-control" placeholder=""
      aria-describedby="helpId">
  </div>
  <div class="form-group">
    <button name="update-cat" type="submit" class="btn btn-success" btn-lg">Update</button>
  </div>
</form>
