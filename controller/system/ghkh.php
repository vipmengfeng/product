<?php 
	require '../../ini.php';
	require ROOT_DIR.'/check.php';
	require '../left.php';
	$priv=admin_priv("ghkh");
	if(!in_array($priv,$first_priv) && !in_array($priv,$next_priv)){
		$url="{$conf['log_out']}/controller/system/index.php";
			$content="对不起，您没有此操作的权限";
			include template("jump");
			die;
	}
	global $table_pre,$db;
	$page=$_GET['page'] ?$_GET['page']:1;
	if(trim($_GET['sel']) == ""){
	$sql="select * from ".$table_pre."customer where disable=1 and uid=0 order by inputtime desc";
	$content=page($sql,$page);
	}else{
	    $sel=$_REQUEST['sel'];
		$page=$_REQUEST['page']?$_REQUEST['page']:1;
		$file=array('connecter','cusname');
		if(is_array($file)){
			foreach ($file as $k=>$v){
				$sqlv.=$v." LIKE '%$sel%' OR ";
			}
			}
			$sqlv=substr($sqlv,0,-3);
		   $sql="SELECT * FROM ".$table_pre."customer WHERE disable=1 AND uid=0  AND ($sqlv) ORDER BY inputtime DESC";
	$content=search($sql,$file,$page,$sel);
	}
	
	$r=$content['content'];
	$count=$content['count'];
	$total=$content['total'];
	$front=$content['front'];
	$next=$content['next'];
	$ajaxurl=$conf['log_out']."/controller/system/cl_ghkh.php?file=search";
	include template("ghkh","customer");
?>