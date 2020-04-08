<?php defined('IN_IA') or exit('Access Denied');?><link href="<?php echo MODULE_URL;?>template/web/style/fycommon.css" rel="stylesheet">
<ul class="nav nav-tabs">
	<li <?php  if($op=='display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('order');?>">课程订单管理</a></li>
	<?php  if($op=='detail') { ?>
	<li <?php  if($op=='detail') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('order', array('op'=>'detail','id'=>$_GPC['id']));?>">课程订单详情</a></li>
	<?php  } ?>
	<li <?php  if($op=='createOrder') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('order', array('op'=>'createOrder'));?>">创建课程订单</a></li>
	<li <?php  if($op=='couponCode' || $op=='addCouponCode') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('order', array('op'=>'couponCode'));?>">课程优惠码</a></li>
</ul>