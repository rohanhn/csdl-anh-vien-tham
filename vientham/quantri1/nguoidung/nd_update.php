
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<?php
	include("header.php");
?>
<section class="page-title">
            <div class="title pattern-default">
                <span class="subtitle">
                    Quản lý Người dùng     </span>
            </div>                     
</section>
<?php
$sql = "update tbnguoidung set  username ='".$_POST["username"]."', password ='".$_POST["password"]."', mota ='".$_POST["mota"]."', id_nhom ='".$_POST["id_nhom"]."'
  where id_nguoidung =".$_POST["id"];
pg_query($con, $sql)or die("Lỗi");
	echo '<div class="alert alert-success">
  <strong>Cập nhật thông tin thành công!</strong>
  <p><a href="index.php">Danh sách Người dùng</a> </p>
</div>';
?>
        
<?php
include("../footer.php");
?>