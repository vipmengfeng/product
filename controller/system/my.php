<?php 
	require '../../ini.php';
	require ROOT_DIR.'/check.php';
	require '../left.php';
	$priv=admin_priv("my");
	if(!in_array($priv,$first_priv) && !in_array($priv,$next_priv)){
		$url="{$conf['log_out']}/controller/system/index.php";
			$content="对不起，您没有此操作的权限";
			include template("jump");
			die;
	}
	require ROOT_DIR."/caches/caches_common/status.php";
	$uid=$_SESSION['usernameid'];
	if(empty($_POST)){
		$page=$_GET['page'] ?$_GET['page']:1;
		if(trim($_GET['sel']) == ""){
		$sql="select * from ".$table_pre."customer where disable=1 and uid=$uid order by inputtime desc";
		$content=page($sql,$page);
		}else{
			
		    $sel=$_REQUEST['sel'];
			$page=$_REQUEST['page']?$_REQUEST['page']:1;
			$file=array('connecter','cusname','cphone','cusinfo','ctype');	
			   $sql="SELECT * FROM ".$table_pre."customer WHERE disable=1 AND uid=$uid  AND (%s) ORDER BY inputtime DESC";
			   
		        $content=search($sql,$file,$page,$sel);
		}
	}else{
		$select=$_POST['hide'];
		if($select !='' && $select !="status"){
			$sql="SELECT * FROM crm_customer WHERE uid='$uid' AND disable='1' AND ctype='$select'";
		}else{
			$sql="SELECT * FROM crm_customer WHERE uid='$uid' AND disable='1'";
		}
		$page=$_GET['page'] ?$_GET['page']:1;
		$content=page($sql,$page);
	}
	
	$r=$content['content'];
	$count=$content['count'];
	$total=$content['total'];
	$front=$content['front'];
	$next=$content['next'];
	include template("wdkh","my");
	
	
	
?>