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
	require ROOT_DIR."/caches/caches_common/status.php";

	

	$file=$_GET['file'];
	if($file == 'add'){
		$action= $_GET['action'];
		$id=$_GET['id'];
		if(!empty($id)){
			$sql="SELECT * FROM crm_customer WHERE cusid=$id";
			$val=$db->get_one($sql);
			$call=unserialize($val['callinfo']);
		}
		include template("ghkh_add","customer");
		
	}
	
	if($_GET['file'] == 'addcus'){
		if($_GET['action'] == 'xiugai'){
			$info=$_POST;
			$info['changetime']=time();
			$cusid=$_GET['id'];
			$result=$db->update(" where cusid=$cusid",'crm_customer',$info);
			if($result == 'right'){
			    logs("update","customer",$cusid);
				$sql="SELECT * FROM crm_customer WHERE cusid=$cusid";
				$res=$db->get_one($sql);
				if(!empty($res)){
					echo json_encode($res);
				}else{
					echo json_encode("nothing");
				}
				
			}else{
				echo 0;
			}
		}else if($_GET['action'] == 'jilu'){
			$info=$_POST['info'];
			$time=time();
			$call=$_POST['callinfo'];
			$cusid=$_GET['id'];
			$sql="SELECT * FROM crm_customer WHERE cusid=$cusid";
			$query=$db->get_one($sql);
			$r=$query['callinfo'];
			if(!empty($r)){
				$callinfo=array();
				$callinfo=unserialize($r);
				$callinfo[$time]=$call;
				$info['callinfo']=serialize($callinfo);
			}else{
				$callinfo=array(
					"$time"=>$call,
				);
				$info['callinfo']=serialize($callinfo);
			}
			$result=$db->update(" WHERE cusid=$cusid",'crm_customer',$info);
			if($result == 'right'){
				logs("update","phone",$cusid);
				$url="{$conf['log_out']}/controller/system/my.php";
				$content="添加成功";
				include template("jump");
			}else{
				$url="http://www.crm.com/controller/system/cl_ghkh.php?file=add&action=jilu&id=$cusid";
				$content="添加成功";
				include template("jump");
			}
		}else{
			$info=$_POST;
			$info['inputtime']=time();
			$result=$db->add('crm_customer',$info);
			if($result == 'right'){
			logs("add","customer",$info['cusname']);
				$url="{$conf['log_out']}/controller/system/ghkh.php";
				echo 1;
			}else{
				echo 0;
			}
		}
		
	}
	
	if($file == "ghkh_info"){
		$ids=$_GET['cusid'];
		$sql="select * from ".$table_pre."customer where cusid=".$ids;
		$r=$db->get_one($sql);
		include template('ghkh_info','customer');
	}
	
	if($file == "quickadd"){
		$info=array(
			'cusname'=>$_POST['cusname'],
			'cphone'=>$_POST['cphone'],
			'connecter'=>$_POST['connecter'],
			'ctype'=>$_POST['ctype'],
			
		);
		if(!empty($_POST['uid'])){
			$info['uid']=$_POST['uid'];
			$info['gettimes']=time();
		}
		$info['inputtime']=time();
		if($db->add('crm_customer',$info)){
		logs("add","customer",$info['cusname']);
				echo (1);
		}else{
				echo (0);
		}
		
		
	}
	
	if($file == "hqkh"){
		$uid=$_SESSION['usernameid'];
		$cusid=$_POST['id'];
		$data=array(
			'uid'=>$uid,
			'gettimes'=>time(),
		);	
		$sel=$_REQUEST['sel'];
		$page=$_REQUEST['page']?$_REQUEST['page']:1;
		$query=$db->update(" where cusid=".$cusid, "crm_customer" ,$data);
		if($query == 'right'){
		    logs("update","move",$cusid);
			if($sel !=""){		
				$file=array('connecter','cusname');
				$sql="SELECT * FROM ".$table_pre."customer WHERE disable=1 AND uid=0  AND (%s) ORDER BY inputtime DESC";
				$content=search($sql,$file,$page,$sel);
			}else{
				$sql="SELECT * FROM crm_customer WHERE disable=1 AND uid=0 ORDER BY inputtime DESC";
				$content=page($sql,$page);
				if(!empty($content['content'])){
					foreach($content['content'] as $k=>$v){
						$content['content'][$k]['inputtime']=date("Y-m-d H:i",$v['inputtime']);
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
	
	if($file == "hqkhs"){
		$uid=$_SESSION['usernameid'];
		$cusid=$_GET['cusid'];
		$data=array(
				'uid'=>$uid,
		);
		$query=$db->update(" where cusid=".$cusid, "crm_customer" ,$data);
		if($query == 'right'){
			logs("update","move",$cusid);
			$url="{$conf['log_out']}/controller/system/ghkh.php";
			$content="获取成功";
			include template("jump");
		}else{
			$url="{$conf['log_out']}/controller/system/ghkh.php";
			$content="获取失败";
			include template("jump");
		}
	}
	
	if($file == 'huoqu'){
		if(!empty($_POST)){
			$uid=$_SESSION['usernameid'];
			$cusid=$_POST['id'];
			$sel=$_REQUEST['sel'];
			$page=$_REQUEST['page']?$_REQUEST['page']:1;
			if(is_array($cusid)){
				foreach ($cusid as $k=>$v){
					if($v!=""){
						$str.=$v.",";
					}
				}
				$str=substr($str,0,-1);
			}else {
				$str=substr($str,1);
			}
			$data=array(
					"uid"=>$uid,
			);
			$query=$db->update(" where cusid in ($str)", "crm_customer" ,$data);
		if($query == 'right'){
		    logs("update","move",$cusid);
			if($sel !=""){		
				$file=array('connecter','cusname');
				$sql="SELECT * FROM ".$table_pre."customer WHERE disable=1 AND uid=0  AND (%s) ORDER BY inputtime DESC";
				$content=search($sql,$file,$page,$sel);
			}else{
				$sql="SELECT * FROM crm_customer WHERE disable=1 AND uid=0 ORDER BY inputtime DESC";
				$content=page($sql,$page);
				if(!empty($content['content'])){
					foreach($content['content'] as $k=>$v){
						$content['content'][$k]['inputtime']=date("Y-m-d H:i",$v['inputtime']);
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
	}
	if($file == 'del'){
		if(!empty($_POST)){
			$sel=$_REQUEST['sel'];
			$page=$_REQUEST['page']?$_REQUEST['page']:1;
			$cusid=$_POST['id'];
			if(is_array($cusid)){
				foreach ($cusid as $k=>$v){
					if($v!=""){
						$str.=$v.",";
					}
				}
				$str=substr($str,0,-1);
			}else {
				$str=substr($str,1);
			}
			$data=array(
					"disable"=>"0",
			);
			$query=$db->update(" where cusid in ($str)", "crm_customer" ,$data);
			if($query == 'right'){
				logs("update","move",$cusid);
				if($sel !=""){
					$file=array('connecter','cusname');
					$sql="SELECT * FROM ".$table_pre."customer WHERE disable=1 AND uid=0  AND (%s) ORDER BY inputtime DESC";
					$content=search($sql,$file,$page,$sel);
				}else{
					$sql="SELECT * FROM crm_customer WHERE disable=1 AND uid=0 ORDER BY inputtime DESC";
					$content=page($sql,$page);
					if(!empty($content['content'])){
						foreach($content['content'] as $k=>$v){
							$content['content'][$k]['inputtime']=date("Y-m-d H:i",$v['inputtime']);
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
	}
	
	if($_GET['file'] == 'refresh'){
		window.reload();
	}
	if($_GET['file'] == 'checkhaha'){
		$cusname=$_GET['cusname'];
		$sql="SELECT * FROM crm_customer WHERE cusname='$cusname'";
		$query=$db->get_one($sql);
		if(empty($query)){
		echo "ok";
		}else {
		echo "no";
		}
	
		}
		
	if($_GET['file'] == 'info'){
		$cusid=$_POST['id'];
		$sql="SELECT * FROM crm_customer WHERE cusid=$cusid";
		$query=$db->get_one($sql);
		if(!empty($query)){
			echo json_encode($query);
		}else{
			echo json_enocde("nothing");
		}
	}
	
	if($_GET['file'] == 'search'){
		   $sel=$_REQUEST['sel'];
		   $page=$_REQUEST['page']?$_REQUEST['page']:1;
		   $file=array('connecter','cusname');
		   $sql="SELECT * FROM ".$table_pre."customer WHERE disable=1 AND uid=0  AND (%s) ORDER BY inputtime DESC";
			$res=search($sql,$file,$page,$sel);
			if(!empty($res)){
			foreach($res['content'] as $k=>$v){
				$res['content'][$k]['inputtime']=date("Y-m-d H:i",$v['inputtime']);
			}
			
			echo json_encode($res);
		}else{
			echo json_encode("nothing");
		}
	
	}
	if($_GET['file'] == 'pages'){
		$sql="SELECT * FROM crm_customer WHERE disable=1 AND uid=0 ORDER BY inputtime DESC";
		$page=$_POST['page']?$_POST['page']:1;
		$content=page($sql,$page);
			echo json_encode($content);

	}
?>