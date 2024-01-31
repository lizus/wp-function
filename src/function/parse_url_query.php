<?php

namespace LizusFunction;

/**
 * 将类似url中的query段字符串格式化为键值对数组,相同键值将只取最后一个值
 * @param  string $q [类似query字符串]
 * @return array    [query键值对数组，如果$q为空，则返回空数组]
 */
function parse_url_query($q)
{
  if (!is_string($q)) return [];
  $q = explode('&', $q);
  return \array_reduce($q, function ($carry, $item) {
    $v = explode('=', $item);
    return \array_merge($carry, [
      $v[0] => $v[1] ?? ''
    ]);
  }, []);
}
