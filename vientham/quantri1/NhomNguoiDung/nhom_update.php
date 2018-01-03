
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<?php
	include("header.php");
?>
<section class="page-title">
            <div class="title pattern-default">
                <h3> Quản Trị</h3>
                <span class="subtitle">
                    Quản lý Nhóm người dùng                </span>
            </div>                     
</section>
<?php
 $sql = "update tbnhomnguoidung set  ten_nhom ='".$_POST["ten_nhom"]."' where id_nhom =".$_POST["id"];
pg_query($con, $sql)or die("Lỗi");	
	echo '<div class="alert alert-success">
  <strong>Cập nhật thông tin thành công!</strong>
  <p><a href="index.php">Danh sách Nhóm người dùng</a> </p>
</div>';
?>
        
<?php
include("../footer.php");
?>