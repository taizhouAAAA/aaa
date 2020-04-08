<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
<div id="js-goods-seller">
	<div class="we7-page-title">收入明细</div>
	<form action="" class="we7-form" method="post">
	<table class="table we7-table table-hover table-form">
		<tr>
			<th>订单号</th>
			<th>日期</th>
			<th>类型</th>
			<th>商品</th>
			<th>金额</th>
		</tr>
		<?php  if(!empty($payments_list)) { ?>
		<?php  if(is_array($payments_list)) { foreach($payments_list as $payment) { ?>
		<tr>
			<td>
				<?php  echo $payment['orderid'];?>
			</td>
			<td>
				<?php  echo date('Y-m-d', $payment['createtime'])?>
			</td>
			<td>
				<?php  if($payment['type'] == 1) { ?>公众号应用
				<?php  } else if($payment['type'] == 2) { ?>公众号
				<?php  } else if($payment['type'] == 3) { ?>小程序
				<?php  } else if($payment['type'] == 4) { ?>小程序应用
				<?php  } else if($payment['type'] == 5) { ?>套餐
				<?php  } else if($payment['type'] == 6) { ?>应用访问量
				<?php  } else if($payment['type'] == 7) { ?>公众号续费
				<?php  } else if($payment['type'] == 8) { ?>小程序续费
				<?php  } ?>
			</td>
			<td>
				<?php  echo $payment['title'];?>
			</td>
			<td>
				<?php  echo $payment['amount'];?>
			</td>
		</tr>
		<?php  } } ?>
		<?php  } else { ?>
		<tr>
			<td colspan="4" class="text-center">暂无数据</td>
		</tr>
		<?php  } ?>
	</table>
	<div class="pull-right">
		<?php  echo $pager;?>
	</div>
		</form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>