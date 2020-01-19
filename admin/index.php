<?php require_once 'includes/admin-header.php'; ?>

  <!-- end of header-->

  <div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
   <?php include 'includes/admin-sidebar.php' ?>
    <!-- Sidebar Navigation end-->

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h2 class="h5 no-margin-bottom">Dashboard</h2>
        </div>
      </div>
      <section class="no-padding-top no-padding-bottom">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3 col-sm-6">
            <?php

              $usr_sql = ' SELECT * FROM users ';
              $result_usr_sql = query($usr_sql);
              $total_usrs = row_count($result_usr_sql);

              ?>
              <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                  <div class="title">
                    <div class="icon"><i class="icon-user-1"></i></div><strong>Users</strong>
                  </div>
                  <div class="number dashtext-1"><?php echo $total_usrs; ?></div>
                </div>
                <div class="progress progress-template">
                  <div role="progressbar" style="width: <?php echo $total_usrs; ?>%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"
                    class="progress-bar progress-bar-template dashbg-1"></div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
            <?php

            $post_sql = ' SELECT * FROM posts ';
            $result_post_sql = query($post_sql);
            $total_posts = row_count($result_post_sql);
            $post_sql_active = " SELECT * FROM posts WHERE post_status = 'published'";
            $result_post_active = query($post_sql_active);
            $total_posts_active = row_count($result_post_active);
            ?>
           <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                  <div class="title">

                    <div class="icon"><i class="icon-page"></i></div><strong> Total Posts  2</strong> <strong> Active Posts</strong>
                  </div>

                  <div class="number dashtext-2"><?php echo $total_posts_active; ?></div>
                </div>
                <div class="progress progress-template">
                  <div role="progressbar" style="width: <?php echo $total_posts_active/$total_posts*100; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                    class="progress-bar progress-bar-template dashbg-2"></div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
            <?php

              $cat_sql = ' SELECT * FROM categories ';
              $result_cat_sql = query($cat_sql);
              $total_cat = row_count($result_cat_sql);

              ?>
              <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                  <div class="title">
                    <div class="icon"><i class="icon-list-1"></i></div><strong>Categories</strong>
                  </div>
                  <div class="number dashtext-3"><?php echo $total_cat; ?></div>
                </div>
                <div class="progress progress-template">
                  <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"
                    class="progress-bar progress-bar-template dashbg-3"></div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
            <?php

                $cmt_sql = ' SELECT * FROM comments ';
                $result_cmt_sql = query($cmt_sql);
                $total_cmts = row_count($result_cmt_sql);
                $cmt_sql_app = " SELECT * FROM comments WHERE comment_status = 1";
                $result_cmt_active = query($cmt_sql_app);
                $total_cmt_active = row_count($result_cmt_active);

                ?>
              <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                  <div class="title">
                    <div class="icon"><i class="icon-new-file"></i></div> <strong> Comments <?php echo $total_cmts; ?></strong>
                    <strong> Approved </strong>
                  </div>
                  <div class="number dashtext-4"><?php echo  $total_cmt_active; ?></div>
                </div>
                <div class="progress progress-template">
                  <div role="progressbar" style="width: <?php echo $total_cmt_active/$total_cmts*100; ?>%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"
                    class="progress-bar progress-bar-template dashbg-4"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="no-padding-bottom">
        <div class="container-fluid">
          <div class="row">
          <div class="col-lg-12">
                <div class="bar-chart block chart">
                  <div class="title"><strong></strong></div>


                  <?php

                  $post_sql = " SELECT * FROM posts WHERE post_status = 'draft' ";
                  $result_post_draft = query($post_sql);
                  $total_posts_draft = row_count($result_post_draft);

                  $cmt_sql = " SELECT * FROM comments WHERE comment_status = 0 ";
                  $result_comments_draft = query($cmt_sql);
                  $total_cmts_draft = row_count($result_comments_draft);

                  $usr_sql = " SELECT * FROM users WHERE u_role = 'subscriber' ";
                  $result_usr_sub = query($usr_sql);
                  $total_usr_sub = row_count($result_usr_sub);





                  ?>

                  <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count' ],

          <?php

        $element_text = ['Users', 'Subscriber', 'Total Posts', 'Active Posts', 'Draft Posts', 'Categories', 'Comments' , 'Pending Comments'];
        $element_count = [$total_usrs,   $total_usr_sub , $total_posts, $total_posts_active, $total_posts_draft, $total_cat, $total_cmt_active, $total_cmts_draft];

  for ($i = 0; $i < 8 ; $i++) {

      echo "['{ $element_text[$i]}'" . ',' . " {$element_count[$i]}],";
  }

          ?>
 //  ['Posts', 1000],

        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          },
      colors: ['#7127AC'],
    backgroundColor: '#2D3035'
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
     <div id="columnchart_material" style=" height: 500px;"></div>
                </div>
              </div>

          </div>
        </div>
      </section>

      <!-- <section class="no-padding-bottom">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4">
              <div class="user-block block text-center">
                <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid">
                  <div class="order dashbg-2">1st</div>
                </div><a href="#" class="user-title">
                  <h3 class="h5">Richard Nevoreski</h3><span>@richardnevo</span>
                </a>
                <div class="contributions">950 Contributions</div>
                <div class="details d-flex">
                  <div class="item"><i class="icon-info"></i><strong>150</strong></div>
                  <div class="item"><i class="fa fa-gg"></i><strong>340</strong></div>
                  <div class="item"><i class="icon-flow-branch"></i><strong>460</strong></div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="user-block block text-center">
                <div class="avatar"><img src="img/avatar-4.jpg" alt="..." class="img-fluid">
                  <div class="order dashbg-1">2nd</div>
                </div><a href="#" class="user-title">
                  <h3 class="h5">Samuel Watson</h3><span>@samwatson</span>
                </a>
                <div class="contributions">772 Contributions</div>
                <div class="details d-flex">
                  <div class="item"><i class="icon-info"></i><strong>80</strong></div>
                  <div class="item"><i class="fa fa-gg"></i><strong>420</strong></div>
                  <div class="item"><i class="icon-flow-branch"></i><strong>272</strong></div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="user-block block text-center">
                <div class="avatar"><img src="img/avatar-6.jpg" alt="..." class="img-fluid">
                  <div class="order dashbg-4">3rd</div>
                </div><a href="#" class="user-title">
                  <h3 class="h5">Sebastian Wood</h3><span>@sebastian</span>
                </a>
                <div class="contributions">620 Contributions</div>
                <div class="details d-flex">
                  <div class="item"><i class="icon-info"></i><strong>150</strong></div>
                  <div class="item"><i class="fa fa-gg"></i><strong>280</strong></div>
                  <div class="item"><i class="icon-flow-branch"></i><strong>190</strong></div>
                </div>
              </div>
            </div>
          </div>
          <div class="public-user-block block">
            <div class="row d-flex align-items-center">
              <div class="col-lg-4 d-flex align-items-center">
                <div class="order">4th</div>
                <div class="avatar"> <img src="img/avatar-1.jpg" alt="..." class="img-fluid"></div><a href="#"
                  class="name"><strong class="d-block">Tomas Hecktor</strong><span class="d-block">@tomhecktor</span></a>
              </div>
              <div class="col-lg-4 text-center">
                <div class="contributions">410 Contributions</div>
              </div>
              <div class="col-lg-4">
                <div class="details d-flex">
                  <div class="item"><i class="icon-info"></i><strong>110</strong></div>
                  <div class="item"><i class="fa fa-gg"></i><strong>200</strong></div>
                  <div class="item"><i class="icon-flow-branch"></i><strong>100</strong></div>
                </div>
              </div>
            </div>
          </div>
          <div class="public-user-block block">
            <div class="row d-flex align-items-center">
              <div class="col-lg-4 d-flex align-items-center">
                <div class="order">5th</div>
                <div class="avatar"> <img src="img/avatar-2.jpg" alt="..." class="img-fluid"></div><a href="#"
                  class="name"><strong class="d-block">Alexander Shelby</strong><span class="d-block">@alexshelby</span></a>
              </div>
              <div class="col-lg-4 text-center">
                <div class="contributions">320 Contributions</div>
              </div>
              <div class="col-lg-4">
                <div class="details d-flex">
                  <div class="item"><i class="icon-info"></i><strong>150</strong></div>
                  <div class="item"><i class="fa fa-gg"></i><strong>120</strong></div>
                  <div class="item"><i class="icon-flow-branch"></i><strong>50</strong></div>
                </div>
              </div>
            </div>
          </div>
          <div class="public-user-block block">
            <div class="row d-flex align-items-center">
              <div class="col-lg-4 d-flex align-items-center">
                <div class="order">6th</div>
                <div class="avatar"> <img src="img/avatar-6.jpg" alt="..." class="img-fluid"></div><a href="#"
                  class="name"><strong class="d-block">Arther Kooper</strong><span class="d-block">@artherkooper</span></a>
              </div>
              <div class="col-lg-4 text-center">
                <div class="contributions">170 Contributions</div>
              </div>
              <div class="col-lg-4">
                <div class="details d-flex">
                  <div class="item"><i class="icon-info"></i><strong>60</strong></div>
                  <div class="item"><i class="fa fa-gg"></i><strong>70</strong></div>
                  <div class="item"><i class="icon-flow-branch"></i><strong>40</strong></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>-->


    <?php include 'includes/admin-footer.php' ?>
