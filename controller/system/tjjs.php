<?php
	require '../../ini.php';
	require ROOT_DIR.'/check.php';
	require '../left.php';
	if(!empty($_POST)){
	$first="";
	$next="";
	if(is_array($_POST['first_priv'])){
	foreach($_POST['first_priv'] as $v){
			$first .=$v.",";	
	}
	}
	if(is_array($_POST['next_priv'])){
	foreach($_POST['next_priv'] as $b){
			$next .=$b.",";
	}
	}
	$_POST['first_priv'] = substr($first,0,-1);
	$_POST['next_priv']= substr($next,0,-1);
	if($_GET['way'] == "add"){
	 $re=$db->add("crm_role",$_POST);
	 logs("add","role",$_POST['rolename']);
	}else{
	 $re=$db->update("WHERE id=$_GET[roleid]","crm_role",$_POST);
	 logs("update","role",$_GET['roleid']);
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