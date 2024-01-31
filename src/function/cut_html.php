<?php

namespace LizusFunction;


/**
 * 用于裁剪字符串到设定的$len长度，并且不超过$sentence个句子，以中文标点来算，保持html格式
 * @param  string  $text     [要裁剪的字符串]
 * @param  integer $len      [最大裁剪文字长度]
 * @param  integer $sentence [最大裁剪句子数量，按中文断句]
 * @return string            [裁剪后的字符串]
 */
function cut_html($text, $length = 144, $sentence = 3)
{
  //mb_internal_encoding('UTF-8');//如果未声明需要添加

  //先去掉换行和首尾的空格
  $text = \trim(\str_replace("\n", '', $text));

  //根据中文断句符号分隔原字符串，先获取最多$sentence个句子
  $arr = \mb_split('[。？！……]', $text);
  $new_arr = \array_filter($arr);
  $len = \count($new_arr) > $sentence ? $sentence : \count($new_arr);
  $i = 0;
  foreach ($new_arr as $key => $value) {
    if ($i == $len - 1) {
      $len = $key;
      break;
    }
    $i++;
  }
  $total = 0;
  for ($i = 0; $i <= $len; $i++) {
    $total += \mb_strlen($arr[$i]) + 1;
  }
  $text = \mb_substr($text, 0, $total);

  //如果获得的句子长度少于需要截取的长度，则直接返回
  if (\mb_strlen($text) <= $length) return \force_balance_tags($text);

  //使用正则取html标签，分割出内容数组，以备拼接内容和计数
  $arr = \mb_split('</?[a-zA-Z]+(>|[^>]+>)', $text);
  $rs = $arr[0]; //用于最终拼接内容和标签
  $rest_len = $length - \mb_strlen($rs); //剩余还需要的字数
  if (\preg_match_all('/<\/?[a-zA-Z]+(>|[^>]+>)/', $text, $m)) {
    $pos = 0; //标签所在的位置
    $i = 0;
    foreach ($m[0] as $tag) {
      if ($i > 0) {
        $rs .= \esc_html(\mb_substr($arr[$i], 0, $rest_len));
        $rest_len = $rest_len - \mb_strlen(\htmlspecialchars_decode($arr[$i]));
      }
      if ($rest_len <= 0) break;
      $rs .= $tag;
      $pos = \mb_stripos($text, $tag);
      $text = \mb_substr($text, $pos);
      $i++;
    }
  }

  return \force_balance_tags($rs);
}
