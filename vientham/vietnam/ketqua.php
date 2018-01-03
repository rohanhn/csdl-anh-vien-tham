<?php
include("connect.php");
			  $sql = "select * from metadata ";
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
                              <th>STT</th>
                              <th>Tiêu đề</th>
                              <th>Mô tả</th>
                              <th width="100px">Quản lý</th>
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
                              <td><?php echo $row["raster"] ?></td>
                              <td><?php echo $row["format"] ?></td>
                              <td> <a href="bv_form_update.php?id=<?php echo $row["id_meta"] ?>">
          <span class="glyphicon glyphicon-pencil"></span>
        </a>&nbsp;<a href="bv_delete.php?id=<?php echo $row["id_meta"] ?>" onclick="return confirmAction()">
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