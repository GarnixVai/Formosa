<?php
session_start();
include("mysqlInc.php");
?>
<?php
$url = $_POST['url'];
$name = $_SESSION['picid'].'.png';
$image = file_get_contents($url); 
file_put_contents('upload/map/'.$name, $image);
?>