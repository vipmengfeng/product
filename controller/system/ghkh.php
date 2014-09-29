<?php 
	require '../../ini.php';
	require ROOT_DIR.'/check.php';
	require '../left.php';
	$priv=admin_priv("ghkh");
	if(!in_array($priv,$first_priv) && !in_array($priv,$next_priv)){
		$url="{$conf['log_out']}/controller/system/index.php";
			$content="对不起，您没有此操作的权限";
			include template("jump");
			die;
	}
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