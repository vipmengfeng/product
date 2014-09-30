<?php
require ROOT_DIR."/caches/caches_common/status.php";
//查看新添加的客户
	$sql="SELECT * FROM crm_customer ORDER BY inputtime DESC LIMIT 0,5";
	$res=$db->get_all($sql);
	$sql="SELECT * FROM crm_customer ORDER BY inputtime DESC LIMIT 5,10";
	$re=$db->get_all($sql);
	include template('index','system');
	
?>