<?php
	$uid=$_SESSION['usernameid'];
	$sql="select * from ".$table_pre."user where id=".$uid;
	$query=$db->get_one($sql);
	include template('xgzl','system');
	
?>