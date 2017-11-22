<?php
session_start();
include("mysqlInc.php");
if(isset($_POST['tagname']) && isset($_SESSION['editId']) && isset($_SESSION['accountID'])){
		$id = mysql_real_escape_string($_SESSION['editId']);
		$acc = mysql_real_escape_string($_SESSION['accountID']);
		$sql = "SELECT account from tripplan WHERE id=".$id;
		$result = mysql_query($sql);// or die(mysql_error())
		while($row = mysql_fetch_array($result)){
			if($row['account']==$acc){
				$tagname = $_POST['tagname'];
				$tagname = mysql_real_escape_string($tagname);
				$sql = "INSERT INTO tag (tagname,tripplan,type) VALUES ('$tagname', '$id')";
				mysql_query($sql);
				
				$sql = "SELECT popular,id from customtag WHERE item = '$tagname'";
				$result = mysql_query($sql);	
				$has=0;
				while($row = mysql_fetch_array($result)){
					$has=1;
					$popular=$row['popular']+1;
					$id=$row['id'];
					$sql = "UPDATE customtag SET popular='$popular' where id='$id'";
					mysql_query($sql);	
				}
				if($has==0){
					$sql = "INSERT INTO customtag (item) VALUES ('$tagname')";
					mysql_query($sql);	
				}
			}
		}
}
echo "<meta http-equiv=REFRESH CONTENT=0;url=user.php>";
?>