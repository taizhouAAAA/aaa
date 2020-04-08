<?php
/**
 * 营销管理
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
 */
 
 $market = pdo_fetch("SELECT * FROM " .tablename($this->table_market). " WHERE uniacid=:uniacid", array(':uniacid'=>$uniacid));

 $typeStatus = new TypeStatus();
 $source = $typeStatus->couponSource();

 $pindex = max(1, intval($_GPC['page']));
 $psize = 15;


/* 抵扣设置 */
if($op=='display'){
	
	include_once 'market/display.php';

/* 优惠券列表 */
}elseif($op=='coupon'){
	
	include_once 'market/coupon.php';

/* 添加优惠券 */
}elseif($op=='addCoupon'){
	
	include_once 'market/addCoupon.php';

/* 删除优惠券 */
}elseif($op=='delAllCoupon'){
	
	include_once 'market/delAllCoupon.php';

/* 优惠券规则 */
}elseif($op=='couponRule'){
	
	include_once 'market/couponRule.php';

/* 发放优惠券 */
}elseif($op=='sendCoupon'){
	
	include_once 'market/sendCoupon.php';

/* 优惠券记录 */
}elseif($op=='couponLog'){
	
	include_once 'market/couponLog.php';

/* 优惠券记录详情 */
}elseif($op=='couponDetail'){
	
	include_once 'market/couponDetail.php';

/* 限时折扣 */
}elseif($op=='discount'){
	
	include_once 'market/discount.php';

/* 添加限时折扣活动 */
}elseif($op=='addDiscount'){
	
	include_once 'market/addDiscount.php';

/* 删除限时折扣活动 */
}elseif($op=='delDiscount'){
	
	include_once 'market/delDiscount.php';

/* 限时折扣活动课程列表 */
}elseif($op=='discountLesson'){
	
	include_once 'market/discountLesson.php';

/* 添加课程到折扣活动 */
}elseif($op=='addDiscountLesson'){
	
	include_once 'market/addDiscountLesson.php';

/* 在限时活动里添加或移除课程 */
}elseif($op=='discountLessonPost'){
	
	include_once 'market/discountLessonPost.php';

}

include $this->template('web/market');

?>