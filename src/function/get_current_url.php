<?php

namespace LizusFunction;

/**
 * get_current_url
 * 获取当前url地址，包含$_GET部分，不含hash
 * @return string 
 */
function get_current_url()
{
    $url = 'http';
    if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
        $url .= "s";
    }
    $url .= "://";
    if ($_SERVER["SERVER_PORT"] != "80" && $_SERVER["SERVER_PORT"] != "443") {
        $url .= $_SERVER["HTTP_HOST"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $url .= $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    }
    return $url;
}
