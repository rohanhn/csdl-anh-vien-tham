
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
<?php
	include("header.php");
	include("../../connect.php");
?>

<section class="page-title">
            <div class="title pattern-default">
                <span class="subtitle">
                    Quản lý Thông tin Metadata</span>
            </div>                     
        </section>
 <div class="container_12">
 <?php 

//lay bien get ID tren thanh dia chi
$id = $_GET["id"];
$sql = "select * from metadata where id_meta =".$id;
$result = pg_query($con, $sql)or die();
$row = pg_fetch_array($result);
?>
    <!----->
    <h4>Sửa thông tin </h4>
  <form action="bv_update.php" class="form-horizontal" role="form" method="post" enctype="multipart/form-data" >
  <input name="id" type="hidden" value="<?php echo $id  ?>" />
	 <!-------->
	 <div class="form-group">
      <label class="control-label col-sm-2" for="ten_nhom">Tiêu đề</label>
      <div class="col-sm-4">
        <input type="text"  class="form-control" id="title" name="title" value="<?php echo $row["title"]  ?>"  required="required">
      </div>
	  </div>
	 <div class="form-group">
	   <label class="control-label col-sm-2" for="ten_nhom">Mô tả</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="des" name="des"  required="required"><?php echo $row["des"]  ?></textarea>
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