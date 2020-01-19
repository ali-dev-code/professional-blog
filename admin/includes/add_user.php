<div class = "col-sm-6 m-auto" >
<?php add_user(); ?>
</div>
<div class="card">
  <div class="card-header bg-dark text-white">
    <i class="fa fa-plus mr-1" aria-hidden="true"></i>
    <h6 class="d-inline">Add User</h6>
  </div>
  <div class="card-body">
    <form method="POST" action=""  enctype="multipart/form-data" >
      <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" name="f_name" id="f_name" class="form-control" required  placeholder="" aria-describedby="helpId">
      </div>
      <div class="form-group">
        <label for="l_name">Last Name</label>
        <input type="text" name="l_name" id="l_name" class="form-control" required placeholder="" aria-describedby="helpId">
      </div>
        <label class="d-block" for="u_role">Role</label>
        <select class="mb-3" name="u_role"  id="post_category">
        <option value="subscriber">Select one</option>
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>

        </select>

        <div class="form-group">
        <label for="u_name"> UserName</label>
        <input type="text" name="u_name" id="u_name" class="form-control" required  placeholder="" aria-describedby="helpId">
      </div>
      <div class="form-group">
        <label for="u_mail">Email</label>
        <input type="email" name="u_mail" id="u_mail" class="form-control" required  placeholder="" aria-describedby="helpId">
      </div>
      <div class="form-group">
        <label for="u_pass">Password</label>
        <input type="password" name="u_pass" id="U_pass" class="form-control" required placeholder="" aria-describedby="helpId">
      </div>

    <!--<div class="form-group">
        <label for="post_img">Post Image</label>
        <input type="file" name="post_image" id="post_img" class="form-control" placeholder="" aria-describedby="helpId">
      </div>
      -->

      <div class="form-group">
        <button name="add-user" type="submit" name="submit" class="btn btn-success" btn-lg">Add Now</button>
      </div>

    </form>
  </div>
</div>
