<?php

namespace LizusFunction;

/**
 * get_post_types
 * 获取所有可见的文章类型
 * @return array
 */
function get_post_types()
{
    $args = array(
        'show_ui' => true,
        'public' => true,
    );
    return \get_post_types($args, 'objects');
}
