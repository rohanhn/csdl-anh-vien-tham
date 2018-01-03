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
                  <span style="color: #8EC91D; font-size: 26px; font-family:Arial, Helvetica, sans-serif">Meta Data</span>
                </div>
				<center>
                <div class="content-panel-body shortcode-content">
                  <?php
                  $id_meta = $_GET["id_meta"];
                  $con = pg_connect("host='localhost' port='5432' dbname='vientham' user='postgres' password='123456' ") or die('unable to connect database');
                  $sql = "select * from metadata where id_meta=".$id_meta;
                  $re = pg_query($con, $sql)or die("Lỗi");
                  $row = pg_fetch_array($re);
                  echo '<div class="content-panel-title">';
                  echo '<h4 style="color:#00CC00">'.$row["mapname"].'</h4>';
                  echo '</div>';
				  echo '';
                  echo '<img style="width:500px" src="quantri/metadata/'.$row["hinhanh"].'" alt="" />';
                  ?>
				  
                </div>
				</center>
              <!-- END .content-panel -->
              </div>

            <!-- END .content-block-single -->
            </div>

          </div>
			<form action="bv_update.php" class="form-horizontal" role="form" method="post" enctype="multipart/form-data" disabled >
			  <input name="id" type="hidden" value="<?php echo $id  ?>" />
				 <!-------->
				 <div class="form-group">
				  <label class="control-label col-sm-2" for="ten_nhom">Format</label>
				  <div class="col-sm-4">
					<input type="text"  class="form-control" id="format" name="format" value="<?php echo $row["format"] ?>" disabled>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="ten_nhom">Raster</label>
				  <div class="col-sm-4">
					<input type="text"  class="form-control" id="raster" value="<?php echo $row["raster"] ?>" name="raster" disabled  required="required">
				  </div>
				</div>
				<!--<div class="form-group">
				  <label class="control-label col-sm-2" for="ten_nhom">ID</label>
				  <div class="col-sm-4">
					<input type="text"  class="form-control" id="id_met" value="<?php echo $row["id_met"] ?>" name="id_met"  required="required">
				  </div>
				</div>-->
				<div class="form-group">
				 <label class="control-label col-sm-2" for="ten_nhom">Geometric Processing</label>
				  <div class="col-sm-8">
					<textarea type="text"  class="form-control" id="GeometricProcessing" disabled name="geometricprocessing"  required="required"><?php echo $row["geometricprocessing"] ?></textarea>
				  </div>
				</div>
				<div class="form-group">
				 <label class="control-label col-sm-2" for="ten_nhom">RadiometricProcessing</label>
				  <div class="col-sm-8">
					<textarea type="text"  class="form-control" id="RadiometricProcessing" disabled name="radiometricprocessing"  required="required"><?php echo $row["radiometricprocessing"] ?></textarea>
				  </div>
				</div>
				<div class="form-group">
				 <label class="control-label col-sm-2" for="ten_nhom">Corner1</label>
				  <div class="col-sm-8">
					<textarea type="text"  class="form-control" id="Corner1" name="corner1" disabled  required="required"><?php echo $row["corner1"] ?></textarea>
				  </div>
				</div>
				<div class="form-group">
				 <label class="control-label col-sm-2" for="ten_nhom">Corner2</label>
				  <div class="col-sm-8">
					<textarea type="text"  class="form-control" id="Corner2" name="corner2" disabled required="required"><?php echo $row["corner2"] ?></textarea>
				  </div>
				</div>
				<div class="form-group">
				 <label class="control-label col-sm-2" for="ten_nhom">Corner3</label>
				  <div class="col-sm-8">
					<textarea type="text"  class="form-control" id="Corner3" name="corner3" disabled required="required"><?php echo $row["corner3"] ?></textarea>
				  </div>
				</div>
				<div class="form-group">
				 <label class="control-label col-sm-2" for="ten_nhom">Corner4</label>
				  <div class="col-sm-8">
					<textarea type="text"  class="form-control" id="Corner4" name="corner4" disabled required="required"><?php echo $row["corner4"] ?></textarea>
				  </div>
				</div>
				<div class="form-group">
				 <label class="control-label col-sm-2" for="ten_nhom">CornerC</label>
				  <div class="col-sm-8">
					<textarea type="text"  class="form-control" id="CornerC" name="cornerc" disabled required="required"><?php echo $row["cornerc"] ?></textarea>
				  </div>
				</div>
				<div class="form-group">
				 <label class="control-label col-sm-2" for="ten_nhom">Geocoding</label>
				  <div class="col-sm-8">
					<textarea type="text"  class="form-control" id="GeocodingTablesIdentification" disabled name="geocodingtablesidentification"  required="required"><?php echo $row["geocodingtablesidentification"] ?></textarea>
				  </div>
				</div>
				<div class="form-group">
				 <label class="control-label col-sm-2" for="ten_nhom">Horizontal Type</label>
				  <div class="col-sm-8">
					<textarea type="text"  class="form-control" id="HorizontalType" name="horizontaltype" disabled required="required"><?php echo $row["horizontaltype"] ?></textarea>
				  </div>
				</div>
				<div class="form-group">
				 <label class="control-label col-sm-2" for="ten_nhom">Horizontal Name</label>
				  <div class="col-sm-8">
					<textarea type="text"  class="form-control" id="HorizontalName" name="horizontalname" disabled required="required"><?php echo $row["horizontalname"] ?></textarea>
				  </div>
				</div>
				<div class="form-group">
				 <label class="control-label col-sm-2" for="ten_nhom">Production Date</label>
				  <div class="col-sm-8">
					<textarea type="text"  class="form-control" id="ProductionDate" name="productiondate" disabled required="required"><?php echo $row["productiondate"] ?></textarea>
				  </div>
				</div>
				<div class="form-group">
				 <label class="control-label col-sm-2" for="ten_nhom">Dataset Producer</label>
				  <div class="col-sm-8">
					<textarea type="text" disabled class="form-control" id="DatasetProducer" name="datasetproducer"><?php echo $row["datasetproducer"] ?></textarea>
				  </div>
				</div>

				<div class="form-group">
				 <label class="control-label col-sm-2" for="ten_nhom">VIEWING_ANGLE_ALONG</label>
				  <div class="col-sm-8">
					<textarea type="text"  class="form-control" disabled id="DatasetProducer" name="view_along"><?php echo $row["view_along"] ?></textarea>
				  </div>
				</div>
				 <div class="form-group">
				 <label class="control-label col-sm-2" for="ten_nhom">VIEWING_ANGLE_ACROSS</label>
				  <div class="col-sm-8">
					<textarea type="text"  class="form-control" id="DatasetProducer" disabled name="view_across"  ><?php echo $row["view_across"] ?></textarea>
				  </div>
				</div>
				 <div class="form-group">
				 <label class="control-label col-sm-2" for="ten_nhom">SATELLITE_INCIDENCE</label>
				  <div class="col-sm-8">
					<textarea type="text"  class="form-control" id="DatasetProducer" disabled name="incidence"  ><?php echo $row["incidence"] ?></textarea>
				  </div>
				</div>
				 <div class="form-group">
				 <label class="control-label col-sm-2" for="ten_nhom">SATELLITE_AZIMUTH</label>
				  <div class="col-sm-8">
					<textarea type="text"  class="form-control" id="DatasetProducer" disabled name="azimuth"  ><?php echo $row["azimuth"] ?></textarea>
				  </div>
				</div>
				 <div class="form-group">
				 <label class="control-label col-sm-2" for="ten_nhom">SUN_AZIMUTH</label>
				  <div class="col-sm-8">
					<textarea type="text"  class="form-control" id="DatasetProducer" disabled name="sun_azimuth"  ><?php echo $row["sun_azimuth"] ?></textarea>
				  </div>
				</div>
				<div class="form-group">
				 <label class="control-label col-sm-2" for="ten_nhom">SUN_ELEVATION</label>
				  <div class="col-sm-8">
					<textarea type="text"  class="form-control" id="DatasetProducer" disabled name="sun_elevation"  ><?php echo $row["sun_elevation"] ?></textarea>
				  </div>
				</div>
				<div class="form-group">
				 <label class="control-label col-sm-2" for="ten_nhom">REVOLUTION_NUMBER</label>
				  <div class="col-sm-8">
					<textarea type="text"  class="form-control" id="DatasetProducer" disabled name="revolution_number" ><?php echo $row["revolution_number"] ?></textarea>
				  </div>
				</div>
				<div class="form-group">
				 <label class="control-label col-sm-2" for="ten_nhom">File Report</label>
				  <div class="col-sm-8">
					<a target = "_blank" href="quantri/metadata/<?php  echo $row["file_report"]?>"><?php  echo $row["file_report"] ?></a>
				  </div>
				</div>
				</form>
  <!---->
        </div>
        <!-- END .wrapper -->
      </section>
      <!-- BEGIN .content -->
  </div>
    <!--End Bản đồ-->
<?php
include("footer.php");
?>
