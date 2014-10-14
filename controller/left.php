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
	
	$sql3="SELECT tz from crm_role WHERE roleid=' $_SESSION[mxrole]'";
	$crole=$db->get_one($sql3);
	$tz=substr($crole[tz],0,-1);
	
	$sql6="SELECT tz from crm_user WHERE id='$_SESSION[usernameid]'";
	$readtz=$db->get_one($sql6);
		$nread=explode(",",$tz);
		$read=explode(",",substr($readtz['tz'],0,-1));
		$weidu=array_diff($nread,$read);

		 foreach($weidu as $c=>$d){
			$tzs .=$d.",";
		 }
		$tzs=substr($tzs,0,-1);
		
		$sql4="SELECT * FROM crm_tz WHERE disable=1 AND id in ($tzs) ORDER BY inputtime DESC LIMIT 0,7";
	$sql5="SELECT count(*) AS num FROM crm_tz WHERE disable=1 AND id in ($tzs) ORDER BY inputtime DESC ";
	$number=$db->get_all($sql5);
	$hh=$db->get_all($sql4);
	$nums=$number[0]['num'];
	require ROOT_DIR."/caches/caches_common/menu.php";
?>