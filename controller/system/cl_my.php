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

	

	if($_GET['file'] == 'fangqi'){
		$cusid=$_GET['id'];
		$name=$_GET['name'];
		//echo $name;
		$data=array(
			"disable"=>0,
		);
		$query=$db->update(" where cusid=".$cusid, "crm_customer" ,$data);
		if($query){
			//$logs=logs('update', 'member', $name);
			//if($logs){
				echo "<script language=\"javascript\">javascript:location.href='{$conf['log_out']}/controller/system/index.php?menuid=5'</script>";
			//}
		}else{
			echo "<script language=\"javascript\">alert('放弃失败')</script>";
		}
	}
	
	if($_GET['file'] == 'sel'){
		$select=$_POST['hide'];
		$sql="SELECT * FROM crm_customer where uid=0 and disable=1 and ctype=$select";
		$r=$db->get_all($sql);
		include template('wdkh','my');
	}
	
	if($_GET['file'] == 'mod'){
		$hidden=$_POST['hidden'];
		echo $hidden;
	}
	
?>