<?php
	require 'ini.php';
	if(!empty($_GET)){
		$username=$_GET['username'];
		$userpwd=$_GET['userpwd'];
		$userpwd=md5($userpwd);
		$table_pre=$conf['pre'];
		$sql="select * from ".$table_pre.'user where username='."'".$username."'";
		$query=$db->query($sql);
		$r=mysql_fetch_assoc($query);
		if($username!=$r['username'] || $userpwd!=$r['userpwd']){
			echo 1;	
		}else{
			echo 0;	
		}
	}
	
	if(!empty($_POST)){ 
		//template('index','system');
		$username=$_POST['username2'];
		$userpwd=md5($_POST['password2']);
		$table_pre=$conf['pre'];
		$sql="select * from ".$table_pre.'user where username='."'".$username."'";
		$res=$db->get_one($sql);
		if($username==$res['username'] && $userpwd==$res['userpwd']){
			$_SESSION['usernameid']=$res['id'];
			$_SESSION['username']=$res['username'];
			require ROOT_DIR.'/controller/index.php';
		}
		
		
	}
	
	
	 
	
	
?>