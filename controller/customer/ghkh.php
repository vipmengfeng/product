<?php 
	$sql="select * from ".$table_pre."customer where disable=1";
	$r=$db->get_all($sql);
	include template("ghkh","customer");
?>