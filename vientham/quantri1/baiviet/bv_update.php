
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<?php
	include("header.php");
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
 date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y-m-d'); 
   
$sql = "update tbbaiviet set  tieude ='".$_POST["tieude"]."', mota ='".$_POST["mota"]."',
noidung ='".$_POST["noidung"]."', tacgia ='".$_POST["tacgia"]."', thoigian ='".$date."'
".$sqlwhere." where id_news =".$_POST["id"];
pg_query($con,$sql)or die("Lỗi");
	
	echo '<div class="alert alert-success">
  <strong>Cập nhật thông tin thành công!</strong>
  <p><a href="index.php">Danh sách </a> </p>
</div>';
?>
        
<?php
include("../footer.php");
?>