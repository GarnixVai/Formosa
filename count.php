<?php
	$num = $_POST["num"];	
	if($num!=0){
	echo '<div id="animated-example" class="animated bounceIn" style="position:absolute;top:0%;width:30px;height:30px;background-image:url(pic/bubble.png);background-size: 100%;"><p style="font-family:cursive;font-size:20px;color:#36f;position:absolute; left:8px;top:0px">'.$num.'<p></div>';
	}else{
		echo '';
		
	}
?>