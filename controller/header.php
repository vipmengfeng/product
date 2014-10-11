<?php
		require '../ini.php';
		if($_GET['lock'] == 'tx'){
		$time=strtotime(date("Y-m-d H:i"));
		$sql="SELECT * FROM crm_tx WHERE time='$time'";
		$re=$db->get_one($sql);
		if(!empty($re)){
			echo "OK";	
		}else{
			echo "NO";
		}
		}elseif($_GET['lock'] == 'tz'){
			$sql1="SELECT tz,role FROM crm_user WHERE id='$_SESSION[usernameid]'";
			$usermes=$db->get_one($sql1);
			if(!empty($usermes['tz'])){
			 $checkrole=explode(",",substr($usermes['tz'],0,-1));
			 $sql2="SELECT tz from crm_role WHERE roleid='$usermes[role]'";
			 $role=$db->get_one($sql2);
			 $roleid=explode(",",substr($role['tz'],0,-1));
			 $extra=array_diff($roleid,$checkrole);
			 echo empty($extra)?"OK":"NO";
			}else{
				echo "OK";
			}
	
		}
		
?>