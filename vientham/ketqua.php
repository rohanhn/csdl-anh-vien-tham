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
  if(isset($_GET["latlong"]) and $_GET["latlong"]!=""){
    $latlong = $_GET["latlong"];
    echo "tungvu".$latlong;
    $sqlwhere .= " and latlong LIKE '%".$latlong."%'" ;
  }
  if(isset($_GET["date"]) and $_GET["date"]!="" and $_GET["date2"]!=""  and isset($_GET["date2"])){
  $d1 = $_GET["date"]; 
   $date1 = convertStringToDate($d1);
   $d2 = $_GET["date2"];
  $date2 = convertStringToDate($d2);
  $sqlwhere .=  " and (date BETWEEN  '".$date1."' and '".$date2."') ";
  }

  


//$polygon1 = array($latlong);
//$polygon22 = array($row["corner1"], $row["corner3"], $row["corner4"], $row["corner2"]);

// $polygon1 = $polygon;

// $polygon2 = array(new MyPoint(x1, x3), new MyPoint(y3, y1),
// new MyPoint(x2, x4), new MyPoint(y4, y2));
// echo IsOverlapping($polygon1, $polygon2);

// $sql = "select * from metadata where 1=1 ".$sqlwhere;
// $result = pg_query($con, $sql)or die();
// if(pg_fetch_array($result) != NULL){
//   include("kq.php");
// } else {
//     echo "Không có dữ liệu";
// }

    $sql = "select * from metadata where 1=1 ".$sqlwhere;
    $result = pg_query($con, $sql)or die();
    if(pg_fetch_array($result) != NULL){
    include("space_query.php");
    } else {
        echo "Không có dữ liệu";
    }


  ?>
	<script>
    function setBounds(bounds) {
            if (bounds == null) {
                document.getElementById("latlong").innerHTML = "";
          
            }   else {
                    b = bounds.clone().transform(map.getProjectionObject(), new OpenLayers.Projection("EPSG:4326"))
                    minlon = toPrecision(map.getZoom(), b.left);
                    minlat = toPrecision(map.getZoom(), b.bottom);    
                    maxlon = toPrecision(map.getZoom(), b.right);
                    maxlat = toPrecision(map.getZoom(), b.top);  
                    //lat = toPrecision(map.getZoom(), b.bottomright);
                    
                    document.getElementById("latlong").innerHTML = minlon + ", " + minlat + ", " + maxlon + ", " + maxlat;  
                    var polygon = [(minlat, maxlon), (maxlat, maxlon), (maxlat, minlon), (minlat, minlon)];
                }
        }
  
	</script>
	
   