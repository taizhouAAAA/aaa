<?php

$index_page	   = $common['index_page'];
$self_page	   = $common['self_page'];
$teacher_home  = $common['teacher_home'];
$teacher_page  = $common['teacher_page'];
$lesson_page   = $common['lesson_page'];
$apply_teacher = $common['apply_teacher'];
$evaluate_page = $common['evaluate_page'];
$page_title    = $common['page_title'];
$follow_page   = $common['follow_page'];

if(checkSubmit()){
	$common['index_page']	 = $_GPC['index_page'];
	$common['self_page']	 = $_GPC['self_page'];
	$common['teacher_home']	 = $_GPC['teacher_home'];
	$common['teacher_page']	 = $_GPC['teacher_page'];
	$common['lesson_page']	 = $_GPC['lesson_page'];
	$common['apply_teacher'] = $_GPC['apply_teacher'];
	$common['evaluate_page'] = $_GPC['evaluate_page'];
	$common['page_title']	 = $_GPC['page_title'];
	$common['follow_page']	 = $_GPC['follow_page'];
	$data = array(
		'uniacid'			=> $uniacid,
		'common'			=> json_encode($common),
		'addtime'			=> time(),
	);

	if (empty($glo_setting)) {
		$result = pdo_insert($this->table_setting, $data);
	} else {
		$result = pdo_update($this->table_setting, $data, array('uniacid' => $uniacid));
	}

	if($result){
		/* 更新设置表缓存 */
		$this->updateCache('fy_lesson_'.$uniacid.'_setting');

		$site_common->addSysLog($_W['uid'], $_W['username'], 3, "基本设置->页面文字", "编辑页面文字");
		message('更新成功', $this->createWebUrl('setting', array('op' => 'pageText')), 'success');
	}else{
		message('更新失败，请稍候重试', "", 'error');
	}
}