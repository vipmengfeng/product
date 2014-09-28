<?php 
	require '../../ini.php';
	require ROOT_DIR.'/check.php';
	require '../left.php';
	require ROOT_DIR."/caches/caches_common/status.php";
	$uid=$_SESSION['usernameid'];
	if(empty($_POST)){
		$sql="select * from ".$table_pre."customer where disable=1 and uid=".$uid;
		
	}else{
		
		$select=$_POST['hide'];
		if(!empty($select)){
			$sql="SELECT * FROM crm_customer WHERE uid='$uid' AND disable='1' AND ctype='$select'";
		}else{
			$sql="SELECT * FROM crm_customer WHERE uid='$uid' AND disable='1'";
		}
		
	}
	
	$r=$db->get_all($sql);
	include template("wdkh","my");
	
	
	
?>