<?php
session_start();
include("mysqlInc.php");
?>
<?php

$start = ($_SESSION['start']);
$end = ($_SESSION['end']);
$init = ($_SESSION['init']);
//echo $start;
$date = new DateTime($init);
$date1 = new DateTime($start);
$date2 = new DateTime($end);
$total = round(($date2->format('U') - $date->format('U')) / (60*60*24));
$a = $_POST["a"];
	
		if($a=='left'){
			//echo "left";
			$date1->modify('-1 day');
			$days = round(($date1->format('U') - $date->format('U')) / (60*60*24));
			if($days>0 || $days==0){
				$diff = $days;
				echo "第".($diff+1)."天      ";
				$_SESSION['diff']=$diff;
				echo $date1->format('Y-m-d');
				$_SESSION['start']=$date1->format('Y-m-d');
			}else{
				$_SESSION['diff']=0;
				echo "第1天      ";
				$date1->modify('+1 day');	
				echo $date1->format('Y-m-d');				
			}
		
		}else if($a=='right'){
			$date1->modify('+1 day');
			//echo $date1->format('Y-m-d');
		//	echo $date2->format('Y-m-d');
			$days = round(($date2->format('U') - $date1->format('U')) / (60*60*24));
		//	echo "</br>".$days;
			//echo $total."|";
			//echo $days."|";
			
			if($days>0 || $days == 0){
				$diff = $total-$days;
				$_SESSION['diff']=$diff;
				echo "第".($diff+1)."天      ";
				echo $date1->format('Y-m-d');
				$_SESSION['start']=$date1->format('Y-m-d');;
			}else{
				$_SESSION['diff']=$total;
				echo "第".($total+1)."天      ";
				$date1->modify('-1 day');
				echo $date1->format('Y-m-d');
				
			}
		}
	
?>