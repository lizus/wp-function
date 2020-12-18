<?php
namespace LizusFunction;


/**
 * order_clear_cache
 * 设置url的query中clear_cache=ok来要求清理对应页面的redis缓存
 * @return boolean
 */
function order_clear_cache(){
    return (isset($_GET['clear_cache']) && $_GET['clear_cache']=='ok');
}