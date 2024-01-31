<?php

namespace LizusFunction;

//获取url中最后一个斜线的内容，不含参数和hash
function get_url_last_slash($url)
{
  $url = \array_filter(\explode('/', get_url_path($url)));
  return \array_pop($url);
}
