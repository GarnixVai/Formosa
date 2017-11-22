<?php
session_start();
include("mysqlInc.php");
/*
if (!is_writable(session_save_path())) {
    echo 'Session path "'.session_save_path().'" is not writable for PHP!'; 
}else{
	echo "writeable".session_save_path();
}*/
?>
<?php
	$num = $_POST["num"];	
	$diff = ($_SESSION['diff']);
//	$total = $_SESSION['total']+1;
	if($num!=-1 && !isset($_SESSION[$diff]) && empty($_SESSION[$diff])) {
		//echo 'Set and not empty, and no undefined index error!';
		$_SESSION['diff'.($diff+1)] = $num;
	}
	
	$true = $_SESSION['diff'.($diff+1)];

	$string = file_get_contents('json/kaohfood.json');	
	$data = json_decode($string);
	
	
	$length= count($true);
	/*for($i=0;$i<$length;$i++){
		$obj = $data[$true[$i]];
	//	echo "  "
		echo "<table width = '600px'><tr><td style='width:40%'>";
		echo $obj->Name."</td>";			//echo "<a href='#' style='position:absolute;left:60%' onclick='list(\"$val\");return false;'>Add"."</a></td>";
		if($obj->Name)
		echo "<td  style='width:50%'><input type='time' name='usr_time1'>~<input type='time' name='usr_time'></td>";	
		echo "<td  style='width:10%'><a href='#' style='position:absolute;right:20%' onclick='Delete(\"$i\");return false;'>Delete"."</a></td></tr></table>";
		
	
	}*/
	//echo "</tr></table>";

	
?>