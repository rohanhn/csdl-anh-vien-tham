
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
$date = date('Y-m-d H:i:s');
$sql = "insert into tbbaiviet(tieude, mota, noidung, thoigian, hinhanh, trangthai, tacgia) 
values ('".$_POST["tieude"]."', '".$_POST["mota"]."', '".$_POST["noidung"]."', '".$date."', '".$duongdanfile1."', '1', '".$_POST["tacgia"]."'
 )";
pg_query($con, $sql)or die("Lỗi");
  $qr_log =  "insert into  writelog (id_nguoidung, thoigian, noidung) values ('".$_SESSION["id_nguoidung"]."', '".$date."', 'Thêm 1 Tin tức mới')";
  pg_query($con, $qr_log)or die("Lỗi qrlog");	
	echo '<div class="alert alert-success">
  <strong>Thêm thông tin thành công!</strong>
  <p><a href="index.php">Danh sách </a> </p>
</div>';
?>
        
<?php
include("../footer.php");
?>