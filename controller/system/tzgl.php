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
		$id=$_GET['id'];
		$action=$_GET['action'];
		if($action == "info"){
		$sel="SELECT tz from crm_user WHERE id='$_SESSION[usernameid]'";
		$read=$db->get_one($sel);
		$reads=explode(",",substr($read['tz'],0,-1));
		if(!in_array($id,$reads)){
		$read['tz'] .=$id.",";
		$db->update("WHERE id='$_SESSION[usernameid]'","crm_user",$read);
		}
		
		}
		if(!empty($id)){
		$ids="SELECT roleid from crm_tz WHERE id='$id'";
		$roleh=$db->get_one($ids);
		$roles=substr($roleh['roleid'],0,-1);
		$roles=explode(",",$roles);
			$sql="SELECT * FROM crm_tz WHERE id=$id";
			$query=$db->get_one($sql);
		}
		include template('tzgl_add','system');
	}else if($_GET['file'] == 'addtz'){
			if($_GET['action'] == 'mod'){
				$id=$_GET['id'];
				$info=$_POST;
				$info['id']=$id;
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
				}else{
					echo json_encode(0);
				}
			}else{
				$info=$_POST;
				$info['inputtime']=time();
				$query=$db->add("crm_tz",$info);
				$sqltz="SELECT max(id) AS id,roleid  FROM crm_tz WHERE title='$info[title]'";
				$tzids=$db->get_one($sqltz);
				$tzid=$tzids['id'];
				$roleid=explode(",",substr($tzids['roleid'],0,-1));
				foreach($roleid as $rk=>$rv){
				$sqlrole="SELECT tz FROM crm_role WHERE roleid='$rv'";
				$up=$db->get_one($sqlrole);
				$up['tz'] .=$tzid.",";
				$upda=$db->update("WHERE roleid='$rv'","crm_role",$up);
				}
				if($query == "right" && $upda == "right"){
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
		$sql1="SELECT tz from crm_role WHERE roleid=' $_SESSION[mxrole]'";
		$crole=$db->get_one($sql1);
		$tz=substr($crole[tz],0,-1);
		$sql2="SELECT tz from crm_user WHERE id='$_SESSION[usernameid]'";
		$readtz=$db->get_one($sql2);
		$nread=explode(",",$tz);
		$read=explode(",",substr($readtz['tz'],0,-1));
		$weidu=array_diff($nread,$read);
			$sql="SELECT * FROM crm_tz WHERE disable=1 AND id in ($tz) ORDER BY inputtime DESC";
			$page=$_GET['page'] ?$_GET['page']:1;
			$content=page($sql,$page);
			$con=$content['content'];
			if(!empty($con)){
				foreach($con as $k=>$v){
					$roleid=explode(",",substr($v['roleid'],0,-1));
				    $con[$k]['roleid']="";
					if(in_array($v['id'],$weidu)){
					 $con[$k]['title']=$v['title']."(未读)";
					}
					foreach($roleid as $key=>$val){
			        if(!empty($role[$val])){
			        $con[$k]['roleid'] .=$role[$val]['rolename'].",";
			          }
		           }	
		            $con[$k]['roleid']=substr($con[$k]['roleid'],0,-1);
					$con[$k]['inputtime']=date("Y-m-d H:i",$v['inputtime']);
					$con[$k]['role']=$role[$v['role']]['rolename'];
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
						$con[$k]['role']=$role[$v['role']]['rolename'];
					}
					echo json_encode($con);
				}else{
					echo json_encode("nothing");
				}
			}else{
					echo json_encode(0);
				
				}
			
		}
	}else{
		$sql1="SELECT tz from crm_role WHERE roleid=' $_SESSION[mxrole]'";
		$crole=$db->get_one($sql1);
		$tz=substr($crole[tz],0,-1);
		$sql="SELECT * FROM crm_tz WHERE disable=1 AND id in ($tz) ORDER BY inputtime DESC";
		$sql2="SELECT tz from crm_user WHERE id='$_SESSION[usernameid]'";
		$readtz=$db->get_one($sql2);
		$nread=explode(",",$tz);
		$read=explode(",",substr($readtz['tz'],0,-1));
		$weidu=array_diff($nread,$read);
		$page=$_GET['page'] ?$_GET['page']:1;
		$content=page($sql,$page);

		$query=$content['content'];
			foreach($query as $k=>$v){
		$roleid=explode(",",substr($v['roleid'],0,-1));
				    $query[$k]['roleid']="";
		foreach($roleid as $key=>$val){

			if(!empty($role[$val])){
			$query[$k]['roleid'] .=$role[$val]['rolename'].",";
			}
		}	
		$query[$k]['roleid']=substr($query[$k]['roleid'],0,-1);
		}
		$count=$content['count'];
		$total=$content['total'];
		$front=$content['front'];
		$next=$content['next'];
		include template('tzgl','system');
	}
?>