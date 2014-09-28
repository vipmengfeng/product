<?php 
	require '../../ini.php';
	require ROOT_DIR.'/check.php';
	require '../left.php';
	$priv=admin_priv("ghkh");
	if(!in_array($priv,$first_priv) && !in_array($priv,$next_priv)){
		echo "您没有此操作的权限";die;
	}
	$file=$_GET['file'];
	if($file == 'add'){
		include template("ghkh_add","customer");
	}
	
	if($_GET['file'] == 'addcus'){
		$info=$_POST['info'];
		$data=array(
			'cusname'=>$info['cusname'],
			'connecter'=>$info['connecter'],
			'cphone'=>$info['cphone'],
			'ctype'=>$info['cprocess'], 
			'cusinfo'=>$info['cusinfo'],
			'conditions'=>$info['condition'],
			'inputtime'=>time(),
		);
		if($db->add('crm_customer',$data)){
			echo 1;	
		}else{
			echo 0;	
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
		$data=array(
			'uname'=>$info['uname'],
			'cphone'=>$info['cphone'],
			'cusname'=>$info['cusname'],
			'ctype'=>$info['ctype'], 
		);
		if($db->add('crm_customer',$data)){
			echo 1;	
		}else{
			echo 0;	
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
			echo 1;
		}else{
			echo 0;
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
					echo 1;
				}else {
					echo 0;
				}
			}
			if($_POST['hidden'] == 'del'){
				$data=array(
					"disable"=>"0",
				);
				$query=$db->update(" where cusid in ($str)", "crm_customer" ,$data);
				if($query){
					echo 1;
				}else {
					echo 0;
				}			
			}
		
		}
	}
?>