
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
<?php
	include("header.php");
	include("../../connect.php");
?>

<section class="page-title">
            <div class="title pattern-default">
                <span class="subtitle">
                    Quản lý Thông tin Metadata</span>
            </div>                     
        </section>
 <div class="container_12">
 <?php 

//lay bien get ID tren thanh dia chi
$id = $_GET["id"];
$sql = "select * from metadata where id_meta =".$id;
$result = pg_query($con, $sql)or die();
$row = pg_fetch_array($result);
?>
    <h4>Sửa thông tin </h4>
  <form action="bv_update.php" class="form-horizontal" role="form" method="post" enctype="multipart/form-data" >
  <input name="id" type="hidden" value="<?php echo $id  ?>" />
	 <!-------->
	 <div class="form-group">
      <label class="control-label col-sm-2" for="ten_nhom">Format</label>
      <div class="col-sm-4">
        <input type="text"  class="form-control" id="format" name="format" value="<?php echo $row["format"] ?>"  required="required">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="ten_nhom">Raster</label>
      <div class="col-sm-4">
        <input type="text"  class="form-control" id="raster" value="<?php echo $row["raster"] ?>" name="raster"  required="required">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="ten_nhom">ID</label>
      <div class="col-sm-4">
        <input type="text"  class="form-control" id="id_met" value="<?php echo $row["id_met"] ?>" name="id_met"  required="required">
      </div>
    </div>
   <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">MapName</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="mapname"  name="mapname"  required="required"><?php echo $row["mapname"] ?></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Geometric Processing</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="GeometricProcessing" name="geometricprocessing"  required="required"><?php echo $row["geometricprocessing"] ?></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">RadiometricProcessing</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="RadiometricProcessing" name="radiometricprocessing"  required="required"><?php echo $row["radiometricprocessing"] ?></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Corner1</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="Corner1" name="corner1"  required="required"><?php echo $row["corner1"] ?></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Corner2</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="Corner2" name="corner2"  required="required"><?php echo $row["corner2"] ?></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Corner3</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="Corner3" name="corner3"  required="required"><?php echo $row["corner3"] ?></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Corner4</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="Corner4" name="corner4"  required="required"><?php echo $row["corner4"] ?></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">CornerC</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="CornerC" name="cornerc"  required="required"><?php echo $row["cornerc"] ?></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Geocoding</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="GeocodingTablesIdentification" name="geocodingtablesidentification"  required="required"><?php echo $row["geocodingtablesidentification"] ?></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Horizontal Type</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="HorizontalType" name="horizontaltype"  required="required"><?php echo $row["horizontaltype"] ?></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Horizontal Name</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="HorizontalName" name="horizontalname"  required="required"><?php echo $row["horizontalname"] ?></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Production Date</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="ProductionDate" name="productiondate"  required="required"><?php echo $row["productiondate"] ?></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Job identification</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="JobIdentification" name="jobidentification"  required="required"><?php echo $row["jobidentification"] ?></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Product type</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="ProductType" name="producttype"  ><?php echo $row["producttype"] ?></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Dataset Producer</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="DatasetProducer" name="datasetproducer"  ><?php echo $row["datasetproducer"] ?></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Hình ảnh</label>
      <div class="col-sm-8">
        <img style="width: 150px; height: 100px" src="<?php echo $row["hinhanh"] ?>" /><input type="file" class="form-control" id="hinhanh" name="hinhanh" />
      </div>
    </div>
  <!---->
	<!---------------------->
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Cập nhật</button>
      </div>
    </div>
  </form>  
  <!----->
 </div>         
<?php
include("../footer.php");
?>