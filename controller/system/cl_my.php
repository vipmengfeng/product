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
		$sel=$_REQUEST['sel'];
		$page=$_REQUEST['page']?$_REQUEST['page']:1;
		$data=array(
			"uid"=>0,
		);
		$query=$db->update(" where cusid=".$cusid, "crm_customer" ,$data);
		if($query == 'right'){
			logs("update", "give", $cusid);
			if($sel !=""){
				$file=array('connecter','cusname','cphone','cusinfo','ctype');
				$sql="SELECT * FROM ".$table_pre."customer WHERE disable=1 AND uid=$uid  AND (%s) ORDER BY inputtime DESC";
				$content=search($sql,$file,$page,$sel);
				if(!empty($content['content'])){
					foreach($content['content'] as $k=>$v){
						$content['content'][$k]['ctype']=$status[$v['ctype']];
					}
				
				}
			}else{
				$sql="SELECT * FROM crm_customer WHERE disable=1 AND uid=$uid ORDER BY inputtime DESC";
				$content=page($sql,$page);
				if(!empty($content['content'])){
					foreach($content['content'] as $k=>$v){
						$content['content'][$k]['ctype']=$status[$v['ctype']];
					}
						
				}else{
					$content = "nothing";
				}
			}
			echo json_encode($content);
		}else{
			echo json_encode("wrong");
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
	if($_GET['file'] == 'search'){
		$sel=$_REQUEST['sel'];
		$uid=$_SESSION['usernameid'];
		$page=$_REQUEST['page']?$_REQUEST['page']:1;
		$file=array('connecter','cusname','cphone','cusinfo','ctype');
		$sql="SELECT * FROM crm_customer WHERE disable=1 AND uid=$uid  AND (%s) ORDER BY inputtime DESC";
		$res=search($sql,$file,$page,$sel);
		if($res!="nothing"){
			foreach($res['content'] as $k=>$v){
				$res['content'][$k]['ctype']=$status[$k][$v['ctype']];
			}
			
			echo json_encode($res);
		}else{
			
			echo json_encode("nothing");
		}
	
	}
	
?>