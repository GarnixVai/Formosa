<?php
session_start();
include("mysqlInc.php");
?>
<?php
if(isset($_SESSION['accountID']) && $_SESSION['accountID']!=null){ // 如果登入過，則直接轉到登入後頁面
    if(!isset($_SESSION['from']) || $_SESSION['from']==0) echo '<meta http-equiv=REFRESH CONTENT=0;url=user.php>';
	else echo '<meta http-equiv=REFRESH CONTENT=0;url=makerhome.php>';
}
?>
 
<html>
<head>
	<title>漫遊formosa</title>
	<meta charset="UTF-8">
	<link rel=stylesheet type="text/css" href="formosa.css">
	<script type="text/javascript" src="formosa.js"></script>
</head>
<body class="user">
	<div onclick="goTo(4)" style="cursor:hand;"><img class="title" src="./pics/title.gif"></div>
	<div class="register" style="height:30%;"></div>
	<div class="log">
		<form action="login.php" method="post">
			帳號：<input type="text" name="account"><br/>
			密碼：<input type="password" name="password"><br/>
			<input type="submit" value="登入">&nbsp;&nbsp;&nbsp;&nbsp;<a href="register.php">註冊</a></br>
		</form>
		<p class="warning">
		<?php
			if(isset($_POST['account'])&&isset($_POST['password'])){
				$acc = $_POST['account'];
				$pwd = $_POST['password'];
				$acc = preg_replace("/[^A-Za-z0-9]/","",$acc);
				$pwd = preg_replace("/[^A-Za-z0-9]/","",$pwd);
				if($acc!=NULL && $pwd!=NULL){
					$sql = "SELECT * FROM users where accountID = '$acc'";
					$result = mysql_query($sql);
					$row = mysql_fetch_array($result);
					if($row['accountID']!=$acc)	echo "此帳號不存在。</br>";
					else if($row['password']==md5($pwd)){
						$_SESSION['accountID'] = $row['accountID'];
						$_SESSION['username'] = $row['username'];
						$_SESSION['photoname'] = $row['photoname'];
						if(!isset($_SESSION['from']) || $_SESSION['from']==0) echo '<meta http-equiv=REFRESH CONTENT=0;url=user.php>';
						else echo '<meta http-equiv=REFRESH CONTENT=0;url=makerhome.php>';
					}
					else echo "密碼有誤。</br>";
				}
				else echo "帳號或密碼格式有誤。</br>";
			}
		?>
		</p>
	</div>
</body>
</html>