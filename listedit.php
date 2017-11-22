<?php
session_start();
include("mysqlInc.php");
?>
<?php
	$num = $_POST["num"];	
	$diff = $_POST["day"];	
	$_SESSION['diff'.($diff)] = $num;
	$true = $_SESSION['diff'.($diff)];
	echo "</br>".$num.'+"what"+'.$diff;
	$length = count($true);
	for($i=0;$i<$length;$i++){
		echo $true[$i]."</br>";
	}
	
?>