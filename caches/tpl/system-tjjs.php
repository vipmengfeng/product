<?php defined('IN_MXphp') or exit('访问出错！');?><?php include template('header');?><!-- BEGIN 容器 --><div class="page-container"><!-- BEGIN 左侧 --><?php include template('left');?><!-- END 左侧 --><!-- BEGIN 内容页 --><div class="page-content"><!-- BEGIN 样本portlet配置模式窗体--><div id="portlet-config" class="modal hide"><div class="modal-header"><button data-dismiss="modal" class="close" type="button"></button><h3>Widget Settings</h3></div><div class="modal-body">Widget settings form goes here</div></div><!-- END 样本portlet配置模式窗体--><!-- BEGIN 内容页容器--><div class="container-fluid"><!-- BEGIN 内容页头部--><div class="row-fluid"><div class="span12"><!-- BEGIN STYLE CUSTOMIZER --><!-- BEGIN 网页的标题和面包屑--><h3 class="page-title">添加角色</h3><ul class="breadcrumb"><li><i class="icon-home"></i><a href="index.html">员工中心</a> <i class="icon-angle-right"></i></li><li><a href="#">添加角色</a></li><!-- BEGIN 日期--><li class="pull-right no-text-shadow"><div id="dashboard-report-range" class="dashboard-date-range tooltips no-tooltip-on-touch-device responsive" data-tablet="" data-desktop="tooltips" data-placement="top" data-original-title="Change dashboard date range"><i class="icon-calendar"></i><span></span><i class="icon-angle-down"></i></div></li><!-- END 日期--></ul><!-- END 网页的标题和面包屑--><!-- BEGIN 右侧页面内容--><div class="row-fluid"><div class="span12"><!-- BEGIN SAMPLE FORM PORTLET--> <div class="portlet box blue"><div class="portlet-title"><div class="caption"><i class="icon-reorder"></i>添加角色</div><div class="tools"><a href="javascript:;" class="collapse"></a><a href="javascript:;" class="reload"></a></div></div><div class="portlet-body form"><!-- BEGIN FORM--><form method="post" action="<?php echo $conf['log_out'];?>/controller/system/tjjs.php?way=<?php echo $way;?>&roleid=<?php echo $_GET['id'];?>" class="form-horizontal"><div class="control-group"><label class="control-label">角色名称</label><div class="controls"><input class="span6 m-wrap" type="text" name="rolename" value="<?php echo $role['rolename'];?>"/><span class="help-inline"></span></div></div><div class="control-group"> <label class="control-label">权限设置</label><div class="controls"><?php if(is_array($menu)) { foreach($menu as $priv) { ?><ul style="list-style:none"><li> <input class="span6 m-wrap" type="checkbox" value="<?php echo $priv['menuid'];?>" id="first_<?php echo $priv['menuid'];?>" onclick="next(this)" name="first_priv[]" <?php if($first !=""&&in_array($priv['menuid'],$first)) { ?>checked="checked" <?php } ?>/><?php echo $priv['menuname'];?> </li> <?php if(is_array($priv['next'])) { ?> <li>&nbsp;&nbsp; &nbsp;&nbsp;|- <?php if(is_array($priv['next'])) { foreach($priv['next'] as $privs) { ?><input class="span6 m-wrap" type="checkbox" value="<?php echo $privs['menuid'];?>" onclick="sel(this)" name="next_priv[]" <?php if($next !=""&&in_array($privs['menuid'],$next)) { ?>checked="checked" <?php } ?>/><?php echo $privs['menuname'];?> <?php } } ?> </li> <?php } ?> </ul> <?php } } ?> </div></div><div class="control-group"><label class="control-label">角色说明</label><div class="controls"><textarea class="span6 m-wrap" name="instruct" rows="3"><?php echo $role['instruct'];?></textarea></div></div><div class="form-actions"><button type="submit" class="btn blue">确认修改</button><button type="button" class="btn" onClick="window.location.reload('<?php echo $conf['log_out'];?>/controller/system/index.php?menuid=6');" >取消修改</button></div></form><!-- END FORM--> </div></div><!-- END SAMPLE FORM PORTLET--></div></div><!-- END 右侧页面内容--></div><!-- END 内容页头部--></div><!-- END 内容页容器--></div><!-- END 内容页 --></div><!-- END 容器 --><!-- BEGIN 底部 --><?php include template('footer');?>