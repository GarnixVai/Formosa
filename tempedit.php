<?php
session_start();
include("mysqlInc.php");
?>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" http-equiv="content-type" content="text/html, charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../favicon.ico"> 
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' />	
	<link rel=stylesheet type="text/css" href="formosa.css">	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="map.css"  type="text/css" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>    
	<script type="text/javascript" src="formosa.js"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
  	<script type="text/javascript" src="http://www.google.com/jsapi"></script> 	
	<script type="text/javascript" src="infobubble.js"></script>
	<script type="text/javascript" src="jquery.cookie.js"></script>
	<title>漫遊formosa</title>
<style>
        body{
		background-image:url("pic/wall.jpg");
		background-attachment:fixed;
		 
		}
div.word{
	 float:left;
	 position:relative;
	 top:10px;
}
div.item{
	position:relative;
	width:100%;
	height:50px;
	text-align:center;
	top:5px;
	 cursor:hand;
}
div.item:hover{
	background:rgba(0,0,0,0.1);
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
.PopupPanel
{
    border: solid 1px black;
    position: fixed;
    left: 50%;
    top: 50%;
    background-color: white;
    z-index: 100;
    height: 400px;
    margin-top: -200px;
    width: 600px;
    margin-left: -300px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
}

div.up{	
	position:absolute;
	top:0%;
	left:10%;
	width: 0;
	height: 0;
	border-style: solid;
	border-width: 0 10px 10px 10px;
	border-color: transparent transparent #000 transparent;
}
div.down{
	position:absolute;
	bottom:0%;
	left:10%;
	width: 0;
	height: 0;
	border-style: solid;
	border-width: 10px 10px 0 10px;
	border-color: #000 transparent transparent transparent;
}
.dayDiv:hover{
	background-color:rgba(255, 176, 97,0.4);	
}
.save{
	color: rgb(189, 113, 113);
	font-size: 30px;
	-webkit-transition: all 0.7s ease;
	transition: all 0.7s ease;
	color: rgba(255, 255, 255, 0.6);
	font-family:cursive;
	cursor:hand;
	text-shadow: rgb(204, 204, 204) 0px 1px 0px, rgb(201, 201, 201) 0px 2px 0px, rgb(187, 187, 187) 0px 3px 0px, rgb(185, 185, 185) 0px 4px 0px, rgb(170, 170, 170) 0px 5px 0px, rgba(0, 0, 0, 0.0980392) 0px 6px 1px, rgba(0, 0, 0, 0.0980392) 0px 0px 5px, rgba(0, 0, 0, 0.298039) 0px 1px 3px, rgba(0, 0, 0, 0.14902) 0px 3px 5px, rgba(0, 0, 0, 0.2) 0px 5px 10px, rgba(0, 0, 0, 0.2) 0px 10px 10px, rgba(0, 0, 0, 0.0980392) 0px 20px 20px;	 
}
.save:hover{
	color: rgb(225, 136, 136);
	text-shadow: rgb(255, 252, 168) 2px 2px 0px, rgb(156, 156, 156) 4px 4px 0px;
	-webkit-transform:scale(1.3);
	transform:scale(1.3);
	font-family:cursive;
}
h1.details{
	font-family:cursive;
	color:#ff1e00;
}
h1.add{
	color: rgb(255, 255, 255);
	font-size: 40px;
	position:relative;
	left:40%;
	text-shadow: rgb(150, 150, 150) 1px 3px 0px;
	
}
h1.cancel{
	color: rgb(255, 255, 255);
	font-size: 40px;
	position:relative;
	left:20%;
	text-shadow: rgb(150, 150, 150) 1px 3px 0px;
	
}
.tip-bubble{
	display:none;
  position: absolute;
  background-color: #202020;
  top:50%;
  left:30%;

  width: 100px;
  padding: 20px;
  color: #CCC;
  text-align: center;
  border-radius: 10px;
  margin: 50px;
  border: 1px solid #111;
  box-shadow: 1px 1px 2px #202020;
  -moz-box-shadow: 1px 1px 2px #202020;
  -webkit-border-shadow: 1px 1px 2px #202020;
  text-shadow: 0px 0px 15px #fff;
}
.tip-bubble:after {
  content: '';
  position: absolute;
  width: 0;
  height: 0;
 
} 
.tip-bubble-bottom:after {
  border-bottom-color: #202020;
 
  left: 50%;
  margin-left: -15px;  
  top: 100%;
             
}



.tip-bubble1 {
 font-family:cursive;
 font-weight:bold;

  position: absolute;
  background-color:#FF7744;
  opacity:0.9;
  width: 200px;
  padding: 20px;
  top:8%;
  color: #800;
  text-align: center;
  border-radius: 10px;
 
  left:40%;
  border-shadow: 1px 1px 2px #CCC;
  text-shadow: 0px 0px 5px #fff;
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
<body>
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

	<div id = "show" style="display:none;position:absolute;top:100%;width:500px;height:400px;border:solid black">
	</div>

<div style="position:relative;left:10%;top:13%;">

<?php
if(isset($_GET['map'])&& $_GET['map']){
	$id = $_GET['map'];
}
$_SESSION['editId']=$id;
$sql = "SELECT title,startdate,enddate,json ,id,place from tripplan WHERE id ='$id'";
//$sql = "SELECT tagname from tag WHERE tripplan ='$id'";
				$_SESSION['id'] = $id;
				$result = mysql_query($sql);
				while($row = mysql_fetch_array($result)){
					$title = htmlspecialchars($row['title']);
					$startdate = htmlspecialchars($row['startdate']);
					$enddate = htmlspecialchars($row['enddate']);
					$json = $row['json'];	
					$place = $row['place'];
			}		
			$_SESSION['place'] = $place;
			$sites = json_decode($json, true);
			$day = count($sites);
			
			
			echo  '<form  method="post" action="tempsubmit.php">';
			for($i=1;$i<=$day;$i++){
				unset($temp);
				$temp = array();
				$sitenum = count($sites[$i]);
				
				echo'<div id="date'.$i.'" style="display:none"></div>';
				echo '<div class="dayDiv" style="position:relative; width:75%;height:150px;overflow-y:scroll;overflow-x:hidden;cursor:hand" onclick="pass('.$i.')">';
				echo'<div id="'.$i.'" style="position:relative;top:10%;width:100%;height:20%"><h1>第'.$i.'天</h1>';
			
				for($j=0;$j<$sitenum;$j++){
						$starttime = $sites[$i][$j]['starttime'];
						$endtime = $sites[$i][$j]['endtime'];
						$number = $sites[$i][$j]['no'];
					
						$type = $sites[$i][$j]['type'];				
						echo '<div style="position:relative;top:5px;height:40px;width:100%"><div style="position:absolute;width:30%;">'.$sites[$i][$j]['site'].'</div>';
						echo '<div style="position:absolute;left:60%;width:70%;"><input type="time" name="'.$i.'_'.$j.'_'.$type.'_'.$number.'_start" value='.$starttime.'></input>~<input type="time" name="'.$i.'_'.$j.'_'.$type.'_'.$number.'_end" value='.$endtime.'></input></div></div>';
						
						echo '<script>document.getElementById("date'.$i.'").innerText+="'.$i.'_'.$j.'_'.$type.'_'.$number.'|";</script>';
						
				}
			//	echo '<div style="position:relative;width:100%;"><a href="#" onclick="pass('.$i.')">Edit this day</a></br></div>';
				echo '</div></div>';
			
			
			}
		//	echo "<input style='position:absolute;top:0%;left:40%;border:solid white' type='submit' value='next step'>";
			echo '<div style="position:fixed; width:100%; text-align:center; top:90%;left:0%; height:10%; background:gray" ><input class="save" style="position:absolute;top:0%;left:40%; background:none; border:none;" type="submit" value="Complete!"></div>';
			echo '</form>';
			
			
			$_SESSION['total'] =  $day;
?>
</div>
	<div id="itemCount">
	
	</div>
	
	<!--<div id='show' style='display:none'>
	</div>-->

		
	<script>
	var dayvalue=0;
	var a = [];
	var count = [];
	function initialize(){
		$.get('getsession.php', {requested: 'total'}, function (data) {
			total = data;
			for( k=0;k<=total;k++){		
				a[k]=0;
				count[k] = 0;
			//	block.innerHTML +="<div id='day"+k+"' style='border:solid black;position:absolute;left:10%;top:"+k*400+"px;height:400px;' >"+k+"</div>";
			}
			
			a[0][0]=0;
			for(k=1;k<=total;k++){
				a[k]=[];
				var implies = document.getElementById("date"+k);
				var string = implies.innerText;
				console.log("string"+string);
				var item = string.split("|");
				for(j=0;j<item.length;j++){
					a[k][j]=item[j];
				}
				$("#show").load(
				"listedit.php",
				{num:a[k], day:k},
				//"a="+$("#a").val()+"&b="+$("#b").val(),
				function(){
							//alert("hi");
					}
				);
				count[k]= j-1;
			}
			
		});
		
			$.ajaxSetup({cache: false})
			$.get('getsession.php', {requested: 'place'}, function (data) {
				province = data;
			//	alert(province);
				
			
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
					eatCont.innerHTML +='<div style="width:100px;"><a href="#" onclick="view(1,'+i+');return false;"><p style="color:white">'+name+'</p></a></div></br>';
				  }
				  
					
			
				});
				 tempString = "json/"+province+"_2.json"; 
			
				$.getJSON(tempString, function(data) {
						
				 for(i=0,length= data.length;i<length;i++){
					var eat = data[i],name =  eat["Name"];
					sightCont.innerHTML +='<div style="width:100px;"><a href="#" onclick="view(2,'+i+');return false;"><p style="color:white">'+name+'</p></a></div></br>';
				  }
				  });
				  
				  tempString = "json/"+province+"_3.json";
					
				$.getJSON(tempString, function(data) {
						
				 for(i=0,length= data.length;i<length;i++){
					var eat = data[i],name =  eat["Name"];
					hotelCont.innerHTML +='<div style="width:100px;"><a href="#" onclick="view(3,'+i+');return false;"><p style="color:white">'+name+'</p></a></div></br>';
				  }
				  
					
			
				});
			
			});	
		
	}
	function cancel(){
		document.getElementById("blackblock").style.display="none";
		document.getElementById("info").style.display="none";
		
	}
	function view(type,number){
	/*if(viewmarker.length)
		viewmarker.setMap(null);*/
	document.getElementById("blackblock").style.display="block";
	document.getElementById("info").style.display="block";
		$.ajaxSetup({cache: false})
			$.get('getsession.php', {requested: 'place'}, function (data) {
				province = data;
				var string = "json/"+province+"_"+type+".json";
				 $.getJSON(string, function(data) {
					    var obj = data[number],	name =  obj["Name"],latLng = new google.maps.LatLng(obj.Py,obj.Px); 
						//show detaails 
						var placediv = document.getElementById("info");
						var pile;
						var img  = obj["Picture1"];
						if(!img){
						   img="pic/No_Image.png";}
						pile = '<div style="width:100%;height:33%;overflow:hidden;"><h1 style="position:relative:left:10%;font-size:20px;">Title:'+name+'</h1></div>';
						
						pile += '<div style="position:relative;height:33%;">Address:'+obj["add"]+'</div>';
						pile += '<div style="position:relative;height:33%;">Tel:'+obj["Tel"]+'</div>';
						pile = '<div style="position:absolute;top:1%;left:0%;width:60%;height:30%">'+pile+'</div>';
						pile += '<div style="position:absolute;top:1%;left:60%;width:40%;height:30%;float:right;" ><img src="'+img+'"width="50%"></img></div>';
						pile += '<div style="overflow-y:scroll;position:absolute;top:32%;height:40%;width:100%;">Description:'+obj["Toldescribe"]+'</div>';
						
						pile += '<div style="background-color: rgb(220, 224, 179);position:absolute;left:0%;top:80%;width:50%" onmouseover="adddir()" onmouseout="canceldir()"><a href="#" onclick="addItem('+type+','+number+')"><h1 class="add">ADD</h1></a></div>';
						pile += '<div style="background-color: rgb(220, 224, 179);position:absolute;left:50%;top:80%;width:50%"><a href="#" onclick="cancel()"><h1 class="cancel">Cancel</h1></a></div>';
						pile = '<div class="animated1 fadeIn" >'+pile+'</div>';
						placediv.innerHTML = pile;
						/*viewmarker = new google.maps.Marker({       
							position: latLng, 
							map: map,  // google.maps.Map 
							title: name ,
						//	icon:pic,
						//	customInfo:data,
							type:number
						}); 
					map.setCenter(viewmarker.getPosition());
					var img  = obj["Picture1"];
					var d = new Date();
					if(!img){
					   img="pic/No_Image.png";}
			
					var title = obj["Name"];
					var address = obj["Add"];
					var infocontent ='<div style="width:200px;overflow:hidden;">';
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
						maxHeight:400,
						minHeight:200,
						zIndex:d.getTime()
					});
					
					showBubble(infoBubble);				
					infoBubble.open(map,viewmarker);
					var infoBubbleHandler = function() {
					if (!infoBubble.isOpen()) {
						infoBubble.open(map, viewmarker);
					}
				};
				
			
				map.setZoom(15);
				map.setCenter(viewmarker.getPosition());*/	
				
						
						
				});
			});
			
	}
	
	
	
	
	function pass(day){
		
		dayvalue = day;
		
		document.getElementById("warming").style.display="none";
		console.log(document.getElementById(day));
		var div = document.getElementById(day);
		div.style.backgroundColor="rgba(255, 176, 97,0.4)";
		var det = document.getElementById('det'+day);
		if(det == null){
			div.innerHTML+="<div style='position:absolute;top:0%;right:0%' id='det"+day+"'></div>";
		}
		document.getElementById('det'+day).innerHTML='<h1 class="details">You are working on this day!</h1>'
		
		
		
		$.ajaxSetup({cache: false})
			$.get('getsession.php', {requested: 'total'}, function (data) {
				var d = data;
				
				for(i=1;i<=d;i++){
				//	alert(i+":"+day+":"+d);
					if(day!=i){
						
					var block = document.getElementById(i);
					block.style.backgroundColor="rgba(255, 176, 97,0)";
					
					var det = document.getElementById('det'+i);
					if(det != null){
						det.innerHTML ="";
						}
					}
				
					
				}
			});
		
	}

	function addItem(type,num){
		//alert(document.getElementById("show"));		
		document.getElementById("blackblock").style.display="none";
		var temp = count[dayvalue];
		if(dayvalue==0){
				alert("you haven't chosen a day to edit!");
		}else{
			//alert(count[dayvalue]);
		a[dayvalue][count[dayvalue]]=dayvalue+"_"+count[dayvalue]+"_"+type+"_"+num;
		
		var showdiv = document.getElementById(dayvalue);
		
			
			console.log(showdiv);
			$.get('getsession.php', {requested: 'place'}, function (data) {
				province = data;
				var string = "json/"+province+"_"+type+".json";
				 $.getJSON(string, function(data) {
					    var obj = data[num],	name =  obj["Name"],latLng = new google.maps.LatLng(obj.Py,obj.Px); 
						var pile;
						
						pile = '<div style="position:relative;top:5px;height:40px;width:100%"><div style="position:absolute;width:60%;">'+name+'</div><div style="position:absolute;left:60%;width:40%;"><input type="time" name="'+dayvalue+'_'+temp+'_'+type+'_'+num+'_start" ></input>~<input type="time" name="'+dayvalue+'_'+temp+'_'+type+'_'+num+'_end" ></input></div></div>';
						//alert(dayvalue+'_'+temp+'_'+type+'_'+num+'_start');
						showdiv.innerHTML += pile;
						console.log(showdiv);
	
				});
	
		});
		
			$("#show").load(
				"listedit.php",
				{num:a[dayvalue], day:dayvalue},
				//"a="+$("#a").val()+"&b="+$("#b").val(),
				function(){
							//alert("hi");
				}
		);
		
		
		
		count[dayvalue]++;
		
	
	}
	document.getElementById("info").style.display="none";
	
}
	

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
		div.style.maxHeight='62%';
	
}
function adddir(){
	document.getElementById('bubbleadd').style.display = "block";
	document.getElementById('bubbleadd').style.zIndex = 100;
	
}
function canceldir(){
	document.getElementById('bubbleadd').style.display = "none";
}

</script>

	<div id="info" class='PopupPanel' style="border-radius: 10px;display:none;font-family:Comic Sans MS, 儷黑 Pro, 標楷體;background-color:rgba(220, 224, 179,0.9)">
			

   </div>
   
   <div id="bubbleadd" class="tip-bubble tip-bubble-top">
			Add this place!
			</div>
	
<div style='position:fixed;right:0%;top:10%;height:80%;width:150px'>
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


<div  id="blackblock" style="display:none;background-color:rgba(0,0,0,0.85);position:absolute;top:0%;left:0%;width:100%;height:100%"></div>
<div id="warming" class="tip-bubble1  tip-bubble-bottom">
		Please Select a day
	</div>
</body>
</html>