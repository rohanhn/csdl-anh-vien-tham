
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
?>

<section class="page-title">
            <div class="title pattern-default">
                <span class="subtitle">
                    Quản lý Người dùng   </span>
            </div>                     
        </section>

<!-- container_12 start -->
            <div class="container_12">
                <div class="grid_12">
       		
        <a href="nd_form_insert.php">
          Thêm mới <span class="glyphicon glyphicon-plus"></span>
        </a>
      
</p>
            <?php
			  $sql = "select * from tbnguoidung join tbnhomnguoidung on tbnguoidung.id_nhom = tbnhomnguoidung.id_nhom ";
			$result = pg_query($con, $sql)or die();
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
                              <th width="49">STT</th>
                              <th width="160">Tên Đăng nhập</th>
                              <th width="212">Nhóm người dùng</th>
                              <th width="126">Quản lý</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $i = 0;
	  	while($row = pg_fetch_array($result))
		{
			$i++;
	  ?>
                            <tr class="info">
                              <td><?php echo $i ?></td>
                              <td><?php echo $row["username"] ?></td>
                              <td><?php echo $row["ten_nhom"] ?></td>
                              
                              <td> <a href="nd_form_update.php?id=<?php echo $row["id_nguoidung"] ?>">
          <span class="glyphicon glyphicon-pencil"></span>
        </a>&nbsp;<a href="nd_delete.php?id=<?php echo $row["id_nguoidung"] ?>" onclick="return confirmAction()">
          <span class="glyphicon glyphicon-trash"></span>
        </a></td>
                            </tr>
                            <?php } ?>
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