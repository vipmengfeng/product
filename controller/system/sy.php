<?php
require ROOT_DIR."/caches/caches_common/status.php";

	$sql="SELECT * FROM crm_customer ORDER BY inputtime DESC";
	$res=$db->get_all($sql);
	$sql1="SELECT * FROM crm_tx ORDER BY id DESC ";
	$tx=$db->get_all($sql1);
	$sql2="SELECT * FROM crm_tz ORDER BY inputtime DESC ";
	$tz=$db->get_all($sql2);
	include template('index','system');
	
?>