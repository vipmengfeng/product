<?php
	$sql="SELECT x.first_priv,x.next_priv FROM crm_role AS x LEFT JOIN crm_user AS y ON  y.role=x.roleid where y.id='$_SESSION[usernameid]'";
	$checkpriv=$db->get_one($sql);
	$menus=priv($checkpriv['first_priv'],$checkpriv['next_priv']);
	$first_priv=explode(",",$checkpriv['first_priv']);
	$next_priv=explode(",",$checkpriv['next_priv']);
	$sql2="SELECT count(*) as num FROM crm_tx WHERE ifread = 0 ";
	$sql1="SELECT * FROM crm_tx WHERE ifread = 0 LIMIT 0,7";
	$mes=$db->get_all($sql1);
	$nums=$db->get_one($sql2);
	$num=$nums['num'];
	require ROOT_DIR."/caches/caches_common/menu.php";
?>