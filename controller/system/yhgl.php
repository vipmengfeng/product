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
    require ROOT_DIR.'/caches/caches_common/role.php';
	$table_pre=$conf['pre'];
	$page=$_GET['page'] ?$_GET['page']:1;
	if(trim($_GET['sel']) == ""){
		$sql="SELECT * FROM ".$table_pre.'user WHERE disable=1 ORDER BY inputtime DESC';
		$content=page($sql,$page);
	}else{
		$sel=$_REQUEST['sel'];
		$page=$_REQUEST['page']?$_REQUEST['page']:1;
		$file=array('username','realname','phone','role');
		$sql="SELECT * FROM ".$table_pre."user WHERE disable=1 AND (%s) ORDER BY inputtime DESC";
		$content=search($sql,$file,$page,$sel);
	}
	$res=$content['content'];
	$count=$content['count'];
	$total=$content['total'];
	$front=$content['front'];
	$next=$content['next'];
	include template('yhgl','system');
?>