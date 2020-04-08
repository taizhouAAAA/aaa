<?php 

$pindex = max(1, intval($_GPC['page']));
$psize = 10;

$keyword  = trim($_GPC['keyword']);
$uid      = intval($_GPC['uid']);
$orderby  = intval($_GPC['orderby']);

$condition = " a.uniacid=:uniacid ";
$params[':uniacid'] = $uniacid;
if($keyword!=''){
	$condition .= " AND (b.nickname LIKE :keyword OR b.realname LIKE :keyword OR b.mobile LIKE :keyword) ";
	$params[':keyword'] = "%".$keyword."%";
}
if($uid){
	$condition .= " AND a.uid = :uid ";
	$params[':uid'] = $uid;
}
if($orderby==1){
	$order = " ORDER BY a.video_duration DESC ";
}elseif($orderby==2){
	$order = " ORDER BY a.article_duration DESC ";
}elseif($orderby==3){
	$order = " ORDER BY a.audio_duration DESC ";
}elseif($orderby==4){
	$order = " ORDER BY a.total_duration DESC ";
}else{
	$order = " ORDER BY a.duration_uptime DESC ";
}

$list = pdo_fetchall("SELECT a.uid, a.article_duration,a.audio_duration,a.video_duration,(a.article_duration+a.audio_duration+a.video_duration) AS total_duration,b.nickname,b.realname,b.mobile,b.avatar FROM " .tablename($this->table_member). " a LEFT JOIN " .tablename($this->table_mc_members). " b ON a.uid=b.uid WHERE {$condition} {$order},uid DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize, $params);
foreach($list as $k=>$v){
	$list[$k]['article_duration'] = $site_common->secToTime($v['article_duration']);
	$list[$k]['audio_duration'] = $site_common->secToTime($v['audio_duration']);
	$list[$k]['video_duration'] = $site_common->secToTime($v['video_duration']);
	$list[$k]['total_duration'] = $site_common->secToTime($v['total_duration']);
}

$total = pdo_fetchcolumn("SELECT COUNT(*) FROM " .tablename($this->table_member). " a LEFT JOIN " . tablename($this->table_mc_members) . " b ON a.uid=b.uid WHERE {$condition}", $params);
$pager = pagination($total, $pindex, $psize);