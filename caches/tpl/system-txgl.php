<?php defined('IN_MXphp') or exit('访问出错！');?><?php include template('header');?><!-- BEGIN CONTAINER --><div class="page-container row-fluid"> <!-- BEGIN SIDEBAR --> <?php include template('left');?><!-- END SIDEBAR --> <!-- BEGIN PAGE --><div class="page-content"> <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM--><div id="portlet-config" class="modal hide"><div class="modal-header"><button data-dismiss="modal" class="close" type="button"></button><h3>portlet Settings</h3></div><div class="modal-body"><p>Here will be a configuration form</p></div></div><!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM--> <!-- BEGIN PAGE CONTAINER--><div class="container-fluid"> <!-- BEGIN PAGE HEADER--><div class="row-fluid"><div class="span12"> <!-- BEGIN STYLE CUSTOMIZER --><!-- END BEGIN STYLE CUSTOMIZER --> <!-- BEGIN PAGE TITLE & BREADCRUMB--><h3 class="page-title"> 提醒管理 </h3><ul class="breadcrumb"><li> <i class="icon-home"></i> <a href="<?php echo $conf['log_out'];?>/controller/system/tzgl.php">提醒中心</a> <i class="icon-angle-right"></i> </li><li> <a href="javascript:void(0)">系统管理</a> <i class="icon-angle-right"></i></li><li> <a href="#">提醒管理</a> <i class="icon-angle-right"></i> </li></ul><!-- END PAGE TITLE & BREADCRUMB--> </div></div><!-- END PAGE HEADER--> <!-- BEGIN PAGE CONTENT--><div class="row-fluid"><div class="span12"> <!-- BEGIN EXAMPLE TABLE PORTLET--><div class="portlet box blue"><div class="portlet-title"><div class="caption"><i class="icon-wrench"></i>提醒管理</div><div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="javascript:;" class="reload"></a> </div></div><div class="portlet-body"><div class="clearfix"> <div class="btn-group"> <a href="<?php echo $conf['log_out'];?>/controller/system/txgl.php?file=add" class="btn blue"><i class="icon-plus"></i> 添加新提醒</a> </div> <div class="btn-group"> <a href="javascript:void(0)" onclick="dels()"class="btn red"><i class="icon-trash"></i> 删除选中项</a> </div> </div><form action="" method="post" id="myform" name="myform"><table class="table table-striped table-bordered table-hover" id="sample_1"><thead><tr><th width="20" style="width:8px;"><input type="checkbox" onclick="checkall(this)" class="group-checkable" data-set="#sample_1 .checkboxes" /></th><th width="152" >提醒标题</th><th width="131" class="hidden-480">提醒时间</th><th width="155" class="hidden-480">提醒内容</th><th width="132" >操作</th></tr></thead><tbody id="tbody"><?php if(is_array($query)) { foreach($query as $k => $v) { ?><tr class="odd gradeX"><td><input type="checkbox" id="select" class="checkboxes" name="checkbox1[]" value="<?php echo $v['id'];?>" /></td><td><?php echo $v['title'];?></td><td class="hidden-480"><?php echo date("Y-m-d H:i",$v['time']);?></td><td class="center hidden-480"><?php echo $v['content'];?></td><td ><a href="<?php echo $conf['log_out'];?>/controller/system/txgl.php?file=add&action=mod&id=<?php echo $v['id'];?>" class="btn mini blue">修改</a> <a href="<?php echo $conf['log_out'];?>/controller/system/txgl.php?file=add&action=show&id=<?php echo $v['id'];?>" class="btn mini green">详细</a> <input type="button" value="删除" title="<?php echo $v['id'];?>" onclick="del(this)" class="btn mini red" ></td> </tr> <?php } } ?> </tbody></table> </form><?php include template("page");?></div></div><!-- END EXAMPLE TABLE PORTLET--> </div></div><!-- END PAGE CONTENT--> </div><!-- END PAGE CONTAINER--><script type="text/javascript"> function checkall(obj){var objcheck=obj.checked;var chec=document.getElementsByName("checkbox1[]");var len=chec.length;for(var i=0;i<len;i++){if(objcheck == true){$(chec[i]).attr("checked","checked");$(chec[i]).parent().addClass("checked");}else{ $(chec[i]).removeAttr("checked");$(chec[i]).parent().removeClass("checked");}}} function subform(){$("#myform").submit();}function del(obj){$.ajax({type:"POST",url:"<?php echo $conf['log_out'];?>/controller/system/txgl.php?file=ajax",data:{id:obj.title},dataType: "json",success:function(data){if(data != "no"){$("#tbody").empty();}var len=data.length;var html="";for(var i=0;i<len;i++){html += "<tr class='odd gradeX'><td><input type='checkbox' id='select' class='checkboxes' name='checkbox1[]' value="+data[i].id+" /></td><td>"+data[i].title+"</td><td class='hidden-480'>"+data[i].time+"</td><td class='center hidden-480'>"+data[i].content+"</td><td ><a href='<?php echo $conf['log_out'];?>/controller/system/txgl.php?file=add&action=mod&id="+data[i].id+"' class='btn mini blue'>修改</a>&nbsp<a href='<?php echo $conf['log_out'];?>/controller/system/txgl.php?file=add&action=show&id="+data[i].id+"' class='btn mini green'>详细</a>&nbsp<input type='button' value='删除' title="+data[i].id+" onclick='del(this)' class='btn mini red' ></td></tr>";}$("#tbody").append(html);}})}function dels(){var lens=$(":checked").length;var checkbox=$(":checked");var id = new Array();for(var j=0;j<lens;j++){if(checkbox[j].value != "on"){ id[j]=checkbox[j].value;}}if(id == ""){alert("请选择你要删除的提醒");}else{$.ajax({type:"POST",url:"<?php echo $conf['log_out'];?>/controller/system/txgl.php?file=ajax",data:{id:id},dataType: "text",success:function(data){if (data =="nothing"){$("#tbody").empty();$("#tbody").append("<tr class='odd gradeX'><td colspan='5' text-align='center'>已经没有任何提示了</td></tr>");}else if(data == "no"){alert("删除失败");}else{$("#tbody").empty();var len=data.length;var html="";for(var i=0;i<len;i++){html += "<tr class='odd gradeX'><td><input type='checkbox' id='select' class='checkboxes' name='checkbox1[]' value="+data[i].id+" /></td><td>"+data[i].title+"</td><td class='hidden-480'>"+data[i].time+"</td><td class='center hidden-480'>"+data[i].content+"</td><td ><a href='<?php echo $conf['log_out'];?>/controller/system/txgl.php?file=add&action=mod&id="+data[i].id+"' class='btn mini blue'>修改</a>&nbsp<a href='<?php echo $conf['log_out'];?>/controller/system/txgl.php?file=add&action=show&id="+data[i].id+"' class='btn mini green'>详细</a>&nbsp<input type='button' value='删除' title="+data[i].id+" onclick='del(this)' class='btn mini red' ></td></tr>";}$("#tbody").append(html);}}})}} </script></div><!-- END PAGE --> </div><!-- END CONTAINER --> <!-- BEGIN FOOTER --><script type="text/javascript" src="<?php echo $conf['js'];?>/jquery.dataTables.js"></script><script type="text/javascript" src="<?php echo $conf['js'];?>/DT_bootstrap.js"></script><?php include template('footer');?>