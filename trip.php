<?php
session_start();
include("mysqlInc.php");
/*檢查必要之GET物件*/
if(!isset($_GET['map']) || $_GET['map']==NULL){
	echo '<meta http-equiv=REFRESH CONTENT=0;url=gallery.php>';	
}
else if(!isset($_SESSION['map']) && $_SESSION['map']!="0"){
	$map=$_GET['map'];
	$_SESSION['map']=$map;
	echo'<meta http-equiv=REFRESH CONTENT=0;url=trip.php?map='.$map.'>';	
}
?>
<html>
<head>
    <title>漫遊formosa</title>
	<meta charset="UTF-8">
	<link rel=stylesheet type="text/css" href="formosa.css">
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="formosa.js"></script>
</head>
 
<body class="forum">

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
<div style="position:absolute; top:10%; left:5%;width:90%;">
	<?php	/*呈現旅程內容及製作人資料*/					
		function showTheme($row){
			$id=htmlspecialchars($_GET['themeID']);
			$time = htmlspecialchars($row['madetime']);
			$time = substr($time,0,10);
			$json = $row['json'];
			$title = htmlspecialchars($row['title']);
			$map = htmlspecialchars($row['map']);
			$sites = json_decode($json, true);
			
			$acc=mysql_real_escape_string($row['account']);
			$sql = "SELECT username,photoname from users WHERE accountID='$acc'";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			$user = htmlspecialchars($row['username']);
			$photo = htmlspecialchars($row['photoname']);
			$acc = htmlspecialchars($acc);
						
			echo "<img style=\"position:fixed; width:45%; height:85%;\" src=\"./upload/map/".$map."\">";
			echo "<div style=\"position:relative; top:0; left:53%; width:47%; text-align:center; background:rgba(219,124,66,0.5);\"><span class=\"title\">".$title."</span><br/>";
			echo "地圖製作人:".$acc."&nbsp;&nbsp;&nbsp;&nbsp;製作日期:".$time."</div><br/>"; 
			echo "<div class=\"tripdetail\">";
			$day = count($sites);
			for($i=1;$i<=$day;$i++){
				echo "<span style=\"font-size:18px;\">第".$i."天&nbsp;&nbsp;&nbsp;&nbsp;</span><br/>";
				$sitenum = count($sites[$i]);
				for($j=0;$j<$sitenum;$j++){
					echo $sites[$i][$j]['starttime']."~".$sites[$i][$j]['endtime']."&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"#".$i.$j."\">".$sites[$i][$j]['site']."</a>";
					echo "&nbsp;&nbsp;&nbsp;&nbsp;<img style='height:20px;' src=\"./pics/pin.png\"><span>".($j+1)."</span><br/>";
				}
				echo "<br/>";
			}
			for($i=1;$i<=$day;$i++){
				$sitenum = count($sites[$i]);
				for($j=0;$j<$sitenum;$j++){
					$intro = str_replace("\n", "<br/>&nbsp;&nbsp;&nbsp;&nbsp;", $sites[$i][$j]['intro']);
					echo "<a id=\"".$j."\" name=\"".$i.$j."\"></a><hr><div style='position:relative;width:100%; height:30px;'>&nbsp;</div><table><tr><td><img class=\"sitebigphoto\" src=\"".$sites[$i][$j]['url']."\">";
					echo "<p style=\"font-size:20px\">".$sites[$i][$j]['site']."</p>";
					echo "<p>address:&nbsp;".$sites[$i][$j]['address']."<br/></p>";
					echo "<p>phone:&nbsp;".$sites[$i][$j]['phone']."<br/></p>";
					echo "<p>introduction:<br/>&nbsp;&nbsp;&nbsp;&nbsp;".$intro."</p></td><tr></table><div style='position:relative;width:100%; height:30px;'>&nbsp;</div>";
				}
			}
			echo "</div>";
		}
		$id=$_GET['map'];
		$sql = "SELECT account,map,title,madetime,json from tripplan WHERE id=".$id;
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		showTheme($row);
	?>
</div>

<img src="./pics/top.gif" class="top" style="position:fixed; left:85%; width:10%;" id="toTop">

</body>
</html>