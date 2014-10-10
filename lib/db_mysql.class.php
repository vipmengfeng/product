<?php
/*
	[Destoon B2B System] Copyright (c) 2008-2013 Destoon.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_MXphp') or exit('Access Denied');
class db_mysql {
/* 	 private $table;
	 private $conten_table;
	 private $dbpass;
	 private $dbname;
	 private $dbcharset;  
 */
 
	 /*
		构造函数
	 
	 */
	 function __construct(){
		global $conf;
		
		$this->connect($conf['dbhost'], $conf['dbuser'], $conf['dbpass'], $conf['dbname'], $conf['dbcharset'], $pconnect = 0);
	 	$this->select_db($conf['dbname']);
	 
	 }
	 
	 /*
		连接数据库    设置编码（默认为UTF-8）
	 */
	function connect($dbhost, $dbuser, $dbpass, $dbname, $dbcharset, $pconnect = 0) {
			
		//通过配置文件改变服务器连接方式   以应对前期的小访问量和后期的大访问量	
		$func = $pconnect == 1 ? 'mysql_pconnect' : 'mysql_connect';
		$this->connid = $func($dbhost, $dbuser, $dbpass);
		$this->query("SET NAMES '$dbcharset'");
		return $this->connid;
	}

		/*
		
		选择表
		*/
	function select_db($dbname) {
		return mysql_select_db($dbname, $this->connid);
	}

	/*
		直接执行SQL语句
	
	*/
	
	function query($sql) {	
		$query=mysql_query($sql);		
		return $query;
	}

		/*
	查找数据 单条
		$sql         "查询语句"
	*/
	
	
	function get_one($sql) {
		//小写变成大写
			$sql =  str_replace(array('select ', ' limit ','order','by','asc','desc'), array('SELECT ', ' LIMIT ','ORDER','BY','ASC','DESC'), $sql);
		//没写LIMIT的话  加上LIMIT0，1
		//echo $sql;
		if(strpos($sql, 'SELECT ') !== false && strpos($sql, ' LIMIT ') === false) $sql .= ' LIMIT 0,1';
		$query = $this->query($sql);
			if(!empty($query)){
			$r=$this->fetch_array($query);
		  $this->free_result($query);
		   }else{
			$r = "";	
		}
		return $r;
	}
	
		
	/*
	查找数据 多条
		$sql         "查询语句"
	*/
	
	function get_all($sql){
		$sql =  str_replace(array('select ', ' limit ','order','by','asc','desc'), array('SELECT ', ' LIMIT ','ORDER','BY','ASC','DESC'), $sql);
		$query=$this->query($sql);
		$r=array();
		if(!empty($query)){
			while($a=$this->fetch_array($query)){
			$r[]=$a;
		};
		  $this->free_result($query);
		 }else{
			$r = "";	
		}
		
		
		return $r;
	}
	/*
	添加数据
		$table       数据表名
		$content     添加的数据  数组形式
	
	
	*/
	
	function add($table,$content){
	
		 if(!is_array($content)){
			return false;
		}else{
		$sqlk="";
		$sqlv="";
		foreach($content as $k => $v){
				$sqlk.= ',' . $k;
                $sqlv.= ",'$v'";
		}
		
		$sqlk = substr($sqlk, 1);
        $sqlv = substr($sqlv, 1);
		$sql ="INSERT INTO $table ($sqlk) VALUES ($sqlv) ";
		if($this->query($sql)){
			return "right";
		}else{
			return "wrong";
		}
		
		}
	}
	

	/*
	删除数据
			$table       数据表名
		$condition   删的的数据  数组形式和字符串
	
	
	*/
	
	
	//返回值的怎么给？
	function del($table,$condition,$where){
	if(is_array($condition)){
		foreach($condition as $k=>$v){
			if($v != ""){
			$way .= $v.",";	
			}
			
		}
		$way = substr($way,0,-1);
		$sql="DELETE FROM $table WHERE $where in ($way)";
	}else{
	    $sql="DELETE FROM $table WHERE $where in ('$condition')";
	}
			if($this->query($sql)){
				return "ok";
			}else{
				return "no";
			}

	}
	
	/*更新数据
		$table       数据表名
		$condition   更新的数据  数组形式
	
	*/
	 function update($where="",$table,$condition){
	
	 if(!is_array($condition)){
		return false;
		}
		$sqla="";
		    $sql= "UPDATE ".$table." SET ";
			foreach($condition as $k => $v){
				
				$sqla .= ",$k='$v'";
				
			}
			$sqla = substr($sqla, 1);
			$sql .=$sqla;

			$sql .= $where;

			if($this->query($sql)){
			return "right";
		    }else{
			return "wrong";
		     }
			
	 }
	
	
	
	
	/*
	
		计算数量
		$table       数据表名
		$condition   查询的数据 
	*/
	
	function total($table, $condition = '') {
		global $DT_TIME;
		$sql = 'SELECT COUNT(*) as amount FROM '.$table;
		if($condition) $sql .= ' WHERE '.$condition;
		$r = $this->get_one($sql);
		return $r ? $r['amount'] : 0;
	}

	function fetch_array($query, $result_type = MYSQL_ASSOC) {
		return  mysql_fetch_array($query, $result_type);
	}
		
	//返回操作影响的行数   	
	function affected_rows() {
		return mysql_affected_rows($this->connid);
	}
	//针对SELECT 返回结果集的数目
	function num_rows($query) {
		return mysql_num_rows($query);
	}

	//返回字段数
	function num_fields($query) {
		return mysql_num_fields($query);
	}
	
	//获取结果中的某一个字段的值
	function result($query, $row,$filed="") {
		return @mysql_result($query, $row);
	}
	
	
	//释放变量
	function free_result($query) {
		if(is_resource($query) && get_resource_type($query) === 'mysql result') {
			return @mysql_free_result($query);
		}
	}
	//返回刚刚插入的那一条的ID号
	function insert_id() {
		return mysql_insert_id($this->connid);
	}
	
	/*
	 认为没必要 可以通过$this->array()参数 来处理
	function fetch_row($query) {
		return mysql_fetch_row($query);
	}
	*/
	
	
	
	//获取PHP版本号	
	function version() {
		return mysql_get_server_info($this->connid);
	}

	//关闭mysql_connect连接
	
	function close() {
		return mysql_close($this->connid);
	}

	function error() {
		return @mysql_error($this->connid);
	}

	function errno() {
		return intval($this->error());
	}

	
	
	/*
		析构函数
	*/
	function __destruct(){
		$this->close();
	
	}	


}
?>