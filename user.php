<?php
session_start();
include("mysqlInc.php");
?>
 
<?php
if(!isset($_SESSION['accountID']) || $_SESSION['accountID']==null){
    echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
}
/*刪除物件*/
if(isset($_GET['delete'])){
	$isHost=0;
	$id=mysql_real_escape_string($_GET['delete']);
	$sql = "SELECT map,account FROM tripplan WHERE id = '$id'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	if(isset($_SESSION['accountID'])){
		$acc=mysql_real_escape_string($_SESSION['accountID']);
		if($row['account']==$acc) $isHost=1;
	}
	if(!$isHost) exit;
	
	$map=$row['map'];
	unlink("upload/map/".$map);
	$sql = "DELETE FROM tripplan WHERE id = '$id'";	
	mysql_query($sql);
	$sql = "DELETE FROM tag WHERE tripplan = '$id'";	
	mysql_query($sql);
	echo "<meta http-equiv=REFRESH CONTENT=0;url=user.php>";
}
?>
 
<html>
<head>
	<title>漫遊formosa</title>
	<meta charset="UTF-8">
	<link rel=stylesheet type="text/css" href="formosa.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script type="text/javascript" src="formosa.js"></script>
	<script type="text/javascript" src="usermenu.js"></script>
	<link rel=stylesheet type="text/css" href="usermenu.css">
</head>
<body class="user">
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
	
	<div id="dialog-confirm" title="Delete My trip plan" style="display:none;">
	  <p style="text-align:center"><span class="ui-icon ui-icon-alert"></span>This trip plan will be permanently deleted.</p>
	</div>
	
	<div class="leftblock">
		<img style="position:relative; left:30%; width:40%;" src="./pics/myacc.gif">
		<div class="leftTop">
			<div id='cssmenu'>
				<ul>
				   <li class='active'><a href='#'>My Account</a></li>
				   <li><a href='user_admin.php'>Personal Data</a></li>
				   <li><a href='makerhome.php'>Edit My Trip</a></li>
				   <li><a href='gallery.php'>Gallery</a></li>
				</ul>
			</div>
		</div>
		<div class="itemtop">
			<div style="width:9%;" class="wordtop">刪除</div>
			<div style="width:10%;" class="wordtop">日誌</div>
			<div style="width:50%;" class="wordtop">旅程名稱</div>
			<div style="width:29%;" class="wordtop">最後修改日期</div>			
		</div>
		<?php	/*呈現主題*/					
			function showTheme($row){
				$time = htmlspecialchars($row['madetime']);
				$title = htmlspecialchars($row['title']);
				$id = htmlspecialchars($row['id']);						
				echo "<div class=\"item\">";
				echo "<div style=\"width:10%; cursor:hand;\" onclick=\"deleteMap(".$id.")\" id=\"deletebtn\" class=\"word\"><img src=\"./pics/delete.png\" class=\"like\"></div>";
				echo "<div style=\"width:10%; cursor:hand;\" onclick=\"openDiary(".$id.")\" class=\"word\"><img src=\"./pics/update.gif\" style=\"height:25px; width:25px;\" class=\"like\"></div>";
				echo "<div style=\"width:50%; cursor:hand;\" class=\"word\" onclick=\"openTheme(".$id.")\">".$title."</div>";
				echo "<div style=\"width:30%;\" class=\"word\">".$time."</div></div>";
			}
			$acc = mysql_real_escape_string($_SESSION['accountID']);
			$sql = "SELECT title,madetime,id from tripplan WHERE account='$acc' ORDER BY madetime DESC";
			$result = mysql_query($sql);
			$num=0;
			while($row = mysql_fetch_array($result)){
				showTheme($row);
				$num++;
			}
			if($num==0) echo "<div class=\"item\" onclick='goTo(6)' style='cursor:hand'><div class='middle' style='width:100%;'>No trip plan now. Go plan a new trip!</div></div>";
		?>
		<div style="height:20%; width:100%;"></div>
	</div>
	<div class="rightblock">
		<div class="coltitle">
			<div class="middle" style="text-align:center;width:100%;">Recent Responses</div>
		</div>
		<div id="recentresponse">
			<?php	/*呈現最新回應*/					
				function showItem($row){
					$msgBody = htmlspecialchars($row['msgBody']);
					$themeID = htmlspecialchars($row['themeID']);		
					$time = htmlspecialchars($row['time']);	
					$time = substr($time,0,10);
					if(strlen($msgBody)>50){
						$msgBody=mb_substr($msgBody,0,50,"UTF-8");
						$msgBody=$msgBody."...";
					}
					$msgBody = str_replace("\n", "<br/>", $msgBody, $num);
					if($num>2){
						$msg_array=explode("<br/>",$msgBody);
						$msgBody = $msg_array[0]."</br>".$msg_array[1]."</br>...";
					}
					
					$acc = mysql_real_escape_string($_SESSION['accountID']);
					$sql = "SELECT title,map from tripplan WHERE id='$themeID'";
					$result = mysql_query($sql);
					$row = mysql_fetch_array($result);
					$title = htmlspecialchars($row['title']);
					$map = htmlspecialchars($row['map']);	
					
					echo "<hr><div class=\"item\" onclick=\"openTheme(".$themeID.")\" style=\"height:90px; text-align:left;cursor:hand\">";
					echo "<img style=\"padding:5px; height:80px; width:80px; float:left;\" src=\"./upload/map/".$map."\">";
					echo "<table><tr><td>".$title."</td>";
					echo "<td style=\"text-align:right;\"><img class=\"like\" src=\"./pics/response.gif\">留言時間：".$time."</td></table>";
					echo "<div class=\"middle\" style=\"position:absolute; left:90px; top:60px; width:80%;padding:5px;\">".$msgBody."</div></div>";
				}
				$acc = mysql_real_escape_string($_SESSION['accountID']);
				$sql = "SELECT time,themeID,msgBody from response WHERE hostaccount='$acc' ORDER BY time DESC";
				$result = mysql_query($sql);
				$num=0;
				while($row = mysql_fetch_array($result)){
					showItem($row);
					$num++;
					if($num==10) break;
				}
				echo "</div>";
				if($num<3){
					if($num==0) echo "<br/>No responses to your trip plans yet.";
					echo "<script type='text/javascript'>resize();</script>";
				}
				else{
					echo "<p id=\"more\" style=\"cursor:hand; text-decoration: underline;\" onclick=\"moreresponse()\">more...</p>";
				}
			?>		
		
		<p>&nbsp;</p>
		<div class="coltitle">
			<div class="middle" style="text-align:center;width:100%;">My Collection</div>
		</div>
		<hr>		
		<?php	/*呈現人氣地圖*/					
			function showCollection($row){
				$title = htmlspecialchars($row['title']);
				$map = htmlspecialchars($row['map']);		
				$like = htmlspecialchars($row['likenum']);	
				$response = htmlspecialchars($row['response']);
				$id = htmlspecialchars($row['id']);	
				echo "<div class=\"moremap\" onclick=\"openTheme(".$id.")\">";
				echo "<img class=\"map\" src=\"./upload/map/".$map."\">";
				echo "<div class=\"mapname\">".$title."</div>";
				echo "<div class=\"mapintro\">".$like."<img class=\"like\" src=\"./pics/like.png\">";
				echo "&nbsp;&nbsp;".$response."<img class=\"like\" src=\"./pics/response.gif\"></div></div>";
			}
			$acc=$_SESSION['accountID'];
			$sql = "SELECT tripplan from collection WHERE account='$acc' ORDER BY time DESC";
			$result = mysql_query($sql);
			$num=0;
			while($row = mysql_fetch_array($result)){
				$id=$row['tripplan'];
				$sql = "SELECT id,title,map,likenum,response from tripplan WHERE id='$id'";
				$result2 = mysql_query($sql);
				$row2 = mysql_fetch_array($result2);
				showCollection($row2);
				$num++;
				if($num==10) break;
			}
			if($num==0){
				echo "<p style='text-align:center'>No Collection Now.</p>";
				echo "<p style='text-align:center; cursor:hand;' onclick='goTo(3)'>REMIND: Click <img class=\"like\" src=\"./pics/like.png\"> to add the trip to your collection.</p>";
			}
		?>		
	</div>
</body>
</html>