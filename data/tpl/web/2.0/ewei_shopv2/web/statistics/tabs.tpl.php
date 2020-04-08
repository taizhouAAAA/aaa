<?php defined('IN_IA') or exit('Access Denied');?><?php if(cv('statistics.sale|statistics.sale_analysis|statistics.order')) { ?>
<div class='menu-header'>销售统计</div>
<ul>
    <?php if(cv('statistics.sale')) { ?>
    	<li <?php  if($_W['action'] == 'statistics.sale') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('statistics/sale')?>">销售统计</a></li>
    <?php  } ?>
    <?php if(cv('statistics.sale_analysis')) { ?>
    	<li <?php  if($_W['action'] == 'statistics.sale_analysis') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('statistics/sale_analysis')?>">销售指标</a></li>
    <?php  } ?>
    <?php if(cv('statistics.order')) { ?>
    	<li <?php  if($_W['action'] == 'statistics.order') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('statistics/order')?>">订单统计</a></li>
    <?php  } ?>

</ul>
<?php  } ?>
<?php if(cv('statistics.goods|statistics.goods_rank|statistics.goods_trans')) { ?>
<div class='menu-header'>商品统计</div>
<ul>
     <?php if(cv('statistics.goods')) { ?>
     	<li <?php  if($_W['action'] == 'statistics.goods') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('statistics/goods')?>">销售明细</a></li>
     <?php  } ?>
    <?php if(cv('statistics.goods_rank')) { ?>
    	<li <?php  if($_W['action'] == 'statistics.goods_rank') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('statistics/goods_rank')?>">销售排行</a></li>
    <?php  } ?>
    <?php if(cv('statistics.goods_trans')) { ?>
    	<li <?php  if($_W['action'] == 'statistics.goods_trans') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('statistics/goods_trans')?>">销售转化率</a></li>
    <?php  } ?>
</ul>
<?php  } ?>
<?php if(cv('statistics.member_cost|statistics.member_increase')) { ?>
<div class='menu-header'>会员统计</div>
<ul>
    <?php if(cv('statistics.member_cost')) { ?>
    	<li <?php  if($_W['action'] == 'statistics.member_cost.view') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('statistics/member_cost')?>"> 消费排行</a></li>
    <?php  } ?>
    <?php if(cv('statistics.member_increase')) { ?>
    	<li <?php  if($_W['action'] == 'statistics.member_increase.view') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('statistics/member_increase')?>">增长趋势</a></li>
    <?php  } ?>
</ul>
<?php  } ?>

<?php  if(p('newstore')) { ?>
<div class='menu-header'>O2O统计</div>
<ul>
    <li <?php  if($_W['action'] == 'statistics.o2o_moonorders') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('statistics/o2o_monthorders')?>"> 月度订单数</a></li>
   <!-- <li <?php  if($_W['action'] == 'statistics.o2o_salestatistics') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('statistics/o2o_salestatistics')?>">销售额统计</a></li>
    <li <?php  if($_W['action'] == 'statistics.o2o_averageprice') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('statistics/o2o_averageprice')?>">订单平均单价</a></li>-->
    <li <?php  if($_W['action'] == 'statistics.o2o_orderusers') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('statistics/o2o_orderusers')?>">用户下单统计</a></li>
    <!--<li <?php  if($_W['action'] == 'statistics.o2o_avguserconsume') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('statistics/o2o_avguserconsume')?>">客户平均消费额</a></li>-->
    <li <?php  if($_W['action'] == 'statistics.o2o_verifynum') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('statistics/o2o_verifynum')?>">门店核销统计</a></li>

</ul>
<?php  } ?>
<!--913702023503242914-->