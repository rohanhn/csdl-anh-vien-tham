<form name="form1" method="post" action="">
    <div class="panel-group" id="accordion" style="width: 100%; height: 200px; Overflow: scroll;" >
    <?php
      while($row = pg_fetch_array($result))
      {
    ?>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <?php
			  $row1 = explode(",", $row["corner1"]);
			  $row2 = explode(",", $row["corner2"]);
			  $row3 = explode(",", $row["corner3"]);
			  $row4 = explode(",", $row["corner4"]);
			 ?>
            <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $row["id_meta"] ?>" 
			onClick="draw('<?php echo $row1[0].','.$row3[1].','.$row4[0].','.$row2[1]; ?>')"
			>
            <?php echo $row["mapname"] ?></a>			
          </h4>
		  
		  <?php
			$x1 = $row1[0]; $x3 = $row1[1];
			$y1 = $row3[1]; $y3 = $row3[0];
			$x2 = $row4[0]; $x4 = $row4[1];
			$y2 = $row2[1];	$y4 = $row2[0];
			$polygon22 = array($row["corner1"], $row["corner3"], $row["corner4"], $row["corner2"]);			
			?>
			
        </div>
        <div id="<?php echo $row["id_meta"] ?>" class="panel-collapse collapse">
          <div class="panel-body"><a target = "_blank" href="meta_detail.php?id_meta=<?php echo $row["id_meta"] ?>"><b>Xem chi tiết</b></a></div>
          <div class="panel-body"><b>Format</b>: <?php echo $row["format"] ?></div>
          <div class="panel-body"><b>Raster</b>: <?php echo $row["raster"] ?></div>
          <div class="panel-body"><b>ID Meta</b>: <?php echo $row["id_met"] ?></div>
          <div class="panel-body"><b>Thumb</b>: <img style="width: 60px; height: 49px" src="quantri/metadata/<?php echo $row["hinhanh"] ?>" /></div>
        </div>
      </div>
			
			<script>		
			var x1 = <?php echo json_encode($x1); ?>;
			var y1 = <?php echo json_encode($y1); ?>;
			var x2 = <?php echo json_encode($x2); ?>;
			var y2 = <?php echo json_encode($y2); ?>;
			var x3 = <?php echo json_encode($x3); ?>;
			var y3 = <?php echo json_encode($y3); ?>;
			var x4 = <?php echo json_encode($x4); ?>;
			var y4 = <?php echo json_encode($y4); ?>;
			var $polygon2 = <?php echo json_encode($polygon22); ?>;
			</script>	
			<?php
      }
     ?> 
    </div>
    </form>