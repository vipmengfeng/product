<?php 
	require '../../ini.php';
	require ROOT_DIR.'/check.php';
	require '../left.php';
	
	global $table_pre,$db;
	$sql="select * from ".$table_pre."customer where disable=1 and uid=0";
	$page=$_GET['page'] ?$_GET['page']:1;
	$content=page($sql,$page);
	$r=$content['content'];
	$count=$content['count'];
	$total=$content['total'];
	$front=$content['front'];
	$next=$content['next'];
	include template("ghkh","customer");
?>