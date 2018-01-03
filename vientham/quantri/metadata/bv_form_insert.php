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

                var Dataset_Frame = xmlDoc.getElementsByTagName("Dataset_Frame");
				        var Dataset_Sources = xmlDoc.getElementsByTagName("Dataset_Sources");
				
				        var Source_Information = xmlDoc.getElementsByTagName("Source_Information");
                var Metadata_Id = xmlDoc.getElementsByTagName("Metadata_Id");
                var Dataset_Id = xmlDoc.getElementsByTagName("Dataset_Id");
                var Data_Access = xmlDoc.getElementsByTagName("Data_Access");
                var Data_Processing = xmlDoc.getElementsByTagName("Data_Processing");
                var PROCESSING_LEVEL = xmlDoc.getElementsByTagName("PROCESSING_LEVEL");
                var Vertex = xmlDoc.getElementsByTagName("Vertex");
                var Scene_Center = xmlDoc.getElementsByTagName("Scene_Center");
                var Coordinate_Reference_System = xmlDoc.getElementsByTagName("Coordinate_Reference_System");
                var Horizontal_CS = xmlDoc.getElementsByTagName("Horizontal_CS");
                var HORIZONTAL_CS_CODE = xmlDoc.getElementsByTagName("HORIZONTAL_CS_CODE");
                var Production = xmlDoc.getElementsByTagName("Production");
                var JOB_ID = xmlDoc.getElementsByTagName("JOB_ID");
        				var SOURCE_ID = xmlDoc.getElementsByTagName("SOURCE_ID");
        				var Scene_Source = xmlDoc.getElementsByTagName("Scene_Source");
                var SUN_ELEVATION = xmlDoc.getElementsByTagName("SUN_ELEVATION");
                var VIEWING_ANGLE_ALONG_TRACK = xmlDoc.getElementsByTagName("VIEWING_ANGLE_ALONG_TRACK");
                var VIEWING_ANGLE_ACROSS_TRACK = xmlDoc.getElementsByTagName("VIEWING_ANGLE_ACROSS_TRACK");
                var SATELLITE_INCIDENCE_ANGLE = xmlDoc.getElementsByTagName("SATELLITE_INCIDENCE_ANGLE");
                var REVOLUTION_NUMBER = xmlDoc.getElementsByTagName("REVOLUTION_NUMBER");
                var SATELLITE_AZIMUTH_ANGLE = xmlDoc.getElementsByTagName("SATELLITE_AZIMUTH_ANGLE");
                var SUN_AZIMUTH = xmlDoc.getElementsByTagName("SUN_AZIMUTH");
        				var mission = xmlDoc.getElementsByTagName("MISSION");
        				var SCENE_PROCESSING_LEVEL = xmlDoc.getElementsByTagName("SCENE_PROCESSING_LEVEL");
                var PRODUCT_INFO = xmlDoc.getElementsByTagName("PRODUCT_INFO");
                var PRODUCT_TYPE = xmlDoc.getElementsByTagName("PRODUCT_TYPE");
                var DATASET_PRODUCER_NAME = xmlDoc.getElementsByTagName("DATASET_PRODUCER_NAME");
                var DATASET_PRODUCER_URL = xmlDoc.getElementsByTagName("DATASET_PRODUCER_URL");

                document.getElementById("format").value = Metadata_Id[0].getElementsByTagName("METADATA_FORMAT")[0].childNodes[0].nodeValue;
                document.getElementById("raster").value = Data_Access[0].getElementsByTagName("DATA_FILE_FORMAT")[0].childNodes[0].nodeValue;
                document.getElementById("mapname").value = Dataset_Id[0].getElementsByTagName("DATASET_NAME")[0].childNodes[0].nodeValue;
                document.getElementById("GeometricProcessing").value = Data_Processing[0].getElementsByTagName("GEOMETRIC_PROCESSING")[0].childNodes[0].nodeValue;
                document.getElementById("PROCESSING_LEVEL").value = Data_Processing[0].getElementsByTagName("PROCESSING_LEVEL")[0].childNodes[0].nodeValue;
                document.getElementById("RadiometricProcessing").value = Data_Processing[0].getElementsByTagName("RADIOMETRIC_PROCESSING")[0].childNodes[0].nodeValue;
                document.getElementById("Corner1").value = Vertex[0].getElementsByTagName("FRAME_LON")[0].childNodes[0].nodeValue + "," + Vertex[0].getElementsByTagName("FRAME_LAT")[0].childNodes[0].nodeValue;
                document.getElementById("Corner2").value = Vertex[1].getElementsByTagName("FRAME_LON")[0].childNodes[0].nodeValue + "," + Vertex[1].getElementsByTagName("FRAME_LAT")[0].childNodes[0].nodeValue;
                document.getElementById("Corner3").value = Vertex[2].getElementsByTagName("FRAME_LON")[0].childNodes[0].nodeValue + "," + Vertex[2].getElementsByTagName("FRAME_LAT")[0].childNodes[0].nodeValue;
                document.getElementById("Corner4").value = Vertex[3].getElementsByTagName("FRAME_LON")[0].childNodes[0].nodeValue + "," + Vertex[3].getElementsByTagName("FRAME_LAT")[0].childNodes[0].nodeValue;
                document.getElementById("CornerC").value = Scene_Center[0].getElementsByTagName("FRAME_LON")[0].childNodes[0].nodeValue + "," + Scene_Center[0].getElementsByTagName("FRAME_LAT")[0].childNodes[0].nodeValue;
                document.getElementById("GeocodingTablesIdentification").value = Coordinate_Reference_System[0].getElementsByTagName("GEO_TABLES")[0].childNodes[0].nodeValue;
                document.getElementById("HorizontalType").value = Horizontal_CS[0].getElementsByTagName("HORIZONTAL_CS_TYPE")[0].childNodes[0].nodeValue;                
                document.getElementById("HorizontalName").value = Horizontal_CS[0].getElementsByTagName("HORIZONTAL_CS_NAME")[0].childNodes[0].nodeValue; 
                document.getElementById("HORIZONTAL_CS_CODE").value = Horizontal_CS[0].getElementsByTagName("HORIZONTAL_CS_CODE")[0].childNodes[0].nodeValue;   
                document.getElementById("ProductionDate").value = Production[0].getElementsByTagName("DATASET_PRODUCTION_DATE")[0].childNodes[0].nodeValue;
                               
                document.getElementById("DatasetProducer").value = Production[0].getElementsByTagName("DATASET_PRODUCER_NAME")[0].childNodes[0].nodeValue;
                document.getElementById("DatasetProducer").value = Production[0].getElementsByTagName("DATASET_PRODUCER_NAME")[0].childNodes[0].nodeValue;
                document.getElementById("profile").value = Metadata_Id[0].getElementsByTagName("METADATA_PROFILE")[0].childNodes[0].nodeValue;				
				document.getElementById("source_id").value = Source_Information[0].getElementsByTagName("SOURCE_ID")[0].childNodes[0].nodeValue;
				document.getElementById("mission").value = Scene_Source[0].getElementsByTagName("MISSION")[0].childNodes[0].nodeValue;
        document.getElementById("VIEWING_ANGLE_ALONG_TRACK").value = Scene_Source[0].getElementsByTagName("VIEWING_ANGLE_ALONG_TRACK")[0].childNodes[0].nodeValue;
				document.getElementById("processing_level").value = Scene_Source[0].getElementsByTagName("SCENE_PROCESSING_LEVEL")[0].childNodes[0].nodeValue;
        document.getElementById("SATELLITE_INCIDENCE_ANGLE").value = Scene_Source[0].getElementsByTagName("SATELLITE_INCIDENCE_ANGLE")[0].childNodes[0].nodeValue;
        document.getElementById("VIEWING_ANGLE_ACROSS_TRACK").value = Scene_Source[0].getElementsByTagName("VIEWING_ANGLE_ACROSS_TRACK")[0].childNodes[0].nodeValue;
        document.getElementById("SATELLITE_AZIMUTH_ANGLE").value = Scene_Source[0].getElementsByTagName("SATELLITE_AZIMUTH_ANGLE")[0].childNodes[0].nodeValue;
        document.getElementById("SUN_AZIMUTH").value = Scene_Source[0].getElementsByTagName("SUN_AZIMUTH")[0].childNodes[0].nodeValue;
        document.getElementById("SUN_ELEVATION").value = Scene_Source[0].getElementsByTagName("SUN_ELEVATION")[0].childNodes[0].nodeValue;
        document.getElementById("REVOLUTION_NUMBER").value = Scene_Source[0].getElementsByTagName("REVOLUTION_NUMBER")[0].childNodes[0].nodeValue;
        document.getElementById("JOB_ID").value = Production[0].getElementsByTagName("JOB_ID")[0].childNodes[0].nodeValue;
        document.getElementById("PRODUCT_TYPE").value = Production[0].getElementsByTagName("PRODUCT_TYPE")[0].childNodes[0].nodeValue;
        document.getElementById("PRODUCT_INFO").value = Production[0].getElementsByTagName("PRODUCT_INFO")[0].childNodes[0].nodeValue;
        document.getElementById("DATASET_PRODUCER_NAME").value = Production[0].getElementsByTagName("DATASET_PRODUCER_NAME")[0].childNodes[0].nodeValue;
        document.getElementById("DATASET_PRODUCER_URL").value = Production[0].getElementsByTagName("DATASET_PRODUCER_URL")[0].childNodes[0].nodeValue;

                
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
    <!--<div class="form-group">
      <label class="control-label col-sm-2" for="ten_nhom">ID</label>
      <div class="col-sm-4">
        <input type="text"  class="form-control" id="id_met" name="id_met"  required="required">
      </div>
    </div>-->
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
     <label class="control-label col-sm-2" for="ten_nhom">Corner2</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="Corner2" name="Corner2"  required="required"></textarea>
      </div>
    </div>
    
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Corner3</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="Corner3" name="Corner3"  required="required"></textarea>
      </div>
    </div>
    
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Corner4</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="Corner4" name="Corner4"  required="required"></textarea>
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
     <label class="control-label col-sm-2" for="ten_nhom">Horizontal Code</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="HORIZONTAL_CS_CODE" name="hori_code"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Production Date</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="ProductionDate" name="ProductionDate"  required="required"></textarea>
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
        <textarea type="text"  class="form-control" id="source_id" name="source_id"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Mission</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="mission" name="mission"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Processing Level</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="processing_level" name="processing_level"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Job ID</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="JOB_ID" name="job_id"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">PRODUCT INFO</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="PRODUCT_INFO" name="pro_info"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">PRODUCT TYPE</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="PRODUCT_TYPE" name="pro_type"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">PRODUCER NAME</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="DATASET_PRODUCER_NAME" name="pro_name"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">PRODUCER URL</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="DATASET_PRODUCER_URL" name="pro_url"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">PROCESSING LEVEL</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="PROCESSING_LEVEL" name="pro_level"  ></textarea>
      </div>
    </div>
     <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">VIEWING_ANGLE_ALONG</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="VIEWING_ANGLE_ALONG_TRACK" name="view_along"></textarea>
      </div>
    </div>
     <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">VIEWING_ANGLE_ACROSS</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="VIEWING_ANGLE_ACROSS_TRACK" name="view_across"  ></textarea>
      </div>
    </div>
     <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">SATELLITE_INCIDENCE</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="SATELLITE_INCIDENCE_ANGLE" name="incidence"  ></textarea>
      </div>
    </div>
     <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">SATELLITE_AZIMUTH</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="SATELLITE_AZIMUTH_ANGLE" name="azimuth"  ></textarea>
      </div>
    </div>
     <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">SUN_AZIMUTH</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="SUN_AZIMUTH" name="sun_azimuth"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">SUN_ELEVATION</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="SUN_ELEVATION" name="sun_elevation"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">REVOLUTION_NUMBER</label>
      <div class="col-sm-8">
        <textarea type="text"  class="form-control" id="REVOLUTION_NUMBER" name="revolution_number"  ></textarea>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">Hình ảnh</label>
      <div class="col-sm-8">
        <input type="file" class="form-control" id="hinhanh" name="hinhanh" required="required" />
      </div>
    </div>
	<div class="form-group">
     <label class="control-label col-sm-2" for="ten_nhom">File Report</label>
      <div class="col-sm-8">
        <input type="file" class="form-control" id="file_report" name="file_report" required="required" />
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