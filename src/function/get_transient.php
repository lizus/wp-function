<?php
namespace LizusFunction;

/**
 * get_transient
 * 给WordPress的get_transient添加一个调试判断，可以用来在url中添加参数进理缓存，详见order_clear_cache说明
 * @param  mixed $key
 * @return void
 */
function get_transient($key){
    if (\LizusFunction\order_clear_cache()) \delete_transient($key);
    return \get_transient($key);
}