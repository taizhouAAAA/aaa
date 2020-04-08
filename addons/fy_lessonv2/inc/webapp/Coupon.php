<?php
/**
 * 我的优惠券
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
 */

$title = "我的优惠券";
$typeStatus = new TypeStatus();
$source = $typeStatus->couponSource();

$pindex =max(1,$_GPC['page']);
$psize = 12;
$status = trim($_GPC['status']);

$condition = "uniacid=:uniacid AND uid=:uid AND status=:status ";
$params[':uniacid'] = $uniacid;
$params[':uid'] = $uid;
$params[':status'] = $status;

$list = pdo_fetchall("SELECT * FROM " .tablename($this->table_member_coupon). " WHERE {$condition} ORDER BY id DESC LIMIT " . ($pindex-1) * $psize . ',' . $psize, $params);
foreach($list as $k=>$v){
	$category = pdo_get($this->table_category, array('id'=>$v['category_id']), array('name','parentid'));
	$v['category_name'] = $category['name'] ? "仅限[".$category['name']."]分类的课程使用" : "适用于全部课程分类";

	if($v['category_id']){
		if($category['parentid']){
			$v['url'] = "/{$uniacid}/search.html?pid={$category['parentid']}&cid={$v['category_id']}";
		}else{
			$v['url'] = "/{$uniacid}/search.html?pid={$v['category_id']}";
		}
	}else{
		$v['url'] = "/{$uniacid}/search.html";
	}
	$list[$k] = $v;
	
	if(time()>$v['validity'] && $v['status']==0){
		pdo_update($this->table_member_coupon, array('status'=>-1), array('id'=>$v['id']));
		unset($list[$k]);
	}
}

$total = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename($this->table_member_coupon) . " WHERE {$condition} ", $params);
$pager = $webAppCommon->pagination($total, $pindex, $psize);


include $this->template("../webapp/{$template}/coupon");


?>