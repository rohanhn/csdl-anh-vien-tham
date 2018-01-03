<?php
  include("header.php");
?>
<link type="text/css" rel="stylesheet" href="css/reset.css" />
    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="css/weather-icons.min.css" />
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="css/dat-menu.css" />
    <link type="text/css" rel="stylesheet" href="css/main-stylesheet.css" />
    <link type="text/css" rel="stylesheet" href="css/ot-lightbox.css" />
    <link type="text/css" rel="stylesheet" href="css/shortcodes.css" />
    <link type="text/css" rel="stylesheet" href="css/responsive.css" />
    <link type="text/css" rel="stylesheet" href="css/demo-settings.css" />  
    <!-- Scripts -->
    <script type="text/javascript" src="js/dat-menu.js"></script>
    <script type="text/javascript" src="js/theme-scripts.js"></script>
    <script type="text/javascript" src="js/ot-lightbox.js"></script>
  <!-- Main Content -->
  <div class="container-fluid" style="font-size: 12px; font-family:Arial, Helvetica, sans-serif">
    <!--Bản đồ-->
    <section class="content">
        
        <!-- BEGIN .wrapper -->
        <div class="wrapper">

          <div class="content-block has-sidebar">

            <!-- BEGIN .content-block-single -->
            <div class="content-block-single">
              <!-- BEGIN .content-panel -->
              <div class="content-panel">
                <div class="content-panel-title">
                  <span style="color: #8EC91D; font-size: 26px; font-family:Arial, Helvetica, sans-serif">TIN TỨC</span>
                </div>
                <div class="content-panel-body article-list">
                <!-----------Bài viết------------->
                <?php 
                  $con = pg_connect("host='localhost' port='5432' dbname='vientham' user='postgres' password='123456' ") or die('unable to connect database');
                  $sql = "select * from tbbaiviet where 1=1 ORDER BY id_news DESC";
                  $re = pg_query($con, $sql)or die("Lỗi");
                  while($row = pg_fetch_array($re))
                  {
                ?>
                <div class="item" data-color-top-slider="#8EC91D">
                    <div class="item-header">
                      <a href="#">
                        <span class="read-more-wrapper"><span class="read-more">Xem chi tiết<i></i></span></span>
                        <img style="width:326.05px; height:220.03px" src="quantri/baiviet/<?php echo $row["hinhanh"] ?>" alt="" />
                      </a>
                    </div>
                    <div class="item-content">
                      <h3><a href="detail.php?id=<?php echo $row["id_news"] ?>"><?php echo $row["tieude"] ?></a></h3>
                      <span class="item-meta">
                        <a href="detail.php?id=<?php echo $row["id_news"] ?>"><i class="fa fa-clock-o"></i><?php echo $row["thoigian"] ?></a>
                      </span>
                      <p><?php echo substr($row["mota"],0,99)."..." ?></p>
                      <a href="detail.php?id=<?php echo $row["id_news"] ?>" class="read-more-button">Xem chi tiết<i class="fa fa-mail-forward"></i></a>
                    </div>
                  </div>
                  <?php
                    }
                  ?>
                </div>
                <!-----------END------------->
                
                <!-----------Phân trang------------->
                <div class="content-panel-body pagination">
                  <a class="prev page-numbers" href="#"><i class="fa fa-angle-left"></i>Previous</a>
                  
                  <a class="next page-numbers" href="#">Next<i class="fa fa-angle-right"></i></a>
                </div>
              <!-- END .content-panel -->
              </div>

            <!-- END .content-block-single -->
            </div>

            <!-- BEGIN .sidebar -->
            <aside class="sidebar">

              <div class="widget">
                <h3>Tin mới nhất</h3>
                <div class="widget-article-list">
                  <?php 
                  $con = pg_connect("host='localhost' port='5432' dbname='vientham' user='postgres' password='123456' ") or die('unable to connect database');
                  $sql = "select * from tbbaiviet where 1=1 ORDER BY id_news DESC";
                  $re = pg_query($con, $sql)or die("Lỗi");
                  while($row = pg_fetch_array($re))
                  {
                ?>
                  <div class="item">
                    <div class="item-header">
                      <a href="detail.php?id=<?php echo $row["ID"] ?>">
                      <img style="width:50px; height:50px" src="quantri/baiviet/<?php echo $row["hinhanh"] ?>" alt="" /></a>
                    </div>
                    <div class="item-content">
                      <h4><a href="detail.php?id=<?php echo $row["ID"] ?>"><?php echo $row["tieude"] ?></a></h4>
                      <span class="item-meta">
                        <a href="detail.php?id=<?php echo $row["ID"] ?>"><i class="fa fa-clock-o"></i><?php echo $Date ?></a>
                      </span>
                    </div>
                  </div>
                  <?php
                    }
                  ?>
                </div>
              </div>

              <div class="widget">
                <h3>Kết nối mạng xã hội của chúng tôi</h3>
                <div class="social-widget">
                  <div class="social-squares">
                    <a href="#" target="_blank" class="hover-color-facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" target="_blank" class="hover-color-twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" target="_blank" class="hover-color-google-plus"><i class="fa fa-google-plus"></i></a>
                    <a href="#" target="_blank" class="hover-color-rss"><i class="fa fa-rss"></i></a>
                    <a href="#" target="_blank" class="hover-color-youtube"><i class="fa fa-youtube-play"></i></a>
                    <a href="#" target="_blank" class="hover-color-linkedin"><i class="fa fa-linkedin"></i></a>
                    <a href="#" target="_blank" class="hover-color-dribbble"><i class="fa fa-dribbble"></i></a>
                    <a href="#" target="_blank" class="hover-color-pinterest"><i class="fa fa-pinterest-p"></i></a>
                  </div>
                </div>
              </div>

              
            <!-- END .sidebar -->
            </aside>
          </div>
<!-- END .wrapper -->
      </section>
      <!-- BEGIN .content -->
  </div>
    <!--End Bản đồ-->
<?php
include("footer.php");
?>
