<?php
session_start();

if (empty($_SESSION['user_name'])) {
    header('Location: index.php');
    exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>MJNS-Pi Status</title>
    <meta charset="utf-8">
    <meta name = "format-detection" content = "telephone=no" />
    <meta name="description" content="MJNS-Pi">
    <meta name="author" content="MJNS-Pi">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="-1">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/superfish.css">

    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/mjnspi-master.js"></script>
    <script src="js/superfish.js"></script>
    <script src="js/script.js"></script>
    <script src="js/jquery.mobilemenu.js"></script>
    <!--[if (gt IE 9)|!(IE)]><!-->
        <script src="js/jquery.mobile.customized.min.js"></script> 
    <!--<![endif]-->
 
    <script src="js/jquery.ui.totop.js"></script>
    <script src="js/jquery.carouFredSel-6.1.0-packed.js"></script>
    <script src="js/jquery.mousewheel.min.js"></script>
    <script src="js/jquery.touchSwipe.min.js"></script>

    <!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsin$
         </a>
      </div>
    <![endif]-->
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
    <![endif]-->

    </head>
    <body onload="loadmobile()">
    <div class="bg-1 page_home">
	    <header></header>   
		    <section class="main">
			<div id="topmenu"></div>
			<div id="master-rpc" align="center"></div>
			<div id="master-rpc-list" align="center"></div>
		    </section>
    <footer>
	<div id="footer"></div>
    </footer>

   </div>	 
  </body>
<HEAD>
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="-1">
</HEAD>
</html>

