


  <div class="block margin-bottom-sm">
          <div class="title"><strong>All Users</strong></div>
          <div class="table-responsive">
      <table class="table table-bordered  table-hover">
        <thead class="thead-inverse">
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Fisrtname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
            <th>Date</th>
            <th>Change Role</th>
            <th>Edit</th>

            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $query = 'SELECT * FROM users ';
          $select_posts = query($query);
          $srn = 0;
          while ($row = fetch_array($select_posts)) {
              $u_id = $row['u_id'];

              $srn++; ?>
          <tr>
            <td scope="row"><?php echo $srn; ?></td>
            <td> <?php echo $row['u_username']; ?> </td>


            <td> <?php echo $row['u_fname']; ?> </td>
            <td> <?php echo $row['u_lname']; ?> </td>
            <td> <?php echo $row['u_email']; ?> </td>
            <td> <?php echo $row['u_role']; ?> </td>
            <td> date </td>
            <td>

            <a  class="text-success" href="users.php?change_to_admin=<?php echo $u_id; ?>">Admin</a>
            /
            <a href="users.php?change_to_sub=<?php echo $u_id; ?>">Subcriber</a>

            </td>


            <td class = " text-center" >

              <a
                class=" btn  text-white text-primary text-center btn-sm " href="users.php?source=edit_user&edit=<?php echo $u_id; ?>"
                role="button"> <i class="fa fa-edit   "></i>
              </a>

            </td>

            <td class = " text-center" >
              <a onclick="return confirm('Are you sure to remove this comment ?')" class=" mb-1 btn btn-sm text-danger "
                href="users.php?delete=<?php echo $u_id; ?>" role="button"> <i class="fa fa-trash    "></i>
              </a>
            </td>

          </tr>
          <?php
          } ?>

        </tbody>
      </table>
      <?php u_delete(); ?>
      <?php u_role_sub(); ?>
      <?php u_role_admin(); ?>

    </div>
    </div>
    </div>

<?php
delete_post();

?>
