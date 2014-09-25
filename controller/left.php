<?php
	//获取二级菜单
	if ( isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) {
		require '../ini.php';
		$table_pre=$conf['pre'];
		$id=$_GET['id'];
		$sql="select * from ".$table_pre.'menu where pid='.$id;
		$query=$db->query($sql);
		$res=array();
		while(($row=mysql_fetch_assoc($query))==true){
			$res[]=$row;
		}
		echo json_encode($res);
	 
	}else {
		//获取顶级栏目
		$table_pre=$conf['pre'];
		$sql="select * from ".$table_pre.'menu where pid=0';
		$query=$db->query($sql);
		$res=array();
		while($row=mysql_fetch_assoc($query)){
			$res[]=$row;
		}
		//print_r($res);die;
		$re=array();
		$pid=array();
		foreach($res as $key=>$value){
			$re[]=$value['menuname'];
			$pid[]=$value['menuid'];
		}
		
		
	}
?>