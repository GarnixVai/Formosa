<?php
session_start();
include("mysqlInc.php");
?>
 
<?php
if(!isset($_SESSION['accountID']) && $_SESSION['accountID']==null){
    echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
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
	
<div class="register" style="top:15%;height:70%;"></div>
<div class="log" style="top:20%">
	<?php
		function showData($row){
			$accountID = htmlspecialchars($row['accountID']);
			$authority = htmlspecialchars($row['authority']);
			$username = htmlspecialchars($row['username']);
			$password = htmlspecialchars($row['password']);
			$age = htmlspecialchars($row['age']);
			$email = htmlspecialchars($row['email']);
			$photoname = htmlspecialchars($row['photoname']);
			$url="upload/"."$photoname";
			echo "<img style=\"height:100px; height:100px\" src=\"".$url."\"></br></br>"; 
			echo "<form action=\"user_admin.php\" enctype=\"multipart/form-data\" method=\"post\">";
			echo "<table style=\"margin:0 auto; text-align:center;\">";
			echo "<tr><td>帳號：</td><td>".$accountID."</td></tr>";
			echo "<tr><td>暱稱：</td><td>".$username."</td></tr>";
			echo "<tr><td>密碼(必填)：</td><td><input style=\"width:100%\" type=\"password\" name=\"old_password\" value=\"\"></td></tr>";
			echo "<tr><td>變更密碼：</td><td><input style=\"width:100%\" type=\"password\" name=\"new_password\" value=\"\"></td></tr>";
			echo "<tr><td>暱稱：</td><td><input style=\"width:100%\" type=\"text\" name=\"username\" value=\"".$username."\"></td></tr>";
			echo "<tr><td>年齡：</td><td><input style=\"width:100%\" type=\"text\" name=\"age\" value=\"".$age."\"></td></tr>";
			echo "<tr><td>電子信箱：</td><td><input style=\"width:100%\" type=\"text\" name=\"email\" value=\"".$email."\"></td></tr>";
			echo "<tr><td>照片:</td><td><input type=\"file\" name=\"uploadedfile\"/></td></tr>";
			echo "<tr style=\"height:10px\"><td colspan=\"2\"></td></tr>";
			echo "<tr><td colspan=\"2\"><input type=\"submit\" value=\"修改資料\"></td></table></form>";
		}
		$acc = mysql_real_escape_string($_SESSION['accountID']);
		$sql = "SELECT * FROM users where accountID = '$acc'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		showData($row);
	?>
	<p class="warning">
		<?php
		function upload(){
			/* 上傳程序開始 */
			if(isset($_SESSION['accountID']) && $_SESSION['accountID']!=null && isset($_FILES['uploadedfile']) && $_FILES['uploadedfile']["name"]!="" && sizeof($_FILES['uploadedfile']) > 0){	
				$upload_path = 'upload/';
				$max_size = '1000000';
				$whiteList = array('jpg', 'png');
				
				if($_FILES['uploadedfile']['error'] > 0){
					//發生錯誤
					//錯誤代碼資訊可以上php官網看:
					//http://tw.php.net/manual/en/features.file-upload.errors.php
					//echo '上傳錯誤代碼: ' . $_FILES['uploadedfile']['error'] . '<br />';
					echo '照片上傳失敗，請再嘗試一次';
					return 1;
				}
				
				//檢查檔案類型
				$extension = strtolower(end(explode(".", $_FILES['uploadedfile']["name"])));
				if(!in_array($extension, $whiteList)){
					echo '上傳的檔案類型有誤(只接受png或jpg)。';
					return 1;
				}
				
				//限制檔案大小?
				if(($max_size > 0) && ($_FILES['uploadedfile']['size'] > $max_size)){
					echo '上傳的檔案大小不可大於1MB。';
					return 1;
				}

				//檢查目錄是否存在, 不存在的話新增一個
				if(!is_dir($upload_path) && !mkdir($upload_path)){
					//目錄不存在, 無法新增資料夾
					//echo '系統無法新增資料夾';
					return 1;
				}
				
				//移動已上傳的檔案
				$newname=time(). "." .$extension;
				if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $upload_path . $newname)){			
					//檢查檔案是否已存在，若有，則刪除之
					$acc=mysql_real_escape_string($_SESSION['accountID']);
					$sql = "SELECT photoname FROM users where accountID = '$acc'";
					$result = mysql_query($sql);
					$row = mysql_fetch_array($result);
					if($row['photoname']!=""){
						unlink($upload_path . $row['photoname']);
					}
					$sql = "UPDATE users SET photoname='$newname' where accountID='$acc'";
					if(mysql_query($sql)){						
						$_SESSION['photoname'] = $newname;
						return 0;
					}
				}
				echo '照片上傳失敗，請再嘗試一次。';
				return 1;
			}
			return 0;
		}
		?>
		<?php
			/*接收使用者資料*/
			if(isset($_POST['old_password'])){
			$acc = mysql_real_escape_string($_SESSION['accountID']);
			$sql = "SELECT password FROM users where accountID = '$acc'";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			if($row['password']!=md5($_POST['old_password'])) echo "密碼有誤。</br>";
			else{
				$acc = $_SESSION['accountID'];
				if($_POST['new_password']!="") $pwd0 = md5($_POST['new_password']);
				else $pwd0 = $row['password'];
				$user0=$_POST['username'];
				$age0=$_POST['age'];
				$email0=$_POST['email'];
				
				$pwd = preg_replace("/[^A-Za-z0-9]/","",$pwd0);
				$user = preg_replace("/[^A-Za-z0-9]/","",$user0);
				$age = preg_replace("/[^0-9]/","",$age0);
				$email = preg_replace("/^[\w.+]+@(\w+\.)+(\w+)$/","",$email0);
				
				if($email0!="" && $email=="") {echo "電子信箱格式有誤。</br>";}
				else if($age0!="" && $age==""){echo "年齡格式有誤。</br>";}
				else if($user0!="" && $user==""){echo "暱稱格式有誤。</br>";}
				else if($pwd0!="" && $pwd==""){echo "新密碼格式有誤。</br>";}
				else if(strlen($pwd)>32 || strlen($user)>32){
					echo "密碼或暱稱格式有誤。</br>(長度皆須小於32個字元)</br>";
				}
				else if(upload()==0){
					$sql = "UPDATE users SET username='$user', password='$pwd', accountID='$acc', email='$email', age='$age' WHERE accountID='$acc'";
					if(mysql_query($sql)){
							echo "修改成功!</br>";
							$_SESSION['username'] = $user;
							echo '<meta http-equiv=REFRESH CONTENT=2;url=user_admin.php>';
					}
					else{
						echo "修改失敗，請再嘗試一次。</br>";
						//echo '<meta http-equiv=REFRESH CONTENT=2;url=user_admin.php>';
					}
				}
			}
		}
		?>
	</p>
</div>
</body>
</html>