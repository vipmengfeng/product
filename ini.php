<?php
session_start();
define('IN_MXphp',1);
define('ROOT_DIR', str_replace("\\", '/', dirname(__FILE__)));
define('MXphp_CHMOD',1);
require ROOT_DIR.'/config/config.php';
require ROOT_DIR.'/lib/global.func.php';
require ROOT_DIR.'/lib/db_mysql.class.php';
require ROOT_DIR.'/lib/file.func.php';
/* this is a test for zend studio */
$db=new db_mysql();
$table_pre=$conf['pre'];

?>