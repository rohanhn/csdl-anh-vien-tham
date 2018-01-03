<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<?php
	include("header.php");
?>
<?php
if(($_FILES["hinhanh"]["size"])>0)
{
	$tenfile1 = $_FILES["hinhanh"]["name"];
	$duongdanfile1 = "images/".$tenfile1;
	copy($_FILES["hinhanh"]["tmp_name"],$duongdanfile1);
} else $duongdanfile1 = "";
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y-m-d');
$sql = "insert into  metadata (raster, format, id_met, mapname, date, 
geometricprocessing, 
radiometricprocessing, 
corner1, corner2, corner3, corner4, cornerc, 
geocodingtablesidentification,
horizontaltype, horizontalname, productiondate, jobidentification, producttype, datasetproducer, hinhanh) 
values 
('".$_POST["raster"]."', '".$_POST["format"]."', '".$_POST["id_met"]."', '".$_POST["mapname"]."','".$date."' , 
'".$_POST["GeometricProcessing"]."', 
'".$_POST["RadiometricProcessing"]."', 
'".$_POST["Corner1"]."','".$_POST["Corner2"]."', '".$_POST["Corner3"]."', '".$_POST["Corner4"]."', '".$_POST["CornerC"]."', 
'".$_POST["GeocodingTablesIdentification"]."', '".$_POST["HorizontalType"]."', '".$_POST["HorizontalName"]."', '".$_POST["ProductionDate"]."', '".$_POST["JobIdentification"]."','".$_POST["ProductType"]."','".$_POST["DatasetProducer"]."', '".$duongdanfile1."' )";
	pg_query($con, $sql)or die("Lỗi");	
	echo '<div class="alert alert-success">
  <strong>Thêm thông tin thành công!</strong>
  <p><a href="index.php">Danh sách </a> </p>
</div>';
?>
        
<?php
include("../footer.php");
?>