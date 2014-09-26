<?php 
	require '../../caches/caches_common/status.php';
	$uid=$_SESSION['usernameid'];
	$sql="select * from ".$table_pre."customer where disable=1 and uid=".$uid;
	$r=$db->get_all($sql);
	include template("wdkh","my");
?>