<?php

	function caches($name,$arr="",$path="caches/caches_common"){
	  global $db;
		$content="";
		$content .="<?php ";
		$content .="$".$name."=array(";
	  if(empty($arr)){
		$sql="SELECT * FROM crm_caches where name='$name'";
		
		$re=$db->get_one($sql);
		$arr=unserialize($re['content']);
	}
		$content .=fora($arr);
		$content =substr($content,0,-1);
		$content .= ") ?>";
		file_put_contents($path."/".$name.".php",$content,LOCK_EX);
		return "OK";
		
		
	}	

function fora($arr){
$cache="";
	foreach($arr as $k=>$v){
		if(is_array($v)){
		   $cache .= "'$k'=>array(";
			foreach($v as $a=>$b){
				if(is_array($b)){				
			     $cache .= "'$a'=>array(";
				 $cache .=fora($b);
				 $cache =substr($cache,0,-1);
				 $cache .= "),";
				}else{
				  $cache .= "'$a'=>'$b',";
				}
			 
		    }
			$cache =substr($cache,0,-1);
			$cache .= "),";
	}else{
		$cache .= "'$k'=>'$v',";
	}	
	}
	  
           return $cache;
}









?>