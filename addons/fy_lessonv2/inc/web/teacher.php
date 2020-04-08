<?php
/**
 * 讲师管理
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
 */
$typeStatus = new TypeStatus();
$orderPayType = $typeStatus->orderPayType();

$pindex = max(1, intval($_GPC['page']));
$psize = 10;

if ($operation == 'display') {
	
	include_once 'teacher/display.php';

}elseif($operation == 'post') {
	
	include_once 'teacher/post.php';

}elseif ($operation == 'delTeacher') {
	
	include_once 'teacher/delTeacher.php';

}elseif($operation == 'order') {
	
	include_once 'teacher/order.php';

}elseif($operation == 'createOrder') {
	
	include_once 'teacher/createOrder.php';

}elseif($operation == 'orderDetail') {
	
	include_once 'teacher/orderDetail.php';

}elseif($operation == 'delAllOrder') {
	
	include_once 'teacher/delAllOrder.php';

}elseif($operation == 'teacherMember') {
	
	include_once 'teacher/teacherMember.php';

}elseif($operation == 'editTeacherMember') {
	
	include_once 'teacher/editTeacherMember.php';

}elseif ($operation == 'income') {
	
	include_once 'teacher/income.php';
	
}elseif($op=='qrcode'){
	
	include_once 'teacher/qrcode.php';
}

include $this->template('web/teacher');


?>