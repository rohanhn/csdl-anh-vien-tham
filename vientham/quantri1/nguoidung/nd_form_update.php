
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<?php
	include("header.php");
?>
<section class="page-title">
            <div class="title pattern-default">
                <span class="subtitle">
                    Quản lý Người dùng         </span>
            </div>                     
        </section>

 <div class="container_12">
 <?php 

//lay bien get ID tren thanh dia chi
$id = $_GET["id"];
$sql = "select * from tbnguoidung where id_nguoidung =".$id;
$result = pg_query($con, $sql)or die();
//chu y : neu lay 1 ban ghi thi se khong co while o ngoai
$row = pg_fetch_array($result);
?>
    <!----->
    <h4>Sửa thông tin người dùng</h4>
  <form action="nd_update.php" class="form-horizontal" role="form" method="post" >
  <input name="id" type="hidden" value="<?php echo $id  ?>" />
  <div class="form-group">
      <label class="control-label col-sm-2" for="id_nhom">Nhóm người dùng</label>
      <div class="col-sm-4">
      <select class="form-control" name="id_nhom" id="nhomnd">
      <?php
	  $qr_nhom = "select * from tbnhomnguoidung ";
		$re_nhom = pg_query($con, $qr_nhom);
		while($row_nhom = pg_fetch_array($re_nhom))
		{
	  ?>
        
            <option value="<?php echo $row_nhom["id_nhom"]; ?>" <?php if ($row_nhom['id_nhom'] == $row['id_nhom']) echo 'selected'; ?>><?php echo $row_nhom["ten_nhom"] ?></option>
            <?php 
		}
		?>
          </select>
      </div>
    </div>
    <!-------->
  <div class="form-group">
      <label class="control-label col-sm-2" for="tendangnhap">Tên đăng nhập <span style="color:#F00">*</span></label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="UserName" name="username" minlength="5" value="<?php echo $row["username"] ?>"   required="required">
      </div>
    </div>
    <!-------->
    <div class="form-group">
      <label class="control-label col-sm-2" for="matkhau">Mật khẩu <span style="color:#F00">*</span></label>
      <div class="col-sm-4">
        <input type="password" class="form-control" id="Password" name="password" required="required" >
      </div>
    </div>
    <!-------->
	  <div class="form-group">
      <label class="control-label col-sm-2" for="hoten">Mô tả<span style="color:#F00">*</span></label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="DisplayName" value="<?php echo $row["mota"] ?>" name="mota" required="required" >
      </div>
    </div>
    <!-------->
	  
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Cập nhật</button>
        
      </div>
    </div>
  </form>
    
    <!----->
 </div>
         
<?php
include("../footer.php");
?>