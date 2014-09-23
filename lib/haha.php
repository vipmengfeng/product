<?php
function message($way,$method,$get){
	$content=array();
	if($method == "customer"){//如果你是添加客户 就传公司的名称进来
		$sql="SELECT userid FROM crm_customer  where cusname=$get";//根据公司名称查询你刚刚添加的那条记录的id;
		$re=$db->get_one($sql);
		$content['handle']=$re['userid'];//将用户ID放入数组
	}elseif($method == "member"){//如果你是添加内部账户 就传账户名称进来
		$sql="SELECT userid FROM crm_user where username=$get";
		//根据账户名称查询你刚刚添加的那条记录的id;
		$re=$db->get_one($sql);
		$content['handle']=$re['userid'];
	}elseif($method == "position"){//如果你是更改客户所属的销售人员
		
		if(is_array($get)){//如果是多个就传进来一个数组  是ID的数组
			$content['handle']=serialize($get);
		}else{//如果是单个 就传进来一个ID即可 
			$handle=array();
			$handle[]=$get;
			$content['handle']=serialize($handle);
		}
	
	}else{//如果你是更新的个人资料
	
		$content['handle']=$_SESSION['usernameid'];//你存储的SEESION  里面的用户id的值
	
	}
	$content['way']=$way;//操作方式   add 添加   update  更新或者移动用户  del 删除用户（暂无）
	$content['method']=$method;//操作类型  member 会员   customer 用户  position 位置 own 自己
	$content['userid']=$_SESSION['userid'];//你存储的SEESION  里面的用户id的值
	$content['time']=time();//修改的时间
	$db->add("crm_logs",$content); //入库
	


}
?>