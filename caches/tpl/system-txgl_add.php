<?php defined('IN_MXphp') or exit('访问出错！');?><?php include template('header');?> <!-- END HEADER --> <!-- BEGIN CONTAINER --><div class="page-container row-fluid"> <!-- BEGIN SIDEBAR --> <?php include template('left');?> <!-- END SIDEBAR --> <!-- BEGIN PAGE --><div class="page-content"> <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM--><div id="portlet-config" class="modal hide"><div class="modal-header"><button data-dismiss="modal" class="close" type="button"></button><h3>portlet Settings</h3></div><div class="modal-body"><p>Here will be a configuration form</p></div></div><!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM--> <!-- BEGIN PAGE CONTAINER--><div class="container-fluid"> <!-- BEGIN PAGE HEADER--><div class="row-fluid"><div class="span12"> <!-- BEGIN STYLE CUSTOMIZER --><!-- END BEGIN STYLE CUSTOMIZER --> <!-- BEGIN PAGE TITLE & BREADCRUMB--><h3 class="page-title">提醒管理 </h3><ul class="breadcrumb"> <li> <i class="icon-home"></i> <a href="<?php echo $conf['log_out'];?>/controller/system/txgl.php">提醒中心</a> <i class="icon-angle-right"></i> </li> <li> <a href=""><?php if($_GET['action']=='mod') { ?>修改提醒<?php } else if($_GET['action']=='show') { ?>提醒详细<?php } else { ?>添加新提醒<?php } ?></a></li></ul><!-- END PAGE TITLE & BREADCRUMB--> </div></div><!-- END PAGE HEADER--> <!-- BEGIN PAGE CONTENT--><?php include template("tishi");?><div class="row-fluid"><div class="span12"> <!-- BEGIN SAMPLE FORM PORTLET--><div class="portlet box blue"><div class="portlet-title"> <div class="caption"><i class="icon-plus"></i><?php if($_GET['action']=='mod') { ?>修改提醒<?php } else if($_GET['action']=='info') { ?>提醒详细<?php } else { ?>添加新提醒<?php } ?></div><div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="javascript:;" class="reload"></a> </div></div><div class="portlet-body form"> <!-- BEGIN FORM--> <form action=" method="post" class="form-horizontal" id="myform"><div class="control-group"><label class="control-label">提醒标题</label><div class="controls"><?php if($_GET['action'] == 'show') { ?><span class="help-inline"><?php echo $con['title'];?></span><?php } else { ?><input type="text" class="span6 m-wrap" name="title" value="<?php echo $con['title'];?>" id="txtitle"/><?php } ?></div></div><?php if($_GET['action'] == 'show') { ?> <input type="hidden" value="<?php echo $con['userid'];?>" id="txid" name="userid"/><?php } else { ?><input type="hidden" value="<?php echo $_SESSION['usernameid'];?>" id="txid" name="time"/><?php } ?> <div class="control-group"><label class="control-label">提醒时间</label><div class="controls"><?php if($_GET['action'] == 'show') { ?><span class="help-inline"><?php echo date('Y/m/d H:i',$con['time']);?></span><?php } else { ?><input type="text" value="<?php echo date('Y/m/d H:i');?>" id="datetimepicker" name="time"/><?php } ?></div></div><div class="control-group"><label class="control-label">提醒内容</label><div class="controls"><?php if($_GET['action'] == 'show') { ?><span class="help-inline"><?php echo $con['content'];?></span><?php } else { ?><textarea class="span6 m-wrap" name="content" rows="3" value="" id="txcontent"><?php echo $con['content'];?></textarea><?php } ?></div></div> <div class="form-actions"> <?php if($_GET['action']=='' || $_GET['action']=='mod') { ?><button type="button" class="btn blue" onclick="subm()">确认</button><button type="reset" class="btn">取消</button><?php } else { ?><a class="btn blue" href="<?php echo $conf['log_out'];?>/controller/system/txgl.php?file=add&action=mod&id=<?php echo $con['id'];?>">修改</a> <a class="btn red" href="<?php echo $conf['log_out'];?>/controller/system/txgl.php?file=del&id=<?php echo $con['id'];?>">删除</a><?php } ?></div></form><!-- END FORM--> </div></div><!-- END SAMPLE FORM PORTLET--> </div></div><!-- END PAGE CONTENT--> </div><!-- END PAGE CONTAINER--> </div><!-- END PAGE --> </div><script type="text/javascript" src="<?php echo $conf['js'];?>/register.js"></script><script>function subm(){var title=$("#txtitle").val();var time=$("#datetimepicker").val();var content=$("#txcontent").val();var id=$("#txid").val();$.ajax({type:"POST",url:"<?php echo $conf['log_out'];?>/controller/system/txgl.php?file=addtx",data:{title:title,time:time,content:content,userid:id},dataType: "text",success:function(data){if(data == "right"){$('#myform')[0].reset(); }else{alert(添加失败);}}})}$('#datetimepicker10').datetimepicker({step:5,inline:true});$('#datetimepicker_mask').datetimepicker({mask:'9999/19/39 29:59'});$('#datetimepicker').datetimepicker();$('#datetimepicker').datetimepicker({value:"<?php echo date('Y/m/d H:i');?>",step:10});$('#datetimepicker1').datetimepicker({datepicker:false,format:'H:i',step:5});$('#datetimepicker2').datetimepicker({yearOffset:222,lang:'ch',timepicker:false,format:'d/m/Y',formatDate:'Y/m/d',minDate:'-1970/01/02', maxDate:'+1970/01/02'});$('#datetimepicker3').datetimepicker({inline:true});$('#datetimepicker4').datetimepicker();$('#open').click(function(){$('#datetimepicker4').datetimepicker('show');});$('#close').click(function(){$('#datetimepicker4').datetimepicker('hide');});$('#reset').click(function(){$('#datetimepicker4').datetimepicker('reset');});$('#datetimepicker5').datetimepicker({datepicker:false,allowTimes:['12:00','13:00','15:00','17:00','17:05','17:20','19:00','20:00']});$('#datetimepicker6').datetimepicker();$('#destroy').click(function(){if( $('#datetimepicker6').data('xdsoft_datetimepicker') ){$('#datetimepicker6').datetimepicker('destroy');this.value = 'create';}else{$('#datetimepicker6').datetimepicker();this.value = 'destroy';}});var logic = function( currentDateTime ){if( currentDateTime.getDay()==6 ){this.setOptions({minTime:'11:00'});}elsethis.setOptions({minTime:'8:00'});};$('#datetimepicker7').datetimepicker({onChangeDateTime:logic,onShow:logic});$('#datetimepicker8').datetimepicker({onGenerate:function( ct ){$(this).find('.xdsoft_date').toggleClass('xdsoft_disabled');},minDate:'-1970/01/2',maxDate:'+1970/01/2',timepicker:false});$('#datetimepicker9').datetimepicker({onGenerate:function( ct ){$(this).find('.xdsoft_date.xdsoft_weekend').addClass('xdsoft_disabled');},weekends:['01.01.2014','02.01.2014','03.01.2014','04.01.2014','05.01.2014','06.01.2014'],timepicker:false});</script><!-- END CONTAINER --> <!-- BEGIN FOOTER --> <?php include template('footer');?>