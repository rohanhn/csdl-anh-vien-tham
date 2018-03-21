<?php
include("connect.php");
  function convertStringToDate($str) {
  return $st = substr($str,6,4) . '-' . substr($str, 3, 2) . '-' . substr($str, 0, 2);
  }
  $sqlwhere = "";
  if(isset($_GET["format"]) and $_GET["format"]!=""){
    $format = $_GET["format"];
    $sqlwhere .= " and format LIKE '%".$format."%'" ;
  }
  if(isset($_GET["producttype"]) and $_GET["producttype"]!=""){
    $format = $_GET["format"];
    $sqlwhere .= " and producttype LIKE '%".$producttype."%'" ;
  }
  if(isset($_GET["id_met"]) and $_GET["id_met"]!=""){
    $id_met = $_GET["id_met"];
    $sqlwhere .= " and id_met LIKE '%".$id_met."%'" ;
  }
  if(isset($_GET["raster"]) and $_GET["raster"]!=""){
    $raster = $_GET["raster"];
    $sqlwhere .= " and raster LIKE '%".$raster."%'" ;
  }
  if(isset($_GET["mapname"]) and $_GET["mapname"]!=""){
    $mapname = $_GET["mapname"];
    $sqlwhere .= " and mapname LIKE '%".$mapname."%'" ;
  }
//   if(isset($_GET["geosearch"]) and $_GET["geosearch"]!=""){
//     $geosearch = $_GET["geosearch"];
//     echo $latlong;
//     $sqlwhere .= " and latlong LIKE '%".$geosearch."%'" ;
//     $geosearch=null;
//   }
    if(isset($_GET["geosearch"]) and $_GET["geosearch"]!=""){
        $geosearch = $_GET["geosearch"];
        echo $geosearch;
        $geosearch=null;
        $sqlwhere .= " and latlong LIKE '%".$geosearch."%'" ;  
        echo $sqlwhere;                                                  
    }
  if(isset($_GET["date"]) and $_GET["date"]!="" and $_GET["date2"]!=""  and isset($_GET["date2"])){
  $d1 = $_GET["date"]; 
   $date1 = convertStringToDate($d1);
   $d2 = $_GET["date2"];
  $date2 = convertStringToDate($d2);
  $sqlwhere .=  " and (date BETWEEN  '".$date1."' and '".$date2."') ";
  }
?>
	
<script>
    // function setBounds(bounds) 
    // {
    //     if (bounds == null) {
    //         document.getElementById("geosearch").innerHTML = "";
        
    //     }  
    //     else 
    //     {
    //         b = bounds.clone().transform(map.getProjectionObject(), new OpenLayers.Projection("EPSG:4326"))
    //         minlon = toPrecision(map.getZoom(), b.left);
    //         minlat = toPrecision(map.getZoom(), b.bottom);    
    //         maxlon = toPrecision(map.getZoom(), b.right);
    //         maxlat = toPrecision(map.getZoom(), b.top);  
    //         //lat = toPrecision(map.getZoom(), b.bottomright);
            
    //         document.getElementById("latlong").innerHTML = minlon + ", " + minlat + ", " + maxlon + ", " + maxlat;  
    //         //var polygon = [(minlat, maxlon), (maxlat, maxlon), (maxlat, minlon), (minlat, minlon)];
    //     }
    // }  
</script>

<?php			
    // class MyPoint
    // {
    //     var $lat;
    //     var $lon;

    //     function MyPoint($m_lat, $m_lon)
    //     {
    //         $this->lat = floatval($m_lat);
    //         $this->lon = floatval($m_lon);
    //     }

    // }

    // function IsIntersection02($point11, $point12, $point21, $point22)
    // {
    //     $a_dx = $point12->lon - $point11->lon;
    //     $a_dy = $point12->lat - $point11->lat;
    //     $b_dx = $point22->lon - $point21->lon;
    //     $b_dy = $point22->lat - $point21->lat;
    //     $s = (-$a_dy * ($point11->lon - $point21->lon) + $a_dx * ($point11->lat - $point21->lat)) / (-$b_dx * $a_dy + $a_dx * $b_dy);
    //     $t = (+$b_dx * ($point11->lat - $point21->lat) - $b_dy * ($point11->lon - $point21->lon)) / (-$b_dx * $a_dy + $a_dx * $b_dy);
    //     if (($s >= 0 && $s <= 1 && $t >= 0 && $t <= 1)) {
    //         $result = true;
    //     } else {
    //         $result = false;
    //     }
    //     return $result;
    // }

    // //$polygon1 = $polygon;
    // function IsOverlapping($polygon1, $polygon2)
    // {
    //     if (count($polygon1) >= 3 && count($polygon2) >= 3) {
    //         for ($i = 0; $i < count($polygon1) - 1; $i++) {
    //             for ($k = 0; $k < count($polygon2) - 1; $k++) {
    //                 if (IsIntersection02($polygon1[$i], $polygon1[$i + 1], $polygon2[$k], $polygon2[$k + 1]) != null)
    //                     return true;
    //             }
    //         }
    //         return false;
    //     }
    // }
      

    //$polygon1 = array($latlong);
    //$polygon22 = array($row["corner1"], $row["corner3"], $row["corner4"], $row["corner2"]);

	// $polygon1 = $polygon;
	// $polygon2 = array(new MyPoint(x1, x3), new MyPoint(y3, y1),
    // new MyPoint(x2, x4), new MyPoint(y4, y2));
    // echo IsOverlapping($polygon1, $polygon2);
    

    echo ($sqlwhere);
    $sql = "select * from metadata where 1=1 ".$sqlwhere;      
    $result = pg_query($con, $sql)or die();
    if(pg_fetch_array($result) != NULL){
        include("mypoint.php");
        include("geosearch.php");
    } else {
        echo "Không có dữ liệu";
    }
	 
?>
   