<?php defined('IN_MXphp') or exit('访问出错！');?><?php include template("header");?><!-- END HEADER --><!-- BEGIN CONTAINER --><div class="page-container row-fluid"><!-- BEGIN SIDEBAR --><?php include template("left");?><!-- END SIDEBAR --><!-- BEGIN PAGE --><div class="page-content"><!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM--><div id="portlet-config" class="modal hide"><div class="modal-header"><button data-dismiss="modal" class="close" type="button"></button><h3>portlet Settings</h3></div><div class="modal-body"><p>Here will be a configuration form</p></div></div><!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM--><!-- BEGIN PAGE CONTAINER--><div class="container-fluid"><!-- BEGIN PAGE HEADER--><div class="row-fluid"><div class="span12"><!-- BEGIN STYLE CUSTOMIZER --><div class="color-panel hidden-phone"><div class="color-mode-icons icon-color"></div><div class="color-mode-icons icon-color-close"></div><div class="color-mode"> <label><span>Layout</span><select class="layout-option m-wrap small"><option value="fluid" selected>Fluid</option><option value="boxed">Boxed</option></select></label><label><span>Header</span><select class="header-option m-wrap small"><option value="fixed" selected>Fixed</option><option value="default">Default</option></select></label><label><span>Sidebar</span><select class="sidebar-option m-wrap small"><option value="fixed">Fixed</option><option value="default" selected>Default</option></select></label><label><span>Footer</span><select class="footer-option m-wrap small"><option value="fixed">Fixed</option><option value="default" selected>Default</option></select></label></div></div><!-- END BEGIN STYLE CUSTOMIZER --><!-- BEGIN PAGE TITLE & BREADCRUMB--><h3 class="page-title">Managed Tables <small>managed table samples</small></h3><ul class="breadcrumb"><li><i class="icon-home"></i><a href="index.html">Home</a> <i class="icon-angle-right"></i></li><li><a href="#">Data Tables</a><i class="icon-angle-right"></i></li><li><a href="#">Managed Tables</a></li></ul><!-- END PAGE TITLE & BREADCRUMB--></div></div><!-- END PAGE HEADER--><!-- BEGIN PAGE CONTENT--><div class="row-fluid"><div class="span12"><!-- BEGIN SAMPLE FORM PORTLET--> <div class="portlet box blue"><div class="portlet-title"><div class="caption"><i class="icon-plus"></i>添加用户</div><div class="tools"><a href="javascript:;" class="collapse"></a><a href="javascript:;" class="reload"></a></div></div><div class="portlet-body form"><!-- BEGIN FORM--><form action="<?php echo $conf['log_out'];?>/controller/customer/cl_ghkh.php?file=addcus" method="post" class="form-horizontal"><div class="control-group"><label class="control-label">公司名称</a></label><div class="controls"><input type="text" class="span6 m-wrap" name="info[cusname]" /><span class="help-inline">不得输入殊符号</span></div></div> <div class="control-group"><label class="control-label">用户名</label><div class="controls"><input class="span6 m-wrap" type="text" placeholder="<?php echo $_SESSION['username'];?>" disabled /><span class="help-inline">公司分配不可修改</span></div></div><div class="control-group"><label class="control-label">联系人</label><div class="controls"><input type="text" class="span6 m-wrap" name="info[connecter]" /></div></div><div class="control-group"><label class="control-label">联系方式</label><div class="controls"><input type="text" class="span6 m-wrap" name="info[cphone]" /></div></div><div class="control-group"><label class="control-label">公司介绍</label><div class="controls"><textarea class="span6 m-wrap" rows="3" name="info[cusinfo]"></textarea></div></div> <div class="control-group"><label class="control-label">初谈情况</label><div class="controls"><textarea class="span6 m-wrap" rows="3" name="info[condition]"></textarea></div></div> <div class="control-group"><label class="control-label">跟进状态</label><div class="controls"><select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1"><option value="">请选择</option><option value="Category 1">初次接触</option><option value="Category 2">深度开发</option><option value="Category 3">已成单</option><option value="Category 4">维护关系</option><option value="Category 4">续签客户</option></select></div></div><div class="control-group"><label class="control-label">通话记录</label><div class="controls"><label >记录1：</label> <input type="text" class="span6 m-wrap" name="info[cphone]" /></div></div><div class="form-actions"><button type="submit" class="btn blue">确认添加</button><button type="button" class="btn" onClick="window.location.reload('<?php echo $conf['log_out'];?>/controller/system/index.php?menuid=5');" >取消添加</button></div></form><!-- END FORM--> </div></div><!-- END SAMPLE FORM PORTLET--></div></div><!-- END PAGE CONTENT--></div><!-- END PAGE CONTAINER--></div><!-- END PAGE --></div><!-- END CONTAINER --><!-- BEGIN FOOTER --><?php include template("footer");?>