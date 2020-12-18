<?php
namespace LizusFunction;
/**
 * 移除地址中的page段
 * @param  string $url [需要去掉page段的地址]
 * @return string      [去掉page相关内容后的地址]
 */
function url_remove_page($url){
  return preg_replace('#/page/([^\#\?/]+)#','',$url);
}
