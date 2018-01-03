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
echo $sql = "insert into  metadata (raster, format, id_met, mapname, date, 
geometricprocessing, 
radiometricprocessing, 
corner1, corner2, corner3, corner4, cornerc, 
geocodingtablesidentification,
horizontaltype, horizontalname, productiondate, jobidentification, producttype, datasetproducer, hinhanh,
profile, frame_row1, frame_col1, frame_row2, frame_col2, frame_row3, frame_col3, frame_row4, frame_col4, source_id, mission, processing_level, geo_table, hori_type, hori_code, hori_name, job_id, pro_info, pro_type, pro_name, pro_url, pro_date, pro_level
) 
values 
('".$_POST["raster"]."', '".$_POST["format"]."', '".$_POST["id_met"]."', '".$_POST["mapname"]."','".$date."' , 
'".$_POST["GeometricProcessing"]."', 
'".$_POST["RadiometricProcessing"]."', 
'".$_POST["Corner1"]."','".$_POST["Corner2"]."', '".$_POST["Corner3"]."', '".$_POST["Corner4"]."', '".$_POST["CornerC"]."', 
'".$_POST["GeocodingTablesIdentification"]."', '".$_POST["HorizontalType"]."', '".$_POST["HorizontalName"]."', '".$_POST["ProductionDate"]."', '".$_POST["JobIdentification"]."','".$_POST["ProductType"]."','".$_POST["DatasetProducer"]."', '".$duongdanfile1."'
,'".$_POST["profile"]."','".$_POST["frame_row1"]."','".$_POST["frame_col1"]."','".$_POST["frame_row2"]."','".$_POST["frame_col2"]."','".$_POST["frame_row3"]."','".$_POST["frame_col3"]."','".$_POST["frame_row4"]."','".$_POST["frame_col4"]."','".$_POST["source_id"]."','".$_POST["mission"]."','".$_POST["processing_level"]."','".$_POST["geo_table"]."','".$_POST["hori_type"]."','".$_POST["hori_code"]."','".$_POST["hori_name"]."','".$_POST["job_id"]."','".$_POST["pro_info"]."','".$_POST["pro_type"]."','".$_POST["pro_name"]."','".$_POST["pro_url"]."','".$_POST["pro_date"]."','".$_POST["pro_level"]."'
 )";
	pg_query($con, $sql)or die("Lỗi");	
	echo '<div class="alert alert-success">
  <strong>Thêm thông tin thành công!</strong>
  <p><a href="index.php">Danh sách </a> </p>
</div>';
$thoigian = date('Y-m-d H:i:s');
$qr_log =  "insert into  writelog (id_nguoidung, thoigian, noidung) values ('".$_SESSION["id_nguoidung"]."', '".$thoigian."', 'Thêm 1 Metadata mới')";
  pg_query($con, $qr_log)or die("Lỗi qrlog");
?>
        
<?php
include("../footer.php");
?>