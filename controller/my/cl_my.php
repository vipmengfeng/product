<?php
	require '../../ini.php';
	require '../left.php';
	if($_GET['file'] == 'fangqi'){
		$cusid=$_GET['id'];
		$name=$_GET['name'];
		//echo $name;
		$data=array(
			"disable"=>0,
		);
		$query=$db->update(" where cusid=".$cusid, "crm_customer" ,$data);
		if($query){
			//$message=$db->message('update', 'member', $name);
			//if($message){
				echo 1;
		//	}
		}else{
			echo 0;
		}
	}
	
	
?>