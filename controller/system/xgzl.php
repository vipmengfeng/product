<?php
	require '../../ini.php';
	require ROOT_DIR.'/check.php';
	require '../left.php';
	$priv=admin_priv("xzzl");
	if(!in_array($priv,$first_priv) && !in_array($priv,$next_priv)){
		$url="{$conf['log_out']}/controller/system/index.php";
			$content="对不起，您没有此操作的权限";
			include template("jump");
			die;
	}
	$uid=$_SESSION['usernameid'];
	$sql="select * from ".$table_pre."user where id=".$uid;
	$query=$db->get_one($sql);
	include template('xgzl','system');
	
?>