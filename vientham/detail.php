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
          <!-- BEGIN .content -->
      <section class="content">
        <!-- BEGIN .wrapper -->
        <div class="wrapper">

          <div class="content-block">

            <!-- BEGIN .content-block-single -->
            <div class="content-block-single">
              
              <!-- BEGIN .content-panel -->
              <div class="content-panel" style="color:#000000">
                <div class="content-panel-title">
                  <span style="color: #8EC91D; font-size: 26px; font-family:Arial, Helvetica, sans-serif">TIN TỨC</span>
                </div>
                <div class="content-panel-body shortcode-content" >
                  <?php
                  $id = $_GET["id"];
                  $con = pg_connect("host='localhost' port='5432' dbname='vientham' user='postgres' password='123456' ") or die('unable to connect database');
                  $sql = "select * from tbbaiviet where id_news=".$id;
                  $re = pg_query($con, $sql)or die("Lỗi");
                  $row = pg_fetch_array($re);
                  echo '<div class="content-panel-title">';
                  echo '<h4 style="color:#00CC00">'.$row["tieude"].'</h4>';
                  echo '</div>';
                  echo '<img style="width:326.05px; height:220.03px" src="quantri/baiviet/'.$row["hinhanh"].'" alt="" />';
                  echo $row["noidung"];
                  echo $row["tacgia"];
                  ?>
                </div>
              <!-- END .content-panel -->
              </div>

            <!-- END .content-block-single -->
            </div>

          </div>
          
        </div>
        <!-- END .wrapper -->
      </section>
      <!-- BEGIN .content -->
  </div>
    <!--End Bản đồ-->
<?php
include("footer.php");
?>
