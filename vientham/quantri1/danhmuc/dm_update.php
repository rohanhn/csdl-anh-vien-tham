
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<?php
	include("header.php");
	include("../connect.php");
?>
<?php

$sql = "update tbdanhmuc set tendanhmuc ='".$_POST["tendanhmuc"]."', parent_id ='".$_POST["parent_id"]."' where danhmuc_id =".$_POST["id"];
mysql_query($sql)or die("Lỗi");
	
	echo '<div class="alert alert-success">
  <strong>Cập nhật thông tin thành công!</strong>
  <p><a href="index.php">Danh sách</a> </p>
</div>';
?>
        
<?php
include("../footer.php");
?>