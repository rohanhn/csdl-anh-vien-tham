
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<?php
	include("header.php");
	include("../../connect.php");
?>
<?php
$sqlwhere = "";
 if($_FILES["hinhanh"]["size"]>0)
   {
   $tenfile1 = $_FILES["hinhanh"]["name"];
   $duongdanfile1 = "images/".$tenfile1;
   copy($_FILES["hinhanh"]["tmp_name"],$duongdanfile1);
   $sqlwhere .= ", hinhanh ='".$duongdanfile1."' ";
   }
   if($_FILES["file_report"]["size"]>0)
   {
   $tenfile2 = $_FILES["file_report"]["name"];
   $duongdanfile2 = "report/".$tenfile2;
   copy($_FILES["file_report"]["tmp_name"],$duongdanfile2);
   $sqlwhere .= ", file_report ='".$duongdanfile2."' ";
   }
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y-m-d H:i:s'); 
echo $sql = "update metadata set  raster = '".$_POST["raster"]."', format = '".$_POST["format"]."'
, mapname = '".$_POST["mapname"]."', date = '".$date."', geometricprocessing = '".$_POST["geometricprocessing"]."', radiometricprocessing = '".$_POST["radiometricprocessing"]."', 
corner1 = '".$_POST["corner1"]."', corner2 = '".$_POST["corner2"]."', corner3 = '".$_POST["corner3"]."', corner4 = '".$_POST["corner4"]."', 
cornerc = '".$_POST["cornerc"]."', geocodingtablesidentification = '".$_POST["geocodingtablesidentification"]."', 
horizontaltype = '".$_POST["horizontaltype"]."', horizontalname = '".$_POST["horizontalname"]."', 
productiondate = '".$_POST["productiondate"]."', jobidentification = '".$_POST["jobidentification"]."',
 producttype = '".$_POST["producttype"]."', datasetproducer = '".$_POST["datasetproducer"]."'
, view_along = '".$_POST["view_along"]."', view_across = '".$_POST["view_across"]."', incidence = '".$_POST["incidence"]."', 
azimuth = '".$_POST["azimuth"]."', sun_azimuth = '".$_POST["sun_azimuth"]."', sun_elevation = '".$_POST["sun_elevation"]."', 
revolution_number = '".$_POST["revolution_number"]."'
".$sqlwhere." where id_meta =".$_POST["id"];
	pg_query($con, $sql)or die("Lỗi");
  $thoigian = date('Y-m-d H:i:s');
$qr_log =  "insert into  writelog (id_nguoidung, thoigian, noidung) values ('".$_SESSION["id_nguoidung"]."', '".$thoigian."', 'Update Metadata id =".$_POST["id"]." ')";
  pg_query($con, $qr_log)or die("Lỗi qrlog");
	echo '<div class="alert alert-success">
  <strong>Cập nhật thông tin thành công!</strong>
  <p><a href="index.php">Danh sách</a> </p>
</div>';
?>
        
<?php
include("../footer.php");
?>