<?php

$condition = " a.uniacid=:uniacid AND a.is_delete=:is_delete ";
$params[':uniacid'] = $uniacid;
$params[':is_delete'] = intval($_GPC['is_delete']);;

if (!empty($_GPC['keyword'])) {
	$condition .= " AND (a.ordersn LIKE :keyword OR a.bookname LIKE :keyword) ";
	$params[':keyword'] = "%".$_GPC['keyword']."%";
}
if (intval($_GPC['rec_uid'])) {
	$condition .= " AND c.parentid=:parentid ";
	$params[':parentid'] = $_GPC['rec_uid'];
}
if ($_GPC['status']!='') {
	$condition .= " AND a.status=:status ";
	$params[':status'] = $_GPC['status'];
}
if (!empty($_GPC['paytype'])) {
	$condition .= " AND a.paytype = :paytype ";
	$params[':paytype'] = $_GPC['paytype'];
}
if ($_GPC['is_verify']!='') {
	$condition .= " AND a.is_verify=:is_verify ";
	$params[':is_verify'] = $_GPC['is_verify'];
}
if ($_GPC['validity']==2) {
	$condition .= " AND validity<:validity AND validity>0 AND status>0";
	$params[':validity'] = time();
}
if (!empty($_GPC['nickname'])) {
	$condition .= " AND ((b.nickname LIKE :nickname) OR (b.realname LIKE :nickname) OR (b.mobile LIKE :nickname)) ";
	$params[':nickname'] = "%".$_GPC['nickname']."%";
}
if (strtotime($_GPC['time']['start']) || strtotime($_GPC['time']['end'])) {
	$starttime = strtotime($_GPC['time']['start']);
	$endtime = strtotime($_GPC['time']['end']) + 86399;

	$condition .= " AND a.addtime>=:starttime AND a.addtime<=:endtime";
	$params[':starttime'] = $starttime;
	$params[':endtime'] = $endtime;
}

$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' .tablename($this->table_order). " a LEFT JOIN " .tablename($this->table_mc_members). " b ON a.uid=b.uid LEFT JOIN " .tablename($this->table_member). " c ON a.uid=c.uid WHERE {$condition}", $params);

if(!$_GPC['export']){
	$list = pdo_fetchall("SELECT a.*,b.nickname,b.realname,b.mobile FROM " .tablename($this->table_order). " a LEFT JOIN " .tablename($this->table_mc_members). " b ON a.uid=b.uid LEFT JOIN " .tablename($this->table_member). " c ON a.uid=c.uid WHERE {$condition} ORDER BY a.id desc, a.addtime DESC LIMIT " .($pindex - 1) * $psize. ',' . $psize, $params);
	foreach($list as $k=>$v){
		$vipNumber = pdo_fetchcolumn("SELECT COUNT(*) FROM " .tablename($this->table_member_vip). " WHERE uid=:uid AND validity > :validity", array(':uid'=>$v['uid'], ':validity'=>time()));
		$list[$k]['vip'] = $vipNumber>0 ? 1 : 0;
	}
	$pager = pagination($total, $pindex, $psize);


	if($_GPC['status']=='-1'){
		$filename = "已取消课程订单";
	}elseif($_GPC['status']=='0'){
		$filename = "未支付课程订单";
	}elseif($_GPC['status']=='1'){
		$filename = "已付款课程订单";
	}elseif($_GPC['status']=='2'){
		$filename = "已评价课程订单";
	}else{
		$filename = "全部课程订单";
	}

	$site_common->updateOrderVerifyLog(); //更新旧的核销订单记录

}else{
	set_time_limit(180);
	$psize = 10000;
	$max = ceil($total/$psize);
	$random = random(4);

	for($i=1; $i<=$max; $i++){
		$outputlist = pdo_fetchall("SELECT a.*,b.nickname,b.realname,b.mobile,b.msn,b.occupation,b.company,b.graduateschool,b.grade,b.address FROM " .tablename($this->table_order). " a LEFT JOIN " .tablename($this->table_mc_members). " b ON a.uid=b.uid LEFT JOIN " .tablename($this->table_member). " c ON a.uid=c.uid WHERE {$condition} ORDER BY a.id desc, a.addtime DESC LIMIT " . ($i - 1) * $psize . ',' . $psize, $params);

		$j = 0;
		$verify_user = array();
		foreach ($outputlist as $key => $value) {
			$arr[$j]['ordersn']         = "'".$value['ordersn'];
			$arr[$j]['uid']				= $value['uid'];
			$arr[$j]['nickname']		= preg_replace('#[^\x{4e00}-\x{9fa5}A-Za-z0-9]#u','',$value['nickname']);
			$arr[$j]['realname']        = $value['realname'];
			$arr[$j]['mobile']          = $value['mobile'];
			$arr[$j]['spec_name']		= $value['spec_name'];
			if($value['lesson_type']==0){
				$arr[$j]['lesson_type_name'] = "普通课程";
			}elseif($value['lesson_type']==1){
				$arr[$j]['lesson_type_name'] = "报名课程";
			}
			$arr[$j]['bookname']        = $value['bookname'];
			$arr[$j]['price']           = $value['price'];
			$arr[$j]['integral']        = $value['integral'];
			if($value['paytype'] == 'credit'){
				$arr[$j]['paytype'] = "余额支付";
			}elseif($value['paytype'] == 'wechat'){
				$arr[$j]['paytype'] = "微信支付";
			}elseif($value['paytype'] == 'alipay'){
				$arr[$j]['paytype'] = "支付宝支付";
			}elseif($value['paytype'] == 'offline'){
				$arr[$j]['paytype'] = "线下支付";
			}elseif($value['paytype'] == 'admin'){
				$arr[$j]['paytype'] = "后台支付";
			}elseif($value['paytype'] == 'wxapp'){
				$arr[$j]['paytype'] = "微信小程序";
			}elseif($value['paytype'] == '' && $value['status']>0){
				$arr[$j]['paytype'] = "已支付";
			}else{
				$arr[$j]['paytype'] = "无";
			}
			$arr[$j]['member1']			= $value['member1'];
			$arr[$j]['commission1']     = $value['commission1'];
			$arr[$j]['member2']			= $value['member2'];
			$arr[$j]['commission2']     = $value['commission2'];
			$arr[$j]['member3']			= $value['member3'];
			$arr[$j]['commission3']     = $value['commission3'];
			$arr[$j]['teacher_income']  = $value['teacher_income'];
			$arr[$j]['income_amount']	= round($value['price']*$value['teacher_income']*0.01,2);
			
			if($value['status'] == '-2'){
				$arr[$j]['status'] = "已退款";
			}elseif($value['status'] == '-1'){
				$arr[$j]['status'] = "已取消";
			}elseif($value['status'] == '0'){
				$arr[$j]['status'] = "未支付";
			}elseif($value['status'] == '1'){
				$arr[$j]['status'] = "已付款";
			}elseif($value['status'] == '2'){
				$arr[$j]['status'] = "已评价";
			}
			$arr[$j]['addtime'] = date('Y-m-d H:i:s', $value['addtime']);
			if($value['lesson_type']==1){
				$arr[$j]['verify_name'] = $value['is_verify']==1 ? '已核销' : '未核销';
			}else{
				$arr[$j]['verify_name'] ='';
			}

			$appoint_info = json_decode($value['appoint_info'], true);
			foreach($appoint_info as $key=>$item){
				$arr[$j][$key] = $item;
			}
			$j++;
		}

		$title =  array('订单编号','用户uid','昵称','姓名','手机号码','规格名称','课程类型','课程名称','课程价格(元)','获赠积分','付款方式','一级推荐人(uid)','一级佣金(元)','二级推荐人(uid)','二级佣金(元)','三级推荐人(uid)','三级佣金(元)','讲师分成(%)','讲师收入(元)','订单状态','下单时间','核销状态','报名课程信息');
		$filename = '课程订单'.$random.$uniacid.'-'.$i;

		$phpexcel = new FyLessonv2PHPExcel();
		$savetype = $max>1 ? 1 : 0;
		$phpexcel->exportTable($title, $arr, $filename, $savetype);
		unset($arr);

		$filenameArr[] = $filename.'-'.date('Ymd').'.xls';
	}

	/* 打包下载 */
	$filepath = '../data/excel/';
	$pack = $filepath.'课程订单'.$random.$uniacid.'-'.date('Ymd').'.zip';
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
	header('Content-disposition:attachment;filename=课程订单'.$random.$uniacid.'-'.date('Ymd').'.zip');
	$filesize = filesize($pack);
	readfile($pack);
	header('Content-length:'.$filesize);

	$files = glob($filepath.'*');
	foreach($files as $file) {
		if(strstr($file, "课程订单{$random}{$uniacid}-")){
			unlink($file);
		}
	}
}

?>