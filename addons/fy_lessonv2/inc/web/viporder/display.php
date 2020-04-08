<?php

$pindex = max(1, intval($_GPC['page']));
$psize = 15;

$condition = " a.uniacid = :uniacid";
$params[':uniacid'] = $uniacid;

if (!empty($_GPC['ordersn'])) {
	$condition .= " AND a.ordersn LIKE :ordersn ";
	$params[':ordersn'] = "%{$_GPC['ordersn']}%";
}
if ($_GPC['status']!='') {
	$condition .= " AND a.status=:status ";
	$params[':status'] = $_GPC['status'];
}
if (!empty($_GPC['paytype'])) {
	$condition .= " AND a.paytype = :paytype ";
	$params[':paytype'] = $_GPC['paytype'];
}
if (!empty($_GPC['nickname'])) {
	$condition .= " AND b.nickname LIKE :nickname ";
	$params[':nickname'] = "%{$_GPC['nickname']}%";
}

if (strtotime($_GPC['time']['start']) || strtotime($_GPC['time']['end'])) {
	$starttime = strtotime($_GPC['time']['start']);
	$endtime = strtotime($_GPC['time']['end']) + 86399;

	$condition .= " AND a.addtime>=:starttime AND a.addtime<=:endtime";
	$params[':starttime'] = $starttime;
	$params[':endtime'] = $endtime;
}

$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' .tablename($this->table_member_order). " a LEFT JOIN " .tablename($this->table_mc_members). " b ON a.uid=b.uid WHERE {$condition}", $params);

if(!$_GPC['export']){

	$list = pdo_fetchall("SELECT a.*,b.nickname,b.realname,b.mobile FROM " .tablename($this->table_member_order). " a LEFT JOIN " .tablename($this->table_mc_members). " b ON a.uid=b.uid WHERE {$condition} ORDER BY a.id desc, a.addtime DESC LIMIT " .($pindex - 1) * $psize. ',' . $psize, $params);
	foreach($list as $k=>$v){
		$list[$k]['level'] = pdo_fetch("SELECT * FROM " .tablename($this->table_vip_level). " WHERE id=:id", array(':id'=>$v['level_id']));
	}
	
	$pager = pagination($total, $pindex, $psize);
}else{
	set_time_limit(180);
	$psize = 10000;
	$max = ceil($total/$psize);
	$random = random(4);

	for($i=1; $i<=$max; $i++){
		$outputlist = pdo_fetchall("SELECT a.*,b.nickname,b.realname,b.mobile FROM " .tablename($this->table_member_order). " a LEFT JOIN " .tablename($this->table_mc_members). " b ON a.uid=b.uid WHERE {$condition} ORDER BY a.id desc, a.addtime DESC LIMIT " . ($i - 1) * $psize . ',' . $psize, $params);

		foreach ($outputlist as $key => $value) {
			$level = pdo_fetch("SELECT * FROM " .tablename($this->table_vip_level). " WHERE id=:id", array(':id'=>$value['level_id']));
			$level_name = $level['level_name'] ? $level['level_name'] : "默认VIP";
			
			$arr[$key]['ordersn']         = "'".$value['ordersn'];
			$arr[$key]['uid']			  = $value['uid'];
			$arr[$key]['nickname']		  = preg_replace('#[^\x{4e00}-\x{9fa5}A-Za-z0-9]#u','',$value['nickname']);
			$arr[$key]['realname']        = $value['realname'];
			$arr[$key]['mobile']          = $value['mobile'];
			$arr[$key]['viptime']         = $level_name ."-". $value['viptime']."天";
			$arr[$key]['vipmoney']        = $value['vipmoney'];
			$arr[$key]['member1']		  = $value['member1'];
			$arr[$key]['commission1']     = $value['commission1'];
			$arr[$key]['member2']		  = $value['member2'];
			$arr[$key]['commission2']     = $value['commission2'];
			$arr[$key]['member3']		  = $value['member3'];
			$arr[$key]['commission3']     = $value['commission3'];
			$arr[$key]['paytype']		  = $orderPayType[$value['paytype']];
			
			if($value['status'] == '0'){
				$arr[$key]['status'] = "未支付";
			}elseif($value['status'] == '1'){
				$arr[$key]['status'] = "已付款";
			}
			$arr[$key]['addtime']	 = date('Y-m-d H:i:s', $value['addtime']);
		}

		$title = array('订单编号', '用户uid', '昵称', '姓名', '手机号码', '服务时长', '服务价格(元)', '一级推荐人(uid)', '一级佣金(元)', '二级推荐人(uid)', '二级佣金(元)', '三级推荐人(uid)', '三级佣金(元)', '付款方式', '订单状态', '下单时间');
		$filename = 'VIP订单'.$random.$uniacid.'-'.$i;

		$phpexcel = new FyLessonv2PHPExcel();
		$savetype = $max>1 ? 1 : 0;
		$phpexcel->exportTable($title, $arr, $filename, $savetype);
		unset($arr);

		$filenameArr[] = $filename.'-'.date('Ymd').'.xls';
	}

	/* 打包下载 */
	$filepath = '../data/excel/';
	$pack = $filepath.'VIP订单'.$random.$uniacid.'-'.date('Ymd').'.zip';
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
	header('Content-disposition:attachment;filename=VIP订单'.$random.$uniacid.'-'.date('Ymd').'.zip');
	$filesize = filesize($pack);
	readfile($pack);
	header('Content-length:'.$filesize);

	$files = glob($filepath.'*');
	foreach($files as $file) {
		if(strstr($file, "VIP订单{$random}{$uniacid}-")){
			unlink($file);
		}
	}
}