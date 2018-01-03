<?php
include("header.php");
$_SESSION["id_nhom"];
?>
<div id="content-container"> 
  <!-- content wrapper start -->
  <div class="content-wrapper multiple clearfix"> 
    <!-- container_12 start -->
    <div class="container_12"> 
      <div style="margin-bottom: 0px;" class="grid_12">
        <h4>Quản Trị</h4> 
        					<!------>
						<div class='grid_4 service alpha'>
                            <div class='icon-container'>
                                <a href='services_detail.html' class='icon-th service-icon'></a>
                            </div>
                            <a href='metadata/index.php'><h4>Quản lý Thông tin Metadata</h4></a>                            
                            <p>Lorem ipsum dolor slo onsec tueraliquet Morbi nec In Curabitur lreaoreet nisl lorem in pellente pellente eget. Lorem ipsum dolor slo onsec Vivamus....</p>
                        </div>
       					 <!------>
                  <div class='grid_4 service '>
                            <div class='icon-container'>
                                <a href='services_detail.html' class='icon-time service-icon'></a>
                            </div>
                            <a href='baiviet/index.php'><h4>Quản lý Tin tức</h4></a>                            
                            <p>Lorem ipsum dolor slo onsec tueraliquet Morbi nec In Curabitur lreaoreet nisl lorem in pellente pellente eget. Lorem ipsum dolor slo onsec Vivamus....</p>
                        </div>
                        <!------>
                        <?php
                          if($_SESSION["id_nhom"] == 2){
                        ?>
                         <div class='grid_4 service omega'>
                            <div class='icon-container'>
                                <a href='' class='icon-info-sign service-icon'></a>
                            </div>
                            <a href='nguoidung/index.php'><h4>Quản lý Người Dùng</h4></a>                            
                            <p>Lorem ipsum dolor slo onsec tueraliquet Morbi nec In Curabitur lreaoreet nisl lorem in pellente pellente eget. Lorem ipsum dolor slo onsec Vivamus....</p>
                        </div><div class="clear"></div>
       					 <!------>
						
      					<div class="grid_4 service alpha">
                            <div class="icon-container">
                                <a href="" class="icon-group service-icon"></a>
                            </div>
                            <a href="nhomnguoidung/index.php"><h4>Nhóm người dùng</h4></a>                            
                            <p>Lorem ipsum dolor slo onsec tueraliquet Morbi nec In Curabitur lreaoreet nisl lorem in pellente pellente eget. Lorem ipsum dolor slo onsec Vivamus....</p>
                        </div>
                        <div class="grid_4 service alpha">
                            <div class="icon-container">
                                <a href="" class="icon-group service-icon"></a>
                            </div>
                            <a href="writelog/index.php"><h4>Nhật kí</h4></a>                            
                            <p>Lorem ipsum dolor slo onsec tueraliquet Morbi nec In Curabitur lreaoreet nisl lorem in pellente pellente eget. Lorem ipsum dolor slo onsec Vivamus....</p>
                        </div>
      						<!------>
                  <?php
                    }
                  ?>
      </div>
    </div>
    <!-- container_12 end --> 
<?php 
	include("footer.php");
?>