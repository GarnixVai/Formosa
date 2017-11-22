<?php
 
$db_server = "sql112.byetcluster.com";
$db_user = "b7_16100807";
$db_passwd = "amyhsu0720";
$db_name = "b7_16100807_db";
 
if(!@mysql_connect($db_server, $db_user, $db_passwd)){
        die("無法對資料庫連線");
}
 
mysql_query("SET NAMES utf8");
 
if(!@mysql_select_db($db_name)){
        die("無法使用資料庫");
}
 
?>