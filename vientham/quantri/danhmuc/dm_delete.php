
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<?php
	include("header.php");
	include("../connect.php");
?>
<?php
$id = $_GET["id"];
$sql = "delete from danhmuc where  iddanhmuc =".$id;
//thuc hien insert tu php :
$sql_sp = "delete from tbsanpham where  iddanhmuc =".$id;
mysql_query($sql_sp)or die("Lỗi");
mysql_query($sql)or die("Lỗi");
	echo '<div class="alert alert-success">
  <strong>Xóa thông tin thành công!</strong>
  <p><a href="index.php">Danh sách</a> </p>
</div>';
?>
        
<?php
include("../footer.php");
?>