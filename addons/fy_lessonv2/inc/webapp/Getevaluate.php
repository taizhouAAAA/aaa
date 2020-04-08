<?php
/**
 * 获取课程评价
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
 */

/* 课程id */
$id = intval($_GPC['id']);

$pindex =max(1,$_GPC['page']);
$psize = 10;

$evaluate_list = pdo_fetchall("SELECT a.lessonid,a.bookname,a.nickname,a.grade,a.content,a.reply,a.addtime, b.avatar FROM " .tablename($this->table_evaluate). " a LEFT JOIN " .tablename($this->table_mc_members). " b ON a.uid=b.uid WHERE a.lessonid=:lessonid AND a.status=:status ORDER BY a.type DESC, a.addtime DESC, a.id DESC LIMIT " . ($pindex-1) * $psize . ',' . $psize, array('lessonid'=>$id,':status'=>1));
foreach($evaluate_list as $key=>$value){
	if($value['grade']==1){
		$evaluate_list[$key]['grade'] = "好评";
		$evaluate_list[$key]['grade_ico'] = MODULE_URL.'static/webapp/default/images/oc-h.png';
	}elseif($value['grade']==2){
		$evaluate_list[$key]['grade'] = "中评";
		$evaluate_list[$key]['grade_ico'] = MODULE_URL.'static/webapp/default/images/oc-z.png';
	}elseif($value['grade']==3){
		$evaluate_list[$key]['grade'] = "差评";
		$evaluate_list[$key]['grade_ico'] = MODULE_URL.'static/webapp/default/images/oc-c.png';
	}

	if($setting['show_evaluate_time']){
		$evaluate_list[$key]['addtime'] = date('Y-m-d', $value['addtime']);
	}else{
		$evaluate_list[$key]['addtime'] = '';
	}

	if(empty($value['avatar'])){
		$evaluate_list[$key]['avatar'] = MODULE_URL."static/webapp/default/images/default_avatar.jpg";
	}else{
		$inc = strstr($value['avatar'], "http://") || strstr($value['avatar'], "https://");
		$evaluate_list[$key]['avatar'] = $inc ? $value['avatar'] : $_W['attachurl'].$value['avatar'];
	}
}

$evaluate_total = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename($this->table_evaluate) . " WHERE lessonid=:lessonid AND status=:status", array(':lessonid'=>$id,':status'=>1));
$page_total = ceil($evaluate_total/$psize);


$range = array();
$range['start'] = max(1, $pindex - 2);
$range['end'] = min($page_total, $pindex + 2);

$html = '<ul class="hg-40 ql_pages m-auto text-c">';
$html .= ($pindex > $page_total || $pindex==1) ? '<li><a href="javascript:;" class="end">&lt;</a></li>' : '<li><a href="#content-info" data-page="'.($pindex-1).'">&lt;</a></li>';

if ($range['end'] - $range['start'] < 4) {
	$range['end'] = min($page_total, $range['start'] + 4);
	$range['start'] = max(1, $range['end'] - 4);
}
for ($i = $range['start']; $i <= $range['end']; $i++) {
	$html .= ($i == $pindex ? '<li><a href="#content-info" class="cur" data-page="'.$i.'">'.$i.'</a></li>' : '<li><a href="#content-info" data-page="'.$i.'">'.$i.'</a></li>');
}
$html .= $pindex >= $page_total ? '<li><a href="javascript:;" class="end">&gt;</a></li>' : '<li><a href="#content-info" data-page="'.($pindex+1).'">&gt;</a></li>';
$html .= '</ul>';


$data = array(
	'evaluate_list' => $evaluate_list,
	'pager_html'	=> $html,
);

$this->resultJson($data);


?>