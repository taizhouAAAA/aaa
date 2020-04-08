<?php
/**
 * 课程订单管理
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
 */

load()->model('mc');

include_once dirname(__FILE__).'/../core/Payresult.php';
$pay_result = new Payresult();

/* 订单状态、支付列表 */
$typeStatus = new TypeStatus();
$orderStatusList = $typeStatus->orderStatus();
$orderPayType = $typeStatus->orderPayType();

$pindex = max(1, intval($_GPC['page']));
$psize = 10;

if($op == 'display') {
	
	include_once "order/display.php";

}elseif ($op == 'detail') {
	
	include_once "order/detail.php";

}elseif($op == 'confirmpay') {
	
	include_once "order/confirmpay.php";

}elseif($op == 'recycle') {
	
	include_once "order/recycle.php";

}elseif($op == 'delAll') {
	
	include_once "order/delAll.php";

}elseif($op=='createOrder'){

	include_once "order/createOrder.php";

}elseif($op=='couponCode'){
	
	include_once "order/couponCode.php";

}elseif($op=='addCouponCode'){
	
	include_once "order/addCouponCode.php";

}elseif($op=='delAllCoupon'){
	
	include_once "order/delAllCoupon.php";

}

if(!in_array($op , array('getLesson','getMember'))){
	include $this->template('web/order');
}


?>