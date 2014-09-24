<?php defined('IN_MXphp') or exit('访问出错！');?><!DOCTYPE html><html lang="zh-CN" class="no-js"><!-- BEGIN HEAD --><head><meta charset="utf-8" /><title>Metronic | Admin Dashboard Template</title><meta content="width=device-width, initial-scale=1.0" name="viewport" /><meta content="" name="description" /><meta content="" name="author" /><!-- BEGIN 全局样式 --><link href="<?php echo $conf['css'];?>/bootstrap.min.css" rel="stylesheet" type="text/css"/><link href="<?php echo $conf['css'];?>/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/><link href="<?php echo $conf['css'];?>/font-awesome.min.css" rel="stylesheet" type="text/css"/><link href="<?php echo $conf['css'];?>/style-metro.css" rel="stylesheet" type="text/css"/><link href="<?php echo $conf['css'];?>/style.css" rel="stylesheet" type="text/css"/><link href="<?php echo $conf['css'];?>/style-responsive.css" rel="stylesheet" type="text/css"/><link href="<?php echo $conf['css'];?>/default.css" rel="stylesheet" type="text/css" id="style_color"/><link href="<?php echo $conf['css'];?>/uniform.default.css" rel="stylesheet" type="text/css"/><!-- END 全局样式 --><!-- BEGIN 页面样式 --><link href="<?php echo $conf['css'];?>/jquery.gritter.css" rel="stylesheet" type="text/css"/><link href="<?php echo $conf['css'];?>/daterangepicker.css" rel="stylesheet" type="text/css" /><link href="<?php echo $conf['css'];?>/fullcalendar.css" rel="stylesheet" type="text/css"/><link href="<?php echo $conf['css'];?>/jqvmap.css" rel="stylesheet" type="text/css" media="screen"/><link href="<?php echo $conf['css'];?>/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/><!-- END 页面样式 --><link rel="shortcut icon" href="<?php echo $conf['image'];?>/favicon.ico" /></head><!-- END HEAD --><!-- BEGIN BODY --><body class="page-header-fixed"><!-- BEGIN 头部 --><div class="header navbar navbar-inverse navbar-fixed-top"> <!-- BEGIN 顶部导航栏 --><div class="navbar-inner"><div class="container-fluid"> <!-- BEGIN LOGO --> <a class="brand pull-left" href="index.html"> <img src="<?php echo $conf['image'];?>/logo.png" alt="logo"/> </a> <small class="pull-left badge" > 客户管理系统 </small> <!-- END LOGO --> <!-- BEGIN 响应菜单显示开关 --> <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse"> <img src="<?php echo $conf['image'];?>/menu-toggler.png" alt="" /> </a> <!-- END 响应菜单显示开关 --> <!-- BEGIN 顶部的导航菜单 --><ul class="nav pull-right"><!-- BEGIN 通知列表 --><li class="dropdown" id="header_notification_bar"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-warning-sign"></i> <span class="badge">6</span> </a><ul class="dropdown-menu extended notification"><li><p>You have 14 new notifications</p></li><li> <a href="#"> <span class="label label-success"><i class="icon-plus"></i></span> New user registered. <span class="time">Just now</span> </a> </li><li> <a href="#"> <span class="label label-important"><i class="icon-bolt"></i></span> Server #12 overloaded. <span class="time">15 mins</span> </a> </li><li> <a href="#"> <span class="label label-warning"><i class="icon-bell"></i></span> Server #2 not respoding. <span class="time">22 mins</span> </a> </li><li> <a href="#"> <span class="label label-info"><i class="icon-bullhorn"></i></span> Application error. <span class="time">40 mins</span> </a> </li><li> <a href="#"> <span class="label label-important"><i class="icon-bolt"></i></span> Database overloaded 68%. <span class="time">2 hrs</span> </a> </li><li> <a href="#"> <span class="label label-important"><i class="icon-bolt"></i></span> 2 user IP blocked. <span class="time">5 hrs</span> </a> </li><li class="external"> <a href="#">See all notifications <i class="m-icon-swapright"></i></a> </li></ul></li><!-- END 通知列表 --> <!-- BEGIN "收件箱"下拉菜单 --><li class="dropdown" id="header_inbox_bar"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-envelope"></i> <span class="badge">5</span> </a><ul class="dropdown-menu extended inbox"><li><p>You have 12 new messages</p></li><li> <a href="inbox.html?a=view"> <span class="photo"><img src="<?php echo $conf['image'];?>/avatar2.jpg" alt="" /></span> <span class="subject"> <span class="from">Lisa Wong</span> <span class="time">Just Now</span> </span> <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibhauctor nibh... </span> </a> </li><li> <a href="inbox.html?a=view"> <span class="photo"><img src="<?php echo $conf['image'];?>/avatar3.jpg" alt="" /></span> <span class="subject"> <span class="from">Richard Doe</span> <span class="time">16 mins</span> </span> <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibhauctor nibh... </span> </a> </li><li> <a href="inbox.html?a=view"> <span class="photo"><img src="<?php echo $conf['image'];?>/avatar1.jpg" alt="" /></span> <span class="subject"> <span class="from">Bob Nilson</span> <span class="time">2 hrs</span> </span> <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibhauctor nibh... </span> </a> </li><li class="external"> <a href="inbox.html">See all messages <i class="m-icon-swapright"></i></a> </li></ul></li><!-- END "收件箱"下拉菜单 --> <!-- BEGIN 待办事项列表 --><li class="dropdown" id="header_task_bar"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-tasks"></i> <span class="badge">5</span> </a><ul class="dropdown-menu extended tasks"><li><p>You have 12 pending tasks</p></li><li> <a href="#"> <span class="task"> <span class="desc">New release v1.2</span> <span class="percent">30%</span> </span> <span class="progress progress-success "> <span style="width: 30%;" class="bar"></span> </span> </a> </li><li> <a href="#"> <span class="task"> <span class="desc">Application deployment</span> <span class="percent">65%</span> </span> <span class="progress progress-danger progress-striped active"> <span style="width: 65%;" class="bar"></span> </span> </a> </li><li> <a href="#"> <span class="task"> <span class="desc">Mobile app release</span> <span class="percent">98%</span> </span> <span class="progress progress-success"> <span style="width: 98%;" class="bar"></span> </span> </a> </li><li> <a href="#"> <span class="task"> <span class="desc">Database migration</span> <span class="percent">10%</span> </span> <span class="progress progress-warning progress-striped"> <span style="width: 10%;" class="bar"></span> </span> </a> </li><li> <a href="#"> <span class="task"> <span class="desc">Web server upgrade</span> <span class="percent">58%</span> </span> <span class="progress progress-info"> <span style="width: 58%;" class="bar"></span> </span> </a> </li><li> <a href="#"> <span class="task"> <span class="desc">Mobile development</span> <span class="percent">85%</span> </span> <span class="progress progress-success"> <span style="width: 85%;" class="bar"></span> </span> </a> </li><li class="external"> <a href="#">See all tasks <i class="m-icon-swapright"></i></a> </li></ul></li><!-- END 待办事项列表 --> <!-- BEGIN 用户登录下拉 --><li class="dropdown user"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img alt="" src="<?php echo $conf['image'];?>/avatar1_small.jpg" /> <span class="username">用户名</span> <i class="icon-angle-down"></i> </a><ul class="dropdown-menu"><li><a href="extra_profile.html"><i class="icon-user"></i> 我的资料</a></li><li><a href="page_calendar.html"><i class="icon-calendar"></i> My Calendar</a></li><li><a href="inbox.html"><i class="icon-envelope"></i> My Inbox(3)</a></li><li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li><li class="divider"></li><li><a href="<?php echo $conf['log_out'];?>/controller/system/cl_yhgl.php?file=extra_lock"><i class="icon-lock"></i> Lock Screen</a></li><li><a href="<?php echo $conf['log_out'];?>"><i class="icon-key"></i> Log Out</a></li></ul></li><!-- END 用户登录下拉 --></ul><!-- END 顶部的导航菜单 --> </div></div><!-- END 顶部导航栏 --> </div><!-- END 头部 --> 