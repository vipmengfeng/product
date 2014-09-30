<?php
	$sql="SELECT x.first_priv,x.next_priv FROM crm_role AS x LEFT JOIN crm_user AS y ON  y.role=x.roleid where y.id='$_SESSION[usernameid]'";
	$checkpriv=$db->get_one($sql);
	$menus=priv($checkpriv['first_priv'],$checkpriv['next_priv']);
	$first_priv=explode(",",$checkpriv['first_priv']);
	$next_priv=explode(",",$checkpriv['next_priv']);
	//echo "<br>";
	require ROOT_DIR."/caches/caches_common/menu.php";
	//print_r($menu);die;
?>