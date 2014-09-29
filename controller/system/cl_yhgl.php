<?php
	require '../../ini.php';
	require ROOT_DIR.'/check.php';
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
	
	if($_GET['file'] == 'info'){
		$ids=$_GET['id'];
		$sql="select * from ".$table_pre."user where id=".$ids;
		$r=$db->get_one($sql);
		include template('yhgl_info','system');
	}
	
	if($_GET['file'] == 'adduser'){
		$info=$_POST['info'];
		$info['username']=trim($info['username']);
		if($db->add('crm_user',$info)){
			$url="{$conf['log_out']}/controller/system/yhgl.php";
			$content="添加成功";
			include template("jump");
		}else{
			$url="{$conf['log_out']}/controller/system/cl_yhgl.php?file=add";
			$content="添加失败";
			include template("jump");
			
		}	
		//$db->message("add", "member", $data['username']);
	}
	
	if($_GET['file'] == 'moduser'){
		$id=$_GET['id'];
		if(empty($_POST['userpwd'])){
			$info=array(
				'phone'=>$_POST['phone'],
				'email'=>$_POST['email'],
			);
		}else{
			$info=array(
					'userpwd'=>md5($_POST['userpwd']),
					'phone'=>$_POST['phone'],
					'email'=>$_POST['email'],
			);
		}
		if($db->update(' where id='.$id,'crm_user',$info)){
			$url="{$conf['log_out']}/controller/system/yhgl.php";
			$content="修改成功";
			include template("jump");
		}else{
			$url="{$conf['log_out']}/controller/system/cl_yhgl.php?file=mod&id=$id";
			$content="修改失败";
			include template("jump");
			
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
			$url="{$conf['log_out']}/controller/system/xgzl.php?file=mod&id=$uid";
			$content="修改成功";
			include template("jump");
		}else{
			$url="{$conf['log_out']}/controller/system/xgzl.php?file=mod&id=$uid";
			$content="修改失败";
			include template("jump");
			
		}
	}
	
	//删除
	if($_GET['file'] == 'myform'){
		if(!empty($_POST)){
			$chec=$_POST['checkbox1'];
			$str=implode(",", $chec);
			$data=array(
					"disable"=>"0",
			);
			$query=$db->update(" where id in ($str)", "crm_user" ,$data);
			if($query){
				$url="{$conf['log_out']}/controller/system/yhgl.php";
				$content="删除成功";
				include template("jump");
			}else {
				$url="{$conf['log_out']}/controller/system/yhgl.php";
				$content="删除失败";
				include template("jump");
				}
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