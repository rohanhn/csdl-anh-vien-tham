
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<?php
	include("header.php");
?>

<section class="page-title">
            <div class="title pattern-default">
                <h3> Quản Trị</h3>
                <span class="subtitle">
                    Quản lý Nhóm người dùng                </span>
            </div>                     
        </section>

 <div class="container_12">
 <?php 

//lay bien get ID tren thanh dia chi
$id = $_GET["id"];
$sql = "select * from tbnhomnguoidung where id_nhom =".$id;
$result = pg_query($con, $sql)or die();
//chu y : neu lay 1 ban ghi thi se khong co while o ngoai
$row = pg_fetch_array($result);

?>
    <!----->
    <h4>Sửa thông tin</h4>
  <form action="nhom_update.php" class="form-horizontal" role="form" method="post" >
  <input name="id" type="hidden" value="<?php echo $id  ?>" />
    <div class="form-group">
      <label class="control-label col-sm-2" for="ten_nhom">Tên nhóm</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" required="required" id="GroupName" name="ten_nhom" value="<?php echo $row["ten_nhom"] ?>">
      </div>
    </div>
   
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Cập nhật</button>
        
      </div>
    </div>
  </form>
    
    <!----->
 </div>
         
<?php
include("../footer.php");
?>