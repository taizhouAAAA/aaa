<?php
/**
 * 我的足迹
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
 */

$title = '我的足迹';

$pindex =max(1,$_GPC['page']);
$psize = 9;

$condition = " b.uniacid=:uniacid AND b.uid=:uid ";
$params[':uniacid'] = $uniacid;
$params[':uid'] = $uid;

$list = pdo_fetchall("SELECT a.id,a.lesson_type,a.bookname,a.images,a.price,a.ico_name,a.score,a.live_info,a.descript,b.addtime FROM " .tablename($this->table_lesson_parent). " a LEFT JOIN " .tablename($this->table_lesson_history). " b ON a.id=b.lessonid WHERE {$condition} ORDER BY b.addtime DESC  LIMIT " . ($pindex-1) * $psize . ',' . $psize, $params);
foreach($list as $k=>$v){
	$play_record = pdo_fetch("SELECT * from " .tablename($this->table_playrecord). " WHERE uniacid=:uniacid AND uid=:uid AND lessonid=:lessonid ORDER BY addtime DESC LIMIT 1", array(':uniacid'=>$uniacid,':uid'=>$uid,':lessonid'=>$v['id']));
	if(!empty($play_record)){
		$section = pdo_get($this->table_lesson_son, array('uniacid'=>$uniacid,'id'=>$play_record['sectionid']), array('id','title'));
		$v['sectionid'] = $section['id'];
		$v['section_title'] = $section['title'];
		if($play_record['duration']){
			$v['progress'] = round($play_record['playtime']/$play_record['duration'],2)*100;
		}
		$v['playtime'] = gmstrftime('%H:%M:%S', $play_record['playtime']);
	}

	if($v['lesson_type']==3){
		$live_info = json_decode($v['live_info'], true);
		$starttime = strtotime($live_info['starttime']);
		$endtime = strtotime($live_info['endtime']);
		if(time() < $starttime){
			$v['icon_live_status'] = 'icon-live-nostart';
		}elseif(time() > $endtime){
			$v['icon_live_status'] = 'icon-live-ended';
		}elseif(time() > $starttime && time() < $endtime){
			$v['icon_live_status'] = 'icon-live-starting';
		}
	}
	$list[$k] = $v;
}

$total = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename($this->table_lesson_parent) . " a LEFT JOIN " .tablename($this->table_lesson_history). " b ON a.id=b.lessonid WHERE {$condition} ", $params);
$pager = $webAppCommon->pagination($total, $pindex, $psize);



include $this->template("../webapp/{$template}/history");


?>