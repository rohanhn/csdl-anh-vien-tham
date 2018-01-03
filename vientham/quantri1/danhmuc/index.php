
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<SCRIPT LANGUAGE="JavaScript">
    function confirmAction() {
	  var agree=confirm("Bạn có muốn xóa dữ liệu?");
	if (agree)
		return true ;
	else
		return false ;
    }
</SCRIPT>
<?php
	include("header.php");
	include("../connect.php");
?>



<!-- container_12 start -->
            <div class="container_12">
                <div class="grid_12">
       		
        <a href="dm_form_insert.php">
          Thêm mới <span class="glyphicon glyphicon-plus"></span>
        </a>
      
</p>
            <?php
			$qr = "select * from tbdanhmuc";
			$result = mysql_query($qr)or die(mysql_error());
			while ($row = mysql_fetch_assoc($result)){
				$categories[] = $row;
			}
			// BƯỚC 2: HÀM ĐỆ QUY HIỂN THỊ CATEGORIES
			$i = 1;
			function showCategories($categories, $parent_id = 0, $char = '', $i = 1)
			{
			global $i;
				foreach ($categories as $key => $item)
				{
				
					// Nếu là chuyên mục con thì hiển thị
					if ($item['parent_id'] == $parent_id)
					{
						echo '<tr class="info">';
							echo  '<td>'. $i++.'</td>'; 
							echo '<td>';
								echo $char . $item['tendanhmuc'];
							echo '</td>';
							echo '<td>';
								echo '<a href="dm_form_update.php?id='.$item["danhmuc_id"].'">
          <span class="glyphicon glyphicon-pencil"></span></a>';
		  						echo '&nbsp;<a href="dm_delete.php?id='.$item["danhmuc_id"].'" onclick="return confirmAction()"><span class="glyphicon glyphicon-trash"></span>
        </a>';
							echo '</td>';
						echo '</td>';
						// Xóa chuyên mục đã lặp
						unset($categories[$key]);
						// Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
						showCategories($categories, $item['danhmuc_id'], $char.'|---', $i);
					}
				}
			}
			
				?>
				
                  <form name="form1" method="post" action="">
                  <div class="table-striped">
                    <table width="49%" class="table table-striped">
                    <thead>
                      <tr >
                        <th width="159"><table width="49%" class="table table-striped">
                          <tbody>
                            <tr class="info"></tr>
                          </tbody>
                          <thead>
                            <tr >
                              <th width="116"><b>STT</b></th>
                              <th width="266"><b>Danh mục</b></th>
                              <th width="159"><b>Quản lý</b></th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php if(isset($categories)) showCategories($categories); ?>
                          </tbody>
                          <tbody>
                          </tbody>
                        </table></th>
                      </tr>
                    </thead>
                    </table>
                  </div>
                  </form>
                </div>
            </div>
            <!-- container_12 end -->


            
<?php
include("../footer.php");
?>