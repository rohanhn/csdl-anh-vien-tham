
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

 <div class="container_12">
    <!----->
    <h4>Thêm mới Nhóm người dùng</h4>
  <form action="nhom_insert.php" class="form-horizontal" role="form" method="post" >
    <div class="form-group">
      <label class="control-label col-sm-2" for="ten_nhom">Tên nhóm</label>
      <div class="col-sm-4">
        <input type="text"  class="form-control" id="ten_nhom" name="ten_nhom" placeholder="Tên nhóm người dùng" required="required">
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