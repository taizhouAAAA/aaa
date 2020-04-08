<?php

if (checksubmit('submit')) { /* 排序 */
	if (is_array($_GPC['lessonorder'])) {
		foreach ($_GPC['lessonorder'] as $pid => $val) {
			$data = array('displayorder' => intval($_GPC['lessonorder'][$pid]));
			pdo_update($this->table_lesson_parent, $data, array('id' => $pid));
		}
	}
	if (is_array($_GPC['sectionorder'])) {
		foreach ($_GPC['sectionorder'] as $sid => $val) {
			$data = array('displayorder' => intval($_GPC['sectionorder'][$sid]));
			pdo_update($this->table_lesson_son, $data, array('id' => $sid));
		}
	}
	message('操作成功!', referer, 'success');
}

/* 推荐板块列表 */
$rec_list = pdo_getall($this->table_recommend, array('uniacid'=>$uniacid), array('id','rec_name'));

/* VIP列表 */
$vip_list = pdo_getall($this->table_vip_level, array('uniacid'=>$uniacid), array('id','level_name'));


$pindex = max(1, intval($_GPC['page']));
$psize = 10;

$bookname = trim($_GPC['bookname']);
$teacher  = trim($_GPC['teacher']);
$teacherid= intval($_GPC['teacherid']);
$pid      = intval($_GPC['pid']);
$cid      = intval($_GPC['cid']);
$recid	  = intval($_GPC['recid']);
$lesson_type  = trim($_GPC['lesson_type']);
$status   = trim($_GPC['status']);
$vip_id   = trim($_GPC['vip_id']);
$attr1  = intval($_GPC['attribute1']);
$attr2  = intval($_GPC['attribute2']);

$condition = " a.uniacid=:uniacid ";
$params[':uniacid'] = $uniacid;

if($teacherid){
	$condition .= " AND a.teacherid = :teacherid ";
	$params[':teacherid'] = $teacherid;
}
if($pid){
	$condition .= " AND a.pid=:pid ";
	$params[':pid'] = $pid;
}
if($cid){
	$condition .= " AND a.cid=:cid ";
	$params[':cid'] = $cid;
}
if($lesson_type != ''){
	$condition .= " AND a.lesson_type=:lesson_type ";
	$params[':lesson_type'] = $lesson_type;
}
if($status != ''){
	if($status == 999){
		$condition .= " AND a.stock < :stock ";
		$params[':stock'] = 10;
	}else{
		$condition .= " AND a.status=:status ";
		$params[':status'] = $status;
	}
}
if($vip_id){
	$condition .= " AND a.vipview LIKE :vipview ";
	$params[':vipview'] = '%"'.$vip_id.'"%';
}
if($bookname!=''){
	$condition .= " AND a.bookname LIKE :bookname ";
	$params[':bookname'] = "%".$bookname."%";
}
if($teacher!=''){
	$condition .= " AND b.teacher LIKE :teacher ";
	$params[':teacher'] = "%".$teacher."%";
}
if($recid){
	$condition .= " AND ((a.recommendid='{$recid}') OR (a.recommendid LIKE '{$recid},%') OR (a.recommendid LIKE '%,{$recid}') OR (a.recommendid LIKE '%,{$recid},%')) ";
}
if($attr1){
	$condition .= " AND a.attribute1=:attribute1 ";
	$params[':attribute1'] = $attr1;
}
if($attr2){
	$condition .= " AND a.attribute2=:attribute2 ";
	$params[':attribute2'] = $attr2;
}

$list = pdo_fetchall("SELECT a.id,a.lesson_type,a.pid,a.cid,a.bookname,a.price,a.buynum,a.stock,a.displayorder,a.status,a.section_status,a.vip_number,a.teacher_number,a.visit_number,b.teacher FROM " .tablename($this->table_lesson_parent). " a LEFT JOIN " .tablename($this->table_teacher). " b ON a.teacherid=b.id WHERE {$condition} ORDER BY a.displayorder DESC,a.id DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize, $params);

foreach($list as $key=>$value){
	$cat_id = $value['cid'] ? $value['cid'] : $value['pid'];
	if($cat_id>0){
		$list[$key]['category'] = pdo_fetch("SELECT name FROM " .tablename($this->table_category). " WHERE id=:id", array(':id'=>$cat_id));
	}
}

$total = pdo_fetchcolumn("SELECT COUNT(*) FROM " .tablename($this->table_lesson_parent). " a LEFT JOIN " . tablename($this->table_teacher) . " b ON a.teacherid=b.id WHERE {$condition}", $params);
$pager = pagination($total, $pindex, $psize);