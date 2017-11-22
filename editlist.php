<?php
session_start();
include("mysqlInc.php");
?>

<html>
<head>
<style>
div.word{
	 float:left;
	 position:relative;
	 top:10px;
}
div.item{
	position:relative;
	width:100%;
	height:50px;
	text-align:center;
	top:5px;
	 cursor:hand;
}
div.item:hover{
	background:rgba(0,0,0,0.1);
}
</style>
<script>
function select(id){
	window.location.href = "edit.php?map="+id;
}
</script>
<meta charset="UTF-8">
</head>
<body>
<?php	/*呈現選項*/					
			function showTheme($row){
				$time = htmlspecialchars($row['madetime']);
				$title = htmlspecialchars($row['title']);
				$id = htmlspecialchars($row['id']);						
				echo "<div class=\"item\" onclick=\"select(".$id.")\">";
				echo "<div style=\"width:10%;\" class=\"word\"></div>";
				echo "<div style=\"width:10%;\" class=\"word\"></div>";
				echo "<div style=\"width:50%;\" class=\"word\">".$title."</div>";
				echo "<div style=\"width:30%;\" class=\"word\">".$time."</div></div>";
			}
			$acc = mysql_real_escape_string($_SESSION['accountID']);
			$sql = "SELECT title,madetime,id from tripplan WHERE account='$acc' ORDER BY madetime DESC";
			$result = mysql_query($sql);
			while($row = mysql_fetch_array($result)){
				showTheme($row);
			}
		?>
</body>
</html>