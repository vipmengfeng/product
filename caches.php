<?php 
header("Content-type: text/html; charset=utf-8");
	require "ini.php";
	require "test.php";
	$arr=get_list(0);
	//print_r($arr);
	
	caches("menu",$arr,"caches/caches_common");



?>