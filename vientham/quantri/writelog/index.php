
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
			   $sql = "select * from tbnguoidung join writelog on tbnguoidung.id_nguoidung = writelog.id_nguoidung ";
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
                              <th width="160">Username</th>
                              <th width="212">Công việc</th>
                              <th width="212">Thời gian thực hiện</th>
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
                              <td><?php echo $row["noidung"] ?></td>
                              <td><?php echo $row["thoigian"] ?></td>
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