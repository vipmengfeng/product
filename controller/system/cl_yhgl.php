<?php
	require '../../ini.php';
	require ROOT_DIR.'/check.php';
	require '../left.php';
	require ROOT_DIR.'/caches/caches_common/role.php';
     $priv=admin_priv("yhgl");
	if(!in_array($priv,$first_priv) && !in_array($priv,$next_priv)){
		$url="{$conf['log_out']}/controller/system/index.php";
			$content="对不起，您没有此操作的权限";
			include template("jump");
			die;
	}
	if($_GET['file'] == 'add'){
		include template('yhgl_add','system');
	}
	
	if($_GET['file'] == 'mod'){
		$ids=$_GET['id'];
		$sql="select * from ".$table_pre."user where id=".$ids;
		$r=$db->get_one($sql);
		include template('yhgl_xiugai','system');
	}
	
	if($_GET['file'] == 'info'){
			
		$ids=$_GET['id'];
		$userid=$_SESSION['usernameid'];
		$sql="select * from ".$table_pre."user where id=".$ids;
		$r=$db->get_one($sql);
		$sql1="SELECT * FROM crm_logs where userid=$ids";
		$logs=$db->get_all($sql1);
		$log=back($logs);
		include template('yhgl_info','system');
	}
	
	if($_GET['file'] == 'adduser'){
		$info=$_POST;
		$info['username']=trim($_POST['username']);
		$info['userpwd']=md5($_POST['userpwd']);
		$info['inputtime']=time();

		if($db->add('crm_user',$info)){
			logs("add","member",$info['username']);
			echo 1;	
		}else{
			echo 0;
		}
		//$db->message("add", "member", $data['username']);
	}
	
	if($_GET['file'] == 'moduser'){
		$id=$_GET['id'];
		if(empty($_POST['userpwd'])){
			$info=array(
				'phone'=>$_POST['phone'],
				'email'=>$_POST['email'],
				'role'=>$_POST['role']
			);
		}else{
			$info=array(
					'userpwd'=>md5($_POST['userpwd']),
					'phone'=>$_POST['phone'],
					'email'=>$_POST['email'],
					'role'=>$_POST['role']
			);
		}
		if($db->update(' where id='.$id,'crm_user',$info)){
		    logs("update","member",$id);
		    $sql="SELECT * FROM crm_user WHERE id=$id";
		    $r=$db->get_one($sql);
		   	echo json_encode($r);
		}else{
			echo 0;
		}	
	}
	
	if($_GET['file'] == 'extra_lock'){
		include template("extra_lock");
	}
	
	//�޸ĸ�������
	if($_GET['file'] == 'modinfo'){
		$uid=$_SESSION['usernameid'];
		if(empty($_POST['userpwd'])){
			$info=array(
				'phone'=>$_POST['phone'],
				'QQ'=>$_POST['QQ'],
				'email'=>$_POST['email'],
				'instruct'=>$_POST['instruct']
			);
		}else{
			$info=array(
					'userpwd'=>md5($_POST['userpwd']),
					'phone'=>$_POST['phone'],
					'QQ'=>$_POST['QQ'],
					'email'=>$_POST['email'],
					'instruct'=>$_POST['instruct']
			);
		}
		if($db->update(' where id='.$uid, 'crm_user',$info)){
		 logs("update","change",$uid);
			$url="{$conf['log_out']}/controller/system/xgzl.php?file=mod&id=$uid";
			$sql="SELECT * FROM crm_user WHERE id=$uid";
			$r=$db->get_one($sql);
			echo json_encode($r);
		}else{
			echo 0;
		}
	}
	
	//删除
	if($_GET['file'] == 'myform'){
		if(!empty($_POST)){
			$chec=$_POST['id'];
			$str=implode(",", $chec);
			$data=array(
					"disable"=>"0",
			);
			$query=$db->update(" where id in ($str)", "crm_user" ,$data);
			if($query == 'right'){
			    logs("del","member",$chec);
				$sql="SELECT * FROM crm_user WHERE disable=1 ORDER BY inputtime DESC";
				$page=$_GET['page'] ?$_GET['page']:1;
				$content=page($sql,$page);
				$con=$content['content'];
				if(!empty($con)){
					foreach($con as $k=>$v){
						$con[$k]['role']=$role[$v['role']]['rolename'];
					}
					echo json_encode($con);
				}else{
					echo json_encode("nothing");
				}
				}else{
					echo json_encode($re);
				
				}
					
				
		}
	}
	if($_GET['file'] == 'del'){
		$id=$_POST['id'];
		$info=array(
				'disable'=>0,
		);
		$query=$db->update(" WHERE id=$id", "crm_user" ,$info);
		if($query == 'right'){
			$sql="SELECT * FROM crm_user WHERE disable=1 ORDER BY inputtime DESC";
			$page=$_GET['page'] ?$_GET['page']:1;
			$content=page($sql,$page);
			$con=$content['content'];
			if(!empty($con)){
				foreach($con as $k=>$v){
					$con[$k]['role']=$role[$v['role']]['rolename'];
				}
				echo json_encode($con);
			}else{
				echo json_encode("nothing");
			}
		}else{
			echo json_encode($re);
				
		}
	}
	if($_GET['file'] == 'checkhaha'){
		$username=$_GET['username'];
		$sql="SELECT * FROM crm_user WHERE username='$username'";	
		$query=$db->get_one($sql);
		if(empty($query)){
			echo "ok";
		}else {
			echo "no";
		}
		
	}
?>