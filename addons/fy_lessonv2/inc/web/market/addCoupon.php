<?php

$coupon_id = intval($_GPC['coupon_id']);
if($coupon_id>0){
	$coupon = pdo_fetch("SELECT * FROM " .tablename($this->table_mcoupon). " WHERE uniacid=:uniacid AND id=:id", array(':uniacid'=>$uniacid,':id'=>$coupon_id));
	
	if(empty($coupon)){
		message("优惠券不存在", "", "error");
	}

	$validity = json_decode($coupon['validity']);
}

$category_list = pdo_fetchall("SELECT * FROM " .tablename($this->table_category). " WHERE uniacid=:uniacid AND parentid=:parentid ORDER BY displayorder DESC, id DESC", array(':uniacid'=>$uniacid,':parentid'=>0));

if(checksubmit('submit')){
	$data = array(
		'uniacid'			=> $uniacid,
		'name'				=> trim($_GPC['name']),
		'images'			=> trim($_GPC['images']),
		'amount'			=> floatval($_GPC['amount']),
		'conditions'		=> floatval($_GPC['conditions']),
		'category_id'		=> intval($_GPC['category_id']),
		'is_exchange'		=> intval($_GPC['is_exchange']),
		'exchange_integral' => intval($_GPC['exchange_integral']),
		'max_exchange'		=> intval($_GPC['max_exchange']),
		'total_exchange'    => intval($_GPC['total_exchange']),
		'already_exchange'  => intval($_GPC['already_exchange']),
		'validity_type'	    => intval($_GPC['validity_type']),
		'days1'			    => strtotime($_GPC['days1']),
		'days2'				=> intval($_GPC['days2']),
		'status'			=> intval($_GPC['status']),
		'receive_link'		=> intval($_GPC['receive_link']),
		'displayorder'		=> intval($_GPC['displayorder']),
	);

	if(empty($data['name'])){
		message("请输入优惠券名称", "", "error");
	}
	if(empty($data['amount'])){
		message("请输入优惠券面值", "", "error");
	}
	if($data['is_exchange']==1){
		if($data['max_exchange']==0){
			message("请输入最大兑换数量", "", "error");
		}
		if($data['already_exchange']>$data['total_exchange']){
			message("已兑换数量不能大于兑换总数量", "", "error");
		}
		
	}
	if(empty($data['validity_type'])){
		message("请选择有效期方式", "", "error");
	}
	if($data['validity_type']==1 && empty($data['days1'])){
		message("请选择固定有效期日期", "", "error");
	}
	if($data['validity_type']==2 && empty($data['days2'])){
		message("请输入自增有效期天数", "", "error");
	}
	
	if($coupon_id>0){
		$data['update_time'] = time();
		if(pdo_update($this->table_mcoupon, $data, array('id'=>$coupon_id))){
			message("更新成功", $this->createWebUrl('market', array('op'=>'coupon')), "success");
		}else{
			message("更新失败", "", "error");
		}
	}else{
		$data['addtime'] = time();
		if(pdo_insert($this->table_mcoupon, $data)){
			message("新增成功", $this->createWebUrl('market', array('op'=>'coupon')), "success");
		}else{
			message("新增失败", "", "error");
		}
	}
}