<?php
namespace LizusFunction;

//将内容以文章内容的方式进行处理
function get_formatting_content ($content='',$more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
	if (empty($content)) return '';
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}