<?php 
header("Content-type: text/html; charset=utf-8");
	require "../../ini.php";
	require "ccaches.php";
	require '../left.php';
	     $priv=admin_priv("caches");
	if(!in_array($priv,$first_priv) && !in_array($priv,$next_priv)){
		$url="{$conf['log_out']}/controller/system/index.php";
			$content="对不起，您没有此操作的权限";
			include template("jump");
			die;
	}
	$arr=get_list(0);
	   $sqlrole="SELECT * FROM crm_role";
	    $re=$db->get_all($sqlrole);
		$role=array();
		foreach($re as $key=>$value){
			$role[$value['roleid']]=$value;
		}
	if(caches("menu",$arr,ROOT_DIR."/caches/caches_common")){
		$data['menu']="菜单缓存更新成功";
	};
	if(caches("status","",ROOT_DIR."/caches/caches_common")){
	    $data['status']="客户状态缓存更新成功";
	};
    if(caches("role",$role,ROOT_DIR."/caches/caches_common")){
		$data['role']="角色信息缓存更新成功";
	
	};
	include template("caches","system");
?>