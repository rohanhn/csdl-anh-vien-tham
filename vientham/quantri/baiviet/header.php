<?php 
session_start();
?>
<?php

include("../../connect.php");

if(!isset($_SESSION["login"]) or $_SESSION["login"] != "ok"){
header("location:../login.php");}
if(isset($_POST["thoat"]) and $_POST["thoat"]=="out" )
{
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  $date = date('Y-m-d H:i:s');
  $qr_log =  "insert into  writelog (id_nguoidung, thoigian, noidung) values ('".$_SESSION["id_nguoidung"]."', '".$date."', 'Đăng xuất')";
  pg_query($con, $qr_log)or die("Lỗi qrlog");
   session_destroy();
   header("location:../login.php");
}
?>
<!-----------------HEADER--------------------->
<!DOCTYPE html>
<form id="cuong" name="cuong" method="post" action="" >
   <input name="thoat" type="hidden" value="out" /> 
 </form>
<html lang="en-US">
<!--<![endif]-->
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<meta name="author" content="pixel-industry">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<title>Hệ QTCSDL Viễn Thám</title>
<style type="text/css">
h1 {
}
h2 {
}
h3 {
}
h4 {
}
h5 {
}
h6 {
}
</style>

<link rel="stylesheet" type="text/css" href="../css/styles.css">
<link rel="stylesheet" type="text/css" href="../css/captions.css">
<link rel="stylesheet" type="text/css" href="../css/css.css">
<link rel="stylesheet" type="text/css" href="../css/flexslider.css">
<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="../css/green.css">
<link rel="stylesheet" type="text/css" href="../css/nivo-slider.css">
<link rel="stylesheet" type="text/css" href="../css/pixel-industry.css">
<link rel="stylesheet" type="text/css" href="../css/prettyPhoto.css">
<link rel="stylesheet" type="text/css" href="../css/settings.css">
<link rel="stylesheet" type="text/css" href="../css/basic.css">
<link rel="stylesheet" type="text/css" href="../css/style_002.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/styleSwitcher.css">

<script type='text/javascript' src='../js/jquery.js?ver=1.8.3'></script>
<script type='text/javascript' src='../js/jquery.carouFredSel-6.0.0-packed.js?ver=1.0'></script>
<script type='text/javascript' src='../js/jquery.touchSwipe-1.2.5.js?ver=1.0'></script>
<script type='text/javascript' src='../js/jquery.jplayer.min.js?ver=1.0'></script>
<script type='text/javascript' src='../js/comment-reply.min.js?ver=3.5.1'></script>
<script type='text/javascript' src='../js/jquery.themepunch.plugins.min.js?ver=3.5.1'></script>
<script type='text/javascript' src='../js/jquery.themepunch.revolution.min.js?ver=3.5.1'></script>
<script type='text/javascript' src='../js/jquery.flexslider-min.js?ver=3.5.1'></script>
<script type='text/javascript' src='../js/main.js?ver=3.5.1'></script>
</head>
<body class="pattern-default homepage">
<!-- style switcher start -->
<!-- style switcher end --> 
<!-- header start -->
<header style="display: block; top: 0px;" id="header" class="clearfix">
  <section style="height: 3px;" class="top-bar-wrapper">
    <div style="display: none;" class="top-bar"> <a class="close-frame" href="#">Close Frame</a>
      <div class="content-right"> <a class="register" href="">Join Now</a> <a class="contact-info">Call us: 123 456 789</a> </div>
    </div>
  </section>
  <section id="header-inner" class="clearfix"> 
    <!-- logo start -->
    <section id="logo"> <a href=""> <img src="../../images/logo.gif" alt="Logo"> </a> </section>
    <!-- #logo end --> 
    
    <!-- nav container start -->
    <section id="nav-container"> 
      
      <!-- main navigation start  -->
      <nav id="nav">
       <ul style="display: none;" id="menu-menu" class="menu">
          <li class="menu-item "><a href="../index.php"><i class="icon-nav icon-home"></i>Trang chủ</a>
  
            </li>
          <li id="" class="menu-item current-menu-parent"><a href="../index.php"><i class="icon-nav icon-picture"></i>Trang Quản Trị</a>
          </li>
         
          <li id="" class="menu-item"><a href="#"><i class="icon-nav icon-envelope"></i>Liên hệ</a></li>
           <li id="" class="menu-item"><a href="#" onClick="if(confirm('Bạn có muốn thoát không?'))document.cuong.submit()"><i class="icon-nav icon-book"></i>Đăng Xuất</a><span><?php echo $_SESSION["UserName"] ?></span>
          </li>
        </ul>
        
      </nav>
        <!-- responsive navigation start -->
      <div class="menu-menu-container">
        <select id="menu-menu-1" class="menu dropdown-menu">
          <option value="" class="blank">– Main Menu –</option>
          <option class="menu-item" value="">Home</option>
          <option class="menu-item" value="">- Home Page 2</option>
          
        </select>
      </div>
      <!-- responsive navigation end --> 
      
    </section>
    <!-- nav container end --> 
    
  </section>
</header>
<!-- header end -->
<section class="top-shadow"></section>

<div id="content-container"> 
  <!-- content wrapper start -->
  <div class="content-wrapper multiple clearfix"> 