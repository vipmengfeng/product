<?php defined('IN_MXphp') or exit('访问出错！');?><?php include template('header');?><!-- BEGIN CONTAINER --><div class="page-container row-fluid"> <!-- BEGIN SIDEBAR --> <?php include template('left');?><!-- END SIDEBAR --> <!-- BEGIN PAGE --><div class="page-content"> <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM--><div id="portlet-config" class="modal hide"><div class="modal-header"><button data-dismiss="modal" class="close" type="button"></button><h3>portlet Settings</h3></div><div class="modal-body"><p>Here will be a configuration form</p></div></div><!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM--> <!-- BEGIN PAGE CONTAINER--><div class="container-fluid"> <!-- BEGIN PAGE HEADER--><div class="row-fluid"><div class="span12"> <!-- BEGIN PAGE TITLE & BREADCRUMB--><h3 class="page-title"> Managed Tables <small>managed table samples</small> </h3><ul class="breadcrumb"><li> <i class="icon-home"></i> <a href="index.html">Home</a> <i class="icon-angle-right"></i> </li><li> <a href="#">权限管理</a> <i class="icon-angle-right"></i> </li><li><a href="#">查看角色</a></li></ul><!-- END PAGE TITLE & BREADCRUMB--> </div></div><!-- END PAGE HEADER--> <!-- BEGIN PAGE CONTENT--><div class="row-fluid"><div class="span12"> <!-- BEGIN EXAMPLE TABLE PORTLET--><div class="portlet box blue"><div class="portlet-title"><div class="caption"><i class="icon-wrench"></i>权限管理</div><div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="javascript:;" class="reload"></a> </div></div><div class="portlet-body"><div class="clearfix"> <div class="btn-group"> <a href="<?php echo $conf['log_out'];?>/controller/system/tjjs.php" class="btn blue"><i class="icon-plus"></i> 添加角色</a> </div> <div class="btn-group"> <a href="#" onclick="subform()"class="btn red"><i class="icon-trash"></i> 删除角色</a> </div> </div> <form action="<?php echo $conf['log_out'];?>/controller/system/ckjs.php" method="post" id="myform" name="myform"><table class="table table-striped table-bordered table-hover" id="sample_1"><thead><tr><th width="20" style="width:8px;"><input type="checkbox" onclick="checkall(this)" class="group-checkable" data-set="#sample_1 .checkboxes" /></th><th width="152" >角色名称</th><th width="131" class="hidden-480">角色说明</th><th width="132" >操作</th></tr></thead><tbody><?php if(is_array($role)) { foreach($role as $k => $v) { ?><tr class="odd gradeX"><td><input type="checkbox" id="select" class="checkboxes" name="roleid[]" value="<?php echo $v['roleid'];?>" /></td><td><?php echo $v['rolename'];?></td><td class="hidden-480"><?php echo $v['instruct'];?></td><td ><a href="<?php echo $conf['log_out'];?>/controller/system/tjjs.php?id=<?php echo $v['roleid'];?>" class="btn mini green">详细</a></td> </tr> <?php } } ?> </tbody></table> </form></div></div><!-- END EXAMPLE TABLE PORTLET--> </div></div><!-- END PAGE CONTENT--> </div><!-- END PAGE CONTAINER--><script type="text/javascript"> function checkall(obj){var objcheck=obj.checked;var chec=document.getElementsByName("roleid[]");var len=chec.length;for(var i=0;i<len;i++){if(objcheck == true){$(chec[i]).parent().addClass("checked");}else{$(chec[i]).parent().removeClass("checked");}}} function subform(){$("#myform").submit();}</script></div><!-- END PAGE --> </div><!-- END CONTAINER --> <!-- BEGIN FOOTER --><?php include template('footer');?>