<?php

$lesson_config = json_decode($setting['lesson_config'], true);
$self_diy = unserialize($setting['self_diy']);
$user_info = json_decode($setting['user_info'], true);
$template_arr =  $typeStatus->templateList();
$self_item = $common['self_item'];

if (checksubmit('submit')) {
	foreach ($_GPC['diy_name'] as $key => $row) {
		$diy_link = $_GPC['diy_link'][$key];
		$diy_image = $_GPC['diy_image'][$key];
		if (!$row || !$diy_link)
			continue;
		$diy_data[] = array(
			'diy_name'  => $row,
			'diy_link'  => $diy_link,
			'diy_image' => $diy_image,
		);
	}

	$common['self_item']			= $_GPC['self_item'];
	$common['article_page']			= $_GPC['article_page'];
	$common['article_copy']			= $_GPC['article_copy'];
	$common['video_watermark']		= intval($_GPC['video_watermark']);
	$common['study_show']			= $_GPC['study_show'];
	$common['category_row_number']	= $_GPC['category_row_number'];
	$common['category_row']			= $_GPC['category_row'];
	$common['article_ico']			= $_GPC['article_ico'];
	$common['teacherlist_ico']		= $_GPC['teacherlist_ico'];
	$common['newlesson_ico']		= $_GPC['newlesson_ico'];
	
	$data = array(
		'uniacid'			=> $uniacid,
		'sitename'			=> trim($_GPC['sitename']),
		'copyright'			=> trim($_GPC['copyright']),
		'template'			=> trim($_GPC['template']),
		'show_newlesson'	=> intval($_GPC['show_newlesson']),
		'lesson_show'		=> intval($_GPC['lesson_show']),
		'lesson_config'		=> json_encode($_GPC['lesson_config']),
		'lesson_poster_status'	=> intval($_GPC['lesson_poster_status']),
		'lesson_vip_status'	=> intval($_GPC['lesson_vip_status']),
		'mustinfo'			=> intval($_GPC['mustinfo']),
		'appoint_mustinfo'  => intval($_GPC['appoint_mustinfo']),
		'user_info'			=> json_encode($_GPC['user_info']),
		'category_ico'		=> $_GPC['category_ico'],
		'self_diy'			=> serialize($diy_data),
		'common'			=> json_encode($common),
		'front_color'		=> $_GPC['front_color'],
		'privacy_agreement' => $_GPC['privacy_agreement'],
		'teacher_agreement' => $_GPC['teacher_agreement'],
		'addtime'			=> time(),
	);

	if($_SERVER['SERVER_NAME']=='wx.haoshu888.com' && $data['template']!='default'){
		message('演示站不允许修改默认模版');
	}

	if (empty($glo_setting)) {
		$result = pdo_insert($this->table_setting, $data);
	} else {
		$result = pdo_update($this->table_setting, $data, array('uniacid' => $uniacid));
	}

	if($result){
		/* 更新设置表缓存 */
		$this->updateCache('fy_lesson_'.$uniacid.'_setting');

		$site_common->addSysLog($_W['uid'], $_W['username'], 3, "基本设置->手机端显示", "编辑手机端显示");
		message('更新成功', $this->createWebUrl('setting', array('op' => 'frontshow')), 'success');
	}else{
		message('更新失败，请稍候重试', "", 'error');
	}
}

if($_GPC['loadcss'] && $_W['isajax']){
	$front_color = file_get_contents(MODULE_ROOT."/template/mobile/{$template}/style/cssv2/diy.css");
	$this->resultJson($front_color);
}