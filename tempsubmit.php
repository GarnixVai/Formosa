<?php
session_start();
include("mysqlInc.php");
$sq = "SELECT id from tripplan ORDER BY id DESC LIMIT 1";
$result = mysql_query($sq);	
	while($row = mysql_fetch_array($result)){
		$picid = htmlspecialchars($row['id']);
}
$_SESSION['picid']=$picid+1;
?>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" http-equiv="content-type" content="text/html, charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../favicon.ico"> 
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' />		
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<title>漫遊formosa</title>
</head>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>    
	<script type="text/javascript" src="formosa.js"></script>
	<link rel=stylesheet type="text/css" href="formosa.css">
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="http://www.google.com/jsapi"></script> 	
	<script type="text/javascript" src="infobubble.js"></script>
	<script type="text/javascript" src="jquery.cookie.js"></script>
	<script type="text/javascript" src="html2canvas.js"></script>
	
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script> 
<body onload="initialize()" style="position:fixed;" >
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
					echo "<div class=\"down\" id=\"tri\" onclick=\"openoption()\"></div>";
				}
			?>
		</div>
	</div>
	<div class="option" id="option">
		<div class="op" category="op" style="top:0px;" onclick="goTo(5)"><div class="middle" style="width:100%;">個人資料</div></div>
		<div class="op" category="op" style="top:40px;" onclick="goTo(2)"><div class="middle" style="width:100%;">我的地圖</div></div>
		<div class="op" category="op" style="top:80px;" onclick="goTo(1)"><div class="middle" style="width:100%;">登出</div></div>
	</div>
	<div style="position:fixed; left:0;top:0; background-image:url('pic/wall.jpg'); width:100%; height:100%;z-index:99;font-family:cursive;">
		<p style="position:relative; width:100%; top:15%; text-align:center; text-shadow: rgb(122, 122, 122) 3px 2px 0px;font-family:cursive;font-size:25pt;color:#FF6666;">
			Trip Plan Design Edited!
		</p>
		<div class="acc" onclick="goTo(2)" style="position:absolute; width:20%; height:50%; left:15%;top:28%;background:white;	border-style:solid;	border-color:gray;	border-width: 0.5px 0.5px 3px 0.5px; text-align:center; line-height:40px;font-size:20px;">
			<img src="pics/acc.jpg" style="width:100%; height:70%;float:left;"><br/>&nbsp;&nbsp;&nbsp;<br/>
			My Account
		</div>
		<div style="position:absolute; width:20%; height:50%; left:40%;top:28%;background:white;	border-style:solid;	border-color:gray;	border-width: 0.5px 0.5px 3px 0.5px; text-align:center; line-height:40px;font-size:20px;">
			<img src="pics/tag.jpg" style="width:100%; height:70%;float:left;"><br/>
			TAG My Trip<br/>
			<form action="newtag2.php" method="post">
				&nbsp;&nbsp;&nbsp;<input type="text" name="tagname" style="width:50%; height:30px;">
				<input type="submit" class="btn" value="OK">&nbsp;&nbsp;&nbsp;
			</form>
		</div>
		<div style="display:none;">
<?php
	//echo '<script>initialize()</script>';
	echo "welcome~ It's your travel plan!!!!"."</br>";
	$jsontext = "{";
	$total = $_SESSION['total'];
	echo $total;
	$place = $_SESSION['place'];
	echo "total dasy = ".$total."</br>";
	
	/*關鍵字*/			
	$tag_eat=array();
	$tag_hotel=array();
	$tag_site=array();
	/*關鍵字*/
	
	for($j=1;$j<=$total;$j++){
		if($j!=1)
			$jsontext.=",";
		$jsontext .= "\"".($j)."\":";
		$true = $_SESSION['diff'.($j)];
		
		$length = count($true);
		echo "length".$length;
		$jsontext .= "[";
		for($i=0,$count=0;$i<$length;$i++){//$i is the array count, $j is the day, $temp is the number
			$temp = $true[$i];
		
			echo '$true:'.$temp;
			if($temp!=-1){
				$start =$temp."_start";
				echo "</br>".$start."</br>";
				$end = $temp."_end";
				//echo $start;
				$starttime =  $_POST[$start];
				echo '</br>starttiem:'.$starttime."</br>";
				$endtime = $_POST[$end];
				//echo $starttime;
				if($starttime){
					$sortarray[$start.'|'.$endtime]=$starttime;
				}
			}	
		}
		asort($sortarray);
			echo $j."day</br>";
			echo '<div style="position:relative;top:2px;width:500px;height:500px; border:solid black;" id='.$j.'></div>';
			
			foreach($sortarray as $x => $x_value){
			echo "key = " .$x.",Value= ".$x_value;
			echo "</br>";
					echo 'count!!'.$count.'</br>';
					$array = explode("_",$x);
					$endtime = explode("|",$x);
					echo "</br>endtime:".$endtime;
					echo "</br>starttime:".$array[1];
					var_dump($array);
					$file = 'json/'.$place.'_'.$array[2].'.json';
					$string = file_get_contents($file);//get json
					$data = json_decode($string);
					echo 'type='.$array[2].'</br>';
					echo 'number='.$array[3].'</br>';
					$obj = $data[$array[3]];
					$store[$count] = $obj->Px."_".$obj->Py;
					//echo '<script>document.getElementById("'.$j.'").innerText+=54;</script>';
					echo '<script>document.getElementById("'.$j.'").innerText+="'.$obj->Px."_".$obj->Py.'|'.'";</script>';
					echo "<br/>-------------------count:".$count.";day:".$j."</br>";
					
					if($count!=0){
						echo "day is :".$j;
						$jsontext .=",";
					}
					//start to make object
					$jsontext .= "{";
						$jsontext.="\"starttime\":";
						$jsontext.= "\"".$x_value."\",";
						$jsontext.="\"endtime\":";
						$jsontext.="\"". $endtime[1]."\",";
						$jsontext.="\"site\":";
						$jsontext.= "\"".$obj->Name."\",";
						$jsontext.="\"address\":";
						$jsontext.= "\"".$obj->Add."\",";
						$jsontext.="\"url\":";
						$jsontext.= "\"".$obj->Picture1."\",";
						$jsontext.="\"type\":";//type
						$jsontext.= "\"".$array[2]."\",";
						$jsontext.="\"no\":";//number
						$jsontext.= "\"".$array[3]."\",";
						$jsontext.="\"intro\":";
						$descipt = $obj->Toldescribe;
						$str = str_replace(array("rn", "\n", "\\n"),"</br>", $descipt);
						$str = str_replace(array("\r", "\n", "\r\n", "\n\r"), '</br>', $str);
						$str = str_replace('"',"", $str);
						$jsontext.= "\"".$str."\",";
						//preg_replace('/\n+/', '\\n', $descipt );						
						$jsontext.="\"phone\":";
						$jsontext.= "\"".$obj->Tel."\",";
						$jsontext.="\"Px\":";
						$jsontext.= "\"".$obj->Px."\",";
						$jsontext.="\"Py\":";
						$jsontext.= "\"".$obj->Py."\"";					
					$jsontext.="}";
					$count++;
				
				/*關鍵字*/
				$tagname=$obj->Name;
				if($array[2]==1){
					array_push($tag_eat,$tagname);
					var_dump($tag_eat);
				}
				else if($array[2]==2){
					array_push($tag_site,$tagname);	
					var_dump($tag_site);
				}
				else{
					array_push($tag_hotel,$tagname);	
					var_dump($tag_hotel);			
				}
				/*關鍵字*/
		}
		unset($sortarray);
		$sortarray = array();			
		$jsontext .= "]";		
	}	
	$jsontext .= "}";
	echo $jsontext;	
	$id = $_SESSION['id'];
	$sq = "SELECT title,enddate,startdate,place from tripplan WHERE id = '$id'";
	$result = mysql_query($sq);	
	while($row = mysql_fetch_array($result)){
	$title = htmlspecialchars($row['title']);
	$endDate = $row['enddate'];
	$startDate = $row['startdate'];
	$place =  $row['place'];
	}
	$acc = $_SESSION['accountID'];
	$timestamp = date('Y-m-d H:i:s');

	$sq = "SELECT id from tripplan ORDER BY id DESC LIMIT 1";
	$result = mysql_query($sq);	
	while($row = mysql_fetch_array($result)){
		$picid = htmlspecialchars($row['id']);
	}
	$picid = $picid+1;
	echo 'pic id :'.$picid;
	
//	$startdate = $_SESSION['start'];
//	$enddate = $_SESSION['end'];
	$timestamp = date('Y-m-d H:i:s');
	
	//echo '<script>alert('.$id.')</script>';
	$picstring = $id .'.png';

	mysql_query ("INSERT INTO tripplan (account,map,title,place,startdate,enddate,madetime,json)  VALUES ('$acc','$picstring','$title','$place','$startDate','$endDate','$timestamp','$jsontext')");  
	
	/*關鍵字*/
	$id = $picid;
	$num=count($tag_eat);
	for($i=0;$i<$num;$i++){
		$tagname=$tag_eat[$i];
		$sql = "INSERT INTO tag (tagname,tripplan)  VALUES ('$tagname','$id')";  
		mysql_query($sql);	
		$sql = "SELECT popular,id from eat WHERE item = '$tagname'";
		$result = mysql_query($sql);	
		$has=0;
		while($row = mysql_fetch_array($result)){
			$has=1;
			$popular=$row['popular']+1;
			$sql = "UPDATE eat SET popular='$popular' where id='$id'";
			mysql_query($sql);	
		}
		if($has==0){
			$sql = "INSERT INTO eat (item) VALUES ('$tagname')";
			mysql_query($sql);	
		}	
	}
	$num=count($tag_site);
	for($i=0;$i<$num;$i++){
		$tagname=$tag_site[$i];
		$sql = "INSERT INTO tag (tagname,tripplan)  VALUES ('$tagname','$id')";  
		mysql_query($sql);	
		$sql = "SELECT popular,id from site WHERE item = '$tagname'";
		$result = mysql_query($sql);	
		$has=0;
		while($row = mysql_fetch_array($result)){
			$has=1;
			$popular=$row['popular']+1;
			$sql = "UPDATE site SET popular='$popular' where id='$id'";
			mysql_query($sql);	
		}
		if($has==0){
			$sql = "INSERT INTO site (item) VALUES ('$tagname')";
			mysql_query($sql);	
		}	
	}
	$num=count($tag_hotel);
	for($i=0;$i<$num;$i++){
		$tagname=$tag_hotel[$i];
		$sql = "INSERT INTO tag (tagname,tripplan)  VALUES ('$tagname','$id')";  
		mysql_query($sql);	
		$sql = "SELECT popular,id from hotel WHERE item = '$tagname'";
		$result = mysql_query($sql);	
		$has=0;
		while($row = mysql_fetch_array($result)){
			$has=1;
			$popular=$row['popular']+1;
			$sql = "UPDATE hotel SET popular='$popular' where id='$id'";
			mysql_query($sql);	
		}
		if($has==0){
			$sql = "INSERT INTO hotel (item) VALUES ('$tagname')";
			mysql_query($sql);	
		}	
	}
	/*關鍵字*/
	$_SESSION['map']=null;
	/*View my trip*/
	echo "</div>";
	echo "<div class=\"acc\"  onclick=\"openTrip(".$_SESSION['editId'].")\" style=\"position:absolute; width:20%; height:50%; left:65%;top:28%;background:white;	border-style:solid;	border-color:gray;	border-width: 0.5px 0.5px 3px 0.5px; text-align:center; line-height:40px;font-size:20px;\">";
	echo "<img src=\"pics/see.jpg\" style=\"width:100%; height:70%;float:left;\"><br/>&nbsp;&nbsp;&nbsp;<br/>View My Trip</div>";
/*
	$place = $_POST['place'];
	$place = substr($place,0,2);
	$_SESSION['place'] = $place;
	$timestamp = date('Y-m-d H:i:s');
    $startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];
	
	$date1 = new DateTime($startDate);
	$date2 = new DateTime($endDate);
	
	$total = round(($date2->format('U') - $date1->format('U')) / (60*60*24));
	$title = mysql_real_escape_string($_POST['title']);
	if($place!=NULL &&$startDate!=NULL && $endDate!=NULL&& $title!=NULL){
		mysql_query ("INSERT INTO tripplan (title,startdate,enddate,place,madetime)  VALUES ('$title','$startDate','$endDate','$place','$timestamp')");  
		
	}else{
		echo "<script>alert('All field is required!')</script>";
	}
	$sq = "SELECT id from tripplan WHERE madetime = '$timestamp'";
	$result = mysql_query($sq);
	 while($row = mysql_fetch_array($result)){
	   $id = htmlspecialchars($row['id']);
	}
	$_SESSION['id'] =  $id;
	echo "<meta http-equiv=REFRESH CONTENT=0;url=make.php>";*/
?>
</div>
<script>
var j,k;
function startToput(alldays){
	$.get('getsession.php', {requested: 'place'}, function (data) {
				province = data;
				//alert(province);
				//alert(province);
		if(province=="00"){ Lat = 22.6333;Long =  120.2667;
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
		//string="http://maps.googleapis.com/maps/api/staticmap?center=kaohsiung&zoom=12&scale=false&size=600x600&maptype=roadmap&format=png&visual_refresh=true&"
		var string="http://maps.googleapis.com/maps/api/staticmap?center="+Lat+","+Long+"&zoom=11&scale=false&size=600x600&maptype=roadmap&format=png&visual_refresh=true&"
		if(province=="18" || province=="20"||province=="19"||province=="04")
			string="http://maps.googleapis.com/maps/api/staticmap?center="+Lat+","+Long+"&zoom=10&scale=false&size=1000x1000&maptype=roadmap&format=png&visual_refresh=true&";
		if(province=="02")
			string="http://maps.googleapis.com/maps/api/staticmap?center="+Lat+","+Long+"&zoom=12&scale=false&size=1000x1000&maptype=roadmap&format=png&visual_refresh=true&";
		
				for(j=1;j <= alldays;j++){
					var all = document.getElementById(j).innerText;
					console.log(all);
					var item = all.split("|");
					var pathSites=[];
					var draw=[];
					for(k=0;k<item.length;k++){
							console.log(item[k]);
						var place = item[k].split("_");
						if(typeof place[1]=='undefined')
							continue;
						
						console.log("!x:"+place[1]+"!y:"+place[0]);
						string += "markers=size:mid%7Ccolor:0xff0000%7Clabel:1%7C"+place[1]+","+place[0]+"&";
							draw[k] = place[1]+","+place[0];
							console.log("draw:"+draw[k]);
							var c = new google.maps.LatLng(place[1], place[0]);
							pathSites[k] = c;
							createMarker(c);
								
					}
				}
				for(j=1;j <= alldays;j++){
					var all = document.getElementById(j).innerText;
					console.log(all);
					var item = all.split("|");
					var pathSites=[];
					var draw=[];
					for(k=0;k<item.length;k++){
							console.log(item[k]);
						var place = item[k].split("_");
						if(typeof place[1]=='undefined')
							continue;
						
						console.log("!x:"+place[1]+"!y:"+place[0]);
						draw[k] = place[1]+","+place[0];
					
								
					}
					if(draw.length>1){
						 string+="&path=color:0xff0000ff|weight:10";
						for(k=0;k<draw.length;k++){
							string += "|"+draw[k];
						}
					}
					 
					
				}
				string += "&sensor=false";
				console.log(string);
				
				$.ajax({
				url: 'savePicedit.php',
				type: 'POST',
				data: { url: string },
				success: function(result) {
					//alert('the request was successfully sent to the server');
					hideLoad();
				}
			});
	});	
}

			var province;
			var data;
			var map;
			var type;//1:eat,2:sight, 3:hotel;
			var i,checkEat=0,checkHotel=0,checkSight=0;
           	var name ,latLng;
			var Lat=22.632130 ;
			var Long=120.299144 ;
			var LoadZoom= 13;
			var trueCount = 0;
			function initialize() {
			
			$.ajaxSetup({cache: false})
			$.get('getsession.php', {requested: 'total'}, function (data) {
				alldays = data;
				
				

				startToput(alldays);
			});
 
		}
	var marker;
	function createMarker(pos){
		
 			marker = new google.maps.Marker({       
        	position: pos, 
        	map: map,  // google.maps.Map 
        	
    }); 
		 return marker;		
}
	function  drawPath(path){
		path = new google.maps.Polyline({
					path: path,
					strokeColor: "#FF0000",
					strokeOpacity: 1.0,
					strokeWeight: 2
				});
		path.setMap(map);
	}
	
</script>
</body>
</html>