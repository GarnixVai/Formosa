<?php
session_start();
include("mysqlInc.php");
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
	<link rel="stylesheet" href="gallerymenu.css">
	<script src="gallerymenu.js"></script>
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
	/*接收並搜尋關鍵字*/
	if(isset($_POST['site'])){
		$category=$_POST['site'];
		echo "<meta http-equiv=REFRESH CONTENT=0;url=gallery.php?category=".$category."&sort=likenum>";
	} 
	?>
</head>
 
<body class="forum" id="mydiv" onscroll="swap_bar()">

<div class="bar2" id="bar2">
	<div class="bartitle">
		<img src="./pics/goback.gif" style="position:relative; bottom:20%; height:60%;" onclick="goBack()">
		<img src="./pics/title3.gif" style="height:100%" onclick="goTo(4)">
	</div>
	<form  id="searchform" name="searchform" action="gallery.php" method="post">
		<div class="middle" style="left:35%; width:40%;">
			<input type="text" placeholder="  想去哪玩呢?" name="site" id="site" class="searchbar">&nbsp;&nbsp;&nbsp;<img onClick="document.forms['searchform'].submit();" src="./pics/open.png" style="height:18px;cursor:hand;">
		</div>
	</form>
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

<section class="search">
	<div class="title" id="bar1">	
		<div onclick="goTo(4)" style="cursor:hand;"><img class="title" src="./pics/title4.gif"></div>
	</div>
	<h1>
		<form action="gallery.php" method="post">
			&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" placeholder="想去哪玩呢?" name="site" class="site">&nbsp;&nbsp;&nbsp;<input type="submit" class="btn" value="搜尋">
		</form>
	</h1>
</section>

<select name="sort" style="position:relative; float:right; right: 15%; margin:20px;" onchange="sort(this.options[this.selectedIndex].value<?php if(isset($_GET['category'])){$type=$_GET['category']; echo ",'$type'";} ?>)">
	<option value="madetime" <?php if(isset($_GET['sort']) && $_GET['sort']=="madetime") echo "selected=\"true\""; ?>>按時間排序</option>
	<option value="likenum" <?php if(isset($_GET['sort']) && $_GET['sort']=="likenum") echo "selected=\"true\""; ?>>按收藏數排序</option>
	<option value="response" <?php if(isset($_GET['sort']) && $_GET['sort']=="response") echo "selected=\"true\""; ?>>按回應人次排序</option>
</select>

<div id="dialog-confirm" title="Collection" style="display:none;">
  <p style="text-align:center"><span class="ui-icon ui-icon-alert"></span>You have not logged in yet.</p>
</div>
<div id="dialog-confirm1" title="Collection" style="display:none;">
  <p style="text-align:center"><span class="ui-icon ui-icon-alert"></span>This trip plan is added to your collection.</p>
</div>
<div id="dialog-confirm2" title="Collection" style="display:none;">
  <p style="text-align:center"><span class="ui-icon ui-icon-alert"></span>This trip plan is already in your collection.</p>
</div>

<div id='cssmenu' class="cssmenu">
<ul>
   <li class='active has-sub'><a href='#'>縣市</a>
      <ul>
         <li class='has-sub'><a href='#'>北部</a>
            <ul>
               <li><a href='gallery.php?category=台北市<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "&sort=".$type;} ?>'>台北市</a></li>
               <li><a href='gallery.php?category=新北市<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "&sort=".$type;} ?>'>新北市</a></li>
               <li><a href='gallery.php?category=基隆市<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "&sort=".$type;} ?>'>基隆市</a></li>
               <li><a href='gallery.php?category=新竹市<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "&sort=".$type;} ?>'>新竹市</a></li>
               <li><a href='gallery.php?category=新竹縣<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "&sort=".$type;} ?>'>新竹縣</a></li>
               <li><a href='gallery.php?category=桃園縣<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "&sort=".$type;} ?>'>桃園縣</a></li>
               <li><a href='gallery.php?category=宜蘭縣<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "&sort=".$type;} ?>'>宜蘭縣</a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'>中部</a>
            <ul>
               <li><a href='gallery.php?category=苗栗縣<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "&sort=".$type;} ?>'>苗栗縣</a></li>
               <li><a href='gallery.php?category=台中市<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "&sort=".$type;} ?>'>台中市</a></li>
               <li><a href='gallery.php?category=南投縣<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "&sort=".$type;} ?>'>南投縣</a></li>
               <li><a href='gallery.php?category=彰化縣<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "&sort=".$type;} ?>'>彰化縣</a></li>
               <li><a href='gallery.php?category=雲林縣<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "&sort=".$type;} ?>'>雲林縣</a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'>南部</a>
            <ul>
               <li><a href='gallery.php?category=嘉義市<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "&sort=".$type;} ?>'>嘉義市</a></li>
               <li><a href='gallery.php?category=嘉義縣<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "&sort=".$type;} ?>'>嘉義縣</a></li>
               <li><a href='gallery.php?category=台南市<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "&sort=".$type;} ?>'>台南市</a></li>
               <li><a href='gallery.php?category=高雄市<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "&sort=".$type;} ?>'>高雄市</a></li>
               <li><a href='gallery.php?category=屏東縣<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "&sort=".$type;} ?>'>屏東縣</a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'>東部</a>
            <ul>
               <li><a href='gallery.php?category=花蓮縣<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "&sort=".$type;} ?>'>花蓮縣</a></li>
               <li><a href='gallery.php?category=台東縣<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "&sort=".$type;} ?>'>台東縣</a></li>
            </ul>
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'>熱門景點</a>
      <ul>
         <li class='has-sub'><a href='#'>飲食</a>
            <ul>
				<?php
					$sql = "SELECT item from eat ORDER BY popular DESC";
					$result = mysql_query($sql);
					$num=0;
					while($row = mysql_fetch_array($result)){						
						echo "<li><a href='gallery.php?category=".$row['item'];
						if(isset($_GET['sort'])) echo "&sort=".$_GET['sort'];
						echo "'>".$row['item']."</a></li>";
						$num++;
						if($num==10) break;
					}
					if($num==0){
						echo "<li><a href='#'>此資料目前為空</a></li>";
					}					
				?>
            </ul>
         </li>
         <li class='has-sub'><a href='#'>住宿</a>
            <ul>
				<?php
					$sql = "SELECT item from hotel ORDER BY popular DESC";
					$result = mysql_query($sql);
					$num=0;
					while($row = mysql_fetch_array($result)){						
						echo "<li><a href='gallery.php?category=".$row['item'];
						if(isset($_GET['sort'])) echo "&sort=".$_GET['sort'];
						echo "'>".$row['item']."</a></li>";
						$num++;
						if($num==10) break;
					}
					if($num==0){
						echo "<li><a href='#'>此資料目前為空</a></li>";
					}					
				?>
            </ul>
         </li>
         <li class='has-sub'><a href='#'>遊玩</a>
            <ul>
				<?php
					$sql = "SELECT item from site ORDER BY popular DESC";
					$result = mysql_query($sql);
					$num=0;
					while($row = mysql_fetch_array($result)){						
						echo "<li><a href='gallery.php?category=".$row['item'];
						if(isset($_GET['sort'])) echo "&sort=".$_GET['sort'];
						echo "'>".$row['item']."</a></li>";
						$num++;
						if($num==10) break;
					}
					if($num==0){
						echo "<li><a href='#'>此資料目前為空</a></li>";
					}					
				?>
            </ul>
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'>搜尋條件</a>
      <ul>
         <li class='has-sub'><a href='#'>關鍵字</a>
            <ul>
               <?php
					$sql = "SELECT item from customtag ORDER BY popular DESC";
					$result = mysql_query($sql);
					$num=0;
					while($row = mysql_fetch_array($result)){						
						echo "<li><a href='gallery.php?category=".$row['item'];
						if(isset($_GET['sort'])) echo "&sort=".$_GET['sort'];
						echo "'>".$row['item']."</a></li>";
						$num++;
						if($num==10) break;
					}
					if($num==0){
						echo "<li><a href='#'>此資料目前為空</a></li>";
					}					
				?>
            </ul>
         </li>
         <li class='has-sub'><a href='#'>旅程天數</a>
            <ul>
               <li><a href='gallery.php?category=1天<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "&sort=".$type;} ?>'>一天</a></li>
               <li><a href='gallery.php?category=2天<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "&sort=".$type;} ?>'>兩天</a></li>
               <li><a href='gallery.php?category=3天<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "&sort=".$type;} ?>'>三天</a></li>
               <li><a href='gallery.php?category=4天<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "&sort=".$type;} ?>'>四天</a></li>
               <li><a href='gallery.php?category=5天<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "&sort=".$type;} ?>'>五天</a></li>
               <li><a href='gallery.php?category=6天<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "&sort=".$type;} ?>'>六天以上</a></li>
               <li><a href='gallery.php?<?php if(isset($_GET['sort'])){$type=$_GET['sort']; echo "sort=".$type;} ?>'>無</a></li>
            </ul>
         </li>
      </ul>
   </li>
   <li><a href='makerhome.php'>Design a new map!</a></li>
   <li><a href='user.php'>My Account</a></li>
</ul>
</div>
<img src="./pics/top.gif" class="top" id="toTop">

<div class="main">
	<?php	/*呈現主題*/					
		function showTheme($row){
			$time = htmlspecialchars($row['madetime']);
			$time = substr($time,0,10);
			$json = $row['json'];
			$title = htmlspecialchars($row['title']);
			$id = htmlspecialchars($row['id']);
			$like = htmlspecialchars($row['likenum']);
			$map = htmlspecialchars($row['map']);
			$response = htmlspecialchars($row['response']);
			$sites = json_decode($json, true);
			
			/*檢查類型*/
			if(isset($_GET['category'])){
				$isType=0;
				$category=$_GET['category'];
				$sql = "SELECT tagname from tag WHERE tripplan='$id'";
				$result = mysql_query($sql);
				while($row = mysql_fetch_array($result)){
					if(false !== ($rst = strpos($row['tagname'], $category))){
						$isType=1;
						break;
					}
				}
				if(!$isType) return 0;
			}
			
			$acc=mysql_real_escape_string($row['account']);
			$sql = "SELECT username from users WHERE accountID='$acc'";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			$user = htmlspecialchars($row['username']);
			$acc = htmlspecialchars($acc);
					
			echo "<div class=\"theme\">";
			echo "<div class=\"map\" onclick=\"openTheme(".$id.")\" category=\"mapbtn\"><img src=\"./upload/map/".$map."\" class=\"map\">";
			echo "<div class=\"tripname\"><p style=\"line-height:25%; text-align:center;\">".$title."</p></div></div>";
			echo "<div class=\"sites\">";
			$day = count($sites);
			for($i=1;$i<=$day;$i++){
				$sitenum = count($sites[$i]);
				for($j=0;$j<$sitenum;$j++){
					echo "<img src=\"".$sites[$i][$j]['url']."\" title=\"".$sites[$i][$j]['site']."\" class=\"sitephoto\"/><br/>";
				}
			}
			echo "</div><div class=\"intro\">";
			echo "製作人:".$user."&nbsp;&nbsp;&nbsp;&nbsp;時間:".$time."&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "<span style=\"color:#C40000\">".$like."</span><img class=\"like\" onclick=\"likeTheme(".$id.",".$like.",0)\" src=\"./pics/like.png\">&nbsp;&nbsp;";
			echo "<span style=\"color:#009CC3\">".$response."</span><img class=\"like\" onclick=\"openTheme(".$id.")\" src=\"./pics/response.gif\"></div></div>";
			return 1;
		}
		
		$sql_1 = "SELECT account,map,title,madetime,json,likenum,response,id from tripplan";
		/*排序*/
		if(isset($_GET['sort'])){
			$sort=$_GET['sort'];
			$sql_2 = " ORDER BY ".$sort." DESC";				
		}
		else{
			$sql_2 = " ORDER BY madetime DESC";
		}
		$sql=$sql_1.$sql_2;
		$result = mysql_query($sql);
		$num=0;
		while($row = mysql_fetch_array($result)){
			$num+=showTheme($row);
		}
		if($num==0){
			echo "<p style=\"text-align:center\">查無資料</p>";
		}
	?>
</div>

</body>
 
</html>