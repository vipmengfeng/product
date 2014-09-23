<?php
	$table_pre=$conf['pre'];
	$sql="select * from ".$table_pre.'user';
	$query=mysql_query($sql);
	$res=array();
		while($row=mysql_fetch_assoc($query)){
			$res[]=$row;
		}
	include template('yhgl','system');
?>