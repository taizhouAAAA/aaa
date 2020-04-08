<?php

$level_list = pdo_fetchall("SELECT * FROM " .tablename($this->table_vip_level). " WHERE uniacid=:uniacid", array(':uniacid'=>$uniacid));

$pindex = max(1, intval($_GPC['page']));
$psize = 15;
$time = time();


$ordersn	= trim(($_GPC['ordersn']));
$own_uid	= trim(($_GPC['own_uid']));
$id1		= trim(($_GPC['id1']));
$id2		= trim(($_GPC['id2']));
$password	= trim(($_GPC['password']));
$is_use		= trim(($_GPC['is_use']));
$level_id	= trim(($_GPC['level_id']));

$condition = " uniacid=:uniacid ";
$params[':uniacid'] = $uniacid;

if (!empty($ordersn)) {
	$condition .= " AND ordersn=:ordersn ";
	$params[':ordersn'] = $ordersn;
}
if ($own_uid != '') {
	$condition .= " AND own_uid=:own_uid ";
	$params[':own_uid'] = $own_uid;
}
if ($id1 && $id2) {
	$condition .= " AND id>=:id1 AND id<=:id2";
	$params[':id1'] = $id1;
	$params[':id2'] = $id2;
}elseif ($id1 && !$id2) {
	$condition .= " AND id=:id1";
	$params[':id1'] = $id1;
}elseif (!$id1 && $id2) {
	$condition .= " AND id=:id2";
	$params[':id2'] = $id2;
}
if (!empty($password)) {
	$condition .= " AND password=:password";
	$params[':password'] = $password;
}
if ($is_use != '') {
	if($is_use==0){
		$condition .= " AND is_use=:is_use AND validity>:validity ";
		$params[':is_use'] = 0;
		$params[':validity'] = $time;

	}elseif($is_use==1){
		$condition .= " AND is_use=:is_use ";
		$params[':is_use'] = $is_use;

	}elseif($is_use==-1){
		$condition .= " AND is_use=:is_use AND validity<:validity ";
		$params[':is_use'] = 0;
		$params[':validity'] = $time;
	}
}
if (!empty($level_id)) {
	$condition .= " AND level_id=:level_id ";
	$params[':level_id'] = $level_id;
}
if (!empty($_GPC['time']['start'])) {
	$starttime	= strtotime($_GPC['time']['start']);
	$endtime	= strtotime($_GPC['time']['end']);
	$endtime = !empty($endtime) ? $endtime + 86399 : 0;
	if (!empty($starttime)) {
		$condition .= " AND use_time>=:starttime ";
		$params[':starttime'] = $starttime;
	}
	if (!empty($endtime)) {
		$condition .= " AND use_time<:endtime ";
		$params[':endtime'] = $endtime;
	}
}

$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' .tablename($this->table_vipcard). " WHERE {$condition}", $params);

if(!$_GPC['export']){
	$list = pdo_fetchall("SELECT * FROM " .tablename($this->table_vipcard). " WHERE {$condition} ORDER BY id ASC LIMIT " .($pindex - 1) * $psize. ',' . $psize, $params);
	foreach($list as $k=>$v){
		$v['level'] = $site_common->getLevelById($v['level_id']);
		if($v['own_uid']){
			$own_user = pdo_get($this->table_mc_members, array('uniacid'=>$uniacid,'uid'=>$v['own_uid']), array('nickname'));
			$v['own_nickname'] = $own_user['nickname'];
		}

		$list[$k] = $v;
	}

	$pager = pagination($total, $pindex, $psize);

}else{
	set_time_limit(180);
	$psize = 10000;
	$max = ceil($total/$psize);
	$random = random(4);

	$vip_level = array();
	$vip_level_list = pdo_getall($this->table_vip_level, array('uniacid'=>$uniacid), array('id','level_name'));
	foreach($vip_level_list as $level){
		$vip_level[$level['id']] = $level['level_name'];
	}

	for($i=1; $i<=$max; $i++){
		$outputlist = pdo_fetchall("SELECT * FROM " .tablename($this->table_vipcard). " WHERE {$condition} LIMIT " . ($i - 1) * $psize . ',' . $psize, $params);

		$j = 0;
		foreach ($outputlist as $value) {
			$arr[$j]['id']			= $value['id'];
			$arr[$j]['password']	= $value['password'];
			$arr[$j]['level_name']	= $vip_level[$value['level_id']];
			$arr[$j]['viptime']		= $value['viptime'];
			$arr[$j]['validity']	= date('Y-m-d H:i:s',$value['validity']);
			if($value['is_use']==1){
				$status = "已使用";
			}elseif($value['is_use']==0 && $value['validity']>time()){
				$status = "未使用";
			}elseif($value['is_use']==0 && $value['validity']<time()){
				$status = "已过期";
			}
			$arr[$j]['is_use']		= $status;
			$arr[$j]['own_uid']		= $value['own_uid'];
			$arr[$j]['nickname']    = $value['nickname'];
			$arr[$j]['ordersn']     = $value['ordersn'];
			$arr[$j]['use_time']    = $value['use_time']?date('Y-m-d H:i:s', $value['use_time']):'';
			$arr[$j]['addtime']     = date('Y-m-d H:i:s', $value['addtime']);

			$j++;
		}

		$title = array('服务卡号', '卡密','VIP等级', '卡时长(天)','有效期', '卡状态', '拥有者uid', '使用者', '订单号', '使用时间', '添加时间');
		$filename = 'VIP服务卡'.$random.$uniacid.'-'.$i;

		$phpexcel = new FyLessonv2PHPExcel();
		$savetype = $max>1 ? 1 : 0;
		$phpexcel->exportTable($title, $arr, $filename, $savetype);
		unset($arr);

		$filenameArr[] = $filename.'-'.date('Ymd').'.xls';
	}

	/* 打包下载 */
	$filepath = '../data/excel/';
	$pack = $filepath.'VIP服务卡'.$random.$uniacid.'-'.date('Ymd').'.zip';
	$zip = new ZipArchive();

	if($zip->open($pack, ZipArchive::CREATE)=== TRUE){
		foreach($filenameArr as $file){
			if(file_exists($filepath.$file)){
				$zip->addFile($filepath.$file);
			}else{
				exit('无法打开文件，或者文件创建失败');
			}
		}
		$zip->close();
	}

	header('Content-Type:text/html;charset=utf-8');
	header('Content-disposition:attachment;filename=VIP服务卡'.$random.$uniacid.'-'.date('Ymd').'.zip');
	$filesize = filesize($pack);
	readfile($pack);
	header('Content-length:'.$filesize);

	$files = glob($filepath.'*');
	foreach($files as $file) {
		if(strstr($file, "VIP服务卡{$random}{$uniacid}-")){
			unlink($file);
		}
	}

}