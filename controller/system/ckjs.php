<?php
	require '../../ini.php';
	require '../left.php';
	require ROOT_DIR.'/check.php';
	$priv=admin_priv("ckjs");
	if(!in_array($priv,$first_priv) && !in_array($priv,$next_priv)){
		$url="{$conf['log_out']}/controller/system/index.php";
			$content="对不起，您没有此操作的权限";
			include template("jump");
			die;
	}
	if($_POST){
		$role="";
	 foreach($_POST[roleid] as $v){
		$role .="'".$v."',";
	 }
		$role=substr($role,0,-1);
		$sql="SELECT rolename FROM crm_role where roleid in ($role)";
		$rolename=$db->get_all($sql);
		 $name="";
		
		 foreach($rolename as $a){
		   $name .=$a['rolename'].",";
	      }
	 $name=substr($name,0,-1);
		$re=$db->del("crm_role",$_POST['roleid'],"roleid");
		logs("del","role",$name);
	}else{
	$sql="SELECT * FROM crm_role";
	$role=$db->get_all($sql);
	include template('ckjs','system');
	}
	
?>