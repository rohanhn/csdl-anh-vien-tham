<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<style>
.container_12{
	font-family:Arial, Helvetica, sans-serif;
}
</style>
<?php
	include("header.php");
?>

<script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>

<section class="page-title">
            <div class="title pattern-default">
                <span class="subtitle">
                    Quản lý Thông tin Metadata </span>
            </div>                     
        </section>
 <div class="container_12">
    <!----->
    <h4>Thêm mới </h4>
  <form action="bv_insert.php" class="form-horizontal" role="form" method="post" enctype="multipart/form-data" >
    <div class="form-group">
      <label class="control-label col-sm-2" for="ten_nhom">Format</label>
      <div class="col-sm-4">
        <input type="text"  class="form-control" id="title" name="format"  required="required">
      </div>
	  </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="ten_nhom">Raster</label>
      <div class="col-sm-4">
        <input type="text"  class="form-control" id="title" name="raster"  required="required">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="ten_nhom">ID</label>
      <div class="col-sm-4">
        <input type="text"  class="form-control" id="title" name="id_met"  required="required">
      </div>
    </div>
	 <div class="form-group">
	   <label class="control-label col-sm-2" for="ten_nhom">MapName</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="des" name="mapname"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Geometric Processing</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="des" name="GeometricProcessing"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">RadiometricProcessing</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="des" name="RadiometricProcessing"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Corner1</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="des" name="Corner1"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Corner2</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="des" name="Corner2"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Corner3</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="des" name="Corner3"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Corner4</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="des" name="Corner4"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">CornerC</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="des" name="CornerC"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Geocoding</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="des" name="GeocodingTablesIdentification"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Horizontal Type</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="des" name="HorizontalType"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Horizontal Name</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="des" name="HorizontalName"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Production Date</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="des" name="ProductionDate"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Job identification</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="des" name="JobIdentification"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Product type</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="des" name="ProductType"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Dataset Producer</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="des" name="DatasetProducer"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Hình ảnh</label>
      <div class="col-sm-8">
        <input type="file" class="form-control" id="des" name="hinhanh" />
      </div>
    </div>
	<!---->
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Thêm mới</button>
        
      </div>
    </div>
  </form>
    
    <!----->
 </div>
         
<?php
include("../footer.php");
?>