<?php

namespace LizusFunction;


/**
 * order_clear_cache
 * 设置url的query中clear_cache=ok来要求清理对应页面的redis缓存
 * @return boolean
 */
function order_clear_cache()
{
    /**
     * 如果不是编辑以上权限，就不允许清理缓存
     */
    if (!current_user_can('manage_categories')) return false;

    return (isset($_GET['clear_cache']) && $_GET['clear_cache'] == 'ok');
}
