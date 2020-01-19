
<?php require_once 'includes/admin-header.php'; ?>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <?php include 'includes/admin-sidebar.php' ?>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Categories</h2>
          </div>
        </div>

        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Categories        </li>
          </ul>
          <div> <?php  successMsg(); ?> </div>
        </div>
        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
              <!-- Basic Form-->
              <div class="col-lg-6">
                <div class="block">
                  <div class="title"><strong class="d-block">Add Category</strong><span class="d-block">Category Name shoud be unique.</span></div>
                  <div class="block-body">
                  <form method="POST" action="">
                  <?php add_cat(); ?>
                      <div class="form-group">
                        <label class="form-control-label">Category Name</label>
                        <input type="text" placeholder="Category Name" name="cat_title" class="form-control">
                      </div>

                      <div class="form-group">
                        <input type="submit" name="add-cat"  value="ADD" class="btn btn-primary">
                      </div>
                    </form>
                      <!-- add update edit category form -->
              <?php if (isset($_GET['edit'])): ?>
              <?php include 'includes/edit-category-from.php'; ?>


              <?php endif; ?>
                  </div>
                </div>
              </div>
              <!-- Horizontal Form-->
              <div class="col-lg-6">
              <div class="block margin-bottom-sm">
                  <div class="title"><strong>All Categories</strong></div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Category Title</th>
                          <th>Option</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        <?php
                          $query = 'SELECT * FROM categories';
                          $select_categories = query($query);
                          $srn = 0;
                          while ($row = fetch_array($select_categories)) {
                              $cat_id = $row['cat_id'];
                              $cat_title = $row['cat_name'];
                              $srn++; ?>

                          <th scope="row"><?php echo $srn; ?></th>
                          <td> <?php echo $cat_title; ?> </td>
                          <td>
                        <a class=" mb-1 btn  text-warning" href="categories.php?edit=<?php echo $cat_id; ?>"
                          role="button"><i class="fa fa-edit"></i>
                        </a>
                        <a onclick="return confirm('Are you sure to remove this categories ?')"
                          class=" mb-1 btn text-danger" href="categories.php?delete=<?php echo $cat_id; ?>"
                          role="button"> <i class="fa fa-trash    "></i>
                        </a>
                      </td>
                        </tr>
                          <?php } ?>

                      </tbody>
                    </table>
                    <?php cat_delete();  ?>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </section>
        <?php include 'includes/admin-footer.php' ?>
