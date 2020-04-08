<?php

$pindex = max(1, intval($_GPC['page']));
$psize = 10;

$condition = "a.uniacid=:uniacid";
$params[':uniacid'] = $uniacid;

if (!empty($_GPC['ordersn'])) {
	$condition .= " AND a.ordersn LIKE :ordersn ";
	$params[':ordersn'] = "%".$_GPC['ordersn']."%";
}
if ($_GPC['uid']) {
	$condition .= " AND a.uid=:uid ";
	$params[':uid'] = $_GPC['uid'];
}
if ($_GPC['status']!='') {
	$condition .= " AND a.status=:status ";
	$params[':status'] = $_GPC['status'];
}
if ($_GPC['source']) {
	$condition .= " AND a.source=:source ";
	$params[':source'] = $_GPC['source'];
}
if (strtotime($_GPC['time']['start']) || strtotime($_GPC['time']['end'])) {
	$starttime = strtotime($_GPC['time']['start']);
	$endtime = strtotime($_GPC['time']['end']) + 86399;

	$condition .= " AND a.addtime>=:starttime AND a.addtime<=:endtime";
	$params[':starttime'] = $starttime;
	$params[':endtime'] = $endtime;
}
$condition .= " AND a.uid>0";

$list = pdo_fetchall("SELECT a.*,b.nickname,b.mobile,b.realname FROM " .tablename($this->table_member_coupon). " a LEFT JOIN " .tablename($this->table_mc_members). " b ON a.uid=b.uid WHERE {$condition} ORDER BY a.id DESC LIMIT ".($pindex - 1) * $psize . ',' . $psize, $params);
foreach($list as $k=>$v){
	if($v['category_id']>0){
		$category = pdo_fetch("SELECT name FROM " .tablename($this->table_category). " WHERE id=:id", array(':id'=>$v['category_id']));
	}
	$list[$k]['category_name'] = $category['name'] ? "[".$category['name']."]课程分类" : "全部课程分类";
	if(time()>$v['validity'] && $v['status']==0){
		pdo_update($this->table_member_coupon, array('status'=>-1), array('id'=>$v['id']));
		$list[$k]['status'] = -1;
	}
	unset($category);
}

$total = pdo_fetchcolumn("SELECT COUNT(*) FROM " .tablename($this->table_member_coupon). " a LEFT JOIN " .tablename($this->table_mc_members). " b ON a.uid=b.uid WHERE {$condition}", $params);

$pager = pagination($total, $pindex, $psize);