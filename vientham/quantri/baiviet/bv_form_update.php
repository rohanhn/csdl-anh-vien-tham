
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
<?php
	include("header.php");
?>
 <div class="container_12">
 <?php 

//lay bien get ID tren thanh dia chi
$id = $_GET["id"];
$sql = "select * from tbbaiviet where id_news =".$id;
$result = pg_query($con, $sql)or die();
$row = pg_fetch_array($result);

?>
    <!----->
    <h4>Sửa thông tin </h4>
  <form action="bv_update.php" class="form-horizontal" role="form" method="post" enctype="multipart/form-data" >
  <input name="id" type="hidden" value="<?php echo $id  ?>" />
	 <div class="form-group">
      <label class="control-label col-sm-2" for="ten_nhom">Tiêu đề</label>
      <div class="col-sm-4">
        <input type="text"  class="form-control" id="tieude" name="tieude" value="<?php echo $row["tieude"]  ?>"  required="required">
      </div>
	  </div>
	 <div class="form-group">
	   <label class="control-label col-sm-2" for="ten_nhom">Mô tả ngắn</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="mota" name="mota"  required="required"><?php echo $row["mota"]  ?></textarea>
      </div>
    </div>
	
	<div class="form-group">
	   <label class="control-label col-sm-2" for="ten_nhom">Nội dung</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="editor1" name="noidung"  required="required"><?php echo $row["noidung"]  ?></textarea>
      </div>
    </div>
	<script>    CKEDITOR.replace( 'editor1' );</script> 
	<div class="form-group">
      <label class="control-label col-sm-2" for="ten_nhom">Hình ảnh</label>
      <div class="col-sm-4">
        <img src="<?php echo $row["hinhanh"]  ?>" width="100px" height="100px"/><input type="file"  class="form-control" id="hinhanh" name="hinhanh" >
      </div>
    </div>
	
	<div class="form-group">
	   <label class="control-label col-sm-2" for="ten_nhom">Tác giả</label>
      <div class="col-sm-4">
         <input type="text"  class="form-control" id="tacgia" value="<?php echo $row["tacgia"]  ?>" name="tacgia" >
      </div>
    </div>
	<!---------------------->
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