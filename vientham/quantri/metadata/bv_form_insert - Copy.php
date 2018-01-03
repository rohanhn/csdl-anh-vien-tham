<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<style>
.container_12{
	font-family:Arial, Helvetica, sans-serif;
}
<?php
  include("header.php");
?>
</style>
<!--Import Files-->
<script type="text/javascript">
            function readXml(txt)
            {
                if (window.DOMParser)
                {
                    parser = new DOMParser();
                    xmlDoc = parser.parseFromString(txt, "text/xml");
                } else // Internet Explorer
                {
                    xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
                    xmlDoc.async = false;
                    xmlDoc.loadXML(txt);
                }

                var Metadata_Id = xmlDoc.getElementsByTagName("Metadata_Id");
                var Dataset_Id = xmlDoc.getElementsByTagName("Dataset_Id");
                var Data_Access = xmlDoc.getElementsByTagName("Data_Access");
                var Data_Processing = xmlDoc.getElementsByTagName("Data_Processing");
                var Vertex = xmlDoc.getElementsByTagName("Vertex");
                var Scene_Center = xmlDoc.getElementsByTagName("Scene_Center");
                var Coordinate_Reference_System = xmlDoc.getElementsByTagName("Coordinate_Reference_System");
                var Horizontal_CS = xmlDoc.getElementsByTagName("Horizontal_CS");
                var Production = xmlDoc.getElementsByTagName("Production");                

                document.getElementById("format").value = Metadata_Id[0].getElementsByTagName("METADATA_FORMAT")[0].childNodes[0].nodeValue;
                document.getElementById("raster").value = Data_Access[0].getElementsByTagName("DATA_FILE_FORMAT")[0].childNodes[0].nodeValue;
                document.getElementById("mapname").value = Dataset_Id[0].getElementsByTagName("DATASET_NAME")[0].childNodes[0].nodeValue;
                document.getElementById("GeometricProcessing").value = Data_Processing[0].getElementsByTagName("GEOMETRIC_PROCESSING")[0].childNodes[0].nodeValue;
                document.getElementById("RadiometricProcessing").value = Data_Processing[0].getElementsByTagName("RADIOMETRIC_PROCESSING")[0].childNodes[0].nodeValue;
                document.getElementById("Corner1").value = Vertex[0].getElementsByTagName("FRAME_LON")[0].childNodes[0].nodeValue + "," + Vertex[0].getElementsByTagName("FRAME_LAT")[0].childNodes[0].nodeValue;
                document.getElementById("Corner2").value = Vertex[1].getElementsByTagName("FRAME_LON")[0].childNodes[0].nodeValue + "," + Vertex[1].getElementsByTagName("FRAME_LAT")[0].childNodes[0].nodeValue;
                document.getElementById("Corner3").value = Vertex[2].getElementsByTagName("FRAME_LON")[0].childNodes[0].nodeValue + "," + Vertex[2].getElementsByTagName("FRAME_LAT")[0].childNodes[0].nodeValue;
                document.getElementById("Corner4").value = Vertex[3].getElementsByTagName("FRAME_LON")[0].childNodes[0].nodeValue + "," + Vertex[3].getElementsByTagName("FRAME_LAT")[0].childNodes[0].nodeValue;
                document.getElementById("CornerC").value = Scene_Center[0].getElementsByTagName("FRAME_LON")[0].childNodes[0].nodeValue + "," + Scene_Center[0].getElementsByTagName("FRAME_LAT")[0].childNodes[0].nodeValue;
                document.getElementById("GeocodingTablesIdentification").value = Coordinate_Reference_System[0].getElementsByTagName("GEO_TABLES")[0].childNodes[0].nodeValue;
                document.getElementById("HorizontalType").value = Horizontal_CS[0].getElementsByTagName("HORIZONTAL_CS_TYPE")[0].childNodes[0].nodeValue;                
                document.getElementById("HorizontalName").value = Horizontal_CS[0].getElementsByTagName("HORIZONTAL_CS_NAME")[0].childNodes[0].nodeValue;   
                document.getElementById("ProductionDate").value = Production[0].getElementsByTagName("DATASET_PRODUCTION_DATE")[0].childNodes[0].nodeValue;
                document.getElementById("JobIdentification").value = Production[0].getElementsByTagName("JOB_ID")[0].childNodes[0].nodeValue;
                document.getElementById("ProductType").value = Production[0].getElementsByTagName("PRODUCT_TYPE")[0].childNodes[0].nodeValue;                
                document.getElementById("DatasetProducer").value = Production[0].getElementsByTagName("DATASET_PRODUCER_NAME")[0].childNodes[0].nodeValue;
                document.getElementById("DatasetProducer").value = Production[0].getElementsByTagName("DATASET_PRODUCER_NAME")[0].childNodes[0].nodeValue;
                
            }
            window.onload = function () {
                //Check the support for the File API support
                if (window.File && window.FileReader && window.FileList && window.Blob) {
                    var fileSelected = document.getElementById('txtfiletoread');
                    fileSelected.addEventListener('change', function (e) {
                        //Set the extension for the file
                        var fileExtension = /text.*/;
                        //Get the file object
                        var fileTobeRead = fileSelected.files[0];
                        //Check of the extension match
                        if (fileTobeRead.type.match(fileExtension)) {
                            //Initialize the FileReader object to read the 2file
                            var fileReader = new FileReader();
                            fileReader.onload = function (e)
                            {
                                readXml(fileReader.result);
                            }
                            fileReader.readAsText(fileTobeRead);
                        } else {
                            alert("Please select text file");
                        }

                    }, false);
                } else {
                    alert("Files are not supported");
                }
            }

        </script>
        <style type="text/css">
            #filecontents { border: double; overflow-y: scroll; height: 400px;}
        </style>
<!--End Import Files -->


<script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>

<section class="page-title">
            <div class="title pattern-default">
                <span class="subtitle">
                    Quản lý Thông tin Metadata </span>
            </div>                     
        </section>
 <div class="container_12">
    <h4>Thêm mới </h4>
  Chọn file upload: <input type="file" id="txtfiletoread" />
  <form action="bv_insert.php" class="form-horizontal" role="form" method="post" enctype="multipart/form-data" >
    <div class="form-group">
      <label class="control-label col-sm-2" for="ten_nhom">Format</label>
      <div class="col-sm-4">
        <input type="text"  class="form-control" id="format" name="format"  required="required">
      </div>
	  </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="ten_nhom">Raster</label>
      <div class="col-sm-4">
        <input type="text"  class="form-control" id="raster" name="raster"  required="required">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="ten_nhom">ID</label>
      <div class="col-sm-4">
        <input type="text"  class="form-control" id="id_met" name="id_met"  required="required">
      </div>
    </div>
	 <div class="form-group">
	   <label class="control-label col-sm-2" for="ten_nhom">MapName</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="mapname" name="mapname"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Geometric Processing</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="GeometricProcessing" name="GeometricProcessing"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">RadiometricProcessing</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="RadiometricProcessing" name="RadiometricProcessing"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Profile</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="profile" name="profile"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Corner1</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="Corner1" name="Corner1"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Frame_row1</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="frame_row1" name="frame_row1"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Frame_col1</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="frame_col1" name="frame_col1"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Corner2</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="Corner2" name="Corner2"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Frame_row2</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="frame_col2" name="frame_row2"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Frame_col2</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="Corner2" name="frame_col2"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Corner3</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="Corner3" name="Corner3"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Frame_row3</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="Frame_row3" name="frame_row3"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Frame_col3</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="Frame_col3" name="frame_col3"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Corner4</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="Corner4" name="Corner4"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Frame_row4</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="Frame_row4" name="frame_row4"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Frame_col4</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="Frame_col4" name="frame_col4"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">CornerC</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="CornerC" name="CornerC"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Geocoding</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="GeocodingTablesIdentification" name="GeocodingTablesIdentification"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Horizontal Type</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="HorizontalType" name="HorizontalType"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Horizontal Name</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="HorizontalName" name="HorizontalName"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Production Date</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="ProductionDate" name="ProductionDate"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Job identification</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="JobIdentification" name="JobIdentification"  required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Product type</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="ProductType" name="ProductType"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Dataset Producer</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="DatasetProducer" name="DatasetProducer"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Source ID</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="SourceID" name="source_id"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Mission</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="Mission" name="mission"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Processing Level</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="ProcessingLevel" name="processing_level"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Geo table</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="Geotable" name="geo_table"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Hori_Type</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="Hori_Type" name="hori_type"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">hori_code</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="hori_code" name="hori_code"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">hori_name</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="hori_name" name="hori_name"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Job ID</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="job_id" name="job_id"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Pro Info</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="pro_info" name="pro_info"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Pro_type</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="pro_type" name="pro_type"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Pro_name</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="pro_name" name="pro_name"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Pro_url</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="pro_url" name="pro_url"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Pro_level</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="pro_level" name="pro_level"  ></textarea>
      </div>
    </div>
     <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">VIEWING_ANGLE_ALONG</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="view_along" name="view_along">
          
        </textarea>
      </div>
    </div>
     <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">VIEWING_ANGLE_ACROSS</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="view_across" name="view_across"  ></textarea>
      </div>
    </div>
     <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">SATELLITE_INCIDENCE</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="incidence" name="incidence"  ></textarea>
      </div>
    </div>
     <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">SATELLITE_AZIMUTH</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="azimuth" name="azimuth"  ></textarea>
      </div>
    </div>
     <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">SUN_AZIMUTH</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="sun_azimuth" name="sun_azimuth"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">SUN_ELEVATION</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="sun_elevation" name="sun_elevation"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">REVOLUTION_NUMBER</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="revolution_number" name="revolution_number"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Hình ảnh</label>
      <div class="col-sm-8">
        <input type="file" class="form-control" id="hinhanh" name="hinhanh" />
      </div>
    </div>

	<!---->
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Thêm mới</button>
        
      </div>
    </div>
  </form>
 </div>
         
<?php
include("../footer.php");
?>