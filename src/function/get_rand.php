<?php

namespace LizusFunction;

/**
 * get_rand
 * 生成在$min和$max之间一共$num个随机数
 * @param  int $min
 * @param  int $max
 * @param  int $num
 * @return array
 */
function get_rand($min, $max, $num)
{
  $nums = [];
  $total = $num;
  if ($total > $max - $min) $total = $max - $min;
  while (count($nums) < $total) {
    $nums[] = \mt_rand($min, $max);
    $nums = \array_merge(\array_unique($nums));
  }
  return $nums;
}
