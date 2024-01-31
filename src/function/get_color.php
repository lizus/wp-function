<?php

namespace LizusFunction;

/**
 * get_color
 * 获取图片左上角$x，$y坐标色值，用6位16进数表示
 * gif的图片感觉抓取的颜色不准
 *
 * @param  string $img - 图片地址
 * @param  int $x
 * @param  int $y
 * @return string
 */
function get_color($img, $x = 5, $y = 5)
{
  $type = 'jpg';
  if (\preg_match('/\.(jpg|gif|png)/', $img, $m)) {
    $type = $m[1];
  }
  switch ($type) {
    case 'gif':
      $im = \ImageCreateFromGif($img);
      break;
    case 'png':
      $im = \ImageCreateFromPng($img);
      break;
    default:
      $im = \ImageCreateFromJpeg($img);
      break;
  }
  if (!$im) return '#000000';
  $rgb = \ImageColorAt($im, $x, $y);
  $color = '000000' . \dechex($rgb);
  return '#' . \substr($color, -6);
}
