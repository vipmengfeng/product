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
		$cusid=$_POST['id'];
		$uid=$_SESSION['usernameid'];
		$data=array(
			"uid"=>0,
		);
		$query=$db->update(" where cusid=".$cusid, "crm_customer" ,$data);
		if($query == 'right'){
			logs("update", "give", $cusid);
			$sql="SELECT * FROM crm_customer WHERE uid=$uid ORDER BY inputtime DESC";
			$page=$_GET['page'] ?$_GET['page']:1;
			$content=page($sql,$page);
			$query=$content['content'];
			if(!empty($query)){
				foreach($query as $k=>$v){
					$query[$k]['ctype']=$status[$v['ctype']];
				}
				echo json_encode($query);
			}else{
				echo json_encode("nothing");
			}
			
		}else{
			echo 0;
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