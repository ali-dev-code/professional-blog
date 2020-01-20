


    <div class="table-responsive  ">
      <table class="table table-bordered  table-hover">
        <thead class="thead-inverse">
          <tr>
            <th>No</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>Response to</th>
            <th>Time</th>
            <th>Approve</th>
            <th>UnApprove</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $query = 'SELECT * FROM comments ORDER BY c_id DESC';
          $select_posts = query($query);
          $srn = 0;
          while ($row = fetch_array($select_posts)) {
              $c_id = $row['c_id'];
              $comment_post_id = $row['comment_post_id'];
              $srn++; ?>
          <tr>
            <td scope="row"><?php echo $srn; ?></td>
            <td> <?php echo $row['comment_author']; ?> </td>
            <td> <?php echo $row['comment_content']/** ,0,12*/; ?> </td>

            <td> <?php echo $row['comment_email']; ?> </td>
            <td> <?php echo $row['comment_status']; ?> </td>

            <?php

                            $find_post_name = " SELECT * FROM posts WHERE post_id = '$comment_post_id' ";
                            $execute_post_name = query($find_post_name);
                            confirm($execute_post_name);
                            $row2 = fetch_array($execute_post_name);
                            $post_name = $row2['post_title'];

                            ?>
            <td>  <a href="../post.php?p_id=<?php echo $row['comment_post_id'] ?>"><?php echo substr($post_name,0,12); ?></a>  </td>

            <td> <time class="timeago float " datetime="<?php echo $row['comment_time']; ?>"></time> </td>


            <td class = " text-center" >

              <a onclick="return confirm('Are you sure to approve this comment ?')"
                class=" btn bg-success text-white text-center btn-sm " href="comments.php?approve=<?php echo $c_id; ?>"
                role="button"> <i class="fa fa-arrow-circle-up    "></i>
              </a>

            </td>
            <td class = " text-center">

              <a onclick="return confirm('Are you sure to UNapprove this comment ?')"
                class=" btn btn-danger text-white text-center btn-sm " href="comments.php?unapprove=<?php echo $c_id; ?>"
                role="button"> <i class="fa fa-arrow-circle-down    "></i>
              </a>

            </td>

            <td class = " text-center" >
              <a onclick="return confirm('Are you sure to remove this comment ?')" class=" mb-1 btn btn-sm text-white btn-danger"
                href="comments.php?delete=<?php echo $c_id; ?>" role="button"> <i class="fa fa-trash    "></i>
              </a>
            </td>

          </tr>
          <?php
          } ?>

        </tbody>
      </table>
      <?php c_delete(); ?>
      <?php c_un(); ?>
      <?php c_ap(); ?>
    </div>

<?php
delete_post();

?>
