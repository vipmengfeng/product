<?php 
	require '../../ini.php';
	require ROOT_DIR.'/check.php';
	require '../left.php';
	$uid=$_SESSION['usernameid'];
	$sql="select * from ".$table_pre."customer where disable=1 and uid=".$uid;
	$r=$db->get_all($sql);
	include template("wdkh","my");
?>