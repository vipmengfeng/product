<?php 
	require '../../ini.php';
	require '../left.php';
	global $table_pre,$db;
	$sql="select * from ".$table_pre."customer where disable=1 and uid=0";
	$r=$db->get_all($sql);
	include template("ghkh","customer");
?>