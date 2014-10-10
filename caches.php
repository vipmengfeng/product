<?php 
header("Content-type: text/html; charset=utf-8");
	require "ini.php";
	require "test.php";
	$arr=get_list(0);
	   $sqlrole="SELECT * FROM crm_role";
	    $re=$db->get_all($sqlrole);
		$role=array();
		foreach($re as $key=>$value){
			$role[$value['roleid']]=$value;
		}
	caches("menu",$arr,"caches/caches_common");
	caches("status","","caches/caches_common");
    caches("role",$role,"caches/caches_common");

?>