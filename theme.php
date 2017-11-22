<?php
session_start();
include("mysqlInc.php");
/*接收回應*/
if(isset($_POST['msgBody'])){
	if(!isset($_SESSION['accountID'])) echo "<script type='text/javascript'>alert(\"回應失敗，請先登入。\");</script>";
	else if(!$_POST['msgBody']) echo "<script type='text/javascript'>alert(\"回應失敗，請輸入內容。\");</script>";
	else{
		$themeID = mysql_real_escape_string($_SESSION['themeID']);
		$acc = mysql_real_escape_string($_SESSION['accountID']);
		$msg = mysql_real_escape_string($_POST['msgBody']);	
		$id=mysql_real_escape_string($_GET['themeID']);
		$sql = "SELECT response,account from tripplan WHERE id=".$id;
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		$response = htmlspecialchars($row['response']);
		$hostaccount=$row['account'];
		$num = $response + 1;
		
		$sql = "UPDATE tripplan SET response='$num' where id='$id'";
		mysql_query($sql);
		
		$sql = "INSERT INTO response (time, msgBody, themeID, accountID, hostaccount) VALUES (CURRENT_TIMESTAMP, '$msg', '$themeID', '$acc','$hostaccount')";			
		mysql_query($sql);
		
		echo "<meta http-equiv=REFRESH CONTENT=0;url=theme.php?themeID=".$_SESSION['themeID'].">";	
	}
} 
/*檢查必要之GET物件*/
if(!isset($_GET['themeID']) || $_GET['themeID']==NULL){
	if(isset($_SESSION['themeID']) && $_SESSION['themeID']) echo "<meta http-equiv=REFRESH CONTENT=0;url=theme.php?themeID=".$_SESSION['themeID'].">";	
	else echo '<meta http-equiv=REFRESH CONTENT=0;url=gallery.php>';	
}
else{
	$_SESSION['themeID']=$_GET['themeID'];
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
</head>
 
<body class="forum">
	<?php
	 /*增加喜歡數*/
	if(isset($_GET['id']) && isset($_GET['num'])){
		if(isset($_SESSION['accountID']) && $_SESSION['accountID']!=null){
			$id=mysql_real_escape_string($_GET['id']);	
			$num=mysql_real_escape_string($_GET['num'])+1;	
			$acc=$_SESSION['accountID'];
			$sql = "SELECT tripplan from collection WHERE account = '$acc'";
			$result = mysql_query($sql);	
			$has=0;
			while($row = mysql_fetch_array($result)){
				if($row['tripplan']==$id){
					$has=1;
					break;
				}
			}
			if($has){
				echo "<script>showAlert(2)</script>";
			}
			else{			
				$sql = "INSERT INTO collection (account, tripplan) VALUES ('$acc', '$id')";
				mysql_query($sql);
				$sql = "UPDATE tripplan SET likenum='$num' where id='$id'";
				mysql_query($sql);// or die(mysql_error());	
				
				echo "<script>showAlert(1)</script>";
			}
		}
		else{
			echo "<script>showAlert(0)</script>";
		}
	}
	?>

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

<div id="dialog-confirm" title="Collection" style="display:none;">
  <p style="text-align:center"><span class="ui-icon ui-icon-alert"></span>You have not logged in yet.</p>
</div>
<div id="dialog-confirm1" title="Collection" style="display:none;">
  <p style="text-align:center"><span class="ui-icon ui-icon-alert"></span>This trip plan is added to your collection.</p>
</div>
<div id="dialog-confirm2" title="Collection" style="display:none;">
  <p style="text-align:center"><span class="ui-icon ui-icon-alert"></span>This trip plan is already in your collection.</p>
</div>

<?php	/*呈現旅程內容及製作人資料*/					
	function showTheme($row){
		$id=htmlspecialchars($_GET['themeID']);
		$time = htmlspecialchars($row['madetime']);
		$time = substr($time,0,10);
		$json = $row['json'];
		$title = htmlspecialchars($row['title']);
		$like = htmlspecialchars($row['likenum']);
		$map = htmlspecialchars($row['map']);
		$response = htmlspecialchars($row['response']);
		$sites = json_decode($json, true);
		
		$acc=mysql_real_escape_string($row['account']);
		$sql = "SELECT username,photoname from users WHERE accountID='$acc'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		$user = htmlspecialchars($row['username']);
		$photo = htmlspecialchars($row['photoname']);
		$mapnum = htmlspecialchars($row['mapnum']);
		$acc = htmlspecialchars($acc);
		
		echo "<section class=\"search\">";
		echo "<div class=\"bigmap\" onclick=\"openTrip(".$id.")\" onmouseover=\"seeDetail()\" onmouseout=\"hideDetail()\"><img class=\"bigmap\" src=\"./upload/map/".$map."\"><div class=\"cover\" id=\"cover\"><div class=\"middle\" style=\"width:100%;\">See Detail</div></div></div>";
		echo "<div class=\"days\" id=\"days\"><p><span class=\"title\">".$title."&nbsp;&nbsp;&nbsp;&nbsp;</span>";
		echo "<span style=\"color:#C40000\">".$like."</span><img class=\"like\" onclick=\"likeTheme(".$id.",".$like.",1)\" src=\"./pics/like.png\">&nbsp;&nbsp;";
		echo "<span style=\"color:#009CC3\">".$response."</span><img class=\"like\" style=\"cursor:auto\" src=\"./pics/response.gif\">&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "<span class=\"detailbtn\" onclick=\"openTrip(".$id.")\">&nbsp;&nbspSee Detail&nbsp;&nbsp;</span></p>";
		$day = count($sites);
		for($i=1;$i<=$day;$i++){
			echo "<p><span style=\"font-size:18px;\">第".$i."天&nbsp;&nbsp;&nbsp;&nbsp;</span>";
			$sitenum = count($sites[$i]);
			for($j=0;$j<$sitenum;$j++){
				echo "<span onclick=\"showSite(".$i.$j.")\" class=\"site\">".$sites[$i][$j]['site']."</span>";
				if($j != $sitenum-1){
					echo "<img class=\"pointer\" src=\"./pics/pointer.gif\">";
				}
			}
			echo "</p>";
		}
		echo "</div></section>";
		$day = count($sites);
		for($i=1;$i<=$day;$i++){
			$sitenum = count($sites[$i]);
			for($j=0;$j<$sitenum;$j++){
				$intro = str_replace("\n", "<br/>&nbsp;&nbsp;&nbsp;&nbsp;", $sites[$i][$j]['intro']);
				echo "<div class=\"siteblock\" id=\"".$i.$j."\"><img class=\"close\" id=\"closesite\" src=\"./pics/close.gif\">";
				echo "<img class=\"sitebigphoto\" src=\"".$sites[$i][$j]['url']."\">";
				echo "<p style=\"font-size:20px\">".$sites[$i][$j]['site']."</p>";
				echo "<p>address:&nbsp;".$sites[$i][$j]['address']."<br/></p>";
				echo "<p>phone:&nbsp;".$sites[$i][$j]['phone']."<br/></p>";
				echo "<p>introduction:<br/>&nbsp;&nbsp;&nbsp;&nbsp;".$intro."</p></div>";
			}
		}

		echo "<section class=\"hostintro\"><div class=\"hostcontainer\">";
		echo "<img class=\"hostphoto\" src=\"./upload/".$photo."\">";
		echo "<p>地圖製作人:<br/>".$user."</p>";
		echo "<p>製作時間:<br/>".$time."</p>";
		echo "</div><img src=\"./pics/message.gif\"  class=\"msgbtn0\"></section>";
	}
	$id=$_GET['themeID'];
	$sql = "SELECT account,map,title,madetime,json,likenum,response from tripplan WHERE id=".$id;
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	showTheme($row);
?>

<img src="./pics/top.gif" class="top" id="toTop">

<div class="msgwindow" id="msgwindow">
	<img src="./pics/message.gif" class="msgbtn">
	<div class="msgwrite">
		<p><img class="close" id="closemsg" src="./pics/close.gif"></p>
		<form action=<?php echo "theme.php?themeID=".$_SESSION['themeID']; ?> method="post">
			<textarea class="msgarea" name="msgBody" style="position:relative; top:10%; width:80%; height:80%; font-size:20px" autofocus></textarea></br>
			<br/><input type="submit" value="送出">
		</form>
	</div>
</div>

<div class="main" style="top:65%;left:33%;">
	<div class="diary">
		<?php	/*呈現日記*/
			$id=mysql_real_escape_string($_GET['themeID']);
			$sql = "SELECT diary from tripplan WHERE id=".$id;
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			$diary = htmlspecialchars($row['diary']);
			if($diary==""){
				echo "此篇尚無旅遊日誌內容。";
			}
			else{
				$diary = str_replace("\n", "<br/>", $diary);
				echo $diary;
			}
		?>
	</div>
	<br/>
	<p>&nbsp;</p>
	<?php	/*呈現回應*/					
		function showResponse($row){
			$time = htmlspecialchars($row['time']);
			$msg = htmlspecialchars($row['msgBody']);
			$msg = str_replace("\n", "<br/>", $msg);
			
			$acc=mysql_real_escape_string($row['accountID']);
			$sql = "SELECT username,photoname from users WHERE accountID='$acc'";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			$user = htmlspecialchars($row['username']);
			$photo = "./upload/". htmlspecialchars($row['photoname']);
			
			echo "<div class=\"response\">";
			echo "<table border=\"0\" style=\"width:95%\">";
			echo "<tr style=\"height:25px;\"><td width=\"3%\"></td><td style=\"width:60px;\"><img style=\"width:50px; height:50px\" src=\"".$photo."\"></td>";
			echo "<td style=\"text-align:left; width:97%\">留言人： ".$user."<br/>時間: ".$time."</td><td style=\"text-align:right;float:right;\">";
			echo "</td></tr><tr><td></td><td colspan=\"3\">".$msg."</td></tr>";
			echo "</table></div>";
			echo "<p>&nbsp;</p>";
		}
		
		$themeID=mysql_real_escape_string($_GET['themeID']);
		$sql = "SELECT * from response WHERE themeID = '$themeID' ORDER BY time DESC";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){
			showResponse($row);
		}
	?>
<div style="height:30%; width:100%;"></div>
</div>
</body>
</html>