<?php
/*
	[MXphp System] Copyright (c) 2014-2014
	This is  a freeware
	2014.8.28
*/
function template_compile($from, $to) {
	$content = template_parse(file_get($from));
	file_put($to, $content);
}

function template_parse($str) {
	global $conf;
	$str = preg_replace("/\<\!\-\-\[(.+?)\]\-\-\>/", "", $str);
	$str = preg_replace("/\<\!\-\-\{(.+?)\}\-\-\>/s", "{\\1}", $str);
	$str = preg_replace("/\{template\s+([^\}]+)\}/", "<?php include template(\\1);?>", $str);
	$str = preg_replace("/\{php\s+(.+)\}/", "<?php \\1?>", $str);
	$str = preg_replace("/\{if\s+(.+?)\}/", "<?php if(\\1) { ?>", $str);
	$str = preg_replace("/\{else\}/", "<?php } else { ?>", $str);
	$str = preg_replace("/\{elseif\s+(.+?)\}/", "<?php } else if(\\1) { ?>", $str);
	$str = preg_replace("/\{\/if\}/", "<?php } ?>\r\n", $str);
	$str = preg_replace("/\{loop\s+(\S+)\s+(\S+)\}/", "<?php if(is_array(\\1)) { foreach(\\1 as \\2) { ?>", $str);
	$str = preg_replace("/\{loop\s+(\S+)\s+(\S+)\s+(\S+)\}/", "<?php if(is_array(\\1)) { foreach(\\1 as \\2 => \\3) { ?>", $str);
	$str = preg_replace("/\{\/loop\}/", "<?php } } ?>", $str);
	$str = preg_replace("/\{([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*\(([^{}]*)\))\}/", "<?php echo \\1;?>", $str);
	$str = preg_replace("/<\?php([^\?]+)\?>/es", "template_addquote('<?php\\1?>')", $str);
	$str = preg_replace("/\{(\\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\+\-\x7f-\xff]*)\}/", "<?php echo \\1;?>", $str);
	$str = preg_replace("/\{(\\$[a-zA-Z0-9_\[\]\'\"\$\x7f-\xff]+)\}/es", "template_addquote('<?php echo \\1;?>')", $str);
	$str = preg_replace("/\{([A-Z_\x7f-\xff][A-Z0-9_\x7f-\xff]*)\}/s", "<?php echo \\1;?>", $str);
	$str = preg_replace("/\'([A-Za-z]+)\[\'([A-Za-z\.]+)\'\](.?)\'/s", "'\\1[\\2]\\3'", $str);
	$str = preg_replace("/(\r?\n)\\1+/", "\\1", $str);
	$str = str_replace("\t", '', $str);
	$str = "<?php defined('IN_MXphp') or exit('访问出错！');?>".$str;
	if($conf['template_trim']) return strip_nr($str);
	return $str;
}

function template_addquote($var) {
	return str_replace("\\\"", "\"", preg_replace("/\[([a-zA-Z0-9_\-\.\x7f-\xff]+)\]/s", "['\\1']", $var));
}
?>