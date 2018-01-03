<?php
    include("header.php");
?>
    <!-- Main Content -->
    <div class="container-fluid" style="height:600px ; font-size: 12px">
          <!--Thanh tùy biến-->
          
          <div class="col-sm-4 well" style="height:600px">
            <div class="tuybien" style="width: 100%; float: left;">
          <label for="comment">Thanh tùy biến</label>
          <form action="" method="get">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Type</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="producttype" name="producttype" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Format</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Format" name="format" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Raster</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Raster" name="raster" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">ID</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="ID" name="id_met" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">MapName</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="ID" name="mapname" type="text">
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-sm-3 control-label">LatLong</label>
                    <div class="col-sm-9">
                        <i class="form-control" id="latlong" name="latlong" type="text"></i>
                    </div>
                </div>
                <div class="form-group ">
				    <label class="col-sm-3 control-label">Start</label>
			      <div class="col-sm-9">
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
				    <label class="col-sm-3 control-label">End</label>
			      <div class="col-sm-9">
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
                
           </form>
           </div><!--end class tuy bien-->
           
           <div style="width: 100%">
                <?php
                    if(isset($_GET["search"])){
                        echo '<label for="comment">Kết quả</label>';
                        Include("ketqua.php");
                    }
                ?>
           </div>    
          </div>
          <!--End Thanh tùy biến-->
          <!--Bản đồ-->
          <div class="col-sm-8 well" style=" height: 600px;">
              <!--Bản đồ-->
                <div id="map" class="smallmap"></div>
                <div id="panel" class="olControlEditingToolbar"></div>
				<p id="bbox_result"> </p>
              <!--End bản đồ-->
          </div>
          <!--End Bản đồ-->
  
    <!-- Footer -->
   <?php
    include("footer.php");
   ?>
