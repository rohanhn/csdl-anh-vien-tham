<?php 
session_start();
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>Administrator</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2_metro.css" />
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="assets/css/pages/login-soft.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
	<!-- BEGIN LOGO -->
	<div class="logo">
		<!-- PUT YOUR LOGO HERE -->
	</div>
	<!-- END LOGO -->
	<!-- BEGIN LOGIN -->
    <?php 
	$con = pg_connect("host='localhost' port='5432' dbname='vientham' user='postgres' password='123456' ") or die('unable to connect database');
if(isset($_POST["dangnhap"]))
{
   if($_POST["username"]=="" or $_POST["password"]=="")
      echo "<div class='alert alert-error hide'>
				<button class='close' data-dismiss='alert'></button>
				<span>Enter any username and password.</span>
			</div>";
   else 
   {	  
       $sql = "select * from tbnguoidung where username ='".$_POST["username"]."' and  password='".$_POST["password"]."'";
       $result =  pg_query($con, $sql);
	   $sl = pg_num_rows($result);
	   if(pg_num_rows($result)<=0){
	    echo "nhap sai thong tin tai khoan";
	   }
	   else
	   {
	     $_SESSION["username"] = $_POST["username"];
		 $row = pg_fetch_array($result);
		 $_SESSION["login"] = "ok";
		 $_SESSION["id_nhom"] = $row["id_nhom"];
		 $_SESSION["id_nguoidung"] = $row["id_nguoidung"];
		 date_default_timezone_set('Asia/Ho_Chi_Minh');
		 $date = date('Y-m-d H:i:s');
		 $qr_log =  "insert into  writelog (id_nguoidung, thoigian, noidung) values ('".$_SESSION["id_nguoidung"]."', '".$date."', 'Đăng nhập')";
		 pg_query($con, $qr_log)or die("Lỗi qrlog");
	     header("location:index.php");
	   }	  
   
   }
}
?>
<div class="content">
		<!-- BEGIN LOGIN FORM -->
  <form class="form-vertical login-form" action="" method="post">
			<h3 class="form-title">Đăng nhập hệ thống</h3>
			
			<div class="control-group">
				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
				<label class="control-label visible-ie8 visible-ie9">Username</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-user"></i>
					  <input class="m-wrap placeholder-no-fix" type="text" autocomplete="off" placeholder="username" name="username"/>
					</div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label visible-ie8 visible-ie9">Password</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-lock"></i>
					  <input class="m-wrap placeholder-no-fix" type="password" autocomplete="off" placeholder="password" name="password"/>
					</div>
				</div>
			</div>
		  <div class="form-actions">
		    <input type="submit" name="dangnhap" class="btn blue pull-right" value="Login"/>      
	  </div>
		</form>
        
        <?php 
function sql_quote( $value ){
    // kiem tra thiet lap trong file php.ini (bien ten la magic_quotes_gpc), 
	if(get_magic_quotes_gpc() ) //neu tra ve 1 -> tu la magic_quotes_gpc = ON
	{
	    //để loại bỏ các dấu \
		$value = stripslashes( $value );
	}
	//',",<,>,*,/,-,#,&
	//check if this function exists : neu co ton tai thi PHP tu 5.0 tro len
	if( function_exists( "mysql_real_escape_string" ) )
	{
		//$value = mysql_real_escape_string( $value );
	} 
	else 
	{ //for PHP version < 4.3.0 use addslashes
	$value = addslashes( $value );
	}
	//thoat ky tu : _ , %
	$value = str_replace("_","\_",$value);
    $value = str_replace("%","\%",$value); 
	return $value;
}
?>

		<!-- END LOGIN FORM -->        
		<!-- BEGIN FORGOT PASSWORD FORM --><!-- END FORGOT PASSWORD FORM -->
	<!-- BEGIN REGISTRATION FORM --><!-- END REGISTRATION FORM -->
  </div>
	<!-- END LOGIN -->
	<!-- BEGIN COPYRIGHT -->
	<div class="copyright"> <a style="color:#FFF" target="_blank" href="../index.php"> Hệ thống quản lý và khai thác CSDL Viễn thám</a>
	</div>
	<!-- END COPYRIGHT -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   <script src="assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<!--[if lt IE 9]>
	<script src="assets/plugins/excanvas.min.js"></script>
	<script src="assets/plugins/respond.min.js"></script>  
	<![endif]-->   
	<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
	<script src="assets/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<script src="assets/scripts/app.js" type="text/javascript"></script>  
	<!-- END PAGE LEVEL SCRIPTS --> 
	<!-- END JAVASCRIPTS -->
	
</body>
<!-- END BODY -->
</html>