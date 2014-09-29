<?php 
	require '../../ini.php';
	
	require ROOT_DIR.'/check.php';
	$priv=admin_priv("czrz");
	if(!in_array($priv,$first_priv) && !in_array($priv,$next_priv)){
		$url="{$conf['log_out']}/controller/system/index.php";
			$content="对不起，您没有此操作的权限";
			include template("jump");
			die;
	}
	require '../left.php';
	$sql="SELECT * FROM crm_logs";
	$logs=$db->get_all($sql);
	$log=back($logs);
	//print_r($log);die;
	include template("czrz","system");
?>