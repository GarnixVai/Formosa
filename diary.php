<?php
session_start();
include("mysqlInc.php");
?>
 
<?php
if(!isset($_SESSION['accountID']) || $_SESSION['accountID']==null){
    echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
}
if(!isset($_GET['map']) || $_GET['map']==NULL){
	echo '<meta http-equiv=REFRESH CONTENT=0;url=index.php>';	
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
<body class="diary">
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

<div class="dleft">
</div>
	
<div style="position:relative; left:45%; top:15%; width:45%; height:80%;">
	<?php
		$id = mysql_real_escape_string($_GET['map']);
		$sql = "SELECT json,title,account,diary FROM tripplan where id = '$id'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		if($row['account']!=$_SESSION['accountID']){
			echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
		}
		else{
			$diary=htmlspecialchars($row['diary']);
			$json = $row['json'];
			$sites = json_decode($json, true);
			echo "<p style=\"text-align:center;font-size:20px;\">撰寫旅遊日誌:&nbsp;&nbsp;".$row['title']."</p>";
			$day = count($sites);
			for($i=1;$i<=$day;$i++){
				echo "<p style=\"text-align:center\"><span style=\"font-size:18px;\">第".$i."天&nbsp;&nbsp;&nbsp;&nbsp;</span>";
				$sitenum = count($sites[$i]);
				for($j=0;$j<$sitenum;$j++){
					echo "<span onclick=\"showSite(".$j.")\" class=\"site\">".$sites[$i][$j]['site']."</span>";
					if($j != $sitenum-1){
						echo "<img class=\"pointer\" src=\"./pics/pointer.gif\">";
					}
				}
				echo "</p>";
			}
			echo "<hr><br/><form action=\"diary.php?map=".$_GET['map']."\" method=\"post\">";
			echo "<textarea class=\"diarytext\" name=\"diarytext\" autofocus>".$diary."</textarea>";
			echo "<br/><br/><p style=\"text-align:center\"><input type=\"submit\" value=\"送出\"></p></form>";
			for($i=1;$i<=$day;$i++){
				for($j=0;$j<$sitenum;$j++){
					$intro = str_replace("\n", "<br/>&nbsp;&nbsp;&nbsp;&nbsp;", $sites[$i][$j]['intro']);
					echo "<div class=\"siteblock\" id=\"".$j."\"><img class=\"close\" id=\"closesite\" src=\"./pics/close.gif\">";
					echo "<img class=\"sitebigphoto\" src=\"".$sites[$i][$j]['url']."\">";
					echo "<p style=\"font-size:20px\">".$sites[$i][$j]['site']."</p>";
					echo "<p>address:&nbsp;".$sites[$i][$j]['address']."<br/></p>";
					echo "<p>phone:&nbsp;".$sites[$i][$j]['phone']."<br/></p>";
					echo "<p>introduction:<br/>&nbsp;&nbsp;&nbsp;&nbsp;".$intro."</p></div>";
				}
			}
		}
	?>
	<p class="warning">
		<?php
			/*接收使用者資料*/
			if(isset($_POST['diarytext'])){
			$acc = mysql_real_escape_string($_SESSION['accountID']);
			$id = mysql_real_escape_string($_GET['map']);
			$sql = "SELECT account FROM tripplan where id = '$id'";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			if($row['account']!=$acc) echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
			else{
				$diary=mysql_real_escape_string($_POST['diarytext']);				
				$sql = "UPDATE tripplan SET diary='$diary' WHERE id='$id'";
				if(mysql_query($sql)){
						echo "撰寫成功!</br>";
						echo '<meta http-equiv=REFRESH CONTENT=2;url=user.php>';
				}
				else{
					echo "撰寫失敗，請再嘗試一次。</br>";
				}				
			}
		}
		?>
	</p>
</div>
</body>
</html>