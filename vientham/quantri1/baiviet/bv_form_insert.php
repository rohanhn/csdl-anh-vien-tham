
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>

<?php
	include("header.php");
?>
<script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
 <div class="container_12">
    <!----->
    <h4>Thêm mới </h4>
  <form action="bv_insert.php" class="form-horizontal" role="form" method="post" enctype="multipart/form-data" >

    <div class="form-group">
      <label class="control-label col-sm-2" for="ten_nhom">Tiêu đề</label>
      <div class="col-sm-4">
        <input type="text"  class="form-control" id="tieude" name="tieude"  required="required">
      </div>
	  </div>
	 <div class="form-group">
	   <label class="control-label col-sm-2" for="ten_nhom">Mô tả ngắn</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="mota" name="mota"  required="required"></textarea>
      </div>
    </div>
	
	<div class="form-group">
	   <label class="control-label col-sm-2" for="ten_nhom">Nội dung</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="editor1" name="noidung"  required="required"></textarea>
      </div>
    </div>
	<script>    CKEDITOR.replace( 'editor1' );</script>   
	<div class="form-group">
      <label class="control-label col-sm-2" for="ten_nhom">Hình ảnh</label>
      <div class="col-sm-4">
        <input type="file"  class="form-control" id="hinhanh" name="hinhanh" >
      </div>
    </div>
	
	<div class="form-group">
	   <label class="control-label col-sm-2" for="ten_nhom">Tác giả</label>
      <div class="col-sm-4">
         <input type="text"  class="form-control" id="tacgia" name="tacgia" >
      </div>
    </div>
	<!---------------------->
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