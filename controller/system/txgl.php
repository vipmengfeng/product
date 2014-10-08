<?php 
	require '../../ini.php';
	require '../left.php';
	require ROOT_DIR.'/check.php';
	$priv=admin_priv("czrz");
	if(!in_array($priv,$first_priv) && !in_array($priv,$next_priv)){
		$url="{$conf['log_out']}/controller/system/index.php";
		$content="对不起，您没有此操作的权限";
		include template("jump");
		die;
	}
	if($_GET['file'] == "add"){
	if(!empty($_GET['id'])){
		$sql="SELECT * FROM crm_tx WHERE id = '$_GET[id]'";
		$con=$db->get_one($sql);
	}
	   include template('txgl_add','system');
	}elseif($_GET['file'] == "addtx"){
		$_POST['time']=strtotime($_POST['time']);
		$return=$db->add("crm_tx",$_POST);
		echo $return;
	}elseif($_GET['file'] == "del"){
		$id=$_GET['id'];	
		$re=$db->del("crm_tx",$id,"id");

		if($re=="ok"){
		$url="{$conf['log_out']}/controller/system/txgl.php";
		$content="删除成功";
		include template("jump");			
		}else{
		$url="{$conf['log_out']}/controller/system/txgl.php?file=add&action=show&id=$id";
		$content="删除失败";
		include template("jump");
	}
	}elseif($_GET['file'] == "ajax"){
	    $id=$_POST['id'];
		$re=$db->del("crm_tx",$id,"id");
		  if($re == "ok"){
		  $sql="SELECT * FROM crm_tx WHERE userid='$_SESSION[usernameid]' ORDER BY id DESC";
		  $page=$_GET['page'] ?$_GET['page']:1;
		  $content=page($sql,$page);
		  $con=$content['content'];
		if(!empty($con)){
		foreach($con as $k=>$v){
			$con[$k]['time']=date("Y-m-d H:i",$v['time']);
		}
	     echo json_encode($con);
		}else{
			echo "nothing";
		}
		
		}else{
			echo $re;
		
		}
		
	    
	}else{
	    $sql="SELECT * FROM crm_tx WHERE userid='$_SESSION[usernameid]' ORDER BY id DESC";
	    $page=$_GET['page'] ?$_GET['page']:1;
	    $content=page($sql,$page);
	    $query=$content['content'];
	    $count=$content['count'];
	    $total=$content['total'];
	    $front=$content['front'];
	    $next=$content['next'];
	    include template('txgl','system');
	}
		?>