<?php

$lessonids = trim($_GPC['lessonids']);
if(empty($lessonids)){
	$data = array(
		'code' => -1,
		'msg'  => '请选择课程',
	);
	$this->resultJson($data);
}
$ids = explode(',', $lessonids);

if($_GPC['type']=='online' || $_GPC['type']=='offline'){
	if($_GPC['type']=='online'){
		$status = 1;
		$msg = '批量上架成功';
	}elseif($_GPC['type']=='offline'){
		$status = 0;
		$msg = '批量下架成功';
	}

	foreach($ids as $item){
		pdo_update($this->table_lesson_parent, array('status'=>$status), array('uniacid'=>$uniacid,'id'=>$item));
	}

	$data = array(
		'code' => 0,
		'msg'  => $msg,
	);
	$this->resultJson($data);

}elseif($_GPC['type']=='setVIP'){
	$vips = trim($_GPC['vips']);
	if(empty($vips)){
		$data = array(
			'code' => -1,
			'msg'  => '请选择免费学习的VIP等级',
		);
		$this->resultJson($data);
	}

	$vipview = explode(',', $vips);
	foreach($ids as $item){
		pdo_update($this->table_lesson_parent, array('vipview'=>json_encode($vipview)), array('uniacid'=>$uniacid,'id'=>$item));
	}

	$data = array(
		'code' => 0,
		'msg'  => '批量设置免费学习等级成功',
	);
	$this->resultJson($data);

}


exit();