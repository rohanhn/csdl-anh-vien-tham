
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<?php
	include("header.php");
?>
<section class="page-title">
            <div class="title pattern-default">
                <span class="subtitle">
                    Quản lý Người Dùng</span>
            </div>                     
</section>
<?php
 $sql = "insert into  tbnguoidung (username, password, mota, id_nhom) values ('".$_POST["username"]."', '".$_POST["password"]."', '".$_POST["mota"]."','".$_POST["id_nhom"]."')";
pg_query($con, $sql)or die("Lỗi");
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y-m-d H:i:s');
$qr_log =  "insert into  writelog (id_nguoidung, thoigian, noidung) values ('".$_SESSION["id_nguoidung"]."', '".$date."', 'Thêm 1 người dùng mới')";
  pg_query($con, $qr_log)or die("Lỗi qrlog");	
	echo '<div class="alert alert-success">
  <strong>Thêm thông tin thành công!</strong>
  <p><a href="index.php">Danh sách Người dùng</a> </p>
</div>';
?>
        
<?php
include("../footer.php");
?>