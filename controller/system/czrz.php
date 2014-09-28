<?php 
	require '../../ini.php';
	require ROOT_DIR.'/check.php';
	require '../left.php';
	$sql="SELECT * FROM crm_logs";
	$logs=$db->get_all($sql);
	$log=back($logs);
	//print_r($log);die;
	include template("czrz","system");
?>