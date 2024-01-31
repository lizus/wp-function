<?php

namespace LizusFunction;

//用于获取地址中的某个参数的值
function get_url_query_val($key, $url = null)
{
  $url = $url ?: get_current_url();
  $q = get_url_queries($url);
  $w = isset($q[$key]) ? $q[$key] : '';
  return \trim(\urldecode_deep(\strip_tags($w)));
}
