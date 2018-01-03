
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<?php
	include("header.php");
	include("../connect.php");
	
$qr_nhom = "select * from tbdanhmuc";
			$re_nhom = mysql_query($qr_nhom);
while ($row = mysql_fetch_assoc($re_nhom)){
				$categories[] = $row;
			}	
function showCategories($categories, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parent_id'] == $parent_id)
        {
            echo '<option value="'.$item['danhmuc_id'].'">';
                echo $char . $item['tendanhmuc'];
            echo '</option>';
             
            // Xóa chuyên mục đã lặp
            unset($categories[$key]);
             
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $item['danhmuc_id'], $char.'--');
        }
    }
}
?>
 <div class="container_12">
    <!----->
    <h4>Thêm mới </h4>
  <form action="dm_insert.php" class="form-horizontal" role="form" method="post" >
  	<div class="form-group">
      <label class="control-label col-sm-2" for="ten_nhom">Danh mục cha</label>
      <div class="col-sm-4">
        <select class="form-control" name="parent_id" id="parent_id">
				<option value="">--Danh muc Cha--</option>
    			<?php showCategories($categories); ?>
		</select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="ten_nhom">Tên Danh mục</label>
      <div class="col-sm-4">
        <input type="text"  class="form-control" id="tendanhmuc" name="tendanhmuc"  required="required">
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