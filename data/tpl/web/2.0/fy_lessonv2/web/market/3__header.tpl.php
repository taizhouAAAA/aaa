<?php defined('IN_IA') or exit('Access Denied');?><link href="<?php echo MODULE_URL;?>template/web/style/market.css" rel="stylesheet">
<style type="text/css">
.request{
	color:red;
	font-weight:bolder;
}
</style>
<ul class="nav nav-tabs">
	<li <?php  if($op=='display') { ?>class="active" <?php  } ?>>
		<a href="<?php  echo $this->createWebUrl('market');?>">积分设置</a>
	</li>
	<li <?php  if($op=='coupon' ||  $op=='addCoupon') { ?>class="active" <?php  } ?>>
		<a href="<?php  echo $this->createWebUrl('market', array('op'=>'coupon'));?>">优惠券管理</a>
	</li>
	<li <?php  if($op=='couponRule') { ?>class="active" <?php  } ?>>
		<a href="<?php  echo $this->createWebUrl('market', array('op'=>'couponRule'));?>">优惠券规则</a>
	</li>
	<li <?php  if($op=='sendCoupon') { ?>class="active" <?php  } ?>>
		<a href="<?php  echo $this->createWebUrl('market', array('op'=>'sendCoupon'));?>">发放优惠券</a>
	</li>
	<li <?php  if($op=='couponLog' || $op=='couponDetail') { ?>class="active" <?php  } ?>>
		<a href="<?php  echo $this->createWebUrl('market', array('op'=>'couponLog'));?>">优惠券记录</a>
	</li>
	<li <?php  if(in_array($op, array('discount','addDiscount','discountLesson','addDiscountLesson'))) { ?>class="active" <?php  } ?>>
		<a href="<?php  echo $this->createWebUrl('market', array('op'=>'discount'));?>">	
			<?php  if($op=='addDiscount' && !$_GPC['discount_id']) { ?>
				添加限时活动
			<?php  } else if($op=='addDiscount' && $_GPC['discount_id']) { ?>
				编辑限时活动
			<?php  } else if($op=='discountLesson') { ?>
				限时活动课程
			<?php  } else if($op=='addDiscountLesson') { ?>
				添加课程到活动
			<?php  } else { ?>
				限时折扣
			<?php  } ?>
		</a>
	</li>
</ul>