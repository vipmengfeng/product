<?php
	require '../../ini.php';
	require '../left.php';
	$table_pre=$conf['pre'];
	$sql="select * from ".$table_pre.'user where disable=1';
	$res=$db->get_all($sql);
	include template('yhgl','system');
?>