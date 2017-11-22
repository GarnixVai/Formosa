<?php
session_start();
include("mysqlInc.php");
if(!isset($_SESSION['accountID']) || $_SESSION['accountID']==null){
    echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
}
?>
<?php
$hello = $_SESSION['diff'];
?>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" http-equiv="content-type" content="text/html, charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../favicon.ico"> 
	<script type="text/javascript" src="formosa.js"></script>
	<link rel=stylesheet type="text/css" href="formosa.css">
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' />		
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="map.css"  type="text/css" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>  
	<script type="text/javascript" src="menu.js"></script>
	<link rel=stylesheet type="text/css" href="menu.css">	
			
			
	<title>漫遊formosa</title>
    <style>
        body{
		background-image:url("pic/wall.jpg");
		background-attachment:fixed;
		font-family:cursive,標楷體;
	
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
.left{
 width: 25px;
 height:50px;
 display:block;
 background:transparent url('pic/left_arrow.png') center top no-repeat;
 background-size: 100%;
	
}
.left:hover {
   background-image: url('pic/left_arrow_hover.png');
}
.right{
 width: 25px;
 height:50px;
 display:block;
 background:transparent url('pic/right_arrow.png') center top no-repeat;
 background-size: 100%;
	
}
.right:hover {
   background-image: url('pic/right_arrow_hover.png');
}
.scroll {
    scrollbar-3dlight-color:gold;
    scrollbar-arrow-color:blue;
    scrollbar-base-color:;
    scrollbar-darkshadow-color:blue;
    scrollbar-face-color:;
    scrollbar-highlight-color:;
    scrollbar-shadow-color:;
}

.scroll::-webkit-scrollbar{
width:16px;
background-color:#f5deb3;
opacity:0.4;
} 
.scroll::-webkit-scrollbar-thumb{
background-color:#deb887;
border-radius:10px;
}
.scroll::-webkit-scrollbar-track{
border:1px #f5deb3 solid;
border-radius:10px;
-webkit-box-shadow:0 0 6px #f5deb3 inset;
}    
.scroll::-webkit-scrollbar-thumb:hover{
background-color:#deb887;
border:1px solid #fffacd;
}
.scroll::-webkit-scrollbar-thumb:active{
background-color:#d2b48c;
border:1px solid #fffacd;
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
	
<div style="position:absolute; top:10%; width:100%; height:90%;">

	<div style="left:0;top:0;  height:500px;">
<div id="title" style="position:absolute;left:10%;top:10%">
<p style="font-family:cursive;font-size:40pt; color:#FF9966">
<?php
echo $_SESSION['title'];
?>
</p>
<p style="font-family:cursive;font-size:20pt; color:#FF6666;position:relative;left:40%">

</p>
</div>

</div>

	<div  style='position:absolute;top:0px;left:10%;width:25%; height:80%;background:rgba(100%,100%,100%,0.2);'>
<p style="position:absolute;top:0%;left:0%;width: 70%;text-align:left">Title</p>
<p style="position:absolute;top:0%;left:70%;width: 30%;text-align:center">Action</p>

    

 <div class='scroll' style="position:absolute; top:30px;left:0%;width: 100%; height:90%; overflow-y: scroll;">
   
   <?php
			
			$json = stripslashes($_COOKIE['collection']);
			$cookie = $_COOKIE['collection'];
			$province = $_SESSION['place'];
		/*	$string=str_replace('},
			$context = stream_context_create($opts);
			]',"}
			]",$string);*/
			
			//print_r($data[0]);	
			//print_r ($data[$val]);
			$diff = ($_SESSION['diff']);
			$_COOKIE['diff'] = $diff;
			$jsonIterator = new RecursiveIteratorIterator(
				new RecursiveArrayIterator(json_decode($json, TRUE)),
				RecursiveIteratorIterator::SELF_FIRST);
			echo "<table class='top' align='center' width='100%' >";
			
			foreach ($jsonIterator as $key => $val) {
				if(is_array($val)) {
					//echo "$key:\n";
				} else {
					if($key=='number'){						
					$array = explode("_",$val);
					
					$file = "json/".$province."_".$array[0].".json";
					$string = file_get_contents($file);		
					$data = json_decode($string);
					
					echo "<tr><td  style=\"text-align:left;width:70%;\" >";
					$obj = $data[$array[1]];
					echo $obj->Name;
					echo "<a href='#' style='position:absolute;left:70%;width:30%;text-align:center' onclick='list(\"$val\");return false;'>Add"."</a>";
					}
				}
			}	
			echo "</tr></table>";
   ?>
   </div>

   </div>   
   <form  name="make1" method="post" action="submit.php">
<div class='scroll'  style="position:absolute;top:40px;	left:40%;	width:720px;	height:90%;  overflow-y:block">	
	<div  class='scroll' style="position:absolute;	left:0%;	top:0px;	width:100%;	height:100%;overflow-x:hidden	">	
			<div  class='scroll' style="position:absolute; left:0px; width:100%; overflow:block; height:100%;-webkit-transition-property: left;	-webkit-transition-duration: 0.3s;" id="menu">
			</div>
	</div>
</div>
<div onClick="document.forms['make1'].submit();" style='position:fixed; width:100%; text-align:center; top:90%;left:0%; height:10%; background:gray'><a href="#"><h1 class='save wiggle'>SAVE</h1></a></div>

</form>
	<div id="calender" style='position:absolute;left:40%;top:0px;width:720px; height:30px'>
		<div id="title_bar" style='background-color:black; width:80%;position:absolute;left:10%'>
			<p id='showDay' style='color:white;text-align:center'>
				<?php
					$id = $_SESSION['id'];
					
					$sq = "SELECT startdate from tempsave WHERE id = '$id'";
					$result = mysql_query($sq);	
	
					
					 while($row = mysql_fetch_array($result)){
						   $start = htmlspecialchars($row['startdate']);
					}
					echo "第1天      ";
					echo $start;
					$_SESSION['diff']=0;					
					
					$sq = "SELECT enddate from tempsave WHERE id = '$id'";
					$result = mysql_query($sq);
					 while($row = mysql_fetch_array($result)){
						   $end = htmlspecialchars($row['enddate']);
					}
					//echo "end".$end;
			
					//$dateTime = date:createfromformat('Y-M-D',$end);
					//$date->modify('-2 day');
					//$onlyconsonants = str_replace($vowels, "", "Hello World of PHP");

					$_SESSION['start'] = $start;
					$_SESSION['init'] = $start;
					$_SESSION['end'] = $end;
					$date1 = new DateTime($start);
					$date2 = new DateTime($end);
					
					$total = round(($date2->format('U') - $date1->format('U')) / (60*60*24));
					$_SESSION['total'] = $total;
					
					for($i=1;$i<=$total;$i++){
							$_SESSION['diff'.$i]=-1;
						//	echo "session  diff$i is:".$_SESSION['diff'.$i]."</br>";
					}
					//echo $total;
									
					//echo "hello".$total;
	
				?>
			</p>
		</div>
		<a class="left" href="#" class="arrow" onclick='left();return false;' >
		</a>
		<a class="right" href="#" class="arrow" onclick='right();return false;'>
		</a>
		<?php
				
		?>
		
		<div id="list" style="position:absolute;top:20%;left:10%">
		
		</div>
		
		

		
		
		
		
		<script type="text/javascript" src="jquery.cookie.js"></script>
		<script>
		
		var total;
		var test=[];
		var a = [];
		var count = [];
		var dayhtml = [];
		var idcount = [];
		var divcount = 0;
		var number = -1;
		$.get('getsession.php', {requested: 'total'}, function (data) {
			total = data;
			var block = document.getElementById('menu');
			block.style.width= 100*(total+1)+"%";
			for( k=0;k<=total;k++){		
				count[k] = 0;
				a[k]=0;				
				block.innerHTML +="<div id='day"+k+"' style=';position:absolute;top:0%;left:"+k*720+"px;width:720px;' ></div>";
				dayhtml[k] = 0;
				
			}
			
			
			for(k=0;k<=total;k++){
				a[k]=[];
				
			}
			console.log(block);
		});
		
		
		function left() {
			
			
			$.ajaxSetup({cache: false})
			$.get('getsession.php', {requested: 'diff'}, function (data) {
				session = data;
				var index = parseInt(session);
				console.log("index:"+index);
				if(index>0){
					
					up();
				}
				$("#showDay").load(
			"dir.php",
			{a:"left", b:2},
			function(){
			 //   alert("計算完成");
			}
			);
			 $("#list").load(
				"list.php",
				{num:-1},
				function(){
					//alert("計算完成");
				}
				);
					
			});
			
			
			
		}
			
		function right(){
		$.ajaxSetup({cache: false})
		$.get('getsession.php', {requested: 'diff'}, function (data) {
				session = data;
				var index = parseInt(session);
				console.log("index:"+index);
				if(index <total)
					down();
			  $("#showDay").load(
				"dir.php",
				{a:"right", b:2},
				//"a="+$("#a").val()+"&b="+$("#b").val(),
				function(){
					//alert("計算完成");
				}
				);
				 $("#list").load(
				"list.php",
				{num:-1},
				//"a="+$("#a").val()+"&b="+$("#b").val(),
				function(){
					//alert("計算完成");
				}
				);
					
			});
			
			  
				
			
		}
		
		
		var session;

	
		function list(number){
			$.ajaxSetup({cache: false})
			$.get('getsession.php', {requested: 'diff'}, function (data) {
				session = data;
				var index = parseInt(session);
				a[index][count[index]]= number;
				 $("#list").load(
				"list.php",
				{num:a[index]},
				//"a="+$("#a").val()+"&b="+$("#b").val(),
				function(){
					//alert("計算完成");
				}
				);
				if(number!=-1){
					AddItem(number,index,count[index]);
				count[index]++;
				}
			});	
		}
		
		function AddItem(num ,day,arrayCount){		
			var id = "day"+day;
			
			$.ajaxSetup({cache: false})
			$.get('getsession.php', {requested: 'place'}, function (data) {
			var place = data;
				
			var uten = num.split("_");
			console.log(num);
			var file = "json/"+place+"_"+uten[0]+".json"; 
			console.log(file);			
			
			$.getJSON(file, function(data) {
			 var inform =  document.getElementById(id);
					
			inform.innerHTML+="<div  style='position:relative;left:10%; height:40px;width:100%;' id='"+divcount+"'><div style=\"float:left;width:40%;overflow:hidden;\">"+data[uten[1]]["Name"]+"</div><div style='float:left'><input type='time' name='"+day+"_"+arrayCount+"_"+num+"_start"+"' value=\"00:00\">~<input type='time'  name='"+day+"_"+arrayCount+"_"+num+"_end"+"'  value=\"00:00\"></div>"+"<div style=\"float:left;position:relative; left:20px\"><a id='a"+divcount+"' href='#'  onclick='Delete("+arrayCount+","+divcount+");'>Delete"+"</a></div></div>";
			
				console.log(inform);
			 divcount++;
			});
		});
		}
		
		
		function Delete(point,divid){
			$.ajaxSetup({cache: false})
			$.get('getsession.php', {requested: 'diff'}, function (data) {
				session = data;
				var index = parseInt(session);
				a[index][point] = -1;
				//alert(divid);
				var div = document.getElementById(divid);
			//	var diva  = document.getElementById("a"+divid);
				div.style.display="none";
			//	diva.style.display="none";
				//alert("array length"+a[index].length);
			//	alert(a[session][count]);
			
				//count[session]++;
				//alert(count[session]+"count");
				 $("#list").load(
				"list.php",
				{num:a[index]},
				//"a="+$("#a").val()+"&b="+$("#b").val(),
				function(){
					//alert("計算完成");
				}
				);
				
			});
			
		}
		</script>
	</div>
    	
</div>
		</body>
</html>

    	