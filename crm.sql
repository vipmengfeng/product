-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 09 月 29 日 08:47
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `crm`
--

-- --------------------------------------------------------

--
-- 表的结构 `crm_caches`
--

CREATE TABLE IF NOT EXISTS `crm_caches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `content` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `crm_caches`
--

INSERT INTO `crm_caches` (`id`, `name`, `content`) VALUES
(1, 'status', 'a:5:{i:0;s:12:"初次接触";i:1;s:12:"深度开发";i:2;s:9:"已成单";i:3;s:12:"维护关系";i:4;s:12:"续签客户";}'),
(3, 'hh', 'a:2:{i:0;i:1;i:1;a:2:{i:0;i:2;i:1;a:2:{i:0;i:3;i:1;i:3;}}}');

-- --------------------------------------------------------

--
-- 表的结构 `crm_config`
--

CREATE TABLE IF NOT EXISTS `crm_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `content` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `crm_customer`
--

CREATE TABLE IF NOT EXISTS `crm_customer` (
  `cusid` int(11) NOT NULL AUTO_INCREMENT COMMENT '客户id',
  `cusname` varchar(100) NOT NULL COMMENT '公司名称',
  `connecter` varchar(20) NOT NULL COMMENT '联系人',
  `cphone` varchar(11) NOT NULL COMMENT '联系方式',
  `cusinfo` varchar(100) NOT NULL COMMENT '公司介绍',
  `ctype` varchar(100) NOT NULL DEFAULT '0' COMMENT '跟进程度',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `conditions` varchar(200) NOT NULL COMMENT '详谈情况',
  `uname` varchar(20) NOT NULL COMMENT '用户名',
  `disable` int(11) NOT NULL DEFAULT '1' COMMENT '状态',
  `inputtime` varchar(20) NOT NULL,
  `changetime` varchar(20) NOT NULL,
  `callinfo` varchar(500) NOT NULL COMMENT '通话记录',
  PRIMARY KEY (`cusid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- 转存表中的数据 `crm_customer`
--

INSERT INTO `crm_customer` (`cusid`, `cusname`, `connecter`, `cphone`, `cusinfo`, `ctype`, `uid`, `conditions`, `uname`, `disable`, `inputtime`, `changetime`, `callinfo`) VALUES
(1, '石家庄', '张三三', '12134578925', '市场营销', '0', 0, '', '', 0, '', '', ''),
(2, '衡水', '李四', '45646546456', '网络', '1', 0, '', '', 0, '', '', ''),
(3, '', '', '', '', '0', 0, '', '', 0, '', '', ''),
(4, 'ff', 'fff', '', '', '0', 0, '', '', 0, '', '', ''),
(5, 'fdsfd', 'fff', 'ff', '', '0', 1, '', '', 1, '', '1411976474', 'a:1:{i:1411976817;s:12:"不怎么样";}'),
(6, 'fff', 'ff', '444', 'Category 2', '2', 1, '', '', 1, '', '', ''),
(7, 'fff', 'ff', '444', 'Category 2', '4', 0, 'aaaa', '', 0, '', '', ''),
(8, 'fff', 'ff', '444', 'Category 2', '3', 0, 'fgdgf', '', 0, '', '', ''),
(9, 'fff', 'ff', '444', 'Category 2', '2', 1, 'fgdgf', '', 1, '', '', ''),
(10, 'fff', 'ff', '444', 'ffgfd', '0', 1, '', '', 1, '', '', ''),
(11, 'fff', 'ff', '444', 'ffgfd', '1', 0, 'asda是', '', 0, '', '', ''),
(12, 'fff', 'ff', '444', 'ffgfd', '3', 0, 'asda是', '', 0, '', '', ''),
(13, 'fff', 'ff', '444', 'ffgfd', '1', 0, 'asda是', '', 0, '', '', ''),
(14, 'fff', 'ff', '444', 'ffgfd', '3', 0, 'asda是', '', 0, '', '', ''),
(15, 'fff', 'ff', '444', 'ffgfd', '3', 0, 'asda是', '', 0, '', '', ''),
(16, 'fff', 'ff', '444', 'ffgfd', '2', 1, 'asda是', '', 1, '', '', ''),
(17, 'eee', 'eee', '5555', '', '0', 1, '', '', 1, '', '', 'a:1:{i:1411960357;s:4:"aaaa";}'),
(18, 'ddddddddddd', '12312312121', 'dddddddddd', '', '0', 1, '', 'ddddddd', 1, '', '1411975841', 'a:1:{i:1411975811;s:4:"aaaa";}'),
(19, 'fdsfdsafdsaf', '', '354343543', '', '0', 0, '', 'aaaaaaaaa', 0, '', '', ''),
(20, 'fdsfdsafdsaf', '', '354343543', '', '0', 0, '', 'aaaaaaaaa', 0, '', '', ''),
(21, 'ffdadsfdsafd', '', '5454354353', '', '4', 0, '', 'eeeeeee', 0, '', '', ''),
(22, 'aaaa', 'ssss', '55654654', 'afsdsadas', '2', 0, 'fdasfdsafs', '', 0, '', '', ''),
(23, 'FDSFD', 'FSFDSFDS', '54454', 'RETRE', '4', 1, '', '', 1, '1411624734', '', ''),
(24, '', '', '', '', '', 0, '', '', 0, '1411705068', '', ''),
(25, '', '', '', '', '', 0, '', '', 0, '1411705552', '', ''),
(26, 'aa', 'aa', '12345678945', 'fdsaf', '2', 1, 'dsffdsaf', '', 1, '', '', ''),
(27, 'dd', 'dd', '12346578945', '', '0', 1, '', '', 1, '', '1411872616', 'a:4:{i:1411959933;s:3:"aaa";i:1411959975;s:0:"";i:1411960028;s:7:"aaadddd";i:1411960422;s:18:"工地发生股份";}'),
(28, 'dd', 'ddd', '12345678945', 'aaaa', '0', 1, 'aaa', '', 1, '1411892586', '1411964241', 'fsafds'),
(29, '', '', '', '', '', 0, '', '', 0, '1411895824', '', ''),
(30, '', '', '', '', '', 0, '', '', 0, '1411895838', '', '的撒范德萨分'),
(31, '', '', '', '', '', 0, '', '', 0, '1411895919', '', ''),
(32, '', '', '', '', '', 0, '', '', 0, '1411895943', '', ''),
(33, 'aa', 'aa', '12345678945', '', '0', 1, '', '', 1, '', '', ''),
(34, 'rr', '145', '45678912345', '', '0', 1, '', '', 1, '1411953930', '', ''),
(35, 'aa', 'fds', '45678945612', '', '1', 1, '', '', 1, '1411953970', '', ''),
(36, 'aa', 'fds', '45678945612', '', '1', 1, '', '', 1, '1411954003', '', '范德萨发达'),
(37, 'dd', 'ddd', '12345678945', '', '0', 1, '', '', 1, '', '1411957231', 's:2:"aa";'),
(38, 'dd', 'ddd', '12345678945', '', '0', 1, '', '', 1, '', '', 'a:1:{s:5:"$time";s:2:"aa";}'),
(39, 'dd', 'ddd', '12345678945', '', '0', 0, '', '', 0, '', '', 'a:1:{s:5:"$time";s:2:"aa";}'),
(40, 'dd', 'ddd', '12345678945', '', '0', 0, '', '', 0, '', '', 'a:1:{s:5:"$time";s:6:"aaaaaa";}'),
(41, 'dd', 'ddd', '12345678945', '', '0', 1, '', '', 1, '', '', 'a:1:{s:5:"$time";s:4:"aaaa";}'),
(42, 'dd', 'dd', '12346578945', '', '0', 0, '', '', 1, '', '', 'a:1:{i:1411958879;s:4:"dddd";}'),
(43, 'dd', 'dd', '12346578945', '', '0', 0, '', '', 1, '', '', 'a:1:{i:1411959006;s:2:"aa";}'),
(44, '', '', '', '', '', 0, '', '', 1, '1411960958', '', ''),
(45, 'aaasssddd', 'adsfe', '12345678945', 'dfa', '0', 0, 'fafds', '', 1, '1411967306', '', ''),
(46, 'gfgfgf', 'sdfr', '45678912312', 'gfdsgfd', '0', 0, 'gsgfsg', '', 1, '1411967416', '', ''),
(47, 'gfgfgf', 'sdfr', '45678912312', 'gfdsgfd', '0', 0, 'gsgfsg', '', 1, '1411967454', '', ''),
(48, 'gfgfgf', 'sdfr', '45678912312', 'gfdsgfd', '0', 0, 'gsgfsg', '', 1, '1411967477', '', ''),
(49, 'gfgfgf', 'sdfr', '45678912312', 'gfdsgfd', '0', 0, 'gsgfsg', '', 1, '1411967513', '', ''),
(50, 'ddd', 'ddd', '85296374112', 'fdsaf', '0', 0, 'fa', '', 1, '1411967529', '', ''),
(51, 'ddd', 'ddd', '85296374112', 'fdsaf', '0', 0, 'fa', '', 1, '1411967548', '', ''),
(52, 'dd', 'dd', '45645645645', 'fdasf', '0', 0, 'fdsa', '', 1, '1411967562', '', ''),
(53, 'dd', 'dd', '45645645645', 'fdasf', '0', 0, 'fdsa', '', 1, '1411967587', '', ''),
(54, 'dd', 'dd', '45645645645', 'fdasf', '0', 0, 'fdsa', '', 1, '1411967608', '', ''),
(55, 'dd', 'dd', '45645645645', 'fdasf', '0', 0, 'fdsa', '', 1, '1411967615', '', ''),
(56, 'dd', 'dd', '45645645645', 'fdasf', '0', 0, 'fdsa', '', 1, '1411967660', '', ''),
(57, 'dd', 'dd', '45645645645', 'fdasf', '0', 0, 'fdsa', '', 1, '1411967671', '', ''),
(58, 'dd', 'dd', '45645645645', 'fdasf', '0', 1, 'fdsa', '', 1, '1411967718', '', ''),
(59, 'dd', 'dd', '45645645645', 'fdasf', '0', 1, 'fdsa', '', 1, '1411967733', '', ''),
(60, 'aa', 'fdas', '12345678912', '', '1', 1, '', '', 0, '1411967986', '', ''),
(61, 'haha', 'sadasd', '18630145129', 'sadsad', '0', 0, 'sadsad', '', 1, '1411977300', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `crm_logs`
--

CREATE TABLE IF NOT EXISTS `crm_logs` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(20) NOT NULL,
  `way` varchar(20) NOT NULL COMMENT '操作方式',
  `method` varchar(20) NOT NULL COMMENT '操作角色',
  `userid` int(11) NOT NULL COMMENT '操作者id',
  `time` varchar(30) NOT NULL COMMENT '操作时间',
  `handle` varchar(500) NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

--
-- 转存表中的数据 `crm_logs`
--

INSERT INTO `crm_logs` (`lid`, `uname`, `way`, `method`, `userid`, `time`, `handle`) VALUES
(40, 'admin', 'add', 'role', 1, '1411975116', 'asdsad'),
(41, 'admin', 'del', 'role', 1, '1411975355', 'asdsad'),
(43, 'admin', 'add', 'role', 1, '1411975779', 'dsfsad'),
(49, 'admin', 'update', 'phone', 1, '1411976474', 'a:1:{i:0;s:1:"5";}'),
(50, 'admin', 'update', 'customer', 1, '1411976817', 'a:1:{i:0;s:1:"5";}'),
(51, 'admin', 'update', 'customer', 1, '1411976899', 'a:1:{i:0;s:2:"27";}'),
(52, 'admin', 'add', 'customer', 1, '1411977300', '61'),
(55, 'admin', 'update', 'move', 1, '1411977679', 'a:1:{i:0;s:2:"27";}'),
(57, 'admin', 'update', 'move', 1, '1411978011', 'a:2:{i:0;s:2:"37";i:1;s:2:"38";}'),
(58, 'admin', 'del', 'customer', 1, '1411978144', 'a:2:{i:0;s:2:"39";i:1;s:2:"40";}'),
(59, 'admin', 'add', 'member', 1, '1411978541', '31'),
(60, 'admin', 'update', 'change', 1, '1411978951', 'a:1:{i:0;s:1:"4";}'),
(61, 'admin', 'del', 'member', 1, '1411979243', 'a:2:{i:0;s:2:"10";i:1;s:2:"11";}'),
(62, 'admin', 'update', 'change', 1, '1411979478', 'a:1:{i:0;s:1:"8";}');

-- --------------------------------------------------------

--
-- 表的结构 `crm_menu`
--

CREATE TABLE IF NOT EXISTS `crm_menu` (
  `menuid` int(11) NOT NULL AUTO_INCREMENT,
  `menuname` varchar(50) NOT NULL,
  `pid` int(11) NOT NULL,
  `href` varchar(100) NOT NULL,
  `icon` varchar(20) NOT NULL,
  PRIMARY KEY (`menuid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `crm_menu`
--

INSERT INTO `crm_menu` (`menuid`, `menuname`, `pid`, `href`, `icon`) VALUES
(1, '首页', 0, 'index.php', 'home'),
(2, '系统管理', 0, '', 'cog'),
(3, '我的客户', 0, 'my.php', 'user'),
(4, '工作日志', 0, '', 'table'),
(5, '公海客户', 0, 'ghkh.php', 'group'),
(6, '用户管理', 2, 'yhgl.php', ''),
(7, '修改资料', 2, 'xgzl.php', ''),
(8, '操作日志', 2, 'czrz.php', ''),
(14, '权限管理', 0, '', 'home'),
(15, '查看角色', 14, 'ckjs.php', ''),
(16, '添加角色', 14, 'tjjs.php', '');

-- --------------------------------------------------------

--
-- 表的结构 `crm_role`
--

CREATE TABLE IF NOT EXISTS `crm_role` (
  `roleid` int(11) NOT NULL AUTO_INCREMENT,
  `rolename` varchar(20) NOT NULL,
  `first_priv` varchar(100) NOT NULL,
  `next_priv` varchar(100) NOT NULL,
  `instruct` varchar(100) NOT NULL,
  PRIMARY KEY (`roleid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `crm_role`
--

INSERT INTO `crm_role` (`roleid`, `rolename`, `first_priv`, `next_priv`, `instruct`) VALUES
(1, '经理', '1,2,3,4,5,14', '6,7,8,15,16', '我爱管谁管谁'),
(2, '销售', '1,2,3,4,5', '7', '我默默的拿起了电话'),
(4, 'dsfsad', '14', '', 'sdafsdaf');

-- --------------------------------------------------------

--
-- 表的结构 `crm_user`
--

CREATE TABLE IF NOT EXISTS `crm_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `userpwd` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `logintime` varchar(50) NOT NULL,
  `realname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `instruct` varchar(200) NOT NULL,
  `phone` int(11) NOT NULL,
  `QQ` int(12) NOT NULL,
  `disable` int(11) NOT NULL DEFAULT '1',
  `inputtime` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- 转存表中的数据 `crm_user`
--

INSERT INTO `crm_user` (`id`, `username`, `userpwd`, `role`, `logintime`, `realname`, `email`, `instruct`, `phone`, `QQ`, `disable`, `inputtime`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, '', '超级管理员', '414588138@qq.com', 'wwwwwwwwwwwwddaa', 2147483647, 543543544, 1, ''),
(2, 'lisi', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', '李四', 'lisi@qq.com', '', 2147483647, 123456789, 1, ''),
(3, 'zhangsan', '', 0, '', '张三', 'zhangsan@qq.com', 'ssss', 45354354, 354354, 1, ''),
(4, 'wangwu', '21232f297a57a5a743894a0e4a801fc3', 0, '', '王五', 'wangwu@qq.com', '', 2147483647, 0, 1, ''),
(5, 'd', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', '', 'dd', 'dd', 0, 0, 0, ''),
(6, 'ddd', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', '', '', 'ddddd', 0, 0, 0, ''),
(7, 'ffff', 'ece926d8c0356205276a45266d361161', 0, '', '', 'fff', 'ffff', 0, 0, 0, ''),
(8, 'ddd', 'e10adc3949ba59abbe56e057f20f883e', 0, '', '', '5882033wen@sina.com', 'dddd', 2147483647, 0, 1, ''),
(9, '8888', 'cf79ae6addba60ad018347359bd144d2', 0, '', '', '888', '8888', 0, 0, 1, ''),
(10, 'ffffffff', '21232f297a57a5a743894a0e4a801fc3', 0, '', '', '', 'fdafsdafdsafdsssssss', 0, 0, 0, ''),
(11, 'ffffffff', '21232f297a57a5a743894a0e4a801fc3', 0, '', '', '', 'fdafsdafdsafdsssssss', 0, 0, 0, ''),
(12, 'fdsafdsafdsafds', '980ac217c6b51e7dc41040bec1edfec8', 0, '', '', '', 'dfafdsafssa', 0, 0, 1, ''),
(13, 'wwww', 'ddddddd', 0, '', '', '', 'fdsafdsfdsfdsfddddd', 2147483647, 456824, 1, ''),
(14, 'wwww', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 0, '', '', '', 'fdsafdsfdsfdsfddddd', 2147483647, 123123123, 1, ''),
(15, 'wwww', '2f3e9eccc22ee583cf7bad86c751d865', 0, '', '', '', 'fdsafdsfdsfdsfddddd', 0, 0, 1, ''),
(16, 'wwww', '2f3e9eccc22ee583cf7bad86c751d865', 0, '', '', '', 'fdsafdsfdsfdsfddddd', 0, 0, 1, ''),
(17, 'wwww', '2f3e9eccc22ee583cf7bad86c751d865', 0, '', '', '', 'fdsafdsfdsfdsfddddd', 0, 0, 1, ''),
(18, '', 'aaaaaa', 0, '', '赵六', '', 'gfsgfsgfdsgfgs', 2147483647, 2147483647, 1, ''),
(19, '', 'dddddd', 0, '', 'tianqi', '', 'fdafdsafdsafds', 2147483647, 1564612, 1, ''),
(20, '', 'fdsafds', 0, '', 'fdsafdsaf', '', 'safsafsdf', 0, 0, 1, ''),
(21, '', 'ff', 0, '', 'fff', '', 'f', 0, 0, 1, ''),
(22, '', 'dfdafds', 0, '', 'fdafdsfa', '', 'fafda', 0, 0, 1, '1411616171'),
(23, 'ddddddd', 'ddddddd', 0, '', 'ss', 'sss@aa.com', '', 2147483647, 0, 1, ''),
(24, 'fdsafdsa', 'dddddd', 0, '', 'fdsa', '', '', 2147483647, 0, 1, ''),
(25, 'yyyyyy', 'yyyyyyy', 0, '', 'yy', '', '', 2147483647, 0, 1, ''),
(26, '', '', 0, '', '', '', '', 0, 0, 1, ''),
(27, '', '', 0, '', '', '', '', 0, 0, 1, ''),
(28, '', '', 0, '', '', '', '', 0, 0, 1, ''),
(29, 'qqqqqq', 'qqqqqq', 0, '', 'aa', '12@qq.com', '', 2147483647, 0, 1, ''),
(30, 'cccccc', 'c1f68ec06b490b3ecb4066b1b13a9ee9', 0, '', 'ccc', '123@qq.com', '', 2147483647, 0, 1, ''),
(31, 'wwwwwww', '123456', 0, '', 'sadsadsa', '414588138@qq.com', '', 2147483647, 0, 1, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
