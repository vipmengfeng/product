<?php
	require '../../ini.php';
	require '../left.php';
	if($_POST){
		$re=$db->del("crm_role",$_POST['roleid'],"roleid");
	}else{
	$sql="SELECT * FROM crm_role";
	$role=$db->get_all($sql);
	include template('ckjs','system');
	}
	
?>