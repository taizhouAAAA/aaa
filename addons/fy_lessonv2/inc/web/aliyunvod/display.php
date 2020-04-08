<?php


$pindex = max(1, intval($_GPC['page']));
$psize = 10;

$condition = " uniacid=:uniacid AND teacherid=:teacherid ";
$params[':uniacid'] = $uniacid;
$params[':teacherid'] = intval($_GPC['teacherid']);
if(!empty($_GPC['keyword'])){
	$condition .= " AND name LIKE :name ";
	$params[':name'] = "%".trim($_GPC['keyword'])."%";
}
if (strtotime($_GPC['time']['start']) || strtotime($_GPC['time']['end'])) {
	$starttime = strtotime($_GPC['time']['start']);
	$endtime = strtotime($_GPC['time']['end']) + 86399;

	$condition .= " AND addtime>=:starttime AND addtime<=:endtime";
	$params[':starttime'] = $starttime;
	$params[':endtime'] = $endtime;
}

$list = pdo_fetchall("SELECT * FROM " .tablename($this->table_aliyun_upload). " WHERE {$condition} ORDER BY id DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize, $params);
foreach($list as $key=>$value){

	$list[$key]['suffix'] = strtolower($tmp[count($tmp)-1]);
}

$total = pdo_fetchcolumn("SELECT COUNT(*) FROM " .tablename($this->table_aliyun_upload). " WHERE {$condition}", $params);
$pager = pagination($total, $pindex, $psize);