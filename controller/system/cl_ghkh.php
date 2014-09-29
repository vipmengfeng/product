<?php 
	require '../../ini.php';
	require ROOT_DIR.'/check.php';
	require '../left.php';

	require ROOT_DIR."/caches/caches_common/status.php";

	$priv=admin_priv("ghkh");
	if(!in_array($priv,$first_priv) && !in_array($priv,$next_priv)){
		echo "您没有此操作的权限";die;
	}

	$file=$_GET['file'];
	if($file == 'add'){
		$action= $_GET['action'];
		$id=$_GET['id'];
		if(!empty($id)){
			$sql="SELECT * FROM crm_customer WHERE cusid=$id";
			$val=$db->get_one($sql);
			$call=unserialize($val['callinfo']);
			//print_r($val);die;
		}
		include template("ghkh_add","customer");
		
	}
	
	if($_GET['file'] == 'addcus'){
		if($_GET['action'] == 'xiugai'){
			$info=$_POST['info'];
			$info['changetime']=time();
			$cusid=$_GET['id'];
			if($db->update(" where cusid=$cusid",'crm_customer',$info)){
				$url="{$conf['log_out']}/controller/system/my.php";
				$content="修改成功";
				include template("jump");
			}else{
				$url="{$conf['log_out']}/controller/system/ghkh.php";
				$content="修改失败";
				include template("jump");
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
			if($db->update(" WHERE cusid=$cusid",'crm_customer',$info)){
				$url="{$conf['log_out']}/controller/system/my.php";
				$content="添加成功";
				include template("jump");
			}else{
				$url="http://www.crm.com/controller/system/cl_ghkh.php?file=add&action=jilu&id=$cusid";
				$content="添加成功";
				include template("jump");
			}
		}else{
			$info=$_POST['info'];
			$info['inputtime']=time();
			if($db->add('crm_customer',$info)){
				$url="{$conf['log_out']}/controller/system/ghkh.php";
				$content="添加成功";
				include template("jump");
			}else{
				$url="{$conf['log_out']}/controller/system/cl_ghkh.php?file=add";
				$content="添加失败";
				include template("jump");
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
		$info=$_POST['info'];
		$info['inputtime']=time();
		if($db->add('crm_customer',$info)){
				$url="{$conf['log_out']}/controller/system/yhgl.php";
				$content="添加成功";
				include template("jump");
		}else{
				$url="{$conf['log_out']}/controller/system/cl_yhgl.php";
				$content="添加失败";
				include template("jump");
		}
		
		
	}
	
	if($file == "hqkh"){
		$uid=$_SESSION['usernameid'];
		$cusid=$_GET['cusid'];
		$data=array(
			'uid'=>$uid,
		);
		$query=$db->update(" where cusid=".$cusid, "crm_customer" ,$data);
		if($query){
			$url="{$conf['log_out']}/controller/system/ghkh.php";
			$content="获取成功";
			include template("jump");
		}else{
			$url="{$conf['log_out']}/controller/system/cl_ghkh.php?file=ghkh_info&cusid=$cusid";
			$content="获取失败";
			include template("jump");
		}
	}
	
	if($file == 'myform'){
		if(!empty($_POST)){
			$chec=$_POST['checkbox1'];
			$uid=$_SESSION['usernameid'];
			$str=implode(",", $chec);
			
			if($_POST['hidden'] == 'huoqu'){
				$data=array(
						"uid"=>$uid,
				);
				$query=$db->update(" where cusid in ($str)", "crm_customer" ,$data);
				if($query){
					$url="{$conf['log_out']}/controller/system/ghkh.php";
					$content="获取成功";
					include template("jump");
				}else {
					$url="{$conf['log_out']}/controller/system/ghkh.php";
					$content="获取失败";
					include template("jump");
				}
			}
			if($_POST['hidden'] == 'del'){
				$data=array(
					"disable"=>"0",
				);
				$query=$db->update(" where cusid in ($str)", "crm_customer" ,$data);
				if($query){
					$url="{$conf['log_out']}/controller/system/ghkh.php";
					$content="删除成功";
					include template("jump");
				}else {
					$url="{$conf['log_out']}/controller/system/ghkh.php";
					$content="删除失败";
					include template("jump");
				}			
			}
		
		}
	}
?>