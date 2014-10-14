<?php
require ROOT_DIR."/caches/caches_common/status.php";

	$sql="SELECT * FROM crm_customer ORDER BY inputtime DESC";
	$res=$db->get_all($sql);
	$sql1="SELECT * FROM crm_tx ORDER BY id DESC ";
	$tx=$db->get_all($sql1);
	$sql3="SELECT tz from crm_role WHERE roleid=' $_SESSION[mxrole]'";
	$crole=$db->get_one($sql3);
	$tz=substr($crole['tz'],0,-1);
	$sql4="SELECT * FROM crm_tz WHERE disable=1 AND id in ($tz) ORDER BY inputtime DESC ";
	$tz=$db->get_all($sql4);
	include template('index','system');
	
?>