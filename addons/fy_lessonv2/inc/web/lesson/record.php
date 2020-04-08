<?php

$type = intval($_GPC['type']);
$lessonid = intval($_GPC['lessonid']);
$uid = intval($_GPC['uid']);

$pindex = max(1, intval($_GPC['page']));
$psize = 20;

$condition = " a.uniacid=:uniacid ";
$params[':uniacid'] = $uniacid;
if($lessonid>0){
	$condition .= " AND a.lessonid=:lessonid ";
	$params[':lessonid'] = $lessonid;
}
if($uid>0){
	$condition .= " AND a.uid=:uid ";
	$params[':uid'] = $uid;
}

$list = pdo_fetchall("SELECT a.uid,a.playtime,a.addtime,b.bookname,c.title FROM " .tablename($this->table_playrecord). " a INNER JOIN " .tablename($this->table_lesson_parent). " b ON a.lessonid=b.id INNER JOIN " .tablename($this->table_lesson_son). " c ON a.sectionid=c.id WHERE {$condition} ORDER BY a.addtime DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize, $params);
foreach($list as $key=>$value){
	$list[$key]['user'] = pdo_fetch("SELECT nickname,realname,mobile FROM " .tablename('mc_members'). " WHERE uid=:uid", array(':uid'=>$value['uid']));
	$list[$key]['playtime'] = gmdate("H:i:s", $list[$key]['playtime']);
}

$total = pdo_fetchcolumn("SELECT COUNT(*) FROM " .tablename($this->table_playrecord). " a INNER JOIN " .tablename($this->table_lesson_parent). " b ON a.lessonid=b.id INNER JOIN " .tablename($this->table_lesson_son). " c ON a.sectionid=c.id WHERE {$condition}", $params);
$pager = pagination($total, $pindex, $psize);