




<div class="block">
  <div class="title"><strong class="d-block">Edit User</strong><span class="d-block">A good user</span></div>
  <?php update_user(); ?>
  <div class="block-body">
    <?php
    if (isset($_GET['edit'])) {
    $user_id = $_GET['edit'];
    }
    $sql = " SELECT * FROM users WHERE u_id = '$user_id' ";
    $execute = query($sql);

    while ($row = fetch_array($execute)) {
      $u_fname = $row['u_fname'];
      $u_lname = $row['u_lname'];
      $u_role = $row['u_role'];
      $u_username = $row['u_username'];
      $u_email = $row['u_email'];
      $u_password = $row['u_password'];
    }

    ?>
    <form method="POST" action=""  enctype="multipart/form-data" >
      <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" name="f_name" id="f_name"  value="<?php echo $u_fname; ?>" class="form-control" required  placeholder="" aria-describedby="helpId">
      </div>
      <div class="form-group">
        <label for="l_name">Last Name</label>
        <input type="text" name="l_name" id="l_name" class="form-control"  value="<?php echo $u_lname; ?>" required placeholder="" aria-describedby="helpId">
      </div>
        <label class="d-block" for="u_role">Role</label>
        <select class="mb-3" name="u_role"  id="post_category">
        <option value="subscriber"><?php echo $u_role; ?></option>
        <?php
        if ($u_role == 'admin') {
        echo "  <option value='subscriber'>subscriber</option>";
        } else {
          echo "  <option value ='admin'>admin</option>";
        }

        ?>


        </select>

        <div class="form-group">
        <label for="u_name"> UserName</label>
        <input type="text" name="u_name" id="u_name" class="form-control" required  value="<?php echo $u_username; ?>" placeholder="" aria-describedby="helpId">
      </div>
      <div class="form-group">
        <label for="u_mail">Email</label>
        <input type="email" name="u_mail" id="u_mail" class="form-control" required  value="<?php echo $u_email; ?>" placeholder="" aria-describedby="helpId">
      </div>
      <div class="form-group">
        <label for="u_pass">Password</label>
        <input type="password" name="u_pass" id="U_pass" class="form-control"  value="<?php echo $u_password; ?>" required placeholder="" aria-describedby="helpId">
      </div>

    <!--<div class="form-group">
        <label for="post_img">Post Image</label>
        <input type="file" name="post_image" id="post_img" class="form-control" placeholder="" aria-describedby="helpId">
      </div>
      -->

      <div class="form-group">
        <button  type="submit" name="up-user" class="btn btn-success" btn-lg">Update Now</button>
      </div>
      </div>
      </div>

    </form>
