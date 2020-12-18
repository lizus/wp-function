<?php
namespace LizusFunction;

/**
 * cut_text
 * 输出裁剪文本，类似cut_html，但过滤html标签，如文本长度>=$length，则在末尾添加$dot字符
 * @param  string $text
 * @param  int $length
 * @param  int $sentence
 * @param  string $dot
 * @return string
 */
function cut_text($text,$length=144,$sentence=3,$dot='...'){
    $rs=\trim(cut_html(\strip_tags($text),$length,$sentence));
    if(\mb_strlen($rs)<$length) return $rs;
    $len=$length-\mb_strlen($dot);
    return \mb_substr($rs,0,$len).$dot;
}