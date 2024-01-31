<?php

namespace LizusFunction;

/**
 * 获取url的？之前的部分
 * @param  string $url [地址字符串]
 * @return string      [url的?前的部分]
 */
function get_url_path($url)
{
  $o = \parse_url($url);
  $scheme = isset($o['scheme']) ? $o['scheme'] . '://' : '//';
  $host   = isset($o['host']) ? $o['host'] : '';
  $port   = isset($o['port']) ? ':' . $o['port'] : '';
  $path   = isset($o['path']) ? $o['path'] : '';
  return $scheme . $host . $port . $path;
}
