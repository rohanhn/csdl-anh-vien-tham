
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<?php
	include("header.php");
	include("../connect.php");
?>
<?php
echo $sql = "insert into tbdanhmuc(parent_id, tendanhmuc) values ('".$_POST["parent_id"]."', '".$_POST["tendanhmuc"]."')";
mysql_query($sql)or die("Lỗi");
	
	echo '<div class="alert alert-success">
  <strong>Thêm thông tin thành công!</strong>
  <p><a href="index.php">Danh sách </a> </p>
</div>';
?>
        
<?php
include("../footer.php");
?>