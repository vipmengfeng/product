<?php
	require '../../ini.php';
	require ROOT_DIR.'/check.php';
	require '../left.php';
	$priv=admin_priv("yhgl");
	if(!in_array($priv,$first_priv) && !in_array($priv,$next_priv)){
		$url="{$conf['log_out']}/controller/system/index.php";
			$content="对不起，您没有此操作的权限";
			include template("jump");
			die;
	}
	$table_pre=$conf['pre'];
	$sql="select * from ".$table_pre.'user where disable=1';
	$page=$_GET['page'] ?$_GET['page']:1;
	$content=page($sql,$page);
	$res=$content['content'];
	$count=$content['count'];
	$total=$content['total'];
	$front=$content['front'];
	$next=$content['next'];
	//$res=$db->get_all($sql);
	//$page->fpage();
	include template('yhgl','system');
?>