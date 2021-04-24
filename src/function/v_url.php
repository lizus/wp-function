<?php
namespace LizusFunction;

/**
 * 拼接并去重url参数
 * @param  string $url    [地址字符串]
 * @param  string/array $querys [description]
 * @return string         [拼接后的地址]
 */
function v_url($url,$queries=null){
  $path=get_url_path($url);
  $q=get_url_queries($url);
  if (is_string($queries)) $queries=parse_url_query($queries);
  if (is_array($queries)) $q=array_unique(array_merge($q,$queries));
  $retq=array();
  foreach ($q as $key => $value) {
    $item=$key.'=';
    /**
     * 搜索页的s参数要保留，否则不会提交到搜索结果页去
     */
    if (!empty($value) || $key=='s') $item.=$value;
    $retq[]=$item;
  }
  if (!empty($retq)) {
    return $path.'?'.implode('&',$retq);
  }
  return $path;
}
