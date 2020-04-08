<?php
/**
 * 获取订单状态
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
 */

$orderid = intval($_GPC['orderid']);
$ordertype = $_GPC['ordertype'];

if($_GPC['ordertype'] == "buyvip"){
	$order = pdo_get($this->table_member_order, array('uniacid'=>$uniacid,'uid'=>$uid,'id'=>$orderid));
	if(!$order){
		$jsonData = array(
			'code' => -1,
			'message' => '订单不存在',
		);
		$this->resultJson($jsonData);
	}

	$jsonData = array(
		'code' => 0,
		'orderstatus' => $order['status'],
		'url' => $_W['siteroot']."{$uniacid}/myvip.html",
	);
	$this->resultJson($jsonData);

}elseif($_GPC['ordertype'] == "buylesson"){
	
	$order = pdo_get($this->table_order, array('uniacid'=>$uniacid,'uid'=>$uid,'id'=>$orderid));
	if(!$order){
		$jsonData = array(
			'code' => -1,
			'message' => '订单不存在',
		);
		$this->resultJson($jsonData);
	}

	$jsonData = array(
		'code' => 0,
		'orderstatus' => $order['status'],
		'url' => $_W['siteroot']."{$uniacid}/mylesson.html",
	);
	$this->resultJson($jsonData);

}elseif($_GPC['ordertype'] == "buyteacher"){
	$order = pdo_get($this->table_teacher_order, array('uniacid'=>$uniacid,'uid'=>$uid,'id'=>$orderid));
	if(!$order){
		$jsonData = array(
			'code' => -1,
			'message' => '订单不存在',
		);
		$this->resultJson($jsonData);
	}

	$jsonData = array(
		'code' => 0,
		'orderstatus' => $order['status'],
		'url' => $_W['siteroot']."{$uniacid}/myteacher.html",
	);
	$this->resultJson($jsonData);

}else{
	$jsonData = array(
		'code' => -1,
		'message' => '参数错误',
	);
	$this->resultJson($jsonData);
}


?>