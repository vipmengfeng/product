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
				$sql="SELECT * FROM ".$table_pre."customer WHERE disable=1 AND uid=$uid  AND (%s) ORDER BY gettimes DESC";
				$content=search($sql,$file,$page,$sel);
				if(!empty($content['content'])){
					foreach($content['content'] as $k=>$v){
						$content['content'][$k]['ctype']=$status[$v['ctype']];
					}
				
				}
			}else{
				$sql="SELECT * FROM crm_customer WHERE disable=1 AND uid=$uid ORDER BY gettimes DESC";
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
		$uid=$_SESSION['usernameid'];
		$select=$_REQUEST['select'];
		$start=strtotime($_REQUEST['start']);
		$end=strtotime($_REQUEST['end']);
		$page=$_REQUEST['page']?$_REQUEST['page']:1;
		if($select !='' && $select !="status" ){
			$sql="SELECT * FROM crm_customer WHERE uid='$uid' AND disable='1' AND ctype=$select AND gettimes BETWEEN $start AND	$end  ORDER BY gettimes DESC";
		}else{
			$sql="SELECT * FROM crm_customer WHERE uid='$uid' AND disable='1' AND gettimes BETWEEN $start AND $end  ORDER BY gettimes DESC";
		}
		$content=page($sql,$page);
		
		if(!empty($content['content'])){
			foreach($content['content'] as $k=>$v){
				$content['content'][$k]['ctype']=$status[$v['ctype']];
			}
			$content['starttime']=$start;
			$content['endtime']=$end;
			echo json_encode($content);
		}else{
			echo json_encode("nothing");
		}
		
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
		$sql="SELECT * FROM crm_customer WHERE disable=1 AND uid=$uid  AND (%s) ORDER BY gettimes DESC";
		$res=search($sql,$file,$page,$sel);
			foreach($res['content'] as $k=>$v){
				$res['content'][$k]['ctype']=$status[$k][$v['ctype']];
			}
			echo json_encode($res);
	
	}
	
?>