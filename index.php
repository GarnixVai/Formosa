<?php
session_start();
include("mysqlInc.php");
$_SESSION['from']="0";
?>
 
<html>
<head>
	<title>漫遊formosa</title>
	<meta charset="UTF-8">
	<link rel=stylesheet type="text/css" href="formosa.css">
	<script type="text/javascript" src="formosa.js"></script>
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="indexbtn.css">
	<script src="indexbtn.js"></script>
</head>
<body class="index">
	<div onclick="goTo(4)" style="cursor:hand;"><img class="title" src="./pics/title.gif"></div>

	<div id='cssmenu' style="top:32%; width:93%;">
		<ul><li class='active'><a href='gallery.php'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gallery&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li></ul>
	</div>
	<div id='cssmenu' style="top:32%; width:93%;">
		<ul><li class='active'><a href=<?php if(isset($_SESSION['accountID']) && $_SESSION['accountID']!=null){echo "user.php";} else{echo "login.php";} ?> >&nbsp;&nbsp;My&nbsp;Account&nbsp;&nbsp;</a></li></ul>
	</div>
	
	<img id="centerup" class="centerup" src="./pics/border_up.gif">
	<div id="center" class="center" category="op" onclick="goTo(6)">創造我的旅遊地圖!</div>
	<img id="centerdown" class="centerdown" src="./pics/border_down.gif">
	
	<p class="copyright">Designer | Amy Hsu & Garnix Huang<br/>Contact | oranse0720@gmail.com & garnix816@gmail.com<br/>Travel information | open data, easytravel.com</p>
	
	<script>
		$("#centerup").animate({top: '-=5%'},1000);
		$("#centerdown").animate({top: '+=5%'},1000);
		$("#center").fadeIn();
	</script>
</body>
</html>