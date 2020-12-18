<?php
namespace LizusFunction;

/**
 * 获取url的get参数数组
 * @param  string $url [地址字符串]
 * @return array      [如果$url中有参数，则返回'参数=>值'的键值对数组，否则返回空数组]
 */
function get_url_queries($url){
  $o = parse_url($url);
  if (!isset($o['query'])) return [];
  $q = $o['query'];
  return parse_url_query($q);
}
