

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<?php
	include("header.php");
	include("../../connect.php");
?>

<section class="page-title">
            <div class="title pattern-default">
                <h3> Quản Trị</h3>
                <span class="subtitle">
                    Quản lý Nhóm người dùng                </span>
            </div>                     
        </section>

<!-- container_12 start -->
            <div class="container_12">
                <div class="grid_12">
       		
        <a href="?act=insert">
          Thêm mới <span class="glyphicon glyphicon-plus"></span>
        </a>
      
</p>
            <?php
			 $qr = "select * from nhomnguoidung";
			$result = mysql_query($qr)or die(mysql_error());
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
                              <th width="116">STT</th>
                              <th width="266">Tên nhóm người dùng</th>
                              <th width="159">Quản lý</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
	  	while($row = mysql_fetch_array($result))
		{
	  ?>
                            <tr class="info">
                              <td><?php echo $row["id_nhom"] ?></td>
                              <td><?php echo $row["ten_nhom"] ?></td>
                              <td> <a href="#">
          <span class="glyphicon glyphicon-pencil"></span>
        </a>&nbsp;<a href="#">
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
include("../../footer.php");
?>