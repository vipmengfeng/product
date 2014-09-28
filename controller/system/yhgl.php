<?php
	require '../../ini.php';
	require ROOT_DIR.'/check.php';
	//require ROOT_DIR.'/lib/page.class.php';
	require '../left.php';
	//$page=new Page();
	$table_pre=$conf['pre'];
	$sql="select * from ".$table_pre.'user where disable=1';
	$page=$_GET['page'] ?$_GET['page']:1;
	$content=page($sql,$page);
	$res=$content['content'];
	$count=$content['count'];
	$total=$content['total'];
	$front=$content['front'];
	$next=$content['next'];
	//$res=$db->get_all($sql);
	//$page->fpage();
	include template('yhgl','system');
?>