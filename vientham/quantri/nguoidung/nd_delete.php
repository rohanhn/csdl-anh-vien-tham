
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
$id = $_GET["id"];
$sql = "delete from tbnguoidung where  id_nguoidung =".$id;
pg_query($con, $sql)or die("Lỗi");
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y-m-d H:i:s');
$qr_log =  "insert into  writelog (id_nguoidung, thoigian, noidung) values ('".$_SESSION["id_nguoidung"]."', '".$date."', 'Xóa Người dùng id =".$id."')";
  pg_query($con, $qr_log)or die("Lỗi qrlog");
	echo '<div class="alert alert-success">
  <strong>Xóa thông tin thành công!</strong>
  <p><a href="index.php">Danh sách Người dùng</a> </p>
</div>';
?>
        
<?php
include("../footer.php");
?>