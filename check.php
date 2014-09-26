<?php
if($_SESSION['username'] == "" || $_SESSION['usernameid'] == ""){
	include template("index");
	die;
}
?>