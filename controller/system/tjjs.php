<?php
	require '../../ini.php';
	require ROOT_DIR.'/check.php';
	require '../left.php';
	if(!empty($_POST)){
	$first="";
	$next="";
		foreach($_POST['first_priv'] as $v){
			$first .=$v.",";	
	}
	foreach($_POST['next_priv'] as $b){
			$next .=$b.",";
	}
	$_POST['first_priv'] = substr($first,0,-1);
	$_POST['next_priv']= substr($next,0,-1);
	if($_GET['way'] == "add"){
	$re=$db->add("crm_role",$_POST);
	}else{
	$re=$db->update("WHERE id=$_GET[roleid]","crm_role",$_POST);
	}
			
	}elseif($_GET['id']){
		$sql="SELECT * FROM crm_role WHERE roleid='$_GET[id]'";
		$role=$db->get_one($sql);
		$way="update";
		$first=explode(",",$role['first_priv']);
		$next=explode(",",$role['next_priv']);
		include template('tjjs','system');
	}else{
		$way="add";
	 include template('tjjs','system');

	}
?>	