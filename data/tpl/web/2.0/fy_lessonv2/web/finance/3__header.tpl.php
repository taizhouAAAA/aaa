<?php defined('IN_IA') or exit('Access Denied');?><ul class="nav nav-tabs">
	<li <?php  if($op=='display') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('finance');?>">财务概览</a></li>
    <li <?php  if($op=='commission' || $op=='detail') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('finance', array('op'=>'commission'));?>">提现申请</a></li>
	<li <?php  if($op=='handle') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('finance', array('op'=>'handle'));?>">佣金调整</a></li>
</ul>