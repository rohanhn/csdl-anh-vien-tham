<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hệ QTCSDL Viễn Thám</title>
	<!-- CSS thêm -->
	<!--<link rel="stylesheet" href="style1.css">-->
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css">
    <script type="text/javascript" src="bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Theme CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!--DATE-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

	<!-- Include Date Range Picker -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
	<script>
		$(document).ready(function(){
			var start=$('input[name="date"]'); //our date input has the name "date"
			var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
			start.datepicker({
                format: 'dd/mm/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            })
		})
	</script>
	<script>
		$(document).ready(function(){
			var end=$('input[name="date2"]'); //our date input has the name "date"
			var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
			end.datepicker({
				format: 'dd/mm/yyyy',
				container: container,
				todayHighlight: true,
				autoclose: true,
			})
		})
	</script>
    <!--end date-->
    <!--JS Vien Tham-->
    <script type="text/javascript" src="OpenLayers-2.10/lib/OpenLayers.js"></script>
    <script type="text/javascript">
        var map, measureaControls, markers;
				
			
        
		//alert(box_extents[1]);
		var wms_province = new OpenLayers.Layer.WMS(
                    "Tỉnh",
                    "http://localhost:8086/cgi-bin/mapserv.exe?map=C:/ms4w/Apache/htdocs/vientham/mapfile/vietnam.map",
                    {
                        layers : "province",
                        isBaseLayer : true
                    });
            //Declare layer huyện
            var wms_district = new OpenLayers.Layer.WMS(
                    "Huyện",
                    "http://localhost:8086/cgi-bin/mapserv.exe?map=C:/ms4w/Apache/htdocs/vientham/mapfile/vietnam.map",
                    {
                        layers : "district",
                        isBaseLayer : false
                    });
					
		function endDrag(bbox) {
            var bounds = bbox.getBounds();
            setBounds(bounds);
            drawBox(bounds);
            box.deactivate();
        
            document.getElementById("bbox_drag_instruction").style.display = 'none';
            document.getElementById("bbox_adjust_instruction").style.display = 'block';        
        }
      
        function dragNewBox() {
            box.activate();
            transform.deactivate(); //The remove the box with handles
            vectors.destroyFeatures();
        
            document.getElementById("bbox_drag_instruction").style.display = 'block';
            document.getElementById("bbox_adjust_instruction").style.display = 'none';
        
            setBounds(null); 
        }
      
        function boxResize(event) {
            setBounds(event.feature.geometry.bounds);
        }
      
        function drawBox(bounds) {
            var feature = new OpenLayers.Feature.Vector(bounds.toGeometry()); 
            vectors.addFeatures(feature);
            transform.setFeature(feature);
        }
      
        function toPrecision(zoom, value) {
            var decimals = Math.pow(10, Math.floor(zoom/3));
            return Math.round(value * decimals) / decimals;
        }
      
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
                    var $polygon = array((minlon, minlat), (minlon, maxlat), (maxlon, minlat), (maxlon, maxlat));
                }
        }       
		
		function draw(x1, y1, x2, y2){
			var boxes  = new OpenLayers.Layer.Boxes( "Boxes" );
			//bounds = OpenLayers.Bounds(x1, y1, x2, y2);	
                //for (var i = 0; i < box_extents.length; i++) {
                    //ext = [x1, y1, x2, y2];
                    bounds = OpenLayers.Bounds.fromString(x1, y1, x2, y2);
					
                    box = new OpenLayers.Marker.Box(bounds);
                    box.events.register("click", box, function (e) {
                      this.setBorder("yellow");
                   });
                   boxes.addMarker(box);
                //}
			map.addLayers([wms_province, boxes]);
            map.addLayers([wms_district, boxes]);
			//map.setCenter((new OpenLayers.LonLat(105.701374, 20.048171)), 9);
			//map.getExtent(new OpenLayers.Bounds(bounds));
			//map.zoomTo(map.getZoomForExtent(box_extents));
			map.zoomToExtent(bounds);
		}
		
        function init(){
            //alert("1");
            
            var bounds = new OpenLayers.Bounds(101.567139, 7.326586, 109.251956, 24.509979);
            var options = {
                controls : [],
                maxExtent : bounds, 
                //maxResolution : 0.0010217594533836,
                projection : "EPSG:4326",
                units : 'degrees'
            };
            map = new OpenLayers.Map('map', options);
            //Declare layer tỉnh        
			
							
            //map.addLayer(wms_roads);
            map.addLayer(wms_province);
            map.addLayer(wms_district);
            //map.addLayer(wms_DinhTanYenDinhThanhHoa);
            //Dùng để Zoom Extent đối tượng khi load
            map.zoomToExtent(bounds);
            
            //Dùng để tạo quản lý các lớp
            map.addControl(new OpenLayers.Control.LayerSwitcher());
            //Tạo ra thanh Pan Zoom dài
            map.addControl(new OpenLayers.Control.PanZoomBar({
                position : new OpenLayers.Pixel(2, 7)
            }));
            
            //HIển thị cặp tọa độ (Lat,Long)
            map.addControl(new OpenLayers.Control.MousePosition());
            map.addControl(new OpenLayers.Control.Navigation());
        
            //tạo ra một cửa sổ view toàn bộ bản đồ
            //Customize overview map
            var overviewOptions = {
                maximized: false,
                autoPan: true,
                mapOptions: {
                    units: "m",
                    numZoomLevels: 4
                }
            };
            map.addControl(new OpenLayers.Control.OverviewMap(overviewOptions));
            //Thước tỷ lệ
            map.addControl(new OpenLayers.Control.ScaleLine());
            //Thiết lập điểm giữa bản đồ là (108.04467, 12.67987) và mức độ zoom là 7
            map.setCenter((new OpenLayers.LonLat(106.35, 21.0833333333)), 9);
            
            //      Tạo thanh Control Panel
            vlayer = new OpenLayers.Layer.Vector( "Editable" );
            map.addLayer(vlayer);
            var container = document.getElementById("panel");
            var edit = new OpenLayers.Control.EditingToolbar(
                    vlayer, {div: container}
                );
            map.addControl(edit);
			
			var lonlat = new OpenLayers.LonLat(106.35, 21.0833333333);
            var zoom = 9;
            vectors = new OpenLayers.Layer.Vector("Vector Layer");
            map.addLayer(vectors);
     
            box = new OpenLayers.Control.DrawFeature(vectors, OpenLayers.Handler.RegularPolygon, {
                handlerOptions: {
                    sides: 4,
                    snapAngle: 90,
                    irregular: true,
                    persist: true
                }
            });
            box.handler.callbacks.done = endDrag;
            map.addControl(box);
     
            transform = new OpenLayers.Control.TransformFeature(vectors, {
                        rotate: false,
                        irregular: true
            });
            transform.events.register("transformcomplete", transform, boxResize);
            map.addControl(transform);
        
            map.addControl(box);
        
            box.activate();
            map.setCenter(lonlat, zoom);
            
            zo=new OpenLayers.Control.PanZoom({title:""});
            //zb= new OpenLayers.Control.ZoomBox({title:"Zoom Box"});
            var panel= new OpenLayers.Control.Panel({defaultControl: zo});
            panel.addControls([
                            new OpenLayers.Control.MouseDefaults({title:'Pan'}),
                            new OpenLayers.Control.ZoomBox({title:"Zoom Box"}),
                            new OpenLayers.Control.ZoomIn({title:"Zoom In"}),
                            new OpenLayers.Control.ZoomOut({title:"Zoom Out"}),                            
                            new OpenLayers.Control.ZoomToMaxExtent({title:"Zoom Extent"}),
                            box
                            ]);
            //Khai bao bien nav la kieu lich su dieu huong
            nav= new OpenLayers.Control.NavigationHistory();
            //Them bien nav vao ban do
            map.addControl(nav);
            //Them cong cu lich su dieu huong truoc va sau
            panel.addControls([nav.next, nav.previous]);
            //add panel vao ban do
            map.addControl(panel);     
        
          } 
    </script>
    <!--End JS Vien Tham-->
	

    <!-- jQuery -->

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>
</head>

<body onload= "init()">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php">Trang chủ</a>
                    </li>
                    <li>
                        <a href="news.php">Tin tức</a>
                    </li>
                    <li>
                        <a href="#">Về chúng tôi</a>
                    </li>
                    <li>
                        <a href="#">Liên hệ</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" >
    <img style="width: 100%; height: 100px; margin: 0 auto;" src="img/banner.png">
    </header>
