
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
   $sqlwhere .= ", URL ='".$duongdanfile1."' ";
   }
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('d-m-Y H:i:s'); 
echo $sql = "update metadata set  title = '".$_POST["title"]."', des = '".$_POST["des"]."'
".$sqlwhere." where id_meta =".$_POST["id"];
	pg_query($con, $sql)or die("Lỗi");
	echo '<div class="alert alert-success">
  <strong>Cập nhật thông tin thành công!</strong>
  <p><a href="index.php">Danh sách</a> </p>
</div>';
?>
        
<?php
include("../footer.php");
?>