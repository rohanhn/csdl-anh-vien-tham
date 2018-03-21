<?php
    include("header.php");
?>
    <!-- Main Content -->
    <div class="container-fluid" style="height:650px ; font-size: 12px">
          <!--Thanh tùy biến-->
          
          <div class="col-sm-5 well" style="height:650px">
            <div class="tuybien" style="width: 100%; float: left;">
          <label for="comment">Thanh tùy biến</label>
          <form action="" method="get">
				<div class="form-group">
                    <label class="col-sm-4 control-label">Địa điểm</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="diadiem" name="diadiem" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Type</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="producttype" name="producttype" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Format</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="Format" name="format" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Raster</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="Raster" name="raster" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Độ phủ mây </label> <b><span id="demo"></span> %</b>
                    <div class="slidecontainer">
                    <span id="demo"></span><input type="range" min="0" max="100" value="50" class="slider" id="myRange">
                  </div>
                </div>
                
              <script type="text/javascript">
                var slider = document.getElementById("myRange");
                var output = document.getElementById("demo");
                output.innerHTML = slider.value;

                slider.oninput = function() {
                  output.innerHTML = this.value;
                }
              </script>
                <div class="form-group">
                    <label class="col-sm-4 control-label">MapName</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="ID" name="mapname" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Geo Search</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="geosearch" name="geosearch" type="text">
                    </div>
                </div>
                <div class="form-group ">
				    <label class="col-sm-4 control-label">Start</label>
			      <div class="col-sm-8">
			       <div class="input-group">
			        <div class="input-group-addon">
			         <i class="fa fa-calendar">
			         </i>
			        </div>
			        <input class="form-control" id="date" name="date" placeholder="DD/MM/YYYY" type="text"/>
			       </div>
			      </div>
			     </div>
			     <div class="form-group ">
				    <label class="col-sm-4 control-label">End</label>
			      <div class="col-sm-8">
			       <div class="input-group">
			        <div class="input-group-addon">
			         <i class="fa fa-calendar">
			         </i>
			        </div>
			        <input class="form-control" id="date2" name="date2" placeholder="DD/MM/YYYY" type="text"/>
			       </div>
			      </div>
			     </div>

                <div class="form-group" >        
                  <div class="col-sm-offset-1 col-sm-4" style="float: right;">
                    <button style="margin-top: 10px;" type="submit"  class="btn btn-primary" name="search">Tìm kiếm</button>
                  </div>
                </div>
                <!--Date-->
                
                
                <!-- tung.vu 2018/03/19 start-->
                <input name="form" type="submit" value="Submit"/><br><br>
                    <?php                        
                        echo '<label for="comment">Kết quả</label>';
                        include("connect.php");
                        function convertStringToDate($str) 
                        {
                            return $st = substr($str,6,4) . '-' . substr($str, 3, 2) . '-' . substr($str, 0, 2);
                        }
                        $sqlwhere = "";

                        if(isset($_GET["geosearch"]) and $_GET["geosearch"]!=""){
                            $geosearch = $_GET["geosearch"];                            
                            include("mypoint.php");                                                              
                            $data_split = explode(",", $geosearch);
                            $y1 = floatval($data_split[0]);
                            $x1 = floatval($data_split[1]);
                            $y2 = floatval($data_split[2]);
                            $x2 = floatval($data_split[3]);                             
                            $polygon = array(new MyPoint($x1, $y1), new MyPoint($x2, $y1), new MyPoint($x2, $y2), new MyPoint($x1,$y2));                                                        
                            $sql = "select * from metadata where 1=1 ";
                            $result = pg_query($con, $sql)or die();
                            if(pg_fetch_array($result) != NULL)
                            {                                
                                include("geosearch.php");
                            } else {
                                echo "Không có dữ liệu 1";    
                            }
                            // reset variable
                            // $geosearch=null;                                                             
                        } else {   
                            if(isset($_GET["format"]) and $_GET["format"]!="")
                            {
                                $format = $_GET["format"];
                                $sqlwhere .= " and format LIKE '%".$format."%'" ;
                            }
                            if(isset($_GET["producttype"]) and $_GET["producttype"]!="")
                            {
                                $format = $_GET["format"];
                                $sqlwhere .= " and producttype LIKE '%".$producttype."%'" ;
                            }
                            if(isset($_GET["id_met"]) and $_GET["id_met"]!="")
                            {
                                $id_met = $_GET["id_met"];
                                $sqlwhere .= " and id_met LIKE '%".$id_met."%'" ;
                            }
                            if(isset($_GET["raster"]) and $_GET["raster"]!="")
                            {
                                $raster = $_GET["raster"];
                                $sqlwhere .= " and raster LIKE '%".$raster."%'" ;
                            }
                            if(isset($_GET["mapname"]) and $_GET["mapname"]!="")
                            {
                                $mapname = $_GET["mapname"];
                                $sqlwhere .= " and mapname LIKE '%".$mapname."%'" ;
                            }
    
                            if(isset($_GET["date"]) and $_GET["date"]!="" and $_GET["date2"]!=""  and isset($_GET["date2"])){
                                $d1 = $_GET["date"]; 
                                $date1 = convertStringToDate($d1);
                                $d2 = $_GET["date2"];
                                $date2 = convertStringToDate($d2);
                                $sqlwhere .=  " and (date BETWEEN  '".$date1."' and '".$date2."') ";
                            }                            
                            $sql = "select * from metadata where 1=1 ".$sqlwhere;                                  
                            $result = pg_query($con, $sql)or die();
                            if(pg_fetch_array($result) != NULL){                            
                            include("textsearch.php");
                            } else {
                            echo "Không có dữ liệu 2";
                            }
                        }
                    ?>
                <!-- tung.vu 2018/03/19 end  -->
           </form>
           </div><!--end class tuy bien-->
           
           <div style="width: 100%">
                <?php
                    // if(isset($_GET["search"])){
                    //     echo '<label for="comment">Kết quả</label>';
                    //     Include("ketqua.php");
                    // }
                ?>
                
           </div>    
          </div>
          <!--End Thanh tùy biến-->
          <!--Bản đồ-->
          <div class="col-sm-7 well" style=" height: 650px;">
              <!--Bản đồ-->
                <div id="map" class="smallmap"></div>
                <div id="panel" class="olControlEditingToolbar"></div>
				<!--<p id="bbox_result"> </p>-->
              <!--End bản đồ-->
          </div>
          <!--End Bản đồ-->
  
    <!-- Footer -->
   <?php
    include("footer.php");
   ?>
