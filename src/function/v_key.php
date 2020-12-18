<?php
namespace LizusFunction;

/**
 * v_key
 *  存储数据库，特别是meta表时，为避免与其他插件或内容产生命名冲突，我们将每一个内容添加前缀存储，该函数可通过判断不同$type的用途使用不同的前缀，记得在wp-config.php中设置对应的常量，也可以全不设置，则默认都使用CONTINUE_PREFIX即可。
 * @param  string $name
 * @param  string $type
 * @return string
 */
function v_key($name,$type='option'){
    if (empty($name)) return '';
    $prefix='lizus_';
    if(defined('CONTINUE_PREFIX')) $prefix=CONTINUE_PREFIX;
    switch ($type) {
        case 'post':
            if(defined('CONTINUE_PREFIX_POST')) $prefix=CONTINUE_PREFIX_POST;
        break;
        case 'term':
            if(defined('CONTINUE_PREFIX_TERM')) $prefix=CONTINUE_PREFIX_TERM;
        break;
        case 'comment':
            if(defined('CONTINUE_PREFIX_COMMENT')) $prefix=CONTINUE_PREFIX_COMMENT;
        break;
        case 'user':
            if(defined('CONTINUE_PREFIX_USER')) $prefix=CONTINUE_PREFIX_USER;
        break;
        case 'option':
            if(defined('CONTINUE_PREFIX_OPTION')) $prefix=CONTINUE_PREFIX_OPTION;
        break;
        case 'function':
            $prefix=$prefix.'function_';
        break;
    }
    return preg_replace('/^('.$prefix.')?/',$prefix,$name);
}