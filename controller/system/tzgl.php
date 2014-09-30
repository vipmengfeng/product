<?php 
	require '../../ini.php';
	require '../left.php';
	require ROOT_DIR.'/check.php';
	$priv=admin_priv("czrz");
	if(!in_array($priv,$first_priv) && !in_array($priv,$next_priv)){
		$url="{$conf['log_out']}/controller/system/index.php";
		$content="对不起，您没有此操作的权限";
		include template("jump");
		die;
	}
	if(empty($_GET)){
		include template('tzgl','system');
	}
	if($_GET['file'] == 'add'){
		include template('tzgl_add','system');
	}
	
?>