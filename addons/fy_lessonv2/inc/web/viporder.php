<?php
/**
 * 会员VIP服务订单管理
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
$typeStatus = new TypeStatus();
$orderPayType = $typeStatus->orderPayType();

if ($op == 'display') {
	
	include_once "viporder/display.php";

}elseif ($op == 'detail') {

	include_once "viporder/detail.php";

}elseif ($op == 'confirmpay') {

	include_once "viporder/confirmpay.php";

}elseif ($op == 'delAll') {
	
	include_once "viporder/delAll.php";

}elseif ($op == 'vipMember') {
	
	include_once "viporder/vipMember.php";

}elseif ($op == 'vipservice') {

    include_once "viporder/vipservice.php";

}elseif ($op == 'vipLevel'){
	
	include_once "viporder/vipLevel.php";

}elseif ($op == 'delVipLevel'){
	
	include_once "viporder/delVipLevel.php";

}elseif($op=='vipcard'){
	
	include_once "viporder/vipcard.php";

}elseif($op=='updateCard'){
	
	include_once "viporder/updateCard.php";

}elseif($op=='delCard'){
	
	include_once "viporder/delCard.php";

}elseif($op=='delAllCard'){
	
	include_once "viporder/delAllCard.php";

}elseif($op=='addVipCode'){
	
	include_once "viporder/addVipCode.php";

}elseif($op=='createOrder'){
	
	include_once "viporder/createOrder.php";

}elseif($op=='updateVip'){
	
	include_once "viporder/updateVip.php";

}

include $this->template('web/viporder');

?>