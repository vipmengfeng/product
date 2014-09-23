<?php
	require '../../ini.php';
	require '../left.php';
	
	 $id=$_GET['menuid'];
	if($id==1) {
		require 'sy.php';
	}else if($id==6){
		require 'yhgl.php';
	}else if($id==7) {
		require 'xgzl.php';
	}else if($id==8){
		require 'czrz.php';
	}else if ($id==3){
		require '../my/my.php';
	}elseif ($id==5){
		require "../customer/ghkh.php";
	}
	
?>