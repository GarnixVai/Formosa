<?php
session_start();
include("mysqlInc.php");
if(!isset($_SESSION['accountID']) || $_SESSION['accountID']==null){
    echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../favicon.ico"> 
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>    
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="http://www.google.com/jsapi"></script> 	
	<script type="text/javascript" src="infobubble.js"></script>
	<script type="text/javascript" src="jquery.cookie.js"></script>
	<script type="text/javascript" src="spin.js"></script>
	<link rel=stylesheet type="text/css" href="formosa.css">
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' />		
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="map.css"  type="text/css" />
	<script type="text/javascript" src="formosa.js"></script>
	<title>漫遊formosa</title>
    <style>
        body{
		background-image:url("pic/wall.jpg");
		background-attachment:fixed;
		font-family:ont-family:cursive,Helvetica, Arial, 'LiHei Pro', '微軟正黑體', '新細明體', sans-serif;
		 
		}
		p{
			font-family:ont-family:cursive,Helvetica, Arial, 'LiHei Pro', '微軟正黑體', '新細明體', sans-serif;
			
		}
	.view-first img {
   -webkit-transition: all 0.2s linear;
   -moz-transition: all 0.2s linear;
   -o-transition: all 0.2s linear;
   -ms-transition: all 0.2s linear;
   transition: all 0.2s linear;
}
.mask{
	position:absolute;
	top:25%;
	left:0%;
	right:0%;
	-moz-border-radius:100px;
	-webkit-border-radius:100px;


}
.view-first .mask {
   -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=0)";
   filter: alpha(opacity=0);
   opacity: 0;
   background-color: rgba(255, 255, 204,0.6);
   -webkit-transition: all 0.4s ease-in-out;
   -moz-transition: all 0.4s ease-in-out;
   -o-transition: all 0.4s ease-in-out;
   -ms-transition: all 0.4s ease-in-out;
   transition: all 0.4s ease-in-out;

   
   
}
.view-first h2 {

   -webkit-transform: translateY(-100px);
   -moz-transform: translateY(-100px);
   -o-transform: translateY(-100px);
   -ms-transform: translateY(-100px);
   transform: translateY(-100px);
   -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=0)";
   filter: alpha(opacity=0);
   opacity: 0;
   -webkit-transition: all 0.2s ease-in-out;
   -moz-transition: all 0.2s ease-in-out;
   -o-transition: all 0.2s ease-in-out;
   -ms-transition: all 0.2s ease-in-out;
   transition: all 0.2s ease-in-out;
}
.view-first p {

   -webkit-transform: translateY(100px);
   -moz-transform: translateY(100px);
   -o-transform: translateY(100px);
   -ms-transform: translateY(100px);
   transform: translateY(100px);
   -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=0)";
   filter: alpha(opacity=0);
   opacity: 0;
   -webkit-transition: all 0.2s linear;
   -moz-transition: all 0.2s linear;
   -o-transition: all 0.2s linear;
   -ms-transition: all 0.2s linear;
   transition: all 0.2s linear;
   font-size:15px;
}
.view-first:hover img {
   -webkit-transform: scale(1.1,1.1);
   -moz-transform: scale(1.1,1.1);
   -o-transform: scale(1.1,1.1);
   -ms-transform: scale(1.1,1.1);
   transform: scale(1.1,1.1);
}
.view-first a.info {
   -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=0)";
   filter: alpha(opacity=0);
   opacity: 0;
   -webkit-transition: all 0.2s ease-in-out;
   -moz-transition: all 0.2s ease-in-out;
   -o-transition: all 0.2s ease-in-out;
   -ms-transition: all 0.2s ease-in-out;
   transition: all 0.2s ease-in-out;
}
.view-first:hover .mask {
   -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=100)";
   filter: alpha(opacity=100);
   opacity: 1;
}
.view-first:hover h2,
.view-first:hover p,
.view-first:hover a.info {
   -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=100)";
   filter: alpha(opacity=100);
   opacity: 1;
   -webkit-transform: translateY(0px);
   -moz-transform: translateY(0px);
   -o-transform: translateY(0px);
   -ms-transform: translateY(0px);
   transform: translateY(0px);
}
.view-first:hover p {
   -webkit-transition-delay: 0.1s;
   -moz-transition-delay: 0.1s;
   -o-transition-delay: 0.1s;
   -ms-transition-delay: 0.1s;
   transition-delay: 0.1s;
}
.view-first:hover a.info {
   -webkit-transition-delay: 0.2s;
   -moz-transition-delay: 0.2s;
   -o-transition-delay: 0.2s;
   -ms-transition-delay: 0.2s;
   transition-delay: 0.2s;
}

.view {

   position: relative;
   text-align: center;
   cursor: default;
 
}
.view .mask,.view .content {
   position: absolute;
   overflow: hidden;
  
}
.view img {
   display: block;
   position: relative;
}
.view h2 {
   text-transform: uppercase;
   color: #fff;
   text-align: center;
   position: relative;
   font-size: 17px;
   padding: 10px;
   background: rgba(128, 26, 0, 0.8);
   margin: 20px 0 0 0;
}
.view p {
   font-family: Georgia, serif;
   font-style: italic;
   font-size: 12px;
   position: relative;
   color:#400D00;
   padding: 10px 20px 20px;
   text-align: center;
}
.view a.info {
   display: inline-block;
   text-decoration: none;
   padding: 7px 14px;
   background: rgba(128, 26, 0, 0.7);
   color: #fff;
   text-transform: uppercase;
   -webkit-box-shadow: 0 0 1px #000;
   -moz-box-shadow: 0 0 1px #000;
   box-shadow: 0 0 1px #000;
}
.view a.info: hover {
   -webkit-box-shadow: 0 0 5px #000;
   -moz-box-shadow: 0 0 5px #000;
   box-shadow: 0 0 5px #000;
}
input.searchbar{
	border: 2px solid #808080;
	border-radius: 15px;
	outline: none;
	height:30px;
	width:40%;
}
html, body {
	padding: 0; margin: 0;
}
.map{
-webkit-box-shadow: 5px 5px 10px #e6e6e6;
   -moz-box-shadow: 5px 5px 10px #e6e6e6;
   box-shadow: 5px 5px 10px #e6e6e6;
   cursor: default;
    border: 2px solid #fff;
	border-style: outset;
	
	
}
.selection{
	cursor:hand;
	
	
}
.animated { 
    -webkit-animation-duration: 0.5s; 
    animation-duration: 0.5s; 
    -webkit-animation-fill-mode: both; 
    animation-fill-mode: both; 
    -webkit-animation-timing-function: ease-in-out; 
    animation-timing-function: ease-in-out; 
} 

@-webkit-keyframes bounceIn { 
    0% { 
        opacity: 0; 
        -webkit-transform: scale(.3); 
    } 

    50% { 
        opacity: 1; 
        -webkit-transform: scale(1.05); 
    } 

    70% { 
        -webkit-transform: scale(.9); 
    } 

    100% { 
         -webkit-transform: scale(1); 
    } 
} 

@keyframes bounceIn { 
    0% { 
        opacity: 0; 
        transform: scale(.3); 
    } 

    50% { 
        opacity: 1; 
        transform: scale(1.05); 
    } 

    70% { 
        transform: scale(.9); 
    } 

    100% { 
        transform: scale(1); 
    } 
} 

.bounceIn { 
    -webkit-animation-name: bounceIn; 
    animation-name: bounceIn; 
}
@-webkit-keyframes lightSpeedIn { 
   0% { -webkit-transform: translateX(100%) skewX(-30deg); opacity: 0; } 
    60% { -webkit-transform: translateX(-20%) skewX(30deg); opacity: 1; } 
    80% { -webkit-transform: translateX(0%) skewX(-15deg); opacity: 1; } 
    100% { -webkit-transform: translateX(0%) skewX(0deg); opacity: 1; } 
} 
@keyframes lightSpeedIn { 
    0% { transform: translateX(100%) skewX(-30deg); opacity: 0; } 
    60% { transform: translateX(-20%) skewX(30deg); opacity: 1; } 
    80% { transform: translateX(0%) skewX(-15deg); opacity: 1; } 
    100% { transform: translateX(0%) skewX(0deg); opacity: 1; } 
} 
.lightSpeedIn { 
    -webkit-animation-name: lightSpeedIn; 
    animation-name: lightSpeedIn; 
    -webkit-animation-timing-function: ease-out; 
    animation-timing-function: ease-out; 
} 
.animated.lightSpeedIn { 
    -webkit-animation-duration: 0.5s; 
    animation-duration: 0.5s; 
}
.animated1 { 
    -webkit-animation-duration: 2s; 
    animation-duration: 2s; 
    -webkit-animation-fill-mode: both; 
    animation-fill-mode: both; 
    -webkit-animation-timing-function: ease-in-out; 
    animation-timing-function: ease-in-out; 
} 
@-webkit-keyframes fadeIn { 
    0% {opacity: 0;} 
    100% {opacity: 1;} 
} 
@keyframes fadeIn { 
    0% {opacity: 0;} 
    100% {opacity: 1;} 
} 
.fadeIn { 
    -webkit-animation-name: fadeIn; 
    animation-name: fadeIn; 
}


h1.writing{
	color: rgb(128,128,128);
	font-size: 50px;
	text-shadow: rgb(224, 224, 224) 1px 1px 0px;	
	-webkit-writing-mode: vertical-lr;
	writing-mode: vertical-lr; 		
}

h1.listwriting{
	-webkit-writing-mode: vertical-lr;
	writing-mode: vertical-lr; 
	font-size:20px;
}


.selection:hover {
		<!--background-image: linear-gradient(bottom, rgb(44,160,202) 0%, rgb(62,184,229) 50%);-->
	background-color:#000;
	text-decoration:none;
	border-right:solid 2px rgba(0,0,0,0.9);
	
	background-size: 100%;
	border-top-left-radius: 5px;
	border-bottom-l-radius: 5px;
	box-shadow: inset 0px 1px 0px #404040 , 0px 5px 0px 0px #383838, 0px 10px 5px #999;
}

.selection:active {
	background-image: linear-gradient(bottom, rgb(62,184,229) 0%, rgb(44,160,202) 100%);
	box-shadow: inset 0px 1px 0px #2ab7ec, 0px 2px 0px 0px #156785, 0px 5px 3px #999;
}

h1.save{
	color: rgb(189, 113, 113);
	font-size: 30px;
	-webkit-transition: all 0.7s ease;
	transition: all 0.7s ease;
	color: rgba(255, 255, 255, 0.6);
	font-family:cursive;
	text-shadow: rgb(204, 204, 204) 0px 1px 0px, rgb(201, 201, 201) 0px 2px 0px, rgb(187, 187, 187) 0px 3px 0px, rgb(185, 185, 185) 0px 4px 0px, rgb(170, 170, 170) 0px 5px 0px, rgba(0, 0, 0, 0.0980392) 0px 6px 1px, rgba(0, 0, 0, 0.0980392) 0px 0px 5px, rgba(0, 0, 0, 0.298039) 0px 1px 3px, rgba(0, 0, 0, 0.14902) 0px 3px 5px, rgba(0, 0, 0, 0.2) 0px 5px 10px, rgba(0, 0, 0, 0.2) 0px 10px 10px, rgba(0, 0, 0, 0.0980392) 0px 20px 20px;	 
	 }
h1.save:hover{
	color: rgb(225, 136, 136);
	text-shadow: rgb(255, 252, 168) 2px 2px 0px, rgb(156, 156, 156) 4px 4px 0px;
	-webkit-transform:scale(1.3);
	transform:scale(1.3);
	font-family:cursive;
}

.view{
	border:solid white;
	position:relative;
	top:5px;
	width:100px;
	height:50px;
	background-color:rgba(128,0,0,0.5);	
	
}


.accordion{ 
  display: inline-block;
  text-align: left;
  margin: 1%;
  width: 100%; 
  }



.accordion-content{
  -webkit-transition: max-height 1s; 
  -moz-transition: max-height 1s; 
  -ms-transition: max-height 1s; 
  -o-transition: max-height 1s; 
  transition: max-height 1s;  
  background: rgba(190,100,100,0.8); 
  max-height: 0px;
  overflow-y: scroll;
  scrollbar-3dlight-color:gold;
  scrollbar-arrow-color:blue;
  scrollbar-base-color:;
  scrollbar-darkshadow-color:blue;
  scrollbar-face-color:;
  scrollbar-highlight-color:;
  scrollbar-shadow-color:
}

.accordion-content::-webkit-scrollbar{
width:16px;
background-color:#B87070;
opacity:0.4;
} 
.accordion-content::-webkit-scrollbar-thumb{
background-color:#E1C4C4;
border-radius:10px;
}

.accordion-inner{
 margin-left:4px;
 color:#FFFFF4;

}
.accordion-toggle{
  -webkit-transition: background .1s linear;   
  -moz-transition: background .1s linear;   
  -ms-transition: background .1s linear;   
  -o-transition: background .1s linear;   
  transition: background .1s linear;   
  background:rgb(153,109,109);
  border-radius: 3px;
  color: #fff;
  display: block;
  font-size: 20px;
  margin: 1 1 1px;
  padding: 10px;
  text-decoration: none;
 
  
}

.accordion-toggle:hover{
	 background: darken(#00b8c9, 15%);
	
	
}
h1.toggle{
	color: rgb(255, 255, 255);
	font-size: 30px;
	text-align:center;
	background-color: rgb(153, 109, 109);
	text-shadow: rgb(71, 71, 71) 3px 5px 2px;
	
}

h1.windowClass{
color: #FFC78E;
font-size: 30px;
text-shadow: rgb(122, 122, 122) 4px 3px 0px;
}
.windowPic{
	border-radius:3px;
}

<!--List event-->
.listcontainer{ 
  display: inline-block;
  text-align: left;
  margin: 1%;

 }



.list-content{
  -webkit-transition: max-width 1s; 
  -moz-transition: max-width 1s; 
  -ms-transition: max-width 1s; 
  -o-transition: max-width 1s; 
  transition: max-width 1s;  
  max-width: 0%;
  overflow-x:hidden;
  scrollbar-3dlight-color:gold;
  scrollbar-arrow-color:blue;
  scrollbar-base-color:;
  scrollbar-darkshadow-color:blue;
  scrollbar-face-color:;
  scrollbar-highlight-color:;
  scrollbar-shadow-color:
}

::-webkit-scrollbar{
height:16px;
background-color:#B87070;
opacity:0.4;
} 
::-webkit-scrollbar-thumb{
background-color:#E1C4C4;
border-radius:10px;
}

.list-inner{
 margin-left:4px;
 color:#FFFFF4;

}
.list-toggle{
  -webkit-transition: background .1s linear;   
  -moz-transition: background .1s linear;   
  -ms-transition: background .1s linear;   
  -o-transition: background .1s linear;   
  transition: background .1s linear;   
  background:rgb(255,109,109,0.9);
  border-radius: 3px;
  color: #fff;
  display: block;
  font-size: 20px;
  margin: 1 1 1px;
  padding: 10px;
  text-decoration: none;
 
  
}

.list-toggle:hover{
	 background: darken(#00b8c9, 15%);
}
div.down2{
	position:absolute;
	bottom:40%;
	right:0%;
	width: 0;
	height: 0;
	border-style: solid;
	border-width: 10px 10px 0 10px;
	border-color: #fff transparent transparent transparent;
	cursor:hand;
}
    </style>

</head>
    <body onload="initialize()">   
		<div class="bar2" id="bar2" style="display:block;">
			<div class="bartitle">
				<img src="./pics/goback.gif" style="position:relative; bottom:20%; height:60%;" onclick="goBack()">
				<img src="./pics/title3.gif" style="height:100%" onclick="goTo(4)">
			</div>
			<div class="userbar">
				<?php	
					if(!isset($_SESSION['accountID']) || $_SESSION['accountID']==null){
						echo "<div onclick=\"goTo(0)\" class=\"login\">登入/註冊</div>";
					}
					else{
						$user = htmlspecialchars($_SESSION['username']);
						$photoname = htmlspecialchars($_SESSION['photoname']);
						echo "<div class=\"barphoto\"><img src=\"./upload/".$photoname."\" style=\"height:100%;\"></div>";
						echo "<div  onclick=\"goTo(2)\" class=\"login\">".$user."</div>";
						echo "<div class=\"down2\" id=\"tri\" onclick=\"openoption()\"></div>";
					}
				?>
			</div>
		</div>
		<div class="option" id="option">
			<div class="op" category="op" style="top:0px;" onclick="goTo(5)"><div class="middle" style="width:100%;">個人資料</div></div>
			<div class="op" category="op" style="top:40px;" onclick="goTo(2)"><div class="middle" style="width:100%;">我的地圖</div></div>
			<div class="op" category="op" style="top:80px;" onclick="goTo(1)"><div class="middle" style="width:100%;">登出</div></div>
		</div>
		
	<div id="load" style="position:absolute;background:rgba(100%,100%,100%,0.5);top:0;left:0;height:100%;width:100%; z-index:150;">
		<div style="position:absolute; top:45%; width:100%;height:55%;">
		<div class="ball"></div>
		<div class="ball1"></div>
		</div>
	</div>
	
	<div id="dialog-confirm1" title="Oops!" style="display:none;">
	  <p style="text-align:center"><span class="ui-icon ui-icon-alert"></span>No sites in your list yet!</p>
	</div>
		
	<div style="position:absolute; top:10%; width:100%; height:90%;">	
		
		<div class='listcontainer' style='position:absolute;left:7%; width:23%;top:0px; height:80%;overflow-y:scroll '>
			<a href="#" class="list-toggle"></a>
				<div class="list-content" id="allList">
					<div class="list-inner" id="listContent">
						<div  id='upper' style="position:relative;left:0%;top:35%;background-image:url(pic/a.png); background-repeat:no-repeat;width:100%;height:20%;background-size: 100%;" >
						</div>
						<div id="sightItem" style="position:relative;left:0px;top:0px; width:90%;background-size: 100%;">
						</div>
						<div  id='lower' style="position:relative;left:0%;top:0px;background-image:url(pic/z.png); background-repeat:no-repeat;width:100%;height:20%;background-size: 100%;">
						</div>
					</div>
				</div>		
		</div>				
		<div style='position:fixed; width:100%; text-align:center; top:90%;left:0%; height:10%; background:gray'><a href="#" onclick="save()"><h1 class='save wiggle'>Go Schedule My Plan</h1></a></div>
		
		<div id="title" style="position:absolute;left:20%;top:10%;width:100%">
		<p style="text-align:center;font-size:40pt; font-weight: bold; color:#FF9966">
		<?php

		$id = $_SESSION['id'];
		$sq = "SELECT title from tempsave WHERE id = '$id'";
		$result = mysql_query($sq);	
		 while($row = mysql_fetch_array($result)){
		 $title = htmlspecialchars($row['title']);
		}
		//echo $title;
		?>
		</p>
		<p style="font-family:cursive;font-size:20pt; color:#FF6666;position:relative;left:40%">

		</p>
		</div>

		
        <div id="all">
			<div id="myMap" class="map" style="background-attachment:absolute;position:absolute;top:0px;left:29%;width:35%;height:80%;z-index:1;">
			</div>
			
			<div style='position:absolute;left:29%;top:0px;width:40px;height:80%;z-index:2;'>		
				<div class ='selection' style="position:absolute;top:2%;left:0%;height:30%;width:40px;background-size: 100%;background-color:rgba(16,16,16,0.6) ;	border-top-right-radius: 5px;	border-bottom-right-radius: 5px;" onclick="showEat(2)">	
					<h1 class='writing' style="position:absolute; top:30%; left:0%;font-size:20pt;">景點</h1>	
					<div style='position:absolute;left:85%;top:20%' id='sight'></div>
				</div>
				<div class ='selection' style="position:absolute;top:35%;left:0%;height:30%;width:40px;background-size: 100%;background-color:rgba(16,16,16,0.6) ;	border-top-right-radius: 5px;	border-bottom-right-radius: 5px;" onclick="showEat(1)">
					<h1 class='writing' style="position:absolute; top:30%; left:0%;font-size:20pt;">餐廳</h1>
					<div id='eat' style='position:absolute;left:85%;top:20%' ></div>
				</div>
				<div class ='selection' style="position:absolute;top:68%;left:0%;height:30%;width:40px;background-size: 100%;background-color:rgba(16,16,16,0.6) ;	border-top-right-radius: 5px;	border-bottom-right-radius: 5px;" onclick="showEat(3)">
			
				<div id='hotel' style='position:absolute;left:85%;top:20%'></div>
					<h1 class='writing' style="position:absolute; top:30%; left:0%;font-size:20pt;">休憩</h1>
				</div>
				
			</div>
		</div>
    	
    	

    	
	
		
    	<!-- Information about where the used icons come from -->

	
   <script type="text/javascript">
   $(window).load(function() {
            hideLoad();
        });
			
   
			var province;
			var data;
			var map;
			var type;//1:eat,2:sight, 3:hotel;
			var i,checkEat=0,checkHotel=0,checkSight=0;
           	var name ,latLng;
			var Lat;
			var Long ;			
			var trueCount = 0;		
			function initialize() {
				
			
			/*if(trueCount==0)
			{
				document.getElementById("").style.display="none";
				document.getElementById("").style.display="none";
				document.getElementById("").style.display="none";
			}*/
			$.ajaxSetup({cache: false})
			$.get('getsession.php', {requested: 'place'}, function (data) {
				province = data;
				//alert(province);
				//alert(province);
					if(province=="00"){ Lat = 22.9736615;Long = 120.6123989;
					}
					else if(province=="01"){ Lat = 24.6869505;Long = 121.1722058;} 
					else if(province=="02") {Lat=24.7847717;Long=120.9564763;}
					else if(province=="03") {Lat=25.1240426;Long=121.717055;}
					else if(province=="04") {Lat=24.2201031;Long=120.9558743;}
					else if(province=="05") {Lat=23.4789575;Long=120.4492964;}
					else if(province=="06") {Lat=23.1506238;Long=120.3458694;}
					else if(province=="07") {Lat=24.6489496;Long=121.6413206;}
					else if(province=="08") {Lat=24.9864195;Long=121.6447596;}
					else if(province=="09") {Lat=25.0172264;Long=121.506378;}
					else if(province=="10") {Lat=24.8548104;Long=121.2321896;}
					else if(province=="11") {Lat=24.5148057;Long=120.9425041;}
					else if(province=="13") {Lat=23.8408469;Long=120.9825183;}
					else if(province=="14") {Lat=23.9919369;Long=120.4658981;}
					else if(province=="15")	{Lat=23.6732299;Long=120.4345918;}
					else if(province=="16") {Lat=23.4253634;Long=120.5375453;}
					else if(province=="18") {Lat=22.3210027;Long=120.628476;}
					else if(province=="19") {Lat=22.7223475;Long=121.1701435;}
					else if(province=="20")	{Lat=23.7341791;Long=121.3790349;}
				map(Lat,Long);
			
			var sightCont = document.getElementById("sightContent");
			var eatCont = document.getElementById("eatContent")	
			var hotelCont = document.getElementById("hotelContent")
			var sightString = "json/"+province+"_2.json";
			var eatString = "json/"+province+"_2.json";
			
				var k ,i;
				var tempString = "json/"+province+"_1.json"; 
						
				$.getJSON(tempString, function(data) {
						
				 for(i=0,length= data.length;i<length;i++){
					var eat = data[i],name =  eat["Name"];
					eatCont.innerHTML +='<div style="width:100%;"><a href="#" onclick="view(1,'+i+');return false;"><p style="color:white">'+name+'</p></a></div></br>';
				  }
				  
					
			
				});
				 tempString = "json/"+province+"_2.json"; 
				//alert(tempString);
				$.getJSON(tempString, function(data) {				
				 for(i=0,length= data.length;i<length;i++){
					// alert(i);
					var eat = data[i],name =  eat["Name"];
					sightCont.innerHTML +='<div style="width:100%;"><a href="#" onclick="view(2,'+i+');return false;"><p style="color:white">'+name+'</p></a></div></br>';
				  }
				  });
				  
				  tempString = "json/"+province+"_3.json";
					
				$.getJSON(tempString, function(data) {
						
				 for(i=0,length= data.length;i<length;i++){
					var eat = data[i],name =  eat["Name"];
					hotelCont.innerHTML +='<div style="width:100%;"><a href="#" onclick="view(3,'+i+');return false;"><p style="color:white">'+name+'</p></a></div></br>';
				  }
				  
					
			
				});
			
			});	
						


			
			
			
            
         
          
           
      
        
 
		}
		function map(Lat, Long){
			// alert("Lat:"+Lat+"Long:"+Long);
			var c = new google.maps.LatLng(Lat, Long);
			var zoom = 8;
			var mapOptions = {
                center: c,
                zoom: zoom,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("myMap"), mapOptions);
			
            var marker = new google.maps.Marker({ 
                position: c,
                map: map,
                title: 'Taiwan Taipei'
            });
             
		}
        // Called when the Visualization API is loaded.
       
	   function drawVisualization() {
            // specify options
            var options = {
                'width':  '100%',
                'height': '300px',
                'editable': true,   // enable dragging and editing events
                'style': 'box'
            };
            // Instantiate our timeline object.
			
        }
 var marker=[];//eat
 var count = 0;

 function showEat(num){
	  var flag = 0;
	  console.log("num:"+num);
	/* switch(num)
	{
		case 1:
			flag = checkEat;
		break;
		case 2:
			flag = checkSight;
		break;
		case 3:
			flag = checkHotel;
		break;
		default:
		break;
		
	}*/
	if(num	==	1)
	{
		flag = checkEat;
	}else if(num	==	2){
		flag = checkSight;
	}else if(num	==	3){
		flag = checkHotel;
	}
	console.log("eat:"+checkEat);
	console.log("sight:"+checkSight);
	console.log("hotel:"+checkHotel);

	 var string = "json/"+province+"_"+num+".json";
	 
	  $.getJSON(string, function(data) {

 	if(flag==0){
		switch(num)
		{
			case 1:
				checkEat = 1;
			break;
			case 2:
				checkSight = 1;
			break;
			case 3:
				checkHotel = 1;
			break;
			default:;
			
		}
		console.log("Veat:"+checkEat);
	console.log("Vsight:"+checkSight);
	console.log("hotel:"+checkHotel);
		
 	 for(i=0,length= data.length;i<length;i++){
      	var eat = data[i],	iconpic,
 			name =  eat["Name"],
      		latLng = new google.maps.LatLng(eat.Py,eat.Px); 
      	var coffee = name.indexOf("咖啡"),drink =name.indexOf("飲");
			if(num==1){
				iconpic='pic/fork.png';				
			}else if(num==2){
				iconpic='pic/sight.png';
			}else if (num==3){
				iconpic='pic/hotel.png';
			}      
      	createMarker(latLng, eat.Name,eat,iconpic,i,num) ;    
      }
	  
		
     }else if(flag==1){
		  switch(num)
		{
			case 1:
				checkEat = 0;
			break;
			case 2:
				checkSight = 0;
			break;
			case 3:
				checkHotel = 0;
			break;
			default:;
			
		}
		console.log("AAeat:"+checkEat);
		console.log("AAsight:"+checkSight);
		console.log("AAhotel:"+checkHotel);
     	 for (var i = 0; i < marker.length; i++ ) {
  		  if(marker[i].type == num)
				marker[i].setMap(null);
 		 }
 		//marker.length = 0;
     	
     }
	});
 	
 }
	
 	function createMarker(pos,t,data,pic,i,num){
		
 			marker[i] = new google.maps.Marker({       
        	position: pos, 
        	map: map,  // google.maps.Map 
        	title: t ,
        	icon:pic,
        	customInfo:data,
			type:num
    }); 
	
 		 google.maps.event.addListener(marker[i], 'click', function() { 
      		
      		
   			map.setCenter(marker[i].getPosition());
 
	
		  var img  = data["Picture1"];
		  var d = new Date();
		 if(!img){
               img="pic/No_Image.png";
            }
			
				var title = data["Name"];
				var address = data["Add"];
			   var infocontent ='<div style="width:200px;overflow:hidden;">';
				infocontent +='<div class="mapwindow" style="overflow:hidden;width:190px;height:160px;background-color:#fffff0;border:solid 1px #faf0e6"><div class="mapwindow_l" style="position:absolute" ><p style="font-weight:bold;font-size:15px;margin-left:2px;text-align:center;font-family:cursive,Helvetica, Arial, "微軟正黑體", sans-serif;color:#400D00;font-size:10pt;">'+data["Name"]+'</p><div class="windowPic"><img src="'+img+'"alt="No Picture Found" class="windowPic" style="position:relative;top:20px;left:50px" width="100px"; height="100px"></div><div class="mapwindow_ti">'+'</div></div>';
				infocontent +='<div style=" position:absolute;top:80%;overflow:hidden"><a href="#" onclick="AddItem('+i+','+num+');return false;"><h1 class="windowClass">ADD</h1></a></div>';
				
				
				/*   infocontent +='<div class="mapwindow_r"><a href="javascript:" onclick="closeinfo(\''+thisvalue+'\');" title="??" class="mapsclose"></a>';
                       infocontent +='<a href="javascript:lockmarker(\''+thisvalue+'\',\''+ScenicNo+'\',\''+ScenicClass+'\');" title="??" class="mappin mappin_'+ScenicNo+'_'+ScenicClass+' mappinA"></a>';*/
                      //  infocontent +='<a href="javascript:" onclick="OpenStreetView('+lat+', '+Lng+');" title="銵" class="mapstreet"></a><a href="javascript:" onclick="saveone('+ScenicNo+');" title="?脣?" class="mapstore"></a></div></div>';
						
						//var newlong = marker[i].getPosition().lng() + (0.00010 * Math.pow(2, (21 - map.getZoom())));
						var newlat = marker[i].getPosition().lat() + (0.00003 * Math.pow(2, (21 - map.getZoom())));
						var newpos = new google.maps.LatLng(newlat, marker[i].getPosition().lng());
						console.log(infocontent);
						 infoBubble = new InfoBubble({
                            map: map,
                            content: infocontent,
                            position: newpos,
                            shadowStyle: 0,
                            padding: 0,
                            backgroundColor: '#faf0e6',
                            borderRadius: 5,
                            arrowSize: 10,
                            borderWidth: 2,
                            borderColor: '#faf0e6',
                            disableAutoPan: true,
                            hideCloseButton: false,
                            arrowPosition: 50,
                            backgroundClassName: 'phoney',
                            arrowStyle: 0,
							maxWidth:400,
							minWidth:200,
							maxHeight:400,
							minHeight:200,
                            zIndex:d.getTime()
                        });
						infoBubble.open();
	}); 
		 return marker;	

 	}
var viewmarker,pass;
var Bubble;
function view(type,number){
	
	for (var i = 0; i < marker.length; i++ ) {
			marker[i].setMap(null);
 	}
	
	
		$.ajaxSetup({cache: false})
			$.get('getsession.php', {requested: 'place'}, function (data) {
				if(typeof viewmarker !='undefined'){					
					viewmarker.setMap(null);
					pass.close();
				}
				province = data;
				var string = "json/"+province+"_"+type+".json";
				 $.getJSON(string, function(data) {
					    var obj = data[number],	name =  obj["Name"],latLng = new google.maps.LatLng(obj.Py,obj.Px); 
						//show detaails 
						var placediv = document.getElementById("info");
						var pile;
						pile = '<div style="width:100%;overflow:hidden;">Title:'+name+'</div><br/>';
						pile += '<div style="position:relative;">Address:'+obj["Add"]+'</div><br/>';
						pile += '<div style="position:relative;">Tel:'+obj["Tel"]+'</div><br/>';
						pile += '<div style="position:relative;width:100%;">Description:'+obj["Toldescribe"]+'</div>';
						pile = '<div class="animated1 fadeIn">'+pile+'</div>';
						placediv.innerHTML = pile;
						
						
						
						viewmarker = new google.maps.Marker({       
							position: latLng, 
							map: map,  // google.maps.Map 
							title: name ,
						//	icon:pic,
						//	customInfo:data,
							type:number
						}); 
						
					map.setCenter(viewmarker.getPosition());
					
					var d = new Date();
					var img  = obj["Picture1"];
					if(!img){
					   img="pic/No_Image.png";}
			
					var title = obj["Name"];
					var address = obj["Add"];
					var infocontent ='<div style="width:100%;overflow:hidden;">';
					infocontent +='<div class="mapwindow" style="overflow:hidden;width:190px;height:160px;background-color:#fffff0;border:solid 1px #faf0e6"><div class="mapwindow_l" style="position:absolute" ><p style="font-weight:bold;font-size:15px;margin-left:2px;text-align:center;font-family:cursive,Helvetica, Arial, "微軟正黑體", sans-serif;color:#400D00;font-size:10pt;">'+title+'</p><div class="windowPic"><img src="'+img+'"alt="No Picture Found" class="windowPic" style="position:relative;top:20px;left:50px" width="100px"; height="100px"></div><div class="mapwindow_ti">'+'</div></div>';
					infocontent +='<div style=" position:absolute;top:80%;overflow:hidden"><a href="#" onclick="AddItem('+number+','+type+');return false;"><h1 class="windowClass">ADD</h1></a></div>';
			
					var newlat = viewmarker.getPosition().lat() + (0.00003 * Math.pow(2, (21 - map.getZoom())));
					var newpos = new google.maps.LatLng(newlat,viewmarker.getPosition().lng());
					console.log(infocontent);
						infoBubble = new InfoBubble({
						map: map,
						content: infocontent,
						position: newpos,
						shadowStyle: 0,
						padding: 0,
						backgroundColor: '#faf0e6',
						borderRadius: 5,
						arrowSize: 10,
						borderWidth: 2,
						borderColor: '#faf0e6',
						disableAutoPan: true,
						hideCloseButton: false,
						arrowPosition: 50,
						backgroundClassName: 'phoney',
						arrowStyle: 0,
						maxWidth:400,
						minWidth:200,
						maxHeight:300,
						minHeight:200,
						zIndex:d.getTime()
					});
					
					showBubble(infoBubble);
					pass = infoBubble;
					infoBubble.open(map,viewmarker);
					var infoBubbleHandler = function() {
					if (!infoBubble.isOpen()) {
						infoBubble.open(map, viewmarker);
					}
				};

				map.setZoom(15);
				map.setCenter(viewmarker.getPosition());			
				});
			
			});

			
}
	function showBubble(bubble){
		
		bubble.open();
	}
	
	item=[];
	var itemCount = 0;
	var eatcount = 0, sightcount = 0, hotelcount = 0;
	var inform =  document.getElementById('sightItem');
		inform.innerHTML = "";
function AddItem(id,num){
		var divleft = document.getElementById("allList");
		divleft.style.maxWidth='100%';
		var picSource ;
		trueCount++;
		switch(num){
			case 1:
				eatcount ++;	
				picSource="	<div style='position:absolute;top:20%;left:0%;width:20%;'><img width='100%' src='pic/icon_r.png'></div>";
				$("#eat").load(
				"count.php",
				{num:eatcount,type:1},
				//"a="+$("#a").val()+"&b="+$("#b").val(),
				function(){
				//alert("計算完成");
					}
				);
			break;
			case 2:
				sightcount ++;
				picSource="	<div style='position:absolute;top:20%;left:0%;width:20%;'><img width='100%' src='pic/icon_s.png'></div>";
				$("#sight").load(
				"count.php",
				{num:sightcount,type:2},
				//"a="+$("#a").val()+"&b="+$("#b").val(),
				function(){
				//alert("計算完成");
					}
				);
			break;
			case 3:
				hotelcount ++;
				picSource="	<div style='position:absolute;top:20%;left:0%;width:20%;'><img width='100%' src='pic/icon_h0.png'></div>";
				$("#hotel").load(
				"count.php",
				{num:hotelcount,type:3},
				//"a="+$("#a").val()+"&b="+$("#b").val(),
				function(){
				//alert("計算完成");
					}
				);
			break;
			default:;
		}
		var flag = 0;
		console.log(id);
		var she ;
		for(she=0;she<=item.length;she++){
			if(item[she]==id)
				flag = 1;
			console.log(item.length);
			break;
		}
		inform.innerHTML+='<div id="'+itemCount+'"></div>';
		console.log("inform:"+inform);
		
		var tempCount = itemCount;
		var temp = document.getElementById(itemCount);
		var string = "json/"+province+"_"+num+".json";
		
		
		$.getJSON(string, function(data) {
			temp.innerHTML="<div  class=\"animated lightSpeedIn\" style=\"width:100%;position:relative;height:auto;\" >"+"<br>"+picSource+"<div style='word-break: normal;position:relative;left:20%;top:10%; width:65%;'><p style=\"word-break: normal;font-family:cursive,標楷體;color:#400D00;font-size: 15px;position:relative;\" >" +data[id]["Name"]+"</div><a href='#'  onclick='Delete("+tempCount+","+num+");'><div style='position:absolute;left:90%;top:60%'><img src='pic/fileclose.png' style='width:70%;'></img></a>"+"<br></p></div></div>";
			setTimeout(function(){temp.innerHTML="<div  style=\"word-break: normal;width:100%;position:relative;height:auto;\" >"+"<br>"+picSource+"<div style='word-break: normal;position:relative;left:20%;top:10%; width:65%;'><p style=\"font-family:cursive,標楷體; color:#400D00;font-size: 15px;position:relative;\" >" +data[id]["Name"]+"</div><a href='#'  onclick='Delete("+tempCount+","+num+");'><div style='position:absolute;left:90%;top:60%'><img src='pic/fileclose.png' style='width:70%;'></img></a>"+"<br></p></div></div>";}, 500);
				
		

		});
		
			if(flag==0){
			var saveString = num + "_" +id;
			item[itemCount++] = saveString;
			console.log(saveString);
		}
	
		 
		 
}
	function Delete(index, num){
		trueCount--;
		item[index]=-1;
		document.getElementById(index).style.display="none";
			switch(num){
			case 1:
				eatcount --;	
				picSource="	<div style='position:absolute;top:10%;left:0%;'><img width='50px' src='pic/icon_r.png'></div>";
				$("#eat").load(
				"count.php",
				{num:eatcount,type:1},
				//"a="+$("#a").val()+"&b="+$("#b").val(),
				function(){
				//alert("計算完成");
					}
				);
			break;
			case 2:
				sightcount --;
				picSource="	<div style='position:absolute;top:10%;left:0%;'><img width='50px' src='pic/icon_s.png'></div>";
				$("#sight").load(
				"count.php",
				{num:sightcount,type:2},
				//"a="+$("#a").val()+"&b="+$("#b").val(),
				function(){
				//alert("計算完成");
					}
				);
			break;
			case 3:
				hotelcount --;
				picSource="	<div style='position:absolute;top:10%;left:0%;'><img width='50px' src='pic/icon_h0.png'></div>";
				$("#hotel").load(
				"count.php",
				{num:hotelcount,type:3},
				//"a="+$("#a").val()+"&b="+$("#b").val(),
				function(){
				//alert("計算完成");
					}
				);
			break;
			default:;
		}
		
	}
	var jsonfile=[];
	function save(num){	
		if(trueCount==0)
		{
			showAlert(1);
		}else{
		console.log(item);
		var he;
		// $.getJSON('json/kaohfood.json', function(data) {
			 for(he=0;he<item.length ;he++){
				if(item[he]==-1)continue;
				 var object1 = {
					//'id': he,
					'number':item[he]
				};
			//	alert(item[he]+"length:"+item.length);
				var uten = item[he].split("_");
				console.log(uten[0]+"|"+uten[1]);
			//	 var name = data[uten[1]]["Name"];
				
				
			
				 jsonfile.push(object1);
				 console.log("id is "+he+"\ntitel is"+jsonfile[he]['title']);
			 }
			/*for(i=0;i<item.length;i++){
				console.log("json file ddddd"+jsonfile[i]["title"]);
			 }*/
			
		  console.log("json file "+jsonfile);
		/* 
		 $.ajax({
			type: 'post',
			url: 'make1.php',
			data: {json: JSON.stringify(jsonfile)},
			dataType: 'json',
			jsonp: false,
			success: function(data){
                alert('Items added');
            },
            error: function(e){
				console.log("hsibfuek"+jsonfile);
                console.log("err:"+e.message);
				console.log("err1:"+data+"123456:"+e.responseText);
				event.preventDefault();
            }
		});*/
		
		console.log("strubgft:"+JSON.stringify(jsonfile));
		//var json2 = window.btoa(JSON.stringify(jsonfile));
		//$.cookie('kaohfood', json2);
		$.cookie('collection', JSON.stringify(jsonfile));
		console.log(jsonfile);
		var json1=($.cookie('collection'));
		//json1 =  window.atob(json1)
		var obj1 = $.parseJSON(json1);
		console.log("obj1:"+JSON.stringify(obj1));
		location.replace("make1.php");
		
	//	 });
	}
}
	
	  function saveone(scenicno){
            var savechoisescenicno=scenicno;
            document.cookie="data="+savechoisescenicno;
                
            document.login.go.value="http://guide.easytravel.com.tw/city/19";
            document.login.submit();      
        }
	 function OpenStreetView(lat, Lng){
            window.open("http://maps.google.com/maps?q=&layer=c&cbll="+lat+","+Lng+"&cbp=11,0,0,0,0");
        }
	
       
    </script>

	
	<div style='position:absolute;left:64%;height:70%;width:10%; z-index:0;'>
	<div class="accordion" onmouseover="display(2)">  
	 <a href="#" class="accordion-toggle" ><h1 class='toggle' >景點</h1></a>
	  <div class="accordion-content" id="sightList">
		<div  class="accordion-inner" id="sightContent"> 
		</div>
	  </div>
	</div>
	<div class="accordion" onmouseover="display(1)">  
	 <a href="#" class="accordion-toggle" ><h1 class='toggle' >餐廳</h1></a>
	  <div class="accordion-content" id="eatList">
		<div class="accordion-inner" id="eatContent"> 
		</div>
	  </div>
	</div>
	<div class="accordion" onmouseover="display(3)">  
	 <a href="#" class="accordion-toggle" ><h1 class='toggle' >旅館</h1></a>
	  <div class="accordion-content" id="hotelList">
		<div class="accordion-inner" id="hotelContent"> 
		</div>
	  </div>
	</div>
	</div>
	<div id="info" style="position:absolute;left:75%;top:0%;width:20%;height:80%; overflow:hidden; font-family:Comic Sans MS, 儷黑 Pro, 標楷體">
    </div>
	
	<script>
	
	
	
	
	function display(num){
		var div;
		switch(num){
			case 2:
				div = document.getElementById('sightList');
				var o1 = document.getElementById('eatList');
				var o2 = document.getElementById('hotelList');
				o1.style.maxHeight='0%';
				o2.style.maxHeight='0%';
	
			break;
			case 1:
				div = document.getElementById('eatList');
				var o1 = document.getElementById('sightList');
				var o2 = document.getElementById('hotelList');
				o1.style.maxHeight='0%';
				o2.style.maxHeight='0%';
			break;
			case 3:
				div = document.getElementById('hotelList');
				var o1 = document.getElementById('eatList');
				var o2 = document.getElementById('sightList');
				o1.style.maxHeight='0%';
				o2.style.maxHeight='0%';
			break;
			default:
			break;
		}
		
		 
		div.style.maxHeight='72%';
	
	}

	</script>
   </div>
    </body>
   
      
</html>