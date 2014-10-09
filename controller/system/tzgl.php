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
if(empty($_GET)){
		$sql="SELECT * FROM crm_tz WHERE disable=1";
	    $page=$_GET['page'] ?$_GET['page']:1;
	    $content=page($sql,$page);
	    $query=$content['content'];
	    $count=$content['count'];
	    $total=$content['total'];
	    $front=$content['front'];
	    $next=$content['next'];
		include template('tzgl','system');
	}
	if($_GET['file'] == 'add'){
		$id=$_GET['id'];
		$action=$_GET['action'];
		if(!empty($id)){
			$sql="SELECT * FROM crm_tz WHERE id=$id";
			$query=$db->get_one($sql);
		}
		include template('tzgl_add','system');
	}
	if($_GET['file'] == 'addtz'){
			if($_GET['action'] == 'mod'){
				$id=$_GET['id'];
				$info=$_POST['info'];
				if($db->update("WHERE id=$id","crm_tz",$info)){
				    logs("update","tz",$id);
					$url="{$conf['log_out']}/controller/system/tzgl.php";
					$content="修改成功";
					include template("jump");
				}
			}else{
				$info=$_POST['info'];
				$info['inputtime']=time();
				if($db->add("crm_tz",$info)){
				 logs("add","tz",$info['content']);
					$url="{$conf['log_out']}/controller/system/tzgl.php";
					$content="添加成功";
					include template("jump");
				}
			}
	}
	
	if($_GET['file'] == 'myform'){
		if(!empty($_POST)){
			$chec=$_POST['checkbox1'];
			$str=implode(",", $chec);
			$data=array(
					"disable"=>"0",
			);
			$query=$db->update(" where id in ($str)", "crm_tz" ,$data);
			if($query){
				logs("update","deltz",$_POST['checkbox1']);
				$url="{$conf['log_out']}/controller/system/tzgl.php";
				$content="删除成功";
				include template("jump");
			}else {
				$url="{$conf['log_out']}/controller/system/tzgl.php";
				$content="删除失败";
				include template("jump");
			}
		}
	}
?>