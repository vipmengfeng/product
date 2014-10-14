<?php 
	require '../../ini.php';
	require '../left.php';
	require ROOT_DIR.'/check.php';
	require ROOT_DIR.'/caches/caches_common/role.php';
	$priv=admin_priv("tzgl");
	if(!in_array($priv,$first_priv) && !in_array($priv,$next_priv)){
		$url="{$conf['log_out']}/controller/system/index.php";
		$content="对不起，您没有此操作的权限";
		include template("jump");
		die;
	}
	if($_GET['file'] == 'add'){
		if(!empty($_GET['id'])){
			$action=$_GET['action'];
			$sql="SELECT * FROM crm_rz WHERE rid = '$_GET[id]'";
			$con=$db->get_one($sql);
		}
		include template("gzrz_add","worklog");
	}else if($_GET['file'] == 'addrz'){
		if($_GET['action'] == 'mod'){
			$return=$db->update(" WHERE rid = '$_GET[id]'","crm_rz",$_POST);
			if($return == "right"){
				echo "mod";
			}else{
				echo "wmod";
			}
		}else{
			$_POST['inputtime']=time();
			$_POST['userid']=$_SESSION['usernameid'];
			$return=$db->add("crm_rz",$_POST);
			if($return == "right"){
				$url="{$conf['log_out']}/controller/system/gzrz.php";
				$content="添加成功";
				include template("jump");
			}else{
				$url="{$conf['log_out']}/controller/system/gzrz.php?file=add";
				$content="添加失败";
				include template("jump");
			}
		}
	}elseif($_GET['file'] == "del"){
		$id=$_POST['id'];
		$info=array(
			'disable'=>"0",
		);
		$re=$db->update(" WHERE rid=$id", "crm_rz" ,$info);
		if($re=="right"){
			$sql="SELECT * FROM crm_rz WHERE disable=1 AND userid = '$_SESSION[usernameid]' ORDER BY inputtime DESC";
			$page=$_GET['page'] ?$_GET['page']:1;
			$content=page($sql,$page);
			$query=$content['content'];
			if(!empty($query)){
				foreach ($query as $k=>$v){
					$query[$k]['inputtime']=date("Y-m-d H:i",$v['inputtime']);
				}
				echo json_encode($query);
			}else{
				echo json_encode("nothing");
			}	
		}else{
			echo "wrong";
		}
	}else if($_GET['file'] == "ajax"){
	    $chec=$_POST['id'];
	    if(is_array($chec)){
	    	foreach ($chec as $k=>$v){
	    		if($v!=""){
	    			$str.=$v.",";
	    		}
	    	}
	    	$str=substr($str,0,-1);
	    }else {
	    	$str=substr($str,1);
	    }
		$info=array(
			'disable'=>"0",
		);
		$re=$db->update(" WHERE rid in($str)", "crm_rz" ,$info);
		  if($re == "right"){
		  $sql="SELECT * FROM crm_rz WHERE userid='$_SESSION[usernameid]' AND disable=1 ORDER BY inputtime DESC";
		  $page=$_GET['page'] ?$_GET['page']:1;
		  $content=page($sql,$page);
		  $con=$content['content'];
		if(!empty($con)){
		foreach($con as $k=>$v){
			$con[$k]['time']=date("Y-m-d H:i",$v['time']);
		}
	     echo json_encode($con);
		}else{
			echo json_encode("nothing");
		}
		}else{
			echo json_encode($re);
		
		}
	}else{
		$sql="SELECT * FROM crm_rz WHERE disable=1 AND userid='$_SESSION[usernameid]' ORDER BY	inputtime DESC";
		$page=$_GET['page'] ?$_GET['page']:1;
		$content=page($sql,$page);
		$query=$content['content'];
		$count=$content['count'];
		$total=$content['total'];
		$front=$content['front'];
		$next=$content['next'];
		include template("gzrz","worklog");
	}
?>