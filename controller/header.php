<?php
		require '../ini.php';
		$time=strtotime(date("Y-m-d H:i"));
		$sql="SELECT * FROM crm_tx WHERE time='$time'";
		$re=$db->get_one($sql);
		if(!empty($re)){
			echo "OK";	
		}else{
			echo "NO";
		}
?>