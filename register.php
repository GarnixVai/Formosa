<?php
session_start();
include("mysqlInc.php");
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
	<div class="register" style="height:43%"></div>
	<div class="log" style="top:35%;">	
		<form action="register.php" enctype="multipart/form-data" method="post">
		<table style="margin:0 auto; text-align:center">
			<tr><td>帳號(必填)：</td><td><input type="text" name="accountID" style="width:100%"></td></tr>
			<tr><td>密碼(必填)：</td><td><input type="password" name="password" style="width:100%"></td></tr>
			<tr><td>暱稱(必填)：</td><td><input type="text" name="username" style="width:100%"></td></tr>
			<tr><td>年齡：</td><td><input type="text" name="age" style="width:100%"></td></tr>
			<tr><td>電子信箱：</td><td><input type="text" name="email" style="width:100%"></td></tr>
			<tr><td>照片:</td><td><input type="file" name="uploadedfile"/></td></tr>
			<tr style="height:10px"><td colspan="2"></td></tr>
			<tr><td colspan="2"><input type="submit" value="註冊">&nbsp;&nbsp;&nbsp;&nbsp;<img style="position:relative; top:5px; height:20px" src="./pics/help.gif" title="帳號、密碼及暱稱皆須由英文或數字組成，且長度不得超過32個字元"></td></tr>
		</table>
		</form>
		<p class="warning">
			<?php
				if(isset($_POST['accountID'])&&isset($_POST['password'])&&isset($_POST['username'])){
					$acc = $_POST['accountID'];
					$pwd = $_POST['password'];
					$user = $_POST['username'];
					$age=$_POST['age'];
					$email=$_POST['email'];
					
					$acc = preg_replace("/[^A-Za-z0-9]/","",$acc);
					$pwd = preg_replace("/[^A-Za-z0-9]/","",$pwd);	$pwd = md5($pwd);
					$user = preg_replace("/[^A-Za-z0-9]/","",$user);
					$age = preg_replace("/[^0-9]/","",$age);
					$email = preg_replace("/^[\w.+]+@(\w+\.)+(\w+)$/","",$email);
					
					if($email0!="" && $email=="") {echo "電子信箱格式有誤。</br>";}
					else if($age0!="" && $age==""){echo "年齡格式有誤。</br>";}
					else if($pwd==NULL || $user==NULL || $acc==NULL || $acc=="" || $pwd=="" || $user==""){
						echo "帳號、密碼或暱稱格式有誤。</br>(皆須由英文或數字組成)</br>";
					}
					else if(strlen($pwd)>32 || strlen($user)>32 || strlen($acc)>32){
						echo "帳號、密碼或暱稱格式有誤。</br>(長度皆須小於32個字元)</br>";
					}
					else{
						$sql = "SELECT * FROM users where accountID = '$acc'";
						$result = mysql_query($sql);
						$row = mysql_fetch_array($result);
						if($row['accountID']==$acc) {echo '此帳號已被註冊。';}
						else{
							$sql = "insert into users (username, password, accountID, email, age) values ('$user', '$pwd', '$acc', '$email', '$age')";
							if(mysql_query($sql)){
								$_SESSION['accountID'] = $acc;
								$_SESSION['username'] = $user;
								$_SESSION['photoname'] = $row['photoname'];						
								$photoname = upload();			
								$_SESSION['photoname'] = $photoname;							
								$sql = "UPDATE users SET photoname='$photoname' where accountID='$acc'";
								mysql_query($sql);
								echo "註冊成功!</br>";		
								if(!isset($_SESSION['from']) || $_SESSION['from']==0) echo '<meta http-equiv=REFRESH CONTENT=0;url=user.php>';
								else echo '<meta http-equiv=REFRESH CONTENT=0;url=makerhome.php>';
							}
							else{
								echo '註冊失敗，請再嘗試一遍。';
							}
						}
					}
				}
			?>
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
							echo '(照片上傳失敗，請至個人中心重新上傳)';
							return "user.png";
						}
						
						//檢查檔案類型
						$extension = strtolower(end(explode(".", $_FILES['uploadedfile']["name"])));
						if(!in_array($extension, $whiteList)){
							echo '(照片上傳失敗，請至個人中心重新上傳)';
							return;
						}
						
						//限制檔案大小?
						if(($max_size > 0) && ($_FILES['uploadedfile']['size'] > $max_size)){
							echo '(照片上傳失敗，請至個人中心重新上傳)';
							return "user.png";
						}

						/*檢查檔案是否已存在
						if(file_exists($upload_path . basename($_FILES['uploadedfile']['name']))){
							echo '檔案已存在';
							exit;
						}*/

						//檢查目錄是否存在, 不存在的話新增一個
						if(!is_dir($upload_path) && !mkdir($upload_path)){
							//目錄不存在, 無法新增資料夾
							echo '系統無法新增資料夾';
							return "user.png";
						}				
						
						//移動已上傳的檔案
						$newname=time(). "." .$extension;
						if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $upload_path . $newname)){
							$sql = "UPDATE users SET photoname='$newname' where accountID='$acc'";
							if(!mysql_query($sql)) echo '(照片上傳失敗，請至個人中心重新上傳)';
							else return "$newname";
						}
						else{
							echo '(照片上傳失敗，請至個人中心重新上傳)';
						}
						return "user.png";
					}
					return "user.png";
				}
			?>
		</p>
	</div>
 
</body>
</html>