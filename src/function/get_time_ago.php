<?php
namespace LizusFunction;

/**
 * get_time_ago
 * 根据过去某一时间相对当前时间的差值来决定如果显示该时间，常用于文章显示发布时间，评论时间等
 * @param  int/string $agoTime
 * @param  string $dateFormat
 * @return string
 */
function get_time_ago($agoTime,$dateFormat='Y-m-d H:i:s') {
	$agoTime=\is_numeric($agoTime) ? $agoTime : \strtotime($agoTime);
	$nowTime=\current_time('timestamp');
	$diff=($nowTime-$agoTime)/3600;
	if ($diff<168) {//一周内
		return \human_time_diff($agoTime, $nowTime).'前';
	}elseif ($diff<8760) {//一年内
		return \date_i18n($dateFormat,$agoTime);
	}else{//一年以上
		return \date_i18n('Y-m-d',$agoTime);
	}
}