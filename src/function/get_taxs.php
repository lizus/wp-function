<?php
namespace LizusFunction;

/**
 * get_taxs
 * 获取public的taxonomy
 * @return array
 */
function get_taxs(){
  $args=array(
			'show_ui'=>true,
			'public'=>true,
		);
	return \get_taxonomies($args,'objects');
}