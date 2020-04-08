<?php

$nickname = trim($_GPC['nickname']);
$bookname = trim($_GPC['bookname']);
$grade	  = intval($_GPC['grade']);
$remark	  = trim($_GPC['remark']);

$condition = " uniacid='{$uniacid}' ";
if (strtotime($_GPC['time']['start']) || strtotime($_GPC['time']['end'])) {
	$starttime = strtotime($_GPC['time']['start']);
	$endtime = strtotime($_GPC['time']['end']) + 86399;

	$condition .= " AND addtime>=:starttime AND addtime<=:endtime";
	$params[':starttime'] = $starttime;
	$params[':endtime'] = $endtime;
}

if(!empty($nickname)){
	$condition .= " AND nickname LIKE :nickname ";
	$params[':nickname'] = "%".$nickname."%";
}

if(!empty($bookname)){
	$condition .= " AND bookname LIKE :bookname ";
	$params[':bookname'] = "%".$bookname."%";
}
if(!empty($grade)){
	$condition .= " AND grade = :grade ";
	$params[':grade'] = $grade;
}
if(!empty($remark)){
	$condition .= " AND remark LIKE :remark ";
	$params[':remark'] = '%'.$remark.'%';
}

$total = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename($this->table_commission_log) . " WHERE {$condition} ", $params);


if(!$_GPC['export']){
	$list = pdo_fetchall("SELECT * FROM " . tablename($this->table_commission_log) . " WHERE {$condition} ORDER BY id DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize, $params);
	$pager = pagination($total, $pindex, $psize);

	$change_total_num = pdo_fetchcolumn("SELECT SUM(change_num) FROM " . tablename($this->table_commission_log) . " WHERE {$condition}", $params);

}else{
	set_time_limit(180);
	$psize = 10000;
	$max = ceil($total/$psize);
	$random = random(4);

	for($i=1; $i<=$max; $i++){
		$lists = pdo_fetchall("SELECT * FROM " . tablename($this->table_commission_log) . " WHERE {$condition} ORDER BY id DESC LIMIT " . ($i - 1) * $psize . ',' . $psize, $params);

		foreach ($lists as $key => $value) {
			$arr[$key]['id']			 = $value['id'];
			$arr[$key]['uid']			 = $value['uid'];
			$arr[$key]['nickname']       = preg_replace('#[^\x{4e00}-\x{9fa5}A-Za-z0-9]#u','',$value['nickname']);
			$arr[$key]['bookname']       = $value['bookname'];
			$arr[$key]['grade']			 = '其他';
			if($value['grade'] == '1'){
				$arr[$key]['grade'] = '一级分销';
			}elseif($value['grade'] == '2'){
				$arr[$key]['grade'] = '二级分销';
			}elseif($value['grade'] == '3'){
				$arr[$key]['grade'] = '三级分销';
			}
			$arr[$key]['change_num']      = $value['change_num'].'元';
			$arr[$key]['remark']		  = is_numeric($value['remark']) ? "'".$value['remark'] : $value['remark'];
			$arr[$key]['addtime']         = date('Y-m-d H:i:s',$value['addtime']);
		}

		$title = array('编号', '会员ID', '会员昵称', '分销课程', '分销等级', '分销佣金(元)', '备注', '分销时间');
		$filename = '分销佣金明细'.$random.$uniacid.'-'.$i;

		$phpexcel = new FyLessonv2PHPExcel();
		$savetype = $max>1 ? 1 : 0;
		$phpexcel->exportTable($title, $arr, $filename, $savetype);
		unset($arr);

		$filenameArr[] = $filename.'-'.date('Ymd').'.xls';
	}

	/* 打包下载 */
	$filepath = '../data/excel/';
	$pack = $filepath.'分销佣金明细'.$random.$uniacid.'-'.date('Ymd').'.zip';
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
	header('Content-disposition:attachment;filename=分销佣金明细'.$random.$uniacid.'-'.date('Ymd').'.zip');
	$filesize = filesize($pack);
	readfile($pack);
	header('Content-length:'.$filesize);

	$files = glob($filepath.'*');
	foreach($files as $file) {
		if(strstr($file, "分销佣金明细{$random}{$uniacid}-")){
			unlink($file);
		}
	}
}

?>