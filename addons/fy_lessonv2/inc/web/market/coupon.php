<?php


if (checksubmit('submitOrder')) { /* 排序 */
	if (is_array($_GPC['displayorder'])) {
		foreach ($_GPC['displayorder'] as $k => $v) {
			$data = array('displayorder' => intval($v));
			pdo_update($this->table_mcoupon, $data, array('id' => $k));
		}
	}
	message('操作成功!', referer, 'success');
}



$list = pdo_fetchall("SELECT * FROM " .tablename($this->table_mcoupon). " WHERE uniacid=:uniacid ORDER BY status DESC,displayorder DESC, id DESC LIMIT ".($pindex - 1) * $psize . ',' . $psize, array(':uniacid'=>$uniacid));
foreach($list as $k=>$v){
	$category = pdo_fetch("SELECT name FROM " .tablename($this->table_category). " WHERE id=:id", array(':id'=>$v['category_id']));
	$list[$k]['category_name'] = $category['name'] ? "[".$category['name']."]课程分类" : "全部课程分类";
	unset($category);
}

$total = pdo_fetchcolumn("SELECT COUNT(*) FROM " .tablename($this->table_mcoupon). " WHERE uniacid=:uniacid", array(':uniacid'=>$uniacid));
$pager = pagination($total, $pindex, $psize);