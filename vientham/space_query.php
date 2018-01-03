<?php 
    //tungvu
  class MyPoint
  {
      var $lat;
      var $lon;

      function MyPoint($m_lat, $m_lon)
      {
          $this->lat = floatval($m_lat);
          $this->lon = floatval($m_lon);
      }

  }

function IsIntersection02($point11, $point12, $point21, $point22)
  {
      $a_dx = $point12->lon - $point11->lon;
      $a_dy = $point12->lat - $point11->lat;
      $b_dx = $point22->lon - $point21->lon;
      $b_dy = $point22->lat - $point21->lat;
      $s = (-$a_dy * ($point11->lon - $point21->lon) + $a_dx * ($point11->lat - $point21->lat)) / (-$b_dx * $a_dy + $a_dx * $b_dy);
      $t = (+$b_dx * ($point11->lat - $point21->lat) - $b_dy * ($point11->lon - $point21->lon)) / (-$b_dx * $a_dy + $a_dx * $b_dy);
      if (($s >= 0 && $s <= 1 && $t >= 0 && $t <= 1)) {
          $result = true;
      } else {
          $result = false;
      }
      return $result;
  }

function IsOverlapping($polygon1, $polygon2)
  {
      if (count($polygon1) >= 3 && count($polygon2) >= 3) {
          for ($i = 0; $i < count($polygon1) - 1; $i++) {
              for ($k = 0; $k < count($polygon2) - 1; $k++) {
                  if (IsIntersection02($polygon1[$i], $polygon1[$i + 1], $polygon2[$k], $polygon2[$k + 1]) != null)
                      return true;
              }
          }
          return false;
      }
  }

  $latlong = "104.35, 19.22, 106.15, 20.78"; 
  $temp = explode(",", $latlong);
  $polygon1 = array(new MyPoint($temp[1], $temp[0]), new MyPoint($temp[1],$temp[2]), new MyPoint($temp[3],$temp[2]), new MyPoint($temp[3],$temp[0]));
//   echo "polygon1: \n";
//   echo "Point1: ".$temp[0].",".$temp[1];
//   echo "Point2: ".$temp[0].",".$temp[3];
//   echo "Point3: ".$temp[2].",".$temp[1];
//   echo "Point4: ".$temp[2].",".$temp[3];

//   foreach ($polygon1 as $mPoint  ) {      
//       echo $mPoint->lat.",".$mPoint->lon;
//       echo "\n";
//    }

  //$polygon1 = array($latlong);
//$polygon22 = array($row["corner1"], $row["corner3"], $row["corner4"], $row["corner2"]);

// $polygon1 = $polygon;

// $polygon2 = array(new MyPoint(x1, x3), new MyPoint(y3, y1),
// new MyPoint(x2, x4), new MyPoint(y4, y2));
// echo IsOverlapping($polygon1, $polygon2);



?>
<form name="form1" method="post" action="">
    <div class="panel-group" id="accordion" style="width: 100%; height: 200px; Overflow: scroll;" >
    <?php
      while($row = pg_fetch_array($result))
      {
        $row1 = explode(",", $row["corner1"]);
        $row2 = explode(",", $row["corner2"]);
        $row3 = explode(",", $row["corner3"]);
        $row4 = explode(",", $row["corner4"]);

        // old code
        // $x1 = $row1[0]; $x3 = $row1[1];
        // $y1 = $row3[1]; $y3 = $row3[0];
        // $x2 = $row4[0]; $x4 = $row4[1];
        // $y2 = $row2[1];	$y4 = $row2[0];

        // tungvu 
        $x1 = $row1[1]; $y1 = $row1[0];
        $x2 = $row2[1]; $y2 = $row2[0];
        $x3 = $row3[1]; $y3 = $row3[0];
        $x4 = $row4[1];	$y4 = $row4[0];


        $polygon2= array(new MyPoint($x1,$y1), new MyPoint($x2,$y2), new MyPoint($x3,$y3), new MyPoint($x4,$y4));       
        // echo "polygon2 \n";
        // foreach ($polygon2 as $mPoint  ) {      
        //     echo $mPoint->lat.",".$mPoint->lon;
        //     echo "\n";
        // }


        if (IsOverlapping($polygon1,$polygon2))
        {

    ?>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <?php
			//   $row1 = explode(",", $row["corner1"]);
			//   $row2 = explode(",", $row["corner2"]);
			//   $row3 = explode(",", $row["corner3"]);
			//   $row4 = explode(",", $row["corner4"]);
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
      }
     ?> 
    </div>
    </form>