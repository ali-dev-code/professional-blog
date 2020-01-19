
 <div class="block margin-bottom-sm">
                  <div class="title"><strong>All Posts</strong></div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                        <th>#</th>
                      <th>Author</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Status</th>
                      <th>Image</th>
                      <th>Tags</th>
                      <th>Comments</th>
                      <th>Date</th>
                      <th>Option</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        <?php

                    $query = 'SELECT * FROM posts';
                    $select_posts = query($query);
                    $srn = 0;
                    while ($row = fetch_array($select_posts)) {
                        $post_id = $row['post_id'];
                        $post_cat_id = $row['category_id'];
                        $srn++; ?>

                          <th scope="row"><?php echo $srn; ?></th>
                          <td> <?php echo $row['post_author']; ?> </td>
                      <td> <?php echo substr($row['post_title'],0,12).".."; ?> </td>
                      <?php

                      $find_cat_name = " SELECT * FROM categories WHERE cat_id = '$post_cat_id' ";
                      $execute_cat_name = query($find_cat_name);
                      confirm($execute_cat_name);
                      $row2 = fetch_array($execute_cat_name);
                      $cat_name = $row2['cat_name'];

                      ?>
                      <td> <?php echo $cat_name; ?> </td>
                      <td> <?php echo $row['post_status']; ?> </td>
                      <td> <img src="../assets/img/thumb/<?php echo $row['post_image']; ?>" alt="" width="60px" height="50px" >  </td>
                      <td> <?php echo substr($row['post_tags'], 0,6).".."; ?> </td>
                      <td> <?php echo $row['post_comment_count']; ?> </td>
                      <td> <?php echo $row['post_date']; ?> </td>
                      <td>
                        <a class=" mb-1 btn  text-warning" href="posts.php?source=edit-post&p_id=<?php echo $post_id; ?>"
                          role="button"><i class="fa fa-edit"></i>
                        </a>
                        <a onclick="return confirm('Are you sure to remove this categories ?')"
                          class=" mb-1 btn text-danger" href="posts.php?delete=<?php echo $post_id; ?>"
                          role="button"> <i class="fa fa-trash    "></i>
                        </a>
                      </td>
                        </tr>
                    <?php } ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>







<?php
delete_post();

?>
