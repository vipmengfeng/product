<?php
	require '../../ini.php';
	require '../left.php';
	if($_GET['file'] == 'add'){
		include template('yhgl_add','system');
	}
	
	if($_GET['file'] == 'del'){
		$ids=$_GET['id'];
		echo $ids;
	}
	
	if($_GET['file'] == 'mod'){
		$ids=$_GET['id'];
		$sql="select * from ".$table_pre."user where id=".$ids;
		$r=$db->get_one($sql);
		include template('yhgl_xiugai','system');
	}
	
	if($_GET['file'] === 'info'){
		$ids=$_GET['id'];
		$sql="select * from ".$table_pre."user where id=".$ids;
		$r=$db->get_one($sql);
		include template('yhgl_info','system');
	}
	
	if($_GET['file'] == 'adduser'){
		$info=$_POST['info'];
		$data=array(
			'username'=>$info['username'],
			'userpwd'=>md5($info['userpwd']),
			'email'=>$info['email'],
			'type'=>$info['type'], 
			'instruct'=>$info['instruct'],
		);
		
		if($db->add('crm_user',$data)){
			
			echo 1;	
			
		}else{
			echo 0;	
		}	
		//$db->message("add", "member", $data['username']);
	}
	
	if($_GET['file'] == 'moduser'){
		$info=$_POST['info'];
		$id=$_GET['id'];
		$data=array(
			'username'=>$info['name'],
			'userpwd'=>md5($info['pwd']),
			'email'=>$info['email'],
			'type'=>$info['type'], 
			'instruct'=>$info['instruct'],
		);
		if($db->update(' where id='.$id,'crm_user',$data)){
			echo 1;	
		}else{
			echo 0;	
		}	
	}
	
	if($_GET['file'] == 'extra_lock'){
		include template("extra_lock");
	}
	
	//修改个人资料
	if($_GET['file'] == 'modinfo'){
		$info=$_POST['info'];
		$uid=$_SESSION['usernameid'];
		$data=array(
			'username'=>$info['username'],
			'userpwd'=>md5($info['userpwd']),
			'email'=>$info['email'],
			'instruct'=>$info['instruct'],
		);
		if($db->update(' where id='.$uid, 'crm_user',$data)){
			echo 1;
		}else{
			echo 0;
		}
	
	}
?>