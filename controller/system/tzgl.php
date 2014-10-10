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
	if($_GET['file'] == 'add'){
		$id=$_GET['id'];
		$action=$_GET['action'];
		if(!empty($id)){
			$sql="SELECT * FROM crm_tz WHERE id=$id";
			$query=$db->get_one($sql);
		}
		include template('tzgl_add','system');
	}else if($_GET['file'] == 'addtz'){
			if($_GET['action'] == 'mod'){
				$id=$_POST['id'];
				$info=$_POST;
				$query=$db->update("WHERE id=$id","crm_tz",$info);
				if($query == 'right'){
				    logs("update","tz",$id);
					$sql="SELECT * FROM crm_tz WHERE id=$id ORDER BY inputtime DESC";
					$re=$db->get_one($sql);
					if(!empty($re)){
						echo json_encode($re);
					}else{
						echo json_encode(0);
					}
					
				}
			}else{
				$info=$_POST;
				$info['inputtime']=time();
				$query=$db->add("crm_tz",$info);
				if($query == "right"){
				 logs("add","tz",$info['content']);
				 echo json_encode(1);
				}else{
					echo 0;
				}
			}
	}else if($_GET['file'] == 'del'){
		$id=$_POST['id'];
		$info=array(
			'disable'=>0,
		);
		$query=$db->update(" WHERE id=$id", "crm_tz" ,$info);
		if($query == 'right'){
			$sql="SELECT * FROM crm_tz WHERE disable=1 ORDER BY inputtime DESC";
			$page=$_GET['page'] ?$_GET['page']:1;
			$content=page($sql,$page);
			$con=$content['content'];
			if(!empty($con)){
				foreach($con as $k=>$v){
					$con[$k]['inputtime']=date("Y-m-d H:i",$v['inputtime']);
				}
				echo json_encode($con);
			}else{
				echo json_encode("nothing");
			}
			}else{
				echo json_encode($re);
			
			}
		
	}else if($_GET['file'] == 'ajax'){
		if(!empty($_POST)){
			$chec=$_POST['id'];
			$st=implode(",", $chec);
			$str=substr($st,1);
			$data=array(
					"disable"=>"0",
			);
			$query=$db->update(" where id in ($str)", "crm_tz" ,$data);

			if($query == "right"){
				logs("update","deltz",$_POST['checkbox1']);
				$sql="SELECT * FROM crm_tz WHERE disable=1 ORDER BY inputtime DESC";
				$page=$_GET['page'] ?$_GET['page']:1;
				$content=page($sql,$page);
				$con=$content['content'];
				if(!empty($con)){
					foreach($con as $k=>$v){
						$con[$k]['inputtime']=date("Y-m-d H:i",$v['inputtime']);
					}
					echo json_encode($con);
				}else{
					echo json_encode("nothing");
				}
				}else{
					echo json_encode($re);
				
				}
			
			}
	}else{
		$sql="SELECT * FROM crm_tz WHERE disable=1 ORDER BY inputtime DESC";
		$page=$_GET['page'] ?$_GET['page']:1;
		$content=page($sql,$page);
		$query=$content['content'];
		$count=$content['count'];
		$total=$content['total'];
		$front=$content['front'];
		$next=$content['next'];
		include template('tzgl','system');
	}
?>