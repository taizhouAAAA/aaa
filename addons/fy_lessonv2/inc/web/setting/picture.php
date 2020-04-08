<?php

if (checksubmit('submit')) {
	if (is_array($_GPC['displayorder'])) {
		foreach ($_GPC['displayorder'] as $k => $v) {
			$data = array('displayorder' => intval($_GPC['displayorder'][$k]));
			pdo_update($this->table_banner, $data, array('banner_id' => $k));
		}
	}
	message('批量排序成功', $this->createWebUrl('setting', array('op'=>'picture')), 'success');
}


$condition = " uniacid=:uniacid ";
$params[':uniacid'] = $uniacid;
$bannerType = $typeStatus->bannerType();

if($_GPC['banner_name']){
	$condition .= " AND banner_name LIKE :banner_name";
	$params[':banner_name'] = '%'.trim($_GPC['banner_name']).'%';
}
if($_GPC['banner_type']!=''){
	$condition .= " AND banner_type=:banner_type";
	$params[':banner_type'] = intval($_GPC['banner_type']);
}
if($_GPC['is_pc']!=''){
	$condition .= " AND is_pc=:is_pc";
	$params[':is_pc'] = intval($_GPC['is_pc']);
}
if($_GPC['is_show']!=''){
	$condition .= " AND is_show=:is_show";
	$params[':is_show'] = intval($_GPC['is_show']);
}

$list = pdo_fetchall("SELECT * FROM " .tablename($this->table_banner). " WHERE {$condition} ORDER BY displayorder desc,banner_id desc LIMIT " .($pindex - 1) * $psize. ',' . $psize, $params);
$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' .tablename($this->table_banner). "  WHERE {$condition}", $params);
$pager = pagination($total, $pindex, $psize);

if($_GPC['syspic']){
	$config = $this->module['config'];
	if($config['mylesson_bg']){
		$mylesson_bg = pdo_get($this->table_banner, array('uniacid'=>$uniacid, 'banner_type'=>6, 'is_pc'=>0));
		if(!$mylesson_bg){
			$data = array(
				'uniacid' => $uniacid,
				'banner_name' => '我的课程图片(手机端)',
				'picture' => $config['mylesson_bg'],
				'is_pc' => 0,
				'is_show' => 1,
				'banner_type' => 6,
				'addtime' => time(),
				'update_time' => time(),
			);
			pdo_insert($this->table_banner, $data);
		}
	}
	if($config['ucenter_bg']){
		$ucenter_bg = pdo_get($this->table_banner, array('uniacid'=>$uniacid, 'banner_type'=>7, 'is_pc'=>0));
		if(!$ucenter_bg){
			$data = array(
				'uniacid' => $uniacid,
				'banner_name' => '个人中心图片(手机端)',
				'picture' => $config['ucenter_bg'],
				'is_pc' => 0,
				'is_show' => 1,
				'banner_type' => 7,
				'addtime' => time(),
				'update_time' => time(),
			);
			pdo_insert($this->table_banner, $data);
		}
	}
	if($config['vip_bg']){
		$vip_bg = pdo_get($this->table_banner, array('uniacid'=>$uniacid, 'banner_type'=>8, 'is_pc'=>0));
		if(!$vip_bg){
			$data = array(
				'uniacid' => $uniacid,
				'banner_name' => 'VIP服务图片(手机端)',
				'picture' => $config['vip_bg'],
				'is_pc' => 0,
				'is_show' => 1,
				'banner_type' => 8,
				'addtime' => time(),
				'update_time' => time(),
			);
			pdo_insert($this->table_banner, $data);
		}
	}
	if($config['vip_bg_pc']){
		$vip_bg_pc = pdo_get($this->table_banner, array('uniacid'=>$uniacid, 'banner_type'=>8, 'is_pc'=>1));
		if(!$vip_bg_pc){
			$data = array(
				'uniacid' => $uniacid,
				'banner_name' => 'VIP服务图片(PC端)',
				'picture' => $config['vip_bg_pc'],
				'is_pc' => 1,
				'is_show' => 1,
				'banner_type' => 8,
				'addtime' => time(),
				'update_time' => time(),
			);
			pdo_insert($this->table_banner, $data);
		}
	}
	if($config['myteacher_bg']){
		$myteacher_bg = pdo_get($this->table_banner, array('uniacid'=>$uniacid, 'banner_type'=>9, 'is_pc'=>0));
		if(!$myteacher_bg){
			$data = array(
				'uniacid' => $uniacid,
				'banner_name' => '讲师服务图片(手机端)',
				'picture' => $config['myteacher_bg'],
				'is_pc' => 0,
				'is_show' => 1,
				'banner_type' => 9,
				'addtime' => time(),
				'update_time' => time(),
			);
			pdo_insert($this->table_banner, $data);
		}
	}
	if($config['teacher_bg']){
		$teacher_bg = pdo_get($this->table_banner, array('uniacid'=>$uniacid, 'banner_type'=>10, 'is_pc'=>0));
		if(!$teacher_bg){
			$data = array(
				'uniacid' => $uniacid,
				'banner_name' => '讲师主页图片(手机端)',
				'picture' => $config['teacher_bg'],
				'is_pc' => 0,
				'is_show' => 1,
				'banner_type' => 10,
				'addtime' => time(),
				'update_time' => time(),
			);
			pdo_insert($this->table_banner, $data);
		}
	}
	if($config['teacher_bg_pc']){
		$teacher_bg_pc = pdo_get($this->table_banner, array('uniacid'=>$uniacid, 'banner_type'=>10, 'is_pc'=>1));
		if(!$teacher_bg_pc){
			$data = array(
				'uniacid' => $uniacid,
				'banner_name' => '讲师主页图片(PC端)',
				'picture' => $config['teacher_bg_pc'],
				'is_pc' => 1,
				'is_show' => 1,
				'banner_type' => 10,
				'addtime' => time(),
				'update_time' => time(),
			);
			pdo_insert($this->table_banner, $data);
		}
	}

	message('同步成功', $this->createWebUrl('setting', array('op'=>'picture')), 'success');
}