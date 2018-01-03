
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<?php
	include("header.php");
?>
<section class="page-title">
            <div class="title pattern-default">
                <span class="subtitle">
                    Quản lý Người dùng    </span>
            </div>                     
        </section>

 <div class="container_12">
    <!----->
    <h4>Thêm mới Người dùng</h4>
  <form action="nd_insert.php" class="form-horizontal" role="form" method="post" >
    <div class="form-group">
      <label class="control-label col-sm-2" for="id_nhom">Nhóm người dùng</label>
      <div class="col-sm-4">
      <select class="form-control" name="id_nhom" id="id_nhom">
      <?php
	  	$qr_nhom = "select * from tbnhomnguoidung";
		$re_nhom = pg_query($con, $qr_nhom);
		while($row_nhom = pg_fetch_array($re_nhom))
		{
	  ?>
        
            <option value="<?php echo $row_nhom["id_nhom"] ?>"><?php echo $row_nhom["ten_nhom"] ?></option>
            <?php 
		}
		?>
          </select>
      </div>
    </div>
    <!-------->
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="username">Tên đăng nhập <span style="color:#F00">*</span></label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="username" name="username" minlength="5"   required="required">
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
        <input type="text" class="form-control" id="DisplayName" name="mota" required="required" >
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Thêm mới</button>
        
      </div>
    </div>
  </form>
    
    <!----->
 </div>
         
<?php
include("../footer.php");
?>