<?php
	require '../../ini.php';
	require ROOT_DIR.'/check.php';
	require '../left.php';
	$priv=admin_priv("tjjs");
	if(!in_array($priv,$first_priv) && !in_array($priv,$next_priv)){
		$url="{$conf['log_out']}/controller/system/index.php";
			$content="对不起，您没有此操作的权限";
			include template("jump");
			die;
	}
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
	 if($re == "right"){
	  $content="添加成功";	
	   $url="{$conf['log_out']}/controller/system/tjjs.php";
	  include template("jump");
	  logs("add","role",$_POST['rolename']);
	 }else{
	 $content="添加失败";
	 $url="{$conf['log_out']}/controller/system/tjjs.php";
	 include template("jump");
	 }
	}else{
	 $re=$db->update("WHERE roleid=$_GET[roleid]","crm_role",$_POST);
	 if($re == "right"){
	  $content="更新成功";	
	  $url="{$conf['log_out']}/controller/system/tjjs.php";
	   include template("jump");
	    logs("update","role",$_GET['roleid']);
	 }else{
	   $content="更新失败";
	   $url="{$conf['log_out']}/controller/system/tjjs.php?id=$_GET[roleid]";
	   include template("jump");
	 }
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